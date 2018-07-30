    <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$date = new DateTime();
$year = $date->format("Y");
$week = "-W".$date->format("W");
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
                <legend><span class="number">#</span>Absent</legend>
                
                <input type="week" name="week" value="<?php echo $year.$week; ?>"> 
                <label><h1>Kersies</h1></label>
                Jannie - Mamma: 082 934 4699, Pappa: 060 051 1553<br>
                Sannie - Mamma:, Pappa: 060 051 1553<br>
                <label><h1>Lampies</h1></label>
                Jannie - Mamma:, Pappa: 060 051 1553<br>
                Sannie - Mamma:, Pappa: 060 051 1553<br>
                <label><h1>Tieners</h1></label>
                Jannie - Mamma: 082 934 4699, Pappa: <br>
                Sannie - Mamma:, Pappa:<br>
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
                </fieldset>
            </form>
        </div>
    </body>
</html>
