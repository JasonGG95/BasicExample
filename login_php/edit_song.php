<html>
    <head>
        <title>Music Inc.</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/tables.css">
        <script type="text/javascript" src="../js/main.js"></script>
        <!--This is the bootstrap links used for the table-->
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!--This is the bootstrap links for the modal-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
session_start();
//echo $_SESSION['login_user'];

if ($_SESSION['login_user']) {// checks if the user is logged in  
    //echo "working";
} else {
    //echo "not working";
    header("location: index.php"); // redirects if user is not logged in
}
$id_exists = false;
?>
<body>
    <div class="l-h-Button>"
        <button id="l-Button"><a href="../login_php/logout.php"> Logout </a></button></a>
    </div>
    <div class="l-h-Button>"
        <button id="h-Button"><a href="../login_php/Home.php#songsTable"> Home </a></button></a>
    </div>
    <div class="songsTable">
        <section id="songsTable">
            <h1 id="songs-h1">Songs</h1>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Song Name</th>
                    <th>Artist</th>
                    <th>Album Name</th>
                    <th>Year of Release</th>
                    <th>Contributing Artist(s)</th>
                </tr>
                <?php
                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    $con = mysqli_connect("localhost", "root", "", "spa_website"); // Connect to server and database
                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = mysqli_query($con, "SELECT * FROM songs WHERE id='$id'"); //SQL Query
                    $count = mysqli_num_rows($query); //Checks for the count of the number of rows matching that id

                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            Print "<tr>";
                            Print '<td align="center">' . $row['id'] . "</td>";
                            Print '<td align="center">' . $row['song_name'] . "</td>";
                            Print '<td align="center">' . $row['artist'] . "</td>";
                            Print '<td align="center">' . $row['album_name'] . "</td>";
                            Print '<td align="center">' . $row['year_of_release'] . "</td>";
                            Print '<td align="center">' . $row['contributing_artist'] . "</td>";
                            Print "</tr>";
                        }
                    } else {
                        $id_exists = false;
                    }
                }
                ?>
            </table>
        </section>
    </div>
    <br/>
    <?php
    if ($id_exists) {
        Print '<div class="songsForm">
                    <h1 id="edit_song-h1">Edit Song</h1>
                    <form action="edit_song.php" method="POST">    
                        <table class="formTable">
                            <tr>
                                <th>Song Name:</th>
                                <td><input type="text" name="song_name"/></td>
                            </tr>
                            <tr>
                                <th>Artist:</th>
                                <td><input type="text" name="artist"/></td>
                            </tr>
                            <tr>
                                <th>Album Name:</th>
                                <td><input type="text" name="album_name"/></td>
                            </tr>
                            <tr>
                                <th>Year of Release:</th>
                                <td><input type="text" name="year_of_release"/></td>
                            </tr>
                            <tr>
                                <th>Contributing Artist(s):</th>
                                <td><input type="text" name="contributing_artist"/></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" value="Edit Song"/></td>
                            </tr>
                        </table>
                    </form>
            </div>';
    } else {
        Print ' <h2 align="center" style="color: whitesmoke;"> There is no date to be edited.</h2> ';
    }
    ?>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "spa_website");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $id = $_SESSION['id'];
    $song_name = mysqli_real_escape_string($con, $_POST['song_name']);
    $artist = mysqli_real_escape_string($con, $_POST['artist']);
    $album_name = mysqli_real_escape_string($con, $_POST['album_name']);
    $year_of_release = mysqli_real_escape_string($con, $_POST['year_of_release']);
    $contributing_artist = mysqli_real_escape_string($con, $_POST['contributing_artist']);

    mysqli_query($con, "UPDATE songs SET song_name = '$song_name', artist = '$artist', album_name = '$album_name', year_of_release = '$year_of_release', contributing_artist = '$contributing_artist' WHERE id = '$id'"); //SQL Query
    header("location: home.php#songsTable");
}
?>