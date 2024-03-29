@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ DANH MỤC HÃNG SẢN XUẤT
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
            <th>STT</th>
            <th>Hãng phim</th>
            <th>Nước</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($allManufacturers as $items => $item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$items+1}}</td>
            <td><span class="text-ellipsis">{{$item->TenHSX}}</span></td>
            <td><span class="text-ellipsis">{{$item->TenNuoc}}</span></td>
            <td>
              <a href="{{URL::to('/edit-manufacturer-film/'.$item->ID)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a> 
              <a onclick="return confirm('Bạn có muốn xóa không.')" href="{{URL::to('/delete-manufacturer-film/'.$item->ID)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection