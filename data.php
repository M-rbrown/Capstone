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
    <!-- CONTAINER STYLE -->
    <div class="max-w-6xl mx-auto bg-white rounded-md" style="margin-left: 20px; margin-right: 20px;">
        <!-- TITLE CONTAINER -->
        
        <!-- CONTAINER -->
        <div class style="padding: 15px; width: 1110px">
        <div class="text-2xl font-bold pb-4"><span>Analytics Dashboard</span></div>
                <!-- Button header -->
                <div class="flex justify-between items-center mb-4">
                    <!-- Left Side: Analytics Buttons -->
                    <div class="flex space-x-2">
                        <button onclick="showModule('ticketModule')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded">
                            Ticket Analytics
                        </button>
                        <button onclick="showModule('assetModule')" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Asset Analytics
                        </button>
                        <button onclick="showModule('feedbackModule')" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Feedback Analytics
                        </button>
                    </div>

                    <!-- Right Side: Filter & Export Button -->
                    <div class="flex space-x-4 ml-auto">
                        <select id="filterDays" class="px-4 py-2 border rounded">
                            <option value="7">Last 7 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="60">Last 60 Days</option>
                            <option value="90">Last 90 Days</option>
                        </select>
                        <button onclick="exportReport()" class="px-4 py-2 bg-white border rounded text-blue-600 font-semibold">
                            Export Report
                        </button>
                    </div>
                </div>

                <!-- Ticket Module -->
                <div id="ticketModule" class="">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Total Tickets</h6>
                            <h3 class="text-xl font-bold">1,248</h3>
                            <small class="text-gray-500">+12% from last period</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Open Tickets</h6>
                            <h3 class="text-xl font-bold">158</h3>
                            <small class="text-gray-500">-5% from last period</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Avg. Response Time</h6>
                            <h3 class="text-xl font-bold">3.2 hrs</h3>
                            <small class="text-gray-500">-0.4 hrs from last period</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Resolution Rate</h6>
                            <h3 class="text-xl font-bold">94.5%</h3>
                            <small class="text-gray-500">+2.5% from last period</small>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h5 class="text-lg font-semibold mb-2">Ticket Volume Trends</h5>
                        <div class="bg-white p-4 rounded shadow h-[350px]">
                            <canvas id="ticketChart" class="w-full h-full"></canvas>
                        </div>
                    </div>

                    <!-- Charts should be inside ticketModule -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <!-- Pie Chart -->
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h2 class="font-semibold text-lg mb-4">Ticket Categories</h2>
                            <div class="h-[350px]">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                        <!-- Line Chart -->
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h2 class="font-semibold text-lg mb-4">Response Time Trends</h2>
                            <div class="h-[350px]"> <!-- Set max height -->
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Asset Module -->
            <div id="assetModule" class="hidden">
                <div class style="padding: 15px; width: 1110px">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Total Assets</h6>
                            <h3 class="text-xl font-bold">325</h3>
                            <small class="text-gray-500">+5 from last month</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Available Assets</h6>
                            <h3 class="text-xl font-bold">90</h3>
                            <small class="text-gray-500">28% of total</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">Assets In Use</h6>
                            <h3 class="text-xl font-bold">210</h3>
                            <small class="text-gray-500">65% of total</small>
                        </div>
                        <div class="bg-white p-4 rounded shadow text-center">
                            <h6 class="text-gray-600">In Maintenance</h6>
                            <h3 class="text-xl font-bold">25</h3>
                            <small class="text-gray-500">7% of total</small>
                        </div>
                    </div>

                <!-- Asset Allocation Trends -->
                <div class="mb-6">
                    <h5 class="text-lg font-semibold mb-2">Asset Allocation Trends</h5>
                    <div class="bg-white p-4 rounded shadow h-[350px]">
                        <canvas id="assetChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Asset Charts -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Asset Types Distribution Pie Chart -->
                        <div class="bg-white p-4 shadow-md rounded-lg">
                            <h2 class="text-lg font-bold mb-2">Asset Types Distribution</h2>
                            <canvas id="assetPieChart"></canvas>
                        </div>
                        <!-- Asset Utilization Rate Bar Chart -->
                        <div class="bg-white p-4 shadow-md rounded-lg">
                            <h2 class="text-lg font-bold mb-2">Asset Utilization Rate</h2>
                            <canvas id="assetBarChart" class="h-[200px]"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Module -->
            <div id="feedbackModule" class="hidden">
            <div class style="padding: 15px; width: 1110px">

            <!-- Dashboard Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-semibold">Overall Satisfaction</h2>
                    <p class="text-3xl font-bold text-green-600">4.6/5.0</p>
                    <p class="text-sm text-gray-600">Based on 324 feedback responses</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-semibold">Response Time Rating</h2>
                    <p class="text-3xl font-bold text-blue-600">4.4/5.0</p>
                    <p class="text-sm text-gray-600">+0.2 from last quarter</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-semibold">Resolution Quality</h2>
                    <p class="text-3xl font-bold text-purple-600">4.7/5.0</p>
                    <p class="text-sm text-gray-600">+0.1 from last quarter</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-semibold">Feedback Completion Rate</h2>
                    <p class="text-3xl font-bold text-orange-500">78%</p>
                    <p class="text-sm text-gray-600">Of resolved tickets received feedback</p>
                </div>
            </div>

            <!-- Rating Distribution Chart -->
            <div class="bg-white p-6 rounded-lg shadow mb-6 flex items-center gap-6">
            <!-- Title and Rating Distribution -->
            <div class="w-1/2">
                <h2 class="text-xl font-semibold mb-4">Rating Distribution</h2>
                
                <div class="space-y-2">
                    <!-- 5 Stars -->
                    <div class="flex items-center gap-2">
                        <span class="w-16">5 Stars</span>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-green-500 h-4 rounded-full" style="width: 68%;"></div>
                        </div>
                        <span class="w-8 text-right">68%</span>
                    </div>

                    <!-- 4 Stars -->
                    <div class="flex items-center gap-2">
                        <span class="w-16">4 Stars</span>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-yellow-500 h-4 rounded-full" style="width: 22%;"></div>
                        </div>
                        <span class="w-8 text-right">22%</span>
                    </div>

                    <!-- 3 Stars -->
                    <div class="flex items-center gap-2">
                        <span class="w-16">3 Stars</span>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-orange-500 h-4 rounded-full" style="width: 7%;"></div>
                        </div>
                        <span class="w-8 text-right">7%</span>
                    </div>

                    <!-- 2 Stars -->
                    <div class="flex items-center gap-2">
                        <span class="w-16">2 Stars</span>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-red-500 h-4 rounded-full" style="width: 2%;"></div>
                        </div>
                        <span class="w-8 text-right">2%</span>
                    </div>

                    <!-- 1 Star -->
                    <div class="flex items-center gap-2">
                        <span class="w-16">1 Star</span>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-red-700 h-4 rounded-full" style="width: 1%;"></div>
                        </div>
                        <span class="w-8 text-right">1%</span>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="flex justify-center w-1/2">
                <canvas id="feedbackpieChart" style="width: 250px; height: 250px;"></canvas>
                </div>
            </div>
            <!-- Tabs -->
            <div class="flex gap-4 mb-4">
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Department</button>
                <button class="px-4 py-2 rounded bg-gray-200">Category</button>
                <button class="px-4 py-2 rounded bg-gray-200">Priority</button>
                <button class="px-4 py-2 rounded bg-gray-200">Technician</button>
                <button class="px-4 py-2 rounded bg-gray-200">Response Time</button>
            </div>

            <!-- Feedback by Department Chart -->
            <div class="bg-white p-6 rounded-lg shadow flex flex-col items-center">
                <h1 class="text-2xl font-semibold mb-4 text-center">Feedback by Department</h1>
                <canvas id="feedbackbarChart" style="width: 800px; height: 300px;"></canvas>
            </div>
            </div>
        </div>
    </div>
    
    <!-- SCRIPTING MODULE AND CHARTS-->
    <script>
        function showModule(moduleId) {
            document.getElementById("ticketModule").classList.add("hidden");
            document.getElementById("assetModule").classList.add("hidden");
            document.getElementById("feedbackModule").classList.add("hidden");
            document.getElementById(moduleId).classList.remove("hidden");
        }

        // Ticket Chart
        var ctxTicket = document.getElementById('ticketChart').getContext('2d');
        var ticketChart = new Chart(ctxTicket, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Open',
                        data: [40, 30, 25, 20, 18, 15],
                        backgroundColor: 'rgba(138, 43, 226, 0.5)',
                        borderColor: 'blueviolet',
                        fill: true,
                    },
                    {
                        label: 'Resolved',
                        data: [10, 15, 20, 25, 30, 35],
                        backgroundColor: 'rgba(144, 238, 144, 0.5)',
                        borderColor: 'green',
                        fill: true,
                    },
                    {
                        label: 'Closed',
                        data: [30, 20, 15, 18, 22, 28],
                        backgroundColor: 'rgba(255, 165, 0, 0.5)',
                        borderColor: 'orange',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 50
                    }
                }
            }
        });

        // Asset Chart
        var ctxAsset = document.getElementById('assetChart').getContext('2d');
        var assetChart = new Chart(ctxAsset, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Available',
                        data: [120, 100, 90, 80, 75, 70],
                        backgroundColor: 'rgba(144, 238, 144, 0.5)',
                        borderColor: 'green',
                        fill: true,
                    },
                    {
                        label: 'In Use',
                        data: [60, 80, 90, 100, 110, 120],
                        backgroundColor: 'rgba(70, 130, 180, 0.5)',
                        borderColor: 'blue',
                        fill: true,
                    },
                    {
                        label: 'Maintenance',
                        data: [10, 15, 12, 14, 18, 22],
                        backgroundColor: 'rgba(255, 165, 0, 0.5)',
                        borderColor: 'orange',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 150
                    }
                }
            }
        });

         // Pie Chart
         const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Hardware', 'Network', 'Access', 'Other'],
                datasets: [{
                    data: [36, 16, 12, 36],
                    backgroundColor: ['#00C49F', '#FFBB28', '#FF8042', '#8884D8'],
                }]
            }
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Avg. Response Time (hrs)',
                    data: [5, 4, 4.5, 3.8, 3.2, 2.8],
                    borderColor: '#8884D8',
                    backgroundColor: 'rgba(136, 132, 216, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
         // Pie Chart for Asset Types Distribution
         const assetPieCtx = document.getElementById('assetPieChart').getContext('2d');
        new Chart(assetPieCtx, {
            type: 'pie',
            data: {
                labels: ["Laptops", "Peripherals", "Servers", "Mobile Devices"],
                datasets: [{
                    data: [30, 23, 12, 19], // Sample percentages
                    backgroundColor: ["#007bff", "#8a6efb", "#ffc107", "#ff5722"],
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'right' },
                    datalabels: { color: '#fff', font: { weight: 'bold' } }
                }
            }
        });

        // Bar Chart for Asset Utilization Rate
        const assetBarCtx = document.getElementById('assetBarChart').getContext('2d');
        new Chart(assetBarCtx, {
            type: 'bar',
            data: {
                labels: ["Laptops", "Servers", "Peripherals"],
                datasets: [{
                    label: "Utilization Rate (%)",
                    data: [85, 95, 55], // Sample utilization rates
                    backgroundColor: "#8a6efb"
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, max: 100 }
                },
                plugins: {
                    legend: { display: true },
                    datalabels: { anchor: 'end', align: 'top', formatter: (val) => val + "%" }
                }
            }
        });

         // Ticket Pie Chart Data
         const feedpieCtx = document.getElementById('feedbackpieChart').getContext('2d');
        new Chart(feedpieCtx, {
            type: 'pie',
            data: {
                labels: ["5 Stars", "4 Stars", "3 Stars", "2 Stars", "1 Star"],
                datasets: [{
                    data: [68, 22, 7, 2, 1],
                    backgroundColor: ["#22C55E", "#FACC15", "#FB923C", "#F43F5E", "#E11D48"]
                }]
            },
            options: {
                responsive: false, 
                maintainAspectRatio: false
            }
        });

        // Bar Chart Data
        const feedbarCtx = document.getElementById('feedbackbarChart').getContext('2d');
        new Chart(feedbarCtx, {
            type: 'bar',
            data: {
                labels: ["IT", "HR", "Finance", "Marketing", "Sales", "Development"],
                datasets: [
                    {
                        label: "Positive Feedback",
                        data: [50, 40, 45, 47, 44, 48],
                        backgroundColor: "#6366F1"
                    },
                    {
                        label: "Neutral Feedback",
                        data: [35, 20, 25, 30, 32, 36],
                        backgroundColor: "#22C55E"
                    }
                ]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });

    </script>
</body>
