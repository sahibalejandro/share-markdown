<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class WelcomeController extends Controller
{
    /**
     * WelcomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('welcome.index');
    }
}
