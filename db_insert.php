    <?php 
    
    $name = '';
    $surname = '';
    $operation = '';
    $jobtitle = ''; 
    $email = '';
    $mobile = '';
    $office = '';

if ($_POST) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $operation = $_POST["operation"];
    $jobtitle = $_POST["jobtitle"]; 
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    include_once './connection.php';

    $sql_mins = " INSERT INTO emp_reg ('name','surname','operation','costcode','jobtitle','email','mobile','office','gender','diet','comment') VALUES ('$name','$surname','$operation','','$jobtitle','$email','$mobile','','','','');";
    $conn->query($sql_mins);

    //for debugging
    //echo $sql_mins;

    
    echo '<script type="text/javascript">window.location.replace("completed.php");</script>';
    }
?>