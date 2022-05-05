<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Finalize Profile</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    $username = $_COOKIE["username"];
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['firstname'])) {
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($con, $firstname);
        $middlename = stripslashes($_REQUEST['middlename']);
        $middlename = mysqli_real_escape_string($con, $middlename);
        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($con, $lastname);
        $addy1 = stripslashes($_REQUEST['addy1']);
        $addy1 = mysqli_real_escape_string($con, $addy1);
        $addy2 = stripslashes($_REQUEST['addy2']);
        $addy2 = mysqli_real_escape_string($con, $addy2);
        $city = stripslashes($_REQUEST['city']);
        $city = mysqli_real_escape_string($con, $city);
        $state = stripslashes($_REQUEST['states']);
        $state = mysqli_real_escape_string($con, $state);
        $zipcode = stripslashes($_REQUEST['zipcode']);
        $zipcode = mysqli_real_escape_string($con, $zipcode);
        $query    = "UPDATE `clientinformation` SET FirstName = '$firstname', MiddleName = '$middlename', LastName = '$lastname', Address1 = '$addy1', Address2 = '$addy2', City = '$city', States = '$state', Zipcode = '$zipcode' WHERE Username = '$username'";
        $result  = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Your Profile has been updated successfully.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>Go To Homepage</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='updateProf.php'>profile management</a> again.</p>
                  </div>";
        }
    } else {
?>
    <?php
        $query = "SELECT `FirstName` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $fName = $row[0];

        $query = "SELECT `MiddleName` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $mName = $row[0];

        $query = "SELECT `LastName` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $lName = $row[0];

        $query = "SELECT `Address1` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $add1 = $row[0];

        $query = "SELECT `Address2` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $add2 = $row[0];

        $query = "SELECT `City` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $cityy = $row[0];

        $query = "SELECT `States` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $statee = $row[0];

        $query = "SELECT `Zipcode` FROM `clientinformation` WHERE `username` = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $zip = $row[0];
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Update Profile</h1>
        <label>First Name:</label><br>
        <input type="text" class="login-input" name="firstname" value ="<?php echo $fName; ?>">
        <label>Middle Name:</label><br>
        <input type="text" class="login-input" name="middlename" value ="<?php echo $mName; ?>" >
        <label>Last Name:</label><br>
        <input type="text" class="login-input" name="lastname" value ="<?php echo $lName; ?>">
        <label>Address 1:</label><br>
        <input type="text" class="login-input" name="addy1" value ="<?php echo $add1; ?>">
        <label>Address 2:</label><br>
        <input type="text" class="login-input" name="addy2" value ="<?php echo $add2; ?>">
        <label>City:</label><br>
        <input type="text" class="login-input" name="city" value ="<?php echo $cityy; ?>">
        <label>State:</label><br>
        <input type="text" class="login-input" name="states" value ="<?php echo $statee; ?>">
        <label>Zipcode:</label><br>
        <input type="number" class="login-input" name="zipcode" value ="<?php echo $zip; ?>" min = 1 max = 99999>
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
