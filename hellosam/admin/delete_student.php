<?php
include "header.php";
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$s_email = $_GET["s_email"];
$delete_student = $db ->delete_student($s_rollno);
$db ->redirect_to("student.php");
?>