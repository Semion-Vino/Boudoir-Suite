<?php

namespace App\Http\Controllers;

use App\boudoir;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\User;
use Session;

class UserController extends MainController
{ #------------------------------------------------------
public function getSignIn()
    {
    self::$viewData['countries'] = boudoir::getCountries();

    self::$viewData['page_title'] = 'Sign In';
    return view('signin', self::$viewData);
}
    #------------------------------------------------------
    public function postSignIn(SignInRequest $request)
    {
        if (User::validate($request['email'], $request['Password'])) {
            $rn = !empty($request['rn']) ? $request['rn'] : '';

            return redirect($rn);
        } else {
            self::$viewData['page_title'] = 'Sign In';
            self::$viewData['sign_error'] = 'That\'s not a match';

            return view('signin', self::$viewData);
        }
    }
    #------------------------------------------------------
    public function logout()
    {
        Session::forget(['user_id', 'user_name', 'is_admin']);
        return redirect('user/signin');
    }
    #------------------------------------------------------
    /*  public function getSignUp()      NO NEED BECAUSE SIGN UP & SIGN IN ARE ON THE SAME PAGE
    {
    // self::$viewData['page_title'] = 'Sign Up';
    self::$viewData['countries'] = boudoir::getCountries();
    dd(self::$viewData);
    return view('signup', self::$viewData);
    }*/

    public function postSignUp(SignUpRequest $request)
    {
        User::save_new($request);
        $rn = !empty($request['rn']) ? $request['rn'] : '';

        return redirect($rn);
    }
}
