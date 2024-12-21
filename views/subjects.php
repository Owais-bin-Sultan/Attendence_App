<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../views/login.html');  // Redirect to login if not authenticated
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <h2>Your Subjects</h2>
        <div class="cards-container">
            <!-- Subject cards -->
            <div class="card" onclick="location.href='attendance.php?course=CS101';">
                <h2>Introduction to Programming</h2>
                <p>Course Code: CS101</p>
            </div>
            <div class="card" onclick="location.href='attendance.php?course=MA202';">
                <h2>Mathematics II</h2>
                <p>Course Code: MA202</p>
            </div>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
