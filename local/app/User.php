<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Hash;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function getUser(){
        $user = User::Paginate(5);
        return $user;
    }

    function getSua ($id) {
        $user = User::where('id', $id)->first();
        return $user;
    }

    function postSua ($req){
        $user = User::where('id',$req->idUser)->update([
            'author' => $req->author,
            'name' => $req->hoten,
            'TinhTrang' => $req->tinhtrang,
            'slug'=> str_slug($req->hoten)
        ]);
    }

    function postDoiMatKhau ($req) {
        if(hash::check($req->password, Auth::user()->password)){

            $update_password = User::where('id',Auth::user()->id)->update([
                'password'=> Hash::make($req->new_password)
            ]);
            return $check = 1;
        }else{
            return $check = 0;
        }
    }
}
