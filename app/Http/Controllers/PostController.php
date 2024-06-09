<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PostController extends Controller
{
    use ValidatesRequests;
    public function index()
        {
            return view('dashboard',[
                'postings' => Posting::latest()->get(),
                ]);
        }

    public function show($posting)
    {
        return view('postings.show',[
            'posting' => Posting::find($posting),
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => ['required']
        ]);
        posting::create([
            'user_id'=> auth()->id(),
            'content'=> $request->content,        
        ]);

        session()->flash('success','Berhasil Post');

        return to_route('dashboard');
    }
}
