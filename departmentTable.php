<?php
$page_title = 'Home Page';
require_once('includes/load.php');
include('layouts/ADMINheader.php');
if (!$session->isUserLoggedIn(true)) { 
    redirect('index.php', false);
}

$user = current_user();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATC Service Desk</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-4 pl-64">
    <!-- Sidebar -->
    <div class="flex" style="padding: 20px">
    <?php include('layouts/ADMINsideBAR.php'); ?> 
    <!-- Sidebar -->
    <div class="max-w-6xl" style="padding-left: 20px;">

    <div class="max-w-9xl mx-auto bg-white p-6 rounded-lg shadow-md" style="width: 1100px;">
        <h1 class="text-2xl font-bold flex items-center gap-2">
            Department List
        </h1>
        <p class="text-gray-600">View, add, edit, and delete departments in the system</p>
        
        <div class="flex justify-between items-center mt-4">
            <input type="text" placeholder="Search departments..." class="px-4 py-2 border rounded w-1/3">
            <button class="px-4 py-2 bg-black text-white rounded flex items-center">+ Add Department</button>
        </div>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left text-sm">
                        <th class="p-3">ID</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Manager</th>
                        <th class="p-3">Employees</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Created</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b">
                        <td class="p-3">DEP-001</td>
                        <td class="p-3"><span class="px-2 py-1 bg-red-100 text-red-600 rounded">IT</span></td>
                        <td class="p-3">Information Technology department</td>
                        <td class="p-3">John Smith</td>
                        <td class="p-3">15</td>
                        <td class="p-3">Headquarters - Floor 3</td>
                        <td class="p-3">1/15/2020</td>
                        <td class="p-3">
                            <button class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-3">DEP-002</td>
                        <td class="p-3"><span class="px-2 py-1 bg-pink-100 text-pink-600 rounded">HR</span></td>
                        <td class="p-3">Human Resources department</td>
                        <td class="p-3">Emily Davis</td>
                        <td class="p-3">8</td>
                        <td class="p-3">Headquarters - Floor 2</td>
                        <td class="p-3">1/15/2020</td>
                        <td class="p-3">
                            <button class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-3">DEP-003</td>
                        <td class="p-3"><span class="px-2 py-1 bg-yellow-100 text-yellow-600 rounded">Finance</span></td>
                        <td class="p-3">Finance and Accounting department</td>
                        <td class="p-3">Robert Taylor</td>
                        <td class="p-3">12</td>
                        <td class="p-3">Headquarters - Floor 4</td>
                        <td class="p-3">1/15/2020</td>
                        <td class="p-3">
                            <button class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
