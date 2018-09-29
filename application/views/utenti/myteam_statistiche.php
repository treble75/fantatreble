

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Statistiche <span class="highlight"><?= $_SESSION['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>utente/myteam">My Team</a></li>
                            <li class="active">Statistiche</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/myteam" class="content-filter__link"><small>My Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/myteam_marcatori" class="content-filter__link"><small>My Team</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>utente/myteam_statistiche" class="content-filter__link"><small>My Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/myteam_risultati" class="content-filter__link"><small>My Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/myteam_calendario" class="content-filter__link"><small>My Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/myteam_bacheca" class="content-filter__link"><small>My Team</small>Bacheca</a></li>
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

                        <div class="row">

                            <div class="col-md-6">

                                <!-- Widget: Team Stats -->
                                <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                                    <div class="widget__title card__header">
                                        <h4>Statistiche 2018/19</h4>
                                        <span class="team-leader__player-position"  style="text-transform: capitalize;">* Media per partita giocata</span>
                                    </div>
                                    <div class="widget__content card__content">
                                        <ul class="team-stats-box">
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                $media = ( $this->mdl_team->getMediaGolFatti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Reti realizzate</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots-ot">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-gate.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                $media = ( $this->mdl_team->getMediaGolSubiti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Gol Subiti</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-shots.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                if ($giornata_media > 0) {
                                                    $media = ( $this->mdl_team->getMediaAssistFatti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                }
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Assist</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--assists">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/yellow-red_card.png" alt="" class="team-stats__icon-primary">
                                                </div>
                                                <?php
                                                $partite_giocate = $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']);
                                                $totale_cartellini = $this->mdl_team->getTotaleCartellini($_SESSION['id_utente']);
                                                if ($giornata_media > 0) {
                                                    $media = ($totale_cartellini / $partite_giocate);
                                                }
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Numero Cartellini</div>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget: Team Stats / End -->

                            </div>
                            <div class="col-md-6">

                                <!-- Widget: Team Leaders -->
                                <aside class="widget widget--sidebar card card--has-table widget-leaders">
                                    <div class="widget__title card__header">
                                        <h4>Top Players</h4>
                                        <span class="team-leader__player-position"  style="text-transform: capitalize;">* MPP : Media gol+assist per partite in cui è stato schierato</span>
                                    </div>
                                    <div class="widget__content card__content">

                                        <!-- Leader: Points -->
                                        <div class="table-responsive">
                                            <table class="table team-leader">
                                                <thead>
                                                    <tr>
                                                        <th class="team-leader__type">Treble League 2018 / 19</th>
                                                        <th class="team-leader__goals">Gol</th>
                                                        <th class="team-leader__gp">Ass</th>
                                                        <th class="team-leader__avg">MPP</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($topplayer as $row) {
                                                        ?>
                                                        <tr>
                                                            <td class="team-leader__player">
                                                                <div class="team-leader__player-info">
                                                                    <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                        <img src="<?= base_url('/') ?>images/giocatori/<?= $row['id_giocatore'] ?>.png" alt="">
                                                                    </figure>
                                                                    <div class="team-leader__player-inner">
                                                                        <?php
                                                                        if (strlen($row['cognome']) > 14){
                                                                            $cognome = substr($row['cognome'], 0, 13) . ".";
                                                                        } else {
                                                                            $cognome = $row['cognome'];
                                                                        }
                                                                        ?>
                                                                        <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $cognome . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                        <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="team-leader__goals"><?= $this->mdl_team->getGolCampionato($row['id_giocatore']) ?></td>
                                                            <td class="team-leader__gp"><?= $this->mdl_team->getAssist($row['id_giocatore']) ?></td>
                                                            <?php
                                                            $partite_schierato = $this->mdl_team->getPartite_schierato($row['id_giocatore']);
                                                            $mpp = ($row['totale_bonus'] / $partite_schierato);
                                                            ?>
                                                            <td class="team-leader__avg">
                                                                <div class="circular">
                                                                    <div class="circular__bar" data-percent="<?= ( $mpp * 100 ) ?>">
                                                                        <span class="circular__percents"><?= number_format($mpp, 2) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Leader: Points / End -->

                                    </div>
                                </aside>
                                <!-- Widget: Team Leaders / End -->

                            </div>
                        </div>

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Latest Results -->
                        <aside class="widget card widget--sidebar widget-results">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>Top Match</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Partite con maggior fantapunti</span>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="widget-results__list">

                                    <?php
                                    if ($bestmatch1[0]['punteggio1'] >= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[0]['punteggio1'] ?> - <?= $bestmatch1[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[0]['punteggio1'] + $bestmatch1[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 0;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($bestmatch1[0]['punteggio1'] <= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[0]['punteggio1'] ?> - <?= $bestmatch2[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[0]['punteggio1'] + $bestmatch2[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 0;
                                    $b = 1;
                                    }
                                    ?>    
                                        
                                    <?php
                                    if ($a == 1 && $b == 0 && $bestmatch1[1]['punteggio1'] >= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[1]['punteggio1'] ?> - <?= $bestmatch1[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[1]['punteggio1'] + $bestmatch1[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 0;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($a == 1 && $b == 0 && $bestmatch1[1]['punteggio1'] <= $bestmatch2[0]['punteggio2']) {
                                    ?>    
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[0]['punteggio1'] ?> - <?= $bestmatch2[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[0]['punteggio1'] + $bestmatch2[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 1;
                                    }
                                    ?>   
                                        
                                    <?php
                                    if ($a == 0 && $b == 1 && $bestmatch1[0]['punteggio1'] >= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[0]['punteggio1'] ?> - <?= $bestmatch1[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[0]['punteggio1'] + $bestmatch1[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 1;
                                    }
                                    ?>     
                                        
                                    <?php
                                    if ($a == 0 && $b == 1 && $bestmatch1[0]['punteggio1'] <= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[1]['punteggio1'] ?> - <?= $bestmatch2[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[1]['punteggio1'] + $bestmatch2[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 0;
                                    $b = 2;
                                    }
                                    ?>      
                                    
                                    <?php
                                    if ($a == 2 && $b == 0 && $bestmatch1[2]['punteggio1'] >= $bestmatch2[0]['punteggio2'] && $bestmatch1[2]['punteggio1'] >= $bestmatch2[1]['punteggio2'] && $bestmatch1[2]['punteggio1'] >= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[2]['punteggio1'] ?> - <?= $bestmatch1[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[2]['punteggio1'] + $bestmatch1[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 3;
                                    $b = 0;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($a == 0 && $b == 2 && $bestmatch1[0]['punteggio1'] <= $bestmatch2[2]['punteggio2'] && $bestmatch1[1]['punteggio1'] <= $bestmatch2[2]['punteggio2'] && $bestmatch1[2]['punteggio1'] <= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[2]['punteggio1'] ?> - <?= $bestmatch2[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[2]['punteggio1'] + $bestmatch2[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 0;
                                    $b = 3;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($a == 2 && $b == 0 && $bestmatch1[2]['punteggio1'] <= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[0]['punteggio1'] ?> - <?= $bestmatch2[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[0]['punteggio1'] + $bestmatch2[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 1;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 2 && $b == 1 && $bestmatch1[2]['punteggio1'] >= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[2]['punteggio1'] ?> - <?= $bestmatch1[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[2]['punteggio1'] + $bestmatch1[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 3;
                                    $b = 1;
                                    }
                                    ?>     
                                        
                                    <?php
                                    if ($a == 3 && $b == 0 && $bestmatch1[3]['punteggio1'] >= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[3]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[3]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[3]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[3]['punteggio1'] ?> - <?= $bestmatch1[3]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[3]['punteggio1'] + $bestmatch1[3]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 4;
                                    $b = 0;
                                    }
                                    ?> 
                                        
                                    <?php
                                    if ($a == 3 && $b == 0 && $bestmatch1[3]['punteggio1'] <= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[0]['punteggio1'] ?> - <?= $bestmatch2[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[0]['punteggio1'] + $bestmatch2[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 3;
                                    $b = 1;
                                    }
                                    ?>     
                                        
                                    <?php
                                    if ($a == 4 && $b == 0 && $bestmatch1[4]['punteggio1'] >= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[4]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[4]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[4]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[4]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[4]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[4]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[4]['punteggio1'] ?> - <?= $bestmatch1[4]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[4]['punteggio1'] + $bestmatch1[4]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[4]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[4]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[4]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 5;
                                    $b = 0;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($a == 3 && $b == 1 && $bestmatch1[3]['punteggio1'] >= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[3]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[3]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[3]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[3]['punteggio1'] ?> - <?= $bestmatch1[3]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[3]['punteggio1'] + $bestmatch1[3]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 4;
                                    $b = 1;
                                    }
                                    ?>    
                                        
                                    <?php
                                    if ($a == 4 && $b == 0 && $bestmatch1[4]['punteggio1'] <= $bestmatch2[0]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[0]['punteggio1'] ?> - <?= $bestmatch2[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[0]['punteggio1'] + $bestmatch2[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 4;
                                    $b = 1;
                                    }
                                    ?>     
                                        
                                    <?php
                                    if ($a == 0 && $b == 2 && $bestmatch1[0]['punteggio1'] >= $bestmatch2[2]['punteggio2']) {
                                    ?>    
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[0]['punteggio1'] ?> - <?= $bestmatch1[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[0]['punteggio1'] + $bestmatch1[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 2;
                                    }
                                    ?>
                                        
                                    <?php
                                    if ($a == 1 && $b == 1 && $bestmatch1[1]['punteggio1'] >= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[1]['punteggio1'] ?> - <?= $bestmatch1[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[1]['punteggio1'] + $bestmatch1[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 1;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 1 && $b == 1 && $bestmatch1[1]['punteggio1'] <= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[1]['punteggio1'] ?> - <?= $bestmatch2[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[1]['punteggio1'] + $bestmatch2[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 2;
                                    }
                                    ?> 
                                        
                                    <?php
                                    if ($a == 0 && $b == 3 && $bestmatch1[0]['punteggio1'] <= $bestmatch2[3]['punteggio2'] && $bestmatch1[1]['punteggio1'] <= $bestmatch2[3]['punteggio2'] && $bestmatch1[2]['punteggio1'] <= $bestmatch2[3]['punteggio2'] && $bestmatch1[3]['punteggio1'] <= $bestmatch2[3]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[3]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[3]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[3]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[3]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[3]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[3]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[3]['punteggio1'] ?> - <?= $bestmatch2[3]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[3]['punteggio1'] + $bestmatch2[3]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[3]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[3]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[3]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 0;
                                    $b = 4;
                                    }
                                    ?>   
                                        
                                    <?php
                                    if ($a == 0 && $b == 3 && $bestmatch1[0]['punteggio1'] >= $bestmatch2[3]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[0]['punteggio1'] ?> - <?= $bestmatch1[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[0]['punteggio1'] + $bestmatch1[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 3;
                                    }
                                    ?>   
                                        
                                    <?php
                                    if ($a == 1 && $b == 2 && $bestmatch1[1]['punteggio1'] <= $bestmatch2[2]['punteggio2'] && $bestmatch1[2]['punteggio1'] <= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[2]['punteggio1'] ?> - <?= $bestmatch2[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[2]['punteggio1'] + $bestmatch2[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 3;
                                    }
                                    ?>   
                                        
                                    <?php
                                    if ($a == 1 && $b == 2 && $bestmatch1[1]['punteggio1'] >= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[1]['punteggio1'] ?> - <?= $bestmatch1[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[1]['punteggio1'] + $bestmatch1[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 2;
                                    }
                                    ?>     
                                        
                                    <?php
                                    if ($a == 2 && $b == 1 && $bestmatch1[2]['punteggio1'] <= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[1]['punteggio1'] ?> - <?= $bestmatch2[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[1]['punteggio1'] + $bestmatch2[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 2;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 2 && $b == 2 && $bestmatch1[2]['punteggio1'] >= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[2]['punteggio1'] ?> - <?= $bestmatch1[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[2]['punteggio1'] + $bestmatch1[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 3;
                                    $b = 2;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 3 && $b == 1 && $bestmatch1[3]['punteggio1'] <= $bestmatch2[1]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[3]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[3]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[3]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[3]['punteggio1'] ?> - <?= $bestmatch1[3]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[1]['punteggio1'] + $bestmatch2[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[3]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[3]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[3]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 3;
                                    $b = 2;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 1 && $b == 3 && $bestmatch1[1]['punteggio1'] >= $bestmatch2[3]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[1]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[1]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[1]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[1]['punteggio1'] ?> - <?= $bestmatch1[1]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[1]['punteggio1'] + $bestmatch1[1]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[1]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[1]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[1]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 3;
                                    }
                                    ?> 
                                        
                                    <?php
                                    if ($a == 1 && $b == 3 && $bestmatch1[1]['punteggio1'] <= $bestmatch2[3]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[3]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[3]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[3]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[3]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[3]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[3]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[3]['punteggio1'] ?> - <?= $bestmatch2[3]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[3]['punteggio1'] + $bestmatch2[3]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[3]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[3]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[3]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 4;
                                    }
                                    ?>  
                                        
                                    <?php
                                    if ($a == 0 && $b == 4 && $bestmatch1[0]['punteggio1'] >= $bestmatch2[4]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch1[0]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch1[0]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch1[0]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch1[0]['punteggio1'] ?> - <?= $bestmatch1[0]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch1[0]['punteggio1'] + $bestmatch1[0]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch1[0]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch1[0]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch1[0]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 1;
                                    $b = 4;
                                    }
                                    ?>      
                                        
                                    <?php
                                    if ($a == 0 && $b == 4 && $bestmatch1[0]['punteggio1'] <= $bestmatch2[4]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[4]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[4]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[4]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[4]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[4]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[4]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[4]['punteggio1'] ?> - <?= $bestmatch2[4]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[4]['punteggio1'] + $bestmatch2[4]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[4]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[4]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[4]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 0;
                                    $b = 5;
                                    }
                                    ?>      
                                        
                                    <?php
                                    if ($a == 2 && $b == 2 && $bestmatch1[2]['punteggio1'] <= $bestmatch2[2]['punteggio2']) {
                                    ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($bestmatch2[2]['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $bestmatch2[2]['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $bestmatch2[2]['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $bestmatch2[2]['punteggio1'] ?> - <?= $bestmatch2[2]['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= ( $bestmatch2[2]['punteggio1'] + $bestmatch2[2]['punteggio2']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $bestmatch2[2]['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($bestmatch2[2]['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($bestmatch2[2]['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->
                                    
                                    <?php
                                    $a = 2;
                                    $b = 3;
                                    }
                                    ?>     
                                        
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Latest Results / End -->

                    </div>
                    <!-- Sidebar / End -->
                </div>

                <div class="row">

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Assistmen</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MPP : Media assist per partite in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Treble League 2018 / 19</th>
                                                <th class="team-leader__gp">Ass</th>
                                                <th class="team-leader__avg">MPP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($assistmen as $row) {
                                                ?>
                                                <tr>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $row['id_giocatore'] ?>.png" alt="">
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-leader__gp"><?= $row['totale_assist'] ?></td>
                                                    <?php
                                                    $partite_schierato = $this->mdl_team->getPartite_schierato($row['id_giocatore']);
                                                    $mpp = ($row['totale_assist'] / $partite_schierato);
                                                    ?>
                                                    <td class="team-leader__avg">
                                                        <div class="circular">
                                                            <div class="circular__bar" data-percent="<?= ( $mpp * 100 ) ?>">
                                                                <span class="circular__percents"><?= number_format($mpp, 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Giocatori Più Fallosi</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MPP : Media cartellino per partite in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Treble League 2018 / 19</th>
                                                <th class="team-leader__goals"><img src="<?= base_url('/') ?>images/ammo.png"></th>
                                                <th class="team-leader__gp"><img src="<?= base_url('/') ?>images/espu.png"></th>
                                                <th class="team-leader__avg">MPP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($fallosi as $row) {
                                                ?>
                                                <tr>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $row['id_giocatore'] ?>.png" alt="">
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-leader__goals"><?= $this->mdl_team->getSommaAmmonizioniSchierato($row['id_giocatore']) ?></td>
                                                    <td class="team-leader__gp"><?= $this->mdl_team->getSommaEspulsioniSchierato($row['id_giocatore']) ?></td>
                                                    <?php
                                                    $partite_schierato = $this->mdl_team->getPartite_schierato($row['id_giocatore']);
                                                    $mpp = ($row['totale_cartellini'] / $partite_schierato);
                                                    ?>
                                                    <td class="team-leader__avg">
                                                        <div class="circular">
                                                            <div class="circular__bar" data-percent="<?= ( $mpp * 100 ) ?>">
                                                                <span class="circular__percents"><?= number_format($mpp, 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>
                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Flop Media Voto</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MFV : Media Voto per partite ( almeno 30% ) in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Treble League 2018 / 19</th>
                                                <th class="team-leader__gp">Presenze</th>
                                                <th class="team-leader__avg">MFV</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($flopmediavoto as $row) {
                                                $percentuale_presenze = ($row['presenze'] * 100) / $giornata_media;

                                                //Impostare soglia percentuale presenze: 30 equivale al 30% delle partite giocate del FantaTreble
                                                if ($percentuale_presenze >= 30 && $i <= 5) {
                                                    ?>
                                                    <tr>
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/giocatori/<?= $row['id_giocatore'] ?>.png" alt="">
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                    <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__gp"><?= $row['presenze'] ?></td>
                                                        <?php
                                                        //$partite_schierato = $this->mdl_team->getPartite_schierato($row['id_giocatore']);
                                                        //$mpp = ($row['totale_assist'] / $partite_schierato);
                                                        ?>
                                                        <td class="team-leader__avg">
                                                            <div class="circular">
                                                                <div class="circular__bar" data-percent="<?= ( $row['media_voto'] * 10 ) ?>">
                                                                    <span class="circular__percents"><?= number_format($row['media_voto'], 2) ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                </div>
                
            </div>
        </div>

        <!-- Content / End -->

