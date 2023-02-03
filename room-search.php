<?php include('partials-front/menu.php'); ?>

    <!-- Room sEARCH Section Starts Here -->
    <section class="room-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>

        </div>
    </section>
    <!-- Room sEARCH Section Ends Here -->

    <!-- Room MEnu Section Starts Here -->
    <section class="room-menu">
        <div class="container">
            <h2 class="text-center">Rooms Available</h2>

            <?php 

                //SQL Query to Get Rooms based on search keyword
                $sql = "SELECT * FROM tbl_room WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether room is available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="room-menu-box">
                            <div class="room-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/room/<?php echo $image_name; ?>" alt="Room" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="room-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="room-price">Rs.<?php echo $price; ?></p>
                                <p class="room-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>booking.php?room_id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Room Not Available
                    echo "<div class='error'>Room not found.</div>";
                }
            
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- Room Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>
