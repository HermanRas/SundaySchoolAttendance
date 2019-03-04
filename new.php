<?php
require_once('session.php');
//check access level
if ($_SESSION['access_id'] < 5) {
    header("Location: index.php");
}
//load data varables
$id = '';
$name = '';
$surname = '';
$birthday = '';
$age = '';
$add = '';
$mom = '';
$momcell = '';
$dad = '';
$dadcell = '';
$churchsms = '';
$active = '';
$classid = '';

//check insert or update data
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $add = $_POST['add'];
    $mom = $_POST['mom'];
    $momcell = $_POST['momcell'];
    $dad = $_POST['dad'];
    $dadcell = $_POST['dadcell'];
    $churchsms = $_POST['churchsms'];
    $active = $_POST['active'];
    $classid = $_POST['classid'];

    if ($_POST['id'] === '') {
        //insert new
        include_once('db_open.php');
        $sql = " INSERT INTO student ('name','surname','birthday','age','houseaddress','mom','momnum','dad','dadnum','churchsms','active','class_id') 
                          VALUES ('$name','$surname','$birthday','$age','$add','$mom','$momcell','$dad','$dadcell','$churchsms','$active','$classid');";
        $conn->query($sql);
        header("Location: menu.php");
    } else {
        //update excising
        include_once('db_open.php');
        $sql = "UPDATE student SET name = '$name',surname = '$surname' ,birthday='$birthday',age='$age',houseaddress='$add',mom='$mom',momnum='$momcell',dad='$dad',dadnum='$dadcell',churchsms='$churchsms',active='$active',class_id='$classid' WHERE id = '$id';";
        $conn->query($sql);
        header("Location: menu.php");
    }
}

if (isset($_GET['id'])) {
    include_once('db_open.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM student where id = '$id';";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        //set up session
        $name = $row['name'];
        $surname = $row['surname'];
        $birthday = $row['birthday'];
        $age = $row['age'];
        $add = $row['houseaddress'];
        $mom = $row['mom'];
        $momcell = $row['momnum'];
        $dad = $row['dad'];
        $dadcell = $row['dadnum'];
        $churchsms = $row['churchsms'];
        $active  = $row['active'];
        $classid = $row['class_id'];
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
                <legend><span class="number">1</span> Candidate Info</legend>
                Name:
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="His/Her Name *">
                Surname:
                <input type="text" name="surname" value="<?php echo $surname; ?>" placeholder="His/Her Surname *">
                Birthday:
                <input type="Date" name="birthday" value="<?php echo $birthday; ?>" placeholder="Birthdate *">
                Age:
                <input type="number" name="age" value="<?php echo $age; ?>" placeholder="Age *">
                Home Address:
                <textarea name="add" placeholder="Home Address"><?php echo $add; ?> </textarea>
                Class:
                <?php echo $classid; ?>
                <select name="classid" required>
                    <option value="">Select Class</option>
                    <option value="1">1-Kersies</option>
                    <option value="2">2-Lampies</option>
                    <option value="3">3-Spotlights</option>
                    <option value="4">4-Tieners</option>
                    <option value="5">5-Metrix&Naskool</option>
                </select>
                Active:
                <?php echo $active; ?>
                <select name="active">
                    <option value="1">YES</option>
                    <option value="0">NO</option>
                </select>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Additional Info</legend>
                Mother Name and Surname:
                <input type="text" name="mom" value="<?php echo $mom; ?>" placeholder="Mothers Name" />
                Mothers Number:
                <input type="number" name="momcell" value="<?php echo $momcell; ?>" placeholder="Mothers Number" />
                Fathers Name and Surname:
                <input type="text" value="<?php echo $dad; ?>" name="dad" placeholder="Fathers Name" />
                Fathers Number:
                <input type="number" value="<?php echo $dadcell; ?>" name="dadcell" placeholder="Fathers Number" />
            </fieldset>
            <fieldset>
                <legend><span class="number">3</span> Church SMS Notification:</legend>
                Number to recieve SMS's
                <input type="number" name="churchsms" value="<?php echo $churchsms; ?>" placeholder="Cell Number" />
            </fieldset>
            <input type="submit" value="Add / Update" /> <input type="button" value="Cancel" onclick='window.location = "menu.php";' />
        </form>
    </div>
</body>

</html> 