<!-- Feedback Modal -->
<style>
    .text-yellow-400 {
    color: yellow !important;
}
.text-gray-400 {
    color: gray !important;
}

</style>
<div id="feedbackModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Ticket Feedback</h2>

        <!-- Ticket Details -->
        <div class="bg-gray-100 p-3 rounded-md mb-4">
            <p><strong>ID:</strong> <span id="ticketId"></span></p>
            <p><strong>Issue:</strong> <span id="ticketIssue"></span></p>
            <p><strong>Status:</strong> <span id="ticketStatus" class="px-2 py-1 text-sm rounded-md"></span></p>
        </div>

        <p class="font-semibold">How would you rate our service for this ticket?</p>
        <div class="flex justify-center my-3 space-x-2">
            <span class="star text-gray-400 text-3xl cursor-pointer" data-value="1">★</span>
            <span class="star text-gray-400 text-3xl cursor-pointer" data-value="2">★</span>
            <span class="star text-gray-400 text-3xl cursor-pointer" data-value="3">★</span>
            <span class="star text-gray-400 text-3xl cursor-pointer" data-value="4">★</span>
            <span class="star text-gray-400 text-3xl cursor-pointer" data-value="5">★</span>
        </div>

        <label class="font-semibold">Additional comments</label>
        <textarea id="feedbackComment" class="w-full border rounded-md p-2 mt-1" placeholder="Please share your experience with our service..." required></textarea>

        <div class="flex justify-end mt-4">
            <button id="closeFeedback" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <button id="submitFeedback" class="px-4 py-2 bg-red-500 text-white rounded-md ml-2 hover:bg-red-600">Submit Feedback</button>
        </div>
    </div>
</div>


<script src="libs/js/userticket.js">


</script>
