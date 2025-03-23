    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showContent(section, clickedItem) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected section
            document.getElementById(section).classList.remove('hidden');

            // Remove active class from all sidebar items
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('bg-gray-300', 'font-bold', 'opacity-100');
                item.classList.add('opacity-60'); // Lower opacity for non-active
            });

            // Add active class to the clicked item
            clickedItem.classList.add('bg-gray-300', 'font-bold', 'opacity-100');
            clickedItem.classList.remove('opacity-60');
        }

        // Ensure default section is displayed on page load
        window.onload = function () {
            showContent('dashboard', document.getElementById('dashboard-btn'));
        };
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex  font-bold" style="height: 570px; margin-left: 20px; overflow-y: hidden;">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-4 rounded-lg h-[590px]">
            <div class="flex items-center justify-center mt-5 mb-10">
                <i class="fa fa-user-pen text-[#FC0B04] text-2xl mr-2"></i>
                <h2 class="text-xl font-bold text-[#FC0B04]">ADDRESSOR</h2>
            </div>
            <ul>
                <li class="mb-2">
                    <a href="#" id="dashboard-btn" onclick="showContent('dashboard', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">📊</span> Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" id="pendingApproval-btn" onclick="showContent('pendingApproval', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">⏳</span> Pending Request
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" id="solvedTickets-btn" onclick="showContent('solvedTickets', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">✔️</span> Resolved Tickets
                    </a>
                </li>
                <li>
                    <a href="#" id="feedback-btn" onclick="showContent('feedback', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">💬</span> Feedback
                    </a>
                </li>
            </ul>
        </aside>

<!-- Main Content -->
<div class="flex-grow mr-6 bg-white shadow-md rounded-lg h-[590px] relative" style="margin-left: 30px;">
    <!-- Dashboard (default view) -->
    <div id="dashboard" class="content-section w-[900px] h-full absolute top-[10px] left-[20px]">
        <?php include('addressor_table.php'); ?>
    </div>

    <!-- Pending Approval -->
    <div id="pendingApproval" class="content-section w-[900px] h-full absolute top-[10px] left-[20px] hidden overflow-auto">
        <?php include('pendings_table.php'); ?>
    </div>

    <!-- Solved Tickets -->
    <div id="solvedTickets" class="content-section w-[900px] h-full absolute top-[10px] left-[20px] hidden overflow-auto">
        <?php include('solved_tickets_table.php'); ?>
    </div>

    <!-- Feedback -->
    <div id="feedback" class="content-section w-[900px] h-full absolute top-[10px] left-[20px] hidden overflow-auto">
        <?php include('feedback_table.php'); ?>
    </div>
</div>

    </div>
</body>
