<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
.text-yellow-400 {
    color: #fbbf24; /* Tailwind's yellow-400 */
}

.text-gray-400 {
    color: #9ca3af; /* Tailwind's gray-400 */
}
</style>

<!-- Modal for Ticket Information -->
<div id="ticketModal" class="hidden fixed inset-0 text-[13px] bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-4 rounded-lg shadow-lg w-1/2 max-h-[60vh] flex flex-col">
        <h2 class="text-lg font-bold mb-2">Ticket Details</h2>
        <form class="flex-grow">
            <!-- Grid Layout for Two Items Per Row -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-semibold">ID:</label>
                    <input type="text" id="modal_id" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Issue:</label>
                    <input type="text" id="modal_title" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Requester:</label>
                    <input type="text" id="modal_requester" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Department:</label>
                    <input type="text" id="modal_department" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Priority:</label>
                    <input type="text" id="modal_priority" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Assigned To:</label>
                    <input type="text" id="modal_assigned_to" class="w-full p-1 border rounded" readonly>
                </div>
                <div>
                    <label class="font-semibold">Status:</label>
                    <input type="text" id="modal_status" class="w-full p-1 border rounded" readonly>
                </div>
            </div>

            <!-- Full-Width Textarea for Issue Description -->
            <div class="mt-2">
                <label class="font-semibold">Issue Description:</label>
                <textarea id="modal_issue_description" class="w-full p-1 border rounded" rows="2" readonly></textarea>
            </div>
        </form>

        <!-- Centered Close Button with Better Spacing -->
        <div class="flex justify-center items-center mb-6 pb-2">
            <button type="button" id="closeTicketModal" class="w-[200px] bg-red-500 text-white p-2 rounded">Close</button>
        </div>
    </div>
</div>

<!-- Feedback Modal -->
<div id="feedbackModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Ticket Feedback</h2>

        <!-- Ticket Details -->
        <div class="bg-gray-100 p-3 rounded-md mb-4">
            <p><strong>ID:</strong> <span id="feedbackTicketId"></span></p>
            <p><strong>Issue:</strong> <span id="feedbackTicketIssue"></span></p>
            <p><strong>Status:</strong> <span id="feedbackTicketStatus" class="px-2 py-1 text-sm rounded-md"></span></p>
        </div>

        <p class="font-semibold">How would you rate our service for this ticket?</p>
        <div class="flex space-x-2 text-gray-400 cursor-pointer" id="starRating">
            <span class="star text-3xl" data-index="1">&#9733;</span>
            <span class="star text-3xl" data-index="2">&#9733;</span>
            <span class="star text-3xl" data-index="3">&#9733;</span>
            <span class="star text-3xl" data-index="4">&#9733;</span>
            <span class="star text-3xl" data-index="5">&#9733;</span>
        </div>

        <label class="font-semibold">Additional comments</label>
        <textarea id="feedbackComment" class="w-full border rounded-md p-2 mt-1" placeholder="Please share your experience with our service..." required></textarea>

        <div class="flex justify-end mt-4">
            <button id="closeFeedbackModal" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <button id="submitFeedback" class="px-4 py-2 bg-red-500 text-white rounded-md ml-2 hover:bg-red-600">Submit Feedback</button>
        </div>
    </div>
</div>

<!-- Ticket Table -->
<div id="ticketContainer" class="max-w-[2200px] bg-white p-5 rounded-lg shadow-lg">
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
        <table class="w-full border text-center border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-red-600 text-white">
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

<script src="libs/js/userticket.js"></script>