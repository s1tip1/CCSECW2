<?php

// Check if the form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Check if file was uploaded without errors

	if (isset($_FILES["photo"]) && $_FILES["file"]["error"] == 0) {
		
		$file_name	 = $_FILES["file"]["name"];
		$file_type	 = $_FILES["file"]["type"];
		$file_size	 = $_FILES["file"]["size"];
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		$file_error = $_FILES["file"]["error"];
		
		echo "<div style='text-align: center; background: #4CB974;
		padding: 30px 0 10px 0; font-size: 20px; color: #fff'>
		File Name: " . $file_name . "</div>";
		
		echo "<div style='text-align: center; background: #4CB974;
		padding: 10px; font-size: 20px; color: #fff'>
		File Type: " . $file_type . "</div>";
		
		echo "<div style='text-align: center; background: #4CB974;
		padding: 10px; font-size: 20px; color: #fff'>
		File Size: " . $file_size . "</div>";
		
		echo "<div style='text-align: center; background: #4CB974;
		padding: 10px; font-size: 20px; color: #fff'>
		File Error: " . $file_error . 
		print_r($FILES).
		"</div>";
		
		echo "<div style='text-align: center; background: #4CB974;
		padding: 10px; font-size: 20px; color: #fff'>
		File Temporary Name: " . $file_tmp_name . "</div>";
		
	}
}
?>
