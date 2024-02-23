<?php

namespace App\Http\Controllers;

use App\Models\resident;
use App\Models\resident_assigned_room;
use App\Models\room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResidentAssignedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = resident_assigned_room::where('isDeleted', false)->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resident_id' => 'required',
            'room_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $existingAssignment = resident_assigned_room::where('resident_id', $request['resident_id'])
            ->where('room_id', $request['room_id'])
            ->where('isDeleted', false)
            ->first();

        if ($existingAssignment) {
            return response()->json(['error' => 'Assignment already exists.'], 400);
        }

        $time = now();
        $date = new Carbon($time);

        resident_assigned_room::insert([
            'resAssRoom_id' => $date->year . $request['resident_id'] . $request['room_id'],
            'resident_id' => $request['resident_id'],
            'room_id' => $request['room_id'],
            'isFinished' => 0,
            'isDeleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $room = new RoomController;
        $roomName = $room->getRoomNamebyId($request['room_id']);

        $resident = new ResidentController;
        $residentName = $resident->residentName($request['resident_id']);

        $resName = $residentName['lastName'] . ', ' . $residentName['lastName'] . ' ' . $residentName['lastName'];
        $action = 'assigned room-' . $roomName . ' to resident-' . $resName;
        $user = Auth::user();
        if ($user['role'] != 'admin') {
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($resident_id)
    {
        $assignedRooms = resident_assigned_room::where('resident_id', $resident_id)->where('isDeleted', false)->get();

        return response()->json($assignedRooms);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $RAR = resident_assigned_room::where('resAssRoom_id', $id)->first();
        if ($RAR == null) {
            return response('resident assigned room does not exist');
        }

        $room = new RoomController;
        $roomName = $room->getRoomNamebyId($RAR['room_id']);

        $resident = new ResidentController;
        $residentName = $resident->residentName($RAR['resident_id']);
        $resName = $residentName['lastName'] . ', ' . $residentName['lastName'] . ' ' . $residentName['lastName'];


        $action ='unassigned resident-'. $resName . ' from room-' . $roomName;

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }


        resident_assigned_room::destroy($id);

       
       return response('deleted');
    }

    /**
     * Delete a resident assigned room by its ID.
     *
     * @param int $id The ID of the resident assigned room to delete.
     * @return \Illuminate\Http\Response The response indicating the deletion.
     */
    public function delete($id)
    {
        $RAR = resident_assigned_room::where('resAssRoom_id', $id)->first();
        if ($RAR == null) {
            return response('resident assigned room does not exist');
        }

        resident_assigned_room::where('resAssRoom_id', $id)->update(
            [
            'isDeleted' => true,
            'updated_at' => now(),
        ]);

        $action ='deleted Resident Assigned room where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        
        return response('deleted');
    }

    /**
     * Get all resident assigned rooms for a specific resident.
     *
     * @param int $resident_id The ID of the resident.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the resident assigned rooms.
     */
    public function showRessAssRoom($resident_id)
    {
        $resident = resident::where('resident_id', $resident_id)->first();
        if ($resident == null) {
            return response()->json('resident does not exist');
        }

        $rooms = resident_assigned_room::where('resident_id', $resident_id)
                                            ->where('isDeleted', false)
                                            ->get();


        return response()->json($rooms);

    } 

    /**
     * Get the name of a room by its ID.
     *
     * @param int $room_id The ID of the room.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the room name.
     */
    public function roomName($room_id)
    {
        $room = room::where('room_id', $room_id)->first();
        if ($room == null) {
            return response()->json('room does not exist');
        }

        $roomName = room::select('room_name')->where('room_id', $room_id)->first()->room_id;


        return response()->json($roomName);
    }

    /**
     * Get the name of a resident by their ID.
     *
     * @param int $resident_id The ID of the resident.
     * @return \Illuminate\Http\JsonResponse|string The JSON response containing the resident name, or an error message if an exception occurs.
     */
    public function residentName($resident_id)
    {
        try {
            $resident = new residentController;
            $residentName = $resident->residentName($resident_id);
            return  response()->json($residentName);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }

    /**
     * Get all residents belonging to a specific department.
     *
     * @param int $departmentId The ID of the department.
     * @return \Illuminate\Support\Collection|\Illuminate\Http\JsonResponse The collection of residents or an error message if an exception occurs.
     */
    public function getResidentsByDepartment($departmentId)
    {
        try {
            $residents = resident::where('department_id', $departmentId)
                                    ->get();

            return $residents;
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }

    /**
     * Retrieve unassigned rooms.
     *
     * This method retrieves the list of unassigned rooms by querying the database for rooms that are not assigned to any resident.
     * The rooms are ordered based on their room_id in ascending order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unassignedRooms(){
        $assignedRooms = resident_assigned_room::select('room_id')
                                                    ->where('isDeleted', false)
                                                    ->get();
        $rooms = room::select('room_id')
                        ->whereNotIn('room_id', $assignedRooms)
                        ->orderByRaw('LENGTH(room_id) ASC')
                        ->orderBy('room_id')
                        ->get();


        return response()->json($rooms);
    }

    /**
     * Retrieves the assigned rooms for the current user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentUserAssignedRooms()
    {
        try {
            $user = Auth::user();
            
            if ($user) {
                $residentId = $user->resident_id;

                $assignedRooms = resident_assigned_room::where('resident_id', $residentId)->where('isDeleted', false)->get();

                // Fetch room names based on room_ids
                $roomIds = $assignedRooms->pluck('room_id')->toArray();
                $roomNames = room::whereIn('room_id', $roomIds)->pluck('room_name', 'room_id');

                // Add room_name to each assigned room
                $assignedRoomsWithNames = $assignedRooms->map(function ($assignedRoom) use ($roomNames) {
                    $assignedRoom['room_name'] = $roomNames[$assignedRoom['room_id']] ?? null;
                    return $assignedRoom;
                });

                return response()->json($assignedRoomsWithNames);
            } else {
                return response()->json(['error' => 'User not authenticated.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }

    /**
     * Updates the "isFinished" status of a resident assigned room.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $resAssRoom_id
     * @return \Illuminate\Http\Response
     */
    public function updateIsFinished(Request $request, $resAssRoom_id)
    {
        try {
            $user = Auth::user();
            
            if ($user) {
                $residentId = $user->resident_id;

                $assignedRoom = resident_assigned_room::where('resAssRoom_id', $resAssRoom_id)
                    ->where('resident_id', $residentId)
                    ->where('isDeleted', false)
                    ->first();

                if ($assignedRoom) {
                    $assignedRoom->update(['isFinished' => $request->input('isFinished')]);

                    $action = 'updated isFinished for Resident Assigned room where id-' . $resAssRoom_id;
                    $log = new ResActionLogController;
                    $log->store(Auth::user(), $action);

                    return response('done');
                } else {
                    return response()->json(['error' => 'Assigned room not found.']);
                }
            } else {
                return response()->json(['error' => 'User not authenticated.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }
    
    

}
