<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Fuel Quote</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
<body>
    <?php
        require('db.php');
        session_start();
        $username = $_COOKIE["username"];
        // When form submitted, check and create user session.
        if (isset($_POST['gallons'])) {
            $gallons = stripslashes($_REQUEST['gallons']);    // removes backslashes
            $gallons = mysqli_real_escape_string($con, $gallons);
            $gallons = intval($gallons);
            if($gallons > 1000)
            {
                $GRF = 0.02;
            }
            else
            {
                $GRF = 0.03;
            }
            // Check user is exist in the database
            //$query    = "INSERT INTO `fuelquote` (GallonsRequested, DeliveryDate) VALUES ('$gallons', '$deliverydate')";
            $query = "SELECT `States` FROM `clientinformation` WHERE `username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $state = $row[0];
            if($state == "tx" || $state == "TX")
            {
                $LF = 0.02;
            }
            else{
                $LF = 0.04;
            }
            $query = "SELECT HasRequested FROM `clientinformation` WHERE username = '$username'";
            $result = mysqli_query($con, $query);
            $result = $result->fetch_array();
            $HasRequested = intval($result[0]);
            if($HasRequested == 0)
            {
                $RHF = 0;
            }
            else
            {
                $RHF = 0.01;
            }
            $CPF = 0.1;
            $currentPrice = 1.5;
            $margin = $currentPrice * ($LF - $RHF + $GRF + $CPF);
            $suggestedPrice = $currentPrice + $margin;
            $total = $gallons * $suggestedPrice;

            $month = stripslashes($_REQUEST['month']);    // removes backslashes
            $month = mysqli_real_escape_string($con, $month);
            $month = intval($month);
            $day = stripslashes($_REQUEST['day']);    // removes backslashes
            $day = mysqli_real_escape_string($con, $day);
            $day = intval($day);
            $year = stripslashes($_REQUEST['year']);    // removes backslashes
            $year = mysqli_real_escape_string($con, $year);
            $year = intval($year);


            $query = "INSERT INTO `temptable` VALUES ('$username', '$gallons', '$suggestedPrice', '$total', '$month', '$day', '$year')";
            $result = mysqli_query($con, $query);
            if ($result) {
                header("Location: savequoteform.php");
            } else {
                echo "<div class='form'>
                    <h3>did not save.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
            }
        }
        else {
            $query = "SELECT `Address1` FROM `clientinformation` WHERE `username` = '$username'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            $address1 = $row[0];
    ?>
            <form action="" method="post">
            <label for = "gallons">Gallons Requested:</label><br>
            <input type = "number" id = "gallons" name = "gallons" required><br>
            <label for= "address">Delivery Address</label><br>
            <input type = "text" id = "address" name = "address" value = "<?php echo $address1; ?>" readonly><br>
            <label for= "deliveryDate">Delivery Date</label><br>
            <label for = "month">Month:</label><br>
            <input type = "number" id = "month" name = "month" min = 1 max = 12 value = 1 required><br>
            <label for = "day">Day:</label><br>
            <input type = "number" id = "day" name = "day" min = 1 max = 31 value = 1 required><br>
            <label for = "year">Year:</label><br>
            <input type = "number" id = "year" name = "year" min = 0 value = 1997 required><br>
            <label for = "pricePerGal">Suggest Price:</label><br>
            <input type = "number" id = "pricePerGal" name = "pricePerGal" placeholder="$1.50" readonly><br>
            <label for= "totalPrice">Total Amount Due</label><br>
            <input type = "number" id = "totalPrice" name = "totalPrice" readonly><br>
            <input type = "submit"  name = "GetQuote" value = "Get Quote">
            </form>
            
        <?php
            }
        ?>
</body>
</html>