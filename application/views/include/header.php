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
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121974831-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-121974831-1');
        </script>

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?= base_url('/') ?>images/favicon.ico">
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
                    <a href="<?= base_url('/') ?>home/homepage"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="<?= base_url('/') ?>assets/images/soccer/logo@2x.png 2x" alt="FantaTreble" class="header-mobile__logo-img"></a>
                </div>
                <div class="header-mobile__inner">
                    <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
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
                                <li class="nav-account__item"><a href="<?= base_url('/') ?>utente/profilo">Profilo</a></li>
                            <?php } else { ?>
                                <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register-tabs">Login</a></li>
                            <?php } ?>
                            <li class="nav-account__item nav-account__item--wishlist"><a href="<?= base_url('/') ?>home/gallery">Gallery</a></li>
                            <li class="nav-account__item"><a href="http://www.fantagiaveno.it/quotazioni-calciatori.asp" target="_blank">Quotazioni <span class="highlight">GDS</span></a>
                            </li>
                            <li class="nav-account__item nav-account__item--wishlist"><a href="<?= base_url('/') ?>home/regolamento">Regolamento</a></li>

                            <!-- Se sono loggato faccio vedere la voce di menu Logout --> 
                            <?php if (isset($_SESSION['id_utente'])) { ?>
                                <li class="nav-account__item nav-account__item--logout"><a href="<?= base_url('/') ?>utente/logout">Logout</a></li>
                            <?php } ?>
                        </ul>
                        <!-- Account Navigation / End -->

                    </div>
                </div>
                <!-- Header Top Bar / End -->

                <?php
                //Qui setto l'active per i menu selezionati
                $active_amministrazione = "";
                $active_calciomercato   = "";
                $active_myteam          = "";
                $active_teams           = "";
                $active_competitions    = "";
                
                switch (@$active) {
                    case 1:
                        $active_amministrazione = "active";
                        break;
                    case 2;
                        $active_calciomercato = "active";
                        break;
                    case 3;
                        $active_myteam = "active";
                        break;
                    case 4;
                        $active_teams = "active";
                        break;
                    case 5;
                        $active_competitions = "active";
                        break;
                }
                ?>
                
                <!-- Header Secondary -->
                <div class="header__secondary">
                    <div class="container">
                        <!-- Header Search Form / End -->
                        <ul class="info-block info-block--header">

                            <li class="info-block__item info-block__item--contact-secondary">
                                <svg role="img" class="df-icon df-icon--soccer-ball">
                                <use xlink:href="<?= base_url('/') ?>assets/images/icons-soccer.svg#soccer-ball"/>
                                </svg>
                                <h6 class="info-block__heading">Benvenuto al FantaTreble</h6>
                                <a class="info-block__link" href="<?= base_url('/') ?>home/homepage">Homepage</a>
                            </li>

                            <!-- Icona utente -->
                            <?php if (isset($_SESSION['id_utente'])) { ?>
                                <li class="info-block__item info-block__item--contact-primary">
                                    <svg role="img" class="df-icon df-icon--whistle">
                                    <h6 class="info-block__heading">Bentornato <?= $_SESSION['utente'] ?></h6>
                                    </svg>
                                    <a class="info-block__link" href="<?= base_url('/') ?>utente/myteam"><?= $_SESSION['squadra'] ?></a>
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
                                <a href="<?= base_url('/') ?>home/homepage"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="<?= base_url('/') ?>assets/images/soccer/logo@2x.png 2x" alt="FantaTreble" class="header-logo__img"></a>
                            </div>
                            <!-- Header Logo / End -->

                            <!-- Main Navigation -->
                            <nav class="main-nav clearfix">
                                <ul class="main-nav__list">
                                    <!-- Se non sono loggato non vedo alcune voci di menu -->
                                    <?php if (isset($_SESSION['id_utente']) && $_SESSION['utente'] == "Luca Guerrieri") { ?>
                                        <!-- L'Amministrazione la vede solo l'utente treble -->
                                        <li class="<?= $active_amministrazione ?>"><a href="#">Amministrazione</a>
                                            <div class="main-nav__megamenu clearfix">
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Giocatori</li>
                                                    <li><a href="<?= base_url('/') ?>utente/crea_giocatore">Crea Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/assegna_giocatore">Assegna Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/modifica_giocatore">Modifica Giocatore</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/modifica_squadre">Modifica Squadre</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/esegui_scambio">Esegui Scambio</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/modifica_voto">Modifica Voto</a></li>
                                                </ul>
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Utenti</li>
                                                    <li><a href="<?= base_url('/') ?>utente/registra_utente">Registra Utente</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/modifica_utente">Modifica Utente</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/fantamilioni">Fantamilioni</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/quote">Quote</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/news_desktop">News Desktop</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/news_utente">News Utente</a></li>
                                                </ul>
                                                <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                                    <li class="main-nav__title">Campionati</li>
                                                    <li><a href="<?= base_url('/') ?>utente/inserisci_voti">Inserisci Voti</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/inserisci_risultati">Inserisci Risultati Campionato</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/inserisci_risultati_Coppe">Inserisci Risultati Coppe</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/aggiorna_coppe">Aggiorna Coppe</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/blocco">Blocco Formazioni</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/gestione_rigoristi">Gestione Rigoristi</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/topmatch">Top Match</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['id_utente'])) { ?>
                                        <li class="<?= $active_calciomercato ?>"><a href="#">Calciomercato</a>
                                            <ul class="main-nav__sub">
                                                <li><a href="<?= base_url('/') ?>utente/calciomercato">Offerte</a></li>
                                                <li><a href="<?= base_url('/') ?>utente/trattative">Trattative Aperte</a></li>
                                                <li><a href="<?= base_url('/') ?>utente/trasferimenti">Trasferimenti</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $active_myteam ?>"><a href="#"><?= $_SESSION['squadra'] ?></a>
                                            <ul class="main-nav__sub">
                                                <li><a href="<?= base_url('/') ?>utente/myteam">Rosa Giocatori</a></li>
                                                <li><a href="<?= base_url('/') ?>utente/schiera_formazione">Schiera Formazione</a></li>
                                                <li><a href="#">Rigoristi</a>
                                                    <ul class="main-nav__sub-2">
                                                        <li><a href="<?= base_url('/') ?>utente/rigoristi">Seleziona Rigoristi</a></li>
                                                        <li><a href="<?= base_url('/') ?>utente/elenco_rigoristi">Rigoristi Schierati</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?= base_url('/') ?>home/prepartita">Prepartita</a></li>
                                            </ul>
                                        </li>

                                        <?php
                                        //Leggo tutte le squadre per creare il menu
                                        $this->load->model('mdl_utenti');
                                        $squadreMenu = $this->mdl_utenti->getSquadre();
                                        ?>

                                        <li class="<?= $active_teams ?>"><a href="#">Teams</a>
                                            <ul class="main-nav__sub">
                                                <?php
                                                foreach ($squadreMenu as $row) {
                                                    if ($_SESSION['id_utente'] != $row['id_utente']) {
                                                        ?>
                                                        <li><a href="<?= base_url('/') ?>utente/team_bacheca/<?= $row['id_utente'] ?>" ><span>
                                                                    <figure class="widget-results__team-logo">
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_utente'] ?>.png" >
                                                                    </figure>
                                                                </span>&nbsp;<?= $row['squadra'] ?></a></li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>

                                    <?php } ?>
                                    <li class="<?= $active_competitions ?>"><a href="#">Competitions</a>
                                        <ul class="main-nav__sub">
                                            <li><a href="<?= base_url('/') ?>home/campionato">Treble League</a></li>
                                            <li><a href="<?= base_url('/') ?>home/champions">Champions League</a></li>
                                            <li><a href="<?= base_url('/') ?>home/coppa">Coppa Treble</a></li>
                                            <li><a href="<?= base_url('/') ?>home/supercoppa">SuperCoppa Treble</a></li>
                                            <li><a href="#">Formazioni Schierate</a>
                                                <ul class="main-nav__sub-2">
                                                    <li><a href="<?= base_url('/') ?>utente/formazioni_campionato">Treble League</a></li>
                                                    <li><a href="<?= base_url('/') ?>utente/formazioni_coppe">Coppe</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Statistiche Giocatori</a>
                                                <ul class="main-nav__sub-2">
                                                    <li><a href="<?= base_url('/') ?>home/statistiche/1">Portieri</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/statistiche/2">Difensori</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/statistiche/3">Centrocampisti</a></li>
                                                    <li><a href="<?= base_url('/') ?>home/statistiche/4">Attaccanti</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url('/') ?>home/albo">Albo d'Oro</a></li>
                                            <!-- <li><a href="<?= base_url('/') ?>home/premi">Premi</a></li> -->
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
                            <a href="<?= base_url('/') ?>home/homepage"><img src="<?= base_url('/') ?>assets/images/soccer/logoFT.png" srcset="assets/images/soccer/logo@2x.png 2x" alt="FantaTreble"></a>
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
                                <h4>Tags Popolari</h4>
                            </div>
                            <div class="widget__content">
                                <div class="tagcloud">
                                    <a href="<?= base_url('/') ?>home/campionato" class="btn btn-primary btn-xs btn-outline btn-sm">Treble League</a>
                                    <a href="<?= base_url('/') ?>home/champions" class="btn btn-primary btn-xs btn-outline btn-sm">Champions League</a>
                                    <a href="<?= base_url('/') ?>home/coppa" class="btn btn-primary btn-xs btn-outline btn-sm">Coppa Treble</a>
                                    <a href="<?= base_url('/') ?>home/albo" class="btn btn-primary btn-xs btn-outline btn-sm">Albo d'oro</a>
                                    <a href="<?= base_url('/') ?>home/albo_statistiche" class="btn btn-primary btn-xs btn-outline btn-sm">Precedenti Storici</a>
                                    <a href="<?= base_url('/') ?>utente/trasferimenti" class="btn btn-primary btn-xs btn-outline btn-sm">Trasferimenti</a>
                                    <a href="<?= base_url('/') ?>home/statistiche/4" class="btn btn-primary btn-xs btn-outline btn-sm">Statistiche Attaccanti</a>
                                    <a href="<?= base_url('/') ?>home/regolamento" class="btn btn-primary btn-xs btn-outline btn-sm">Regolamento</a>
                                    <a href="<?= base_url('/') ?>utente/calciomercato" class="btn btn-primary btn-xs btn-outline btn-sm">Calciomercato</a>
                                    <a href="<?= base_url('/') ?>utente/elenco_rigoristi" class="btn btn-primary btn-xs btn-outline btn-sm">Rigoristi</a>
                                    <a href="<?= base_url('/') ?>utente/myteam_bacheca" class="btn btn-primary btn-xs btn-outline btn-sm">Bacheca</a>
                                    <a href="<?= base_url('/') ?>utente/formazioni_campionato" class="btn btn-primary btn-xs btn-outline btn-sm">Formazioni Schierate</a>
                                    <a href="<?= base_url('/') ?>utente/schiera_formazione" class="btn btn-primary btn-xs btn-outline btn-sm">Schiera Formazione</a>
                                    <a href="<?= base_url('/') ?>utente/trattative" class="btn btn-primary btn-xs btn-outline btn-sm">Trattative Aperte</a>
                                    <a href="<?= base_url('/') ?>home/stagioni_precedenti" class="btn btn-primary btn-xs btn-outline btn-sm">Stagioni Precedenti</a>
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