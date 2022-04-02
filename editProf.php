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
            $result = mysqli_query($con, $query);
            echo "<div class='form'>
                  <h3>You completed your profile successfully.</h3><br/>
                  <p class='link'>Click here to <a href='homePage.html'>Go To Homepage</a></p>
                  </div>";
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
        <input type="text" class="login-input" name="username" placeholder="Username">
        <input type="text" class="login-input" name="firstname" placeholder="First Name">
        <input type="text" class="login-input" name="middlename" placeholder="Middle Name" >
        <input type="text" class="login-input" name="lastname" placeholder="Last Name">
        <input type="text" class="login-input" name="addy1" placeholder="Address 1">
        <input type="text" class="login-input" name="addy2" placeholder="Address 2 (Optional)">
        <input type="text" class="login-input" name="city" placeholder="City">
        <input type="text" class="login-input" name="states" placeholder="State">
        <input type="text" class="login-input" name="zipcode" placeholder="Zipcode">
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
