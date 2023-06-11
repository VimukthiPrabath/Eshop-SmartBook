<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/ebook.svg" />

</head>

<body class="bodyall1">

    <?php include "header.php" ?>

    <div class="container-fluid">
        <div class="row">


            <?php
            require "connection.php";
            if (isset($_SESSION["u"])) {
                $email = $_SESSION["u"]["email"];

                $details_rs = Database::search("SELECT*FROM `user` INNER JOIN `gender`ON
                  gender.id=user.gender_id WHERE`email`='" . $email . "'");
                $data = $details_rs->fetch_assoc();

                $address_rs = Database::search("SELECT*FROM`user_has_address`INNER JOIN `city`ON
                user_has_address.city_id=city.id INNER JOIN `district`ON
                city.district_id=district.id INNER JOIN `province`ON
                district.province_id=province.id WHERE `user_email`='" . $email . "'");
                $address_data = $address_rs->fetch_assoc();

                $image_rs = Database::search("SELECT*FROM`profile_image`WHERE`user_email`='" . $email . "'");
                $image_data = $image_rs->fetch_assoc();


            ?>
                <div class="col-12">
                    <div class="row">

                        <div class="offset-1 col-12 col-lg-3 bg-white  rounded">

                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <?php

                                if (empty($image_data["path"])) {

                                ?>
                                    <img src="resource/users.png" class="rounded mt-5" style="width:150px;" id="viewImg" />
                                <?php

                                } else {
                                ?>
                                    <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width:150px;" id="viewImg" />
                                <?php
                                }

                                ?>
                                <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                <label for="profileimg" style="cursor: pointer;" onclick="changeImage();"><i class="bi bi-pencil"></i>Update Profile Image</lable>
                                    <br />
                                    <label class="text-center" style="cursor: pointer;"><i class="bi bi-arrow-bar-up" onclick="u_changeImage();"></i>Ok</lable>
                            </div>

                            <div class="text-center">
                                <span class="fw-bold" style="font-family: bebas; font-size:30px;"><?php echo $data["fname"] . "  " . $data["lname"]; ?></span>
                                <br />
                                <span class="fw-bold text-black-50">user</span>
                            </div>
                            <br /><br />
                            <div>
                                <span class="fw-bold" style="font-family: nunito;">. .<i class="bi bi-geo-alt-fill"></i><?php echo $address_data["address"]; ?></span>
                                <hr />
                                <span class="fw-bold" style="font-family: nunito;">. .<i class="bi bi-key-fill"></i><?php echo $data["NIC"]; ?></span>
                                <hr />
                                <span class="fw-bold" style="font-family: nunito;">. .<i class="bi bi-telephone-fill"></i><?php echo $data["mobile"]; ?></span>
                                <hr />
                                <span class="fw-bold" style="font-family: nunito;">. .<i class="bi bi-envelope-fill"></i><?php echo $data["email"]; ?></span>
                                <hr />
                            </div>
                        </div>

                        <div class="accordion offset-1 col-12 col-lg-6 " id="accordionExample">
                            <div class="accordion-item border  rounded-3">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-primary" style="color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personal Details
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <label class="form-label" style="font-family: bebas;">First Name</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" style="font-family: nunito;" value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label" style="font-family: bebas;">Last Name</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label" style="font-family: bebas;">Mobile</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label" style="font-family: bebas;"> NIC</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" value="<?php echo $data["NIC"]; ?>" id="nic" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" style="font-family: bebas;">Email Address</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label" style="font-family: bebas;">Gender</label>
                                                <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" readonly value="<?php echo $data["gender_name"]; ?>" />
                                            </div>
                                            <div class="col-12">
                                                <hr />
                                            </div>
                                            <div class="offset-10 col-2">
                                                <button class="btn btn-primary" style="font-family: bebas;" onclick="updateprofile1();">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed bg-warning" style="color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            contact details
                                        </button>
                                    </h2>

                                    <?php
                                    $province_rs = Database::search("SELECT*FROM`province`");
                                    $district_rs = Database::search("SELECT*FROM`district`");
                                    $city_rs =   Database::search("SELECT*FROM `city`");

                                    ?>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <label class="fw-bold" style="font-family: bebas; font-size: larger;">Address</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label" style="font-family: bebas;">City</label>
                                                    <br />
                                                    <select class=" col-6 border border-3 border-top-0 border-end-0 border-start-0">
                                                        <option value="0">Select city</option>
                                                        <?php
                                                        $city_num = $city_rs->num_rows;
                                                        for ($x = 0; $x < $city_num; $x++) {
                                                            $city_data = $city_rs->fetch_assoc();
                                                        ?>

                                                            <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>><?php echo $city_data["name"]; ?></option>

                                                        <?php

                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label" style="font-family: bebas;">District</label>
                                                    <br />
                                                    <select class=" col-6 border border-3 border-top-0 border-end-0 border-start-0">
                                                        <option value="0">Select district</option>
                                                        <?php
                                                        $district_num = $district_rs->num_rows;
                                                        for ($x = 0; $x < $district_num; $x++) {
                                                            $district_data = $district_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["district_id"])) {
                                                                                                                    if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }

                                                                                                                            ?>><?php echo $district_data["name"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label" style="font-family: bebas;">Province</label>
                                                    <br />
                                                    <select class=" col-6 border border-3 border-top-0 border-end-0 border-start-0">
                                                        <option value="0">Select province</option>
                                                        <?php
                                                        $province_num = $province_rs->num_rows;
                                                        for ($x = 0; $x < $province_num; $x++) {
                                                            $province_data = $province_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $province_data["id"]; ?>" <?php

                                                                                                                if (!empty($address_data["province_id"])) {
                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }


                                                                                                                            ?>><?php echo $province_data["name"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <hr />
                                                </div>
                                                <div class="col-12">
                                                    <label class="fw-bold" style="font-family: bebas; font-size: larger;"> Existing Address</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label" style="font-family: bebas;"><?php echo ($address_data["address"]); ?></label>
                                                </div>
                                                <div class="col-12">
                                                    <hr />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label" style="font-family: bebas;">New Address</label>
                                                    <input type="text" class="form-control border border-3 border-top-0 border-end-0 border-start-0" id="address" />
                                                </div>


                                                <div class="col-12">
                                                    <hr />
                                                </div>



                                                <div class="offset-10 col-2">
                                                    <button class="btn btn-primary" style="font-family: bebas;" onclick="updateprofile2();">Save Changes</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            <?php
            } else {
            ?>

                <label>somthing wrong</label>

            <?php
            }
            ?>






        </div>

    </div>

    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>