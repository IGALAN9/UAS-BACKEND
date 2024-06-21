<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

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
            'content' => ['required'],
            'video'=>['nullable','mimes:mp4,mov,avi,flv,mkv','max:20480'],
        ]);

        $video_path = null;
        if($request->hasFile('video')){
            $video_path = $request->file('video')->store('videos','public');
        }

        posting::create([
            'user_id'=> auth()->id(),
            'content'=> $request->content,    
            'video_url'=> $video_path,    
        ]);

        session()->flash('success','Berhasil Post');

        return to_route('dashboard');
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

        if ($posting){
            if($posting->video_url){
                Storage::disk('public')->delete($posting->video_url);
            }
            $posting->comments()->delete();
            $posting->delete();
            session()->flash('success','Berhasil menghapus Post');
        } else{
            session()->flash('success','Berhasil menghapus Post');
        }
        return to_route('dashboard');
    }
}
