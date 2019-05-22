<?php
session_start();

$servername = "172.17.0.6:3306";
$username = "molu";
$password = "molp";
$dbname = "mol";


if(!isset($_POST['submit']) || !isset($_POST['Van']) || !isset($_POST['Tot']) || !isset($_POST['csrf'])) {
    die("Incomplete parameters");
}
//validate token
if($_POST['csrf'] != $_SESSION['csrf']) {
    die("Invalid CSRF token.");
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    $conn->close();
    die("Connection failed: " . $conn->connect_error);
}

$van = date_create_from_format('d-m-Y H:i', $_POST['Van'], new DateTimeZone('CET'))->format('Y-m-d H:00:00');
$tot = date_create_from_format('d-m-Y H:i', $_POST['Tot'], new DateTimeZone('CET'))->format('Y-m-d H:00:00');

$kenteken = $_SESSION['kenteken'];

$stmt = $conn->prepare("SELECT Idparkeerplaats FROM parkeerplaats WHERE Idparkeerplaats NOT IN (SELECT Idparkeerplaats FROM reserveringen WHERE ? < Tot AND ? > Van)");
$stmt->bind_param("ss", $van, $tot);
$stmt->execute();

$result = $stmt->get_result();
$plaats = $result->fetch_row()[0];
$stmt->close();

if(empty($plaats)) {
    $conn->close();
    die("No spot availible during this time-frame.");
}

// Get fields value
    $stmt = $conn->prepare("INSERT INTO reserveringen (Kenteken, Idparkeerplaats, Van, Tot) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $kenteken, $plaats, $van, $tot);
    $stmt->execute();
    $stmt->close();

echo("Reserved.");