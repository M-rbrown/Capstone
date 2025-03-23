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

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2lg" style="width: 1100px;">
    <h2 class="text-xl font-bold flex items-center justify-between gap-2 mb-4">
        <div class="flex items-center gap-2">
            <i class="fas fa-user text-red-500"></i>
            <span>Create Employee Account</span>
        </div>
        <a href="userTable.php" class="text-sm text-blue-500 hover:text-blue-700">Back</a>
    </h2>
    <p class="text-gray-500 mb-4">Add a new employee account to the system</p>
        
        <form>
            <label class="block mb-2 font-sm">Full Name</label>
            <input type="text" placeholder="John Doe" class="w-full p-2 border rounded mb-4">
            
            <label class="block mb-2 font-sm">Email Address</label>
            <input type="email" placeholder="john.doe@company.com" class="w-full p-2 border rounded mb-4">
            
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="block mb-2 font-sm">Password</label>
                    <input type="password" class="w-full p-2 border rounded">
                </div>
                <div class="w-1/2">
                    <label class="block mb-2 font-sm">Confirm Password</label>
                    <input type="password" class="w-full p-2 border rounded">
                </div>
            </div>
            
            <label class="block mt-4 mb-2 font-sm">Account Type</label>
            <div class="space-y-2">
                <label class="flex items-center gap-2">
                    <input type="radio" name="account-type" class="accent-blue-600">
                    Employee <span class="text-gray-500 text-sm">Standard user with basic access</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="account-type" class="accent-blue-600">
                    Manager <span class="text-gray-500 text-sm">Department-level access with team management</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="account-type" checked class="accent-blue-600">
                    Administrator <span class="text-gray-500 text-sm">Full system access with all privileges</span>
                </label>
            </div>
            
            <div class="flex gap-4 mt-4">
                <div class="w-1/2">
                    <label class="block mb-2 font-sm">Department</label>
                    <select class="w-full p-2 border rounded">
                        <option>HR</option>
                        <option>Manufacturing</option>
                        <option>Purchasing</option>
                        <option>Finance</option>
                        <option>IT</option>
                        <option>Maintenance Engineering</option>
                        <option>Production Control</option>
                        <option>Quality Control</option>
                        <option>Logistics</option>
                        <option>Marketing</option>
                    </select>
                </div>
                
                <div class="w-1/2">
                    <label class="block mb-2 font-sm">Position</label>
                    <input type="text" placeholder="Software Engineer" class="w-full p-2 border rounded">
                </div>
            </div>
            
            <label class="block mt-4 mb-2 font-sm">Created At</label>
            <input type="text" id="createdAt" disabled class="w-full p-2 border rounded bg-gray-200">
            <p class="text-sm text-gray-500 mt-1">Account creation date (automatically set)</p>
            
            <div class="flex justify-between mt-6">
                <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"><a href="userTable.php">Cancel</a></button>
                <button type="submit" class="px-4 py-2 bg-black text-white rounded">Create Account</button>
            </div>
        </form>
    </div>
</body>

<script>
    function setCreatedAt() {
        let now = new Date().toLocaleString("en-US", { 
            timeZone: "Asia/Manila", 
            year: "numeric", 
            month: "2-digit", 
            day: "2-digit"
        });

        // Format: MM/DD/YYYY
        document.getElementById("createdAt").value = now;
    }

    // Run the function on page load
    setCreatedAt();
</script>