<?php include 'topbar.php' ?>

<?php

$query = "select * from appoinments;";
$result = $conn->query($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Appointments</h1>
    </div>
    <hr class="sidebar-divider">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Lawyer</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
                <th scope="col">Transaction</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $client = $row['client'];
                    $lawyer = $row['lawyer'];
                    $fromdate = $row['fromdate'];
                    $details = $row['details'];
                    $transaction = $row['transaction'];
                    $id = $row['id'];
                    $approve = $row['approve'];



            ?>
                    <tr>
                        <td><a href="showclient.php?email=<?php echo $client ?>"><?php echo $client ?></a></td>
                        <td><a href="showlawyer.php?email=<?php echo $lawyer ?>"><?php echo $lawyer ?></a></td>
                        <td><?php echo $fromdate ?></td>
                        <td><?php echo $details ?></td>
                        <td><?php echo $transaction ?></td>


                        <td>

                            <?php
                            if ($approve == 0) {

                            ?>
                                <a href="approveappoinment.php?id=<?php echo $id ?>"><i class="fa fa-check fa-2x"></i></a>
                                <a href="rejectappoinment.php?id=<?php echo $id ?>"><i class="text-danger fa fa-remove fa-2x"></i></a>
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

            <?php
                }
            }

            ?>

        </tbody>
    </table>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>


<script>
    $("#appointments").addClass("active");
</script>