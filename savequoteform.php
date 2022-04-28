<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Fuel Quote</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
<body>
    <?php
        //require
        require('db.php');
        session_start();
        $username = $_COOKIE["username"];
        // When form submitted, check and create user session.
        if (isset($_POST['totalPrice'])) {
            $gallons = stripslashes($_REQUEST['gallons']);    // removes backslashes
            $gallons = mysqli_real_escape_string($con, $gallons);
            $deliveryAddress = stripslashes($_REQUEST['address']);    // removes backslashes
            $deliveryAddress = mysqli_real_escape_string($con, $deliveryAddress);
            $pricePerGal = stripslashes($_REQUEST['pricePerGal']);    // removes backslashes
            $pricePerGal = mysqli_real_escape_string($con, $pricePerGal);
            $totalPrice = stripslashes($_REQUEST['totalPrice']);    // removes backslashes
            $totalPrice = mysqli_real_escape_string($con, $totalPrice);
            $month = stripslashes($_REQUEST['month']);    // removes backslashes
            $month = mysqli_real_escape_string($con, $month);
            $day = stripslashes($_REQUEST['day']);    // removes backslashes
            $day = mysqli_real_escape_string($con, $day);
            $year = stripslashes($_REQUEST['year']);    // removes backslashes
            $year = mysqli_real_escape_string($con, $year); //

            $query = "DELETE FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $query = "UPDATE `clientinformation` SET HasRequested = '1' WHERE Username = '$username'";
            $result = mysqli_query($con, $query);
            $query = "INSERT INTO `fuelquote` VALUES ('$gallons', '$deliveryAddress', '$pricePerGal', '$totalPrice', '$username', '$month', '$day', '$year')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                    <h3>Saved.</h3><br/>
                    <p class='link'>Click here to go back to the <a href='dashboard.php'>HomePage</a>.</p>
                    </div>";
            } else {
                echo "<div class='form'>
                    <h3>Incorrect Username/password.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
            }
        }
        else {
            $query = "SELECT `Address1` FROM `clientinformation` WHERE `username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $address1 = $row[0];

            $query = "SELECT `Gallons` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $gallons = $row[0];

            $query = "SELECT `Price` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $price = $row[0];

            $query = "SELECT `Total` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $total = $row[0];

            $query = "SELECT `Month` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $month = $row[0];

            $query = "SELECT `Day` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $day = $row[0];
            
            $query = "SELECT `Year` FROM `temptable` WHERE `Username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $year = $row[0];
    ?>
            <form action="" method="post">
            <label for = "gallons">Gallons Requested:</label><br>
            <input type = "number" id = "gallons" name = "gallons" value = "<?php echo $gallons; ?>" required><br>
            <label for= "address">Delivery Address</label><br>
            <input type = "text" id = "address" name = "address" value = "<?php echo $address1; ?>" readonly><br>
            <label for= "deliveryDate">Delivery Date</label><br>
            <label for = "month">Month:</label><br>
            <input type = "number" id = "month" name = "month" min = 1 max = 12 value = "<?php echo $month; ?>" required><br>
            <label for = "day">Day:</label><br>
            <input type = "number" id = "day" name = "day" min = 1 max = 31 value = "<?php echo $day; ?>" required><br>
            <label for = "year">Year:</label><br>
            <input type = "number" id = "year" name = "year" min = 0 value = "<?php echo $year; ?>" required><br>
            <label for = "pricePerGal">Suggest Price:</label><br>
            <input type = "number" id = "pricePerGal" name = "pricePerGal" value = "<?php echo $price; ?>" readonly><br>
            <label for= "totalPrice">Total Amount Due</label><br>
            <input type = "number" id = "totalPrice" name = "totalPrice" value = "<?php echo $total; ?>" readonly><br>
            <input type = "submit"  name = "GetQuote" value = "Save Quote">
            </form>
            
        <?php
            }
        ?>
</body>
</html>