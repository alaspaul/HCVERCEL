<?php

namespace App\Http\Controllers;
use App\Models\resident;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\Response;
use Auth;
use Validator;
class loginController extends Controller
{
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
