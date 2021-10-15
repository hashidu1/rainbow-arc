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
$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);


// Attempt insert query execution
$sql = "INSERT INTO contact (name,email, title,message) VALUES ('$name', '$email', '$subject','$message')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "SELECT * FROM contact";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "<br><br>name: " . $row["name"]." <br> email: " . $row["email"]. " <br>title:" . $row["subject"].  "<br>message: " . $row["message"]."<br>";
    }
} else {
    echo "0 results";
}
 
// Close connection
mysqli_close($link);
?>
