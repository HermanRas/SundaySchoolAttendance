<?php
require_once('session.php');
include_once('login.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#1abc9c">
    <title>Luchnos</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="Pictures/Logo.png" sizes="192x192">
</head>

<body>
    <div style="text-align: center"><img alt="Logo" src="Pictures/Logo2.png" width="250px" /></div>
    <div class="form-style-5">
        <form method="POST">
            <fieldset>
                <legend><span class="number">#</span> Login</legend>
                <input type="text" name="user" placeholder="Enter user name" />
                <input type="password" name="password" placeholder="Enter password" />
                <input type="submit" value="Login" />
            </fieldset>
        </form>
    </div>
</body>

</html> 