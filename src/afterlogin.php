<?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT Gebruikersnaam FROM klant WHERE Gebruikersnaam = ?");
$stmt->bind_param("s", $_SESSION["username"]);
$stmt->execute();

$result = $stmt->get_result();
$match = $result->fetch_row()[0];
$stmt->close();

if(!$match) {
    header('location:../index.php');
}

$conn->close();

echo "Session username is " . $_SESSION["username"];
?>

<!DOCTYPE html>

<html lang="en">

<form method="post">
    <input type="submit" name="logout" id="logout" value="logout">
</form>

<?php

function logout() {
    session_destroy();
    header('location:../index.php');
}

if(array_key_exists('logout',$_POST)) {
    logout();
}

?>
