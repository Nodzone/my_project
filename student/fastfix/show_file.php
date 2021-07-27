<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("coop_bru");
	$strSQL = "SELECT * FROM files";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="200" border="1">
<tr>
<th width="50"> <div align="center">Files ID </div></th>
<th width="150"> <div align="center">Files Name </div></th>
</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?php echo $objResult["FilesID"];?></div></td>
<td><center><a href="myfile/<?php echo $objResult["FilesName"];?>"><?php echo $objResult["FilesName"];?></a></center></td>
</tr>
<?php
	}
?>
</table>
<?php
mysql_close($objConnect);
?>
</body>
</html>