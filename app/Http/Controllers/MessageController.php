<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        session()->flash('success', 'Message sent successfully!');
        return redirect()->back();
    }

    public function destroy(Message $message)
    {
        if ($message->sender_id !== Auth::id() && $message->receiver_id !== Auth::id()) {
            session()->flash('error', 'Unauthorized action');
            return redirect()->route('messages.show');
        }

        $message->delete();
        session()->flash('success', 'Message deleted successfuly!');

        $userId = $message->sender_id === Auth::id() ? $message->receiver_id : $message->sender_id;
        return redirect()->route('messages.chat', ['userId' => $userId]);
    }

    public function show()
    {
        $userId = Auth::id();
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', Auth::id())
            ->with(['sender', 'receiver'])
            ->latest()
            ->get();

        $conversations = $messages->groupBy(function ($message) use($userId) {
            return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
        });

        return view('messages.show', compact('conversations'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = user::where('name', 'LIKE', "%{$query}%")->where('id', '!=', Auth::id())->get();

        $messages = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->with(['sender', 'receiver'])
            ->latest()
            ->get();

        return view('messages.show', compact('users', 'messages'));
    }

    public function chat ($userId)
    {
        $user = User::findOrFail($userId);
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())
            ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
            ->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        return view('messages.chat', compact('user', 'messages'));
    }
}
