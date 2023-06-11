<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist | Smartbook</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/ebook.svg" />

</head>

<body style="background-color: #F5F5F5;" class="bodyall1">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 border border-1 border-primary rounded mb-2">
                            <div class="row">

                                <div class="col-12 text-center">
                                    <label class="form-label fs-1 fw-bolder text-danger">Watchlist &hearts;</label>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                                        </div>
                                        <div class="col-12 col-lg-2 mb-3 d-grid">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                               

                                <?php
                                require "connection.php";
                                $user = $_SESSION["u"]["email"];

                                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
                                $watch_num = $watch_rs->num_rows;

                                if ($watch_num == 0) {

                                ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-10">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-outline-warning fs-3 fw-bold">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                    <?php

                                } else {
                                    ?>
                                    <div class="col-12 offset-lg-2 col-lg-8">
                                            <div class="row">
                                    <?php
                                    for ($x = 0; $x < $watch_num; $x++) {
                                        $watch_data = $watch_rs->fetch_assoc();
                                    ?>

                                        <!-- have Products -->
                                        

                                                <div class="card mb-3 mx-0 mx-lg-2 col-12 rounded-4">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                        <?php
                                                            $img = array();

                                                            $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$watch_data["product_id"]."'");
                                                            $images_data = $images_rs->fetch_assoc();
                                                                
                                                            ?>
                                                            <img src="<?php echo $images_data["code"]; ?>" class="img-fluid rounded-start rounded-3" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <?php

                                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$watch_data["product_id"]."'");
                                                                $product_data = $product_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $product_data["title"]; ?></h5>
                                                          
                                            
                                                                <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black"><?php echo $product_data["qty"]; ?> Items available</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Seller :</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black">vimukthi</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                                <a href="#" class="btn btn-outline-primary mb-2">Buy Now</a>
                                                                <a href="#" class="btn btn-outline-warning mb-2">Add To Cart</a>
                                                                <a href="#" class="btn btn-outline-danger" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        <!-- have Products -->
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

            <?php

            } else {
                echo ("Please Login First");
            }

            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>