<?php
// Include the connection file
include '../settings/connection.php';


function getAllAssignments() {
    global $con;

    // Write the SELECT all assignments query
    $query = "SELECT 
    a.assignmentid,
    c.chorename AS ChoreName,
    CONCAT(p.fname, ' ', p.lname) AS AssignedBy,
    CONCAT(p_assigned.fname, ' ', p_assigned.lname) AS AssignedTo,
    a.date_assign AS DateAssigned,
    a.date_due AS DateDue,
    s.sname AS ChoreStatus
    FROM 
        Assignment a
    INNER JOIN 
        Chores c ON a.cid = c.cid
    INNER JOIN 
        People p ON a.who_assigned = p.pid
    INNER JOIN
        Assigned_people ap ON a.assignmentid = ap.assignmentid
    INNER JOIN
        People p_assigned ON ap.pid = p_assigned.pid
    INNER JOIN
        Status s ON a.sid = s.sid;
    ";

    

    // Execute the query
    $result = mysqli_query($con, $query);
    
    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }
    
    // Check if any record was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch records if successful and assign to variable
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $assignments;
    } else {
        // No records found
        return null;
    }
}

// Call the function to get all assignments
$assignments = getAllAssignments();


// Return the result variable using the Return command
return $assignments;


// Function to get all chore assignments in progress
function getAssignmentsInProgress() {
    global $con;

    // Write the SELECT query for assignments in progress
    $query = "SELECT 
                 
                c.chorename AS ChoreName,
                CONCAT(p.fname, ' ', p.lname) AS AssignedBy,
                a.date_assign AS DateAssigned,
                a.date_due AS DateDue,
                s.sname AS ChoreStatus
            FROM 
                Assignment a
            INNER JOIN 
                Chores c ON a.cid = c.cid
            INNER JOIN 
                People p ON a.who_assigned = p.pid
            INNER JOIN
                Status s ON a.sid = s.sid
            WHERE
                s.sid = 2 AND
                a.date_due > NOW();
    ";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch records if successful and assign to variable
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $assignments;
}

// Function to get all incomplete chore assignments
function getIncompleteAssignments() {
    global $con;

    // Write the SELECT query for incomplete assignments
    $query = "SELECT 
                
                c.chorename AS ChoreName,
                CONCAT(p.fname, ' ', p.lname) AS AssignedBy,
                a.date_assign AS DateAssigned,
                a.date_due AS DateDue,
                s.sname AS ChoreStatus
            FROM 
                Assignment a
            INNER JOIN 
                Chores c ON a.cid = c.cid
            INNER JOIN 
                People p ON a.who_assigned = p.pid
            INNER JOIN
                Status s ON a.sid = s.sid
            WHERE
                s.sid = 4 AND
                a.date_due < NOW();
    ";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch records if successful and assign to variable
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $assignments;
}

// Function to get all completed chore assignments
function getCompletedAssignments() {
    global $con;

    // Write the SELECT query for completed assignments
    $query = "SELECT 
                c.chorename AS ChoreName,
                CONCAT(p.fname, ' ', p.lname) AS AssignedBy,
                a.date_assign AS DateAssigned,
                a.date_due AS DateDue,
                s.sname AS ChoreStatus
            FROM 
                Assignment a
            INNER JOIN 
                Chores c ON a.cid = c.cid
            INNER JOIN 
                People p ON a.who_assigned = p.pid
            INNER JOIN
                Status s ON a.sid = s.sid
            WHERE
                s.sid = 3;
    ";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch records if successful and assign to variable
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $assignments;
}
function getRecentAssignmentsInProgress() {
    global $con;

    // Write the SELECT query for recent assignments in progress
    $query = "SELECT 
                c.chorename AS ChoreName,
                CONCAT(p.fname, ' ', p.lname) AS AssignedBy,
                CONCAT(p_assigned.fname, ' ', p_assigned.lname) AS AssignedTo,
                a.date_assign AS DateAssigned,
                a.date_due AS DateDue,
                s.sname AS ChoreStatus
            FROM 
                Assignment a
            INNER JOIN 
                Chores c ON a.cid = c.cid
            INNER JOIN 
                People p ON a.who_assigned = p.pid
            INNER JOIN
                Assigned_people ap ON a.assignmentid = ap.assignmentid
            INNER JOIN
                People p_assigned ON ap.pid = p_assigned.pid
            INNER JOIN
                Status s ON a.sid = s.sid
            WHERE
                s.sid = 2 AND
                a.date_due > NOW()
            ORDER BY
                a.date_assign DESC
            LIMIT 3;
    ";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch records if successful and assign to variable
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $assignments;
}
