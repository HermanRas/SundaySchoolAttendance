<?php 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$isIndexPage = strpos('index.php', (basename($_SERVER['PHP_SELF'])));

if ($isIndexPage !== 0) {
    if (isset($_SESSION['user'])) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
    } else {
        header("Location: index.php");
    }
}
?>