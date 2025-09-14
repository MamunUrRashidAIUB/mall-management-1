<?php
require_once 'dbconn.php';
function getalltest() {
$conn = getConnection();
    $query = "SELECT * FROM emp";
    $statement = oci_parse($conn, $query);
    oci_execute($statement);
    $planets=[];
    while ($row = oci_fetch_array($statement)) {
        $planets[]=$row;


    }
    oci_free_statement($statement);
    return $planets;



}



?>