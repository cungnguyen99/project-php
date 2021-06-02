@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ DOANH THU PHIM
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên phim</th>
            <th>Ảnh</th>
            <th>Ngày khởi chiếu</th>
            <th>Ngày kết thúc</th>
            <th>imdb</th>
            <th>Doanh thu</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($revenue as $items => $item)
          <tr>
            <td>{{$item->TenPhim}}</td>
            <td><img src="public/uploads/films/{{$item->Anh}}" height="100" witdh="100"></td>
            <td><span class="text-ellipsis">{{$item->NgayKhoiChieu}}</span></td>
            <td><span class="text-ellipsis">{{$item->NgayKetThuc}}</span></td>
            <td><span class="text-ellipsis">{{$item->IMDB}}</span></td>
            <td><span class="text-ellipsis">{{$item->revenue}}</span></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">           
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/export-excel')}}" method="post" >
          {{csrf_field()}}
          <input type="submit" class="input-sm form-control" value="Xuất file Excel">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection