<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class SessionsController extends Controller
{
    public function create()
    {
        if (Auth::check())
            return Redirect::to('/admin');
        else
            return View::make('sessions.create');
    }

    public function store()
    {
        if (Auth::attempt(Input::only('email', 'password'))) {
            return Redirect::intended('/admin');
        } else {
            return 'Failed!';
        }
    }

    public function destroy()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
