<?php
session_start();
include_once '../../connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM brand WHERE BrandID = $id";
	
	if(mysqli_query($conn, $query))
    {
		$url="brand_list.php";
		echo "<script>window.location='".$url."';</script>";
    }	
}
?>