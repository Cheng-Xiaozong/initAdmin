<?php

namespace App\Http\Controllers\User;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $User;
    public function __construct(UserService $user)
    {
        $this->User=$user;
    }

    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            
        }
        return view('user.login');
    }

}
