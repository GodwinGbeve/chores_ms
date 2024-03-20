<?php
// Include the get_all_assignment_action.php file
include '../actions/get_all_assignment_action.php';

// Execute necessary functions and assign the output to variables
$allAssignments = getAllAssignments();
$assignmentsInProgress = getAssignmentsInProgress();
$incompleteAssignments = getIncompleteAssignments();
$completedAssignments = getCompletedAssignments();
$recentAssignments = getRecentAssignments();

?>
