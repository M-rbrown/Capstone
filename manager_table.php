
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Ticket List</title>
</head>
<body class="bg-gray-100">

<div class="w-[900px] ml-auto mr-[40px] bg-white p-6 rounded-lg">
    <h2 class="text-2xl font-bold  mb-4 ">Ticket List (For Approval)</h2>

    <div class="overflow-x-auto">
        <table id="managerTable" class="min-w-[800px] border border-gray-300 rounded-lg shadow-md">
            <thead class="text-[12px]">
                <tr class="bg-red-600 text-white text-left">
                    <th class="p-3">ID</th>
                    <th class="p-3">Issue</th>
                    <th class="p-3">Requester</th>
                    <th class="p-3">Department</th>
                    <th class="p-3">Priority</th>
                    <th class="p-3">Assigned To</th>
                    <th class="p-3">Issue Description</th>
                    <th class="p-3">Status</th>
                    <th class="p-2">Date Submitted</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="ticketTable" class="bg-white divide-y divide-gray-200">
                <!-- Data will be inserted here -->
            </tbody>
        </table>
    </div>
</div>

    <!-- MODAL (Ticket Details as Form) -->
    <div id="ticketModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
         <div class="bg-white text-[13px] p-4 rounded-lg shadow-lg mt-[30px] w-[700px] h-[570px] overflow-auto">
            <h2 class="text-lg font-bold mb-4 text-[#FC0B04]">Ticket Details</h2>
            <form class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold">ID</label>
                        <input type="text" id="modalId" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Issue</label>
                        <input type="text" id="modalIssue" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Requester</label>
                        <input type="text" id="modalRequester" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Department</label>
                        <input type="text" id="modalDepartment" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Priority</label>
                        <input type="text" id="modalPriority" class="w-full p-2 border rounded bg-gray-100 text-red-500 font-semibold" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Assigned To</label>
                        <input type="text" id="modalAssignedTo" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold">Issue Description</label>
                    <textarea id="modalDescription" class="w-full p-2 border rounded bg-gray-100" rows="4" readonly></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold">Status</label>
                        <input type="text" id="modalStatus" class="w-full p-2 border rounded bg-gray-100 text-orange-600 font-bold" readonly>
                    </div>
                    <div>
                        <label class="block font-semibold">Date Submitted</label>
                        <input type="text" id="modalDate" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" id="closeModal" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Close</button>
                </div>
            </form>
        </div>
    </div>

</body>

<script src="libs/js/managertable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>