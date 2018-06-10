@extends('admin.index')
@section('content')
<div class="quanly" style="text-align: center; padding: 20px;">
	<h1>Thêm Slide</h1>
	@if(Session::has('flag'))
        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
        @endif
	<form action="{{route('themslide')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="file" name="img_slide" id="fileimg">
		<input type="submit" name="themSlide" id="themSlide" value="Thêm" class="btn_them" style="float: left; margin-top: 20px;">
	</form>
</div>
@endsection