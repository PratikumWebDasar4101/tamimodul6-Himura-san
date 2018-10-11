<!DOCTYPE html>
<html>
    <head>
        <title>TA6 - Register</title>
        <link rel="stylesheet" href="css/style_lr.css">
    </head>
    <body>
        <a href="index.php" id="button">Login</a>
<!-- =============================================================================== -->
        <div class="login">
            <div id="title">
                <h3>Register</h3>
            </div>
            <div id="data">
                <form action="proses_lr.php?register=akun" method="POST">
                    <b>NIM</b><br><input type="text" name="nim" pattern="\d*" maxlength="10" required><br><br>
                    <b>Nama</b><br><input type="text" name="nama" maxlength="35" required><br><br>
                    <b>Username</b><br><input type="text" name="username" required><br><br>
                    <b>Password</b><br><input type="password" name="password" required><br><br>
                    <b>Confirm Password</b><br><input type="password" name="confirm_password" required><br><br>
                    <input type="submit" value="Register"> <input type="reset" value="Reset">
                </form>
            </div>
        </div>
<!-- =============================================================================== -->
    </body>
</html>