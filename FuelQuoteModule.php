<?php
//$dbServername = "localhost";
//$dbUsername = "illitera_daemon";
//$dbPassword = "deepintheheartoftexas";
//$dbName = "illitera_COSC3380Library";

//$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['FuelQuote'])){
$gallons = $_POST['gallons'];
$address = $_POST['address'];
$deliveryDate = $_POST['deliveryDate'];
$pricePerGal = $_POST['pricePerGal'];
$totalPrice = $_POST['totalPrice'];
$Null = "NULL";

#Insert into item first
/*
$Appended_UUID .= "'".$UUID."'";
$search_query = "SELECT UUID FROM Items WHERE UUID = $Appended_UUID;";
$passed = mysqli_query($conn, $search_query);
if ($passed ->num_rows==0){
    $UUID_and_Type .= "'".$UUID."','"."1"."'";
$Item_Insert_Query = "INSERT INTO Items (UUID,type) VALUES ($UUID_and_Type)";
$Inserted_into_items= mysqli_query($conn, $Item_Insert_Query);
if ($Inserted_into_items == false){
    echo 'Item Insertion not working';
}
    echo $search_query;
}
*/


/*
$sql = "INSERT INTO `Books`(`UUID`, `title`, `author_first_name`, `author_last_name`, `publisher`, `genre`, `language`, `year`, `pages`, `dewy_decimal`) 
VALUES  ($final_string);";
#"."'".$UUID."', "."'".$title."', "."'".$a_first."', "."'".$a_last."', "."'".$publisher."', "."'".$genre."', "."'".$language."', "."'".$year."', "."'".$n_pages."', "."'".$dewy."'"."
echo $sql;
if (!mysqli_query($conn, $sql)){
    echo 'not working';
}
else {
    echo 'data in the database';
    header("Location: ../data_entry.html");
}
*/
echo "submitted";

}
//$conn -> close();



?>