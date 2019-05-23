<?php
if ($_GET['Key']  !== "KGUPnX-KNqQDPzK4YMkp0YDZZoJ3khrn5bV6ZEcE4t") {
    header("Location: index.php");
}
include_once('db_open.php');

//Students
echo "<h1>Students<h1>";
$sql = "select student.id,active,student.name,surname,birthday,age,school,houseaddress,mom,momnum,dad,dadnum,churchsms,email,class.name as class from student inner join class on class.id = class_id order by student.name;";
   $result = $conn->query($sql);
    $colcount = $result->columnCount();

    // Get coluumn headers
    echo ('<table><tr>');
    for ($i = 0; $i < $colcount; $i++){
        $meta = $result->getColumnMeta($i)["name"];
        echo('<th>' . $meta . '</th>');
    }
    echo('</tr>');

    // Get row data
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $result->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }
    echo ('</table>');
    echo "<br>";

//Attendance
echo "<h1>Students<h1>";
$sql = "select class.name as class_name, student.name || ' ' || student.surname as Student, classdate, attended 
from attendance 
inner join student on student.id = attendance.student_id 
inner join class on class.id = class_id
order by class.name,student.name,classdate;";
   $result = $conn->query($sql);
    $colcount = $result->columnCount();

    // Get coluumn headers
    echo ('<table><tr>');
    for ($i = 0; $i < $colcount; $i++){
        $meta = $result->getColumnMeta($i)["name"];
        echo('<th>' . $meta . '</th>');
    }
    echo('</tr>');

    // Get row data
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $result->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }
    echo ('</table>');
    echo "<br>";

    echo "<h1>Visitors<h1>";
$sql = "select class.name as class_name, Visitor.name || ' ' || Visitor.surname as Visitor, date 
from Visitor 
inner join class on class.id = class_id
order by class.name,Visitor.name,date;";
   $resultV = $conn->query($sql);
    $colcount = $resultV->columnCount();

    // Get coluumn headers
    echo ('<table><tr>');
    for ($i = 0; $i < $colcount; $i++){
        $meta = $resultV->getColumnMeta($i)["name"];
        echo('<th>' . $meta . '</th>');
    }
    echo('</tr>');

    // Get row data
    while ($row = $resultV->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $resultV->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }
    echo ('</table>');
    echo "<br>";