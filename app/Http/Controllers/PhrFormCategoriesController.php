<?php

namespace App\Http\Controllers;

use App\Models\phr_formCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class PhrFormCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = phr_formCategories::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $latestorder = phr_formCategories::all()->count();
        $currentId =  'FC' . $latestorder;

        if( !empty(phr_formCategories::select('formCat_id')->where('formCat_id', $currentId)->first()->formCat_id)){
        do{
            $latestorder++;
            $formCat_id = 'FC' . $latestorder;
            $id = phr_formCategories::select('formCat_id')->where('formCat_id', $formCat_id)->first();
         
        }while(!empty($id));
        }
         $newId = 'FC' . $latestorder;
         
         phr_formCategories::insert([
           
            'formCat_id' => $newId,
            'formCat_name' => $request['formCat_name'],
            'formCat_description' => $request['formCat_description'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $action ='added a new par';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(phr_formCategories $phr_formCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phr_formCategories $phr_formCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $action ='deleted a formCategory-'. $id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        phr_formCategories::destroy($id);

       
        return response('deleted');
    }


    public function getCategoryName($formCat_id)
    {
        $name = phr_formCategories::where('formCat_id', $formCat_id)->first()->formCat_id;


        return response()->json($name);
    }
}
