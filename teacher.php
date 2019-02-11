<?php
require_once('session.php'); 
//check access level
if ($_SESSION['access_id'] < 9){
    header("Location: index.php");
}

//load data varables
$id = '';
$name = '';
$pass = '';
$acc = '';
$class = '';


//check insert or update data
if(isset($_POST['id'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $acc = $_POST['acc'];
    $class = $_POST['class'];

    if($_POST['id'] === ''){
        //insert new
        include_once('db_open.php');
        $sql = " INSERT INTO Teacher ('name','password','class_id','access_id') VALUES ('$name','$pass','$class','$acc');";
        $conn->query($sql);
        header("Location: menu.php");
    }else{
        //update excising
        include_once('db_open.php');
        $sql = "UPDATE Teacher SET name = '$name', password='$pass',class_id ='$class',access_id = '$acc' WHERE id = $id;";
        echo $sql;
        $conn->query($sql);
        header("Location: menu.php");
    }
}

if (isset($_GET['id'])){
    include_once('db_open.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM Teacher where id = '$id';";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        //set up session
        $name = $row['name'];
        $pass = $row['password'];
        $class = $row['class_id'];
        $acc = $row['access_id'];
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
            <form method='POST'>
                <fieldset>
                <legend><span class="number">1</span> Candidate Info</legend>
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                Name:
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="UserName *">
                Password:
                <input type="text" name="password" value="<?php echo $pass; ?>" placeholder="Password *">
                Class: <?php echo $class; ?>
                <select name="class">
                    <option value="1">1-Kersies</option>
                    <option value="2">2-Lampies</option>
                    <option value="3">3-Spotlights</option>
                    <option value="4">4-Tieners</option>
                    <option value="5">5-Metrix&Naskool</option>
                </select>
                Access: <?php echo $acc; ?>
                <select name="acc">
                    <option value="1">1-Teacher</option>
                    <option value="5">5-Student Admin</option>
                    <option value="9">9-Full Admin</option>
                </select>
                </fieldset>
                <input type="submit" value="Add / Update" /> <input type="button" value="Cancel" onclick='window.location = "menu.php";'  />
            </form>
        </div>
    </body>
</html>
