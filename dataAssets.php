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

<body class="bg-gray-100 p-4 pl-60">
    <!-- Sidebar -->
    <div class="flex" style="padding: 20px">
    <?php include('layouts/ADMINsideBAR.php'); ?> 
    <!-- Sidebar -->
    <div class="max-w-6xl" style="padding-left: 20px;">

    <!-- Asset Overview -->
        <div>
            
        </div>



        <div class="max-w-7xl mx-auto p-2 rounded-lg shadow-md" style="height: 350px; width: 1100px; background: white;">
        <h1 class="text-xl font-bold mb-3">Asset Inventory</h1>
        <!-- Filters -->
        <div class="flex justify-between items-center mb-3">
            <div class="flex space-x-3">
                <label class="text-gray-700 text-sm font-medium">Category:
                    <select class="ml-2 px-2 py-1.5 border rounded text-sm">
                        <option>All Category</option>
                        <option>Network Problem</option>
                        <option>System Problem</option>
                        <option>Hardware Problem</option>
                    </select>
                </label>
                <label class="text-gray-700 text-sm font-medium">Status:
                    <select class="ml-2 px-2 py-1.5 border rounded text-sm">
                        <option>All Statuses</option>
                        <option>Pendings</option>
                        <option>Solved</option>
                        <option>Rejected</option>
                        <option>Canceled</option>
                    </select>
                </label>
            </div>
            <div class="flex space-x-1">
                <input type="text" placeholder="Search assets..." class="px-2 py-1.5 border rounded text-sm">
                <button class="px-3 py-1.5 bg-gray-200 border rounded text-sm"><i class='fas fa-filter'></i> Filters</button>
                <button class="px-3 py-1.5 bg-gray-200 border rounded text-sm"><i class='fas fa-file-import'></i> Import</button>
                <button class="px-3 py-1.5 bg-gray-200 border rounded text-sm"><i class='fas fa-barcode'></i> Scan</button>
                <button class="px-3 py-1.5 bg-blue-600 text-white rounded text-sm">+ Add</button>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-md overflow-hidden">
            <table class="w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-2 text-center">ID</th>
                        <th class="p-2 text-center">Name</th>
                        <th class="p-2 text-center">Type</th>
                        <th class="p-2 text-center">Status</th>
                        <th class="p-2 text-center">Location</th>
                        <th class="p-2 text-center">Assigned To</th>
                        <th class="p-2 text-center">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b cursor-pointer" onclick="openModal('SRV-001', 'Main Database Server', 'Server', 'Available', 'Server Room A', '-', '5/20/2023')">
                        <td class="p-2 text-center">SRV-001</td>
                        <td class="p-2 text-center">Main Database Server</td>
                        <td class="p-2 text-center">Server</td>
                        <td class="p-2 text-center"><span class="text-green-500">Available</span></td>
                        <td class="p-2 text-center">Server Room A</td>
                        <td class="p-2 text-center">-</td>
                        <td class="p-2 text-center">5/20/2023</td>
                    </tr>
                    <tr class="border-b cursor-pointer" onclick="openModal('WS-042', 'Design Workstation', 'Workstation', 'In Use', 'Design Dept', 'Sarah Johnson', '4/12/2023')">
                        <td class="p-2 text-center">WS-042</td>
                        <td class="p-2 text-center">Design Workstation</td>
                        <td class="p-2 text-center">Workstation</td>
                        <td class="p-2 text-center"><span class="text-blue-600">In Use</span></td>
                        <td class="p-2 text-center">Design Dept</td>
                        <td class="p-2 text-center">Sarah Johnson</td>
                        <td class="p-2 text-center">4/12/2023</td>
                    </tr>
                    <tr class="border-b cursor-pointer" onclick="openModal('LT-108', 'Developer Laptop', 'Laptop', 'In Use', 'Remote', 'Michael Chen', '6/1/2023')">
                        <td class="p-2 text-center">LT-108</td>
                        <td class="p-2 text-center">Developer Laptop</td>
                        <td class="p-2 text-center">Laptop</td>
                        <td class="p-2 text-center"><span class="text-blue-600">In Use</span></td>
                        <td class="p-2 text-center">Remote</td>
                        <td class="p-2 text-center">Michael Chen</td>
                        <td class="p-2 text-center">6/1/2023</td>
                    </tr>
                    <tr class="border-b cursor-pointer" onclick="openModal('MB-056', 'Sales Team Phone', 'Mobile', 'Maintenance', 'IT Department', 'Jessica Miller', '6/15/2023')">
                        <td class="p-2 text-center">MB-056</td>
                        <td class="p-2 text-center">Sales Team Phone</td>
                        <td class="p-2 text-center">Mobile</td>
                        <td class="p-2 text-center"><span class="text-yellow-400">Maintenance</span></td>
                        <td class="p-2 text-center">IT Department</td>
                        <td class="p-2 text-center">Jessica Miller</td>
                        <td class="p-2 text-center">6/15/2023</td>
                    </tr>
                </tbody>
            </table>
        </div>


    <!-- Pagination -->
        <div class="flex justify-center items-center mt-3">
                <button class="px-3 py-1.5 bg-gray-200 border rounded text-sm">Previous</button>
                <span class="px-3 py-1.5">1</span>
                <button class="px-3 py-1.5 bg-gray-200 border rounded text-sm">Next</button>
            </div>
        </div>

    <?php include('ass_modal.php'); ?>
</body>