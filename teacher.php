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
                <legend><span class="number">1</span> Candidate Info</legend>
                Name:
                <input type="text" name="field1" placeholder="UserName *">
                Password:
                <input type="text" name="field2" placeholder="Password *">     
                </fieldset>
                <input type="button" value="Add" onclick='window.location = "done.php";' /> <input type="button" value="Cansel" onclick='window.location = "menu.php";'  />
            </form>
        </div>
    </body>
</html>
