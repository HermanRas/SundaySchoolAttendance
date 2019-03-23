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
    <style>
        table{
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <div style="text-align: center"><img alt="Logo" src="Pictures/Logo2.png" width="250px" /></div>
    <div class="form-style-5">
        <form>
            <fieldset>
                <legend><span class="number">#</span>Student Info</legend>
                <select name="class" onchange="this.form.submit()">
                    <option value="">Select Class</option>
                    <option value="1">1-Kersies</option>
                    <option value="2">2-Olie-Lampies</option>
                    <option value="3">3-Spotlights</option>
                    <option value="4">4-Tieners</option>
                    <option value="5">5-Metrix&Naskool</option>
                </select>
                <table border="1" cellpadding="1">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Active</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>School</th>
                            <th>House Address</th>
                            <th>Mom</th>
                            <th>Mom Number</th>
                            <th>Dad</th>
                            <th>Dad Number</th>
                            <th>Church SMS</th>
                            <th>Email</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //set filter
                        $classID = '';
                        if (isset($_GET['class'])) {
                            $classID = $_GET['class'];
                        }

                        include_once('db_open.php');
                        $sql = "select student.id,active,student.name,surname,birthday,age,school,houseaddress,mom,momnum,dad,dadnum,churchsms,email,class.name as class from student inner join class on class.id = class_id where class.id LIKE '%$classID%' order by student.name;";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            //set options
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            if ($row['active'] === "1") {
                                $active = "YES";
                            } else {
                                $active = "NO";
                            }
                            echo "<td>" . $active .  "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['surname'] . "</td>";
                            echo "<td>" . $row['birthday'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>" . $row['school'] . "</td>";
                            echo "<td>" . $row['houseaddress'] . "</td>";
                            echo "<td>" . $row['mom'] . "</td>";
                            echo "<td>" . $row['momnum'] . "</td>";
                            echo "<td>" . $row['dad'] . "</td>";
                            echo "<td>" . $row['dadnum'] . "</td>";
                            echo "<td>" . $row['churchsms'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['class'] . "</td>";
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