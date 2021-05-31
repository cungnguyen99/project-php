@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ LỊCH CHIẾU
    </div>
    <?php
 // gán biến message ở hàm dashboard trong controller
 $mess=Session::get('message');
 $error=Session::get('error');

 if($mess){
 echo '<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
      <div class="toast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-body">'
          ,$mess.
        '</div>
      </div>
    </div>';
 //in xong rồi thì gán bằng null, chỉ cho in ra 1 lần
 Session::put('message',null);
 }
 if($error){
  echo '<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
  <div class="toast" style="position: absolute; top: 0; right: 0;">
    <div class="toast-body">'
      ,$error.
    '</div>
  </div>
</div>';
//in xong rồi thì gán bằng null, chỉ cho in ra 1 lần
Session::put('error',null);
 }
 ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Tên Phim</th>
            <th>Phòng</th>
            <th>Ngày chiếu</th>
            <th>Giờ chiếu</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($allShowtimes as $items => $item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$items+1}}</td>
            <td><span class="text-ellipsis">{{$item->TenPhim}}</span></td>
            <td><span class="text-ellipsis">{{$item->MaPhong}}</span></td>
            <td><span class="text-ellipsis">{{$item->NgayChieu}}</span></td>
            <td><span class="text-ellipsis">{{$item->GioChieu}}</span></td>
            <td>
              <a href="{{URL::to('/edit-showtime/'.$item->showID)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a> 
              <a onclick="return confirm('Bạn có muốn xóa không.')" href="{{URL::to('/delete-showtime/'.$item->showID)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection