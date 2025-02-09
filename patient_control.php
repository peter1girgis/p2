<?php
require_once "dbconnect.php";

if(empty($_SESSION['login_doctor']['id'])) {
    header("location: login.php");
}else{
    $doctor__id = $_SESSION['login_doctor']['id'];
}

Class Patient{
    public $pdo;
    public $Doctor_id ; 

    function __construct($pdo,$doctor__id){
        $this->pdo = $pdo;
        $this->Doctor_id = $doctor__id;
    }

    public function index(): mixed{
        $search = $_GET['search'] ?? null;
        $sort = empty($_GET['sort']) ? ['id', 'desc']:explode('|', $_GET['sort']);
        $sorter_column = $sort[0] ?? 'id';
        $arrange = $sort[1] ?? 'desc';

        $query = "
        SELECT 
        `patient`.`id` AS PatientID,
        `patient`.`name` AS PatientName,
        `patient`.`phone` AS PatientPhone,
        GROUP_CONCAT(`diagnosis`.`diagnosis_name` SEPARATOR ', ') AS Diagnosis,
        `doctor`.`id` AS DoctorID,
        `doctor`.`name` AS DoctorName,
        `doctor`.`phone` AS DoctorPhone,
        `doctor`.`email` AS DoctorEmail
    FROM 
        `patient`
    LEFT JOIN 
        `diagnosis` ON `patient`.`id` = `diagnosis`.`patient_id`
    LEFT JOIN 
        `doctor` ON `patient`.`doctor_id` = `doctor`.`id`  
    WHERE 
        `doctor`.`id` = $this->Doctor_id AND `patient`.`name` LIKE '%$search%'
    GROUP BY 
        `patient`.`id`, `patient`.`name`, `patient`.`phone`, 
        `doctor`.`id`, `doctor`.`name`, `doctor`.`phone`, `doctor`.`email`
    ORDER BY 
    `patient`.`$sorter_column` $arrange;;
        ";
        $stmt = $this->pdo->query($query);
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    }

    public function index_one_row($id){
        $query = "SELECT `patient`.`id` AS PatientID, `patient`.`name` AS PatientName,
        `patient`.`phone` AS PatientPhone, GROUP_CONCAT(`diagnosis`.`diagnosis_name`) AS Diagnoses 
        FROM `patient` LEFT JOIN `diagnosis` ON 
        `patient`.`id` = `diagnosis`.`patient_id` 
        WHERE `patient`.`id` = $id GROUP BY `patient`.`id`;";
        $stmt = $this->pdo->query($query);
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    }
}

$patient_class = new Patient($pdo,$doctor__id);
$patients1 = $patient_class->index();

