<div class="max-w-[2200px] bg-white p-5 rounded-lg ">
    <h3 class="text-xl font-bold text-gray-800 mb-4 text-left">Solved Tickets</h3>

    <div class="overflow-x-auto rounded-lg">
        <table id="resolvedTicketsTable" class="w-full border text-center border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-red-600 text-white text-[13px]">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Requester</th>
                    <th class="p-3">Department</th>
                    <th class="p-3">Priority</th>
                    <th class="p-3">Issue</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Date Submitted</th>
                    <th class="p-3">Time Submitted</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-gray-50 px-5 py-4 text-sm">
                <!-- Dynamic data rows go here -->
            </tbody>
        </table>
    </div>
</div>


<!-- MODAL -->
<div id="ticketModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded-lg shadow-lg w-[500px] h-[500px] overflow-auto">
        <h2 class="text-lg font-bold mb-3">Ticket Details</h2>
        <form>
            <!-- ID Field -->
            <div class="mb-3">
                <label for="modalId" class="block text-xs font-medium text-gray-700">ID</label>
                <input type="text" id="modalId" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
            </div>

            <!-- Requester and Department Fields Side by Side -->
            <div class="mb-3 flex space-x-3">
                <div class="flex-1">
                    <label for="modalRequester" class="block text-xs font-medium text-gray-700">Requester</label>
                    <input type="text" id="modalRequester" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
                </div>
                <div class="flex-1">
                    <label for="modalDepartment" class="block text-xs font-medium text-gray-700">Department</label>
                    <input type="text" id="modalDepartment" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
                </div>
            </div>

            <!-- Priority and Status Fields Side by Side -->
            <div class="mb-3 flex space-x-3">
                <div class="flex-1">
                    <label for="modalPriority" class="block text-xs font-medium text-gray-700">Priority</label>
                    <input type="text" id="modalPriority" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
                </div>
                <div class="flex-1">
                    <label for="modalStatus" class="block text-xs font-medium text-gray-700">Status</label>
                    <input type="text" id="modalStatus" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
                </div>
            </div>

            <!-- Issue and Date Fields Side by Side -->
            <div class="mb-3 flex space-x-3">
                <div class="flex-1">
                    <label for="modalIssue" class="block text-xs font-medium text-gray-700">Issue</label>
                    <textarea id="modalIssue" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" rows="3" readonly></textarea>
                </div>
                <div class="flex-1">
                    <label for="modalDate" class="block text-xs font-medium text-gray-700">Date Submitted</label>
                    <input type="text" id="modalDate" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
                </div>
            </div>

            <!-- Time Submitted Field -->
            <div class="mb-3">
                <label for="modalTime" class="block text-xs font-medium text-gray-700">Time Submitted</label>
                <input type="text" id="modalTime" class="mt-1 block w-full p-2 text-xs border border-gray-300 rounded-md" readonly>
            </div>

            <!-- Close Button -->
            <button type="button" id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded text-xs">Close</button>
        </form>
    </div>
</div>




<script>
document.addEventListener("DOMContentLoaded", function () {
    // Function to fetch resolved tickets
    function fetchResolvedTickets() {
        fetch("fetch_resolved_tickets.php") // Fetch from PHP file
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Resolved Tickets:", data); // Check the fetched data

                const tableBody = document.querySelector("#resolvedTicketsTable tbody"); // Use the specific table ID
                if (!tableBody) {
                    console.error("Error: Table body not found!");
                    return;
                }

                // Clear previous table data
                tableBody.innerHTML = "";

                if (Array.isArray(data) && data.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="9" class="p-3 text-center text-gray-500">No resolved tickets found</td>
                        </tr>`;
                    return;
                }

                // Loop through each ticket and populate the table rows
                data.forEach(ticket => {
                    const row = document.createElement("tr");
                    row.classList.add("hover:bg-gray-200");

                    row.innerHTML = `
                        <td class="border border-gray-300 p-2">${ticket.id}</td>
                        <td class="border border-gray-300 p-2 font-bold">${ticket.requester}</td>
                        <td class="border border-gray-300 p-2">${ticket.department}</td>
                        <td class="border border-gray-300 p-2">${ticket.priority}</td>
                        <td class="border border-gray-300 p-2">${ticket.issue}</td>
                        <td class="border border-gray-300 p-2 text-green-600 font-bold">${ticket.status}</td>
                        <td class="border border-gray-300 p-2">${ticket.date_only}</td> <!-- Date Only -->
                        <td class="border border-gray-300 p-2">${ticket.time_only}</td> <!-- Time Only -->
                        <td class="border border-gray-300 p-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded view-btn"
                                    data-id="${ticket.id}"
                                    data-requester="${ticket.requester}"
                                    data-department="${ticket.department}"
                                    data-priority="${ticket.priority}"
                                    data-issue="${ticket.issue}"
                                    data-status="${ticket.status}"
                                    data-date="${ticket.date_only}"
                                    data-time="${ticket.time_only}">
                                View
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error("Error fetching resolved tickets:", error));
    }

    fetchResolvedTickets();
    setInterval(fetchResolvedTickets, 5000); // Refresh every 5 seconds

    // MODAL FUNCTIONALITY
    document.addEventListener("click", function (event) {
    // Open modal when clicking "View" button
    if (event.target.classList.contains("view-btn")) {
        const modal = document.getElementById("ticketModal");
        modal.classList.remove("hidden");

        // Populate the modal with ticket details
        document.getElementById("modalId").value = event.target.getAttribute("data-id");
        document.getElementById("modalRequester").value = event.target.getAttribute("data-requester");
        document.getElementById("modalDepartment").value = event.target.getAttribute("data-department");
        document.getElementById("modalPriority").value = event.target.getAttribute("data-priority");
        document.getElementById("modalIssue").value = event.target.getAttribute("data-issue");
        document.getElementById("modalStatus").value = event.target.getAttribute("data-status");
        document.getElementById("modalDate").value = event.target.getAttribute("data-date");
        document.getElementById("modalTime").value = event.target.getAttribute("data-time");
    }

    // Close modal when clicking the close button
    if (event.target.id === "closeModal") {
        document.getElementById("ticketModal").classList.add("hidden");
    }

    // Close modal when clicking outside the modal box
    const modal = document.getElementById("ticketModal");
    if (event.target === modal) {
        modal.classList.add("hidden");
    }
});


});
    



</script>