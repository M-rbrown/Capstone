
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Analytics Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 p-6 min-h-screen">

    <h1 class="text-2xl font-bold mb-6">Feedback Analytics Dashboard</h1>

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
        <canvas id="TicketpieChart" style="width: 250px; height: 250px;"></canvas>
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
    <div class="bg-white p-6 rounded-lg shadow flex justify-center">
        <h2 class="text-xl font-semibold mb-4">Feedback by Department</h2>
        <canvas id="TicketbarChart" style="width: 1000px; height: 500px;"></canvas>
    </div>

    <script>
        // Pie Chart Data
        const pieCtx = document.getElementById('TicketpieChart').getContext('2d');
        new Chart(pieCtx, {
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
        const barCtx = document.getElementById('TicketbarChart').getContext('2d');
        new Chart(barCtx, {
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
</html>
