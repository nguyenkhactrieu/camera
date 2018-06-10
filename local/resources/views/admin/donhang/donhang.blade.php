@enxtend('admin.index');

@section('conten')
<div style="text-align: center;" id="quanly">
	<h1>QUẢN LÝ ĐƠN HÀNG</h1>
	<form action="" method="get" name="formchon" id="formchon">
		<input type="hidden" name="key" value="donhang">
		<label style="float: left;" for="timdonhang">Tìm kiếm đơn hàng</label>
		<select style="height: 20px;margin-left: 20px;" name="trangthai" onchange="formchon.submit()">
			<option value="">--Tất cả đơn hàng--</option>
			<option value="Chưa xác nhận">Chưa xác nhận</option>
			<option value="Đã xác nhận" >Đã xác nhận</option>
			<option value="Đang giao hàng">Đang giao hàng</option>
			<option value="Đã giao hàng">Đã giao hàng</option>
		</select>
	</form>
	<table width="100%" cellspacing="0" cellpadding="0">
		<th>Ngày đặt hàng</th>
		<th>Họ và tên</th>
		<th>Điện thoại</th>
		<th>Địa chỉ</th>
		<th>Trạng thái</th>
		<tr>
			<td>
				
			</td>
			<td>hoten</td>
			<td>SDT</td>
			<td>
				
			</td>
			<td style="text-align: right; padding-right: 20px;">
				<i style="color:red" class="fa fa-times-circle" aria-hidden="true"></i>
			
						&nbsp<i style="color:green" class="fa fa-check" aria-hidden="true"></i>
			
						&nbsp<i style="color:blue" class="fa fa-truck" aria-hidden="true"></i>
			
						&nbsp<i style="color:orange" class="fa fa-usd" aria-hidden="true"></i>
			
			</td>
			<td>
	            <div class="btn_chitiet">
	                <a href="index.php?key=chitietdonhang&id=<?php echo $row['idDH']; ?>">
	                    <i class="fa fa-info-circle" aria-hidden="true"></i>&nbspChi tiết
	                </a>
	            </div>
	        </td>
		</tr>

	</table>
</div>
@endsection