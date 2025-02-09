
<?php 
require_once "patient_control.php";
require_once "parameters.php";



if(empty($_SESSION['login_doctor']['id'])) {
        header("location: login.php");
    }


?>

<!DOCTYPE html><html lang="en" dir="ltr"><head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script>
    function toggleDropdown() { 
        const dropdown = document.getElementById('profileDropdown'); 
        dropdown.classList.toggle('hidden'); 
    }
    </script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#1B9AF5" data-border-radius="medium"></script>
</head>
<body class="bg-gray-900 min-h-screen py-12 px-4 flex flex-col items-center justify-center font-[&#39;Tajawal&#39;]">
    <div class="w-full max-w-6xl p-8 space-y-6 bg-gray-800 rounded-lg shadow-xl">
        <div class="text-center">
            <div class="flex justify-between items-center mb-6">
                <div class="relative">
                    <div class="relative inline-block">
                        <button onclick="toggleDropdown()" class="px-4 py-2 text-white hover:bg-gray-700 rounded-lg flex items-center gap-2">
                            <i class="fas fa-user-circle text-2xl"></i>
                        </button>
                        <div id="profileDropdown" class="hidden absolute left-0 mt-2 w-48 bg-gray-700 rounded-lg shadow-xl z-50">
                            <div class="py-2">
                                <a href="profile.php" class="block px-4 py-2 text-white hover:bg-gray-600"> profile </a>
                                <a href="before_out.php" class="block px-4 py-2 text-white hover:bg-gray-600">sign out </a>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-white">patient_list</h2>
                <a href="add_patient.php"><button class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg flex items-center gap-2">
                    <i class="fas fa-plus"></i> ADD patient
                    
                </button></a>
            </div>
            <form class="flex items-center gap-4">
                <input id="search" name="search" placeholder="ابحث هنا..." value="<?php echo $search ?>" class="flex-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom"/>
                
                <select id="sort" name="sort" class="px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-custom mr-4">
                    <option value="id|desc" <?=$sort == 'id|ASC' ? "selected":"" ?>>ترتيب تصاعدي</option>
                    <option value="id|asc" <?=$sort == 'id|DESC' ? "selected":"" ?>>ترتيب تنازلي</option>
                </select>
                <button value="search" class="px-6 py-2 bg-custom hover:bg-custom-600 text-white rounded-lg flex items-center gap-2">
                    <i class="fas fa-search"></i> search..
                </button>
            </form>
</div>
        
<h3 class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded">Total (<span class=""><?php echo count($patients1)?></span>)------------------------------------------------------------------------------------------you can`t make edit for a diagnosis`s row that is empty</h3>        
    <form class="mt-6 bg-gray-800 rounded-lg shadow-xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class=" bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-white">ID</th>
                        <th class="px-6 py-3 text-white">name</th>
                        <th class="px-6 py-3 text-white">phone</th>
                        <th class="px-6 py-3 text-white">diagonsis</th>
                        <th class=" px-6 py-3 text-white">operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php foreach($patients1 as $patient ){ ?>
                        
                        <tr class="bg-gray-800 hover:bg-gray-700">
                            <td class="px-6 py-4 text-gray-300">#<?php echo $patient['PatientID'] ?? null ?></td>
                            <td class="px-6 py-4 text-gray-300"><?php echo $patient['PatientName'] ?? null ?></td>
                            <td class="px-6 py-4 text-gray-300"><?php echo $patient['PatientPhone'] ?? null ?></td>
                            <td class="px-6 py-4 text-gray-300"><?php  echo !empty($patient['Diagnosis']) ? $patient['Diagnosis'] : "empty" ?></td>
                            <td class="px-6 py-4">
                                <div class=" mr-4 gap-2">
                                    <button class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    <a href="update.php?id=<?=$patient['PatientID'] ?>"><i class="fas fa-edit"></i> edit </a>
                                    </button> 
                                    <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                        <a href="delete.php?id=<?=$patient['PatientID'] ?>"><i  class="fas fa-trash"></i> delete</a>
                                    </button>
                                    <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded">
                                        <a href="add_diagnosis.php?id=<?=$patient['PatientID']?>&name=<?=$patient['PatientName']?>&phone=<?=$patient['PatientPhone']?>"><i class="fas fa-plus-circle"></i> add diagnosis</a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </form>
</div>
</body>
</html>
<?php 
require_once 'alerts.php';
?>
