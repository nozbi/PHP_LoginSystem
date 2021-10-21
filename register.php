<!DOCTYPE HTML>


<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: index.php");
    exit;
}

session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">  
    </head>

    <body>
        <form action="register_validation.php" method="post" class="Form"> 
            <?php
                echo '<div class="Header">Email:</div>';

                if(isset($_SESSION['email']))
                {
                    echo '<input type="text" name="email" value="'.$_SESSION['email'].'" class="Input"></input>';
                    unset($_SESSION['email']);
                }
                else
                {
                    echo '<input type="text" name="email" class="Input"></input> ';
                }


                if(isset($_SESSION['error_email']))
                {
                    echo $_SESSION['error_email'];
                    unset($_SESSION['error_email']);
                }

                echo '<div class="Header">Username:</div>';

                if(isset($_SESSION['username']))
                {
                    echo '<input type="text" name="username" value="'.$_SESSION['username'].'" class="Input"></input>';
                    unset($_SESSION['username']);
                }
                else
                {
                    echo '<input type="text" name="username" class="Input"></input>';
                }


                if(isset($_SESSION['error_username']))
                {
                    echo $_SESSION['error_username'];
                    unset($_SESSION['error_username']);
                }

                echo '<div class="Header">Password:</div>';

                if(isset($_SESSION['password']))
                {
                    echo '<input type="password" name="password" value="'.$_SESSION['password'].'" class="Input"></input>';
                    unset($_SESSION['password']);
                }
                else
                {
                    echo '<input type="password" name="password" class="Input"></input>';
                }


                if(isset($_SESSION['error_password']))
                {
                    echo $_SESSION['error_password'];
                    unset($_SESSION['error_password']);
                }

                echo '<div class="Header">Confirm password::</div>';

                if(isset($_SESSION['confirm_password']))
                {
                    echo '<input type="password" name="confirm_password" value="'.$_SESSION['confirm_password'].'" class="Input"></input>';
                    unset($_SESSION['confirm_password']);
                }
                else
                {
                    echo '<input type="password" name="confirm_password" class="Input"></input>';
                }


                if(isset($_SESSION['error_confirm_password']))
                {
                    echo $_SESSION['error_confirm_password'];
                    unset($_SESSION['error_confirm_password']);
                }
            ?>
           <input type="submit" value="Register" class="Button"></input>
           <input type="button" onclick="window.location.href='login.php'" value="Login" class="Button"></input>
        </form>
    </body>
</html>