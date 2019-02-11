<?php
if(isset($_POST)){
    //set defaults
    $user = '';
    $pass = '';

    //set posted user
    if (isset($_POST['user'])){
        $user = $_POST['user'];
    }

    //set posted pass
    if (isset($_POST['password'])) {
        $pass = $_POST['password'];
    }

    include_once 'db_open.php';

    $sql = "SELECT * FROM Teacher where name = '$user' and password = '$pass'";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        //set up session
        $_SESSION['user'] = $row['name'];
        $_SESSION['class_id'] = $row['class_id'];
        $_SESSION['teacher_id'] = (int)$row['id'];
        $_SESSION['access_id'] = (int)$row['access_id'];

        //logged in send to menu
        header("Location: menu.php");
        }
}
?>