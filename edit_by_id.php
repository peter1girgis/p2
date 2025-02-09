<?php 
require_once "dbconnect.php";


    $id = $_GET['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $diagnosis = $_POST['diagnosis'];
    $query1 = "
UPDATE `diagnosis`
SET 
    `diagnosis_name` = '$diagnosis'
WHERE 
    `patient_id` = $id
ORDER BY `id`
LIMIT 1;


DELETE FROM `diagnosis`
WHERE 
    `patient_id` = $id
    AND `diagnosis_name` != '$diagnosis' ;";

    $pdo->query($query1);

header("location: index.php");


