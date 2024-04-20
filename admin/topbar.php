<?php

session_start();
require_once("../dbconnection.php");
if (!isset($_SESSION['user']) || !strcmp($_SESSION['user'], "admin") == 0) {
    header("Location:../index.php");
}

$email = $_SESSION['email'];
$query = "select * from admin where email='" . $email . "';";
$result = $conn->query($query);
$adminname = "";
$profilepic = "";
$password = "";
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $adminname = $row['name'];
        $profilepic = $row['profilepic'];
        $password = $row['password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <!--For responsive	-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!--Bootstrap CSS	-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <!--Google Font	-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Fontawesome icon	-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />




    <!--OWl carousel	-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">

    <!--Style CSS	-->
    <link rel="stylesheet" href="style.css" type="text/css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <img src="images/<?php echo $profilepic ?>" alt="profile pic" height="80px" width="70px">
            </a>

            <li class="nav-item ">
                <a class="nav-link" href="index.php">

                    <span><?php echo $adminname ?> || admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="home">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Options
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="lawyer">
                <a class="nav-link collapsed" href="lawyer.php">
                    <i class="fa fa-male"></i>
                    <span>Lawyers</span>
                </a>
            </li>

            <li class="nav-item" id="client">
                <a class="nav-link collapsed" href="client.php">
                    <i class="fa fa-handshake-o"></i>
                    <span>Clients</span>
                </a>
            </li>

            <li class="nav-item" id="quotes">
                <a class="nav-link collapsed" href="Quote.php">
                    <i class="fa fa-legal"></i>
                    <span>Quotes</span>
                </a>
            </li>




            <li class="nav-item" id="categories">
                <a class="nav-link collapsed" href="categories.php">
                    <i class="fa fa-group"></i>
                    <span>Categories</span>
                </a>
            </li>
            <?php

            $query = "select * from appoinments where status='unseen';";
            $result = $conn->query($query);
            $totalUnseen = $result->num_rows;


            ?>



            <li class="nav-item" id="appointments">
                <a class="nav-link collapsed" href="appointments.php">
                    <i class="fa fa-file-archive-o"></i>
                    <span>Appointments<sup class="text-danger fs-5">(<?php echo  $totalUnseen ?>)</sup></span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg bg-white">
                    <div class="container-fluid">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            </ul>


                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $adminname ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="editprofile.php"> <i class="fa fa-edit"></i> Edit Profile</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="logout.php"> <i class="fa fa-sign-out"></i> Log-Out</a></li>


                                </ul>
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->