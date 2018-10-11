<?php
    session_start();

    if (isset($_SESSION['sukses']))
        header("Location: halaman.php");
        
    if (isset($_GET['exit'])) {
        session_destroy();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>TA6 - Login</title>
    <link rel="stylesheet" href="css/style_lr.css">
</head>
<body>
    <a href="register.php" id="button">Register</a>
<!-- =============================================================================== -->
    <div class="login">
        <div id="title">
            <h3>TA6 - Login</h3>
        </div>
        <div id="data">
            <form action="proses_lr.php?login=user" method="POST">
                <b>Username</b><br><input type="text" name="username" autofocus required><br><br>
                <b>Password</b><br><input type="password" name="password" required><br><br>
                <input type="submit" value="Login"> <input type="reset" value="Reset">
            </form>
        </div>
    </div>
<!-- =============================================================================== -->
</body>
</html>
