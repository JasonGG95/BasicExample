/*
 * Welcome Button
 */
function welcomeButton(){
    document.getElementById('about').scrollIntoView();
}
/*
 * Navigation Bar
 */

function navigationBarFunction() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
window.onscroll = function() {
    navigationBarFunction();
};

/*
 * Data Table
 */
$(document).ready(function() {
    $('#example').DataTable();
} );

/*
 * Delete Data From the Database & Table
 */
function deleteSongFunction(id)
{
    var r = confirm("Are you sure you want to delete this record?");
    if (r == true)
    {
        window.location.assign("../login_php/delete_song.php?id=" + id);
    }
}
function deleteAlbumFunction(id)
{
    var r = confirm("Are you sure you want to delete this record?");
    if (r == true)
    {
        window.location.assign("../login_php/delete_album.php?id=" + id);
    }
}


