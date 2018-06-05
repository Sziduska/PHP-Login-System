<?php 
    //Allow the config
    define('__CONFIG__',true);
    //Require the config
    require_once "inc/config.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="follow"/>
    
    <title>Page Title</title>
    
    <base href="/"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Shrikhand" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href=""/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/css/uikit.min.css" />
</head>

<body>
    <div class="uk-section uk-container">
        <?php
            echo "hello world. Today is: ";
            echo date("Y m d");
        ?>
        <p>
            <a href="/Section16_Login_Registration/php_login_course/login.php">Login</a>
            <a href="/Section16_Login_Registration/php_login_course/register.php">Register</a>
        </p>
    </div>

    <?php require_once "inc/footer.php"; ?>

</body>

</html>
