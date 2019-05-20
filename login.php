<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
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


$stmt = $conn->prepare("SELECT COUNT(*) FROM klant WHERE Gebruikersnaam = ? AND Wachtwoord = ?");
$stmt->bind_param("ss", $_POST['username'], $passwordHash);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if(!$match) {
	$conn->close();
    die("Invalid credentials.");
}

echo 'Login success.';

$filledInUsername = $_POST['username'];
$_SESSION["username"] = $filledInUsername;

echo "Session username is " . $_SESSION["username"];

header('location:loginhome.php');

$conn->close();
?>
