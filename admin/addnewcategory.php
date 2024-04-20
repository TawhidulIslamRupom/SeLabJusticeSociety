<?php include 'topbar.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Add New lawyer category</h1>
    </div>
    <hr class="sidebar-divider">
    <form action="addnewcategorycore.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="categoryname" class="form-label">Category Name</label>
            <input required type="text" class="form-control fst-italic" id="categoryname" placeholder="e.g. Fire Accident" name="category">
        </div>
        <div class="mb-3">
            <label for="categorydescription" class="form-label">Category Description</label>
            <input required type="textarea" class="form-control" id="categorydescription" name="description">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Category Image</label>
            <input required class="form-control" type="file" id="formFile" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Add</button>
    </form>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>


<script>
    $("#categories").addClass("active");
</script>