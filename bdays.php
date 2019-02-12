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
            <form>
                <fieldset>
                <legend><span class="number">#</span> Birthdays for <?php echo date("F"); ?> !</legend>
                    <?php
                    $classid = $_SESSION['class_id'];
                    include_once('db_open.php');
                    $sql = "SELECT name,surname,birthday FROM student WHERE class_id = $classid and active != 0 and strftime('%m', birthday) = strftime('%m', DATETIME('now')) ORDER BY birthday;";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                        //set options
                        echo '<span class="checkboxtext">' . $row['birthday'] . '</span>'. $row['name'] .' ' . $row['surname'] . '<br>';
                        }   
                    ?>  
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
                </fieldset>
            </form>
        </div>
    </body>
</html>
