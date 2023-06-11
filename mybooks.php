<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
    $pageno;

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>My Books | SmartBook</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="bootstrap.css" />

        <link rel="icon" href="resource/ebook.svg" />

    </head>

    <body style="background-color: #F5F5F5;" class="bodyall1" >

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                                    <?php

                                    $Profile_image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "' ");
                                    $Profile_image_num = $Profile_image_rs->num_rows;
                                    $Profile_image_data = $Profile_image_rs->fetch_assoc();

                                    if ($Profile_image_num == 1) {

                                    ?>

                                        <img src="<?php echo $Profile_image_data["path"]; ?>" width="90px" height="90px" class="rounded-circle" />

                                    <?php

                                    } else {

                                    ?>

                                        <img src="resource/profile_img/user_icon.svg" width="90px" height="90px" class="rounded-circle" />

                                    <?php
                                    }

                                    ?>

                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="row text-center text-lg-start">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span class="text-white fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-black-50 fw-bold"><?php echo $email; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 ">
                            <div class="row ">
                                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                                    <h1 class="offset-4 offset-lg-2 text-white fw-bold">My Books</h1>
                                </div>
                                <div class="col-12 col-lg-2 mx-2 my-lg-4 mx-1 mx-lg-0 d-grid rounded-1">
                                    <button class="btn btn-primary fw-bold rounded-1" onclick="window.location='addbooks.php'">Add Books</button>
                                    <a href="home.php" class="link-primary link nav-link text-black fw-bold mx-5" style="height: 40px;"><i class="bi bi-house"></i> HOME</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header -->
                <!-- body -->
                <div class="col-12 ">
                    <div class="row">

                        <!-- product -->
                        <div class="col-12  mt-3 mb-3  ">
                            <div class="row" >
                                <div class="offset-1 col-10 text-center">
                                    <div class="row justify-content-center">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' ");
                                        $product_num = $product_rs->num_rows;

                                        $results_per_page = 6;
                                        $number_of_page = ceil($product_num / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                        LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                        $selected_num = $selected_rs->num_rows;

                                        for ($x = 0; $x < $selected_num; $x++) {
                                            $selected_data = $selected_rs->fetch_assoc();

                                        ?>

                                            <!-- card -->
                                            <div class="card mb-3 mt-3 col-12 col-lg-3 mx-2">
                                                <div class="row">
                                                    <div class="col-md-4 mt-4">
                                                        <?php

                                                        $product_img_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $selected_data["id"] . "' ");
                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                        ?>
                                                        <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                                                            <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?>.00</span><br />
                                                            <span class="card-text fw-bold text-success"><?php echo $selected_data["qty"]; ?> Itmes left</span>

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" <?php if ($selected_data["status_id"] == 2) { ?>checked<?php } ?> onclick="changeStatus(<?php echo $selected_data['id']; ?>);" />
                                                                <label class="form-check-label fw-bold text-info" for="fd<?php echo $selected_data["id"]; ?>">
                                                                    <?php if ($selected_data["status_id"] == 2) { ?>
                                                                        Make Your Product Active
                                                                    <?php } else { ?>
                                                                        Make Your Product Deactive
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row g-1">
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <a class="btn btn-success fw-bold" onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</a>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <button class="btn btn-danger fw-bold">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card -->

                                        <?php

                                        }

                                        ?>

                                    </div>
                                </div>
                                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-lg justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                echo "#";
                                                                            } else {
                                                                                echo "?page=" . ($pageno - 1);
                                                                            } ?>" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php

                                            for ($x = 1; $x <= $number_of_page; $x++) {
                                                if ($x == $pageno) {

                                            ?>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                                <?php

                                                } else {
                                                ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                            <?php

                                                }
                                            }

                                            ?>

                                            <li class="page-item">
                                                <a class="page-link" href="<?php if ($pageno >= $number_of_page) {
                                                                                echo "#";
                                                                            } else {
                                                                                echo "?page=" . ($pageno + 1);
                                                                            } ?>" aria-label=" Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- product -->
                    </div>
                </div>
                <!-- body -->
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {

    header("Location:home.php");
}

?>