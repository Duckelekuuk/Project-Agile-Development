<?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";

if(!isset($_SESSION["username"])) {
    header('location:../index.php');
    die();
}

echo "Session username is " . $_SESSION["username"];
?>

<!DOCTYPE html>

<html lang="en">

<form method="post">
    <input type="submit" name="logout" id="logout" value="logout">
    <input type="hidden" name="csrf" value=<?php echo '"'. $_SESSION['csrf'] . '"';?>>
</form>

<?php

function logout() {
    session_destroy();
    header('location:../index.php');
}

if(isset($_POST['logout']) && isset($_POST['csrf'])) {
	if($_POST['csrf'] != $_SESSION['csrf']){
		die("Invalid CSRF token.");
	}
    logout();
}

?>
