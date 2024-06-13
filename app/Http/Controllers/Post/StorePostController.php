<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorePostController extends Controller
{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'message' => ['required', 'min:8']
        ]);

        $data['message'] = $request->message;
        $data['user_id'] = $request->user()->id;

        $post= Post::create($data);

        if (!$post){
            return redirect(route('welcome'));
        }

        return redirect(route('dashboard'));
    }
}