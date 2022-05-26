<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserModel extends Model
{
    use HasFactory;

    public function GetUser(Request $request){
        try {
            $user = \DB::table("user")
                ->join("role", "user.id_role", "=", "role.id_role")
                ->where("email", "=", $request->input('email'))
                ->where("password", "=", md5($request->input('password')))
                ->first();

            if(!$user){
                return null;
            }

            $user->admin = $user->name == 'Admin';

            return $user;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route("test");
        }
    }

    public function StoreUser($fn, $ln, $email, $password, $id_role = 2){
        $avatars = ['avatar1.jpg', 'avatar2.png', 'avatar3.png', 'avatar4.png'];

        $avatar = $avatars[rand(0, count($avatars) - 1)];
        try {
            $result = \DB::table('user')->insert([
                'first_name' => $fn,
                'last_name' => $ln,
                'email' => $email,
                'password' => md5($password),
                'id_role' => $id_role,
                'avatar' => $avatar
            ]);

            return $result;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route("test");
        }
    }

}
