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
                <input type="text" name="field1" placeholder="His/Her Name *">
                Surname:
                <input type="text" name="field2" placeholder="His/Her Surname *">
                Birth day:
                <input type="Date" name="field3" placeholder="Birthdate *">
                Age:
                <input type="number" name="field4" placeholder="Age *">
                House Address:
                <textarea name="field4" placeholder="House Address"></textarea>
                <label for="Grade">Grade:</label>
                <select id="Grade" name="field5">
                <optgroup label="Primary School">
                  <option value="Gr0">4 year's</option>
                  <option value="Gr0">5 year's</option>
                  <option value="Gr0">6 year's</option>
                </optgroup>
                <optgroup label="Primary School">
                  <option value="Gr0">Grade 0</option>
                  <option value="Gr1">Grade 1</option>
                  <option value="Gr2">Grade 2</option>
                  <option value="Gr3">Grade 3</option>
                </optgroup>
                <optgroup label="Middel School">
                  <option value="Gr0">Grade 4</option>
                  <option value="Gr1">Grade 5</option>
                  <option value="Gr2">Grade 6</option>
                  <option value="Gr3">Grade 7</option>
                </optgroup>
                <optgroup label="High School">
                  <option value="Gr0">Grade 8</option>
                  <option value="Gr1">Grade 9</option>
                  <option value="Gr2">Grade 10</option>
                  <option value="Gr3">Grade 11</option>
                  <option value="Gr3">Grade 12</option>
                </optgroup>
                <optgroup label="After School">
                  <option value="Gr0">19 year's</option>
                  <option value="Gr0">20 year's</option>
                  <option value="Gr0">21 year's</option>
                  <option value="Gr0">22 year's</option>
                  <option value="Gr0">23 year's</option>
                  <option value="Gr0">24 year's</option>
                  <option value="Gr0">25 year's</option>
                </optgroup>
                </select>      
                </fieldset>
                <fieldset>
                <legend><span class="number">2</span> Additional Info</legend>
                Mother Name and Surname:
                <input type="text" name="field3" placeholder="Mothers Name" />
                Mothers Number:
                <input type="number" name="field3" placeholder="Mothers Number" />
                Fathers Name and Surname:
                <input type="text" name="field3" placeholder="Fathers Name" />
                Fathers Number:
                <input type="number" name="field3" placeholder="Fathers Number"/>
                </fieldset>
                <fieldset>
                <legend><span class="number">3</span> Church SMS Notification:</legend>
                Number to recieve SMS's
                <textarea name="field3" placeholder="Cell Number"></textarea>
                </fieldset>
                <input type="button" value="Add" onclick='window.location = "done.php";' /> <input type="button" value="Cansel" onclick='window.location = "menu.php";'  />
            </form>
        </div>
    </body>
</html>
