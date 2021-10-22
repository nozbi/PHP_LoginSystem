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
            <div class="Header">Email:</div>     
            <input type="text" name="email" value="<?php echo @$_SESSION['email']; unset($_SESSION['email']); ?>" class="Input"></input>
            <?php echo @$_SESSION['error_email']; unset($_SESSION['error_email']); ?>
            <div class="Header">Username:</div>    
            <input type="text" name="username" value="<?php echo @$_SESSION['username']; unset($_SESSION['username']); ?>" class="Input"></input>
            <?php echo @$_SESSION['error_username']; unset($_SESSION['error_username']); ?>
            <div class="Header">Password:</div>    
            <input type="text" name="password" value="<?php echo @$_SESSION['password']; unset($_SESSION['password']); ?>" class="Input"></input>
            <?php echo @$_SESSION['error_password']; unset($_SESSION['error_password']); ?>
            <div class="Header">Confirm password:</div>     
            <input type="text" name="confirm_password" value="<?php echo @$_SESSION['confirm_password']; unset($_SESSION['confirm_password']); ?>" class="Input"></input>
            <?php echo @$_SESSION['error_confirm_password']; unset($_SESSION['error_confirm_password']); ?>
           <input type="submit" value="Register" class="Button"></input>
           <input type="button" onclick="window.location.href='login.php'" value="Login" class="Button"></input>
        </form>
    </body>
</html>