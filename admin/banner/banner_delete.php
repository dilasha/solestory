<?php
session_start();
include '../../connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM banner WHERE BannerID = $id";
	
	if(mysqli_query($conn, $query))
    {
		$url="banner_list.php";
		echo "<script>window.location='".$url."';</script>";
    }	
}
?>