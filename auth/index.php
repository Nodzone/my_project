<html>
<head>
<title>Administrator Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="css/style.css"> <!--pemanggilan file css-->
</head>
<script lanuage="javascript">
function check() {
var v1 = document.checkForm.login.value ;
var v2 = document.checkForm.password.value ;
if(v1.length==0) {
alert("กรุณากรอกชื่อผู้ใช้ด้วยนะครับ") ;
document.checkForm.login.focus() ;
return false ;
}
else if(v2.length==0) {
alert("กรุณากรอกรหัสผ่านด้วยนะครับ") ;
document.checkForm.password.focus() ;
return false ;
}
else 
return true ;
}

</script>
<body>

<div id="loginForm">
	<div class="headLoginForm">
	เข้าสู่ระบบ
	</div>
	<div class="fieldLogin">
	<form name="checkForm" id="login-form" action="AD2.php" method="post" onSubmit="return check()">
	<label>Username</label><br>
	<input type="text" class="login" name="login"><br>
	<label>Password</label><br>
	<input type="password" class="login" name="password"><br>
	<br>
	<input type="submit" class="button" value="ตกลง">
	<input type="reset" class="button" value="ยกเลิก">
	</form>
    
    <br>
    
	</div>
</div>
</body>
</html>