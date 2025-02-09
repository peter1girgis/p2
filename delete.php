<?php
session_start();
require_once "dbconnect.php";

$id = $_GET['id'];

$query = "DELETE FROM `patient` WHERE `patient`.`id` = $id";
        $pdo->query($query);

        $_SESSION['success'] = "Country has removed successfully";
// echo $id;
header("location: index.php");

?>