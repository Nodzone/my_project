<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$mesg = $_POST['mesg'];

$message = $mesg."\n".'ข้อความจากคุณ : '.$name."\n".'อีเมล์ : '.$email."\n".'หมายเลขโทรศัพท์ : '.$phone;

if($name<>"" || $email <> "" || $mesg <> "") {
	
	sendlinemesg();

	header('Content-Type: text/html; charset=utf-8');
	$res = notify_message($message);
	header("location:../backhome.php"); 
	
} else {
	echo "<center>Error: กรุณากรอกข้อมูลให้ครบถ้วน</center>";
}

function sendlinemesg() {
	
    define('LINE_API',"https://notify-api.line.me/api/notify");
	define('LINE_TOKEN','2MJpJg2Smn4ToBDleqU0CSZ99dWX4ZplRKvTJBkrCZ8');

	function notify_message($message){

		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array(
			'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						."Authorization: Bearer ".LINE_TOKEN."\r\n"
						."Content-Length: ".strlen($queryData)."\r\n",
				'content' => $queryData
			)
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API,FALSE,$context);
		$res = json_decode($result);
		return $res;

	}

}

?>