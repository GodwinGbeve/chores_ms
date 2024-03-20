<?php

// Include core.php for session management
include_once('../settings/core.php');
checkLogin();

// Include the file to fetch assignment data
include "../functions/get_all_assignment_fxn.php";
include "../actions/get_all_chores_actions.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Chore Form</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/assign_chore.css" rel="stylesheet">
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
                <div class="sidebar-brand-text mx-3">Admin </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../view/home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
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


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../view/chore_manage.php" onclick="loadContent('chore_manage.php')">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Chore Management</span></a>
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
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->


        <a><button id="assignChoreButton">Assign a Chore</button></a>

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
           
    if (isset($peopleFirstNames) && !empty($peopleFirstNames)) {
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
                        if (isset($chores) && !empty($chores)) {
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

        <div>
            <h2>Chore Assignments</h2>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="1000%" cellspacing="10%">
                        <thead>
                            <tr>
                            <tr>
                        <th style="background-color:#017cff; color: white;">Chore Name</th>
                        <th style="background-color: #017cff; color: white;">Assigned By</th>
                        <th style="background-color: #017cff; color: white;">Date Assigned</th>
                        <th style="background-color: #017cff; color: white;">Date Due</th>
                        <th style="background-color: #017cff; color: white;">Chore Status</th>
                        <th style="background-color: #017cff; color: white;">Actions</th>
                    </tr>
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
                                    // Add action items to the display (delete and status icons)
                                    echo '<td><a href="../actions/delete_assignment_action.php?id=' . $assignment['assignmentid'] . '"><i class="fas fa-trash-alt" style="color: red;"></i></a> ' .
                                    '<a href="update_status.php?id=' . $assignment['assignmentid'] . '"><i class="fas fa-edit"   style="color: #017cff;" ></i></a></td>';                                                                 
                                    echo '</tr>';
                                }
                            } else {
                                // No assignments found
                                echo '<tr><td colspan="7">No assignments found.</td></tr>';
                            }
                            ?>
                        </tbody>



                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Wrapper -->
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