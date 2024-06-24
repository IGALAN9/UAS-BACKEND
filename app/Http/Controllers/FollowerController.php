<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();

        if(!$follower-> isFollowing($user)){
            $follower->following()->attach($user);
        }

        return redirect()->back()->with('success', "User followed successfully!");
    }

    public function unfollow(User $user){
        $follower = auth()->user();

        $follower -> following()-> detach($user);

        return redirect()->back()->with('success', "User unfollowed successfully!");
    }

    public function following(User $user)
    {
        $following = $user->following()->get();
        return view('showfollow.following', compact('user', 'following'));
    }

    public function followers(User $user)
    {
        $followers = $user->followers()->get();
        return view('showfollow.followers', compact('user', 'followers'));
    }

    public function show(User $users){
        $akun_sendiri = auth() ->user();

        $users = User::where('id' ,'!=', $akun_sendiri -> id)-> get();

        return view('suggestion', compact('users'));
    }
}
