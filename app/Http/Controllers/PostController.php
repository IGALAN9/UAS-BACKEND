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
    
    public function store(Request $request)
{
    $this->validate($request, [
        'content' => ['required'],
        // 'photo' => ['image'],
        'media'=> ['nullable', 'file', 'mimes:jpeg,png,mp4,mov,ogg,qt']
    ]);

    $photo = null;
    $video = null;

    // if ($request->hasFile('photo')) {
    //     $photo = $request->file('photo')->store('photos', 'public');
    // }

    // if ($request->hasFile('video')) {
    //     $video = $request->file('video')->store('videos', 'public');
    // }

    if ($request->hasFile('media')) {
        $file = $request->file('media');
        $mime = $file->getMimeType();

        if(strpos($mime,'image')!==false){
            $photo = $file->store('photos','public');
        }
        elseif(strpos($mime,'video')!==false){
            $video = $file->store('videos','public');
        }
    }


    Posting::create([
        'user_id' => auth()->id(),
        'content' => $request->content,
        'photo' => $photo,
        'video' => $video,
    ]);

    session()->flash('success', 'Berhasil Post');

    return redirect()->route('dashboard');
    }

    public function edit($id){
        return view('postings.edit',[
            'posting' => Posting::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'content' => ['required']
        ]);

        $posting = Posting::find($id);
        
        $posting->update([
            'user_id'=> auth()->id(),
            'content'=> $request->content,        
        ]);

        session()->flash('success','Berhasil memperbarui Post');

        return to_route('dashboard');
    }

    public function destroy($id){
        $posting = Posting::find($id);

            if (!$posting){
                session()->flash('success','Postingan tidak di temukan');
                return redirect()->route('dashboard');
            }

            if($posting->user_id !== auth()->id()){
                session()->flash('success','Tidak diijinkan menghapus posting');
                return redirect()->route('dashboard');
            }

            $posting->comments()->delete();
            $posting->delete();
            session()->flash('success','Berhasil menghapus Post');
        return to_route('dashboard');
    }

    public function show(Posting $posting){
        $posting -> load('comments.user');

        return view('postings.show', compact('posting'));
    }
}
