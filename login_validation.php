<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: index.php");
    exit;
}

session_start();

require "data.php";

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if($connection->errno != 0)
{
    header("Location: error.php");
}
else
{
    $query =
    sprintf("SELECT * FROM users WHERE username = '%s'",
    mysqli_real_escape_string($connection, $username));

    if($result = $connection->query($query))
    {
        if($result->num_rows == 1)
        {
            $query =
            sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s' ",
            mysqli_real_escape_string($connection, $username),
            mysqli_real_escape_string($connection, $password));

            if($result = $connection->query($query))
            {
                if($result->num_rows == 1)
                {
                    session_unset();
                    $_SESSION['data'] = $result->fetch_assoc();
                    header("Location: logged.php");   
                }
                else
                {
                    $_SESSION['error_password'] = "wrong password";
                    header("Location: login.php");
                }
            }
        }
        else
        {
            $_SESSION['error_username'] = "wrong username";
            header("Location: login.php");
        }
        $result->free();
    }
    $connection->close();
}

?>