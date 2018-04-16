<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     public function entradas()
    {
        return view('entradas');
    }
     public function salidas()
    {
        return view('salidas');
    }
/*
    public function login()
    {
        return view('auth/login');
    }

*/
}
