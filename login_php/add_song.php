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
		
		$song_name = mysqli_real_escape_string($con,$_POST['song_name']);
                $artist = mysqli_real_escape_string($con,$_POST['artist']);
                $album_name = mysqli_real_escape_string($con,$_POST['album_name']);
		$year_of_release = mysqli_real_escape_string($con,$_POST['year_of_release']);
		$contributing_artist = mysqli_real_escape_string($con,$_POST['contributing_artist']);
		
		mysqli_query($con, "INSERT INTO songs(song_name, artist, album_name, year_of_release, contributing_artist) VALUES('$song_name','$artist','$album_name','$year_of_release','$contributing_artist')"); //SQL Query
		header("location: home.php");
		
	}
	else
	{
		header("location: home.php");
	}
?>