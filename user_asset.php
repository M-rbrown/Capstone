<!-- Assets Section -->
<div id="assetsContainer" style="display: none; margin-top: 20px; max-width: 1100px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); font-size: 18px;">
    
    <!-- Centered Heading -->
    <h3 style="margin-bottom: 15px; text-align: left; font-size: 22px; font-weight: bold;">Borrow IT Assets</h3>
    
    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <!-- Asset 1 -->
        <div style="width: 48%; background: #fff; border-radius: 8px; padding: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: 0.3s;">
            <span style="background: #e7f3ff; color: #007bff; padding: 5px 10px; font-size: 12px; border-radius: 5px; font-weight: bold;">Laptop</span>
            <h4 style="margin: 10px 0 5px;">Laptop</h4>
            <p style="margin: 0; color: #555;">A high-performance laptop for work and design.</p>
            <button 
            style="margin-top: 10px; padding: 10px; background: #212529; color: white; border: none; border-radius: 5px; cursor: pointer;"
            class="request-borrow-btn" data-asset="Dell XPS 15">Request to Borrow</button>
        </div>

        <!-- Asset 2 -->
        <div style="width: 48%; background: #fff; border-radius: 8px; padding: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: 0.3s;">
            <span style="background: #e7f3ff; color: #007bff; padding: 5px 10px; font-size: 12px; border-radius: 5px; font-weight: bold;">Laptop</span>
            <h4 style="margin: 10px 0 5px;">Monitor</h4>
            <p style="margin: 0; color: #555;">Powerful laptop for professional users and developers.</p>
            <button 
            style="margin-top: 10px; padding: 10px; background: #212529; color: white; border: none; border-radius: 5px; cursor: pointer;"
            class="request-borrow-btn" data-asset="MacBook Pro 16">Request to Borrow</button>
        </div>

        <!-- Asset 3 -->
        <div style="width: 48%; background: #fff; border-radius: 8px; padding: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: 0.3s;">
            <span style="background: #e7f3ff; color: #007bff; padding: 5px 10px; font-size: 12px; border-radius: 5px; font-weight: bold;">Mobile</span>
            <h4 style="margin: 10px 0 5px;">iPhone 13 Pro</h4>
            <p style="margin: 0; color: #555;">Flagship Apple smartphone for communication.</p>
            <button 
            style="margin-top: 10px; padding: 10px; background: #212529; color: white; border: none; border-radius: 5px; cursor: pointer;"
            class="request-borrow-btn" data-asset="iPhone 13 Pro">Request to Borrow</button>
        </div>

        <!-- Asset 4 -->
        <div style="width: 48%; background: #fff; border-radius: 8px; padding: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: 0.3s;">
            <span style="background: #e7f3ff; color: #007bff; padding: 5px 10px; font-size: 12px; border-radius: 5px; font-weight: bold;">Tablet</span>
            <h4 style="margin: 10px 0 5px;">iPad Pro</h4>
            <p style="margin: 0; color: #555;">Versatile tablet for productivity and creativity.</p>
            <button 
            style="margin-top: 10px; padding: 10px; background: #212529; color: white; border: none; border-radius: 5px; cursor: pointer;"
            class="request-borrow-btn" data-asset="iPad Pro">Request to Borrow</button>
        </div>
    </div>
</div>
<?php include 'AssetBorrowModal.php'; ?>

<script>
    // Select all buttons with the class request-borrow-btn
    document.querySelectorAll('.request-borrow-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Get the asset name from data-asset attribute
            document.getElementById('assetName').value = this.getAttribute('data-asset');
            // Show the modal
            document.getElementById('borrowModal').classList.remove('hidden');
        });
    });

</script>
