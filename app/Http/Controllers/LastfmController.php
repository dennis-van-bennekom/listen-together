<?php

namespace App\Http\Controllers;

use App\Api\Lastfm;

class LastfmController extends Controller
{
    public function authenticate()
    {
        $token = request()->query('token');

        $lastfm = new Lastfm;

        $session = $lastfm->getSession($token);

        session(['name' => $session['name']]);
        session(['session' => $session['key']]);

        return redirect()->route('listen');
    }

    public function listen()
    {
        $session = session('session');

        if (!$session) return redirect()->route('home');

        return view('listen');
    }

    public function current()
    {
        $lastfm = new Lastfm;

        return array_merge($lastfm->current(), [
            'name' => session('name')
        ]);
    }
}
