<?php
// Database connection details
$host = 'localhost';
$db = 'attendance_system';
$user = 'root';
$password = '';

// Establish a connection to the database
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input values
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password_input = trim($_POST['password']);

    // Query the database for the user
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        // Fetch user data
        $user_data = $result->fetch_assoc();
        $stored_password = $user_data['password']; // Password stored in the database (hashed)

        // Verify password (assuming you use password_hash for hashing)
        if (password_verify($password_input, $stored_password)) {
            // Start session and set user data
            session_start();
            $_SESSION['username'] = $username;

            // Redirect to subjects page
            header('Location: ../views/subjects.php');
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid username or password'); window.location.href='login.html';</script>";
        }
    } else {
        // Invalid username
        echo "<script>alert('User not found'); window.location.href='login.html';</script>";
    }
}
?>
