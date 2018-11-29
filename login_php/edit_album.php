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
     <button id="h-Button"><a href="../login_php/home.php#albumsTable"> Home </a></button></a>
</div>
<div class="songsTable">
    <section id="songsTable">
        <h1 id="songs-h1">Albums</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Album Name</th>
                <th>Artist</th>
                <th>Year of Release</th>
                <th>No. of Songs</th>
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

                $query = mysqli_query($con, "SELECT * FROM albums WHERE id='$id'"); //SQL Query
                $count = mysqli_num_rows($query); //Checks for the count of the number of rows matching that id

                if ($count > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        Print "<tr>";
                        Print '<td align="center">' . $row['id'] . "</td>";
                        Print '<td align="center">' . $row['album_name'] . "</td>";
                        Print '<td align="center">' . $row['artist'] . "</td>";
                        Print '<td align="center">' . $row['year_of_release'] . "</td>";
                        Print '<td align="center">' . $row['no_of_songs'] . "</td>";
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
    Print '<div class="albumsForm">
            <section id="albumsForm">
                <h1 id="edit_album-h1">Edit Album</h1>
                <form action="edit_album.php" method="POST">
                    <table class="formTable">
                        <tr>
                            <th>Album Name:</th>
                            <td><input type="text" name="album_name"/></td>
                        </tr>
                        <tr>
                            <th>Artist:</th>
                            <td><input type="text" name="artist"/></td>
                        </tr>
                        <tr>
                            <th>Year of Release:</th>
                            <td><input type="text" name="year_of_release"/></td>
                        </tr>
                        <tr>
                            <th>No. of Songs:</th>
                            <td><input type="text" name="no_of_songs"/></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Edit Album"/></td>
                        </tr>
                    </table>
                </form>
            </section>
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
    $album_name = mysqli_real_escape_string($con, $_POST['album_name']);
    $artist = mysqli_real_escape_string($con, $_POST['artist']);
    $year_of_release = mysqli_real_escape_string($con, $_POST['year_of_release']);
    $no_of_songs = mysqli_real_escape_string($con, $_POST['no_of_songs']);

    mysqli_query($con, "UPDATE albums SET album_name = '$album_name', artist = '$artist', year_of_release = '$year_of_release', no_of_songs = '$no_of_songs' WHERE id = '$id'"); //SQL Query
    header("location: home.php#albumsTable");
}
?>