<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
class SlideController extends Controller
{
    public function getDanhsach () {
    	$slide = new slide();
    	$danhsach = $slide->getDanhsach();
    	return view('admin.slider.slide', compact('danhsach'));
    }

    public function getUpdateSlide ($id) {
    	$slide = new slide();
    	$update = $slide->getUpdateSlide($id);
    	return redirect()->back();
    }

    public function getThemslide () {
    	return view('admin.slider.them');
    }

    public function postThemslide (Request $req) {
    	$slide = new slide ();
    	$them = $slide->postThemslide($req);
    	return redirect()->back();
    }
}
