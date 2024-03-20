<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/add_chore.css" rel="stylesheet">

    <style>
        /* Custom CSS to completely remove borders from the table */
        table.table,
        table.table th,
        table.table td {
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
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="../admin/assign_chore_view.php" onclick="loadContent('assign_chore_view.php')">
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
                <a class="nav-link" href="chore_manage.php" onclick="loadContent('chore_manage.php')">
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
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- DataTales Example -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chore List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Chore Name</th>
                                    <th>Assigned By</th>
                                    <th>Date Assigned</th>
                                    <th>Date Due</th>
                                    <th>Chore Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>Chore 1</td>
                                    <td>Admin 1</td>
                                    <td>2011/04/19</td>
                                    <td>2011/04/25</td>
                                    <td>In Progress</td>
                                    <td> <!-- Green Tick icon from Font Awesome -->
                                        <i class="fas fa-check-circle green-tick"></i>
                                        <!-- View icon from Font Awesome -->
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>

                                <tr>

                                    <td>Chore 1</td>
                                    <td>Admin 1</td>
                                    <td>2011/04/19</td>
                                    <td>2011/04/25</td>
                                    <td>In Progress</td>
                                    <td> <!-- Green Tick icon from Font Awesome -->
                                        <i class="fas fa-check-circle green-tick"></i>
                                        <!-- View icon from Font Awesome -->
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Chore 1</td>
                                    <td>Admin 1</td>
                                    <td>2011/04/19</td>
                                    <td>2011/04/25</td>
                                    <td>In Progress</td>
                                    <td> <!-- Green Tick icon from Font Awesome -->
                                        <i class="fas fa-check-circle green-tick"></i>
                                        <!-- View icon from Font Awesome -->
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Chore 1</td>
                                    <td>Admin 1</td>
                                    <td>2011/04/19</td>
                                    <td>2011/04/25</td>
                                    <td>In Progress</td>
                                    <td> <!-- Green Tick icon from Font Awesome -->
                                        <i class="fas fa-check-circle green-tick"></i>
                                        <!-- View icon from Font Awesome -->
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Chore 1</td>
                                    <td>Admin 1</td>
                                    <td>2011/04/19</td>
                                    <td>2011/04/25</td>
                                    <td>In Progress</td>
                                    <td> <!-- Green Tick icon from Font Awesome -->
                                        <i class="fas fa-check-circle green-tick"></i>
                                        <!-- View icon from Font Awesome -->
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <script src="../js/dashboard.js"></script>
        <script src="../js/add-chore.js"></script>
</body>

</html>