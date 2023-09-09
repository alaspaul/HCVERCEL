<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\RedirectResponse;
class UserController extends Controller
{
    public function loginAdmin(request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        try {
            
        if(Auth::guard('admin')->attempt($credentials))
        {
            $admin = User::where('email', $request['email'])->first();
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('admin-token')->plainTextToken;
            return response()->json(['token'=> $token, 'admin' => $admin, 'role' => $admin['role']],200);
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



    public function store(Request $request)
    {   
        $time = now();
        $date = new Carbon( $time ); 

        $latestorder = User::all()->count();
        $last_id = User::select('id')->orderBy('created_at', 'desc')->first()->id;
        $currentId =  $date->year . 'A' . $latestorder;
        

        if( !empty( User::select('id')->where('id', $currentId)->first()->id )){
        do{
            $latestorder++;
            $depId = $date->year. 'A'. $latestorder;
            $id = User::select('id')->where('id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $date->year . 'A' . $latestorder;
        User::insert([
            'id' => $newId,
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $action ='added a new Admin-'. $request['name'];
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        return response()->json($id . 'has been added to the system');
    }


    public function update(Request $request, $id)
    {
       
        
        User::where('id', $id)->update(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role' => $request['role'],
                

                'updated_at' => now(),
                ]

        );
        $action ='updated an Admin where id-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
        return response()->json($id . 'has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $name = User::select('name')->where('id', $id)->first()->name;
        $action ='deleted an admin-'. $name;
        User::destroy($id);

        return response()->json($id . 'has been deleted');

    }


    public function index()
    {
        $data = User::all();

        return response()->json($data);
    }

}
