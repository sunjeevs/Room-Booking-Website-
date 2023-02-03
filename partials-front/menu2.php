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
                        <a href="<?php echo SITEURL; ?>">Log Out</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
