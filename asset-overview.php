<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Asset Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold">IT Asset Overview</h2>
        <p class="text-gray-600">Comprehensive view of IT assets, vendors, and current status</p>

        <!-- Asset Categories -->
        <div class="grid grid-cols-4 gap-4 mt-6">
            <div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-3">
                <i class="fas fa-server text-gray-700 text-2xl"></i>
                <div>
                    <p class="text-gray-700 font-medium">Servers</p>
                    <p class="text-2xl font-bold">42</p>
                </div>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-3">
                <i class="fas fa-desktop text-gray-700 text-2xl"></i>
                <div>
                    <p class="text-gray-700 font-medium">Workstations</p>
                    <p class="text-2xl font-bold">128</p>
                </div>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-3">
                <i class="fas fa-laptop text-gray-700 text-2xl"></i>
                <div>
                    <p class="text-gray-700 font-medium">Laptops</p>
                    <p class="text-2xl font-bold">87</p>
                </div>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-3">
                <i class="fas fa-keyboard text-gray-700 text-2xl"></i>
                <div>
                    <p class="text-gray-700 font-medium">Peripherals</p>
                    <p class="text-2xl font-bold">64</p>
                </div>
            </div>
        </div>

        <!-- Asset Status and Recent Changes -->
        <div class="grid grid-cols-2 gap-6 mt-6">
            <!-- Asset Status Chart -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Asset Status</h3>
                <div class="h-[300px]">
                    <canvas id="assetChart"></canvas>
                </div>
            </div>

            <!-- Recent Changes -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Recent Changes</h3>
                <div class="space-y-3">
                    <div class="flex items-center bg-yellow-100 p-3 rounded-lg">
                        <i class="fas fa-exclamation-circle text-yellow-600 text-lg mr-3"></i>
                        <div class="flex-1">
                            <p class="text-yellow-700 font-medium">Server Rack #3</p>
                            <p class="text-gray-500 text-sm">Status Change</p>
                        </div>
                        <span class="text-gray-500 text-sm">2 hours ago</span>
                    </div>
                    <div class="flex items-center bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-laptop-code text-blue-600 text-lg mr-3"></i>
                        <div class="flex-1">
                            <p class="text-blue-700 font-medium">Laptop T490-L23</p>
                            <p class="text-gray-500 text-sm">Assigned</p>
                        </div>
                        <span class="text-gray-500 text-sm">4 hours ago</span>
                    </div>
                    <div class="flex items-center bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-desktop text-green-600 text-lg mr-3"></i>
                        <div class="flex-1">
                            <p class="text-green-700 font-medium">Workstation WS-112</p>
                            <p class="text-gray-500 text-sm">Added</p>
                        </div>
                        <span class="text-gray-500 text-sm">1 day ago</span>
                    </div>
                    <div class="flex items-center bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-desktop text-green-600 text-lg mr-3"></i>
                        <div class="flex-1">
                            <p class="text-green-700 font-medium">Workstation WS-111</p>
                            <p class="text-gray-500 text-sm">Added</p>
                        </div>
                        <span class="text-gray-500 text-sm">3 days ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('assetChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Available', 'In Use', 'Maintenance', 'Unavailable'],
                datasets: [{
                    label: 'IT Assets',
                    data: [245, 56, 12, 8],
                    backgroundColor: ['#16A34A', '#3B82F6', '#EAB308', '#DC2626'],
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#333' }
                    },
                    x: {
                        ticks: { color: '#333' }
                    }
                }
            }
        });
    </script>

</body>
</html>
