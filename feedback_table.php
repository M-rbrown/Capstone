<div class="max-w-[2200px] bg-white p-5 rounded-lg">
    <h2 class="text-xl font-bold text-gray-800 mb-4 text-left">
        Users Feedback
    </h2>

    <div class="overflow-x-auto rounded-lg">
        <table id="feedbackTable" class="w-full border text-center border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-red-600 text-white text-[13px]">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Issue</th>
                    <th class="p-3">Requester</th>
                    <th class="p-3">Technician</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Rating</th>
                    <th class="p-3">Comment</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-gray-50 px-5 py-4 text-sm">
                <!-- Dynamic data rows go here -->
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    function getStatusClass(status) {
        switch (status.toLowerCase()) {
            case "resolved":
                return "text-green-600 font-semibold";
            case "pending":
                return "text-yellow-600 font-semibold";
            case "in progress":
                return "text-blue-600 font-semibold";
            case "disapproved":
                return "text-red-600 font-semibold";
            default:
                return "text-gray-600 font-semibold";
        }
    }

    function getStarColor(rating) {
        if (rating >= 4) {
            return "text-yellow-500"; // Gold for high ratings
        } else if (rating >= 2) {
            return "text-orange-500"; // Orange for mid ratings
        } else {
            return "text-red-500"; // Red for low ratings
        }
    }

    function fetchFeedback() {
        fetch("fetch_feedback.php")
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data:", data);

                const feedbackTableBody = document.querySelector("#feedbackTable tbody");
                if (!feedbackTableBody) {
                    console.error("Error: Table body not found!");
                    return;
                }

                feedbackTableBody.innerHTML = "";

                if (data.length === 0) {
                    feedbackTableBody.innerHTML = `
                        <tr>
                            <td colspan="7" class="p-3 text-gray-500">No feedback available</td>
                        </tr>`;
                    return;
                }

                data.forEach(ticket => {
                    const statusClass = getStatusClass(ticket.status);
                    const starClass = getStarColor(ticket.feedback);

                    const row = document.createElement("tr");
                    row.classList.add("hover:bg-gray-200");

                    row.innerHTML = `
                        <td class="border border-gray-300 p-2">${ticket.id}</td>
                        <td class="border border-gray-300 p-2">${ticket.issue}</td>
                        <td class="border border-gray-300 p-2 font-bold">${ticket.requester}</td>
                        <td class="border border-gray-300 p-2">${ticket.assigned_to}</td>
                        <td class="border border-gray-300 p-2 ${statusClass}">${ticket.status}</td>
                        <td class="border border-gray-300 p-2 font-bold">
                            ${ticket.feedback} <span class="text-lg ${starClass}">★</span>
                        </td>
                        <td class="border border-gray-300 p-2">${ticket.comments}</td>
                    `;

                    feedbackTableBody.appendChild(row);
                });

                console.log("Updated Table Content:", feedbackTableBody.innerHTML);
            })
            .catch(error => console.error("Error fetching feedback:", error));
    }

    fetchFeedback();
    setInterval(fetchFeedback, 5000); // Refresh every 5 seconds
});
</script>

