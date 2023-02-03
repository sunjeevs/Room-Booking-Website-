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
                        <a href="<?php echo SITEURL; ?>index2.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories2.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>rooms2.php">Rooms</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact2.php">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>my-booking.php">Bookings</a>
                    </li>
                    <li>
                        <a href="index.php">Log Out</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Room search Section Starts Here -->
    <section class="room-search text-center">
        <div class="container">
            
            <form action="room-search2.php" method="POST">
                <input type="search" name="search" placeholder="Search for Rooms..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Room Search Section Ends Here -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?> 


    <!-- Categories Section Starts -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore a Wide Variety of Rooms</h2>

          <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM category_table WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-rooms2.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Room" class="img-responsive img-curve" height="300px" width="300px">
                                        <?php
                                    }
                                ?>
                                
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
     <!-- Categories Section Ends Here  -->

    <!-- Room Menu Section Starts Here -->
    <section class="room-menu">
        <div class="container">
            <h2 class="text-center">Rooms Available</h2>

            <?php 
            
            //Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_room WHERE active='Yes' AND featured='Yes' ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Rooms Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="room-menu-box">
                        <div class="room-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/room/<?php echo $image_name; ?>" alt="Room" class="img-responsive img-curve" height="100px" width="100px">
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
                //Room Not Available 
                echo "<div class='error'>Room not available.</div>";
            }
            
            ?>

            <div class="clearfix"></div>

  
        </div>
    </section>
    <!-- Room Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>
