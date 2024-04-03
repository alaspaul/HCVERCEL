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
use App\AppConstants;
class ResidentAssignedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = resident_assigned_room::all();
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
            ->first();

        if ($existingAssignment) {
            return response()->json(['error' => 'Assignment already exists.'], 400);
        }

        $time = now();
        $date = new Carbon($time);
        $id = $date->year . $request['resident_id'] . $request['room_id'];
        resident_assigned_room::insert([
            'resAssRoom_id' => $id,
            'resident_id' => $request['resident_id'],
            'room_id' => $request['room_id'],
            'isFinished' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        $action = new AppConstants;
        $this->LogAction($action->add, $request['room_id'], $request['resident_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show($resident_id)
    {
        $assignedRooms = resident_assigned_room::where('resident_id', $resident_id)->get();

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

        $action = new AppConstants;
        $this->LogAction($action->delete, $RAR['room_id'], $RAR['resident_id']);

        resident_assigned_room::destroy($id);



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

                $assignedRooms = resident_assigned_room::where('resident_id', $residentId)->get();

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
    /**
     * Logs an action performed on a resident assigned to a room.
     *
     * @param string $action The action performed.
     * @param int $roomid The ID of the room.
     * @param int $residentId The ID of the resident.
     * @return void
     */
    private function LogAction($action, $roomid, $residentId){
        $newAction = $action . ' resident - ' . $residentId. ' room - ' . $roomid;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }
}
