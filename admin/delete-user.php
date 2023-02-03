<?php

// Include constants.php

include('../config/constants.php');

// Get the ID of admin to be deleted
$id = $_GET['id'];

// SQL query to delete user
$sql = "DELETE FROM user_table WHERE id=$id";

// Redirect to manage user page with message
$res = mysqli_query($conn,$sql);

// Check if the query is executed successfully

if($res==TRUE)
{
    $_SESSION['delete'] = "<div class='success'>User Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manage-user.php');
}
else{
     $_SESSION['delete'] = "<div class='error'>Failed to Delete User. Please Try Again</div>";
     header('location:'.SITEURL.'admin/manage-user.php');
}


?>
