<?php 
    //Allow the config
    define('__CONFIG__',true);
    //Require the config
    require_once "../inc/config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Always return JSON format
        header('Content-Type: application/json');
        
        $return=[];
        
        $email = Filter::String($_POST['email']);
        
        $user_found = User::Find($email);
        
        if($user_found){
            //User exists; we can also check to see if they are able to log in
            $return['error'] = "You already have an account";
        } else {
            //User does not exists
            
            //Encrypt password
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $addUser = $con->prepare("INSERT INTO users(email,password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email',$email, PDO::PARAM_STR);
            $addUser->bindParam(':password',$password, PDO::PARAM_STR);
            $addUser->execute();
            
            $user_id = $con->lastInsertId();
            
            $_SESSION['user_id'] = (int) $user_id;
            
            $return['redirect'] = '/Section16_Login_Registration/php_login_course/dashboard.php?message=welcome';
        }
        
        //Make sure the user CAN be added AND is added
        
        //Return the proper information back to JavaScript to redirect us
        
        $return['name'] = "Szidonia Duduj";
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {        
        //Die. Kill the script. Redirect the user. Do something regardless.
        exit('Invalid URL');
    }

    
?>
