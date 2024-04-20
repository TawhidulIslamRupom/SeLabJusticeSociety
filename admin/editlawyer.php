<?php include 'topbar.php' ?>

<?php

$email = $_GET['email'];
$query = "select * from lawyers where email='" . $email . "';";
$result = $conn->query($query);
$name = "";
$password = "";
$categoryid = "";
$rate = "";
$description = "";
$phonenumber = "";
$location = "";
$picture = "";
$joindate = "";
$bkashnumber = "";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $name = $row['name'];
        $password = $row['password'];
        $categoryid = $row['categoryid'];
        $rate = $row['rate'];
        $description = $row['description'];
        $phonenumber = $row['phonenumber'];
        $bkashnumber = $row['bkashnumber'];
        $location = $row['location'];
        $picture = $row['picture'];
        $joindate = $row['joindate'];
    }
}
?>

<div class="container mt-5">
    <div class="row flex-lg-nowrap">
        <form class="form" novalidate="" method="post" action="editlawyerprofilecore.php" enctype="multipart/form-data">

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <img src="../lawyer/images/<?php echo $picture ?>" alt="" height="100px" width="100px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $name ?></h4>
                                                <p class="mb-0"><?php echo $email ?></p>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary " type="button" class="buttoninput">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Change Photo</span>
                                                        <input type="file" name="image" class="fileinput" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <div class="text-muted"><small><?php echo $joindate ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Edit</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col mt-3">
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input required class="form-control" type="text" name="name" value="<?php echo $name ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col mt-3">
                                                            <div class="form-group">
                                                                <label>Location</label>
                                                                <input required class="form-control" type="text" name="location" value="<?php echo $location ?>">
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>">



                                                    <div class="col mt-3">
                                                        <label for="category" class="form-label">Select Category</label>
                                                        <select required name="categoryid" class="form-select" aria-label="Default select example" id="category">
                                                            <?php
                                                            $query = "select * from lawyercategories;";
                                                            $result = $conn->query($query);

                                                            if ($result->num_rows > 0) {

                                                                while ($row = $result->fetch_assoc()) {

                                                                    $id = $row['id'];
                                                                    $category = $row['category'];
                                                                    if ($categoryid == $id) {

                                                            ?>
                                                                        <option selected value="<?php echo $id ?>"><?php echo $category ?></option>

                                                                    <?php   } else {
                                                                    ?>
                                                                        <option value="<?php echo $id ?>"><?php echo $category ?></option>

                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col mt-3">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input required class="form-control" type="text" name="phonenumber" value="<?php echo $phonenumber ?>">
                                                        </div>
                                                    </div>



                                                    <div class="col mt-3">
                                                        <div class="form-group">
                                                            <label>Bkash Number</label>
                                                            <input required class="form-control" type="text" name="bkashnumber" value="<?php echo $bkashnumber ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col mt-3">
                                                        <div class="form-group">
                                                            <label>Rate</label>
                                                            <input required class="form-control" type="number" name="rate" value="<?php echo $rate ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mt-3">
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea required class="form-control" rows="5" name="description"><?php echo $description ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3 mt-3">

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><span class="d-none d-xl-inline">Password</span></label>
                                                                <input required class="form-control" name="password" type="text" value="<?php echo $password ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>



<?php include 'footer.php' ?>