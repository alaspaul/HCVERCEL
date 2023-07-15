<?php

namespace App\Http\Controllers;

use App\Models\info_history;
use Illuminate\Http\Request;

class InfoHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
        $data = info_history::all();
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
        info_history::insert([
            'infoHistory_id' => $request['infoHistory_id'],
            'history_id' => $request['history_id'],
            'pInfo_id' => $request['pInfo_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(info_history $info_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(info_history $info_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, info_history $info_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        info_history::destroy($id);

       
        return response('deleted');
    }


    public function updateInfoHistory(Request $request, $id)
    {
       
        
        info_history::where('infoHistory_id', $id)->update(
            [
                'history_id' => $request['history_id'],
                'pInfo_id' => $request['pInfo_id'],
                
                'updated_at' => now(),
        ]);

        return response('done');
    }
}
