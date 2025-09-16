<?php
// signupcontroller.php
require_once '../model/dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    $errors = [];
    if (!$name || !$email || !$phone || !$password || !$confirm) {
        $errors[] = 'All fields are required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if ($password !== $confirm) {
        $errors[] = 'Passwords do not match.';
    }

    // Check if user exists
    $conn = getConnection();
    $sql = "SELECT id FROM users WHERE email = :email";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':email', $email);
    oci_execute($stid);
    if (oci_fetch($stid)) {
        $errors[] = 'Email already registered.';
    }
    oci_free_statement($stid);

    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, phone, password) VALUES (:name, :email, :phone, :password)";
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':name', $name);
        oci_bind_by_name($stid, ':email', $email);
        oci_bind_by_name($stid, ':phone', $phone);
        oci_bind_by_name($stid, ':password', $hashed);
        $result = oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
        if ($result) {
            oci_free_statement($stid);
                header('Location: ../views/login.php?signup=success');
            exit;
        } else {
            $errors[] = 'Registration failed.';
        }
        oci_free_statement($stid);
    }
    // Show errors
    session_start();
    $_SESSION['signup_errors'] = $errors;
    header('Location: ../views/signup.php');
    exit;
}
