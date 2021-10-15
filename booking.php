<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rainbowarc";

$link =mysqli_connect($servername,$username,$password,$dbname);

if ($link->connect_error)
{
   die("Connection failed......". $conn->connect_error);
}
else
{
   echo "Successfully Connected!...";
}

$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$time = mysqli_real_escape_string($link, $_REQUEST['time']);
$people = mysqli_real_escape_string($link, $_REQUEST['people']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);


// Attempt insert query execution
$sql = "INSERT INTO booking (name,email,phone,date,time,person,message) VALUES ('$name', '$email', '$phone','$date', '$time', '$people','$message')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "SELECT * FROM booking";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "<br><br>name: " . $row["name"]." <br> email: " . $row["email"]. " <br>phone:" . $row["phone"].  "<br>date: " . $row["date"]." <br> time: " . $row["time"]." <br> people: " . $row["people"]." <br> message: " . $row["message"]."<br>";
    }
} else {
    echo "0 results";
}
 
// Close connection
mysqli_close($link);
?>
