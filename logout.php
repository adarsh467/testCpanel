<?php
include_once 'config.php';

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['status']);
session_destroy();
mysqli_close($conn);
header("Location: login.php");