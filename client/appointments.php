<?php include 'header.php' ?>



<div id= "appointment-profile-id" class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Lawyer</span></th>
                                <th><span>Date</span></th>
                                <th class="text-center"><span>Transaction id(Bkash)</span></th>
                                <th><span>Details</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php




                            $query = "select * from appoinments where client='" . $email . "';";
                            $result = $conn->query($query);


                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {

                                    $client = $row['client'];
                                    $lawyer = $row['lawyer'];
                                    $fromdate = $row['fromdate'];
                                    $details = $row['details'];
                                    $transaction = $row['transaction'];
                                    $id = $row['id'];
                                    $approve = $row['approve'];
                                    $img = "";
                                    $clientname = "";


                                    $query1 = "select * from lawyers where email='" . $lawyer . "';";
                                    $result1 = $conn->query($query1);


                                    if ($result1->num_rows > 0) {

                                        while ($row1 = $result1->fetch_assoc()) {
                                            $img = $row1['picture'];
                                            $lawyername = $row1['name'];
                                        }
                                    }



                            ?>
                                    <tr>
                                        <td>
                                            <img src="../lawyer/images/<?php echo $img ?>" alt="">
                                            <a href="lawyerreadmore.php?email=<?php echo $lawyer ?>#details" class="user-link"><?php echo $lawyername ?></a>
                                            <span class="user-subhead"><?php echo $lawyer ?></span>
                                        </td>
                                        <td>
                                            <?php echo $fromdate ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-default"><?php echo $transaction ?></span>
                                        </td>
                                        <td>
                                            <?php echo $details ?>
                                        </td>

                                        <td style="width: 20%;">

                                            <?php
                                            if ($approve == 0) {

                                            ?>

                                                <div class="text-info">PENDING</div>

                                            <?php } ?>

                                            <?php
                                            if ($approve == 1) {

                                            ?>

                                                <div class="text-success">APPROVED</div>
                                            <?php } ?>

                                            <?php
                                            if ($approve == -1) {

                                            ?>

                                                <div class="text-danger">REJECTED</div>
                                            <?php } ?>


                                        </td>

                                    </tr>

                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>