<?php
$status = '';
$servername = "localhost:3307";
$username = "root";
$password = "usbw";
$dbname = "mol";


if(isset($_POST['submit']) && !empty($_POST['datetimepicker6']) && !empty($_POST['datetimepicker7']) && !isset($_POST['csrf'])){


if($_POST['csrf'] != $_SESSION['csrf']){
    die("Invalid CSRF token.");
}

// Create connection
    $db = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }


// Get fields value
    $datetimepicker6 = $db->real_escape_string($_POST['datetimepicker6']);
    $datetimepicker7 = $db->real_escape_string($_POST['datetimepicker7']);

    // Insert datetime into the database
    $insert = $db->query("INSERT INTO reserveringen (Van, Tot) VALUES ('".$datetimepicker6."', '".$datetimepicker7."')");

    // If insert successful
    if($insert){
        $status = 'Event data inserted successfully. Event ID: '.$db->insert_id;
    }else{
        $status = 'Failed to insert event data.';

}
}
