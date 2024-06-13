<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class Post_LikeController extends Controller
{
    public function like(Posting $posting){
        $liker = auth()->user();

        $liker->likes()->attach($posting);

        return redirect()->route('dashboard')->with('success',"liked successfully!");
    }

    public function unlike(Posting $posting){
        $liker = auth()->user();

        $liker->likes()->deattach($posting);

        return redirect()->route('dashboard')->with('success',"liked successfully!");
    }
}

