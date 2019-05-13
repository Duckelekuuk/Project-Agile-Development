<?php
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";


if(!isset($_POST['registerFullname']) || !isset($_POST['registerEmail']) || !isset($_POST['registerUsername']) || !isset($_POST['registerNumberplate']) || !isset($_POST['registerPassword'])){
	die("Incomplete parameters.");
}

$kenteken = $_POST['registerNumberplate'];
$kenteken = strtoupper(str_replace('-', '', $kenteken));
if(strlen($kenteken) != 6){
	die("Invalid Numberplate.");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $_POST['registerEmail'])){
	die("Invalid email.");
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
$stmt->bind_param("s", $kenteken);
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

//generate salt
$passwordSalt = openssl_random_pseudo_bytes(32);
$passwordWithSalt = $passwordSalt . $_POST['registerPassword'];
$passwordHash = hash('sha256', $passwordWithSalt);

$stmt = $conn->prepare("INSERT INTO klant (Kenteken, Naam, Gebruikersnaam, Wachtwoord, Salt, Emailadres) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $kenteken, $_POST['registerFullname'], $_POST['registerUsername'], $passwordHash, $passwordSalt, $_POST['registerEmail']);
$stmt->execute();
$stmt->close();
?>