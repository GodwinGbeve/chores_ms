<?php

session_start();

// create a function to check for login using user id session created at login
function checkLogin()
{
    // check if user id session exists
    if (!isset($_SESSION['user_id'])) {
        // if it doesn't exist, redirect to login page
        header("Location: ../login/login.php");
        // stop further execution
        die();
    }
}

// Function to retrieve user's role ID from session
function getUserRole() {
    // Check if the role ID session variable is set
    if (isset($_SESSION['role_id'])) {
        // Return the user's role ID
        return $_SESSION['role_id'];
    } else {
        // Return null or handle the case where role ID is not set
        return null;
    }
}

// Check user's role and control access to pages
function checkAuthorization() {
    // Retrieve user's role ID
    $role_id = getUserRole();


    // Check user's role and control access accordingly
    switch ($role_id) {
        case 1:
            // Super-admin has access to all pages and actions
            break;
        case 2:
            // Admin can have restricted access to certain pages/actions
            // Example: Remove access to delete action
            // You can implement similar logic for other pages/actions
            if ($_SERVER['REQUEST_URI'] == '../functions/delete_chore_action.php') {
                // Redirect or display an error message for restricted access
                header('Location: ../admin/chore_control_view.php');
                exit();
            }
            break;
        case 3:
            // Standard user should not have access to admin pages
            // Redirect them to the main dashboard if they try to access admin pages
            if (strpos($_SERVER['REQUEST_URI'], '..admin/') !== false) {
                // Redirect to the main dashboard or display an error message
                header('Location: ../view/userdashboard.php');
                exit();
            }
            break;
        default:
            // Handle other cases or roles if necessary
            break;
    }
}

checkAuthorization();
?>