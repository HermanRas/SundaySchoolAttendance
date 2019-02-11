    <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                <legend><span class="number">#</span> Teacher's Menu</legend>
                <input type="button" value="Do Register" onclick='window.location = "register.php";' />
                <input type="button" value="Add Student" onclick='window.location = "new.php";'/>
                <input type="button" value="View Birthdays" onclick='window.location = "bdays.php";'/>
                </fieldset>
                <fieldset>
                <legend><span class="number">#</span> Admin's Menu</legend>
                <input type="button" value="Absent Per Class " onclick='window.location = "absent.php";' />
                <input type="button" value="Attendance Report" onclick='window.location = "report.php";'/>
                <input type="button" value="Update Teacher Details" onclick='window.location = "teacher.php";' />
                <input type="button" value="Update Student Details" onclick='window.location = "update.php";'/>
                </fieldset>
            </form>
        </div>
    </body>
</html>
