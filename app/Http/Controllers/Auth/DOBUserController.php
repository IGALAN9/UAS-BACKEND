<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DOBRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DOBUserController extends Controller
{
    public function store(DOBRequest $request): RedirectResponse{
        $validated = $request -> validated();

        if(Auth::attempt(['dob' => $validated ['dob']])){
            return redirect()-> intended ('dashboard');
        }

        return back() -> withErrors([
            'dob' => 'Error',
        ]);
    }
}