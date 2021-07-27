<html>

<head>
  <title>Check Login</title>
  <meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <meta http-equiv=Content-Type content="text/html; charset=windows-874">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

  <?php
$username = $_POST["login"];
$pass = $_POST["password"];


if($username !=null and $pass !=null)
{

$server = "10.10.80.101"; //ip server
$user = $_POST["login"]."@bru.ac.th";
// connect to active directory
$ad = ldap_connect($server);
if(!$ad) {
die("Connect not connect to ".$server);
// include("chk_login_db.php");
echo "ไม่สามารถติดต่อ server มหาลัยเพื่อตรวจสอบรหัสผ่านได้";
exit();
} else { 
$b = @ldap_bind($ad,$user,$pass);
if(!$b) {
die("<br><br>
<div align='center'> ท่านกรอกรหัสผ่านผิดพลาด
<br>
</div>
<meta http-equiv='refresh' content='3 ;url=index.php'>");
} else { 

//login ผ่านแล้วมาทำไรก็ว่าไป
session_start();


} 

echo "<script type=text/javascript>";
echo "alert('ยินดีต้อนรับ ')";
echo "</script>";
echo "<meta http-equiv='refresh' content='0 ;url= index.php?case_i=13'>";	
exit();
}

}
?>