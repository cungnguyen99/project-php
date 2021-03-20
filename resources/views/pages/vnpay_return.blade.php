@extends('welcome')
@section('content')
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Thông tin thanh toán </h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container" style='color:#fff'>
        <?php
            $vnp_TmnCode = "Y4U88XFK"; //Mã website tại VNPAY 
            $vnp_HashSecret = "ZFUIJSMWYLIKQTEAJLGOTIRAQUQAESPW"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8080/vnpay_php/vnpay_return.php";
            $vnp_SecureHash = $_GET['vnp_SecureHash'];
            $inputData = array();
            foreach ($_GET as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $inputData[$key] = $value;
                }
            }
            unset($inputData['vnp_SecureHashType']);
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $i = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . $key . "=" . $value;
                } else {
                    $hashData = $hashData . $key . "=" . $value;
                    $i = 1;
                }
            }
            $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        ?>
        <div class="container">
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>
                    
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VNĐ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                            if ($secureHash == $vnp_SecureHash) {
                                if ($_GET['vnp_ResponseCode'] == '00') {
                                    $order_id = $_GET['vnp_TxnRef'];
                                    $money = $_GET['vnp_Amount']/100;
                                    $note = $_GET['vnp_OrderInfo'];
                                    $vnp_response_code = $_GET['vnp_ResponseCode'];
                                    $code_vnpay = $_GET['vnp_TransactionNo'];
                                    $code_bank = $_GET['vnp_BankCode'];
                                    $time = $_GET['vnp_PayDate'];
                                    $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
                                    include("../code/modules/kndatabase.php");
                                    $taikhoan = $_SESSION['tk'];
                                    $sql = "SELECT * FROM payments WHERE order_id = '$order_id'";
                                    $query = mysqli_query($conn, $sql);
                                    $row = mysqli_num_rows($query);
                                    
                                    if ($row > 0) {
                                        $sql = "UPDATE payments SET order_id = '$order_id', money = '$money', note = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank' WHERE order_id = '$order_id'";
                                        
                                        mysqli_query($conn, $sql);
                                    } else {
                                        $sql = "INSERT INTO payments(order_id, thanh_vien, money, note, vnp_response_code, code_vnpay, code_bank, time) VALUES ('$order_id', '$taikhoan', '$money', '$note', '$vnp_response_code', '$code_vnpay', '$code_bank','$date_time')";
                                        mysqli_query($conn, $sql);
                                    }
                                    
                                    echo "GD Thanh cong";
                                } else {
                                    echo "GD Khong thanh cong";
                                }
                            } else {
                                echo "Chu ky khong hop le";
                            }
                        ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                  