<?php include 'header.php' ?>

<section class="lawyers" id="lawyers">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <div class="section-title-main">
                    <h2 class="section-title">Our Lawyers</h2>
                </div>
            </div>


            <?php
            $query = "";
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $q = "select * from lawyercategories WHERE category LIKE '%" . $search . "%'";
                $result1 = $conn->query($q);
                $id = "-1";
                if ($result1->num_rows > 0) {

                    while ($row1 = $result1->fetch_assoc()) {

                        $id = $row1['id'];
                    }
                }



                $query = "select * from lawyers WHERE name LIKE '%" . $search . "%' 
                or rate LIKE '%" . $search . "%' 
                or description LIKE '%" . $search . "%' 
                or phonenumber  LIKE '%" . $search . "%' 
                or location LIKE '%" . $search . "%' 

                or categoryid =" . $id . ";";
            } else {
                $query = "select * from lawyers";
            }

            $result = $conn->query($query);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $email = $row['email'];
                    $name = $row['name'];
                    $categoryid = $row['categoryid'];
                    $picture = $row['picture'];
                    $query1 = "select * from lawyercategories where id=" . $categoryid . ";";
                    $result1 = $conn->query($query1);
                    $category = "";
                    if ($result1->num_rows > 0) {

                        while ($row1 = $result1->fetch_assoc()) {
                            $category = $row1['category'];
                        }
                    }

            ?>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-media">
                                <img src="lawyer/images/<?php echo $picture ?>" alt="">
                            </div>
                            <div class="team-info">
                                <h3><?php echo $name ?></h3>
                                <p>- <?php echo $category ?> -</p>
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
                                <a type="button" class="btn btn-secondary  btn-block mt-3" href="lawyerreadmore.php?email=<?php echo $email ?>#details">Read More</a>

                            </div>
                        </div>
                    </div>



            <?php

                }
            }
            ?>
        </div>
    </div>
</section>


<?php include 'footer.php' ?>