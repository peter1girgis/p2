<?php

require_once "dbconnect.php";
if(empty($_SESSION['login_doctor']['id'])) {
    header("location: login.php");
}else{
    $doctor__id = $_SESSION['login_doctor']['id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $diagonsis_name = $_POST['diagnosis'];
    $query_add_patient="INSERT INTO `patient` (`name`, `phone` , `doctor_id`) VALUES ('$name', '$phone' , $doctor__id);";
    
    $pdo->query($query_add_patient);
    if(!empty($diagonsis_name)){
        $add_diagnosis_for_the_last_patient ="SET @patient_id = LAST_INSERT_ID();
    INSERT INTO `diagnosis` (`patient_id`, `diagnosis_name`) VALUES (@patient_id, '$diagonsis_name');";
    $pdo->query($add_diagnosis_for_the_last_patient);
    }
    header("location: index.php");
}
?>