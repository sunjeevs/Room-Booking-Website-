<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
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
                <td>Password : </td>
                <td><input type="password" name="password" placeholder="Your Password"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

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

    $sql = "INSERT INTO admin_table SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";

    // Executing query and saving data into database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    //Check whether query is executed or not and display the appropriate message
    if($res==TRUE)
    {
        // echo "data inserted";
        // Create a session variable to display message
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully";
        //Redirect Page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php'); // Concatenation
    }
    else{
        // echo "failed to insert data";
        // Create a session variable to display message
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin";
        //Redirect Page to add admin
        header("location:".SITEURL.'admin/add-admin.php'); // Concatenation
    }
}


?>
