<?php
// Define the function to generate table rows
function generateTableRows($chores)
{
    if (is_array($chores) && !empty($chores)) {
        echo "<thead>";
        echo "<tr>";
        echo "<th>Chore Name</th>";
        // Check if the role ID is not 3, then render the Actions column
        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 3) {
            echo "<th>Actions</th>";
        }
        echo "</tr>";
        echo "</thead>";

        foreach ($chores as $chore) {
            echo "<tr data-chore-id='{$chore['cid']}'>";
            echo "<td class='chore-name'>{$chore['chorename']}</td>";
            // Check if the role ID is 2, then render the edit button
            if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2) {
                echo "<td>";
                echo '<a class="edit-chore-button" " style="color: #017cff;"> <i class="fas fa-edit" ></i> </a>';
                echo "</td>";
            } elseif (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) { // Check if the role ID is 1
                // Render actions for role ID 1 (superadmin)
                echo "<td>";
                echo '<a class="edit-chore-button" " style="color: #017cff;"> <i class="fas fa-edit" ></i> </a>';
                echo '<a class="icon-link" href="../functions/delete_chore_action.php?id=' . $chore['cid'] . '"  " style="color: red;"><i class="fas fa-trash-alt" title="Delete"></i></a>';
                echo "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan=\"2\">No chores found.</td></tr>";
    }
}
?>
