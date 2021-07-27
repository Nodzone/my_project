<?php
	
	include_once '../config/db.php';

	$db = new PHPMySQLi();

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$pass = MD5(isset($_POST['password']) ? $_POST['password'] : '');

	$sql = "SELECT * FROM user_coop WHERE user_username = ? AND user_password = ?";
	$params = [$username, $pass]; //$params is array
	$result = $db->query($sql,$params);
	$objResult = $db->fetch_row($result);

	if(!$objResult)
	{
		header("location:fail.php");
	}
	else
	{
		$_SESSION["user"] = $objResult;

		// session_write_close();
		
		if($objResult["user_type"] == "5")
		{
			header("location:../admin/index.php"); 
		}
		else if ($objResult["user_type"] == "1")
		{
			if ($objResult["user_ckeckinfor"] == "1" ){
				header("location:../student/std_editinfor.php");
			}
			else if ($objResult["user_ckeckinfor"] == "2" ) {
				header("location:../student/index.php");
			}
		}
		else if ($objResult["user_type"] == "2")
		{
			if ($objResult["user_ckeckinfor"] == "1" ){
				header("location:../teacher/editinfor.php");
			}
			else if($objResult["user_ckeckinfor"] == "2")
			{
				header("location:../teacher/index.php");
			}
		}
		else if ($objResult["user_type"] == "3")
		{
			if ($objResult["user_ckeckinfor"] == "1" ){
				header("location:../emp/editinfor.php");
			}
			else if($objResult["user_ckeckinfor"] == "2")
			{
				header("location:../emp/index.php");
			}
		}
	}
?>