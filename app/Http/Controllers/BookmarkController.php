<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store(Request $request, Posting $posting)
        {
            $bookmark = new Bookmark();
            $bookmark->user_id = Auth::id();
            $bookmark->posting_id = $request->posting_id;
            $bookmark->save();

            session()->flash('success', 'Berhasil menambahkan bookmark');
            return redirect()->back();
        }

    public function destroy(Bookmark $bookmark)
    {
        if($bookmark->user_id !== auth::id()){
            session()->flash('error', 'Unauthorized action.');
            return redirect()->route('dashboard');
        }

        $bookmark->delete();
        session()->flash('success', 'bookmark berhasil dihapus');
        return redirect()->route('bookmarks.index');
    }

    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->with('posting.user')->latest()->get();
        return view('bookmarks.show', compact('bookmarks'));
    }
}
