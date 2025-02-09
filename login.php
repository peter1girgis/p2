<?php 

session_start();
if ( isset($_POST['email'] ) ){
    require_once"dbconnect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
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
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">    
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#1B9AF5" data-border-radius='medium'></script>
</head>
<body class="bg-gray-900 min-h-screen flex flex-col items-center justify-center font-['Tajawal']">
    <div class="w-full max-w-md p-8 space-y-8 bg-gray-800 rounded-lg shadow-xl">        
        <div class="text-center">
            <img class="mx-auto h-16 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="الشعار">            
            <h2 class="mt-6 text-3xl font-bold text-white">مرحباً بك مجدداً</h2>
            <p class="mt-2 text-sm text-gray-400">قم بتسجيل الدخول للمتابعة</p>
        </div>

        <form method="post" action="login.php" class="mt-8 space-y-6">
            <div class="space-y-6">                
                <div class="relative">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">البريد الإلكتروني</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" required class="appearance-none block w-full pr-10 py-3 bg-gray-700 border border-gray-600 !rounded-button placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom" placeholder="أدخل بريدك الإلكتروني">                        
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">كلمة المرور</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required class="appearance-none block w-full pr-10 py-3 bg-gray-700 border border-gray-600 !rounded-button placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom" placeholder="أدخل كلمة المرور">                        
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent !rounded-button text-sm font-medium text-white bg-custom hover:bg-custom-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">  تسجيل الدخول</button>
        </form>

        <div class="text-center">
            <p class="text-sm text-gray-400">                ليس لديك حساب؟
                <a href="sign_out.php" class="font-medium text-custom hover:text-custom-600">إنشاء حساب جديد</a>            
            </p>
        </div>
    </div>

    
</body>
</html>