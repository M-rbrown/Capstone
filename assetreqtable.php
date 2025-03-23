<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-white min-h-screen p-8">
    <div class="shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Asset Request List</h2>
        <div class="overflow-x-auto">
            <table class="table-fixed w-full border-collapse border-gray-200 rounded-xl min-w-[800px]">
                <thead class="bg-red-600 text-white uppercase text-[13px]">
                    <tr>
                        <th class="p-1 text-center">ID</th>
                        <th class="p-3 text-left">Full Name</th>
                        <th class="p-3 text-left">Employee ID</th>
                        <th class="p-3 text-left">Department</th>
                        <th class="p-3 text-left">Asset Name</th>
                        <th class="p-3 text-left">Asset Code</th>
                        <th class="p-3 text-left">Request Date</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="assetRequests" class="text-[12px]"></tbody>
            </table>
        </div>
    </div>

    <script>
$(document).ready(function() {
    fetchRequests();

    function fetchRequests() {
        $.ajax({
            url: 'fetch_asset_req.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                let output = '';
                response.forEach(function(request) {
                    output += `
                        <tr class="border-b border-gray-200">
                            <td class="pr-0 text-center">${request.id}</td>
                            <td class="p-4">${request.full_name}</td>
                            <td class="p-4 whitespace-nowrap">${request.employee_id}</td>
                            <td class="p-4">${request.department}</td>
                            <td class="p-4">${request.asset_name}</td>
                            <td class="p-4 whitespace-nowrap">${request.asset_code}</td>
                            <td class="p-4 whitespace-nowrap">${request.request_date}</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <button class="approve-btn bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-600" data-id="${request.id}">Approve</button>
                                    <button class="disapprove-btn bg-red-500 text-white px-2 text-[10px]  rounded-md hover:bg-red-700" data-id="${request.id}">Disapprove</button>
                                </div>
                            </td>
                        </tr>`;
                });
                $('#assetRequests').html(output);
            }
        });
    }

    $(document).on('click', '.approve-btn', function() {
        const requestId = $(this).data('id');
        alert(`Request ID ${requestId} Approved!`);
    });

    $(document).on('click', '.disapprove-btn', function() {
        const requestId = $(this).data('id');
        alert(`Request ID ${requestId} Disapproved!`);
    });
});

    </script>
</body>