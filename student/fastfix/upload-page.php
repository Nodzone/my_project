<?php




if(count($_FILES['filesToUpload']['name'])) {
	foreach ($_FILES['filesToUpload']['name'] as $index=>$file) {
		echo "<pre>" ; print_r ($_FILES["filesToUpload"]["tmp_name"][$index]) ;"</pre>";
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$newFileName = md5(time() . $file) . '.' . $ext;
	    if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$index],"uploads/".$newFileName)) // Upload/Copy
		{
			/// ใส่ code insert $newFileName;
			echo "Copy/Upload Complete. <br/> $file";
		}

		
	}
}
?>

