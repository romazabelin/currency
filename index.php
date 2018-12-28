<?php
require __DIR__.'/vendor/autoload.php';

use app\models\OpenExchange as Currency;

$currency      = new Currency;

if (isset($_GET['action'])) {
    switch(($_GET['action'])) {
        case 'convert':
            $currencyTotal     = $_POST['currencyTotal'];
            $currencyToConvert = $_POST['currencyToConvert'];

            $total = round($currency->convertCurrency($currencyTotal, $currencyToConvert), 2);

            echo json_encode([
                'total' => $total
            ]);
            break;
    }

    return true;
}

$exchangeRates = $currency->getExchangeRates();
$currencies    = $currency->getCurrencies();
?>

<head>
    <title>Currency Exchange</title>
    <meta charset="UTF-8">
    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/themify-icons.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/owl.carousel.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/custom.css"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section clearfix">
    <div class="container-fluid">
        <a href="/" class="site-logo">
            <img src="assets/img/logo.png" alt="">
        </a>
        <div class="responsive-bar"><i class="fa fa-bars"></i></div>
        <a href="" class="user"><i class="fa fa-user"></i></a>
        <nav class="main-menu">
            <ul class="menu-list">
                <li><a href="/">Home</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- Header section end -->


<!-- Hero section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 hero-text">
                <h2>Invest in <span>Netpeak</span> <br>Netpeak Trading</h2>
                <h4>Use modern progressive technologies of Netpeak to earn money</h4>
            </div>
            <div class="col-md-6">
                <img src="assets/img/laptop.png" class="laptop-image" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

<section class="blog-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>Exchange rates</h2>
            <p>Data may be out of date. We calculate by new rates, that we get after submit data</p>
            <?foreach($exchangeRates as $sCode => $val):?>
                <div>
                    1$ = <?= $val?> <?= $currencies[$sCode]?>
                </div>
            <?endforeach;?>
        </div>
        <div class="row">
        </div>
    </div>
</section>


<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 about-text">
                <h2>What is Netpeak</h2>
                <h5>Netpeak is an innovative payment network and a new kind of money.</h5>

                <div>
                    <div>
                        <label>Enter amount of $</label>
                        <input type="text" class="form-control-sm numeric-only" id="base-currency-total">
                    </div>

                   <div>
                       <label>Select currency</label>
                       <select class="form-control-sm" id="currency-to-convert">
                           <?foreach($currencies as $currencyShortCode => $currencyName):?>
                               <option value="<?= $currencyShortCode?>">
                                   <?= $currencyName?>(<?= $currencyShortCode?>)
                               </option>
                           <?endforeach;?>
                       </select>
                   </div>

                    <div id="exchange-currency-result">
                        <label>You can get</label>
                        <span id="total-result" class="font-weight-bold"></span>
                        <span id="currency-short-code" class="font-weight-bold"></span>
                    </div>

                    <button class="site-btn sb-gradients" id="btn-convert-currency">Convert</button>
                </div>
            </div>
        </div>
        <div class="about-img">
            <img src="assets/img/about-img.png" alt="">
        </div>
    </div>
</section>
<!-- About section end -->




<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="row spad">
            <div class="col-md-6 col-lg-3 footer-widget">
                <img src="assets/img/logo.png" class="mb-4" alt="">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum.</p>
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
            </div>
            <div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
            </div>
            <div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
            </div>
            <div class="col-md-6 col-lg-3 footer-widget pl-lg-5 pl-3">
                <h5 class="widget-title">Follow Us</h5>
                <div class="social">
                    <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" class="google"><i class="fa fa-google-plus"></i></a>
                    <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-4 store-links text-center text-lg-left pb-3 pb-lg-0">
                    <a href=""><img src="assets/img/appstore.png" alt="" class="mr-2"></a>
                    <a href=""><img src="assets/img/playstore.png" alt=""></a>
                </div>
                <div class="col-lg-8 text-center text-lg-right">
                    <ul class="footer-nav">
                        <li><a href="">DPA</a></li>
                        <li><a href="">Terms of Use</a></li>
                        <li><a href="">Privacy Policy </a></li>
                        <li><a href="">support@company.com</a></li>
                        <li><a href="">(123) 456-7890</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--====== Javascripts & Jquery ======-->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/plugins/numeric-only.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
