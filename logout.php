<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['rollno']);
header('location:Home.php');
?>