<?php
session_start();  // Start the session
include "connection.php";

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM `users` WHERE `uname` = '$uname' AND `pass` = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];  // Assuming 'id' is the primary key for the users table
    $_SESSION['uname'] = $user['uname'];
    header("location: index.php");
} else {
    echo "Invalid credentials <a href='login.html'>Try Again</a><br><br>";
    echo "New user <a href='reg.html'>Register</a>";
}

mysqli_close($conn);
?>
