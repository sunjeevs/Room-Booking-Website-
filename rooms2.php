<?php include('partials-front/menu2.php'); ?>

    <!-- Room sEARCH Section Starts Here -->
    <section class="room-search text-center">
      <div class="container">
        <form action="<?php echo SITEURL; ?>room-search2.php" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Search for Rooms..."
            required
          />
          <input
            type="submit"
            name="submit"
            value="Search"
            class="btn btn-primary"
          />
        </form>
      </div>
    </section>
    <!-- Room sEARCH Section Ends Here -->

    <!-- Room MEnu Section Starts Here -->
    <section class="room-menu">
        <div class="container">
            <h2 class="text-center">Rooms Available</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_room WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="room-menu-box">
                            <div class="room-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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

                                <a href="<?php echo SITEURL; ?>booking2.php?room_id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Room not Available
                    echo "<div class='error'>Room not found.</div>";
                }
            ?>
 

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- Room Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>
