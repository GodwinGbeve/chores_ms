<?php
// Define the function to generate table rows
function generateTableRows($chores)
{
    if (is_array($chores) && !empty($chores)) {
        foreach ($chores as $chore) {
            echo "<tr data-chore-id='{$chore['cid']}'>";
            echo "<td class='chore-name'>{$chore['chorename']}</td>";
            echo "<td>";
            echo '<a class="edit-chore-button" " style="color: #017cff;"> <i class="fas fa-edit" ></i> </a>';
            echo '<a class="icon-link" href="../functions/delete_chore_action.php?id=' . $chore['cid'] . '"  " style="color: red;"><i class="fas fa-trash-alt" title="Delete"></i></a>';
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan=\"3\">No chores found.</td></tr>";
    }
}

?>