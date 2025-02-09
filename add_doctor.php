<?php



if ($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once "dbconnect.php";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query_add_doctor="INSERT INTO `doctor` (`name`, `phone` , `email` , `password`) VALUES ('$name', '$phone' , '$email','$password');";
    
    $pdo->query($query_add_doctor);
    // $the_new_doctor_id =  "SET @patient_id = LAST_INSERT_ID();";
    // $stmt  = $pdo->query($the_new_doctor_id);
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // $_SESSION['login_doctor']['id'] = $result['id'];
        $quary3 = "SELECT * FROM `doctor` WHERE `email` = '$email' AND `password` = '$password' ";
        $stmt  = $pdo->query($quary3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            $_SESSION['login_doctor']['id'] = $result['id'];
            header('location: index.php');
        }else{
            echo "try again";
        }
    
}