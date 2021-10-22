<!DOCTYPE HTML>

<?php
    session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">  
    </head>   
    <body>
        <form method="post" action="login_validation.php" class="Form">
            <div class="Header">Username:</div>
            <input type="text" name="username" class="Input" value="<?php echo @$_SESSION['username']; unset($_SESSION['username']);?>"></input>
            <?php echo @$_SESSION['error_username']; unset($_SESSION['error_username']); ?>
            <div class="Header">Password:</div>
            <input type="password" name="password" class="Input" value="<?php echo @$_SESSION['password']; unset($_SESSION['password']);?>"></input>
            <?php echo @$_SESSION['error_password']; unset($_SESSION['error_password']); ?>
            <input type="submit" value="Login" class="Button"></input>
            <input type="button" onclick="window.location.href='register.php';" value="Register" class="Button"></input>
        </form>    
    </body>
</html>    