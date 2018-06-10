<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\sanpham;
class chitiet_donhang extends Model
{
    protected $table = 'webma_chitietdh';

    public function donhang (){
    	return $this->belongTo('App\donhang', 'idDH', 'idDH');
    }

    public function getChitietdonhang ($id) {
   		$chitiet = chitiet_donhang::where('idDH', $id)
   		->join('webma_sanpham', 'webma_sanpham.idSP','=','webma_chitietdh.idSP')
   		->select('webma_sanpham.UrlHinh','webma_sanpham.TenSP', 'webma_chitietdh.Gia', 'webma_chitietdh.SoLuong')
   		->get();
   		return $chitiet;
   	}
}
