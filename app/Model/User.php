<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Foundation\Auth\User as userValidation;
class User extends userValidation
{
//    protected $table='users';

    protected $fillable=['name','email','utype','password','status','skill_id,','image'];

    const ADMIN = 'admin';
    const USER  = 'user';

    public static function role($id){
        $userModel = User::where('id', $id) -> first();
        if($userModel) {
            return $userModel -> utype;
        }
    }
    public static function  hasRole($utype){
       $utype= User::where('utype',$utype);
       if($utype==ADMIN){
           return true;
       }
       return false;

    }
    public function checkRole($role){
        if($this -> utype == $role) {
            return true;
        } else {
            return false;
        }
    }
}

