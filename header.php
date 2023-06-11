<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body class="header">

    <div class="col-12 justify-content-center">
        <div class="row mt-2">

            <div class="offset-lg-1 col-6 col-lg-3 align-self-start">
                <?php
                session_start();

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];

                ?>
                    <span class="text-lg-start"><b>Welcome </b><?php echo $data["fname"]; ?> </span>|
                    <span class="text-lg-start fw-bold signout " onclick="signout();">Sign Out </span>|

                <?php
                } else {
                ?>
                    <a href="index.php" class="text-decoration-none fw-bold">Sign In Or Register</a>|
                <?php
                }

                ?>
                <span class="text-lg-start fw-bold" style="font-size: 14px;">Help and Contact</span> |

            </div>

            <div class="col-lg-4 col-6">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <div class="offset-2 offset-lg-3 col-3 col-lg-2">
                                <div class="row">
                                    <span><i class="bi bi-bell"></i>
                                        <span class="badge border border-danger rounded-5 bg-danger">0</span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-3 col-lg-2">
                                <div class="row">
                                    <span><i class="bi bi-envelope-open"></i>
                                        <span class="badge border border-danger rounded-5 bg-danger">0</span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-3 col-lg-2">
                                <div class="row">
                                    <span><i class="bi bi-calendar3"></i>
                                        <span class="badge border border-danger rounded-5 bg-danger">0</span>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-12 text-center">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <div class="offset-6 col-6">
                                <a href="home.php" class="link-info link nav-link text-black fw-bold" style="height: 40px;"><i class="bi bi-house"></i> HOME</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>


    <script src="script.js"></script>
</body>

</html>