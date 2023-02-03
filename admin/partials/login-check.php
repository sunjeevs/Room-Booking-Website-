<?php 

    // Username : admin
    // Password : admin

    //Authorization - Access Control
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access the Admin Panel</div>";
        //REdirect to Login Page
        header('location:'.SITEURL.'admin/login.php');
    }

?>
