<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold">SmartBook&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="home.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-house-door"></i>&nbsp;Home&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="userProfile.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-person"></i>&nbsp;My Profile&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="mybooks.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-book"></i>&nbsp;My Books&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="home.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-bag-check"></i>&nbsp;My Selling&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>



                    <li class="nav-item">
                        <a href="cart.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-cart2"></i>&nbsp;cart&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="watchlist.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-bag-heart-fill"></i>&nbsp;Watchlist&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="home.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-clock-history"></i>&nbsp;PurchaseHistory&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="home.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-telephone-outbound"></i>&nbsp;ContactAdmin&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <a href="adminSignin.php" class="nav-link link-primary text-white fw-bold"><i class="bi bi-person"></i>&nbsp;Admin&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>

                    <li class="nav-item">
                        <?php

                        session_start();

                        if (isset($_SESSION["u"])) {

                            $data = $_SESSION["u"];

                        ?>


                            <a class="nav-link text-white link-primary fw-bold" onclick="signout();" style="cursor: pointer; color: blue;"><i class="bi bi-box-arrow-right"></i>&nbsp;Sign Out</a>

                        <?php

                        } else {

                        ?>

                            <a href="index.php" class="nav-link text-white link-primary fw-bold">Sign In</a>

                        <?php

                        }

                        ?>

                    </li>



                </ul>
            </div>
        </div>
    </nav>

    <script>
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
        });
    </script>
</body>

</html>