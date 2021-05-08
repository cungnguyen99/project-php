@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Doanh thu theo tháng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection