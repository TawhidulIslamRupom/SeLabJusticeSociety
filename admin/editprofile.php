<?php include 'topbar.php'?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Edit profile</h1>
    </div>
    <hr class="sidebar-divider">
    <form action="editprofilecore.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email ?>" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $password ?>" name="password">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" class="form-control" id="exampleInputname" value="<?php echo $adminname ?>" name="name">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Profile picture</label>
            <input class="form-control" type="file" id="formFile" name="profilepic" accept="image/*">
            <div id="fileHelp" class="form-text">if don't want to change profile pic keep it blank ( don't choose any file).</div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"> </i>Update</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php'?>
