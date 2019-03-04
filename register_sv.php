<?php 
require_once('session.php');

//load data varables
$classdate = '';

//check insert or update data
if (isset($_POST['classdate'])) {

    $classdate = $_POST['classdate'];

    $classid = $_SESSION['class_id'];
    include_once('db_open.php');
    $sql = "select attendance.id as id, classdate, class_id, attended, name, surname from attendance inner join student on student.id = student_id where class_id = $classid and classdate = '$classdate'";
    $result = $conn->query($sql);

    foreach ($result as $row) {
        $sID =  $row['id'];
        if (isset($_POST['attended'][$sID])) {
            //insert new
            include_once('db_open.php');
            $sql = "update attendance set attended = 1 where id = $sID";
            $conn->query($sql);
        } else {
            include_once('db_open.php');
            $sql = "update attendance set attended = 0 where id = $sID";
            $conn->query($sql);
        }
    }
    header("Location: menu.php");
}

?>
<html>

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
        <form method="POST">
            <fieldset>
                <legend><span class="number">1</span> Date of Sunday:</legend>
                <input type="date" value="<?php echo $_GET['date']; ?>" name="classdate" readonly />
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Attendance:</legend>
                <?php
                $classid = $_SESSION['class_id'];
                $classdate = $_GET['date'];
                include_once('db_open.php');
                $sql = "select attendance.id, classdate, class_id, attended, name, surname from attendance inner join student on student.id = student_id where class_id = $classid and classdate = '$classdate'";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    $attened = '';
                    if ($row['attended'] == "1") {
                        $attened = 'checked';
                    }
                    echo '<input type="checkbox"  value="' . $row['id'] . '" name="attended[' . $row['id'] . ']"' . $attened . '><span class="checkboxtext"> ' . $row['name'] . ' ' . $row['surname'] . "</span><br>";
                }
                ?>
            </fieldset>
            <input type="submit" value="Finish" /> <input type="button" value="Cancel" onclick='window.location = "menu.php";' />
        </form>
    </div>
</body>

</html> 