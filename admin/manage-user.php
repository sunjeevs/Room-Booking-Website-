<?php include('partials/menu.php') ?>

        <!-- Main Content Start  -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Users</h1>
                <br>
                <br>

                <?php
                // Adding
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); // Removing session message
                    }
                // Deleting
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']); // Removing session message
                    }
                // Updation
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }    
                // Password Changing
                if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }    
                   
                ?>
                <br><br><br>
                <!-- Button to add admin  -->

                <a href="add-user.php" class="btn-primary">Add User</a>
                <br>
                <br>
                <br>
                <table class="tbl-full">
                    <tr>
                        <th>Serial No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Query to get all admins
                        $sql = "SELECT * FROM user_table";
                        // Execute the Query
                        $res = mysqli_query($conn,$sql);
                        // Check whether the query is executed or not
                        if($res==TRUE)
                        {
                            // Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database
                            $sn = 1;

                            if($count>0)
                            {
                                // We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all data from database
                                    // While loop will run as long as we have data in the database
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    // Display values in table
                                    ?>
                                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-user.php?id=<?php echo $id;?>" class="btn-secondary">Update User</a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id;?>" class="btn-danger">Delete User</a>
                                                </td>
                                            </tr>
                                    <?php 
                                }
                            }
                        }

                    ?>
                </table>
            </div>
        </div>
        <!-- Main Content End -->

<?php include('partials/footer.php') ?>        
