<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $check = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Account already exists. Please login.'); window.location='login.html';</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters.'); window.history.back();</script>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $username, $email, $hash);
        $insert->execute();
        echo "<script>alert('Signup successful! Please login.'); window.location='login.html';</script>";
    }
    $check->close();
}
$conn->close();
?>