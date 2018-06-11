@extends('admin.index')
@section('content')
<div id="quanly" style="text-align: center;">
	<h1>Quản lý Slide</h1>
	<table width="100%"  cellspacing="0" cellpadding="0" >
		<th style="text-align: center;">STT</th>
		<th style="text-align: center;">Image</th>
		<td colspan="2">
			<div>
				<a href="{{route('themslide')}}" title="Thêm"><i class="fa fa-plus-circle" aria-hidden="true" style="color:red"></i></a>
			</div>
		</td>
		<?php $stt = 1 ?>
		@foreach($danhsach as $danhsach_sl)
		<tr>
			<td>{{$stt}} <?php $stt++; ?></td>
			<td>
				<img src="source/admin/ql_slider/{{$danhsach_sl->UrlHinh}}" style="width: 100px;@if($danhsach_sl->TrangThai == 0 ) opacity: .1; @endif">
			</td>
			<td>
				<a href="{{ URL::route('updateSlide', $danhsach_sl->idSL)}}" style="color:red">@if($danhsach_sl->TrangThai == 1) Ẩn @else Hiện @endif</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection