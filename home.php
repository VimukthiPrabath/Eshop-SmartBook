<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <title>Home | Smartbook</title>

    <link rel="icon" href="resource/ebook.svg" />

</head>

<body class="bodyall1">

    <!-- style="background-color: #F5F5F5;" -->

    <?php
    include "navbar.php";
    ?>


    <!-- carousel -->

    <div class="col-12 d-none d-lg-block">
        <div class="row">

            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide carousel-fade " data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="resource/carousel/slider3.jpg" class="d-block poster-img-1" />
                        <div class="carousel-caption d-none d-md-block poster-caption">
                            <h5 class="poster-title" style="font-size: 100px;">Welcome To SmartBook</h5>
                            <p class="poster-txt">Reading completes man</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="resource/carousel/slider1.jpg" class="d-block poster-img-1" />
                    </div>
                    <div class="carousel-item">
                        <img src="resource/carousel/slider2.jpg" class="d-block poster-img-1" />
                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                            <h5 class="poster-title" style="font-size: 100px; margin-left: 250px;">READING COMPLETES MAN</h5>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>


    <div class="col-12 justify-content-center">
        <div class="row mb-3">

            <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>

            <div class="col-12 col-lg-6">

                <div class="input-group mt-3 mb-3">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">

                    <select class="form-select" style="max-width: 250px;" id="basic_search_select">
                        <option value="0">All Categories</option>

                        <?php

                        require "connection.php";

                        $category_rs = Database::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;

                        for ($x = 0; $x < $category_num; $x++) {
                            $category_data = $category_rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                        <?php
                        }

                        ?>

                    </select>

                </div>

            </div>

            <div class="col-12 col-lg-2 d-grid">
                <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);">Search</button>
            </div>

            <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                <a href="advancedSearch.php" class="link-primary text-decoration-none fw-bold">Advanced</a>
            </div>

        </div>
    </div>

    <hr />



    <!-- carousel -->

    <?php

    $c_rs = Database::search("SELECT * FROM `category`");
    $c_num = $c_rs->num_rows;

    for ($y = 0; $y < $c_num; $y++) {

        $c_data = $c_rs->fetch_assoc();

    ?>
        <div id="basicSearchResult">
            <!-- Category Name -->

            <div class="col-12 mt-3 mb-3">
                <a href="#" class="text-decoration-none text-dark fs-3 fw-bold"><?php echo $c_data["name"]; ?></a> &nbsp;&nbsp;
                <a href="#" class="text-decoration-none text-dark fs-6">See All &nbsp;&rarr;</a>
            </div>

            <!-- Category Name -->
            <!-- products -->

            <div class="col-12 mb-3">
                <div class="row border border-dark">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2 ">

                            <?php

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c_data["id"] . "' AND 
                        `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");

                            $product_num = $product_rs->num_rows;

                            for ($z = 0; $z < $product_num; $z++) {
                                $product_data = $product_rs->fetch_assoc();
                            ?>

                                <div class="card col-6 col-lg-2 mt-2 mb-2 border-info" style="width: 17rem;">

                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();

                                    ?>

                                    <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 275 px;" />
                                    <div class="card-body ms-0 m-0 text-center">
                                        <h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5>
                                        <span class="badge rounded-pill text-bg-danger">New</span><br />
                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                        <i class="bi bi-star text-warning fs-5"></i>
                                        <i class="bi bi-star text-warning fs-5"></i><br/>
                                        <span class="card-text text-primary">Rs. <?php echo $product_data["price"]; ?> .00</span><br />
                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>

                                            <span class="card-text text-warning fw-bold">In Stock</span><br />
                                            <span class="card-text text-success fw-bold"><?php echo $product_data["qty"]; ?> Books Available</span><br /><br />
                                            <a href='<?php echo "singleBookView.php?id=" . ($product_data["id"]); ?>' class="col-12 btn btn-primary">Buy Now</a>
                                            <button class="col-12 btn btn-dark mt-2" onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                                <i class="bi bi-cart-plus-fill text-white fs-5"></i>
                                            </button>

                                        <?php

                                        } else {

                                        ?>

                                            <span class="card-text text-danger fw-bold">Out of Stock</span><br />
                                            <span class="card-text text-danger fw-bold">00 Books Available</span><br /><br />
                                            <button class="col-12 btn btn-success disabled">Buy Now</button>
                                            <button class="col-12 btn btn-dark mt-2 disabled">
                                                <i class="bi bi-cart-plus-fill text-white fs-5"></i>
                                            </button>

                                        <?php

                                        }

                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                        $watchlist_num = $watchlist_rs->num_rows;

                                        if ($watchlist_num == 1) {
                                        ?>
                                            <button class="col-12 btn btn-outline-light mt-2 border border-primary" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="col-12 btn btn-outline-light mt-2 border border-primary" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                <i class="bi bi-heart-fill text-primary fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                            </button>
                                        <?php
                                        }

                                        ?>


                                    </div>
                                </div>

                            <?php
                            }

                            ?>

                        </div>
                    </div>

                </div>
            </div>

            <!-- products -->

        <?php

    }

        ?>


        </div>



        <?php
        include "footer.php";
        ?>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
</body>

</html>