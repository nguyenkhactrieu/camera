@extends('master')
@section ('title')
    Đổi mật khẩu
@endsection
@section('content')
<div id="login">
    <div id="login_bg"></div>
    <div id="formlogin">
        <h3 align="center">ĐỔI MẬT KHẨU</h3>
        <div class="form">
        <form method="post" action="{{route('doimatkhau')}}" name="formlogin">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
        @if(Session::has('flag'))
        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        @endif
            <table width="100%" id="dangnhap" >
                <tr>
                    <td>
                    	<input type="password" name="password" id="logUsername" placeholder="Mật khẩu cũ" />
                    	<span class="error" style="display: none;">Nhập mật khẩu cũ</span>
                    </td> <br />
                </tr>
                <tr>
                    <td>
                        <input type="password" name="new_password" id="logPassword1" placeholder="Mật khẩu mới"  />
                        <span class="error" style="display: none;">Nhập mật khẩu mới</span>
                    </td>
                <tr>

                <tr>
                    <td>
                        <input type="password" name="new_password_2" id="logPassword" placeholder="Nhập lại mật khẩu mới" />
                        <span class="error" style="display: none;">Nhập lại mật khẩu mới</span>
                        <span class="error" style="display: none;">Mật khẩu mới không đúng</span>
                    </td>
                <tr>
                    <td><input style="height: 40px; width: auto;" align="center" type="submit" name="submit_login" id="btnLogin" value="Đổi mật khẩu"/></td>
                </tr>
            </table>
        </form>
        </div>
    </div> 
</div>
@endsection