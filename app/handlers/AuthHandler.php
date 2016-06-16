<?php

namespace app\handlers;

use app\helper\Auth;
use app\helper\Link;
use app\helper\Redirect;
use Pecee\Http\Middleware;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthHandler implements IMiddleware {
    public function handle(Request $request)
    {
        if(!Auth::isAuth()) {
            Redirect::url('UserController@login');
        }
    }
}