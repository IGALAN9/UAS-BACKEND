<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Posting;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Posting $posting)
    {
        $request -> validate([
            'message' => 'required|string',
        ]);

        $comment = new Comment();
        $comment -> message = $request -> message;
        $comment -> user_id = auth() -> id();

        $posting -> comments() -> save($comment);

        return redirect()->route('postings.show', $posting->id)->with('success','berhasil menambahkan komentar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
