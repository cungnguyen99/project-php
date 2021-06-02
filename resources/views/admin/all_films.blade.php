@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ DANH MỤC PHIM
    </div>
    <?php
		// gán biến message ở hàm dashboard trong controller
		$mess=Session::get('message');
		if($mess){
			echo '<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
      <div class="toast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
          <i class="fa fa-check-square"></i>  
          <strong class="mr-auto">Cinema</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">'
          ,$mess.
        '</div>
      </div>
    </div>';

			//in xong rồi thì gán bằng null, chỉ cho in ra 1 lần
			Session::put('message',null);
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
            <th>Tên phim</th>
            <th>imdb</th>
            <th>Đạo diễn</th>
            <th>Ảnh</th>
            <th>Thể loại</th>
            <th>Hãng sản xuất</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($allFilms as $items => $item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->TenPhim}}</td>
            <td><span class="text-ellipsis">{{$item->IMDB}}</span></td>
            <td><span class="text-ellipsis">{{$item->DaoDien}}</span></td>
            <td><img src="public/uploads/films/{{$item->Anh}}" height="100" witdh="100"></td>
            <td><span class="text-ellipsis">{{$item->TenTheLoai}}</span></td>
            <td><span class="text-ellipsis">{{$item->TenHSX}}</span></td>
            <td>
              <a href="{{URL::to('/edit-category-film/'.$item->IDf)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a> 
              <a onclick="return confirm('Bạn có muốn xóa không.')" href="{{URL::to('/delete-category-film/'.$item->IDf)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection