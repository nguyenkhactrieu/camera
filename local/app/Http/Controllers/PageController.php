<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\sanpham;
use App\loai;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Cart;
use DB;
use File;
use App\donhang;
use App\chitiet_donhang;
class PageController extends Controller
{
    /*function __construct (sanpham $sanpham){
        //
    }*/
    public function banggia()
    {
        return view('page.banggia');
    }

    public function gioithieu()
    {
        return view('page.gioithieu');
    }

    public function lienhe()
    {
        return view('page.lienhe');
    }


    public function getIndex(){
        $sanpham = new sanpham();
        $sanpham = $sanpham->getTatCaSanPham(); //
        return view('page.trangchu', compact('sanpham'));
        
    }
    public function getLoaiSanPham ($slug_loai){
        
        $loai = new sanpham();
        list($SP_TheoLoai,$TenLoai) = $loai->getLoaiSanPham($slug_loai);
        /*
        |
        |   lấy 5 sản phẩm có lượt xem nhiều nhất
        |
         */
        $sanpham_xemnhieu = $loai->getSanPhamXemNhieu();
        return view('page.loaisanpham', compact('SP_TheoLoai','sanpham_xemnhieu','TenLoai'));
    }
    // chi tiet san pham
    public function getChiTiet(Request $req){
        
    	$sanpham = new sanpham();
        $chitietsanpham = $sanpham->getChiTietSanPham($req->slug_sp);
        /*
        |
        |   Nếu slug_sanpham không tồn tại thì thông báo lỗi
        |
        */
        if($chitietsanpham == null){
            return view('errors.404'); 
        }else{
            $sp_cungloai = $sanpham->getSanPhamCungLoai($req->slug_sp);
            return view('page.chitietsanpham', compact('chitietsanpham','sp_cungloai')); 
        }
    }

    public function getDanhGia($id , $value){

        $danhgia = new sanpham();
        $solanchon = $danhgia->getDanhGia($id, $value);

        echo '<span>'.round (($solanchon->DiemTrungBinh),1).'/10'.' ('.$solanchon->SoLanChon .' Lượt)'.'</span>';
    }
    public function getDangNhap(){
        if(Auth::check()){
            return redirect()->route('trang-chu');
        }else{
            return view('page.dangnhap');
        }
    }

    public function postDangNhap(Request $req){
        /*
        |
        |   kiểm tra dữ liệu nhập vào
        |
         */
        $this->validate($req,
            [
                'email'=>'required|',
                'password'=>'required'
            ], 
            [
                'email.required'=>'nhap email',
                'password.required'=>'nhap password'
            ]
        );
        
        $remember = $req->input('remember');
        //('email-cot trong database')
        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password], $remember)){
            if(Auth::user()->TinhTrang == 1 ){
                return redirect()->route('trangchuadmin');
            }else{
                Auth::logout();
                return redirect()->back()->with(['flag'=>'danger', 'message'=>'TÀI KHOẢN ĐANG BỊ KHÓA, VUI LÒNG LIÊN HỆ QUẢN TRỊ VIÊN']);
            }
        }else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'EMAIL HOẶC MẬT KHẨU KHÔNG ĐÚNG']);
        }
    }
    // dang xuat
    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    // dang ki 
    public function getDangKi(){
        return view('page.dangki');
    }
    public function postDangKi(Request $req){
        $hoten = str_slug($req->hoten);
        $this->validate($req,
            [
                'email' => 'required|email',
                'password'=>'required|min:6|max:24',
                're_passwordi'=>'required|same:password',
                'hoten' =>'required',
                
            ],
            [   

                'email.required'=>'nhập email',
                'email.email'=>'nhập email ko đúng',
                'password.required'=>'nhập password',
                'password.min'=>'Mật khẩu lớn hơn 6 kí tự',
                'password.max'=>'Mật khẩu nhỏ hơn 24 kí tự',
                're_passwordi.same'=>'Nhập lại không đúng',
                're_passwordi.required'=>'nhập lại password',
                'hoten.required'=>'nhập họ tên',
            ]
        );

        $user = new User();
        if($check = User::where('email', $req->email)->count()){
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Email đã tồn tại']);
        }else{
            if(isset($req->groups)){
                $user->level = $req->groups;
            }
            $user->Email = $req->email;
            $user->Password = Hash::make($req->password);
            $user->name = $req->hoten;
            $user->slug = $hoten;
            $user->save();

            return redirect()->back()->with(['flag'=>'success', 'message'=>'ĐĂNG KÍ TÀI KHOẢN THÀNH CÔNG']);
        }
    }
    public function getDoiMatKhau () {
        if(Auth::check()){
            return view('page.doimatkhau');
        }else{
            return redirect()->route('trang-chu');
        }
    }
    public function postDoiMatKhau (Request $req) {
        $this->validate($req,
            [
                'password'=>'required|min:6|max:24',
                'new_password'=>'required|min:6|max:24',
                'new_password_2'=>'required|same:new_password',
            ],
            [   
                'password.required'=>'Vui lòng nhập mật khẩu cũ',
                'password.min'=>'Mật khẩu phải lớn hơn 6 kí tự',
                'password.max'=>'Mật khẩu phải nhỏ hơn 24 kí tự',

                'new_password.required'=>'Vui lòng nhập mật khẩu mới',
                'new_password.min'=>'Mật khẩu phải lớn hơn 6 kí tự',
                'new_password.max'=>'Mật khẩu phải nhỏ hơn 24 kí tự',

                'new_password_2.same'=>'Nhập lại mật khẩu không đúng',
                'new_password_2.required'=>'Vui lòng nhập lại mật khẩu',
            ]
        );
        $change_Pass = new User();
        $change_Pass = $change_Pass->postDoiMatKhau($req);
        if($change_Pass == 0){
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Mật khẩu cũ không đúng']);
        }else{
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Đổi mật khẩu thành công']);
        }
    }

    public function getAvatar () {
        return view('page.avatar');
    }

    public function postAvatar (Request $req) {
        $file = $req->file('avatar');
        $time = time();
        // path
        $file_path = 'images/avatar/'.$time.$file->getClientOriginalName('avatar');

        //size 
        $file_size = $file->getClientSize('avatar');
        // type
        $file_type = $file->getClientMimeType('avatar');
        
        

        if($file_size <= 3145728 && $file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/png'){
            
            $file->move('source/images/avatar', $file_path);
            /*
            |   Delete old image
            */
            if(File::exists('source/'.Auth::user()->UrlHinh)){
                File::delete('source/'.Auth::user()->UrlHinh);
            }
            if(User::where('id', Auth::user()->id)->update([
                'UrlHinh'=> $file_path])){
                return redirect()->back()->with(['flag'=>'success', 'message'=>'Đổi ảnh thành công']);
            }
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đổi ảnh không thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đổi ảnh không thành công']);
        }
    }
}
