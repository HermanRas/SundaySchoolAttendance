<?php 
require_once('session.php');
if ($_SESSION['access_id'] < 5) {
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
        <form action="add_visitor.php">
            <fieldset>
                <legend><span class="number">#</span> Update !</legend>
                <select name="id">
                    <?php
                    include_once('db_open.php');
                    $class =  $_SESSION['class_id'];
                    $sql = "SELECT id,name,surname,date FROM Visitor WHERE class_id = $class ORDER BY date DESC;";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                        //set options
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . ' ' . $row['surname'] . ' (' . $row['date'] . ')</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Update" /><input type="button" value="Cancel"
                    onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html>