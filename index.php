<html>
    <head>
        <title>Music Inc.</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/tables.css">
        <script type="text/javascript" src="js/main.js"></script>
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
<body>
    <div>
        <section id="welcomeSec">
            <div class="l-r-Buttons>"
                 <button id="rButton"><a href="login_php/register.php">Register</a></button>
            </div>
            <div class="l-r-Buttons">
                <button id="lButton"><a href="login_php/login.php">Login</a></button>
            </div>
            <div class="welcome">
                <h1 id="welcomeH1">Music Inc.</h1>
                <div id="welcomeButton">
                    <input id="welcomeButton-1" type="button" name="welcomeButton" value="Welcome" onclick="welcomeButton()"/>
                </div>
            </div>
        </section>
    </div>
    <div class="nav-bar" id="navbar">
        <a href="index.php#welcomeSec">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#songsTable">Songs</a>
        <a href="index.php#albumsTable">Albums</a>
    </div>
    <div>
        <section id="about">
            <h1 id="about-h1">About</h1>
            <img id="about_album_image" src="images/album_art/album_3.jpg" alt="album_3">
            <p class="about-p" style="color: #ff9999">
                Hoover over the image on the left to change it.
            </p>
            <p class="about-p">
                This website is purely for informational purposes. It contains various songs and albums from various artists.
                <br/> We here at Music Inc. hope that you get all the information you desire.
            </p>
            <p class="about-p">
                This Paragraph is used just for spacing out the webpage to enhance the visual effect. I hope you are enjoying
                <br/> the website thus far, and that you enjoy it as you continue.
            </p>
            <p class="about-p">
                This Paragraph is used just for spacing out the webpage to enhance the visual effect. I hope you are enjoying
                <br/> the website thus far, and that you enjoy it as you continue.
            </p>
        </section>
    </div>
    <div class="songsTable">
        <br/><br/><br/><br/>
        <br/><br/><br/><br/>
        <br/><br/>
        <section id="songsTable">
            <h1 id="songs-h1">Songs</h1>
            <table class="table">
                <tr>
                    <th class="th">ID</th>
                    <th class="th">Song Name</th>
                    <th class="th">Artist</th>
                    <th class="th">Album Name</th>
                    <th class="th">Year of Release</th>
                    <th class="th">Contributing Artist(s)</th>
                </tr>
                <?php
                $con = mysqli_connect("localhost", "root", "", "spa_website"); // Connect to server and database
                // Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                //$query = mysqli_query($con, "SELECT * FROM list WHERE public='yes'"); //SQL Query
                $query = mysqli_query($con, "SELECT * FROM songs"); //SQL Query

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
                ?>
            </table>
        </section>
    </div>
    <div class="albumsTable">
        <section id="albumsTable">
            <h1 id="albums-h1">Albums</h1>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Album Name</th>
                    <th>Artist</th>
                    <th>Year of Release</th>
                    <th>No. of Songs</th>
                    <th></th>
                </tr>
                <?php
                $con = mysqli_connect("localhost", "root", "", "spa_website"); // Connect to server and database
// Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

//$query = mysqli_query($con, "SELECT * FROM list WHERE public='yes'"); //SQL Query
                $query = mysqli_query($con, "SELECT * FROM albums"); //SQL Query

                while ($row = mysqli_fetch_array($query)) {
                    Print "<tr>";
                    Print '<td >' . $row['id'] . "</td>";
                    Print '<td >' . $row['album_name'] . "</td>";
                    Print '<td >' . $row['artist'] . "</td>";
                    Print '<td >' . $row['year_of_release'] . "</td>";
                    Print '<td >' . $row['no_of_songs'] . "</td>";
                    //Print '<td align="center"> <img src="images/'. $row['album_art'] . '"/></td>';
                    Print '<td align="ceter">' . '<button id="modal_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">More Info</button>' . "</td>";
                    Print "</tr>";
                }
                ?>
            </table>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Album Artwork</h4>
                </div>
                <div class="modal-body">
                    <img src="images/album_art/album.jpg"/>
                    <p id="modal-para">This image is for design purposes only</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id="footer-div">
            <p>This is the footer of Music Inc.</p>
            <p>Contact us: support@musicinc.com or +353 01 123456</p>
        </div>
    </footer>
</body>
</html>