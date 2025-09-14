<?php
function getConnection() {
    static $conn; // keep one connection instance alive

    if (!$conn) {
        $username = "scott";
        $password = "tiger";
        $sid = "XE";
        $host = "localhost";

        $conn = oci_connect($username, $password, "$host/$sid");

        if (!$conn) {
            $error = oci_error();
            die("Connection failed: " . $error['message']);
        }
    }

    return $conn;
}
?>
