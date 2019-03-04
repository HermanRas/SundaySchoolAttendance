<?php require_once('session.php'); ?>
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
                <legend><span class="number">#</span> Teacher's Menu</legend>
                <input type="button" value="Do Attendance" onclick='window.location = "register.php";' />
                <input type="button" value="Edit Attendance" onclick='window.location = "register_ed.php";' />
                <br><br><br><br>
                <input type="button" value="View Birthdays" onclick='window.location = "bdays.php";' />
                <input type="button" value="View Absent" onclick='window.location = "absent.php";' />
                <input type="button" value="Attendance Report" onclick='window.location = "report.php";' />
            </fieldset>
            <?php 
            if ($_SESSION['access_id'] > 4) {
                ?>
            <fieldset>
                <legend><span class="number">#</span> Student's Menu</legend>
                <input type="button" value="Add Student" onclick='window.location = "new.php";' />
                <input type="button" value="Update Student" onclick='window.location = "update.php";' />
            </fieldset>
            <?php

        }
        if ($_SESSION['access_id'] > 8) {
            ?>
            <fieldset>
                <legend><span class="number">#</span> Admin's Menu</legend>
                <input type="button" value="Attended Per Class " onclick='window.location = "adminreport.php";' />
                <input type="button" value="Attendance Report All" onclick='window.location = "report_all.php";' />
                <br><br><br><br>
                <input type="button" value="Add Teacher" onclick='window.location = "teacher.php";' />
                <input type="button" value="Update Teacher" onclick='window.location = "edit.php";' />
            </fieldset>
            <?php

        }
        ?>
            <fieldset>
                <br><br><br> <input type="button" value="Logout" onclick='window.location = "logout.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html> 