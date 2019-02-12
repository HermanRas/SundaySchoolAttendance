    <!DOCTYPE html>
<!--
select
student.name as Name,
student.surname as Surname,
classdate,
attended 
from attendance
inner join student on student.id = attendance.student_id
order by Name,classdate
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
                <legend><span class="number">#</span>Attendance</legend>
                <input type="week" name="week" value="<?php echo $year.$week; ?>"> 
                <select>
                    <option value="-">Kersies</option>
                    <option value="-">Lampies</option>
                    <option value="-">Spotlights</option>
                    <option value="-">Tieners</option>
                </select>
                <label><h1>Kersies</h1></label>
                <table border="1" cellpadding="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Week 34</th>
                            <th>Week 35</th>
                            <th>Week 36</th>
                            <th>Week 37</th>
                            <th>Week 38</th>
                            <th>Week 39</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jannie</td>
                            <td>Yes</td>
                            <td>No</td>
                            <td>Yes</td>
                            <td>No</td>
                            <td>Yes</td>
                            <td>NO</td>
                        </tr>
                        <tr>
                            <td>Sannie</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>NO</td>
                        </tr>
                        <tr>
                            <td>Tanja</td>
                            <td>NO</td>
                            <td>NO</td>
                            <td>NO</td>
                            <td>YES</td>
                            <td>NO</td>
                            <td>NO</td>
                        </tr>
                    </tbody>
                </table>
                <br /><br />
                <input type="button" value="Home" onclick='window.location = "menu.php";' />
                </fieldset>
            </form>
        </div>
    </body>
</html>
