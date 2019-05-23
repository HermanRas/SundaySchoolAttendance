<?php
require_once('session.php');

//load data varables
$id = '';
$name = '';
$surname = '';
$date = '';
$classid = '';

//check insert or update data
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['date'];
    $classid =  $_SESSION['class_id'] ;

    if ($_POST['id'] === '') {
        //insert new
        include_once('db_open.php');
        $sql = " INSERT INTO Visitor ('name','surname','date','class_id') 
                          VALUES ('$name','$surname','$date','$classid');";
        $conn->query($sql);
        header("Location: menu.php");
    } else {
        //update excising
        include_once('db_open.php');
        $sql = "UPDATE Visitor SET name = '$name',surname = '$surname' ,date='$date',class_id='$classid' WHERE id = '$id';";
        $conn->query($sql);
        header("Location: menu.php");
    }
}

if (isset($_GET['id'])) {
    include_once('db_open.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM Visitor where id = '$id';";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        //set up session
        $name = $row['name'];
        $surname = $row['surname'];
        $date = $row['date'];
    }
}

?>

<head>
    <meta charset="UTF-8">
    <title>Luchnos</title>
    <meta name="theme-color" content="#1abc9c">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="Pictures/Logo.png" sizes="192x192">
</head>

<body>
    <div style="text-align: center"><img alt="Logo" src="Pictures/Logo2.png" width="250px" /></div>
    <div class="form-style-5">
        <form method='POST'>
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <legend><span class="number">1</span>Visitor Info</legend>
                Name:
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="His/Her Name *" required>
                Surname:
                <input type="text" name="surname" value="<?php echo $surname; ?>" placeholder="His/Her Surname">
                Birthday:
                <input type="Date" name="date" value="<?php echo date('Y-m-d'); ?>" placeholder="date *" required>
            </fieldset>

            <input type="submit" value="Add / Update" /> <input type="button" value="Cancel"
                onclick='window.location = "menu.php";' />
        </form>
    </div>
</body>

</html>