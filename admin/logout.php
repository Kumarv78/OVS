<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['rollno']);
header('location:/mini project-project-2/home.php');
?>