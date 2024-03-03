<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Login the admin user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        try {
            if (Auth::guard('admin')->attempt($credentials)) {
                $admin = User::where('email', $request['email'])->first();
                $user = Auth::guard('admin')->user();
                $token = $user->createToken('admin-token', ['*'], now()->addHours(10))->plainTextToken;
                return response()->json(['token' => $token, 'admin' => $admin, 'role' => $admin['role']], 200);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => 'login error'], 422);
        }

        return response()->json(['invalid creds']);
    }

    /**
     * Logout the admin user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutAdmin(Request $request)
    {
        auth('admin')->logout();
        $request->user()->currentAccessToken()->delete();

        return response()->json('logged out');
    }

    public function checker()
    {   
        $user = Auth::user();

        if (empty($user)) {
            return response()->json('u are not logged in');
        }
        
        if ($user->role == 'admin'){
            return response()->json('u are logged in admin');
        }elseif($user->role == 'resident'){
            return response()->json('u are logged in resident');
        }elseif($user->role == 'chiefResident'){
            return response()->json('u are logged in chiefResident');
        }else{
            return response()->json('u are not logged in');
        }
    }
    /**
     * Store a new user in the system.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!$this->ValidateUser($request)) {
            return response()->json('invalid input');
        }

        $newId = $this->createNewId($request);
        user::insert([
            'id' => $newId,
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json($newId . ' has been added to the system');
    }


    /**
     * Update an existing user in the system.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (!$this->ValidateUser($request)) {
            return response()->json('invalid input');
        }

        $user = user::where('id', $id)->first();

        if (empty($user)) {
            return response()->json('user not found');
        }

        $dataToUpdate = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'updated_at' => now(),
        ];

        if (!empty($request['password'])) {
            $dataToUpdate['password'] = bcrypt($request['password']);
        }

        user::where('id', $id)->update($dataToUpdate);

        return response()->json($id . ' has been updated');
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id The ID of the user to be deleted.
     * @return \Illuminate\Http\JsonResponse The JSON response indicating the success or failure of the deletion.
     */
    public function destroy($id)
    {
        $user = user::where('id', $id)->first();

        if (empty($user)) {
            return response()->json('user not found');
        }

        user::destroy($id);

        return response()->json($id . ' has been deleted');
    }

    /**
     * Get all users.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response containing all users.
     */
    public function index()
    {
        $data = user::all();
        return response()->json($data);
    }

    /**
     * Validate user data.
     *
     * @param \Illuminate\Http\Request $request The request object containing user data.
     * @return bool Returns true if the user data is valid, false otherwise.
     */
    private function ValidateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Create a new user ID.
     *
     * @param \Illuminate\Http\Request $request The request object containing user data.
     * @return string The newly generated user ID.
     */
    private function createNewId(Request $request)
    {
        $time = now();
        $date = new Carbon($time);

        $latestorder = user::all()->count();
        $last_id = user::select('id')->orderBy('created_at', 'desc')->first()->id;
        $currentId =  $date->year . 'A' . $latestorder;

        if (!empty(user::select('id')->where('id', $currentId)->first()->id)) {
            do {
                $latestorder++;
                $depId = $date->year . 'A' . $latestorder;
                $id = user::select('id')->where('id', $depId)->first();
            } while (!empty($id));
        }

        $newId = $date->year . 'A' . $latestorder;

        return $newId;
    }
}
