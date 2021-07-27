<html>

<head>
  <title>Login</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="stylesheet/img/devil-icon.png">
  <!--Pemanggilan gambar favicon-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--pemanggilan file css-->

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!--===============================================================================================-->
</head>
<script lanuage="javascript">
function check() {
  var v1 = document.checkForm.login.value;
  var v2 = document.checkForm.password.value;
  if (v1.length == 0) {
    alert("กรุณากรอกชื่อผู้ใช้ด้วยนะครับ");
    document.checkForm.login.focus();
    return false;
  } else if (v2.length == 0) {
    alert("กรุณากรอกรหัสผ่านด้วยนะครับ");
    document.checkForm.password.focus();
    return false;
  } else
    return true;
}
</script>

<body>

  <div id="loginForm">
    <div class="fieldLogin">
      <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
              <img src="../images/img-01.png" alt="IMG">
            </div>
            <form class="login100-form validate-form" name="checkForm" id="login-form" action="AD2.php" method="post"
              onSubmit="return check()">
              <span class="login100-form-title">
                เข้าสู่ระบบ
              </span>
              <div class="wrap-input100 validate-input" data-validate="จำเป็นต้องกรอกชื่อผู้ใช้">
                <input class="input100" type="text" name="login" placeholder="ชื่อผู้ใช้งาน">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
              </div>
              <div class="wrap-input100 validate-input" data-validate="จำเป็นต้องกรอกรหัสผ่าน">
                <input class="input100" type="password" name="password" placeholder="รหัสผ่าน">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>

              <input type="submit" class="login100-form-btn" value="Login">

              <div class="text-center p-t-12">
                <span class="txt1">
                  ลืม
                </span>
                <a class="txt2" href="../index.php#contact">
                  ชื่อผู้ใช้ / รหัสผ่านเหรอ ?
                </a>
              </div>

            </form>
          </div>
        </div>
      </div>

      <br>

    </div>
  </div>

  <!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
  <script>
  $('.js-tilt').tilt({
    scale: 1.1
  })
  </script>
  <!--===============================================================================================-->
  <script src="../js/main.js"></script>
</body>

</html>