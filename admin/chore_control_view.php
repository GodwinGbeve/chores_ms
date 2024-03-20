<?php
// Include core.php for session management
include_once ('../settings/core.php');

include_once ('../functions/chore_fxn.php');
include_once '../actions/get_all_chores_actions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add chore page</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/add_chore.css" rel="stylesheet">
    <link href="../css/control_view.css" rel="stylesheet">
    <link href="../css/tables.css" rel="stylesheet">
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
                <a class="nav-link" href="../admin/assign_chore_view.php"
                    onclick="loadContent('assign_chore_view.php')">
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


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../login/login.php" onclick="logout()">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- DataTales Example -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <a><button id="addChoreButton">Add Chore</button></a>

            <div id="addChorePopup" class="popup">
                <button id="closePopupBtn" class="close-btn">&times;</button>
                <form id="addChoreForm" action="../actions/add_chore_action.php" method="POST" name="addChoreForm">
                    <label for="choreName">Chore Name:</label><br>
                    <input type="text" id="choreName" name="choreName" pattern="[A-Za-z\s]+"
                        title="Invalid input: Only letters and spaces are allowed." required /><br>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>


            <!-- Edit Chore Popup -->
            <div id="editChorePopup" class="popup" style="display: none;">
                <button id="editclosePopupBtn" class="close-btn">&times;</button>
                <form id="editChoreForm" action="../actions/edit_a_chore_action.php?" method="POST"
                    name="editChoreForm">
                    <label for="editChoreName">Chore Name:</label><br>
                    <input type="text" id="editChoreName" name="choreName" pattern="[A-Za-z\s]+"
                        title="Invalid input: Only letters and spaces are allowed." required /><br>
                    <input type="hidden" id="editChoreId" name="choreId" value="">
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>

            <!-- <Display the list of chores> -->


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chore List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Chore Name:</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            include_once ('../functions/chore_fxn.php');
                            generateTableRows(getAllChores());
                            ?>
                        </table>
                    </div>
                </div>



                <script src="../js/dashboard.js"></script>
                <script src="../js/add-chore.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var editButtons = document.querySelectorAll('.edit-chore-button');
                        editButtons.forEach(function (button) {
                            button.addEventListener('click', function (event) {
                                var row = button.closest('tr');
                                var choreName = row.querySelector('.chore-name').textContent;
                                var choreId = row.getAttribute('data-chore-id');

                                document.getElementById('editChoreName').value = choreName;
                                document.getElementById('editChoreId').value = choreId;

                                document.getElementById('editChorePopup').style.display = 'block';
                                
                                var closeButton = document.getElementById('editclosePopupBtn');
                                console.log("Close button clicked");
                                closeButton.addEventListener('click', function () {
                                     console.log("Close button clicked");
                                    document.getElementById('editChorePopup').style.display = 'none';
                                });

                            });
                        });
                    });
                </script>
</body>

</html>