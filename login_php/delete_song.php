<?php
	session_start();
	//echo $_SESSION['login_user'];
	
	if($_SESSION['login_user'])// checks if the user is logged in  
	{ 
		//echo "working";
	}
	else{
		//echo "not working";
		header("location: ../index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$con = mysqli_connect("localhost","root","","spa_website"); // Connect to server and database
		
		// Check connection
		if (mysqli_connect_errno()) 
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$id = $_GET['id'];
		mysqli_query($con, "DELETE FROM songs WHERE id = '$id'"); //SQL Query
		header("location: ../login_php/home.php");
	}
?>
	