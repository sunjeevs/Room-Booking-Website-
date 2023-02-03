<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/New_Logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>rooms.php">Rooms</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="admin/login.php">Log In (Admin)</a>
                    </li>
                    <li>
                        <a href="user-login.php">Log In (User)</a>
                    </li>
                    <li>
                        <a href="add-user.php">Create User</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>


<div class="main-content">
    <div class="wrapper">
        <h1>Sign Up</h1>
        <br>
        <br>

         <?php // Checking if the session is set or not
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); // Removing session message
                    }
         ?>


        <form action="" method="POST">
            <table class="tbl-30">
            <tr>
                <td>Full Name : </td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="username" placeholder="Your Username"></td>
            </tr>

            <tr>
                <td>Phone Number </td>
                <td><input type="text" name="phnumber" placeholder="Your Phone Number"></td>
            </tr>

             <tr>
                <td>Password : </td>
                <td><input type="password" name="password" placeholder="Your Password"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Sign Up" class="btn-secondary">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials-front/footer.php') ?>

<?php

// Take value from form and save in database
// Check whether the button is clicked or not
if(isset($_POST['submit']))
{
    // Get value from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Password Encryption with md5

    // SQL Query to save data into database

    $sql = "INSERT INTO user_table SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";

    // Executing query and saving data into database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>User Created Successfully</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Create User</div>";
                        header('location:'.SITEURL);
                    }

    
}


?>
