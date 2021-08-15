<?php
include 'lib/function.php';
$id=$_GET['id'];
$query="SELECT `files` FROM `bugs` WHERE id=$id";
global $conn;
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$link=$row['files'];
$file='uploads'.'/'.$link;
if(file_exists($file)){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($file) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
}

?>