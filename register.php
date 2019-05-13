<?php
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";


if(!isset($_POST['registerFullname']) || !isset($_POST['registerEmail']) || !isset($_POST['registerUsername']) || !isset($_POST['registerNumberplate']) || !isset($_POST['registerPassword'])){
	die("Incomplete parameters.");
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `parkeerplaats`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["Idparkeerplaats"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>