<?php
session_start();
if(empty($_SESSION['login_doctor'])) {
    header("location: login.php");
}
$name = $_GET['name'];
$id = $_GET['id'];

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
    <div class="w-full max-w-6xl p-8 space-y-6 bg-gray-800 rounded-lg shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-white mb-6">add new diagnosis </h2>
            <form method="post" action="diagnosis.php?id=<?php echo $id?>" class="space-y-6 max-w-2xl mx-auto">
                <div class="flex flex-col gap-2 text-right">
                    <label class="text-white">name..</label>
                    <input type="text" value="<?=$name?>" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom cursor-not-allowed opacity-70" placeholder="patient name " disabled="true"/>
                </div>
                <div class="flex flex-col gap-2 text-right">
                    <label class="text-white">id..</label>
                    <input type="number" name="id" value="<?=$id?>" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom cursor-not-allowed opacity-70" placeholder="patient name " disabled="true"/>
                </div>
                <div class="flex flex-col gap-2 text-right" id="diagnosis-container">
                    <label class="text-white">the diagnosis</label>
                    <textarea name="diagonsis_name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom h-32" placeholder="enter the diagnosis " id="diagnosis-input"></textarea>
                </div>
                <div class="flex justify-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg flex items-center gap-2">
                        <i class="fas fa-plus"></i> add diagnosis
                    </button>
                    
                </div>
            </form>
        </div>
        <button type="button" class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg flex items-center gap-2">
                        <a href="index.php"><i class="fas fa-times"></i> back</a>
                    </button>
    </div>
    </body>
</html>
<?php 
require_once 'alerts.php';