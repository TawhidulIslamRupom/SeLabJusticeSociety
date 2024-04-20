<?php include 'topbar.php' ?>

<?php

$query = "select * from quotes;";
$result = $conn->query($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Quotes</h1>
        <a type="button" class="btn btn-primary" href="addnewquote.php"> <i class="fa fa-plus-circle"></i> Add New Quote</a>
    </div>
    <hr class="sidebar-divider">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Quote</th>
                <th scope="col">Writer</th>
                <th scope="col">Identity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $quote = $row['quote'];
                    $writer = $row['writer'];
                    $identity = $row['identity'];

            ?>
                    <tr>
                        <td class="fst-italic" style="word-wrap: break-word;min-width: 160px;max-width: 400px; font-family:Stoic Script"><?php echo $quote ?></td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 250px;"><?php echo $writer ?></td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 300px;"><?php echo $identity ?></td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 100px;">
                            <a href="editquote.php?quote=<?php echo $quote ?>"><i class="fa fa-edit fa-2x"> </i> </a>&nbsp;&nbsp;
                            <a href="deletequote.php?quote=<?php echo $quote ?>"><i class="	fa fa-trash-o fa-2x text-danger"></i></a>
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
    $("#quotes").addClass("active");
</script>