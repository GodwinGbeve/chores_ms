<?php
include "../functions/select_role.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin- Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="../actions/register_user.php" method="post"
                                name="registrationForm" id="registrationForm">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                            placeholder="First Name" name="firstName" required>
                                        <div class="container" id="firstName-error"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName"
                                            placeholder="Last Name" name="lastName" required>
                                        <div class="container" id="lastName-error"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="InputEmail"
                                        placeholder="Email Address" name="email" required>
                                    <div class="container" id="email-error"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="InputPassword"
                                            placeholder="Password" name="password" required>
                                        <div class="container" id="password-error"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="RepeatPassword" placeholder="Repeat Password" name="repeatPassword"
                                            required>
                                        <div class="container" id="repeat-password-error"></div>
                                    </div>
                                </div>

                                <!-- Additional Form Elements -->
                                <label for="gender">Gender:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="0"
                                        required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="1"
                                        required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <div class="form-group">
                                    <label for="familyRole">Family Role:</label>
                                    <?php
                                    if (isset($rows) && !empty($rows)) {
                                        echo '<select class="form-control" name="familyRole" id="familyRole" required>';
                                        echo '<option value="0">Select</option>';
                                        foreach ($rows as $row) {
                                            echo '<option value="' . $row['fid'] . '">' . $row['fam_name'] . '</option>';
                                        }
                                        echo '</select>';
                                    } else {
                                        echo 'Family roles data not available.';
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control form-control-user" id="dob" name="dob"
                                        required>
                                    <div class="container" id="dob-error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control form-control-user" id="phone"
                                        placeholder="Phone Number" name="phone" required>
                                    <div class="container" id="phone-error"></div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block"
                                    id="registerButton">Register Account</button>
                                <hr>
                           
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        function isEmpty(str) {
            return !str.trim().length;
        }


        $("#FirstName").on('keyup', () => {
            const regex = /^[a-zA-Z ]+$/;
            const firstName = $("#FirstName").val();

            if (isEmpty(firstName)) {
                $("#firstName-error").html(`<p style="color: red;">First name cannot be empty</p>`)
            } else if (!regex.test(firstName)) {
                $("#firstName-error").html(`<p style="color: red;">Invalid First name</p>`)
            } else {
                $("#firstName-error").html(``)
            }
        });


        // Last Name Validation
        $("#LastName").on('keyup', () => {
            const regex = /^[a-zA-Z ]+$/;
            const lastName = $("#LastName").val();

            if (isEmpty(lastName)) {
                $("#lastName-error").html(`<p style="color: red;">Last name cannot be empty</p>`)
            } else if (!regex.test(lastName)) {
                $("#lastName-error").html(`<p style="color: red;">Invalid First name</p>`)
            } else {
                $("#lastName-error").html(``)
            }
        });

        // Email Validation
        $("#InputEmail").on('keyup', () => {
            const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            const email = $("#InputEmail").val();

            if (regex.test(email)) {
                $("#email-error").html(``)
            } else {
                $("#email-error").html(`<p style="color: red;">Invalid email</p>`)
            }
        });

        // Password Validation
        $("#InputPassword").on('keyup', () => {
            const password = $("#InputPassword").val();

            if (password.length < 8) {
                $("#password-error").html(`<p style="color: red;">Password must be at least 8 characters long</p>`)
            } else {
                $("#password-error").html(``)
            }
        });

        // Repeat Password Validation
        $("#RepeatPassword").on('keyup', () => {
            const repeatPassword = $("#RepeatPassword").val();
            const password = $("#InputPassword").val();

            if (repeatPassword !== password) {
                $("#repeat-password-error").html(`<p style="color: red;">Passwords do not match</p>`)
            } else {
                $("#repeat-password-error").html(``)
            }
        });

        // Phone Number Validation
        $("#phone").on('keyup', () => {
            const phone = $("#phone").val();
            const phoneRegex = /^[\d+-]{10}$/;

            if (isEmpty(phone)) {
                $("#phone-error").html(`<p style="color: red;">Phone number cannot be empty</p>`);
            } else if (!phoneRegex.test(phone)) {
                $("#phone-error").html(`<p style="color: red;">Invalid phone number format</p>`);
            } else {
                $("#phone-error").html(``);
            }
        });


        // Date of Birth Validation
        $("#dob").on('change', () => {
            const dob = $("#dob").val();

            if (isEmpty(dob)) {
                $("#dob-error").html(`<p style="color: red;">Date of birth must be selected</p>`)
            } else {
                $("#dob-error").html(``)
            }
        });

        // Gender Validation
        $("input[name='gender']").on('change', () => {
            const selectedGender = $("input[name='gender']:checked").val();

            if (!selectedGender) {
                $("#gender-error").html(`<p style="color: red;">Gender must be selected</p>`)
            } else {
                $("#gender-error").html(``)
            }
        });

        // Register Button Validation
        $("#registerButton").on('click', () => {
            const firstName = $("#FirstName").val();
            const lastName = $("#LastName").val();
            const email = $("#InputEmail").val();
            const password = $("#InputPassword").val();
            const repeatPassword = $("#RepeatPassword").val();
            const phone = $("#phone").val();
            const dob = $("#dob").val();
            const selectedGender = $("input[name='gender']:checked").val();


        });
    </script>


</body>

</html>