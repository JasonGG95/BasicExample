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
	if($_SERVER['REQUEST_METHOD'] = "POST")
	{
		$con=mysqli_connect("localhost","root","","spa_website");
		
		// Check connection
		if (mysqli_connect_errno()) 
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$album_name = mysqli_real_escape_string($con,$_POST['album_name']);
		$artist = mysqli_real_escape_string($con,$_POST['artist']);
		$year_of_release = mysqli_real_escape_string($con,$_POST['year_of_release']);
		$no_of_songs = mysqli_real_escape_string($con,$_POST['no_of_songs']);
		
		mysqli_query($con, "INSERT INTO albums(album_name, artist, year_of_release, no_of_songs) VALUES('$album_name','$artist','$year_of_release','$no_of_songs')"); //SQL Query
		header("location: home.php#albumsTable");
		
	}
	else
	{
		header("location: home.php");
	}
?>