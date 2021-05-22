@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ ACCOUNT
    </div>
    <?php
 // gán biến message ở hàm dashboard trong controller
 $mess=Session::get('message');
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
            <th>Tên </th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Admin</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($accounts as $items => $item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$items+1}}</td>
            <td><span class="text-ellipsis">{{$item->name}}</span></td>
            <td><span class="text-ellipsis">{{$item->email}}</span></td>
            <td><span class="text-ellipsis">{{$item->phone}}</span></td>
            <td>          
              <?php  
                if($item->role==1){
                  ?> <a href="{{URL::to("/unactive-user/".$item->id)}}"><i class="fa fa-check"></i></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to("/active-user/".$item->id)}}"><i style="color:#f05050" class="fa fa-ban"></i></a>
                <?php
                }
              ?>
            <td>
            <a onclick="return confirm('Bạn có muốn xóa không.')" href="{{URL::to('/delete-user/'.$item->id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
          </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection