<?php
include_once('session.php');
$date = new DateTime();
if (isset($_GET['date'])) {
    $date = new DateTime($_GET['date']);
}
$sdate = $date->format("Y-m-d");
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
                <legend><span class="number">#</span>Absent for Week!</legend>
                <input type="date" name="date" value="<?php echo $sdate; ?>" onchange="this.form.submit()">
                <?php
                $classid = $_SESSION['class_id'];
                include_once('db_open.php');
                $sql = "SELECT classdate,attended,name,surname,mom,momnum,dad,dadnum FROM attendance INNER JOIN student on student . id = attendance . student_id WHERE attended = 0 and classdate > DATETIME('$sdate', '-7 day') and classdate < DATETIME('$sdate', '+1 day') ;";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    //set options
                    $momnumwa = $row['momnum'];
                    $dadnumwa = $row['dadnum'];
                    //drop cell number 0
                    $momnumwa = substr($momnumwa, 1, strlen($momnumwa));
                    $dadnumwa = substr($dadnumwa, 1, strlen($dadnumwa));
                    //add +27
                    $momnumwa = '+27' . $momnumwa;
                    $dadnumwa = '+27' . $dadnumwa;
                    echo '<h1 style="padding:0px;margin:0px;">' . $row['name'] . ' ' . $row['surname'] . '</h1>';
                    echo '<span class="checkboxtext">MOM: ' . $row['mom'] . '- ' . $row['momnum'] . ' <a href="https://wa.me/' . $momnumwa . "?text=Hi " . $row['mom'] . ', ' . $row['name'] . ' was absent from sunday school is every thig OK?" >WHATSAPP</a></span><br>';
                    echo '<span class="checkboxtext">DAD: ' . $row['dad'] . '- ' . $row['dadnum'] . ' <a href="https://wa.me/' . $dadnumwa . "?text=Hi " . $row['dad'] . ', ' . $row['name'] . ' was absent from sunday school is every thig OK?" >WHATSAPP</a></span><br><br>';
                }
                ?>
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
            </fieldset>
        </form>
    </div>
</body>

</html> 