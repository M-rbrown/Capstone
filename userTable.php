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
        <h1 class="text-2xl font-bold mb-2">User List</h1>
        <p class="text-gray-600 mb-4">View and manage all requestors in the system</p>
        
        <div class="flex items-center justify-between mb-4">
            <div class="relative w-1/4">
                <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" class="border p-2 pl-10 rounded w-full" placeholder="Search users...">
            </div>
            <div class="flex items-center gap-2 ml-auto">
                <select class="border p-2 rounded">
                    <option>All Departments</option>
                    <option>Marketing</option>
                    <option>HR</option>
                    <option>Finance</option>
                    <option>Sales</option>
                    <option>Development</option>
                    <option>Executive</option>
                </select>
                <button class="bg-gray-700 text-white px-4 py-2 rounded">More Filters</button>
                <button class="px-4 py-2 bg-black text-white rounded flex items-center">
                <a href="createACC.php">+ Add User</a></button>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">User ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Department</th>
                    <th class="border p-2">Position</th>
                    <th class="border p-2">Join Date</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="border p-2">USR-001</td>
                    <td class="border p-2">Sarah Johnson</td>
                    <td class="border p-2">sarah.johnson@example.com</td>
                    <td class="border p-2">Marketing</td>
                    <td class="border p-2">Marketing Manager</td>
                    <td class="border p-2">3/15/2020</td>
                    <td class="border py-2 px-4 text-center">
                        <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="border p-2">USR-002</td>
                    <td class="border p-2">Michael Chen</td>
                    <td class="border p-2">michael.chen@example.com</td>
                    <td class="border p-2">HR</td>
                    <td class="border p-2">HR Specialist</td>
                    <td class="border p-2">6/10/2021</td>
                    <td class="border py-2 px-4 text-center">
                        <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="border p-2">USR-003</td>
                    <td class="border p-2">Robert Taylor</td>
                    <td class="border p-2">robert.taylor@example.com</td>
                    <td class="border p-2">Finance</td>
                    <td class="border p-2">Financial Analyst</td>
                    <td class="border p-2">11/5/2019</td>
                    <td class="border py-2 px-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
