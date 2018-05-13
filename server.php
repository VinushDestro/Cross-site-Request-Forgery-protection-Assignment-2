<?php

session_start(); //server session starts


if(isset($_POST['submit']))
{
    ob_end_clean(); //clean outer buffer memory
    
    validate($_POST['user'],$_POST['pass'],$_POST['user_csrf'],$_COOKIE['user_login']);

}





function validate($username, $password,$user_token,$user_sessionCookie)
{

    if($username=="ADMIN" && $password=="ADMIN123")
    {
        if($user_token==$_SESSION['CSRF_TOKEN'] && $user_sessionCookie==session_id())
        {
            echo "<script> alert('Logged in Successfully') </script>";
           echo "<script type=\"text/javascript\"> window.location.href = 'logged.php'; </script>";
            
        }
        else
        {
           echo "<script> alert('Login failed! CSRFToken not matching!!') </script>"; 
       //index page
           
           echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
            //logged page
        }   
        
    }
    else{
        echo "<script> alert('Login failed! Check your username, password and login again!!') </script>"; 
           
        echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";

    }

    
}


?>