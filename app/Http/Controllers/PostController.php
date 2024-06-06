<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
        {
            return view('dashboard',[
                'postings' => Posting::latest()->get(),
                ]);
        }
    
    public function store(Request $request)
    {
        posting::create([
            'user_id'=> auth()->id(),
            'content'=> $request->content,        
        ]);

        return to_route('dashboard');
    }
}
