<?php

namespace App\Http\Controllers;
use App\Models\resident;


use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\Response;
use Auth;
class loginController extends Controller
{
    public function loginResident(request $request){
        $request->validate([
            'resident_userName' => 'required',
            'resident_password' => 'required',
        ]);

        $username = $request['resident_userName'];
        $password = $request['resident_password'];

        $credentials = $request->only('resident_userName', 'resident_password');
        try {
            
    
            if (Auth::attempt($credentials)){
                $resident = resident::where('resident_userName', $username)->first();
                $user = Auth::user();
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['token'=>'R-'. $token, 'resident' => $resident],200);
            }
        } catch (ValidationException $e) {
            return response()->json(['error'=> 'login error'], 422);
        }

        return response()->json(['error' => 'invalid credentials'],401);
    }

    

    
    public function logoutRes() {
        auth('web')->logout();


        return redirect('login')->withSuccess('Logged out successfully.');
  
    }
}
