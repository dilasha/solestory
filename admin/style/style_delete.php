<?php
session_start();
include '../../connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM style WHERE StyleID = $id";
	
	if(mysqli_query($conn, $query))
    {       
        header("location:style_list.php");
    }	
}
?>