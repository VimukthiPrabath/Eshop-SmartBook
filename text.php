<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/icon1.png" />
</head>

<body class="bg-secondary">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <?php
            if (isset($_SESSION["u"])) {
            ?>

                <div class="col-12">
                    <div class="row">
                        <label class="col-12 form-label fs-1 fw-bold text-light text-center" style="font-family: bebas;">Watchlist &hearts;</label>
                    </div>
                    <div>
                        <hr />
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                        <input type="text" class="form-control" placeholder="Search In Wachlist..."/>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button class="btn btn-primary">Seacrch</button>
                    </div>
                    <div class=" col-12 col-lg-4">
                        <hr/>
                    </div>


                </div>
                

            <?php

            }

            ?>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>