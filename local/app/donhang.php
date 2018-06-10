<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
   	protected $table = 'webma_donhang';

   	public function chitietdonhang (){
   		return $this->hasMany('App\chitiet_donhang', 'idDH', 'idDH');
   	}

   	public function getDanhsachdonhang () {
   		$danhsach_donhang = donhang::orderby('TrangThai')->get();
   		return $danhsach_donhang;
   	}

   	public function getChitietdonhang ($id) {
   		$chitiet = donhang::where('idDH', $id)->select('HoTen', 'SDT' , 'NgayDatHang', 'SoNha', 'TrangThai', 'idDH')->first();
   		return $chitiet;
   	}
   	public function postTimkiem_id ($id) {
   		$danhsach_donhang = donhang::where('idDH', $id)->get();
   		return $danhsach_donhang;
   	}

   	public function postUpdateStatus ($id, $status) {
   		$update = donhang::where('idDH', $id)->update(['TrangThai'=>$status]);

   	}
}
