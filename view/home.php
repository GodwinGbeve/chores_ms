<?php
include ('../settings/core.php');
include ('../functions/username_fxn.php');
checkLogin();

include ('../functions/home_fxn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/add_chore.css" rel="stylesheet">
    <link href="../css/control_view.css" rel="stylesheet">

    <style>
        /* Custom CSS to completely remove borders from the table */
        table.table,
        table.table th,
        table.table td {
            border-collapse: collapse;
            border: none;

        }

        .green-tick {
            color: green;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="user-info">
        <?php
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userName = getUserName($userId, $con);
            
            echo '<div class="user-name">' . $userName . '</div>';
        } else {
            echo "Error: User ID not set in session";
        }
        ?>
    </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

        
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item">
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
            <hr class="sidebar-divider">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="../login/login.php" onclick="logout()">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Display Statistics Cards -->
                    <?php
                    if (isset($_SESSION['role_id'])) {
                        $rid = $_SESSION['role_id'];
                        if ($rid == 1 || $rid == 2) {
                            ?>
                            <!-- All Chores -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- Statistics for All Chores -->
                                        <!-- Retrieve the count of all chores -->
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    All Chores
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    // Retrieve the count of all chores
                                                    if ($allAssignments != null) {
                                                        $allChoresCount = count($allAssignments);
                                                    } else {
                                                        $allChoresCount = 0;
                                                    }
                                                    echo $allChoresCount;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <!-- In Progress -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">

                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            In Progress</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            // Retrieve the count of chores in progress
                                            $inProgressChoresCount = count($assignmentsInProgress);
                                            echo $inProgressChoresCount;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-cogs fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Incomplete -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Incomplete</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            // Retrieve the count of incomplete chores
                                            $incompleteChoresCount = count($incompleteAssignments);
                                            echo $incompleteChoresCount;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Completed</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            // Retrieve the count of completed chores
                                            $completedChoresCount = count($completedAssignments);
                                            echo $completedChoresCount;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recently Completed Chores</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Chore Name <i class="fas fa-tasks"></i></th>
                                        <th>Assigned To <i class="fas fa-user"></i></th>
                                        <th>Date Assigned <i class="far fa-calendar-alt"></i></th>
                                        <th>Date Completed <i class="far fa-calendar-check"></i></th>
                                        <th><a href="../admin/assign_chore_view.php">View Assigned Chores <i
                                                    class="fas fa-eye"></i></a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // Fetch recently completed chores from the database using $recentAssignments variable
                                    
                                    // Loop through the $recentAssignments array to display each chore
                                    if ($recentAssignments != null) {
                                        foreach ($recentAssignments as $assignment) {
                                            echo '<tr>';
                                            echo '<td>' . $assignment['ChoreName'] . '</td>';
                                            echo '<td>' . $assignment['AssignedTo'] . '</td>';
                                            echo '<td>' . $assignment['DateAssigned'] . '</td>';
                                            echo '<td>' . $assignment['DateDue'] . '</td>';
                                            echo '<td><a href="../admin/chore_control_view.php">Chore details</a></td>';
                                            echo '</tr>';
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <!-- Your custom scripts -->

    <script src="../js/dashboard.js"></script>

</body>
</body>

</html>