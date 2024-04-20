<?php include 'topbar.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Add New Quote</h1>
    </div>
    <hr class="sidebar-divider">
    <form action="addnewquotecore.php" method="post">
        <div class="mb-3">
            <label for="quoteStatment" class="form-label">Quote Statement</label>
            <input required type="text" class="form-control fst-italic" id="quoteStatment"  placeholder="Java is to JavaScript what car is to Carpet." name="quote">
        </div>
        <div class="mb-3">
            <label for="writername" class="form-label">Writer Name</label>
            <input required type="text" class="form-control fst-italic" id="writername" placeholder="Chris Heilmann" name="writer">
        </div>
        <div class="mb-3">
            <label for="writeridentity" class="form-label">Writer Identity</label>
            <input required type="text" class="form-control" id="writeridentity" placeholder="CEO of Facebook" name="identity">
        </div>
        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>  Add</button>
    </form>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>


<script>
    $("#quotes").addClass("active");
</script>