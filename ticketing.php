<?php 
require_once('includes/load.php');
include('layouts/header.php');

// Fetch all tickets (Approved, Rejected, and Pending)
$tickets = $db->query("SELECT * FROM tickets WHERE status IN ('Approved', 'Rejected', 'Pending') ORDER BY date_submitted DESC, time_submitted DESC");

// Fetch departments with ticket count
$departments = $db->query("SELECT department, COUNT(*) as count FROM tickets WHERE status IN ('Approved', 'Rejected', 'Pending') GROUP BY department");

?>

<script>
function filterTickets(department) {
    let rows = document.querySelectorAll(".ticket-row");
    let totalTickets = 0;

    rows.forEach(row => {
        let dept = row.dataset.department;
        if (department === "All" || dept === department) {
            row.style.display = "";
            totalTickets++;
        } else {
            row.style.display = "none";
        }
    });

    // Update total count display
    document.getElementById("totalTickets").innerText = totalTickets;
    document.getElementById("totalDepartments").innerText = totalTickets; 
}
</script>

<div style="display: flex;">
    <!-- Departments Sidebar -->
    <div class="container" style="border: 2px solid; border-radius: 8px; max-width: 400px; height: 400px; padding: 10px; position: absolute; left: 100px; font-family: Arial, sans-serif;">
        <div class="header" style="display: flex; justify-content: space-between; align-items: center; background: #2c3e50; color: white; padding: 10px; border-radius: 5px; font-weight: bold; font-size: 20px;">
            <span>Departments</span>
            <a href="#" class="filter-btn" style="text-decoration: none; font-size: 12px; color: white;"><u>Filter</u></a>
        </div>
        <ul class="departments" style="list-style-type: none; padding: 0; margin: 40px 0; font-size: 20px;">
            <li onclick="filterTickets('All')" style="display: flex; justify-content: space-between; padding: 5px 10px; border-bottom: 1px solid #ccc; cursor: pointer;">
                <span>All Departments</span> <span><?= $db->num_rows($tickets); ?></span>
            </li>
            <?php 
            $totalDepartmentsCount = 0;
            while ($dept = $db->fetch_assoc($departments)) : 
                $totalDepartmentsCount += $dept['count'];
            ?>
                <li onclick="filterTickets('<?= $dept['department']; ?>')" style="display: flex; justify-content: space-between; padding: 5px 10px; border-bottom: 1px solid #ccc; cursor: pointer;">
                    <span><?= $dept['department']; ?></span> <span><?= $dept['count']; ?></span>
                </li>
            <?php endwhile; ?>
        </ul>

    </div>

    <!-- Tickets Table -->
    <div class="table-container" style="border: 2px solid; border-radius: 10px; width: 1100px; height: 520px; padding: 10px; font-family: Arial, sans-serif; margin-left: 300px; overflow-y: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Name</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Position</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Department</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Priority</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Description</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Status</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Date</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Time</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                $totalTickets = 0;
                while ($ticket = $db->fetch_assoc($tickets)) : 
                    $totalTickets++;
                ?>
                    <tr class="ticket-row" data-department="<?= $ticket['department']; ?>">
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['name']; ?></td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['position']; ?></td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['department']; ?></td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd; font-weight: bold; color: <?= ($ticket['priority'] == 'High' ? 'red' : ($ticket['priority'] == 'Medium' ? 'orange' : 'green')); ?>;">
                            <?= $ticket['priority']; ?>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['issue_description']; ?></td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd; color: <?= 
                            ($ticket['status'] == 'Approved' ? 'green' : 
                            ($ticket['status'] == 'Pending' ? 'orange' : 'red')); ?>;">
                            <?= $ticket['status']; ?>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['date_submitted']; ?></td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $ticket['time_submitted']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</div>


<!-- Additional Styling -->
<style>
    /* Alternate row colors */
    .ticket-row:nth-child(even) {
        background-color: #f9f9f9;
    }
    .ticket-row:nth-child(odd) {
        background-color: #ffffff;
    }
    /* Hover effect */
    .ticket-row:hover {
        background-color: #d3e3fc !important;
        transition: background-color 0.3s ease;
    }
</style>


<?php include_once('layouts/footer.php'); ?>
