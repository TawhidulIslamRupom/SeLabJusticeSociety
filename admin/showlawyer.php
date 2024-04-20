<?php include 'topbar.php' ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
 

<div class="container" id="details">


    <div class="row justify-content-center mb-5">

        <div class="col-md-12 text-center">
            <div class="section-title-main">
            </div>
        </div>

        <?php

        $email = $_GET['email'];
        $query = "select * from lawyers where email='" . $email . "';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $email = $row['email'];
                $name = $row['name'];
                $categoryid = $row['categoryid'];
                $phonenumber = $row['phonenumber'];
                $picture = $row['picture'];
                $location = $row['location'];
                $description = $row['description'];
                $query1 = "select * from lawyercategories where id=" . $categoryid . ";";
                $result1 = $conn->query($query1);
                $category = "";
                if ($result1->num_rows > 0) {

                    while ($row1 = $result1->fetch_assoc()) {
                        $category = $row1['category'];
                    }
                }


        ?>
                <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                    <div class="card border-0 shadow">
                        <img src="../lawyer/images/<?php echo $picture ?>" alt="image">
                        <div class="card-body p-1-9 p-xl-5">
                            <div class="mb-4">
                                <h3 class="h4 mb-0"><?php echo $name ?></h3>
                                <span class="text-primary"><?php echo $category ?></span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3"><a href="#"><i class="far fa-envelope display-25 me-3 text-secondary"></i><?php echo $email ?></a></li>
                                <li class="mb-3"><a href="#"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i><?php echo $phonenumber ?></a></li>
                                <li><a href="#"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i><?php echo $location ?></a></li>
                            </ul>
                            <ul class="top-social">
                                <li><a href="#!" class="rounded-3"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!" class="rounded-3"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!" class="rounded-3"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!" class="rounded-3"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ps-lg-1-6 ps-xl-5">
                        <div class="mb-5 wow fadeIn">
                            <div class="text-start mb-1-6 wow fadeIn">
                                <h2 class="h1 mb-5 text-primary">Description</h2>
                            </div>
                            <p><?php echo $description ?></p>
                        </div>

                    </div>
                </div>
    </div>

<?php
            }
        }
?>
</div>



<?php include 'footer.php' ?><script>
    $("#appointments").addClass("active");
</script>