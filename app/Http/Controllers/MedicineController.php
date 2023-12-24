<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class medicineController extends Controller
{
    


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = medicine::all();

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
        $latestorder = medicine::all()->count();
        $last_id = medicine::select('medicine_id')->orderBy('created_at', 'desc')->first()->medicine_id;
        $currentId = 'M' . $latestorder;


        if( !empty( medicine::select('medicine_id')->where('medicine_id', $currentId)->first()->medicine_id )){
        do{
            $latestorder++;
            $depId = 'M'. $latestorder;
            $id = medicine::select('medicine_id')->where('medicine_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = 'M' . $latestorder;

        medicine::insert([
            'medicine_id' =>  $newId,
            'medicine_name' => $request['medicine_name'],
            'medicine_brand' => $request['medicine_brand'],
            'medicine_dosage' => $request['medicine_dosage'],
            'medicine_type' => $request['medicine_type'],
            'medicine_price' => $request['medicine_price'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        $action ='added a new medicine-'. $request['medicine_name'];
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
    public function show(medicine $medicine)
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
        medicine::where('medicine_id', $id)->update(
            [        
                'medicine_id' => $request['medicine_id'],
                'medicine_name' => $request['medicine_name'],
                'medicine_brand' => $request['medicine_brand'],
                'medicine_dosage' => $request['medicine_dosage'],
                'medicine_type' => $request['medicine_type'],
                'medicine_price' => $request['medicine_price'],
    

            'updated_at' => now(),
            ]);
            
            $action ='updated a medicine-'. $id;
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
     
        $action ='deleted a medicine-'. $this->getMedNamebyId($id);
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        medicine::destroy($id);

       
       return response('deleted');
    }


    public static function getMedNamebyId($medicine_id){

        $name = medicine::select('medicine_name')->where('medicine_id', $medicine_id)->first()->medicine_name;


        return $name;
    }

}
