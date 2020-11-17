<?php
session_start();
unset($_SESSION["result"]);
mysqli_close($conn);

header("Location:login.html");
?>