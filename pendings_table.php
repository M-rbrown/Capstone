<div id="pendingRequestContainer" class="max-w-[2200px] bg-white p-5 rounded-lg">
    <!-- Table Header -->
    <h3 class="text-xl font-bold text-black text-left mb-4">Pending Requests</h3>

    <!-- Table Content -->
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full border text-center border-gray-300 rounded-lg overflow-hidden">
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
            <tbody id="pendingTableBody" class="divide-y divide-gray-200 bg-gray-50 text-sm">
                <!-- Dynamic data rows go here -->
            </tbody>
        </table>
    </div>
</div>

<script src="libs/js/pendingstable.js"></script>