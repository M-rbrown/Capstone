<!-- Asset Details Modal -->
<div id="assetModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-lg font-bold" id="modalAssetName">-</h2>
                <p class="text-gray-500 text-sm" id="modalAssetID">-</p>
            </div>
            <span id="modalAssetStatus" class="bg-gray-200 text-gray-600 text-xs font-semibold px-3 py-1 rounded-lg">
                -
            </span>
        </div>

        <!-- Basic Information Section -->
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <h3 class="text-md font-semibold mb-2">Basic Information</h3>
            <p id="typeRow"><i class="fas fa-laptop mr-2"></i> <strong>Type:</strong> <span id="modalAssetType">-</span></p>
            <p id="locationRow"><i class="fas fa-map-marker-alt mr-2"></i> <strong>Location:</strong> <span id="modalAssetLocation">-</span></p>
            <p id="assignedRow"><i class="fas fa-user mr-2"></i> <strong>Assigned to:</strong> <span id="modalAssetAssigned">-</span></p>
            <p id="updatedRow"><i class="fas fa-calendar-alt mr-2"></i> <strong>Last Updated:</strong> <span id="modalAssetUpdated">-</span></p>
        </div>

        <!-- Asset Identifier -->
        <div class="p-4 bg-gray-100 rounded-lg text-center">
            <h3 class="text-md font-semibold mb-2">Asset Identifier</h3>
            <div class="bg-white p-4 inline-block rounded-lg shadow">
                <i class="fas fa-barcode text-4xl text-gray-600"></i>
            </div>
            <p class="text-gray-500 text-sm mt-2">Asset ID: <span id="modalAssetIDBottom">-</span></p>
            <button class="mt-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                <i class="fas fa-print"></i> Print Barcode
            </button>
        </div>

        <!-- Footer: Actions -->
        <div class="mt-4 border-t pt-4">
            <div class="flex justify-between mt-3">
                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Edit Details</button>
                <button class="px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded-lg" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id, name, type, status, location, assigned, updated) {
        // Set modal content
        document.getElementById('modalAssetID').textContent = id;
        document.getElementById('modalAssetIDBottom').textContent = id;
        document.getElementById('modalAssetName').textContent = name;
        document.getElementById('modalAssetType').textContent = type;
        document.getElementById('modalAssetStatus').textContent = status;
        document.getElementById('modalAssetStatus').className = 
        status === 'Available' ? 'bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-lg' :
        status === 'In Use' ? 'bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-lg' :
        status === 'Maintenance' ? 'bg-yellow-100 text-yellow-600 text-xs font-semibold px-3 py-1 rounded-lg' :
        'bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-lg';
        document.getElementById('modalAssetLocation').textContent = location;
        document.getElementById('modalAssetAssigned').textContent = assigned !== '-' ? assigned : 'N/A';
        document.getElementById('modalAssetUpdated').textContent = updated;

        // Hide empty rows
        document.getElementById('typeRow').style.display = type ? 'block' : 'none';
        document.getElementById('locationRow').style.display = location ? 'block' : 'none';
        document.getElementById('assignedRow').style.display = assigned && assigned !== '-' ? 'block' : 'none';
        document.getElementById('updatedRow').style.display = updated ? 'block' : 'none';

        // Show modal
        document.getElementById('assetModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('assetModal').classList.add('hidden');
    }
</script>
