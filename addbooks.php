<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Smartbook</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body>

    <div class="container-fluid bodyall1">
        <div class="row gy-3">
            <?php include "header.php"; ?>
            <?php require "connection.php"; ?>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="h2 text-primary fw-bold">Add New Product</h2>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-4 border-end border-success">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                    </div>

                                    <div class="col-12">
                                        <select class="form-select text-center" id="category"onchange="load_brand();">
                                            <option value="0">Select Category</option>
                                            <?php

                                            $category_rs = Database::search("SELECT * FROM `category`");
                                            $category_num = $category_rs->num_rows;

                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $category_data["id"] ?>"><?php echo $category_data["name"] ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                           

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add a Title to your Product
                                        </label>
                                    </div>
                                    <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                        <input type="text" class="form-control" id="title" />
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
                                                <input type="number" class="form-control" value="0" min="0" id="qty" />
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
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                            </div>
                                            <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="cost" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
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
                                                <label class="form-label">Delivery cost Within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="dwc" />
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
                                                    <input type="text" class="form-control" id="doc" />
                                                    <span class="input-group-text">.00</span>
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
                                        <textarea cols="30" id="desc" rows="15" class="form-control"></textarea>
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
                                        <div class="row">
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resource/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i0" />
                                            </div>
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resource/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i1" />
                                            </div>
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resource/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                        <input type="file" class="d-none" id="imageuploader" multiple />
                                        <label for="imageuploader" onclick="changeProductImage();" class="col-12 btn btn-primary">Upload Images</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                <label class="form-label">
                                    We are taking 5% of the product from price from every
                                    product as a service charge.
                                </label>
                            </div>

                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                <button onclick="addProduct();" class="btn btn-success">Save Product</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>