<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
class ApiController extends Controller
{
    //
    public function search(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $search_keyword = $request->input('search_keyword');

        // if name is (1) then the description is also (1)
        // or name is 1 and description doesnt exit or zero
        if ($name == 1 && $description == 1) {
            $search_result = Business::where(
                'name',
                'like',
                '%' . $search_keyword . '%'
            )
                ->orwhere(
                    'description',
                    'like',
                    '%' . $search_keyword . '%'
                )->orderBy('id', 'desc')->get();
            if (count($search_result) == 0) {
                $search_result = ["message" => 'search not found'];
            }
        } elseif ($name == 1) {
            $search_result = Business::where(
                'name',
                'like',
                '%' . $search_keyword . '%'
            )->orderBy('id', 'desc')->get();
            if(count($search_result) == 0 ){
                $search_result = ["message" => 'search not found'];
            }
        } elseif ($description == 1) {
            $search_result = Business::where(
                'description',
                'like',
                '%' . $search_keyword . '%'
            )->orderBy('id', 'desc')->get();
            if (count($search_result) == 0) {
                $search_result = ["message" => 'search not found'];
            }
        } else {
            $search_result = ["message" => 'you can only search by name or description'];
        }
        // if($search_result == null){
        //     $search_result = ["message" => 'search not found'];
        //     return response()->json(['result' => $search_result]);
        // }else{

        // }
        return response()->json(['result' => $search_result]);


    }
}
