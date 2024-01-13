<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    //


    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){

//        dd(Post::find(4)->created_at);

        return view('dashboard');
    }
}
