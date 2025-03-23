<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

<!-- Asset Modal -->
<div id="assetModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50  z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-laptop mr-2"></i> Dell Latitude 5420
                </h2>
                <p class="text-sm text-gray-500">AST-1234</p>
            </div>
            <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-lg">Available</span>
        </div>

        <!-- Basic Information -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-sm font-semibold text-gray-600">Basic Information</h3>
            <div class="grid grid-cols-2 gap-3 text-sm text-gray-700 mt-2">
                <p><i class="fas fa-laptop mr-1"></i> <strong>Type:</strong> Laptop</p>
                <p><i class="fas fa-barcode mr-1"></i> <strong>Serial:</strong> SN-DELL-5428-789</p>
                <p><i class="fas fa-calendar-alt mr-1"></i> <strong>Purchased:</strong> 6/15/2022</p>
                <p class="text-red-500"><i class="fas fa-clock mr-1"></i> <strong>Warranty:</strong> 6/15/2025</p>
                <p><i class="fas fa-map-marker-alt mr-1"></i> <strong>Location:</strong> Main Office - Floor 2</p>
            </div>
        </div>

        <!-- Specifications -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-sm font-semibold text-gray-600">Specifications</h3>
            <div class="grid grid-cols-2 gap-3 text-sm text-gray-700 mt-2">
                <p><strong>Processor:</strong> Intel Core i7-1185G7</p>
                <p><strong>Memory:</strong> 16GB DDR4</p>
                <p><strong>Storage:</strong> 512GB SSD</p>
                <p><strong>Display:</strong> 14-inch FHD (1920x1080)</p>
                <p><strong>Operating System:</strong> Windows 11 Pro</p>
            </div>
        </div>

        <!-- Maintenance History -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-sm font-semibold text-gray-600">Maintenance History</h3>
            <div class="mt-2">
                <div class="text-sm">
                    <p class="font-semibold">🛠 Preventive</p>
                    <p class="text-gray-600">System update and cleaning</p>
                    <p class="text-xs text-gray-500">Technician: John Smith - 2/10/2023</p>
                </div>
                <div class="text-sm mt-3">
                    <p class="font-semibold">🔧 Repair</p>
                    <p class="text-gray-600">Keyboard replacement</p>
                    <p class="text-xs text-gray-500">Technician: Sarah Johnson - 9/5/2022</p>
                </div>
            </div>
        </div>

        <!-- Asset Identifier -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-sm font-semibold text-gray-600">Asset Identifier</h3>
            <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center">
                <div class="w-20 h-12 bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-barcode text-2xl text-gray-500"></i>
                </div>
                <p class="text-sm text-gray-700 mt-2">Asset ID: AST-1234</p>
                <button class="mt-2 px-4 py-1 bg-gray-800 text-white text-sm rounded-lg flex items-center">
                    <i class="fas fa-print mr-1"></i> Print Barcode
                </button>
            </div>
        </div>

        <!-- Status Message -->
        <div class="bg-green-100 text-green-600 p-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-check-circle mr-2"></i> Ready for assignment
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between mt-4">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg">Edit Details</button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg flex items-center">
                <i class="fas fa-user-plus mr-2"></i> Assign Asset
            </button>
        </div>
    </div>
</div>
