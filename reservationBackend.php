<?php
echo $_POST['csrf'],"\r\n";
echo $_POST['Van'],"\r\n ";
echo $_POST['Tot'];

$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";


if(isset($_POST['submit']) && ($_POST['Van']) && !isset($_POST['Tot']) && !isset($_POST['csrf'])) {
    die("Incomplete parameters");
}
//validate token
    if($_POST['csrf'] != $_SESSION['csrf']) {
        die("Invalid CSRF token.");
    }

// Create connection
    $db = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }


// Get fields value
    $Van = $db->real_escape_string($_POST['Van']);
    $Tot = $db->real_escape_string($_POST['Tot']);

    // Insert datetime into the database
    $insert = $db->query("INSERT INTO reserveringen (Van, Tot) VALUES ('" . $Van . "', '" . $Tot . "')");

    // If insert successful
    if ($insert) {
        $status = 'Event data inserted successfully. Event ID: ' . $db->insert_id;
    } else {
        $status = 'Failed to insert event data.';


}
