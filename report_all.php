<?php
require_once('session.php');
//check access level
if ($_SESSION['access_id'] < 9) {
    header("Location: index.php");
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
        <form>
            <fieldset>
                <legend><span class="number">#</span>Attendance</legend>
                <select name="class" required>
                    <option value="">Select Class</option>
                    <option value="1">1-Kersies</option>
                    <option value="2">2-Olie-Lampies</option>
                    <option value="3">3-Spotlights</option>
                    <option value="4">4-Tieners</option>
                    <option value="5">5-Metrix&Naskool</option>
                </select>
                <input type="date" name="sdate" onchange="this.form.submit()" required />
                <table border="1" cellpadding="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Class Date</th>
                            <th>Attended</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //set filter
                        $sdate = '';
                        if (isset($_GET['sdate'])) {
                            $sdate = $_GET['sdate'];
                        }

                        $classID = '';
                        if (isset($_GET['class'])) {
                            $classID = $_GET['class'];
                        }

                        include_once('db_open.php');
                        $sql = "select student.name as Name, student.surname as Surname, classdate, attended from attendance inner join student on student.id = attendance.student_id where student.class_id LIKE '%$classID%' and classdate LIKE '%$sdate%' order by Name,classdate;";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            //set options
                            echo "<tr>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>" . $row['classdate'] . "</td>";
                            if ($row['attended'] === "1") {
                                $attend = "YES";
                            } else {
                                $attend = "NO";
                            }
                            echo "<td>" . $attend .  "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html> 