<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
class UserController extends Controller
{
    public function loginAdmin(request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        
        try {
            
        if(Auth::guard('admin')->attempt($credentials))
        {
            $admin = User::where('email', $request['email'])->first();
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('admin-token')->plainTextToken;
            return response()->json(['token'=> $token, 'admin' => $admin],200);
        }
    } catch (ValidationException $e) {
        return response()->json(['error'=> 'login error'], 422);
    }


        return response()->json(['invalid creds']);

    }

    public function logoutAdmin(Request $request)
    {
        auth('admin')->logout();
        $request->user()->currentAccessToken()->delete();

        return response()->json('logged out');
    }


    public function checker(){
        return response()->json('u are logged in admin');
    }
}
