<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MedicineController extends Controller
{
    


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Medicine::all();

        return response()->json($data);
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
    {
        $latestorder = Medicine::all()->count();
        $last_id = Medicine::select('medicine_id')->orderBy('created_at', 'desc')->first()->medicine_id;
        $currentId = 'M' . $latestorder;


        if( !empty( Medicine::select('medicine_id')->where('medicine_id', $currentId)->first()->medicine_id )){
        do{
            $latestorder++;
            $depId = 'M'. $latestorder;
            $id = Medicine::select('medicine_id')->where('medicine_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = 'M' . $latestorder;

        Medicine::insert([
            'medicine_id' =>  $newId,
            'medicine_name' => $request['medicine_name'],
            'medicine_brand' => $request['medicine_brand'],
            'medicine_dosage' => $request['medicine_dosage'],
            'medicine_type' => $request['medicine_type'],
            'medicine_price' => $request['medicine_price'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        $action ='added a new Medicine-'. $request['medicine_name'];
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Medicine::where('medicine_id', $id)->update(
            [        
                'medicine_id' => $request['medicine_id'],
                'medicine_name' => $request['medicine_name'],
                'medicine_brand' => $request['medicine_brand'],
                'medicine_dosage' => $request['medicine_dosage'],
                'medicine_type' => $request['medicine_type'],
                'medicine_price' => $request['medicine_price'],
    

            'updated_at' => now(),
            ]);
            
            $action ='updated a Medicine-'. $id;
            $user = Auth::user();
            if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
            }
            return response('updated');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     
        $action ='deleted a Medicine-'. $this->getMedNamebyId($id);
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Medicine::destroy($id);

       
       return response('deleted');
    }


    public static function getMedNamebyId($medicine_id){

        $name = Medicine::select('medicine_name')->where('medicine_id', $medicine_id)->first()->medicine_name;


        return $name;
    }

}
