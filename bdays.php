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
        <form>
            <fieldset>
                <legend><span class="number">#</span> Birthdays for
                    <?php echo date("F"); ?> !</legend>
                <?php
                $classid = $_SESSION['class_id'];
                include_once('db_open.php');
                $sql = "SELECT name,surname,birthday,strftime('%d',birthday) as day, strftime('%W', strftime('%Y','now') || substr(birthday,5,6)) as Week
                        FROM student 
                        WHERE active != 0 and 
                        strftime('%W', strftime('%Y','now') || substr(birthday,5,6)) = strftime('%W', DATETIME('now')) or 
                        strftime('%W', strftime('%Y','now') || substr(birthday,5,6)) = strftime('%W', DATE('now','-7 day')) or 
                        strftime('%W', strftime('%Y','now') || substr(birthday,5,6)) = strftime('%W', DATE('now','+7 day')) 
                        ORDER BY day;";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    echo '<h1>Week:' . $row['Week'] . ' | ' . $row['birthday'] . ' - ' . $row['name'] . ' ' . $row['surname'] . '</h1>';
                }
                ?>
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html>