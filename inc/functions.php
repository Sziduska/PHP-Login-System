<?php
    //Force the user to be logged in or redirect
    function ForceLogin() {
        //Creating user-id session
        if(isset($_SESSION['user_id'])){
            //The user is allowed here
        } else {
            //The user is not allowed here
            header("location: /Section16_Login_Registration/php_login_course/login.php"); exit;
        }
    }

    function ForceDashboard() {
        if(isset($_SESSION['user_id'])){
            //The user is allowed here but redirect anyway
            header("location: /Section16_Login_Registration/php_login_course/dashboard.php"); exit;
        } else {
            //The user is not allowed here
        }
    }
?>
