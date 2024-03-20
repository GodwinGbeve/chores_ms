<?php
// Check if the user is logged in
include_once('../settings/core.php');
// Include the file to retrieve a single chore
include_once('../actions/get_a_chore_actions.php');


// Check if the chore ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Retrieve the chore ID from the GET URL
    $chore_id = $_GET['id'];

    // Call the function to get the chore by ID
    $chore = getChoreById($chore_id);

    if ($chore) {
        // Form action points to edit_a_chore_action.php
        echo "<form id='editChoreForm' action='../actions/edit_a_chore_action.php' method='POST' name='editChoreForm'>";
        // Populate the form fields with chore data
        echo "<input type='hidden' name='chore_id' value='{$chore['cid']}'>";
        echo "Chore Name: <input type='text' name='chore_name' value='{$chore['chorename']}'><br>";
        // Add other fields as needed
        echo "<input type='submit' value='Update Chore'>";
        echo "</form>";
    } else {
        echo "Chore not found.";
    }
} else {
    // Chore ID not provided, redirect back to chore control view
    header('Location: ../admin/chore_control_view.php');
    exit();
}
?>