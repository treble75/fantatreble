<!DOCTYPE html>
<html lang="it">
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <title>FantaTreble</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="FantaTreble">
        <meta name="author" content="Luca Guerrieri">
        <meta name="keywords" content="Fantacalcio Calcio Sport Campionato Treble">

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?= base_url('/') ?>assets/images/soccer/favicons/favicon.ico">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('/') ?>assets/images/soccer/favicons/favicon-120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('/') ?>assets/images/soccer/favicons/favicon-152.png">

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

        <!-- Google Web Fonts
        ================================================== -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

        <!-- CSS
        ================================================== -->
        <!-- Preloader CSS -->
        <link href="<?= base_url('/') ?>assets/css/preloader.css" rel="stylesheet">

        <!-- Vendor CSS -->
        <link href="<?= base_url('/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('/') ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url('/') ?>assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?= base_url('/') ?>assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
        <link href="<?= base_url('/') ?>assets/vendor/slick/slick.css" rel="stylesheet">

        <!-- Template CSS-->
        <link href="<?= base_url('/') ?>assets/css/style.css" rel="stylesheet">

        <!-- Custom CSS-->
        <link href="<?= base_url('/') ?>assets/css/custom.css" rel="stylesheet">

    </head>
    <body class="template-soccer">

        <div class="site-wrapper clearfix">
            <div class="site-overlay"></div>



            <!-- Header
            ================================================== -->

            <!-- Header Mobile -->
            <div class="header-mobile clearfix" id="header-mobile">
                <div class="header-mobile__logo">
                    <a href="_soccer_index.html"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="<?= base_url('/') ?>assets/images/soccer/logo@2x.png 2x" alt="FantaTreble" class="header-mobile__logo-img"></a>
                </div>
                <div class="header-mobile__inner">
                    <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
                    <span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
                </div>
            </div>

            <!-- Header Desktop -->
            <header class="header">

                <!-- Header Top Bar -->
                <div class="header__top-bar clearfix">
                    <div class="container">

                        <!-- Account Navigation -->
                        <ul class="nav-account">

                            <!-- Se sono loggato faccio vedere la voce di menu Profilo altrimenti Login --> 
                            <?php if (isset($_SESSION['id_utente'])) { ?>
                                <li class="nav-account__item"><a href="<?= base_url('/') ?>index.php/utente/profilo">Profilo</a></li>
                            <?php } else { ?>
                                <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register-tabs">Login</a></li>
                            <?php } ?>
                            <li class="nav-account__item nav-account__item--wishlist"><a href="_soccer_shop-wishlist.html">Wishlist <span class="highlight">8</span></a></li>
                            <li class="nav-account__item"><a href="#">Currency: <span class="highlight">USD</span></a>
                                <ul class="main-nav__sub">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>
                            <li class="nav-account__item nav-account__item--wishlist"><a href="<?= base_url('/') ?>index.php/home/regolamento">Regolamento</a></li>

                            <!-- Se sono loggato faccio vedere la voce di menu Logout --> 
                            <?php if (isset($_SESSION['id_utente'])) { ?>
                                <li class="nav-account__item nav-account__item--logout"><a href="<?= base_url('/') ?>index.php/utente/logout">Logout</a></li>
                            <?php } ?>
                        </ul>
                        <!-- Account Navigation / End -->

                    </div>
                </div>
                <!-- Header Top Bar / End -->

                <!-- Header Secondary -->
                <div class="header__secondary">
                    <div class="container">
                        <!-- Header Search Form / End -->
                        <ul class="info-block info-block--header">

                            <li class="info-block__item info-block__item--contact-secondary">
                                <svg role="img" class="df-icon df-icon--soccer-ball">
                                <use xlink:href="<?= base_url('/') ?>assets/images/icons-soccer.svg#soccer-ball"/>
                                </svg>
                                <h6 class="info-block__heading">Contact Us</h6>
                                <a class="info-block__link" href="mailto:info@alchemists.com">info@alchemists.com</a>
                            </li>

                            <li class="info-block__item info-block__item--shopping-cart">
                                <a href="#" class="info-block__link-wrapper">
                                    <div class="df-icon-stack df-icon-stack--bag">
                                        <svg role="img" class="df-icon df-icon--bag">
                                        <use xlink:href="<?= base_url('/') ?>assets/images/icons-basket.svg#bag"/>
                                        </svg>
                                        <svg role="img" class="df-icon df-icon--bag-handle">
                                        <use xlink:href="<?= base_url('/') ?>assets/images/icons-basket.svg#bag-handle"/>
                                        </svg>
                                    </div>
                                    <h6 class="info-block__heading">Your Bag (8 items)</h6>
                                    <span class="info-block__cart-sum">$256,30</span>
                                </a>

                                <!-- Dropdown Shopping Cart -->
                                <ul class="header-cart">
                                    <li class="header-cart__item">
                                        <figure class="header-cart__product-thumb">
                                            <a href="_soccer_shop-product.html">
                                                <img src="<?= base_url('/') ?>assets/images/soccer/samples/_soccer_cart-sm-1.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="header-cart__inner">
                                            <span class="header-cart__product-cat">Sneakers</span>
                                            <h5 class="header-cart__product-name"><a href="_soccer_shop-product.html">Sundown Sneaker</a></h5>
                                            <div class="header-cart__product-ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star empty"></i>
                                            </div>
                                            <div class="header-cart__product-sum">
                                                <span class="header-cart__product-price">$28.00</span> x <span class="header-cart__product-count">2</span>
                                            </div>
                                            <div class="fa fa-times header-cart__close"></div>
                                        </div>
                                    </li>
                                    <li class="header-cart__item">
                                        <figure class="header-cart__product-thumb">
                                            <a href="_soccer_shop-product.html">
                                                <img src="<?= base_url('/') ?>assets/images/soccer/samples/_soccer_cart-sm-4.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="header-cart__inner">
                                            <span class="header-cart__product-cat">Sneakers</span>
                                            <h5 class="header-cart__product-name"><a href="_soccer_shop-product.html">Atlantik Sneaker</a></h5>
                                            <div class="header-cart__product-ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="header-cart__product-sum">
                                                <span class="header-cart__product-price">$30.00</span> x <span class="header-cart__product-count">4</span>
                                            </div>
                                            <div class="fa fa-times header-cart__close"></div>
                                        </div>
                                    </li>
                                    <li class="header-cart__item">
                                        <figure class="header-cart__product-thumb">
                                            <a href="_soccer_shop-product.html">
                                                <img src="<?= base_url('/') ?>assets/images/soccer/samples/_soccer_cart-sm-2.jpg" alt="">
                                            </a>
                                        </figure>
                                        <div class="header-cart__inner">
                                            <span class="header-cart__product-cat">Sneakers</span>
                                            <h5 class="header-cart__product-name"><a href="_soccer_shop-product.html">Aquarium Sneaker</a></h5>
                                            <div class="header-cart__product-ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star empty"></i>
                                                <i class="fa fa-star empty"></i>
                                            </div>
                                            <div class="header-cart__product-sum">
                                                <span class="header-cart__product-price">$26.00</span> x <span class="header-cart__product-count">1</span>
                                            </div>
                                            <div class="fa fa-times header-cart__close"></div>
                                        </div>
                                    </li>
                                    <li class="header-cart__item header-cart__item--subtotal">
                                        <span class="header-cart__subtotal">Cart Subtotal</span>
                                        <span class="header-cart__subtotal-sum">$282.00</span>
                                    </li>
                                    <li class="header-cart__item header-cart__item--action">
                                        <a href="_soccer_shop-cart.html" class="btn btn-default btn-block">Go to Cart</a>
                                        <a href="_soccer_shop-checkout.html" class="btn btn-primary-inverse btn-block">Checkout</a>
                                    </li>
                                </ul>
                                <!-- Dropdown Shopping Cart / End -->

                            </li>

                            <!-- Icona utente -->
                            <?php if (isset($_SESSION['id_utente'])) { ?>
                                <li class="info-block__item info-block__item--contact-primary">
                                    <svg role="img" class="df-icon df-icon--whistle">
                                    <h6 class="info-block__heading">Bentornato <?= $_SESSION['utente'] ?></h6>
                                    </svg>
                                    <a class="info-block__link" href="#"><?= $_SESSION['squadra'] ?></a>
                                </li>
                                <li class="info-block__item info-block__item--contact-primary info-block-user">
                                    <svg role="img" class="df-icon">
                                    <img src="<?= base_url('/') ?>images/users/<?= $_SESSION['id_utente'] ?>.png" srcset="<?= base_url('/') ?>images/users/<?= $_SESSION['id_utente'] ?>.png" width="60px">
                                    </svg>
                                </li>
                            <?php } ?>
                            <!-- Icona utente FINE -->  

                        </ul>
                    </div>
                </div>
                <!-- Header Secondary / End -->

                <!-- Header Primary -->
                <div class="header__primary">
                    <div class="container">
                        <div class="header__primary-inner">

                            <!-- Header Logo -->
                            <div class="header-logo">
                                <a href="_soccer_index.html"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="<?= base_url('/') ?>assets/images/soccer/logo@2x.png 2x" alt="FantaTreble" class="header-logo__img"></a>
                            </div>
                            <!-- Header Logo / End -->

                            <!-- Main Navigation -->
                            <nav class="main-nav clearfix">
                                <ul class="main-nav__list">
                                    <li class="active"><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                                    <!-- Se non sono loggato non vedo alcune voci di menu -->
                                    <?php if (isset($_SESSION['id_utente']) && $_SESSION['utente'] == "Luca Guerrieri") { ?>
                                        <!-- L'Amministrazione la vede solo l'utente treble -->
                                        <li class=""><a href="#">Amministrazione</a>
                                            <div class="main-nav__megamenu clearfix">
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Giocatori</li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/crea_giocatore">Crea Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/assegna_giocatore">Assegna Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/modifica_giocatore">Modifica Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/modifica_squadre">Modifica Squadre</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/esegui_scambio">Esegui Scambio</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/modifica_voto">Modifica Voto</a></li>
                                                </ul>
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Utenti</li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/registra_utente">Registra Utente</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/modifica_utente">Modifica Utente</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/fantamilioni">Fantamilioni</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/quote">Quote</a></li>

                                                </ul>
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Campionati</li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/inserisci_voti">Inserisci Voti</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati">Inserisci Risultati Campionato</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati_Coppe">Inserisci Risultati Coppe</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/aggiorna_coppe">Aggiorna Coppe</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/blocco">Blocco Formazioni</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/gestione_rigoristi">Gestione Rigoristi</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['id_utente'])) { ?>
                                        <li class=""><a href="#"><?= $_SESSION['squadra'] ?></a>
                                            <ul class="main-nav__sub">
                                                <li><a href="<?= base_url('/') ?>index.php/utente/myteam">Rosa Giocatori</a></li>
                                                <li><a href="_soccer_team-overview.html">Schiera Formazione</a></li>
                                                <li><a href="_soccer_team-roster.html">Rigoristi</a>
                                                    <ul class="main-nav__sub-2">
                                                        <li><a href="_soccer_team-roster.html">Seleziona Rigoristi</a></li>
                                                        <li><a href="_soccer_team-roster-2.html">Rigoristi Schierati <span class="label label-danger"> New </span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="_soccer_shop-grid.html">Prepartita</a></li>
                                            </ul>
                                        </li>
                                        
                                        <?php
                                        //Leggo tutte le squadre per creare il menu
                                        $this->load->model('mdl_utenti');
                                        $squadreMenu = $this->mdl_utenti->getSquadre();
                                        ?>
                                        
                                        <li class=""><a href="#">Teams</a>
                                            <ul class="main-nav__sub">
                                                <?php
                                                foreach ($squadreMenu as $row) { ?>
                                                <li><a href="<?= base_url('/') ?>index.php/utente/team_bacheca/<?= $row['id_utente'] ?>" ><span>
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_utente'] ?>.png" >
                                                    </figure>
                                                </span>&nbsp;<?= $row['squadra'] ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        
                                    <?php } ?>
                                    <li class=""><a href="#">Competitions</a>
                                        <ul class="main-nav__sub">
                                            <li><a href="<?= base_url('/') ?>index.php/home/campionato">Treble League</a></li>
                                            <li><a href="<?= base_url('/') ?>index.php/home/champions">Champions League</a></li>
                                            <li><a href="<?= base_url('/') ?>index.php/home/coppa">Coppa Treble</a></li>
                                            <li><a href="<?= base_url('/') ?>index.php/home/supercoppa">SuperCoppa Treble</a></li>
                                            <li><a href="#">Formazioni Schierate</a>
                                                <ul class="main-nav__sub-2">
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/formazioni_campionato">Treble League</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/utente/formazioni_coppe">Coppe</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Statistiche</a>
                                                <ul class="main-nav__sub-2">
                                                    <li><a href="<?= base_url('/') ?>index.php/home/statistiche/1">Portieri</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/statistiche/2">Difensori</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/statistiche/3">Centrocampisti</a></li>
                                                    <li><a href="<?= base_url('/') ?>index.php/home/statistiche/4">Attaccanti</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url('/') ?>index.php/home/albo">Albo d'Oro</a></li>
                                            <li><a href="<?= base_url('/') ?>index.php/home/premi">Premi</a></li>
                                        </ul>
                                    </li>
                                </ul>


                                <!-- Pushy Panel Toggle -->
                                <a href="#" class="pushy-panel__toggle">
                                    <span class="pushy-panel__line"></span>
                                </a>
                                <!-- Pushy Panel Toggle / Eng -->
                            </nav>
                            <!-- Main Navigation / End -->
                        </div>
                    </div>
                </div>
                <!-- Header Primary / End -->

            </header>
            <!-- Header / End -->

            <!-- Pushy Panel - Dark -->
            <aside class="pushy-panel pushy-panel--dark">
                <div class="pushy-panel__inner">
                    <header class="pushy-panel__header">
                        <div class="pushy-panel__logo">
                            <a href="index.html"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="assets/images/soccer/logo@2x.png 2x" alt="FantaTreble"></a>
                        </div>
                    </header>
                    <div class="pushy-panel__content">

                        <!-- Widget: Posts -->
                        <aside class="widget widget-popular-posts widget--side-panel">
                            <div class="widget__content">

                                <ul class="posts posts--simple-list">
                                    <li class="posts__item posts__item--category-1">
                                        <figure class="posts__thumb">
                                            <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img19-xs.jpg" alt=""></a>
                                        </figure>
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">The team</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">The Team will make a small vacation to the Caribbean</a></h6>
                                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                        </div>
                                        <div class="posts__excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </li>
                                    <li class="posts__item posts__item--category-2">
                                        <figure class="posts__thumb">
                                            <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img18-xs.jpg" alt=""></a>
                                        </figure>
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">Injuries</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">Jenny Jackson won't be able to play the next game</a></h6>
                                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                        </div>
                                        <div class="posts__excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </li>
                                    <li class="posts__item posts__item--category-1">
                                        <figure class="posts__thumb">
                                            <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img8-xs.jpg" alt=""></a>
                                        </figure>
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">The Team</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">The team is starting a new power breakfast regimen</a></h6>
                                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                        </div>
                                        <div class="posts__excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </li>
                                    <li class="posts__item posts__item--category-3">
                                        <figure class="posts__thumb">
                                            <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img20-xs.jpg" alt=""></a>
                                        </figure>
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">The League</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">The Alchemists need two win the next two games</a></h6>
                                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                        </div>
                                        <div class="posts__excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </aside>
                        <!-- Widget: Posts / End -->

                        <!-- Widget: Tag Cloud -->
                        <aside class="widget widget--side-panel widget-tagcloud">
                            <div class="widget__title">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="widget__content">
                                <div class="tagcloud">
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Tag Cloud / End -->

                        <!-- Widget: Banner -->
                        <aside class="widget widget--side-panel widget-banner">
                            <div class="widget__content">
                                <figure class="widget-banner__img">
                                    <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/banner.jpg" alt="Banner"></a>
                                </figure>
                            </div>
                        </aside>
                        <!-- Widget: Banner / End -->

                    </div>
                    <a href="#" class="pushy-panel__back-btn"></a>
                </div>
            </aside>
            <!-- Pushy Panel - Dark / End -->