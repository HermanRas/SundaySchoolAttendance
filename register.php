<?php 
require_once('session.php');
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
            <form method="POST">
                <fieldset>
                <legend><span class="number">1</span> Date of Sunday:</legend>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="date"  />
                </fieldset>
                <fieldset>
                <legend><span class="number">2</span> Attendance:</legend>
                <?php
                $classid = $_SESSION['class_id'];
                include_once('db_open.php');
                $sql = "SELECT id,name,surname FROM student WHERE class_id = $classid;";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    echo '<input type="checkbox" value="' . $row['id'] . '" name="student"><span class="checkboxtext"> '. $row['name'] . ' ' . $row['surname']."</span><br>";

                }
                ?>
                </fieldset>
                <input type="submit" value="Finish" /> <input type="button" value="Cancel" onclick='window.location = "menu.php";'  />
            </form>
        </div>
    </body>
</html>
