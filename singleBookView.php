<?php
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>


        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title><?php echo $product_data["title"]; ?> | SmartBook</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="resource/ebook.svg" />
        </head>

        <body>

            <div class="container-fluid bodyall1">
                <div class="row">

                    <?php include "header.php"; ?>

                    <div class="col-12 mt-0  singleProduct">
                        <div class="row">
                            <div class="col-12" style="padding: 10px;">
                                <div class="row">

                                    <div class="col-12 col-lg-4 order-2 order-lg-1 ">
                                        <ul>

                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "'");
                                            $image_num = $image_rs->num_rows;
                                            $img = array();

                                            if ($image_num != 0) {

                                                for ($x = 0; $x < $image_num; $x++) {
                                                    $image_data = $image_rs->fetch_assoc();
                                                    $img[$x] = $image_data["code"];
                                            ?>

                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 
                                                        border-secondary mb-1">
                                                        <img src="<?php echo $img["$x"]; ?>" style="height: 200px;" class="img-thumbnail mt-1 mb-1" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);" />
                                                    </li>

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>

                                            <?php
                                            }

                                            ?>

                                        </ul>
                                    </div>



                                    <div class="col-12 col-lg-6 order-3">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row border-bottom border-dark">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                                        </ol>
                                                    </nav>
                                                </div>

                                                <div class="row border-bottom ">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 text-success fw-bold"><?php echo $product_data["title"]; ?></span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom ">
                                                    <div class="col-12 my-2">
                                                        <span class="badge">
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>

                                                            &nbsp;&nbsp;

                                                            <label class="fs-5 text-dark fw-bold">4.5 Stars | 39 Reviews & Ratings</label>
                                                        </span>
                                                    </div>
                                                </div>



                                                <div class="row border-bottom ">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-5 text-primary"><b>language : </b> <?php echo $product_data["language"]; ?></span><br />
                                                        <span class="fs-5 text-primary"><b>Author : </b><?php echo $product_data["author"]; ?></span><br />
                                                        <span class="fs-5 text-primary"><b>In Stock : </b><?php echo $product_data["qty"]; ?> Items Available</span>
                                                    </div>
                                                </div>

                                                <?php

                                                $user_rs = Database::search("SELECT * FROM `user` WHERE user.email='" . $product_data["user_email"] . "'");

                                                $user_data = $user_rs->fetch_assoc();

                                                ?>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 text-danger fw-bold"></b>Description</span><br />
                                                        <span class="fs-5 text-dark"></b> <?php echo $product_data["description"]; ?></span><br />

                                                    </div>
                                                </div>

                                                <?php

                                                $price = $product_data["price"];
                                                $adding_price = ($price / 100) * 5;
                                                $new_price = $price + $adding_price;
                                                $difference = $new_price - $price;
                                                $percentage = ($difference / $price) * 100;

                                                ?>

                                                <div class="row border-bottom ">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 fw-bold text-dark">Rs. <?php echo $price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-4 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-4 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00 (<?php echo $percentage; ?>%)</span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <div class="row g-2">

                                                                    <div class="border border-1 border-secondary rounded overflow-hidden float-left mt-1 position-relative product-qty">
                                                                        <div class="col-12">
                                                                            <span>Quantity : </span>
                                                                            <input type="text" class="border-0 fs-5 fw-bold text-start bodyall1" style="outline: none;" pattern="[0-9]" value="1" id="qty_input" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />

                                                                            <div class="position-absolute qty-buttons">
                                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                                    <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                                </div>
                                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                                    <i class="bi bi-caret-down-fill text-primary fs-5" onclick="qty_dec();"></i>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-success" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid; ?>);">Buy Now</button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-primary">Add To Cart</button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-secondary">
                                                                                        <i class="bi bi-heart-fill fs-4 text-danger"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div id="card_container"></div>
                                             
                        </div>
                    </div>



                    <?php include "footer.php"; ?>

                </div>
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
        </body>

        </html>

<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>