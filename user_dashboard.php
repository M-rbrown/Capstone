<style>
    .star {
        font-size: 25px;
        cursor: pointer;
        color: gray;
    }

    .feedback-btn {
        float: right;
        border: 2px solid green;
        color: green;
        background: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .feedback-btn:hover {
        background: green;
        color: white;
    }
    
</style>

<nav class="container">


<div class="flex min-h-[600px] pb-4 pl-4 pr-4">
    
    <!-- Left Sidebar -->
    <div class="w-[calc((100%-1024px)/2)] min-w-[200px] bg-white p-4 rounded-lg shadow-md max-h-[600px] overflow-y-auto">
            <h3 class="font-bold text-lg text-center text-[#D30000]">
                <i class="fa fa-pen mr-2"></i> Dashboard
            </h3>
        <ul class="mt-3 space-y-3">
            <li>
                <a href="#" onclick="toggleDropdown(event)" 
                   class="sidebar-item flex items-center justify-between p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200">
                    Tickets
                    <span id="ticketArrow">▼</span>
                </a>
                <ul id="ticketDropdown" class="ml-4 mt-2 hidden space-y-2">
                    <li>
                        <a href="#" onclick="showSection(this, showTickets)"
                           class="sidebar-item block p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                            View Tickets
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="showSection(this, showSubmitTicketForm)"
                        class="sidebar-item block p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                        New Ticket
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" onclick="showSection(this, showAssets)"
                   class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                    Assets
                </a>
            </li>
            <li>
                <a href="#" onclick="showSection(this, showKnowledge)"
                   class="sidebar-item flex items-center p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-gray-200 opacity-60">
                    Knowledge Base
                </a>
            </li>   
        </ul>
    </div>
<!-- Main Content -->
<div class="w-[1024px] mx-4 bg-white p-6 rounded-lg shadow-md max-h-[600px] overflow-y-auto" id="mainContent">

    <?php include ('user_ticket.php'); ?>
    <?php include ('user_asset.php'); ?>
    <?php include ('user_knowledge.php'); ?>
    <?php include ('submit_ticket_form.php'); ?>
</div>


<script src="libs/js/userdashboard.js"> </script>

<?php include ('layouts/footer.php'); ?>