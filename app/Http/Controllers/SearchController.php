<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function showSearchPage(){
        return view('search.search');
    }

    public function search(Request $request){
        $query = $request -> input('query');
        $users = User::where('username', 'LIKE', "%$query%")->get();

        if($users -> isEmpty()){
            return response()->json(['message'=> 'Username not found.'], 404);
        }

        return response()->json($users);
    }
}
