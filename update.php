<?php 
require_once('session.php');

//load data varables
$id = '';
$name = '';
$pass = '';
$acc = '';
$class = '';


//check insert or update data
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $acc = $_POST['acc'];
    $class = $_POST['class'];

    if ($_POST['id'] === '') {
        //insert new
        include_once('db_open.php');
        $sql = " INSERT INTO Teacher ('name','password','class_id','access_id') VALUES ('$name','$pass','$class','$acc');";
        $conn->query($sql);
        header("Location: menu.php");
    } else {
        //update excising
        include_once('db_open.php');
        $sql = "UPDATE Teacher SET name = '$name', password='$pass',class_id ='$class',access_id = '$acc' WHERE id = $id;";
        $conn->query($sql);
        header("Location: menu.php");
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Luchnos</title>
        <link rel="stylesheet" href="main.css">   
    </head>
    <body>
        <div style="text-align: center"><img alt="Logo" src="Pictures/Logo2.png" width="250px" /></div>
        <div class="form-style-5">
            <form action="new.php">
                <fieldset>
                <legend><span class="number">#</span> Update !</legend>
                <select name="id">
                <?php
                include_once('db_open.php');
                $sql = "SELECT id,name,surname FROM student ORDER BY name;";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . ' ' . $row['surname'] . '</option>';
                }
                ?>
                </select>
                <input type="submit" value="Update" /><input type="button" value="Cancel" onclick='window.location = "menu.php";'  />
                </fieldset>
            </form>
        </div>
    </body>
</html>

