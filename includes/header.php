<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header(header: "Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NUST Attendance System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
