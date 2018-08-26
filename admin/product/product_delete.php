<?php
session_start();
include'../../connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM product WHERE ProductID = $id";
	
	if(mysqli_query($conn, $query))
    {
		$url="product_list.php";
		echo "<script>window.location='".$url."';</script>";
    }	
}
?>