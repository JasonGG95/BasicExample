<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$con=mysqli_connect("localhost","root","","spa_website");

		// Check connection
		if (mysqli_connect_errno()) 
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		$bool = true;

		$query = mysqli_query($con, "Select * from users WHERE username='$username'"); // Query the users table
		$exists = mysqli_num_rows($query); //Checks if username exists
		$table_users = "";
		$table_password = "";
		if($exists > 0) //IF there are no returning rows or no existing username
		{
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) // display all rows from query
			{
				$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
				$table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
			};
			if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
			{
				if($password == $table_password)
				{
					session_start();
					// Store Session Data
					$_SESSION['login_user']= $username; //set the username in a session. This serves as a global variable
					header ("location: home.php"); // redirects the user to the authenticated home page
				}
			}
			else
			{
				Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
				Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
			}
		}
		else
		{
			Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}
	}
?>