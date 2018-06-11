<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function getDanhSach () {
    	$user = new User();
    	$user = $user->getUser();
    	return view('admin.user.user', compact('user'));
    }

    public function getsua ($id) {
        $author = User::where('id', $id)->select('author','id')->first();
        if(Auth::user()->author != 1 && ($author->author == 1 || (Auth::user()->author == 2 && (Auth::user()->id != $id )  ) )){
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'KHÔNG CÓ QUYỀN SỬA']);
        }
    	$user = new User();
    	$user = $user->getSua($id);
    	return view('admin.user.sua', compact('user'));
    }

    public function postsua (Request $req) {
    	$user = new User();
    	$user = $user->postSua($req);
    	return redirect()->route('user');
    }

    public function getThemUser () {
        return view('admin.user.them');
    }

    public function getXoaUser ($id) {
        $user_del = User::where('id', $id)->delete();
        return redirect()->back();
    }
}
