<?php include 'topbar.php' ?>

<?php $quote = $_GET['quote'];
$query = "select * from quotes where quote='" . $quote . "';";
$result = $conn->query($query);
$quote = "";
$writer ="";
$identity ="";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quote = $row['quote'];
        $writer = $row['writer'];
        $identity = $row['identity'];
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Edit Quote</h1>
    </div>
    <hr class="sidebar-divider">
    <form action="editquotecore.php" method="post">
        <div class="mb-3">
            <label for="quoteStatment" class="form-label">Quote Statement</label>
            <input required type="text" class="form-control fst-italic" id="quoteStatment" value ="<?php echo $quote ?>" name="quote">
        </div>
        <div class="mb-3">
            <label for="writername" class="form-label">Writer Name</label>
            <input required type="text" class="form-control fst-italic" id="writername" value ="<?php echo $writer ?>" name="writer">
        </div>
        <div class="mb-3">
            <label for="writeridentity" class="form-label">Writer Identity</label>
            <input required type="text" class="form-control" id="writeridentity" value ="<?php echo $identity ?>"  name="identity">
        </div>
        <div class="mb-3">
            <input  type="hidden" class="form-control" id="realquoteStatment" value ="<?php echo $quote ?>"  name="idquote">
        </div>
        <button type="submit" class="btn btn-primary"> <i class="	fa fa-paper-plane"></i> Update</button>
    </form>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>


<script>
    $("#quotes").addClass("active");
</script>