<?php 
    //Allow the config
    define('__CONFIG__',true);
    //Require the config
    require_once "inc/config.php";

    ForceLogin();
    
    $user_id = $_SESSION['user_id'];
    $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
    $getUserInfo->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $getUserInfo->execute();

    if($getUserInfo -> rowCount() == 1) {
        //user was found
        $User = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    } else {
        //user does not exists
        header("location: /Section16_Login_Registration/php_login_course/logout.php"); exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow" />

    <title>Page Title</title>

    <base href="/" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Shrikhand" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="" />

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/css/uikit.min.css" />
</head>

<body>
    <div class="uk-section uk-container">
        <h2>Dashboard</h2>
        <p>Hello <?php echo $User['email']; ?>, you registered at <?php echo $User['reg_time']; ?></p>
        <p><a href="/Section16_Login_Registration/php_login_course/logout.php">Logout</a></p>
    </div>

    <?php require_once "inc/footer.php"; ?>

</body>

</html>
