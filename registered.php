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

            #Button
            {
                height: 100px;
                width:400px;
                font-size: 80px;
                background-color: red;
            }
        </style>
    </head>

    <body>
        <?php
        if(!isset($_SERVER['HTTP_REFERER'])){
            header("Location: index.php");
            exit;
        }
        
            session_start();

            echo 'Welcome ';
            echo $_SESSION['data']['username'];
            echo '<br/>';
            echo 'Register Sucesfull';
            
            echo<<<END
                <br/>
                <button onclick="window.location.href='logged.php';" id="Button">Close</button>
            END;
        ?>
    </body>
</html>