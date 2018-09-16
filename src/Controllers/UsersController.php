<?php
namespace Controllers;
use Models\User;


class UsersController{

    public function login($username,$password){
        $query = User::where(['email'=>"$username","password"=>"$password"]);
        if($query->exists()){
//                return $query->first()
            header("Location:index.php");
        }
        return false;
    }

    public function logout(){

    }


}

