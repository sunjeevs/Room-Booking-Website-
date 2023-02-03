<?php

// Include constants.php

include('../config/constants.php');

// Get the ID of admin to be deleted
$id = $_GET['id'];

// SQL query to delete admin
$sql = "DELETE FROM admin_table WHERE id=$id";

// Redirect to manage admin page with message
$res = mysqli_query($conn,$sql);

// Check if the query is executed successfully

if($res==TRUE)
{
    // Query Executed and Admin Deleted
    // echo "Admin Deleted";
    // Creating Session Variable
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    // Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    // Failed to delete
    // echo "Failed to Delete Admin";
     $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Please Try Again</div>";
     header('location:'.SITEURL.'admin/manage-admin.php');
}


?>
