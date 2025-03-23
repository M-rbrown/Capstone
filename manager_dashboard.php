<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            showContent('ticketsForApproval', document.getElementById('ticketsForApproval-btn'));
        };
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex font-bold" style="height: 570px; margin-left: 20px; overflow-y: hidden;">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-4 rounded-lg h-[590px]">
            <div class="flex items-center justify-center mt-5 mb-10">
                <i class="fa fa-user-shield text-[#FC0B04] text-2xl mr-2"></i>
                <h2 class="text-xl font-bold text-[#FC0B04]">MANAGER</h2>
            </div>
            <ul>
                <li class="mb-2">
                    <a href="#" id="ticketsForApproval-btn" onclick="showContent('ticketsForApproval', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">📋</span> Tickets for Approval
                    </a>
                </li>
                <li>
                    <a href="#" id="resolved-btn" onclick="showContent('resolvedTickets', this)" 
                        class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        <span class="mr-2">✔️</span>Tickets
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow mr-6 bg-white shadow-md rounded-lg h-[590px] relative" style="margin-left: 30px;">
            <!-- Tickets for Approval (default view) -->
            <div id="ticketsForApproval" class="content-section w-[600px] h-full absolute top-[10px] left-[20px]">
                <?php include('manager_table.php'); ?>
            </div>

            <!-- Resolved Tickets -->
            <div id="resolvedTickets" class="content-section w-[900px] h-full absolute top-[10px] left-[20px] hidden overflow-auto">
                <?php include('addressor_table.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>
