<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    protected $table = 'webma_slide';

    public function getDanhsach () {
    	$slide = slide::all();
    	return $slide;
    }

    public function getUpdateSlide ($id) {
    	$status = slide::where('idSL', $id)->select('TrangThai')->first();
    	if($status->TrangThai == 1){
    		$update = slide::where('idSL', $id)->update(['TrangThai'=>0]);
    	}else{
    		$update = slide::where('idSL', $id)->update(['TrangThai'=>1]);
    	}
    	return true;
    }

    public function postThemslide ($req) {
    	$file = $req->file('img_slide');
    	$time = time();
    	// path
        $file_path = 'img/'.$time.$file->getClientOriginalName();
        //size 
        $file_size = $file->getClientSize();
        // type
        $file_type = $file->getClientMimeType();
        
        if($file_size <= 3145728 && $file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/png'){
            
            $file->move('source/admin/ql_slider/img', $file_path);

            $slide = new slide();
            $slide->UrlHinh = $file_path;
            $slide->save();
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Thêm ảnh thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đổi ảnh không thành công']);
        }
    }
}
