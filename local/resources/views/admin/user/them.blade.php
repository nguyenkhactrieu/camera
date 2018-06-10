@extends('admin.index')

@section('content')
<div id="them">
	<h1>THÊM USER</h1>
	<div id="wrapper_users">
		@if(Session::has('flag'))
            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        @endif
		<form action="{{route('themUser')}}" method="post" id="formU" name="suaUsers">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div id="idGroup" class="items-input">
				<div class="label"><label for="level">Cấp độ</label></div>
				<div class="input">
					<select name="groups" id="">
						<option value="">----Chọn Group User----</option>
						<option value="0" selected="selected">Người dùng thường</option>
						<option value="1">SupperAdmin</option>
						<option value="2">Admin</option>
					</select>
				</div>
				<div style="clear: both;"></div>
			</div><hr>
			<input type="hidden" name="idUser">
			<div id="hoten" class="items-input">
				<div class="label"><label for="hoten">Họ Tên</label></div>
				<div class="input"><input type="text" name="hoten" id="hoteni" placeholder="Nhập họ tên">&nbsp<span></span></div>
				<div style="clear: both;"></div>
			</div><hr>
			
			<div id="email" class="items-input">
				<div class="label"><label for="email">Email</label></div>
				<div class="input"><input type="text" id="emaili" name="email" placeholder="Nhập Email">&nbsp<span></span></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div id="password" class="items-input">
				<div class="label"><label for="password">Password</label></div>
				<div class="input"><input type="password" id="passwordi" name="password" placeholder="Nhập password">&nbsp<span></span></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div id="re_password" class="items-input">
				<div class="label"><label for="re_password">Nhập lại password</label></div>
				<div class="input"><input type="password" id="re_passwordi" name="re_passwordi" placeholder="Nhập lại password">&nbsp<span></span></div>
				<div style="clear: both;"></div>
			</div><hr>
			<div>
				<input class="btn_them" style="color:white;font-weight: bold;" type="submit" id="submitU" name="themUsers" value="Thêm">
			</div>
		</form>
	</div>
</div>
@endsection