<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
<title>Priroda leči</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7CPoppins:300,400,500,600,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/sweetalert.css">

    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
</head>

<body>
    <div class="ie-panel">
        <a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- Header Default-->
        <header class="section page-header page-header-sidebar">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-sidebar" data-xl-device-layout="rd-navbar-sidebar" data-xxl-layout="rd-navbar-sidebar" data-xxl-device-layout="rd-navbar-sidebar" data-md-stick-up-offset="80px" data-lg-stick-up-offset="46px" data-md-stick-up="true" data-lg-stick-up="true">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggles" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand -->
                                <div class="rd-navbar-brand" id="logo-header">
                                    <a class="brand" href="index.php"><img src="images/logo-half-color.png" alt="" width="166" height="57" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Početna</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#oNama">O nama</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#proizvod">Proizvodi</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#kontakt">Kontakt</a>
                                        </li>
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="kupovina.php">Kupovina</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Breadcrumbs-->
        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/bg-image-06-1920x455.jpg);">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">Katalog proizvoda</h2>
            </div>
        </section>
        <section class="section section-lg bg-gray-100 text-center">
            <div class="container">
                <div class="row row-50">
                    <div class=" col-lg-1 col-xl-1"></div>

                    <div class=" col-lg-1 col-xl-1"></div>
                </div>
                <!--<div class="pagination-media-wrap">
                    <ul class="pagination-media">
                        <li><a class="pagination-media-active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><span class="pagination-media-disabled">...</span></li>
                        <li><a href="#">12</a></li>
                    </ul>
                </div>-->
            </div>

            <!--Forma za narucivanje-->
            <div class="col-lg-12 ">
                <div class="block-md text-center ">
                <h2 class="breadcrumbs-custom-title">Naručite lako</h2>
                    <form class="rd-form rd-mailform" id="orderForm" data-form-output="form-output-global" data-form-type="contact" method="post" enctype="multipart/form-data">
                        <div class="row row-20">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="name" type="text" name="name" onblur="$(this).valid()">
                                    <label class="form-label" for="name">Ime</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="lastname" type="text" name="lastname" onblur="$(this).valid()">
                                    <label class="form-label" for="lastname">Prezime</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="address" type="text" name="address" onblur="$(this).valid()">
                                    <label class="form-label" for="lastname">Adresa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="zip" type="text" name="zip" onblur="$(this).valid()">
                                    <label class="form-label" for="lastname">Poštanski broj</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="phone" type="text" name="phone" onblur="$(this).valid()">
                                    <label class="form-label" for="phone">Telefon</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control" id="email" type="email" name="email" onblur="$(this).valid()">
                                    <label class="form-label" for="email">E-mail</label>
                                </div>
                            </div>
                            <div class=" col-lg-1 col-xl-1"></div>
                            <div class="col-sm-6 col-lg-5 col-xl-5">
                                <div class="product-item">
                                    <div class="product-item-image">
                                        <img src="images/3.png" alt="" width="300" height="500" />
                                    </div>
                                    <div class="product-item-caption">
                                        <h6 class="product-title">NONBAK</h6>
                                        <h4 class="product-price"><span>1900,00 RSD</span><span class="old-price"></span></h4><input class="form-input form-control quantity-button" placeholder="0" value="0" id="nonbak" name="nonbak" onblur="$(this).valid()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xl-5">
                                <div class="product-item">
                                    <div class="product-item-image">
                                       <img src="images/2.png" alt="" width="300" height="500" />
                                    </div>
                                    <div class="product-item-caption">
                                        <h6 class="product-title">POSTKOVID
                                            </a></h6>
                                        <h4 class="product-price"><span>1900,00 RSD </span><span class="old-price"></span></h4><input class="form-input form-control quantity-button" placeholder="0" value="0" id="postkovid" name="postkovid" onblur="$(this).valid()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap">
                                    <label class="form-label" for="napomena">Napomena</label>
                                    <textarea class="form-input form-control" id="napomena" name="napomena" onblur="$(this).valid()"></textarea>
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="button button-block-form button-secondary-light" type="submit">Naruči</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Footer Classic-->
        <footer class="footer-classic context-dark parallax-container " data-parallax-img="images/bg-footer-1-1920x725.jpg ">
            <div class="parallax-content dark-layout ">
                <div class="section-sm ">
                    <div class="container ">
                        <div class="row row-30 ">
                            <div class="col-sm-6 col-lg-3 ">
                                <div class="footer-classic-item ">
                                    <h4>Društvene mreže</h4>
                                    <ul class="list-inline list-inline-xs list-inline-middle ">
                                        <li>
                                            <a class="icon-square fa-instagram " href="# "></a>
                                        </li>
                                        <li>
                                            <a class="icon-square fa-facebook-f " href="# "></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 ">
                                <div class="footer-classic-item ">
                                    <h4>Vreme naručivanja</h4>
                                    <div class="list-terms ">
                                        <dl>
                                            <dt>Ponedeljak - Nedelja:</dt>
                                            <dd>00 - 24</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 ">
                                <div class="footer-classic-item ">
                                    <h4>Brzi linkovi</h4>
                                    <ul class="list-link ">
                                        <li><a href="index.php">Početna</a>
                                        </li>
                                        <li><a href="index.php#oNama">O nama</a>
                                        </li>
                                        <li><a href="index.php#proizvod">Proizvodi</a>
                                        </li>
                                        <li><a href="index.php#kontakt">Kontakt</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 ">
                                <div class="footer-classic-item ">
                                    <h4>Kontakt</h4>
                                    <ul class="list-contacts ">
                                        <li class="centered "><span class="icon icon-lg icon-secondary mdi mdi-cellphone-android "></span><a class="link-phone " href="tel:# ">+1 (409) 987–5874</a></li>
                                        <li class="centered "><span class="icon icon-lg icon-secondary mdi mdi-email-outline "></span><a href="mailto:# ">info@demolink.org</a></li>
                                        <li><span class="icon icon-xl icon-secondary mdi mdi-map-marker "></span><a href="# ">Washington, USA 6036 Richmond hwy., Alexandria, VA, 2230</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-classic-bottom ">
                    <div class="container ">
                        <p class="rights "><span>Designed by <a href="https://resivoje.com/">RešivoJe</a></span> <span>&copy;&nbsp;</span><span class="copyright-year "></span><span>&nbsp;</span><span></span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/jquery.js"></script>
    <script src="vendors/jquery-3.3.1.min.js"></script>
    <script src="vendors/jquery.easing.1.3.min.js"></script>
    <script src="js/core.min.js">
    </script>
    <script src="js/script.js"></script>
    <script src="js/mail.js"></script>
    <script src="js/recaptcha.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

    <!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
    </script>
    <!-- End Google Tag Manager -->
</body>

</html>