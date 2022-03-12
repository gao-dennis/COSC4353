<?php 
    session_start([
        'cookie_lifetime' => 600,  //seconds (10 mins)
    ]);
    $_SESSION['loggedin'] = FALSE;

    $username = $_POST['inputUsername3'];  
    $password = $_POST['inputPassword3'];  
    
    //echo "$password $username";
    //$sql = "SELECT * FROM Users WHERE University_ID = '$username' AND password = '$password'";
    $count = 1;
        
    if($count >= 1){  
        echo "<h1><center> Login successful </center></h1>";  
        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE; //user is now logged in for the session 
        header("Location: homePage.html");
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }  
?>  