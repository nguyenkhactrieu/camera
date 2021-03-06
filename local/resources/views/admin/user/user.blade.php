@extends('admin.index')

@section('content')

<div style="text-align:center" id="quanly">
@if(Session::has('flag'))
    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
@endif
<table width="100%" border="1" cellspacing="0" cellpadding="0">

    <th style="text-align: center;">Name</th>

    <th style="text-align: center;">Level</th>

    <th style="text-align: center;">Email</th>

    <td colspan="3">
        @if(Auth::user()->author == 1)
        <div>
            <a href="{{route('themUser')}}" title="Thêm"><i class="fa fa-plus-circle" aria-hidden="true" style="color:red"></i></a>
        </div>
        @endif()
    </td>

    @foreach($user as $info_U)
    <tr>
        <td align="center">{{$info_U->name}}</td>

        <td align="center">@switch($info_U->author) @case(0) Khách hàng @break @case(1) SupperAdmin @break @case(2) Admin @break  @endswitch</td>
        <td align="center">{{$info_U->email}}</td>
        @can('delete')
        <td>
            <div>
                <a href="{{ URL::route('xoaUser', $info_U->id ) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" title="Xóa">
                    <i class="fa fa-trash-o" aria-hidden="true" style="color: #895FA4"></i>
                </a>
            </div>
        </td>
        @endcan
        
        <td>
            <div>
                <a href="{!! URL::route('sua-user') !!}/{{$info_U->id}}" title="Sửa">
                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #5021FE"></i></a>
            </div>
        </td>
       
            <td>
                <div>
                    <a href="#" title="Xem Chi Tiết">
                        <i class="fa fa-info-circle" aria-hidden="true" style="color: #CC57F8"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach	
    </table>
    <div class="row">{{$user->links()}}</div>
</div>
@endsection