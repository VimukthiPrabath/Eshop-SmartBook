<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | Smartbook</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body class="bodyall1">

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {
                if (isset($_SESSION["p"])) {

            ?>


                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 text-center">
                                <h2 class="h2 text-primary fw-bold">Update My Books</h2>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-lg-4">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select text-center" disabled>
                                                <?php
                                                $product = $_SESSION["p"];

                                                $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                                $category_data = $category_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo $category_data["name"]; ?></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border-success" />
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">
                                                    Add a Title to your product
                                                </label>
                                            </div>
                                            <div class="offset-lg-2 offset-0 col-lg-8 col-12">
                                                <input type="text" class="form-control" value="<?php echo $product["title"]; ?>" id="t" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border-success" />
                                    </div>
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 col-lg-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="number" class="form-control" value="<?php echo $product["qty"]; ?>" min="0" id="q" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border-success" />
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 border-end border-success">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" value="<?php echo $product["price"]; ?>" disabled />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Method</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                            <div class="col-2 pm pm2"></div>
                                                            <div class="col-2 pm pm3"></div>
                                                            <div class="col-2 pm pm4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr class="border-success" />
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                                </div>
                                                <div class="col-12 col-lg-6 border-end border-success">
                                                    <div class="row">
                                                        <div class="col-12 offset-lg-1 col-lg-3">
                                                            <label class="form-label">Delivery cost within Colombo</label>
                                                        </div>
                                                        <div class="col-12 col-lg-8">
                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">Rs.</span>
                                                                <input type="text" id="dwc" class="form-control" value="<?php echo $product["delivery_fee_colombo"]; ?>" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-12 offset-lg-1 col-lg-3">
                                                            <label class="form-label">Delivery cost out of Colombo</label>
                                                        </div>
                                                        <div class="col-12 col-lg-8">
                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">Rs.</span>
                                                                <input type="text" id="doc" class="form-control" value="<?php echo $product["delivery_fee_other"]; ?>" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control" id="d"><?php echo $product["description"]; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <?php

                                            $img = array();
                                            $img[0] = "resource/addproductimg.svg";
                                            $img[1] = "resource/addproductimg.svg";
                                            $img[2] = "resource/addproductimg.svg";

                                            $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product["id"] . "'");
                                            $images_num = $images_rs->num_rows;

                                            for ($x = 0; $x < $images_num; $x++) {
                                                $images_data = $images_rs->fetch_assoc();
                                                $img[$x] = $images_data["code"];
                                            }

                                            ?>
                                            <div class="row">
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[0]; ?>" class="img-fluid" style="width: 250px;" id="i0" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[1]; ?>" class="img-fluid" style="width: 250px;" id="i1" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[2]; ?>" class="img-fluid" style="width: 250px;" id="i2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="updateProduct();">Update Product</button>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php

                } else {
                    header("Location:myProducts.php");
                }
            } else {
                header("Location:home.php");
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>