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
    // When form submitted, check and create user session.
    if (isset($_POST['gallons'])) {
        $gallons = stripslashes($_REQUEST['gallons']);    // removes backslashes
        $gallons = mysqli_real_escape_string($con, $gallons);
        $deliverydate = stripslashes($_REQUEST['deliveryDate']);
        $deliverydate = mysqli_real_escape_string($con, $deliverydate);
        // Check user is exist in the database
        $query    = "INSERT INTO `fuelquote` (GallonsRequested, DeliveryDate) VALUES ('$gallons', '$deliverydate')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Saved.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>Go To Homepage</a>.</p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form action="" method="post">
    <label for = "gallons">Gallons Requested:</label><br>
    <input type = "number" id = "gallons" name = "gallons" required><br>
    <label for= "address">Delivery Address</label><br>
    <input type = "text" id = "address" name = "address" readonly><br>
    <label for= "deliveryDate">Delivery Date</label><br>
    <input type = "date" id = "deliveryDate" name = "deliveryDate"><br>
    <label for= "pricePerGal">Suggested Price per Gallon</label><br>
    <input type = "number" id = "pricePerGal" name = "pricePerGal" placeholder="$3.00" readonly><br>
    <label for= "totalPrice">Total Amount Due</label><br>
    <input type = "number" id = "totalPrice" name = "totalPrice" readonly><br>
    <input type ="submit" name = "FuelQuote">
    </input>
</form>

<?php
    }
?>
</body>
</html>