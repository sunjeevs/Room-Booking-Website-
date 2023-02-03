<?php include('partials/menu.php'); ?>

        <!-- Main Content Start  -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>

                <div class="col-4 text-center">
                   <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM category_table";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                 <div class="col-4 text-center">
                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_room";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Types of Rooms
                </div>

                 <div class="col-4 text-center">
                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_book";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Total Bookings 
                </div>

                 <div class="col-4 text-center">
                   <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_book WHERE status='Booked'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];
                    ?>

                    <h1>Rs.<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>
                <div class="col-4 text-center">
                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM admin_table";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Total Admins
                </div>
                <div class="col-4 text-center">
                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM user_table";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Total Users
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content End -->

       
<?php include('partials/footer.php') ?>        
