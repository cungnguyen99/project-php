@extends('admin_layout')
@section('admin_content')
<style>
#myChart{
  width: 90% !important;
  margin: 0 auto
  }
</style>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ DOANH THU THEO THÁNG
    </div>
    <canvas id="myChart" style="witdh: 80%"></canvas>
    <canvas id="myChartFilms" style="witdh: 80%"></canvas>
    <div class="text-center my-3">
    <button class="btn btn-primary" id='month'>Doanh thu tháng</button>
    <button class="btn btn-success" id='film'>Doanh thu Phim</button>
    </div>
<!-- 
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">           
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/export-excel')}}" method="post" >
          {{csrf_field()}}
          <input type="submit" class="input-sm form-control btn btn-primary" value="Xuất file Excel">
          </form>
        </div>
      </div>
    </div> -->
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.js" integrity="sha512-lUsN5TEogpe12qeV8NF4cxlJJatTZ12jnx9WXkFXOy7yFbuHwYRTjmctvwbRIuZPhv+lpvy7Cm9o8T9e+9pTrg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  $.get('http://localhost/cinemas/revenue').then(function(data){
  var ctx = document.getElementById('myChart').getContext('2d');
  var ctxs = document.getElementById('myChartFilms').getContext('2d');

  var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data[1],
            datasets: [{
                label: 'Đơn vị: Ngìn đồng',
                data: data[0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  $("#month").click(function (e) {
    $("#myChartFilms").css("opacity", "0")
    $("#myChartFilms").css("display", "none")
    $("#myChartFilms").css("visibility", "hidden")
    $("#myChart").css("opacity", "1")
    $("#myChart").css("display", "block")
    $("#myChart").css("visibility", "visible")
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data[1],
            datasets: [{
                label: 'Đơn vị: Ngìn đồng',
                data: data[0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
	});
  $("#film").click(function (e) {
    $("#myChart").css("opacity", "0")
    $("#myChart").css("display", "none")
    $("#myChart").css("visibility", "hidden")
    $("#myChartFilms").css("opacity", "1")
    $("#myChartFilms").css("display", "block")
    $("#myChartFilms").css("visibility", "visible")
        var myChar = new Chart(ctxs, {
        type: 'bar',
        data: {
            labels: data[3],
            datasets: [{
                label: 'Đơn vị: Ngìn đồng',
                data: data[2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
	});
  })
});
</script>
@endsection