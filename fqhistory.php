<?php
    require('db.php');
    session_start();
    $username = $_COOKIE["username"];
    $query = "SELECT * FROM `fuelquote` WHERE `Username` = '$username'"; //You don't need a ; like you do in SQL
    $result = mysqli_query($con, $query);
    
    echo "<table border=2>"; // start a table tag in the HTML
    echo "<tr><td>" . "Username" . "</td><td>" . "Gallons Requested" . "</td><td>" . "Delivery Date" . "</td><td>" . "Suggested Price" . "</td><td>" . "Total Amount" . "</td></tr>";
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<tr><td>" . htmlspecialchars($row['Username']) . "</td><td>" . htmlspecialchars($row['GallonsRequested']) . "</td><td>" . htmlspecialchars($row['DeliveryDate']) . "</td><td>" . htmlspecialchars($row['PricePerGallon']) . "</td><td>" . htmlspecialchars($row['Total']) . "</td></tr>";  //$row['index'] the index here is a field name
    }
    
    echo "</table>"; //Close the table in HTML
?>
