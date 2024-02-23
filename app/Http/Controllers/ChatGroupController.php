<?php

namespace App\Http\Controllers;

use App\Models\chatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class ChatGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = chatGroup::all();
        return $data;
    }
    /**
     * Store a new chat group.
     *
     * @return string The ID of the newly created chat group.
     */
    public function store()
    {
        // Generate a unique ID for the chat group
        $time = now();
        $date = new Carbon($time);
        $latestorder = chatGroup::all()->count();
        $currentId = $date->year . 'CG' . $latestorder;

        // Check if the generated ID already exists, and generate a new one if necessary
        if (!empty(chatGroup::select('chatGroup_id')->where('chatGroup_id', $currentId)->first()->chatGroup_id)) {
            do {
                $latestorder++;
                $depId = $date->year . 'CG' . $latestorder;
                $id = chatGroup::select('chatGroup_id')->where('chatGroup_id', $depId)->first();
            } while (!empty($id));
        }

        $newId = $date->year . 'CG' . $latestorder;

        // Insert the new chat group into the database
        chatGroup::insert([
            'chatGroup_id' => $newId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Log the action if the user is not an admin
        $action = 'created a new chatGroup';
        $user = Auth::user();
        if ($user['role'] != 'admin') {
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }

        return $newId;
    }

    /**
     * Delete a chat group.
     *
     * @param string $id The ID of the chat group to delete.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating that the chat group was deleted.
     */
    public function destroy($id)
    {
        // Mark the chat group as deleted in the database
        chatGroup::where('chatGroup_id', $id)->update(['isDeleted' => true]);

        // Log the action if the user is not an admin
        $action = 'deleted a chatGroup';
        $user = Auth::user();
        if ($user['role'] != 'admin') {
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }

        return response()->json('chatGroup deleted');
    }
    
}
