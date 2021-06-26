<?php 
require_once('session.php');

//set filter month
$bMonth = date("m");
if (isset($_GET["bMonth"])){
    $bMonth = $_GET["bMonth"];
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
                <legend><span class="number">#</span> Birthdays for
                    <?php 
                    $dateObj   = DateTime::createFromFormat('!m', $bMonth);
                    $monthName = $dateObj->format('F'); // March
                    echo $monthName;
                    ?>!
                </legend>

                <form method="GET">
                    <label for="bMonth">Select BirthDays Month:</label>
                    <select name="bMonth" onchange="this.form.submit()">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </form>

                <?php
                include_once('db_open.php');
                $sql = "SELECT name,surname,birthday,strftime('%d',birthday) as day, strftime('%m',birthday) as Month FROM student
                        WHERE active != 0 
                        and strftime('%m', birthday) = '$bMonth'  
                        ORDER BY day;";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    echo '<h1>' . $row['birthday'] . ' - ' . $row['name'] . ' ' . $row['surname'] . '</h1>';
                }
                ?>
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html>