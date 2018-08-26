<?php
session_start();

include '../connection.php';


if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM customer WHERE CustomerID = $id";
	
	if(mysqli_query($conn, $query))
    {
		//echo "Data inserted Successfully<hr>";	        
        header("location:customer_list.php");
    }	
}
?>