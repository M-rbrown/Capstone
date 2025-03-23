<?php
$page_title = 'Home Page';
require_once('includes/load.php');
include('layouts/header.php');
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

    <!-- Admin Ticket Management Container -->
    <div class="max-w-7xl mx-auto bg-white p-4 rounded-lg shadow-lg">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold flex items-center">
                Admin Ticket Management
            </h1>
            <div class="space-x-2">
                <button class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
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
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select class="w-1/4 px-4 py-2 border rounded-md">
                <option>All Technicians</option>
                <option>John Smith</option>
                <option>Emily Davis</option>
            </select>
            <select class="w-1/4 px-4 py-2 border rounded-md">
                <option>All Statuses</option>
                <option>Pending</option>
                <option>In Progress</option>
                <option>Resolved</option>
            </select>
        </div>

        <!-- Ticket Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-2 px-4 text-left">Ticket ID</th>
                        <th class="py-2 px-4 text-left">Title</th>
                        <th class="py-2 px-4 text-left">Requester</th>
                        <th class="py-2 px-4 text-left">Department</th>
                        <th class="py-2 px-4 text-left">Priority</th>
                        <th class="py-2 px-4 text-left">Status</th>
                        <th class="py-2 px-4 text-left">Assigned To</th>
                        <th class="py-2 px-4 text-left">Created</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Dynamic ticket data should be inserted here from the database -->
                </tbody>
            </table>
        </div>
    </div>
</body>
