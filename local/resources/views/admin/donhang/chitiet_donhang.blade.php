@extends('admin.index')
@section('content')
<div id="quanly">
	<h1 style="text-align: center;">ĐƠN HÀNG</h1>
	<p> <b>Họ tên: &nbsp </b> <span>{{$chitiet->HoTen}}</span></p>
	<p><b>Số điện thoại:&nbsp</b> <span>{{$chitiet->SDT}}</span></p>
	<p><b>Ngày đặt hàng:&nbsp</b> <span>{{$chitiet->NgayDatHang}}</span></p>
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
			<form action="" method="get" name="formchon" id="formchon">

				<input type="hidden" name="key" value="chitietdonhang">
				<input type="hidden" name="id" value="">
				<label style="float: left;" for="timdonhang">Cập nhật trạng thái đơn hàng</label>
				<select style="height: 20px;margin-left: 20px;" name="trangthai" onchange="formchon.submit()">
					<option value="">--Trạng thái đơn hàng--</option>
					<option value="Chưa xác nhận">Chưa xác nhận
					</option>
					<option value="Đã xác nhận">Đã xác nhận
					</option>
					<option value="Đang giao hàng">Đang giao hàng
					</option>
					<option value="Đã giao hàng">Đã giao hàng
					</option>
				</select>
			</form>
		</div>
	<div id="main-cart" style="margin-top: 60px">
			<ul>
				<li>
					<div id="img_name">
						<div id="img"><img width="100px;" src=""></div>
						<div id="name_gia">
							<p style="color:black"></p>
							<p style=""></p>
								<p style="color:#1b1b1b5b"><strike></strike></p> 
						</div>
					</div>
					<div id="del_sl">
						<div id="sl">
							<label for="">Số Lượng: </label>
							<input id="show_sl" type="text" disabled value="">
						</div>
					</div>
				</li>
			</ul>
	</div>
		<div id="tongtien">
			<span>Tổng tiền:</span><span id="tong"></span>
		</div>
</div>
@endsection