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

    <!-- Admin Ticket Management Container -->
    <div class="max-w-7xl mx-auto -green-600 p-4 rounded-lg shadow-lg" style="width: 1100px; background: white;">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold flex items-center">
                Admin Ticket Management
            </h1>
            <div class="space-x-2">
                <button class="px-4 py-2 bg-gray-200 hover:-gray-300 rounded-lg">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white hover:-blue-700 rounded-lg">
                    <i class="fas fa-file-alt"></i> Generate Report
                </button>
            </div>
        </div>

        <!-- Ticket Overview -->
        <div class="mb-4">
            <p class="text-gray-600">Monitor and manage all tickets in the system</p>
        </div>

        <!-- Search & Filters -->
        <div class="flex space-x-4 mb-4">
            <input type="text" placeholder="Search tickets..." 
                class="w-1/2 px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select class="w-1/4 px-4 py-2 border">
                <option>All Technicians</option>
                <option>John Smith</option>
                <option>Emily Davis</option>
            </select>
            <select class="w-1/4 px-4 py-2 border">
                <option>All Statuses</option>
                <option>Pending</option>
                <option>In Progress</option>
                <option>Resolved</option>
            </select>
        </div>

        <!-- Ticket Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse shadow-md rounded-lg">
                <thead class="bg-gray-200 text-black text-xs">
                <tr>
                    <th class="py-2 px-4 text-center">Ticket ID</th>
                    <th class="py-2 px-4 text-center">Title</th>
                    <th class="py-2 px-4 text-center">Requester</th>
                    <th class="py-2 px-4 text-center">Department</th>
                    <th class="py-2 px-4 text-center">Priority</th>
                    <th class="py-2 px-4 text-center">Status</th>
                    <th class="py-2 px-4 text-center">Assigned To</th>
                    <th class="py-2 px-4 text-center">Created</th>
                    <th class="py-2 px-4 text-center">Actions</th>
                </tr>
            </thead>

                <tbody class="text-gray-700 text-xs"> <!-- text-xs added here -->
                    <tr class="border-t">
                        <td class="py-2 px-4 text-center">TKT-1234</td>
                        <td class="py-2 px-4 text-center">Network connectivity issue</td>
                        <td class="py-2 px-4 text-center">Sarah Johnson</td>
                        <td class="py-2 px-4 text-center">Marketing</td>
                        <td class="py-2 px-4 text-center">
                            <span class="text-red-600 px-2 py-1 text-xs">High</span>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <span class="text-blue-600 px-2 py-1 text-xs">
                                Pending
                            </span>
                        </td>
                        <td class="py-2 px-4 text-center">John Smith</td>
                        <td class="py-2 px-4 text-center">6/15/2023, 6:30 PM</td>
                        <td class="py-2 px-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="border-t">
                        <td class="py-2 px-4 text-center">TKT-1235</td>
                        <td class="py-2 px-4 text-center">Software installation request</td>
                        <td class="py-2 px-4 text-center">Michael Chen</td>
                        <td class="py-2 px-4 text-center">HR</td>
                        <td class="py-2 px-4 text-center">
                            <span class="text-yellow-400 px-2 py-1 text-xs">Medium</span>
                        </td>
                        <td class="py-2 px-2 text-center">
                            <span class="text-green-600 px-2 py-1 text-xs">
                                In Progress
                            </span>
                        </td>
                        <td class="py-2 px-4 text-center">Emily Davis</td>
                        <td class="py-2 px-4 text-center">6/15/2023, 7:45 PM</td>
                        <td class="py-2 px-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="border-t">
                        <td class="py-2 px-4 text-center">TKT-1236</td>
                        <td class="py-2 px-4 text-center">Printer not working</td>
                        <td class="py-2 px-4 text-center">Robert Taylor</td>
                        <td class="py-2 px-4 text-center">Finance</td>
                        <td class="py-2 px-4 text-center">
                            <span class="text-yellow-400 px-2 py-1 text-xs">Medium</span>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <span class="text-blue-600 px-2 py-1 text-xs">
                                Pending
                            </span>
                        </td>
                        <td class="py-2 px-4 text-center">John Smith</td>
                        <td class="py-2 px-4 text-center">6/15/2023, 9:20 PM</td>
                        <td class="py-2 px-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
