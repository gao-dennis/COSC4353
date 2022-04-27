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
        if($gallons > 1000)
        {
            $GRF = 0.02;
        }
        else
        {
            $GRF = 0.03;
        }
        $deliverydate = stripslashes($_REQUEST['deliveryDate']);
        $deliverydate = mysqli_real_escape_string($con, $deliverydate);
        // Check user is exist in the database
        //$query    = "INSERT INTO `fuelquote` (GallonsRequested, DeliveryDate) VALUES ('$gallons', '$deliverydate')";
        $query = "SELECT `Address1` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $address1 = $row[0];
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

        /*if ($result) {
            $query = "UPDATE `users` SET HasRequested = `1` WHERE `username` = '$username'";
            $result = mysqli_query($con, $query);
            echo "<div class='form'>
                  <h3>hello.</h3><br/>
                  <p class='link'>Click here to go <a href='FuelQuoteForm.php'>back</a>.</p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }*/
    } else {
?>
    <?php
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
    <input type = "date" id = "deliveryDate" name = "deliveryDate"><br>
    <label for= "pricePerGal">Suggested Price per Gallon</label><br>
    <input type = "number" id = "pricePerGal" name = "pricePerGal" placeholder="$1.50" readonly><br>
    <label for= "totalPrice">Total Amount Due</label><br>
    <input type = "number" id = "totalPrice" name = "totalPrice" readonly><br>
    <input type = "submit" name = "GetQuote" value = "Get Qoute">
    <input type ="submit" name = "FuelQuote">
    </input>
</form>

<?php
    }
?>
</body>
</html>