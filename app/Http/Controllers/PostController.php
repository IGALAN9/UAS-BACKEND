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
    $this->validate($request, [
        'content' => ['required'],
        'photo' => ['image'],
    ]);

    $photo = null;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('photos', 'public');
    }

    Posting::create([
        'user_id' => auth()->id(),
        'content' => $request->content,
        'photo' => $photo,
    ]);

    session()->flash('success', 'Berhasil Post');

    return redirect()->route('dashboard');
}

}
