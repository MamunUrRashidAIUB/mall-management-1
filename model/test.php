<?php
require_once __DIR__ . '/dbconn.php';

function getAllShops() {
    $conn = getConnection();
    $sql = "SELECT SHOPID, NAME, OWNER, TYPE, FLOORNUMBER FROM Shop ORDER BY SHOPID";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $rows = [];
    while ($row = oci_fetch_assoc($stid)) {
        $rows[] = $row;
    }

    oci_free_statement($stid);
    return $rows;
}

function getAllEmployees() {
    $conn = getConnection();
    $sql = "SELECT EMPNO, ENAME, JOB, MGR, TO_CHAR(HIREDATE,'YYYY-MM-DD') AS HIREDATE, SAL, COMM, DEPTNO FROM emp ORDER BY EMPNO";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $rows = [];
    while ($row = oci_fetch_assoc($stid)) {
        $rows[] = $row;
    }

    oci_free_statement($stid);
    return $rows;
}
?>
