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

