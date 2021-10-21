<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE HTML>


<html>
    <head>
        <style>
            html
            {
                background-color: black;
                color: white;
                text-align: center;
                font-size: 100px;
            }
        </style>
    </head>

    <body>
        <div>ERROR, TRY LATER</div>
    </body>
</html>