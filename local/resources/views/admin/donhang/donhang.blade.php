@extends('admin.index');
@section('content')
<div style="text-align: center;" id="quanly">
	<h1>QUẢN LÝ ĐƠN HÀNG</h1>
	<form action="{{route('timtheoid')}}" method="post" style="float: left;" >
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<label style="float: left;" for="timdonhang">Tìm kiếm đơn hàng:&nbsp</label>
		<input type="text" name="id_donhang" style="float: left;">
		<input type="submit" name="search_iddh" value="Tìm" style="float: left;height: 20px;">
	</form>
	<div style="clear: both;"></div>
	@if(Session::has('flag'))
	<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
	@endif
	<table width="100%" cellspacing="0" cellpadding="0">
		<th>Mã đơn hàng</th>
		<th>Họ và tên</th>
		<th>Điện thoại</th>
		<th>Trạng thái</th>
		@foreach($danhsach as $danhsachDH)
		<tr>
			<td>{{$danhsachDH->idDH}}</td>
			<td>{{$danhsachDH->HoTen}}</td>
			<td>{{$danhsachDH->SDT}}</td>
			
			<td style="text-align: right; padding-right: 20px;">
				@switch($danhsachDH->TrangThai)
				@case(0)
				<span style="color:red;">Chưa xác nhận</span>&nbsp<i style="color:red" class="fa fa-times-circle" aria-hidden="true"></i>
				@break
				@case(1)
				<span style="color:green;" >Đã xác nhận</span>&nbsp<i style="color:green" class="fa fa-check" aria-hidden="true"></i>
				@break
				@case(2)
				<span style="color:blue;">Đang giao hàng</span>&nbsp<i style="color:blue" class="fa fa-truck" aria-hidden="true"></i>
				@break
				@case(3)
				<span style="color:orange;">Đã giao hàng</span>&nbsp<i style="color:orange" class="fa fa-usd" aria-hidden="true"></i>
				@break
				@endswitch
			</td>
			<td>
				<div style="text-align: center;">
					<a href="admin/don-hang/chi-tiet/{{$danhsachDH->idDH}}">
						<i class="fa fa-info-circle" aria-hidden="true" style="color: #CC57F8"></i>
					</a>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection