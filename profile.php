<?php
require_once "dbconnect.php";

if(empty($_SESSION['login_doctor']['id'])) {
    header("location: login.php");
}else{
    $doctor__id = $_SESSION['login_doctor']['id'];
}


$query = "SELECT d.id AS DoctorID, d.name AS DoctorName, d.phone AS DoctorPhone, d.email AS DoctorEmail ,
COUNT(p.id) AS PatientCount FROM doctor d 
LEFT JOIN patient p ON d.id = p.doctor_id 
WHERE d.id = $doctor__id GROUP BY d.id, d.name;";
$query2 = "SELECT COUNT(DISTINCT d.patient_id) AS DiagnosisCount 
FROM diagnosis d JOIN patient p 
ON d.patient_id = p.id 
WHERE p.doctor_id = $doctor__id AND d.patient_id IS NOT NULL;";
$stmt = $pdo->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$patient_count = $result['PatientCount'];
$doctor_name = $result['DoctorName'];
$doctor_phone = $result['DoctorPhone'];
$doctor_emial = $result['DoctorEmail'];
$stmt2 = $pdo->query($query2);
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$diagnosis_count = $result2['DiagnosisCount'];
?>

<!DOCTYPE html><html lang="ar" dir="rtl"><head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#1B9AF5" data-border-radius="medium"></script>
</head>
<body class="bg-gray-900 min-h-screen py-12 px-4 flex flex-col items-center justify-center font-[&#39;Tajawal&#39;]">
    <div class="w-full max-w-6xl p-8 space-y-6 bg-gray-800 rounded-lg shadow-xl relative">
        <div class="text-center">
            <div class="absolute top-4 right-4">
                <a href="index.php" class="text-white hover:text-custom">
                    <i class="fas fa-arrow-right text-2xl"></i>
                </a>
            </div>
            <h2 class="text-2xl font-bold text-white mb-6">الملف الشخصي</h2>
            <form class="space-y-6 max-w-2xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex flex-col gap-2 text-right">
                        <label class="text-white">اسم الدكتور</label>
                        <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom cursor-not-allowed opacity-70" value="<?=$doctor_name?>" disabled=""/>
                    </div>
                    <div class="flex flex-col gap-2 text-right">
                        <label class="text-white">البريد الإلكتروني</label>
                        <input type="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom cursor-not-allowed opacity-70" value="<?=$doctor_emial?>" disabled=""/>
                    </div>
                    <div class="flex flex-col gap-2 text-right">
                        <label class="text-white">رقم الهاتف</label>
                        <input type="tel" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom cursor-not-allowed opacity-70" value="+2<?=$doctor_phone?>" disabled=""/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="p-6 bg-gray-700 rounded-lg text-center">
                        <h3 class="text-xl font-bold text-white mb-2">إجمالي المرضى</h3>
                        <p class="text-3xl font-bold text-green-500"><?= $patient_count?></p>
                    </div>
                    <div class="p-6 bg-gray-700 rounded-lg text-center">
                        <h3 class="text-xl font-bold text-white mb-2">المرضى بدون تشخيص</h3>
                        <p class="text-3xl font-bold text-yellow-500"><?= $diagnosis_count?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
    
