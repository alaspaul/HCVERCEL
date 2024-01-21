<?php

namespace App\Http\Controllers;

use App\Models\resident;
use App\Models\resident_assigned_room;
use App\Models\room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $time = now();
        $date = new Carbon( $time ); 


        resident_assigned_room::insert([
            'resAssRoom_id' => $date->year . $request['resident_id'] .  $request['room_id'],
            'resident_id' => $request['resident_id'],
            'room_id' => $request['room_id'],
            'isFinished' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $room = new RoomController;
        $roomName = $room->getRoomNamebyId($request['room_id']);

        $resident = new ResidentController;
        $residentName = $resident->residentName($request['resident_id']);

        $resName = $residentName['lastName'] . ', ' . $residentName['lastName'] . ' ' . $residentName['lastName'];
        $action ='assigned room-'. $roomName.' to resident-'. $resName;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
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
     * Show the form for editing the specified resource.
     */
    public function edit(resident_assigned_room $resident_assigned_room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resident_assigned_room $resident_assigned_room)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $RAR = resident_assigned_room::where('resAssRoom_id', $id)->first();


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

    public function updatePInfo(Request $request, $id)
    {
       
        
        resident_assigned_room::where('ressAssRoom_id', $id)->update(
            [

            'room_id' => $request['room_id'],
            'resident_id' => $request['resident_id'],
            'isFinished' => $request['isFinished'],



            'updated_at' => now(),
        ]);

        $action ='updated Resident Assigned room where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        
        return response('done');
    }



    public function showRessAssRoom($resident_id)
    {
        $rooms = resident_assigned_room::where('resident_id', $resident_id)->get();


        return response()->json($rooms);
    
    } 


    public function roomName($room_id)
    {
        $roomName = room::select('room_name')->where('room_id', $room_id)->first()->room_id;


        return response()->json($roomName);
    }


    
    public function residentName($resident_id)
    {
        $resident = new residentController;

        $residentName = $resident->residentName($resident_id);
 

        return $residentName;
    }


    public function getResidentsByDepartment($departmentId)
    {
        try {
            $residents = DB::table('residents')
                ->where('department_id', $departmentId)
                ->get();

            return $residents;
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }

    public function unassignedRooms(){
        $assignedRooms = resident_assigned_room::select('room_id')->get();
        $rooms = room::select('room_id')->whereNotIn('room_id', $assignedRooms)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();


        return response()->json($rooms);
    }

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
    
    

}
