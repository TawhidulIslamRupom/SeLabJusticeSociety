<?php

session_start();
require_once("../dbconnection.php");
if (!isset($_SESSION['user']) || !strcmp($_SESSION['user'], "client") == 0) {
    header("Location:../index.php");
}


$email = $_SESSION['email'];
$query = "select * from clients where email='" . $email . "';";
$result = $conn->query($query);
$name = "";
$password = "";
$phonenumber = "";
$picture = "";
$joindate = "";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $name = $row['name'];
        $password = $row['password'];
        $phonenumber = $row['phonenumber'];
        $picture = $row['picture'];

        $joindate = $row['joindate'];
    }
}

?>


<!doctype html>


<head>
    <meta charset="utf-8">

    <!--For responsive	-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">

    <!--Style CSS	-->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .sb-search {
            position: relative;
            border-radius: 10px;
            width: 0%;
            min-width: 50px;
            height: 50px;
            float: right;
            overflow: hidden;
            -webkit-transition: width 0.3s;
            -moz-transition: width 0.3s;
            transition: width 0.5s;
            -webkit-backface-visibility: hidden;
        }body{margin-top: 0px;}

        .bborder {
            opacity: 1;
        }

        .noborder {
            opacity: 0;
        }

        .sb-search-input {
            position: absolute;
            top: 0;
            right: 0px;
            border: none;
            outline: none;
            width: 300px;
            height: 50px;
            margin: 0;
            z-index: 10;
            padding: 20px 65px 20px 20px;
            font-family: inherit;
            font-size: 20px;
            color: #2c3e50;
        }

        input[type="search"].sb-search-input {
            -webkit-appearance: none;
            -webkit-border-radius: 0px;
            border: 1px black solid;
        }

        .sb-search-input::-webkit-input-placeholder {
            color: #fff;
        }

        .sb-search-input:-moz-placeholder {
            color: #fff;
        }

        .sb-search-input::-moz-placeholder {
            color: #fff;
        }

        .sb-search-input:-ms-input-placeholder {
            color: #fff;
        }

        .sb-icon-search,
        .sb-search-submit {
            width: 60px;
            height: 60px;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
            padding: 0;
            margin: 0;
            line-height: 60px;
            text-align: center;
            cursor: pointer;
        }

        .sb-search-submit {
            background: #fff;
            /* IE needs this */
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            /* IE 8 */
            filter: alpha(opacity=0);
            /* IE 5-7 */
            opacity: 0;
            color: transparent;
            border: none;
            outline: none;
            z-index: -1;
        }

        .sb-icon-search {
            color: black;
            background: #fff;
            width: 35px;
            height: 0px;
            z-index: 90;
            margin: -5px;
            top: 1px;
            right: 6px;
            font-size: 22px;
            font-family: 'icomoon';

            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            -webkit-font-smoothing: antialiased;
        }

        .sb-icon-search:before {
            content: "";
        }

        .sb-search.sb-search-open,
        .no-js .sb-search {
            width: 300px;
        }

        .sb-search.sb-search-open .sb-icon-search,
        .no-js .sb-search .sb-icon-search {
            background: #fff;
            color: black;
            z-index: 11;
        }
    </style>

</head>

<body>



    <!-- Start Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-contact">
                        <ul>
                            <li><a href="tel:+62 800 9000 123"> <i class="fa fa-phone"></i> +880 1632 11 4251</a> </li>
                            <li><a href="mailto:mail@yoursite.com"> <i class="fa fa-envelope"></i> admin@justicesociety.com</a> </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="top-right-info">
                        <ul class="top-social">
                            <li><a href=""><i class="fa fa-facebook"></i></a> </li>
                            <li><a href=""><i class="fa fa-instagram"></i></a> </li>
                            <li><a href=""><i class="fa fa-twitter"></i></a> </li>
                            <li><a href=""><i class="fa fa-pinterest"></i></a> </li>
                        </ul>

                        <a href="lawyers.php?#lawyers" class="btn btn-primary">book an lawyer</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Top Header -->


    <!--Start Header	-->
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="../images/Home Logo.png" alt="" class="position-absolute top-0 start-0" height='150px' width='150px'></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?#about-section-id">ABOUT US</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?#services-section-id">SERVICES</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?#contact-us-id">CONTACT</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="lawyers.php?#lawyers">Lawyers</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="appointments.php?#appointment-profile-id">Appoinments</a>
                            </li>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $name ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="editprofile.php?#edit-profile-section"> <i class="fa fa-edit"></i> Edit Profile</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="logout.php"> <i class="	fa fa-unlock-alt"></i> Log-Out</a></li>


                                </ul>
                            </div>

                            <li class="nav-item dropdown">
                                <div id="sb-search" class="sb-search ">
                                    <form role="search" action="lawyers.php?#lawyers" method="get">
                                        <input class="sb-search-input qutu noborder" onkeyup="buttonUp();" onblur="monkey();" type="search" name="search" id="search">
                                        <input class="sb-search-submit" type="submit" value="">
                                        <span class="sb-icon-search text-danger"><i class="fa fa-search"></i></span>
                                    </form>
                                </div>
                            </li>






                        </ul>

                    </div>
                </div>
            </nav>
        </div>


    </header>
    <!--End Header	-->




    <!--Start Banner Section	-->
    <section class="banner-section" style="background: url(../images/banner-bg.jpg) no-repeat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text">
                        <h1>Welcome to Justice Society</h1>
                        <p>Law is a set of rules that are created and are enforceable by social or governmental institutions to regulate behavior.</p>
                        <div class="btn-main">
                            <a href="index.php?#team-section-id" class="btn btn-primary">Read More</a>
                            <a href="index.php?#quote-section-id" class="btn btn-outline-light">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Baner Section	-->





    <!--searchig js-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        function buttonUp() {
            var valux = $('.sb-search-input').val();
            valux = $.trim(valux).length;
            if (valux !== 0) {
                $('.sb-search-submit').css('z-index', '99');
            } else {
                $('.sb-search-input').val('');
                $('.sb-search-submit').css('z-index', '-999');
            }
        }

        $(document).ready(function() {
            var submitIcon = $('.sb-icon-search');
            var submitInput = $('.sb-search-input');
            var searchBox = $('.sb-search');
            var qutu = $('.qutu');
            var isOpen = false;

            $(document).mouseup(function() {
                if (isOpen == true) {
                    submitInput.val('');
                    $('.sb-search-submit').css('z-index', '-999');
                    submitIcon.click();
                }
            });

            submitIcon.mouseup(function() {
                return false;
            });

            searchBox.mouseup(function() {
                return false;
            });

            submitIcon.click(function() {
                if (isOpen == false) {
                    searchBox.addClass('sb-search-open');
                    qutu.removeClass('noborder');
                    qutu.addClass('bborder');
                    searchBox.find('i.fa').removeClass('fa-search');
                    searchBox.find('i.fa').addClass('fa-times');
                    isOpen = true;
                } else {
                    searchBox.removeClass('sb-search-open');
                    qutu.removeClass('bborder');
                    qutu.addClass('noborder');
                    searchBox.find('i.fa').removeClass('fa-times');
                    searchBox.find('i.fa').addClass('fa-search');
                    isOpen = false;
                }
            });

        });
    </script>