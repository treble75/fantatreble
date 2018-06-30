

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Bacheca <span class="highlight"><?= $_SESSION['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/myteam">My Team</a></li>
                            <li class="active">Bacheca</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam" class="content-filter__link"><small>My Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_marcatori" class="content-filter__link"><small>My Team</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_statistiche" class="content-filter__link"><small>My Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_risultati" class="content-filter__link"><small>My Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_calendario" class="content-filter__link"><small>My Team</small>Calendario</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/utente/myteam_bacheca" class="content-filter__link"><small>My Team</small>Bacheca</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <div class="row">

                    <!-- Content -->
                    <div class="content col-md-8">

                        <!-- Staff Member -->
                        <div class="card card--clean alc-staff">
                            <div class="card__header card__header--has-btn">
                                <h4>Bacheca</h4>
                                <!-- <a class="btn btn-default btn-outline btn-xs card-header__button" href="#" title="Go to the Team">Go to the Team</a> -->
                            </div>
                            <div class="card__content">

                                <div class="card">
                                    <div class="card__content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="alc-staff__photo">
                                                    <img src="<?= base_url('/') ?>images/<?= $_SESSION['id_utente'] ?>.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alc-staff-inner">
                                                    <header class="alc-staff__header">
                                                        <h1 class="alc-staff__header-name"><span class="alc-staff__header-last-name" style="text-align: center"><?= $_SESSION['squadra'] ?></span></h1>
                                                        <!-- <span class="alc-staff__header-role">Coach</span> -->
                                                    </header>

                                                    <!-- Excerpt -->
                                                    <div class="alc-staff-excerpt" style="text-align: center">
                                                        <img src="<?= base_url('/') ?>images/maglie/<?= $utente[0]['maglia'] ?>.png" alt="">
                                                    </div>
                                                    <!-- Excerpt / End -->

                                                    <!-- Details -->
                                                    <dl class="alc-staff-details">
                                                        
                                                        <dt class="alc-staff-details__label">Presidente</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['nome'] . " " . $utente[0]['cognome'] ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">Partecipazioni</dt>
                                                        <dd class="alc-staff-details__value"><?= $this->mdl_utenti->getPartecipazioni($utente[0]['nome'],$utente[0]['cognome']) ?></dd>

                                                        <dt class="alc-staff-details__label">Miglior Piazzamento</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['piazzamento'] ?></dd>

                                                        <dt class="alc-staff-details__label">FantaMilioni</dt>
                                                        <dd class="alc-staff-details__value"><?= $this->mdl_utenti->getFantamilioni($utente[0]['id_utente']) ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">Quota residua:</dt>
                                                        <dd class="alc-staff-details__value"><?= $this->mdl_utenti->getOldDebito($_SESSION['id_utente']) . " €" ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">Scudetti</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['scudetto'] ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">Champions League</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['champions'] ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">Coppe Treble</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['coppa'] ?></dd>
                                                        
                                                        <dt class="alc-staff-details__label">SuperCoppe Treble</dt>
                                                        <dd class="alc-staff-details__value"><?= $utente[0]['supercoppa'] ?></dd>

                                                    </dl>
                                                    <!-- Details / End -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- Staff Member / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Player Newslog -->
                        <aside class="widget card widget--sidebar widget-newslog">
                            <div class="widget__title card__header">
                                <h4>News</h4>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="newslog">

                                    <?php
                                    if (count($news) > 0 ) {
                                        
                                        foreach ($news as $row) {
                                            
                                            switch ($row['tipologia']) {
                                                case ($row['tipologia'] == "acquisto"):
                                                    $type = 'acquisto';
                                                    $text_news = "Acquistato <strong><span style='color: #1892ED; font-size: 12px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span></strong> per " . $row['costo'] . " FantaMilioni";
                                                    break;
                                                case ($row['tipologia'] == "vendita");
                                                    $type = 'vendita';
                                                    $text_news = "Venduto <strong><span style='color: #1892ED; font-size: 12px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span></strong> per " . $row['costo'] . " FantaMilioni";
                                                    break;
                                                case ($row['tipologia'] == "infortunio");
                                                    $type = 'infortunato';
                                                    $text_news = "<strong><span style='color: #1892ED; font-size: 12px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span></strong> " . $row['testo_news'];
                                                    break;
                                                case ($row['tipologia'] == "cessione");
                                                    $type = 'cessione';
                                                    $text_news = "<strong><span style='color: #1892ED; font-size: 12px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span></strong> " . $row['testo_news'];
                                                    break;
                                            }
                                    ?>
                                        
                                        <li class="newslog__item newslog__item--<?= $type ?>">
                                            <div class="newslog__item-inner">
                                                <div class="newslog__content"><?= $text_news ?></div>
                                                <div class="newslog__date"><?= dataSettimanale($row['data']) ?></div>
                                            </div>
                                        </li>

                                    <?php
                                        }
                                    } 
                                    ?>
                                    
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Player Newslog / End -->
                        
                        <?php
                        $totale_trofei = $this->mdl_utenti->getTrofei($_SESSION['id_utente']);
                        if ($totale_trofei > 0) {
                            $trofei = $this->mdl_utenti->getDettaglioTrofei($_SESSION['nome'], $_SESSION['cognome']);
                        ?>
                        
                            <!-- Widget: Awards -->
                            <aside class="widget card widget--sidebar widget-awards">
                                <div class="widget__title card__header">
                                    <h4>Trofei</h4>
                                </div>
                                <div class="widget__content card__content">
                                    <div class="awards awards--slider">
                                        <?php
                                        foreach ($trofei as $row) {
                                        ?>
                                        
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>images/trofei/<?= $row['immagine'] ?>" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name"><?= $row['trofeo'] ?></h5>
                                                    <div class="awards__date">Stagione <?= $row['stagione'] ?></div>
                                                </div>
                                            </div>
                                        
                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </aside>
                            <!-- Widget: Awards / End -->
                        <?php
                        } ?>

                    </div>
                    <!-- Sidebar / End -->
                </div>

            </div>
        </div>

        <!-- Content / End -->

