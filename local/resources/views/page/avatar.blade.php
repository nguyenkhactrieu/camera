@extends('master')
@section ('title')
    Đổi ảnh đại diện
@endsection
@section('content')
<div id="login">
    <div id="login_bg"></div>
    <div id="formlogin">
        <h3 align="center">ĐỔI ẢNH ĐẠI DIỆN</h3>
        <div class="form">
        <form method="post" action="{{route('doianhdaidien')}}" name="avatar" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(Session::has('flag'))
        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        @endif
        	<label>Chọn ảnh </label> 
        	<input type="file" name="avatar" id="avatar" />
        	<input style="height: 40px; width: 100px;" align="center" type="submit" name="submit_login" id="btnLogin" value="Thay đổi"/>
        </form>
        </div>
    </div> 
</div>
@endsection