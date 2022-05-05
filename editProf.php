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
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
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
        $query    = "INSERT into `clientinformation` (FirstName, MiddleName, LastName, Address1, Address2, City, States, Zipcode, Username)
                    VALUES ('$firstname', '$middlename', '$lastname', '$addy1', '$addy2', '$city', '$state', '$zipcode', '$username')";
        $result  = mysqli_query($con, $query);
        if ($result) {
            $query = "UPDATE `users` SET hasEdited = '1' WHERE username = '$username'";
            $result1 = mysqli_query($con, $query);
            if($result1)
            {
                echo "<div class='form'>
                  <h3>You completed your profile successfully.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>Go To Homepage</a></p>
                  </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='editProf.php'>profile management</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Finalize Profile</h1>
        <label>Username:</label><br>
        <input type="text" class="login-input" name="username" value = "<?php echo $username; ?>" readonly>
        <label>First Name:</label><br>
        <input type="text" class="login-input" name="firstname" placeholder="First Name" required>
        <label>Middle Name:</label><br>
        <input type="text" class="login-input" name="middlename" placeholder="Middle Name">
        <label>Last Name:</label><br>
        <input type="text" class="login-input" name="lastname" placeholder="Last Name" required>
        <label>Address 1:</label><br>
        <input type="text" class="login-input" name="addy1" placeholder="Address 1" required>
        <label>Address 2:</label><br>
        <input type="text" class="login-input" name="addy2" placeholder="Address 2 (Optional)">
        <label>City:</label><br>
        <input type="text" class="login-input" name="city" placeholder="City" required>
        <label>State:</label><br>
        <input type="text" class="login-input" name="states" placeholder="State" maxlength="2" required>
        <label>Zipcode:</label><br>
        <input type="number" class="login-input" name="zipcode" placeholder="Zipcode" min = 1 max = 99999 required>
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
