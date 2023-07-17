<?php

namespace App\Http\Controllers;

use App\Models\resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Illuminate\Http\Response;
use Auth;
use Validator;
class ResidentController extends Controller
{
           


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = resident::all();

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
    {
        resident::insert([
            'resident_id' => $request['resident_id'],
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'resident_password' => $request['resident_password'],
            'department_id' => $request['department_id'],
            'isChief' => $request['isChief'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(resident $resident)
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
       
        
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       resident::destroy($id);

       return response('deleted');
    }


    public function updateResident(Request $request, $id)
    {
       
        
        resident::where('resident_id', $id)->update(
            [
                'resident_userName' => $request['resident_userName'],
                'resident_fName' => $request['resident_fName'],
                'resident_lName' => $request['resident_lName'],
                'resident_mName' => $request['resident_mName'],
                'resident_password' => $request['resident_password'],
                'department_id' => $request['department_id'],
                'isChief' => $request['isChief'],
         
                'updated_at' => now(),
                ]
        );


        return response('updated');
    }

    public function loginResident(request $request){
        $request->validate([
            'resident_userName' => 'required',
            'resident_password' => 'required',
        ]);

        $resInfo = resident::where('resident_userName', $request->resident_userName)->first();

        if(!$resInfo){
            return back()->with('fail', 'unknown username');
        }else{
            if(Hash::check($request->resident_password, $resInfo->resident_password)){
                    $request->session()->put('loggedUser', $resInfo->resident_id);
                    return redirect(route('departments.index'));


            }else{
                return back()->with('fail', 'wrong password');
            }
        }

    }


    public function logoutRes(){
        if(Session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect(route('login'));
        }
    }
   
}
