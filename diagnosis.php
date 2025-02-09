<?php
require_once "dbconnect.php";
require_once "patient_control.php";

$id = $_GET['id'] ;
$diagonsis_name = $_POST['diagonsis_name'];
$diagonsis_query="INSERT INTO `diagnosis` (`diagnosis_name`, `patient_id`) VALUES ( '$diagonsis_name', $id);";
$pdo->query($diagonsis_query);
header("location: index.php");
