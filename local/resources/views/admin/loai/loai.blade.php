@extends('admin.index')

@section('content')

<div style="text-align:center" id="quanly">

    <table width="100%"  cellspacing="0" cellpadding="0">

        <th>STT</th>

        <th>Tên loại</th>

        <td colspan="2">

            <div>

                <a href="{{route('themloai')}}" title="Thêm"><i class="fa fa-plus-circle" aria-hidden="true" style="color:red"></i></a>

            </div>

        </td>

        @foreach($ds_loai as $loai)

            <tr>

                <td>{{$stt = $stt + 1}}</td>

                <td align="center">{{$loai->TenLoai}}</td>

                <td>
                    @can('delete')
                    <div>

                        <a href="admin/loai/xoa-loai/{{$loai->idLoai}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" title="Xóa"><i class="fa fa-trash-o" aria-hidden="true" style="color: #895FA4"></i>

                        </a>

                    </div>
                    @endcan
                </td>

                <td>
                    @can('edit')
                    <div>

                        <a href="admin/loai/sua-loai/{{$loai->idLoai}}" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #5021FE"></i>

                        </a>

                    </div>
                    @endcan
                </td>

            </tr>

        @endforeach

    </table>

</div>

@endsection