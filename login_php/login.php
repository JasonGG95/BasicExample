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
        <h1>Login</h1> 
        <form action="checklogin.php" method="POST">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required="required">

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required="required">

                <button type="submit">Login</button>
            </div>

            <div class="container">
                <button type="button" class="cancelbtn"><a href="../index.php">Cancel</a></button>
            </div>
        </form>
    </body>
</html>