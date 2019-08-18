<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser()
    {
        $users = DB::table('user')->get();

        return $users;
    }

    public static function getUserById($id)
    {
        $results = DB::select("select * from user where uid = ?", [$id]);
        foreach ($results as $user)
        {
            return var_dump($user->name);
        }
    }
}
