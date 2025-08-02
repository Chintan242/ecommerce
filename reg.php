<?php 

include "connection.php";

$name = $_POST["name"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];


$sql = "INSERT INTO `users` (`id`, `name`, `email`, `uname`, `pass`) VALUES (NULL, '$name', '$email', '$uname', '$pass');";


if (mysqli_query($conn,$sql)) {
    header("location:index.php");
    // echo "Name: $name, Email: $email, Username: $uname, Password: $pass";

} else {
    echo "failed". mysqli_error($conn);
}


mysqli_close($conn);
?>



