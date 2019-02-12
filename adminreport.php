<?php
require_once('session.php'); 
//check access level
if ($_SESSION['access_id'] < 5) {
    header("Location: index.php");
}
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
                <legend><span class="number">#</span>Attendance</legend> 
                <select name="class_id"  onchange="this.form.submit()" required>
                    <option value="">Select Class</option>
                    <option value="1">Kersies</option>
                    <option value="2">Lampies</option>
                    <option value="3">Spotlights</option>
                    <option value="4">Tieners</option>
                    <option value="5">Metrix+</option>
                </select>
                <table border="1" cellpadding="1">
                    <thead>
                        <tr>
                            <th>Class_Name</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Attended</th>
                            <th>Total</th>
                            <th>Percent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //set filter
                        $class_id = '';
                        if(isset($_GET["class_id"])){ $class_id = $_GET["class_id"]; }

                        include_once('db_open.php');
                        $sql = "select class.name as Class_Name,student.name as Name, student.surname as Surname, sum(attended) as Attended,count(classdate) as Total,ROUND(sum(attended) * 100.0 / count(classdate), 1) AS Percent from attendance inner join student on student.id = attendance.student_id inner join class on class.id = student.class_id WHERE Class_id Like '%$class_id%' Group By student_id Order By Class_Name,student.Name DESC;";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            //set options
                            echo "<tr>";
                                echo "<td>". $row['Class_Name'] ."</td>";
                                echo "<td>" . $row['Name'] . "</td>";
                                echo "<td>" . $row['Surname'] . "</td>";
                                echo "<td>" . $row['Attended'] . "</td>";
                                echo "<td>" . $row['Total'] . "</td>";
                                echo "<td>" . $row['Percent'] . "% </td>";
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