<?php 
require_once('session.php');
if ($_SESSION['access_id'] < 5) {
    header("Location: index.php");
}


if (isset($_POST["id"])){
    
    $sID = $_POST["id"];
    $classdate = $_POST["date"];
            //insert new
            include_once('db_open.php');
            $sql = " INSERT INTO attendance ('classdate','attended','student_id') VALUES ('$classdate','1','$sID');";
            $conn->query($sql);
    echo "<script>window.location = 'menu.php';</script>";
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
                <legend><span class="number">#</span> Add Student !</legend>
                <input type="hidden" name="date" value="<?php echo $_GET["date"]; ?>" ?>
                <select name="id">
                    <?php
                    include_once('db_open.php');
                    $class =  $_SESSION['class_id'];
                    $sql = "SELECT id,name,surname FROM student WHERE class_id = $class ORDER BY name;";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                        //set options
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . ' ' . $row['surname'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Update" /><input type="button" value="Cancel" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html>