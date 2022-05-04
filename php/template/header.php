<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I Watch</title>
    <!--CSS-->
    <link rel="stylesheet" href="../style/style.css">
    <!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <?php
            require_once('../src/functions.php');
        ?>

</head>

<body>
    <!--header-->
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p id="">12 Avenue Taieb Mhiri Ariana 22-392-405</p>
            <div>
                <a class="pr-3" style="text-decoration:none;"><?php
                if (isset($_SESSION['username']))
                {
                    echo "Welcome ".$_SESSION['username'];
                }
                else echo "";
                ?></a>
                <a href="logout.php" class="px-3 border-right border-left text-dark">Logout</a>
                
            </div>
        </div>

        <!--navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">I Watch</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto font-rubik">
                        <li class="nav-item active">
                            <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#top-sale">Top-Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#special_price">Special-Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#footer">Contact-us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Comming soon</a>
                        </li>
                    </ul>
                    <form action="#" class="font-size-14 font-rale">
                        <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                            <span class="font-size-16 px-2 text-white">
                                <i class="fas fa-shopping-cart">

                                </i>
                            </span>
                            <span class="px-3 py-2 rounded-pill text-dark bg-light"><?= $product_count ?></span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!--main-->
    <main id="main-site">