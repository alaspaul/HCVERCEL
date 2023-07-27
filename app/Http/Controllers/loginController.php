<?php

namespace App\Http\Controllers;
use App\Models\resident;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\Response;
use Auth;
use PhpParser\Node\Stmt\TryCatch;
use Validator;
class loginController extends Controller
{
    public function loginResident(request $request){
        $request->validate([
            'resident_userName' => 'required',
            'resident_password' => 'required',
        ]);

        $username = $request['resident_userName'];
        $password = $request['resident_password'];


        try {
            $resident = resident::where('resident_userName', $username)->first();

            if($resident && Hash::check($password, $resident->resident_password)){
                $token = bin2hex(random_bytes(10));
                return response()->json(['token'=>'R-'. $token, 'resident' => $resident],200);
            }
        } catch (ValidationException $e) {
            return response()->json(['error'=> 'login error'], 422);
        }

        return response()->json(['error' => 'invalid credentials'],401);
    }


    public function logoutRes(){
        if(Session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect(route('login'));
        }
    }
}
