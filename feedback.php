<?php 
require_once('includes/load.php');
include ('layouts/header.php');


 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets Table with Filter</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            cursor: pointer;
        }
        th {
            background-color: #f4f4f4;
        }
        select {
            padding: 8px;
            margin-bottom: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <label for="filter">Filter by Priority or Rating:</label>
    <select id="filter" onchange="filterTable()">
        <option value="all">Show All</option>
        <option value="High">High Priority</option>
        <option value="Medium">Medium Priority</option>
        <option value="Low">Low Priority</option>
        <option value="5">5 Stars</option>
        <option value="4">4 Stars</option>
        <option value="3">3 Stars</option>
    </select>

    <table id="ticketsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            <tr onclick="showModal('Software Issue', 'Fixed system crash', 'High', '5')">
                <td>1</td>
                <td>Software Issue</td>
                <td>Fixed system crash</td>
                <td>High</td>
                <td>5</td>
            </tr>
            <tr onclick="showModal('Hardware Repair', 'Replaced faulty RAM', 'Medium', '4')">
                <td>2</td>
                <td>Hardware Repair</td>
                <td>Replaced faulty RAM</td>
                <td>Medium</td>
                <td>4</td>
            </tr>
            <tr onclick="showModal('Network Issue', 'Resolved connectivity problem', 'Low', '3')">
                <td>3</td>
                <td>Network Issue</td>
                <td>Resolved connectivity problem</td>
                <td>Low</td>
                <td>3</td>
            </tr>
        </tbody>
    </table>

    <div id="modal" class="modal">
    <div class="modal-content">
        <h2 id="modalTitle"></h2>
        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
        <p><strong>Priority:</strong> <span id="modalPriority"></span></p>
        <p><strong>Rating:</strong> <span id="modalRating"></span></p>
        <button onclick="closeModal()"
        style="position: absolute; top: 10px; right: 15px; background-color: #d9534f; color: white;
         border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 20px;"
         >Close
        </button>
    </div>
</div>


    <script>
        function filterTable() {
            let filter = document.getElementById("filter").value;
            let table = document.getElementById("ticketsTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) { // Skip header row
                let priority = rows[i].getElementsByTagName("td")[3].innerText;
                let rating = rows[i].getElementsByTagName("td")[4].innerText;
                
                if (filter === "all" || priority === filter || rating === filter) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function showModal(title, description, priority, rating) {
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDescription").innerText = description;
            document.getElementById("modalPriority").innerText = priority;
            document.getElementById("modalRating").innerText = rating;
            document.getElementById("modal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>
</body>


<?php include_once('layouts/footer.php'); ?>