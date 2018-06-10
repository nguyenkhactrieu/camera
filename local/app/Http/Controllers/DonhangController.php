<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use App\chitiet_donhang;
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

    	$chitiet_dh = new chitiet_donhang();
    	$chitiet_donhang = $chitiet_dh->getChitietdonhang($id);

    	return view('admin.donhang.chitiet_donhang', compact('chitiet','chitiet_donhang'));
    }

    public function postUpdateStatus (Request $req){
    	$donhang = new donhang();
    	$update = $donhang->postUpdateStatus($req->id, $req->trangthai);
    	return redirect()->back();
    }
}
