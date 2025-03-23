<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div id="submitForm" class="hidden bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 text-[#FC0B04]">Submit New Ticket</h2>
    <form id="ticketForm" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="Issue" class="block font-semibold">Issue</label>
            <select id="Issue" name="Issue" class="w-full p-2 border rounded" required>
                <option value="Software">Software</option>
                <option value="Hardware">Hardware</option>
                <option value="Others">Others</option>
            </select>
        </div>
            <div>
                <label for="requester" class="block font-semibold">Requester</label>
                <input type="text" id="requester" name="requester" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="department" class="block font-semibold">Department</label>
                <select id="department" name="department" class="w-full p-2 border rounded" required>
                    <option value="">Select</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Finance">Finance</option>
                </select>
            </div>
            <div>
                <label for="priority" class="block font-semibold">Priority</label>
                <select id="priority" name="priority" class="w-full p-2 border rounded" required>
                    <option value="">Select</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div>
                <label for="assignedTo" class="block font-semibold">Assigned To</label>
                <select id="assignedTo" name="assignedTo" class="w-full p-2 border rounded" required>
                    <option value="">Select</option>
                    <option value="John Doe">John Doe</option>
                    <option value="Jane Smith">Jane Smith</option>
                    <option value="Support Team">Support Team</option>
                </select>
            </div>
        </div>
        <div>
            <label for="ticketDescription" class="block font-semibold">Description</label>
            <textarea id="ticketDescription" name="ticketDescription" class="w-full p-2 border rounded" rows="4" required></textarea>
        </div>
        <div class="text-right">
            <button type="button" id="submitTicketBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Ticket</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitTicketBtn").addEventListener("click", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to submit this ticket?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: "bg-green-500 text-white px-4 py-2 rounded mr-2",
                cancelButton: "bg-red-500 text-white px-4 py-2 rounded"
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.getElementById("ticketForm");
                if (!form) {
                    console.error("❌ Form not found!");
                    return;
                }

                form.action = "process_ticket.php"; // ✅ Set form action
                form.method = "POST"; // ✅ Use POST method
                form.submit(); // ✅ Submit form directly to PHP
            }
        });
    });
});

</script>
