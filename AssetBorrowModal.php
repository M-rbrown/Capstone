
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Modal Asset -->
<div id="borrowModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">Request to Borrow</h2>
        <form id="borrowForm" action="process_asset.php" method="POST">
            <!-- Borrower Information -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Employee ID</label>
                <input type="text" name="employee_id" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" name="department" class="w-full border rounded p-2" required>
            </div>

            <!-- Asset Information -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                <input type="text" id="assetName" name="asset_name" class="w-full border rounded p-2" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Asset Code</label>
                <input type="text" id="assetCode" name="asset_code" class="w-full border rounded p-2" readonly>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
            <button type="button" data-close-modal class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Submit Request</button>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('borrowModal');

    // Open modal & set asset details
    document.querySelectorAll('.request-borrow-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('assetName').value = this.getAttribute('data-asset');

            const randomCode = 'ASSET-' + Math.floor(10000 + Math.random() * 90000);
            document.getElementById('assetCode').value = randomCode;

            modal.classList.remove('hidden');
        });
    });

    // Close modal when clicking cancel button using data attribute
    document.addEventListener('click', function (event) {
        if (event.target.matches('[data-close-modal]')) {
            modal.classList.add('hidden');
        }
    });

    // Close modal when clicking outside the content
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Handle form submission with SweetAlert confirmation
    document.getElementById('borrowForm').addEventListener('submit', function (event) {
        event.preventDefault();

        Swal.fire({
            title: "Make sure the info is correct!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Send"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('borrowForm').submit();
            }
        });
    });
});


</script>

