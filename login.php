<?php
session_start();
$servername = "172.17.0.6";
$username = "molu";
$password = "molp";
$dbname = "mol";

if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['csrf'])) {
    die("Incomplete parameters");
}
if($_POST['csrf'] != $_SESSION['csrf']){
	die("Invalid CSRF token.");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT Salt FROM klant WHERE Gebruikersnaam = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();

$result = $stmt->get_result();
$passwordSalt = $result->fetch_row()[0];
$stmt->close();

if(!$passwordSalt) {
	$conn->close();
    die("Invalid credentials.");
}

$passwordWithSalt = $passwordSalt . $_POST['password'];
$passwordHash = hash('sha256', $passwordWithSalt);


$stmt = $conn->prepare("SELECT kenteken FROM klant WHERE Gebruikersnaam = ? AND Wachtwoord = ?");
$stmt->bind_param("ss", $_POST['username'], $passwordHash);
$stmt->execute();

$result = $stmt->get_result();
$kenteken = $result->fetch_row()[0];
$stmt->close();

if(empty($kenteken)) {
	$conn->close();
    die("Invalid credentials.");
}

$_SESSION["kenteken"] = $kenteken;

header('location:loginHome.php');

$conn->close();
?>
