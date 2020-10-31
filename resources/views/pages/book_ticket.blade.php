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
  height: 400px;
  background: transparent;
  position: absolute;
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
  height: 400px;
  float: left;
  overflow: hidden;
  background: transparent;
}
body .card_left img {
  width: 100%;
  height: auto;
  border-radius: 10px 0 0 10px;
  -webkit-border-radius: 10px 0 0 10px;
  -moz-border-radius: 10px 0 0 10px;
  position: relative;
}
body .card_right {
  width: 60%;
  float: left;
  background: #000000;
  height: 400px;
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
  margin: 30px 0 0 0;
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
  border-radius: 5px;
  font-size: 14px;
  margin-left: 10px;
  padding: 5px 15px 5px 15px;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
}

.seat {
  background-color: #1f2833;
  height: 12px;
  width: 15px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.seat.selected {
  background-color: #21a6f3;
}

.seat.occupied {
  background-color: #fff;
}

.seat:nth-of-type(2) {
  margin-right: 15px;
}

.seat:nth-last-of-type(2) {
  margin-left: 15px;
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


</style>
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> movie listing - grid</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
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
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/343086/h8fnwL1.png"/>
                    </div>
                    <div class="card_right">
                        <h1>KILL  BILL:  VOL.  1</h1>
                        <div class="card_right__details">
                            <ul>
                                <li>2003</li>
                                <li>111 min</li>
                                <li>Action</li>
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

                            <div class="container">
                            <div class="screen"></div>

                            <div class="row" style="margin-left:3px">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            </div>

    <p class="text">
      You have selected <span id="count">0</span> seats for a total price of
      $<span id="total">0</span>
    </p>
                            </div>
                            <div class="card_right__button">
                                <button class="btn btn-outline-warning" >Mua vé</button>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="col-md-2 col-sm-12 col-xs-12">
			</div>
		</div>
	</div>
</div>
@endsection