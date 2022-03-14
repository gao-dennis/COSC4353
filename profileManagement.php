<?php

//$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if (isset($_POST['Submit'])){
$First_Name = $_POST['First_Name'];
$Middle_Initial = $_POST['Middle_Initial'];
$Last_Name = $_POST['Last_Name']; 
$addy1 = $_POST['addy1'];
$addy2 = $_POST['addy2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$Null = "NULL";



//$sql = "INSERT INTO illitera_COSC3380Library.Users (University_ID, first_name, last_name, email, password, status, member_since, DOB, user_type, print_balanace) VALUES ($final_string);";

//echo $sql;

/*if (!mysqli_query($conn, $sql)){
    echo 'not working';
}
else {
    echo 'data in the database';
    header("Location: ../data_entry.html");

}*/



echo "<table>";

echo "<tr>";
echo "<td>$First_Name</td>";
echo "<td>$Middle_Initial</td>";
echo "<td>$Last_Name</td>";
echo "<td>$addy1</td>";
echo "<td>$addy2</td>";
echo "<td>$city</td>";
echo "<td>$state</td>";
echo "<td>$zipcode</td>";
echo "</tr>";

echo "</table>";
}
//$conn -> close();
?>