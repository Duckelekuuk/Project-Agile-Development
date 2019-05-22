<?php
$servername = "172.17.0.7:3306";
$username = "molu";
$password = "molp";
$dbname = "mol";

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