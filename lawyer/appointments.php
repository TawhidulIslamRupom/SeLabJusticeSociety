<?php include 'header.php' ?>



<div id= "appointment-profile-id" class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Client</span></th>
                                <th><span>Date</span></th>
                                <th class="text-center"><span>Transaction id(Bkash)</span></th>
                                <th><span>Details</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query3 = "update appoinments set status='seen' where lawyer='" . $email . "';";
                            $result3 = $conn->query($query3);


                            $query = "select * from appoinments where lawyer='" . $email . "';";
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


                                    $query1 = "select * from clients where email='" . $client . "';";
                                    $result1 = $conn->query($query1);


                                    if ($result1->num_rows > 0) {

                                        while ($row1 = $result1->fetch_assoc()) {
                                            $img = $row1['picture'];
                                            $clientname = $row1['name'];
                                        }
                                    }



                            ?>
                                    <tr>
                                        <td>
                                            <img src="../client/images/<?php echo $img ?>" alt="">
                                            <a href="showclient.php?email=<?php echo $client ?>" class="user-link"><?php echo $clientname ?></a>
                                            <span class="user-subhead"><?php echo $client ?></span>
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
                                                <a href="rejectappoinment.php?id=<?php echo $id ?>" class="table-link">
                                                    <span class="fa-stack">
                                                        <i class="text-danger fa fa-remove fa-2x"></i>

                                                    </span>
                                                </a>
                                                <a href="approveappoinment.php?id=<?php echo $id ?>" class="table-link">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-check fa-2x"></i>
                                                    </span>
                                                </a> <?php } ?>

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