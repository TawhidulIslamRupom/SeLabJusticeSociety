<?php include 'topbar.php' ?>

<?php
$query = "select * from lawyers;";
$result = $conn->query($query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Lawyers</h1>
    </div>
    <hr class="sidebar-divider">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Rate</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $email = $row['email'];
                    $name = $row['name'];
                    $rate = $row['rate'];
                    $description = $row['description'];
                    $location = $row['location'];
                    $picture = $row['picture'];


            ?>
                    <tr>
                        <td><?php echo $email ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $rate ?></td>
                        <td><?php echo $description ?></td>
                        <td><?php echo $location ?></td>

                        <td><img src="../lawyer/images/<?php echo $picture ?>" height="50px" widht="50px" alt="image"></td>
                        <td>
                            <a href="editlawyer.php?email=<?php echo $email ?>"><i class="fa fa-edit "></i></a>
                            <a href="deletelawyer.php?email=<?php echo $email ?>"><i class="fa fa-trash-o text-danger"></i></a>


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
    $("#lawyer").addClass("active");
</script>