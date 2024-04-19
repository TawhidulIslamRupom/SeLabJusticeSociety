<?php
// Include the database connection file
include_once 'dbconnection.php';

// Check if search parameter is provided
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $q = "SELECT * FROM lawyercategories WHERE category LIKE '%" . $search . "%'";
    $result1 = $conn->query($q);
    $id = "-1";
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $id = $row1['id'];
        }
    }
    // Modify the query to search for lawyers based on the search query
    $query = "SELECT * FROM lawyers WHERE name LIKE '%" . $search . "%' 
                OR rate LIKE '%" . $search . "%' 
                OR description LIKE '%" . $search . "%' 
                OR phonenumber  LIKE '%" . $search . "%' 
                OR location LIKE '%" . $search . "%' 
                OR categoryid = " . $id;

    // Execute the query
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $name = $row['name'];
            $categoryid = $row['categoryid'];
            $picture = $row['picture'];
            $category = getCategory($conn, $categoryid);
            ?>
            <div class="col-lg-3">
                <div class="team-box">
                    <div class="team-media">
                        <img src="lawyer/images/<?php echo $picture ?>" alt="">
                    </div>
                    <div class="team-info">
                        <h3><?php echo $name ?></h3>
                        <p>- <?php echo $category ?> -</p>
                        <ul class="top-social">
                            <?php
                            $query1 = "SELECT * FROM socialmedia WHERE email='" . $email . "'";
                            $result1 = $conn->query($query1);
                            $socialMedia = array();
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    $socialMedia[] = $row1;
                                }
                            }
                            foreach ($socialMedia as $social) {
                                // Check if the 'platform' key exists in the $social array
                                if (isset($social['platform'])) {
                                    switch ($social['platform']) {
                                        case 'facebook':
                                            echo '<li><a target="_blank" href="https://web.facebook.com/' . $social['username'] . '"><i class="fab fa-facebook-f"></i></a></li>';
                                            break;
                                        case 'instagram':
                                            echo '<li><a target="_blank" href="https://www.instagram.com/' . $social['username'] . '"><i class="fab fa-instagram"></i></a></li>';
                                            break;
                                        case 'twitter':
                                            echo '<li><a target="_blank" href="https://twitter.com/' . $social['username'] . '"><i class="fab fa-twitter"></i></a></li>';
                                            break;
                                        case 'whatsapp':
                                            echo '<li><a target="_blank" href="https://api.whatsapp.com/send?phone=' . $social['username'] . '"><i class="fab fa-whatsapp"></i></a></li>';
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <a type="button" class="btn btn-secondary btn-block mt-3" href="lawyerreadmore.php?email=<?php echo $email ?>#details">Read More</a>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        // No results found
        echo "<div class='col-md-12 text-center'><p>No lawyers found.</p></div>";
    }
} else {
    // No search parameter provided
    echo "<div class='col-md-12 text-center'><p>No search parameter provided.</p></div>";
}

// Function to get category by id
function getCategory($conn, $categoryId)
{
    $query = "SELECT category FROM lawyercategories WHERE id = $categoryId";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['category'];
    } else {
        return 'Unknown';
    }
}
?>
