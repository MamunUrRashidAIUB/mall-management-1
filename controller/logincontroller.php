<?php
// logincontroller.php
require_once '../model/dbconn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $errors = [];
    if (!$email || !$password) {
        $errors[] = 'Email and password are required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (empty($errors)) {
        $conn = getConnection();
        $sql = "SELECT id, name, password FROM users WHERE email = :email";
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':email', $email);
        oci_execute($stid);
        $row = oci_fetch_assoc($stid);
        oci_free_statement($stid);
        if ($row && password_verify($password, $row['PASSWORD'])) {
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_name'] = $row['NAME'];
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            $errors[] = 'Invalid email or password.';
        }
    }
    $_SESSION['login_errors'] = $errors;
    header('Location: ../views/login.php');
    exit;
}
