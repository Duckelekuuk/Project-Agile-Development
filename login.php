<?php
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";

if(!isset($_POST['username']) || !isset($_POST['password'])) {
    die("Incomplete parameters");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Gebruikersnaam = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if(!$match) {
    die("Username not found");
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Gebruikersnaam = ? AND Wachtwoord = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();

$result = $stmt->get_result();
$stmt->close();

if($_POST != $result) {
    die("Entered password is incorrect");
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
