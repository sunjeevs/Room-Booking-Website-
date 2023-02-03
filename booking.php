<?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether room id is set or not
        if(isset($_GET['room_id']))
        {
            //Get the room id and details of the selected room
            $room_id = $_GET['room_id'];

            //Get the DEtails of the SElected room
            $sql = "SELECT * FROM tbl_room WHERE id=$room_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //room not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- room sEARCH Section Starts Here -->
    <section class="room-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Fill This Form to Confirm Your Booking.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Room</legend>

                    <div class="room-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/room/<?php echo $image_name; ?>" alt="Room" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="room-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="room" value="<?php echo $title; ?>">

                        <p class="room-price">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Booking Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. John Doe" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@johndoe.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Booking" value="confirm" class="btn btn-primary">
                    <br><br>
                </fieldset>

            </form>  

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $room = $_POST['room'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $book_date = date("Y-m-d h:i:s"); //Book DAte

                    $status = "Booked";  

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_book SET 
                        room = '$room',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        book_date = '$book_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address' ";

                    // echo $sql2;

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Booking Saved
                        $_SESSION['order'] = "<div class='success text-center'>Room Booked Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Booking
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Book Room.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>


        </div>
    </section>
    <!-- room sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
