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
    <link rel="stylesheet" href="css/admin.css">
    
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


<div class="main-content">
    <div class="wrapper">
        <h1>Bookings</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Room</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_book ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initial value as 1

                        if($count>0)
                        {
                            //Booking Available
                            if($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the booking details
                                $id = $row['id'];
                                $room = $row['room'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $book_date = $row['book_date'];
                                $status = $row['status'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $room; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $book_date; ?></td>

                                        <td>
                                            <?php 

                                                if($status=="Booked")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Waitlist")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Booking not Available
                            echo "<tr><td colspan='12' class='error'>Booking not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('admin/partials/footer.php'); ?>
