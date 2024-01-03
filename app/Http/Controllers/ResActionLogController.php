<?php

namespace App\Http\Controllers;

use App\Models\ResActionLog;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class ResActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function isChief($user){
        if($user['role'] == 'resident'){
            return 'resident';
        }else{
            return 'chiefResident';
        }
    }
    public function index()
    {
        $data = ResActionLog::paginate(30);

        return response()->json($data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($user, $action)
    {
        $time = now();
        $date = new Carbon( $time ); 

        $latestorder = ResActionLog::all()->count();
        $currentId = $date->year .'RA' . $latestorder;


        if( !empty(ResActionLog::select('RA_id')->where('RA_id', $currentId)->first()->RA_id)){
        do{
            $latestorder++;
            $depId = $date->year .'RA' . $latestorder;
            $id = ResActionLog::select('RA_id')->where('RA_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $date->year .'RA' . $latestorder;
        if($user['role'] == 'admin'){
            ResActionLog::insert([
                'RA_id' => $newId,
                'action' => $action,
                'role' => 'admin',
                'user_id' => $user['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);            
        
        }else{
            ResActionLog::insert([
                'RA_id' => $newId,
                'action' => $action,
                'role' => $this->isChief($user),
                'user_id' => $user['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

 
        return response('action stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResActionLog $resActionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResActionLog $resActionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResActionLog $resActionLog)
    {
        //
    }

    public function residentName($resident_id)
    {
        $lname = Resident::select('resident_lName')->where('resident_id', $resident_id)->first()->resident_lName;
        $fname = Resident::select('resident_fName')->where('resident_id', $resident_id)->first()->resident_fName;
        $mname = Resident::select('resident_mName')->where('resident_id', $resident_id)->first()->resident_mName;



        return response()->json(['lastName' => $lname, 'firstName' => $fname, 'middleName' => $mname]);
    }

    public function logsByDep()
    {   
        $user = Auth::user();
        $userRole = $user['role'];

        

        if($userRole == 'admin'){

            $data = ResActionLog::paginate(5);
            return response()->json($data);

        }else{

            if($userRole == 'chiefResident'){
                $chiefDep = Resident::select('department_id')->where('resident_id', $user['resident_id'])->first()->department_id;

                $data = ResActionLog::where('user_id', 'LIKE', '%'.$chiefDep.'%')->paginate(5);
               
                return response()->json($data);
            }elseif($userRole == 'Resident'){
                $data = ResActionLog::where('user_id', $user['resident_id'])->paginate(5);
                return response()->json($data);
            }

        }
    }
    


}
