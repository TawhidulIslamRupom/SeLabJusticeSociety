<?php include 'topbar.php' ?>

<?php

$query = "select * from lawyercategories;";
$result = $conn->query($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Lawyer Categories</h1>
        <a type="button" class="btn btn-primary" href="addnewcategory.php"> <i class="fa fa-plus-circle"></i> Add New Category</a>
    </div>
    <hr class="sidebar-divider">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id = $row['id'];
                    $category = $row['category'];
                    $description = $row['description'];
                    $image = $row['image'];

            ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $category ?></td>
                        <td><?php echo $description ?></td>
                        <td><img src="../images/<?php echo $image ?>" height= "50px" widht="50px" alt="image"></td>
                        <td>
                            <a href="editcategory.php?id=<?php echo $id ?>"><i class="fa fa-edit fa-2x"> </i> </a>&nbsp;&nbsp;
                            <a href="deletecategory.php?id=<?php echo $id ?>"><i class="	fa fa-trash-o fa-2x text-danger"></i></a>
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
    $("#categories").addClass("active");
</script>