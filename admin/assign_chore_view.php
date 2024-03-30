<?php

// Include core.php for session management
include_once ('../settings/core.php');
checkLogin();
include ('../functions/username_fxn.php');
include "../functions/getChoreStatus_fxn.php";
// Include the file to fetch assignment data
include "../functions/get_all_assignment_fxn.php";
include "../actions/get_all_chores_actions.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Assign Chore Form</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/assign_chore.css" rel="stylesheet">
    <link href="../css/control_view.css" rel="stylesheet">
    <link href="../css/edit_chore_assignment.css" rel="stylesheet">
    <link href="../css/edit_chore.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../view/home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <?php
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userName = getUserName($userId, $con);
            
            echo '<div class="user-name">' . $userName . '</div>';
        } else {
            echo "Error: User ID not set in session";
        }
        ?>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link dashboard-link" href="../view/home.php">
                    <i class="fas fa-fw fa-tachometer-alt "></i>
                    <span class>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="../admin/assign_chore_view.php" onclick="loadContent('assign_chore.php')">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Assign Chore</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../admin/chore_control_view.php"
                    onclick="loadContent('../admin/chore_control_view.php')">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Chore </span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="../login/login.php" onclick="logout()">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->

            <?php
            if (isset($_SESSION['role_id'])) {
                $rid = $_SESSION['role_id'];
                if ($rid == 1 || $rid == 2) {
            ?>
            <a><button id="assignChoreButton">Assign a Chore</button></a>
            <?php
                }
            }
            ?>

            <div id="assignChorePopup" class="popup" style="display: none;">
                <button id="closePopupBtn" class="close-btn">&times;</button>
                <!-- <h1>Assign Chore Form</h1> -->
                <form action="../actions/assign_a_chore_action.php" method="POST" name="assignChoreForm"
                    id="assignChoreForm">
                    <div>
                        <label for="assignPerson">Assign Person:</label>

                        <select class="form-control" name="assignPerson" id="assignPerson" required>
                            <option value="">Select Person</option>
                            <?php
                            include '../functions/select_people.php';

                            if (isset ($peopleFirstNames) && !empty ($peopleFirstNames)) {
                                foreach ($peopleFirstNames as $firstName) {
                                    echo '<option value="' . $firstName['fid'] . '">' . $firstName['fname'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No people found.</option>';
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="assignChore">Assign Chore:</label>
                        <select name="assignChore" id="assignChore" class="form-control" required>
                            <option value="">Select Chore</option>
                            <?php
                            $chores = getAllChores();
                            if (isset ($chores) && !empty ($chores)) {
                                foreach ($chores as $chore) {
                                    echo '<option value="' . $chore['cid'] . '">' . $chore['chorename'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Chore roles data not available.</option>';
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="dueDate">Due Date:</label>
                        <input type="date" name="dueDate" id="dueDate" required>
                    </div>
                    <button type="submit" name="submit" id="submit">Assign Chore</button>
                </form>
            </div>
            <!-- End of Content Wrapper -->
            <!-- Edit Assignment Modal -->

            
           
            <div id="editAssignmentPopup" class="popup" style="display: none;">
            <div><h2 style="color: white;">Edit Assignment</h2></div>
    <button id="closeEditPopupBtn" class="close-btn">&times;</button>
    <form action="../actions/update_status_action.php" method="POST" name="editAssignmentForm" id="editAssignmentForm">
        <input type="hidden" name="assignmentId" id="editAssignmentId">
       <div>
            <label for="editDateDue">Date Due:</label>
            <input type="date" name="dateDue" id="editDateDue" required>
        </div>
        <div>
            


<label for="editChoreStatus">Chore Status:</label>
<select name="choreStatus" id="editChoreStatus" required>
    <?php foreach ($statusOptions as $sid => $sname): ?>
        <option value="<?php echo $sid; ?>"><?php echo $sname; ?></option>
    <?php endforeach; ?>
</select>
        </div>
        <button type="submit" name="submit">Update</button>
    </form>
</div>

<div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Chore Assignments</h1>
            </div>
                    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="1000%" cellspacing="10%">
                        <thead>
    <tr>
        <th style="background-color:#017cff; color: white;">Chore Name</th>
        <th style="background-color: #017cff; color: white;">Assigned By</th>
        <th style="background-color: #017cff; color: white;">Date Assigned</th>
        <th style="background-color: #017cff; color: white;">Date Due</th>
        <th style="background-color: #017cff; color: white;">Chore Status</th>
        <?php
        // Check if the role ID is not 3, then render the Actions column
        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 3) {
            echo '<th style="background-color: #017cff; color: white;">Actions</th>';
        }
        ?>
    </tr>
</thead>
<tbody>
    <?php
    if (!empty($data)) {
        foreach ($data as $assignment) {
            echo '<tr>';
            echo '<td>' . $assignment['ChoreName'] . '</td>';
            echo '<td>' . $assignment['AssignedBy'] . '</td>';
            echo '<td>' . $assignment['DateAssigned'] . '</td>';
            echo '<td>' . $assignment['DateDue'] . '</td>';
            echo '<td>' . $assignment['ChoreStatus'] . '</td>';
            // Check if the role ID is not 3, then render the Actions column
            if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 3) {
                echo '<td>';
                // Check if the role ID is 1, render both delete and edit buttons
                if ($_SESSION['role_id'] == 1) {
                    echo '<a href="../actions/delete_assignment_action.php?id=' . $assignment['assignmentid'] . '"><i class="fas fa-trash-alt" style="color: red;"></i></a> ' .
                        '<a href="#" class="edit-btn" data-assignmentid="' . $assignment['assignmentid'] . '"><i class="fas fa-edit" style="color: #017cff;"></i></a>';
                }
                // Check if the role ID is 2, render only the edit button
                elseif ($_SESSION['role_id'] == 2) {
                    echo '<a href="#" class="edit-btn" data-assignmentid="' . $assignment['assignmentid'] . '"><i class="fas fa-edit" style="color: #017cff;"></i></a>';
                }
                echo '</td>';
            }
            echo '</tr>';
        }
    } else {
        // No assignments found
        echo '<tr><td colspan="5">No assignments found.</td></tr>';
    }
    ?>
</tbody>




                        </table>


                    </div>
                <!-- End of Page Wrapper -->
                </div>
                
                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>
                <!-- Your custom scripts -->
                <script src="../js/dashboard.js"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.edit-btn');
    var editPopup = document.getElementById('editAssignmentPopup');
    var closeEditPopupBtn = document.getElementById('closeEditPopupBtn');
    var editAssignmentIdInput = document.getElementById('editAssignmentId');
    var editChoreNameInput = document.getElementById('editChoreName');
    var editAssignedByInput = document.getElementById('editAssignedBy');
    var editDateAssignedInput = document.getElementById('editDateAssigned');

    // Loop through each edit button
    editButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var assignmentId = button.getAttribute('data-assignmentid');
            editAssignmentIdInput.value = assignmentId;
            editPopup.style.display = 'block';

            // Fetch assignment details using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        editChoreNameInput.value = response.choreName;
                        editAssignedByInput.value = response.assignedBy;
                        editDateAssignedInput.value = response.dateAssigned;
                        document.getElementById('editDateDue').value = response.dateDue;
                        document.getElementById('editChoreStatus').value = response.choreStatus;
                        editPopup.style.display = 'block';
                    } else {
                        console.error('Error fetching assignment details');
                    }
                }
            };
            xhr.open('GET', '../actions/get_assignment_details.php?id=' + assignmentId, true);
            xhr.send();
        });
    });

    // Close the edit popup when the close button is clicked
    closeEditPopupBtn.addEventListener('click', function () {
        editPopup.style.display = 'none';
    });
});

                </script>




                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var assignChoreButton = document.getElementById('assignChoreButton');
                        var assignChorePopup = document.getElementById('assignChorePopup');

                        assignChoreButton.addEventListener('click', function () {
                            assignChorePopup.style.display = 'block';

                            var closeButton = document.getElementById('closePopupBtn');
                            closeButton.addEventListener('click', function () {
                                document.getElementById('assignChorePopup').style.display = 'none';
                            });
                        });
                    });
                </script>


                <script>
                    function validateForm() {
                        // Retrieve form inputs
                        var assignPerson = document.getElementById('assignPerson').value;
                        var assignChore = document.getElementById('assignChore').value;
                        var dueDate = document.getElementById('dueDate').value;

                        // Check if any field is empty
                        if (assignPerson === '' || assignChore === '' || dueDate === '') {
                            alert('All fields are required');
                            return false;
                        }

                        // Check if the due date is in the future
                        var today = new Date();
                        var selectedDate = new Date(dueDate);
                        if (selectedDate <= today) {
                            alert('Due date must be in the future');
                            return false;
                        }

                        // If all validations pass, return true
                        return true;
                    }
                </script>
</body>

</html>