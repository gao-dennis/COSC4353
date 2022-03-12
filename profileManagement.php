<?php
$dbServername = "localhost";
$dbUsername = "illitera_daemon";
$dbPassword = "deepintheheartoftexas";
$dbName = "illitera_COSC3380Library";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);


$UUID = $_POST['UUID'];
$title = $_POST['title'];
$a_first = $_POST['a_first_name'];
$a_last = $_POST['a_last_name'];
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$language = $_POST['language'];
$year = $_POST['year'];
$n_pages = $_POST['pages'];
$dewy = $_POST['dewy'];
$Null = "NULL";

#Insert into item first

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

$variables_array = array($UUID,$title,$a_first,$a_last,$publisher,$genre,$language,$year,$n_pages);
$final_string;

foreach($variables_array as $string){
    if ($string == ""){
        $final_string.=$Null;
        $final_string.=",";
    }
    else {
    $final_string .= "'";
    $final_string .= $string;
    $final_string .= "',";
    }
}
if ($dewy == ""){
    $final_string .= $Null;
}
else {
$final_string .= "'".$dewy."'";
}


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




$conn -> close();
?>

