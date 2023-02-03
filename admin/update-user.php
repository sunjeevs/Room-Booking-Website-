<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>
        <br><br>
        <form action="" method="POST">

        <?php

             //1. Get the ID of Selected user
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM user_table WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }


        ?>

        <table class="tbl-30">
            <tr>
                <td>Full Name : </td>
                <td>
                <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </td>
            </tr>

            <tr>
                <td>Username : </td>
                <td>
                <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>

        </table>


        </form>
    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE user_table SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'>User Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-user.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to Update User</div>";
            header('location:'.SITEURL.'admin/manage-user.php');
        }
    }

?>




<?php include('partials/footer.php');?>

