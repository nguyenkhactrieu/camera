@extends('admin.index')
@section('content')
<div id="quanly">
	<h1 style="text-align: center;">ĐƠN HÀNG</h1>
	<p> <b>Họ tên: &nbsp </b> <span>{{$chitiet->HoTen}}</span></p>
	<p><b>Số điện thoại:&nbsp</b> <span>{{$chitiet->SDT}}</span></p>
	<p><b>Ngày đặt hàng:&nbsp</b> <span>{{date('d/m/Y h:m:s',strtotime($chitiet->NgayDatHang))}}</span></p>
	<p><b>Địa chỉ giao hàng:&nbsp</b><span>{{$chitiet->SoNha}}</span></p>
	<p><b>Trạng thái đơn hàng:&nbsp</b>

			@switch($chitiet->TrangThai)
			@case(0)
				<span>Chưa xác nhận</span>
			@break
			@case(1)
				<span>Đã xác nhận</span>
			@break
			@case(2)
				<span>Đang giao hàng</span>
			@break
			@case(3)
				<span>Đã giao hàng</span>
			@break
			@endswitch
	</p>
	<div id="trangthaidonhang" style="float: right;">
			<form action="{{route('updateStatus')}}" method="post" name="formchon" id="formchon">

				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="id" value="{{$chitiet->idDH}}">

				<label style="float: left;" for="timdonhang">Cập nhật trạng thái đơn hàng</label>
				<select style="height: 20px;margin-left: 20px;" name="trangthai" onchange="formchon.submit()">
					<option value="0">--Trạng thái đơn hàng--</option>
					<option value="0" <?php if($chitiet->TrangThai == 0 ) echo 'selected' ?> >Chưa xác nhận
					</option>
					<option value="1" <?php if($chitiet->TrangThai == 1 ) echo 'selected' ?> >Đã xác nhận
					</option>
					<option value="2" <?php if($chitiet->TrangThai == 2 ) echo 'selected' ?> >Đang giao hàng
					</option>
					<option value="3" <?php if($chitiet->TrangThai == 3 ) echo 'selected' ?> >Đã giao hàng
					</option>
				</select>
			</form>
		</div>
	<div id="main-cart" style="margin-top: 60px">
			<ul>
				<?php $tongtien = 0 ?>
				@foreach($chitiet_donhang as $chitiet_dh)
				<?php $tongtien = $tongtien + $chitiet_dh->Gia;  ?>
				<li>
					<div id="img_name">
						<div id="img">
							<img width="100px;" src="source/{{$chitiet_dh->UrlHinh}}">
						</div>
						<div id="name_gia" style="float:left;">
							<p style="color:black">{{$chitiet_dh->TenSP}}</p>
							<p style="">Giá: {{number_format($chitiet_dh->Gia)}} VND</p>
							<p style="color:#1b1b1b5b"><strike></strike></p> 
						</div>
					</div>
					<div id="del_sl">
						<div id="sl">
							<label for="">Số Lượng:  </label>
							<input id="show_sl" type="text" disabled value="{{$chitiet_dh->SoLuong}}">
						</div>
					</div>
				</li>
				@endforeach
			</ul>
	</div>
		<div id="tongtien">
			<span>Tổng tiền:</span><span id="tong">{{number_format($tongtien)}} VND</span>
		</div>
</div>
@endsection