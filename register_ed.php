<?php 
require_once('session.php');
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
        <form action="register_sv.php">
            <fieldset>
                <legend><span class="number">#</span> Update !</legend>
                <select name="date">
                    <?php
                    include_once('db_open.php');
                    $classid =  $_SESSION['class_id'];
                    $sql = "select classdate,class_id from attendance inner join student on student.id = student_id where class_id = $classid group by classdate, class_id order by classdate;";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                        //set options
                        echo '<option value="' . $row['classdate'] . '">' . $row['classdate'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Update" /><input type="button" value="Cancel" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
        </body> </html> 