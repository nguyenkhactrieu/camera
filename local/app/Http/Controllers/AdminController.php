<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\chungloai;
use App\User;
use App\sanpham;
use App\loai;
use Google_Client;
use Google_Service_Analytics; 
class AdminController extends Controller
{

    /*
    |
    |   Đăng nhập admin
    |
     */
    function getSua(){
        $sanpham = sanpham::select('mota','idSP')->get();
        return view ('sua', compact('sanpham'));
    }

    function postSua(Request $req){
        $update = sanpham::where('idSP', $req->idsp)->update(['mota'=>$req->mota]);
        return redirect()->back();
    }


    public function getDangNhapAdmin () {
    	
        if(Auth::check()){
            return redirect()->route('trangchuadmin');
        }else{
            return view('admin.dangnhap.dangnhap');
        }
    }

    public function postDangNhapAdmin (Request $req){

    	$this->validate($req,
            [
                'email'=>'required|',
                'password'=>'required'
            ], 
            [
                'email.required'=>'Nhập email',
                'password.required'=>'Nhập password'
            ]
        );

        $remember = $req->input('remember');

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password, 'level'=>1], $remember)){

            if(Auth::user()->TinhTrang == 1 ){
                return redirect()->route('trangchuadmin');
            }else{
                Auth::logout();
                return redirect()->back()->with(['flag'=>'danger', 'message'=>'TÀI KHOẢN ĐANG BỊ KHÓA, VUI LÒNG LIÊN HỆ QUẢN TRỊ VIÊN']);
            }

        }else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU']);
        }
    }

    /*
    |
    |   Đăng xuất
    |
     */
    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('admin');
    }

    /*
    |
    |   Trang chủ
    |
     */
    public function getTrangChu(){
        require_once $_SERVER['DOCUMENT_ROOT'].'/camera/local/vendor/autoload.php'; 

    // 1. Initialize a client and set scope to our required API (Google Analytics)
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/analytics'));

    // provide the service account JSON file.
    // which holds all required information (private key, email, etc)
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.$_SERVER["DOCUMENT_ROOT"].'/camera/local/app/analytics/service-account-credentials.json');

    // apply the JSON file on the current client
        $client->useApplicationDefaultCredentials();

        if ($client->isAccessTokenExpired()) {
            $client->refreshTokenWithAssertion();
        }

    // an array with information about access token
        $arrayInfo = $client->getAccessToken();

    // access the access token directly
        $accesstoken = $arrayInfo['access_token'];

    // pass the token to the view, to be used for authentication
        return view('admin.trangchu.trangchu', compact('accesstoken'));
    }

    public function getChonChungLoai ($idChungLoai){
        
        $LoaiSanPham = loai::where('idCL', $idChungLoai)->get();

        echo "<option>----Chọn loại----</option>";
        foreach ($LoaiSanPham as $loaisp) {
            echo "<option value='".$loaisp->idLoai."'>".$loaisp->TenLoai."</option>";
        }
    }
    
}
