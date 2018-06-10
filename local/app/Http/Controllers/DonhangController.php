<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;

class DonhangController extends Controller
{
	public function getDanhsach() {
		$donhang = new donhang ();
	    $danhsach = $donhang->getDanhsachdonhang();
	    return view('admin.donhang.donhang', compact('danhsach'));
	}
    public function postTimkiem_id (Request $req) {
    	$donhang = new donhang ();
    	$danhsach = $donhang->postTimkiem_id($req->id_donhang);
    	return view('admin.donhang.donhang', compact('danhsach'));
    }
    public function getChitietdonhang ($id) {
    	$chitiet_donhang = new donhang();
    	$chitiet = $chitiet_donhang->getChitietdonhang($id);

    	return view('admin.donhang.chitiet_donhang', compact('chitiet'));
    }
}
