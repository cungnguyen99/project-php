@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ HÓA ĐƠN
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Khách hàng</th>
            <th>Ngày chuyển</th>
            <th>Ngân hàng</th>
            <th>Số tiền</th>
          </tr>
        </thead>
        <tbody>
        @foreach($revenue as $items => $item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$items+1}}</td>
            <td><span class="text-ellipsis">{{$item->name}}</span></td>
            <td><span class="text-ellipsis">{{$item->time}}</span></td>
            <td><span class="text-ellipsis">{{$item->code_bank}}</span></td>
            <td><span class="text-ellipsis">{{$item->money}}</span></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection