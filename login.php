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
            <?php
                if(isset($_SESSION['username']))
                {
                    echo'<input type="text" name="username" value="'.$_SESSION['username'].'" class="Input"></input>';
                    unset($_SESSION['username']);
                }
                else
                {
                    echo'<input type="text" name="username" class="Input"></input>';
                }
            ?>
            <?php
                 if(isset($_SESSION['error_username']))
                 {
                     echo $_SESSION['error_username'];
                     unset($_SESSION['error_username']);
                 }
            ?>
            <div class="Header">Password:</div>
            <?php
                if(isset($_SESSION['password']))
                {
                    echo'<input type="password" name="password" value="'.$_SESSION['password'].'" class="Input"></input>';
                    unset($_SESSION['password']);
                }
                else
                {
                    echo'<input type="password" name="password" class="Input"></input>';
                }
            ?>
            <?php
                if(isset($_SESSION['error_password']))
                {
                    echo $_SESSION['error_password'];
                    unset($_SESSION['error_password']);
                }
            ?>
            <input type="submit" value="Login" class="Button"></input>
            <input type="button" onclick="window.location.href='register.php';" value="Register" class="Button"></input>
        </form>    
    </body>
</html>    