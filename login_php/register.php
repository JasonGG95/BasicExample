<html>
    <head>
        <title>Music Inc.</title>
        <link rel="stylesheet" type="text/css" href="../css/login_register.css">
    </head>
    <body>
        <!--<form action="login_php/checklogin.php" method="POST">
            Enter Username: <input type="text" name="username" required="required"/> <br/>
            Enter Password: <input type="password" name="password" required="required"/> <br/>
            <input type="submit" value="Login"/>
        </form>-->
        <h1>Registration</h1> 
        <form action="register.php" method="POST">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required="required">

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required="required">

                <button type="submit">Register</button>
            </div>

            <div class="container">
                <button type="button" class="cancelbtn"><a href="../index.php">Cancel</a></button>
            </div>
        </form>
    </body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$con=mysqli_connect("localhost","root","","spa_website");

		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		$bool = true;
		$query = mysqli_query($con, "Select * from users"); //Query the users table
		while($row = mysqli_fetch_array($query)) //display all rows from query
		{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			if($username == $table_users) // checks if there are any matching fields
			{
				$bool = false; // sets bool to false
				Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
				Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
			}
		}
		if($bool) // checks if bool is true
		{
			$sql="INSERT INTO Users (username, password) VALUES ('$username', '$password')";//Inserts the value to table users

			if (!mysqli_query($con,$sql)) 
			{
				die('Error: ' . mysqli_error($con));
			}
			Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php	
		}
	}
?>