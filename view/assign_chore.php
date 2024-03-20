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
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="assign_chore.php" onclick="loadContent('assign_chore.php')">
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
        <div id="content-wrapper" class="d-flex flex-column">
            <h1>Assign Chore Form</h1>
            <form action="#" method="POST" name="assignChoreForm" id="assignChoreForm">
                <div>
                    <label for="assignPerson">Assign Person:</label>
                    <select name="assignPerson" id="assignPerson" required>
                        <option value="">Select Person</option>
                        <option value="person1">Father</option>
                        <option value="person2">Mother</option>
                        <option value="person3">Children</option>
                    </select>
                </div>
                <div>
                    <label for="assignChore">Assign Chore:</label>
                    <select name="assignChore" id="assignChore" required>
                        <option value="">Select Chore</option>
                        <option value="chore1">Chore 1</option>
                        <option value="chore2">Chore 2</option>
                        <option value="chore3">Chore 3</option>
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
</body>

</html>