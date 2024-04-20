<?php include 'topbar.php' ?>

<?php
$id = $_GET['id'];
$query = "select * from lawyercategories where id='" . $id . "';";
$result = $conn->query($query);

$category = "";
$description = "";
$image = "";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $category = $row['category'];
        $description = $row['description'];
        $image = $row['image'];
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Edit lawyer category</h1>
    </div>
    <hr class="sidebar-divider">
    <form action="editcategorycore.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <input  type="hidden" id="disabledTextInput" class="form-control" value="<?php echo $id ?>" name="id">
        </div>

        <div class="mb-3">
            <label for="categoryname" class="form-label">Category Name</label>
            <input required type="text" class="form-control fst-italic" id="categoryname" value="<?php echo $category ?>" name="category">
        </div>
        <div class="mb-3">
            <label for="categorydescription" class="form-label">Category Description</label>
            <input required type="textarea" class="form-control" id="categorydescription" value="<?php echo $description ?>" name="description">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Category Image</label>
            <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
            <div id="fileHelp" class="form-text">if don't want to change profile pic keep it blank ( don't choose any file).</div>

        </div>

        <button type="submit" class="btn btn-primary"> <i class="	fa fa-paper-plane"></i> update</button>
    </form>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>


<script>
    $("#categories").addClass("active");
</script>