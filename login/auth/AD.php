<html>

<head>
  <title>Check Login</title>
  <meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <meta http-equiv=Content-Type content="text/html; charset=windows-874">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="stylesheet/img/devil-icon.png">
  <!--Pemanggilan gambar favicon-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--pemanggilan file css-->
</head>

<body>
  <?php	
	error_reporting(0);
	$server = "10.10.80.101"; //ip server
	$domain="@bru.ac.th";
	$user_id = $HTTP_POST_VARS['login'];
	$user_pass = $HTTP_POST_VARS['password'];
	//$type = $HTTP_POST_VARS['type'];
	$user_id = trim(addslashes($user_id));
	$user_pass =trim(addslashes($user_pass));

	
$ldaprdn  = $user_id.$domain;     // ldap rdn or dn
$ldappass = $user_pass;  // associated password

// connect to ldap server
$ldapconn = ldap_connect($server) or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)  or die ("Could not set ldap protocol");
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0)  or die ("Could not set ldap protocol");



if ($ldapconn) {

    // binding to ldap server
		$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
		echo "con is ".$ldapconn ."<br>";
		echo "bind is ".$ldapbind;
    // verify binding
    if ($ldapbind) {
					//echo "<script>";
					//echo "location.href =../menu.php";
					//echo "</script>";
					// session_start();
					// $_SESSION['sid']=session_id();
					// $_SESSION['user']=$user_id;					
					// session_write_close();
					// echo "<script>" ; // "window.open(../'menu.php?USER=$USER','','status=yes,resizable=yes,scollbars.yes')";
					// echo "window.location='../index.php'</script>";
					// echo "</script>";
					echo $_SESSION['sid'];
					
    } else {
        	echo "<script language='JavaScript'>";
					echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องหรือชื่อผู้ใช้ของคุณไม่อยู่ในกลุ่มใช้งานโปรแกรม".'\n'."กรุณากรอกใหม่อีกครั้งหรือติดต่อผู้ดูแลระบบ');history.go(-1);";
					echo "</script>";
				
	}
    } else {
	  echo "<script language='JavaScript'>";
		echo "alert('ไม่สามารถติดต่อฐานข้อมูลได้".'\n'."กรุณาติดต่อผู้ดูแลระบบ');history.go(-1);";
		echo "</script>";
	}


?>
</body>

</html>