<?php
session_start();

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
