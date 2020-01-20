<?php

namespace App;

use DB;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Session;

class User extends Model
{
    public static function validate($email, $password)
    {
        $valid = false;

        $user = DB::table('users as u')
            ->join('user_permissions as up', 'u.id', '=', 'up.uid')
            ->join('permissions as p', 'p.id', '=', 'up.pid')
            ->select('u.*', 'p.kind', 'up.pid')
            ->where('u.email', '=', $email)
            ->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                $valid = true;
                Session::put('user_name', $user->firstName);
                Session::put('user_id', $user->id);
                if ($user->kind == 'Admin') {
                    Session::put('is_admin', true);
                }
            }
        }

        return $valid;
    }

    public static function save_new($request)
    {
        $user = new self();
        $user->firstName = ucfirst($request['firstName']);
        $user->lastName = ucfirst($request['lastName']);
        $user->email = $request['e-mail'];
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permissions')->insert(
            [
                'uid' => $user->id,
                'pid' => 3
            ]
        );
        Session::put('user_name', $request['firstName']);
        Session::put('user_id', $user->id);
    }
}
