<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: index.php");
        exit;
    }
    
    require 'data.php';

    session_start();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['confirm_password'] = $confirm_password;

    $register_valid = true;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $register_valid = false;
        $_SESSION['error_email'] = "invalid email";
    }

    //

    if(!ctype_alnum($username))
    {
        $register_valid = false;
        $_SESSION['error_username'] = "only letters and numbers are allowed";  
    }
    else if((strlen($username) < 2) || (strlen($username) > 20))
    {
        $register_valid = false;
        $_SESSION['error_username'] = "username must contain 2-20 chars"; 
    }
    else
    {
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->errno == 0)
        {
            $query = sprintf("SELECT * FROM users WHERE username = '%s'", mysqli_real_escape_string($connection, $username));
            if($result = $connection->query($query))
            {
                if($result->num_rows != 0)
                {
                    $register_valid = false;
                    $_SESSION['error_username'] = "username is already taken";  
                }
                $result->free();
            }
            $connection->close();
        }
        else
         {
            header("Location: error.php");
        }
    }

    //

    if((strlen($password) < 8) || (strlen($password) > 20))
    {
        $register_valid = false;
        $_SESSION['error_password'] = "password must contain 8-20 chars";  
    }

    //

    if($password != $confirm_password)
    {
        $register_valid = false;
        $_SESSION['error_confirm_password'] = "passwords don't match";
    }

    //

    if($register_valid == false)
    {
        header("Location: register.php");
    }
    else
    {
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->errno == 0)
        {
            $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
            if($connection->query($query))
            {
                $query2 = "SELECT * FROM users WHERE username = '$username'";
                $result = $connection->query($query2);
                if($result->num_rows == 1)
                {
                    session_unset();
                    $_SESSION['data'] = $result->fetch_assoc();
                    $result->free();
                    header("Location: registered.php");
                }
                else
                {
                    header("Location: error.php");
                }
            } 
            else
            {
                header("Location: error.php");
            } 
            $connection->close(); 
        }
        else
        {
            header("Location: error.php");
        }
    }
?>