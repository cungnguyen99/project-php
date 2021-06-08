@extends('welcome')
@section('content')
<style>
  @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
  @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
  body {
    background: #e2e2e2;
    width: 100%;
    height: 100vh;
    overflow-x: hidden !important;
  }
  .container{
    margin-left:110px !important;
  }
  body .card {
    width: 800px;
    height: 500px;
    background: transparent;
    left: 0;
    right: 0;
    margin: auto;
    top: 0;
    bottom: 0;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    box-shadow: 0px 20px 30px 3px rgba(0, 0, 0, 0.55);
  }
  body .card_left {
    width: 40%;
    height: 100%;
    float: left;
    overflow: hidden;
    background: transparent;
  }
  body .card_left img {
    width: 100%;
    height: 100%;
    border-radius: 10px 0 0 10px;
    -webkit-border-radius: 10px 0 0 10px;
    -moz-border-radius: 10px 0 0 10px;
    position: relative;
  }
  body .card_right {
    width: 60%;
    float: left;
    background: #000000;
    height: 100%;
    border-radius: 0 10px 10px 0;
    -webkit-border-radius: 0 10px 10px 0;
    -moz-border-radius: 0 10px 10px 0;
  }
  body .card_right h1 {
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 400;
    text-align: left;
    font-size: 40px;
    margin: 12px 0 0 0;
    padding: 0 0 0 40px;
    letter-spacing: 1px;
  }
  body .card_right__details ul {
    list-style-type: none;
    padding: 0 0 0 40px;
    margin: 10px 0 0 0;
  }
  body .card_right__details ul li {
    display: inline;
    color: #e3e3e3;
    font-family: 'Montserrat', sans-serif;
    font-weight: 400;
    font-size: 14px;
    padding: 0 40px 0 0;
  }
  body .card_right__rating__stars {
    position: relative;
    right: 160px;
    margin: 10px 0 10px 0;
    /***** CSS Magic to Highlight Stars on Hover *****/
    /* hover previous stars in list */
  }
  body .card_right__rating__stars fieldset, body .card_right__rating__stars label {
    margin: 0;
    padding: 0;
  }
  body .card_right__rating__stars .rating {
    border: none;
  }
  body .card_right__rating__stars .rating > input {
    display: none;
  }
  body .card_right__rating__stars .rating > label:before {
    margin: 5px;
    font-size: 1.25em;
    display: inline-block;
    content: "\f005";
    font-family: FontAwesome;
  }
  body .card_right__rating__stars .rating > .half:before {
    content: "\f089";
    position: absolute;
  }
  body .card_right__rating__stars .rating > label {
    color: #ddd;
    float: right;
  }
  body .card_right__rating__stars .rating > input:checked ~ label,
  body .card_right__rating__stars .rating:not(:checked) > label:hover,
  body .card_right__rating__stars .rating:not(:checked) > label:hover ~ label {
    color: #FFD700;
  }
  body .card_right__rating__stars .rating > input:checked + label:hover,
  body .card_right__rating__stars .rating > input:checked ~ label:hover,
  body .card_right__rating__stars .rating > label:hover ~ input:checked ~ label,
  body .card_right__rating__stars .rating > input:checked ~ label:hover ~ label {
    color: #FFED85;
  }
  body .card_right__review p {
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    padding: 0 40px 0 40px;
    letter-spacing: 1px;
    margin: 10px 0 10px 0;
    line-height: 20px;
  }
  body .card_right__review a {
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    padding: 0 0 0 40px;
    color: #ffda00;
    margin: 0;
  }
  body .card_right__button {
    padding: 0 0 0 40px;
    margin: 30px 0 0 0;
  }
  body .card_right__button a {
    color: #ffda00;
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    border: 2px solid #ffda00;
    padding: 10px 10px 10px 40px;
    font-size: 12px;
    background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/343086/COMdoWZ.png);
    background-size: 12px 12px;
    background-repeat: no-repeat;
    background-position: 7% 50%;
    border-radius: 5px;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .5s;
    transition-duration: .5s;
  }
  body .card_right__button a:hover {
    color: #000000;
    background-color: #ffda00;
    background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/343086/rFQ5dHA.png);
    background-size: 12px 12px;
    background-repeat: no-repeat;
    background-position: 10% 50%;
    cursor: pointer;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .5s;
    transition-duration: .5s;
  }


  .movie-container {
    margin: 20px 0;
  }

  .movie-container select {
    background-color: #fff;
    border-radius: 5px !important;
    font-size: 14px;
    margin-left: 10px;
    padding: 5px 15px 5px 15px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
  }

  .seat {
    background-color: #1f2833;
    height: 15px;
    width: 20px;
    display: inline-block;
    margin: 3px;
    color:white;
    font-size:xx-small;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .seat.selected {
    background-color: #21a6f3;
  }

  .seat.occupied {
    background-color: #fff;
  }

  .seat:nth-of-type(10n-8) {
    margin-right: 15px;
  }

  .seat:nth-of-type(10n-2) {
    margin-right: 15px;
  }

  .seat:not(.occupied):hover {
    cursor: pointer;
    transform: scale(1.2);
  }

  .showcase .seat:not(.occupied):hover {
    cursor: default;
    transform: scale(1);
  }

  .showcase {
    background: rgba(0, 0, 0, 0.356);
    padding: 5px 10px;
    border-radius: 5px;
    color: #777;
    list-style-type: none;
    display: flex;
    justify-content: space-between;
  }

  .showcase li {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
  }

  .showcase li small {
    margin-left: 2px;
  }

  .row {
    display: flex;
  }

  .screen {
    background-color: #fff;
    height: 70px;
    width: 17%;
    margin: 15px 0px;
    transform: rotateX(-45deg);
    box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
  }

  p.text {
    margin: 5px 0;
  }

  p.text span {
    color: #6feaf6;
  }
  .button {
    display: inline-block;
    font-family: "Montserrat", "Trebuchet MS", Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    position: relative;
    padding: 0.8em 1.4em;
    padding-right: 4.7em;
    border: none;
    color:  #ffda00;
    border: 2px solid #ffda00;
    transition: 0.2s;
  }
  .button:before,
  .button:after {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    padding-top: inherit;
    padding-bottom: inherit;
    width: 2em;
    content: "\00a0";
    font-family: 'FontAwesome', sans-serif;
    font-size: 1.2em;
    text-align: center;
    transition: 0.2s;
    transform-origin: 50% 60%;
  }
  .button:before {
    background: rgba(0, 0, 0, 0.1);
  }
  .button:hover {
    background: #ffda00;
  }
  .button:active,
  .button:focus {
    background: #ffda00;
    outline: none;
    color:black;
  }
  .button {
    min-width: 14em;
  }
  .arrow {
    background: black
  }
  .arrow:hover {
    background: #ffda00;
    color:black;
  }
  .arrow:active,
  .arrow:focus {
    background: #ffda00;
    color:black;

  }
  .arrow:after {
    content: "\F054";
  }
  .arrow:hover:after {
    animation: bounceright 0.3s alternate ease infinite;
  }

</style>
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> Đặt vé online</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> Book ticket</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-2 col-sm-12 col-xs-12">		
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card_left">
                        <img src="https://images.pexels.com/photos/2372945/pexels-photo-2372945.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"/>
                    </div>

                      <?php
                        $mess=Session::get('mess');
                        if($mess){
                            echo ' <div class="card_right">
                            <h1>',$mess.'</h1></div>';
                            Session::put('mess',null);
                        }else{
                          echo '<div class="card_right">
                          <h1>',$film->TenPhim.'</h1>';}?>
                          @if(!$mess)
                            <form action="{{URL::to('/save-payment')}}" method="post">
                            {{csrf_field()}}
                          <div class="card_right__details movie-container">
                              <ul>
                                <select id="selectItem" style="display:inline; width: 39%; margin-left: 13%" class="form-control showtime" type="text" name="showtime">
                                    <option value="" disabled selected> Chọn lịch chiếu *</option>
                                      @foreach($showTimes as $item)
                                      <option value="{{$item->showID}}"> {{$item->GioChieu}} / {{$item->NgayChieu}}</option>
                                      @endforeach
                              </select>
                              <h6 class='room' style='display:inline-block; color:white; margin-left:5%'></h6>
                             {{-- <select id="selectChair" style="display:inline; width: 60%; margin-left: 13%" class="form-control" type="text" name="selectchair">
                             </select> --}}
                              </ul>
                              <div class="card_right__review">
                               
                                <ul class="showcase">
                                <li>
                                    <div class="seat"></div>
                                    <small>N/A</small>
                                </li>
                                <li>
                                    <div class="seat selected"></div>
                                    <small>Selected</small>
                                </li>
                                                            <li>
                                  <div class="seat occupied"></div>
                                  <small>Occupied</small>
                                </li>  
                                </ul>
  
                              <div class="container click-seat">
                                <div class="screen"></div>
                                <div class="row chair" style="display: inline-block; margin-left: -40px"></div>
                              </div>
  
                                <p class="text">
                                  Bạn đã chọn <span id="count">0</span> ghế với tổng tiền là 
                                 <span id="total">0</span> VNĐ
                                </p>
                              </div>
                              <div class="card_right__button">
                                  <input class="button arrow ticket-button" type="submit" value="Mua vé"/>
                              </div>
                          </div>
                          </form>
                          @endif
                      </div>
                      
                </div>
			</div>
            <div class="col-md-2 col-sm-12 col-xs-12">
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var showtime;
  $('.showtime').on('change', (e) => {
    console.log('ok', e.target.value);
    showtime = e.target.value
  })

  const container = document.querySelector(".click-seat");
  const arr_chair=[]
  container.addEventListener("click", e => {
    const id_chair=e.target.id
    arr_chair.push(id_chair)
    if (
          e.target.classList.contains("seat") &&
          !e.target.classList.contains("occupied")
        ) {
          e.target.classList.toggle("selected");
          e.target.classList.toggle("selected__item");
        }
        const selectedSeats = document.querySelectorAll('.row .seat.selected.selected__item');
        const total = document.getElementById('total');
        const count = document.getElementById('count');
        const selectedSeatsCount = selectedSeats.length;
        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * 50000;
      });
    var seats=document.querySelectorAll(".row .seat:not(.selected)")
    seats.forEach((seat, index) => {
      seat.addEventListener("click", e => {
        seat.togle("selected selected__item");
    });
  })
  $('.ticket-button').click(e => {
    // e.preventDefault();
    const selectedSeats = document.querySelectorAll('.row .seat.selected.selected__item');
    if(selectedSeats.length===0){
      if(confirm("Chọn ít nhất một ghế để tiếp tục.")) {
          e.preventDefault();
          window.location.href = window.location.href
      }
    }
    $.ajax({
      type:'post',
      url:'/cinemas/save-payment',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      data: {
        arr_chairs: arr_chair,
        showtime: showtime,
        giaVe: 50000,
        maKH: 1
        },
      success:function(response) {
        console.log('response', arr_chair);
      }
    });

    $.ajax({
      type:'post',
      url:'/cinemas/payment',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      data: {
        //e gui cai nay sang ben hàm nay
        arr_chairs: arr_chair,
        },
      success:function(response) {
        console.log('response 2', response);
      }
    });
  })
})
</script>
@push('scripts')
<script>
$(document).ready(function(){
  $("#selectItem").change(function(){
    var time_id = $(this).val();
    console.log(time_id)
    $.get('http://localhost/cinemas/show_chairs/' + time_id).then(function(data){
      if(data != null){
        var html = "";
        var selectchairs="";
        data[0].map(function(item,index){
          if(item['type'] == true){
            if(index%10==0&&index!=0){
              html += '<br><div class="seat occupied" style="pointer-events: none"></div>';
            }else{
              html += '<div class="seat occupied" style="pointer-events: none; display: inline-block"></div>';
            }
          }
          else{
            if(index%10==0&&index!=0){
              selectchairs+='<option value="'+item["id"]+'">'+item["chair_des"]+'</option>'
              html += '<br><div class="seat" id="'+item['id']+'"value="'+item['id']+'"><input type="hidden" id="fname" name="seat_seleted">'+item["chair_des"]+'</div>';
            }else{
              selectchairs+='<option value="'+item["id"]+'">'+item["chair_des"]+'</option>'
              html += '<div class="seat" id="'+item['id']+'"value="'+item['id']+'"><input type="hidden" id="fname" name="seat_seleted">'+item["chair_des"]+'</div>';
            }
          }
        });

        $('.chair').html(html);
        $('#selectChair').html(selectchairs);
        $('.room').html('Phòng: '+data[1]);
      }
    }).catch(error => error.message);
  })
  const arr_chairs=[]
  container.addEventListener("click", e => {
    const id_chair=e.target.id
    arr_chairs.push(id_chair)
    console.log('arr', arr_chairs)
  });

  $.ajax({
    type:'post',
    url:'http://localhost/cinemas/book-ticket/1',
    data:arr_chairs,
    success:function(data) {
      $("#arr_chairs").html(data.arr_chairs);
    }
  });
});
// $('#selectChair').change(()=>{
//     var selectitem=$("#selectChair").val();
//     var id=''+selectitem;
//     var idchair=$("#"+selectitem);
//     console.log(idchair);
//     idchair.addClass('selected')
// });
</script>
@endpush
@endsection