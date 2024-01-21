<?php

namespace App\Http\Controllers;

use App\Models\Phr_categoryAttributes;
use App\Models\Phr_formCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhrCategoryAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = phr_categoryAttributes::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formCat_id = phr_formCategories::where('formCat_id', $request['formCat_id'])->first()->formCat_id;

        $latestorder = phr_categoryAttributes::where('formCat_id', $formCat_id)->count();
        
        $currentId =  $formCat_id . 'CA' . $latestorder;

        if( !empty(phr_categoryAttributes::select('categoryAtt_id')->where('categoryAtt_id', $currentId)->first()->categoryAtt_id)){
        do{
            $latestorder++;
            $categoryAtt_id = $formCat_id . 'CA' . $latestorder;
            $id = phr_categoryAttributes::select('categoryAtt_id')->where('categoryAtt_id', $categoryAtt_id)->first();
         
        }while(!empty($id));
        }
         $newId = $formCat_id . 'CA' . $latestorder;

         phr_categoryAttributes::insert([
            'categoryAtt_id' => $newId,
            'categoryAtt_name' => $request['categoryAtt_name'],
            'categoryAtt_dataType' => $request['categoryAtt_dataType'],
            'formCat_id' => $request['formCat_id'],

            
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        $action ='added a new categoryAttribute';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(phr_categoryAttributes $phr_categoryAttributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phr_categoryAttributes $phr_categoryAttributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $action ='deleted a categoryAttribute-'. $id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        phr_categoryAttributes::destroy($id);

       
        return response('deleted');
    }


    public function getAttributeName($categoryAtt_id)
    {
        $AttributeName = phr_categoryAttributes::where('categoryAtt_id', $categoryAtt_id)->first()->categoryAtt_name;


        return $AttributeName;
    }
}
