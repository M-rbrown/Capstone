<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

    <div id="ticketContainer" class="max-w-[2200px] bg-white p-5 rounded-lg">
        <!-- Table Header with Filter Buttons -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-black">Tickets Table</h2>
            <div class="flex items-center space-x-2">
                <span class="text-black font-medium">Filter:</span>
                <select class="px-4 py-2 rounded-lg border border-gray-300 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="all">All</option>
                    <option value="approval">For Approval</option>
                    <option value="pending">Pending</option>
                    <option value="disapproved">Disapproved</option>
                </select>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto rounded-lg">
            <table id="addressorTable" class="w-full border text-center border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-red-600 text-white text-[13px]">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-3">Issue</th>
                        <th class="p-3">Requester</th>
                        <th class="p-3">Department</th>
                        <th class="p-3">Priority</th>
                        <th class="p-3">Assigned To</th>
                        <th class="p-3">Issue Description</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y divide-gray-200 bg-gray-50 px-5 py-4 text-sm">
                    <!-- Data will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="solvedTicketModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg w-2/5">
        <h2 class="text-xl font-bold mb-4">Ticket Details</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Ticket ID</label>
                <input type="text" id="ticketID" class="w-full p-2 border rounded" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Requester</label>
                <input type="text" id="requester" class="w-full p-2 border rounded" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Issue</label>
                <input type="text" id="issue" class="w-full p-2 border rounded" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" id="department" class="w-full p-2 border rounded" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Priority</label>
                <input type="text" id="priority" class="w-full p-2 border rounded" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Assigned To</label>
                <input type="text" id="assignedTo" class="w-full p-2 border rounded" readonly>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Issue Description</label>
                <textarea id="issueDescription" class="w-full p-2 border rounded h-20" readonly></textarea>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" id="status" class="w-full p-2 border rounded" readonly>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <button id="closeModalt" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function getPriorityClass(priority) {
            switch (priority.toLowerCase()) {
                case "high": return "text-red-600 font-bold";
                case "medium": return "text-yellow-600 font-bold";
                case "low": return "text-green-600 font-bold";
                default: return "text-gray-600 font-bold";
            }
        }

        function getStatusClass(status) {
            switch (status.toLowerCase()) {
                case "resolved": return "text-green-600 font-bold";
                case "pending": return "text-yellow-600 font-bold";
                case "in progress": return "text-blue-600 font-bold";
                case "disapproved": return "text-red-600 font-bold";
                default: return "text-gray-600 font-bold";
            }
        }

        function fetchSolvedTickets() {
            fetch("fetch_tickets.php")
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById("tableBody");
                    tableBody.innerHTML = "";

                    if (!Array.isArray(data) || data.length === 0) {
                        tableBody.innerHTML = `<tr><td colspan="9" class="p-3 text-center text-gray-500">No solved tickets found</td></tr>`;
                        return;
                    }

                    data.forEach(ticket => {
                        let row = document.createElement("tr");
                        row.className = "hover:bg-gray-100 text-[12px] cursor-pointer";

                        row.innerHTML = `
                            <td class="p-3">${ticket.id}</td>
                            <td class="p-3">${ticket.issue}</td>
                            <td class="p-3 font-bold">${ticket.requester}</td>
                            <td class="p-3">${ticket.department}</td>
                            <td class="p-3 ${getPriorityClass(ticket.priority)}">${ticket.priority}</td>
                            <td class="p-3 font-bold">${ticket.assigned_to}</td>
                            <td class="p-3">${ticket.issue_description}</td>
                            <td class="p-3 ${getStatusClass(ticket.status)}">${ticket.status}</td>
                            <td class="p-3">
                                <button class="view-tickets bg-blue-500 text-white px-3 py-1 rounded-lg" 
                                    data-ticket='${JSON.stringify(ticket)}'>View</button>
                            </td>
                        `;

                        tableBody.appendChild(row);
                    });

                    document.querySelectorAll(".view-tickets").forEach(button => {
                        button.addEventListener("click", function () {
                            let ticket = JSON.parse(this.getAttribute("data-ticket"));
                            document.getElementById("ticketID").value = ticket.id;
                            document.getElementById("requester").value = ticket.requester;
                            document.getElementById("issue").value = ticket.issue;
                            document.getElementById("department").value = ticket.department;
                            document.getElementById("priority").value = ticket.priority;
                            document.getElementById("assignedTo").value = ticket.assigned_to;
                            document.getElementById("issueDescription").value = ticket.issue_description;
                            document.getElementById("status").value = ticket.status;

                            document.getElementById("solvedTicketModal").classList.remove("hidden");
                        });
                    });
                });
        }

        document.getElementById("closeModalt").addEventListener("click", function () {
            document.getElementById("solvedTicketModal").classList.add("hidden");
        });

        fetchSolvedTickets();
        setInterval(fetchSolvedTickets, 5000);
    });
</script>


