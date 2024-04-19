<?php include 'header.php' ?>

<?php $id = "" ?>
<div class="container" id="details">


    <div class="row justify-content-center mb-5">

        <div class="col-md-12 text-center">
            <div class="section-title-main">
                <h2 class="section-title">Our Lawyers</h2>
            </div>
        </div>

        <?php

        $email = $_GET['email'];
        $query = "select * from lawyers where email='" . $email . "';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $id =  $row['email'];

                $email = $row['email'];
                $name = $row['name'];
                $categoryid = $row['categoryid'];
                $phonenumber = $row['phonenumber'];
                $picture = $row['picture'];
                $location = $row['location'];
                $rate = $row['rate'];
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
                                <br><li><a href="#"class= "text-decoration-none"><i class="fas fa-dollar display-25 me-3 text-secondary"></i></i><?php echo $rate ?></a></li>
                            </ul>
                            <ul class="top-social">

                                <?php
                                $query1 = "select * from socialmedia where email='" . $email . "';";
                                $result1 = $conn->query($query1);

                                $facebook = "";
                                $instagram = "";
                                $twitter = "";
                                $whatsapp = "";
                                if ($result1->num_rows > 0) {

                                    while ($row1 = $result1->fetch_assoc()) {
                                        $facebook = $row1['facebook'];
                                        $instagram = $row1['instagram'];
                                        $twitter = $row1['twitter'];
                                        $whatsapp = $row1['whatsapp'];
                                    }
                                }

                                if($facebook!=""){

                                    ?>

                                    <li><a target=”_blank” href="https://web.facebook.com/<?php echo $facebook ?>" class="rounded-3"><i class="fab fa-facebook-f"></i></a></li> <?php } if($instagram!=""){ ?>  
                                    <li><a target=”_blank” href="https://www.instagram.com/<?php echo $instagram ?>" class="rounded-3"><i class="fab fa-instagram"></i></a></li> <?php } if($twitter!=""){ ?> 
                                    <li><a target=”_blank” href="https://twitter.com/<?php echo $twitter ?>" class="rounded-3"><i class="fab fa-twitter"></i></a></li> <?php } if($whatsapp!=""){ ?> 
                                    <li><a target=”_blank” href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>" class="rounded-3"><i class="fab fa-whatsapp"></i></a></li> <?php }?> 
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

<div class="container  mb-5">
    <div class="col-md-12 text-center">
        <form method="get" action="hireme.php?#hireme">
    <input type="hidden" name ="id" value="<?php echo $id?>" >
  <button type="submit" class="btn btn-primary">Hire Me</button>
</form>
    </div>
</div>

<?php include 'footer.php' ?>