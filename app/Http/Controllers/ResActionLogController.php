<?php

namespace App\Http\Controllers;

use App\Models\resActionLog;
use App\Models\resident;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResActionLogController extends Controller
{
    /**
     * Determines if the user is a chief resident or a regular resident.
     *
     * @param array $user The user data.
     * @return string The role of the user ('resident' or 'chiefResident').
     */
    public function isChief($user){
        if($user['role'] == 'resident'){
            return 'resident';
        }else{
            return 'chiefResident';
        }
    }

    /**
     * Retrieves the action logs for residents and returns them as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse The action logs as a JSON response.
     */
    public function index()
    {
        $data = resActionLog::paginate(5);

        return response()->json($data);
    }
    
    /**
     * Store a new action log.
     *
     * @param mixed $user The user object or ID.
     * @param string $action The action performed.
     * @return \Illuminate\Http\Response The response indicating the success or failure of the operation.
     */
    public function store($user, $action)
    {
        if (empty($user) || empty($action)) {
            return response('invalid input');
        }
        
        $newId = $this->createNewId();

        resActionLog::insert([
            'RA_id' => $newId,
            'action' => $action,
            'role' => $this->isChief($user),
            'user_id' => $user['resident_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('action stored');
    }

    /**
     * Get the resident's name by their ID.
     *
     * @param int $resident_id The ID of the resident.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the resident's name or an error message.
     */
    public function residentName($resident_id)
    {
        try {
            $resident = resident::where('resident_id', $resident_id)->first();
        
            if ($resident) {
                $lname = $resident->resident_lName;
                $fname = $resident->resident_fName;
                $mname = $resident->resident_mName;

                return response()->json(['lastName' => $lname, 'firstName' => $fname, 'middleName' => $mname]);
            } else {
                return response()->json(['error' => 'Resident not found.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.']);
        }
    }
    
    /**
     * This function retrieves logs based on the user's role.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logsByDep()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $userRole = $user['role'];

        if ($userRole == 'admin') {
            // If the user is an admin, retrieve all logs and paginate the results
            $data = resActionLog::paginate(5);
            return response()->json($data);
        } else {
            if ($userRole == 'chiefResident') {
                // If the user is a chief resident, retrieve all residents in the same department
                $residents = resident::where('department_id', $user['department_id'])->get();
                $residentsId = $residents->pluck('resident_id');

                // Retrieve logs created by the residents in the department and paginate the results
                $data = resActionLog::whereIn('user_id', $residentsId)->paginate(5);
                return response()->json($data);
            } elseif ($userRole == 'resident') {
                // If the user is a resident, retrieve logs created by the resident and paginate the results
                $data = resActionLog::where('user_id', $user['resident_id'])->paginate(5);
                return response()->json($data);
            }

            return response()->json(['error' => 'An error occurred.']);
        }
    }

    /**
     * This function generates a new ID for resActionLog.
     *
     * @return string
     */
    private function createNewId()
    {
        // Get the current time
        $time = now();
        $date = new Carbon($time);

        // Get the latest order count
        $latestorder = resActionLog::all()->count();
        $currentId = $date->year . 'RA' . $latestorder;

        // Check if the current ID already exists, if so, generate a new one
        if (!empty(resActionLog::select('RA_id')->where('RA_id', $currentId)->first()->RA_id)) {
            do {
                $latestorder++;
                $depId = $date->year . 'RA' . $latestorder;
                $id = resActionLog::select('RA_id')->where('RA_id', $depId)->first();
            } while (!empty($id));
        }

        // Generate the new ID
        $newId = $date->year . 'RA' . $latestorder;
        return $newId;
    }
    

}
