<?php include('../config/constants.php'); ?>



<html>
    <head>
        <title>Login - SDZ Foods</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body style="background-color:#ff6b81;">
        
        <div class="login">
            <h1 class="text-center">Admin Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                // No Login
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts Here -->

            <form action="" method="POST" class="text-center">
            Username: 
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: 
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <!-- <input type="submit" name="submit" value="Login" class="btn-primary"> -->

            <button type="submit" name="submit" class = "button-75"><span class="text">Log In</span></button>
            
           
            </form>


            <!-- Login Form Ends Here -->
<br><br>
            <p class="text-center">Created By Zaid for IWP Project</p>
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        // Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        // $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        // $raw_password = md5($_POST['password']);
        // $password = mysqli_real_escape_string($conn, $raw_password);

        // SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

        // Execute the Query
        $res = mysqli_query($conn, $sql);

        // Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it

            //Redirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login Fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>



