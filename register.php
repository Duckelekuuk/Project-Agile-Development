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

$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Emailadres = ?");
$stmt->bind_param("s", $_POST['registerEmail']);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if ($match){
	die("Email already registered.");
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Kenteken = ?");
$stmt->bind_param("s", $_POST['registerNumberplate']);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if ($match){
	die("Numberplate already registered.");
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Gebruikersnaam = ?");
$stmt->bind_param("s", $_POST['registerUsername']);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if ($match){
	die("Username already registered.");
}

if(strlen($_POST['registerPassword']) < 8){
	die("Password too short.");
}

//email check

//insert data
?>