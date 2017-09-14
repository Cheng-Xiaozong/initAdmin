<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //主页内容
    public function index()
    {
        return view('home.index');
    }

    //iframe框架内容
    public function home()
    {
        return view('home.home');
    }
}
