

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-champions-statistiche">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Champions</span> League</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/statistiche_champions" class="content-filter__link"><small>Champions League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/marcatori_champions" class="content-filter__link"><small>Champions League</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/champions" class="content-filter__link"><small>Champions League</small>Classifica</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/calendario_champions" class="content-filter__link"><small>Champions League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/stagioni_precedenti_champions" class="content-filter__link"><small>Champions League</small>Stagioni Precedenti</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">

                        <!-- Widget: Lineup -->
                        <aside class="widget card widget--sidebar widget-lineup">
                            <div class="widget__title card__header">
                                <h4>Top 11 Champions League</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Giocatori schierati almeno per il 30% della Champions</span>
                            </div>
                            <div class="widget__content card__content">

                                <canvas id="soccer-lineup" class="soccer-lineup" width="316" height="460">
                                    <!-- Fallback Image -->
                                    <img src="<?= base_url('/') ?>assets/images/soccer/_soccer_field-lineup.jpg" alt="">
                                    <!-- Fallback Image / End -->
                                </canvas>

                                <?php
                                //Setto i nomi dei top 11 campionato; diviso per le 8 giornate di Coppa Treble
                                $i = 1;
                                foreach ($topChampions['P'] as $row) {
                                    $percentuale_presenze = ($row['presenze'] * 100) / 16;
                                    //Impostare soglia percentuale presenze: 30 equivale al 30% delle partite giocate in Coppa
                                    if ($percentuale_presenze >= 30 && $i <= 1) {
                                        if ($i == 1) {
                                            $portiere = $row['cognome'];
                                            $maglia_portiere = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }    
                                        $i++;
                                    }
                                }

                                $i = 1;
                                foreach ($topChampions['D'] as $row) {
                                    $percentuale_presenze = ($row['presenze'] * 100) / 16;
                                    //Impostare soglia percentuale presenze: 30 equivale al 30% delle partite giocate in Coppa
                                    if ($percentuale_presenze >= 30 && $i <= 3) {
                                        if ($i == 1) {
                                            $difensore1 = $row['cognome'];
                                            $maglia_difensore1 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 2) {
                                            $difensore2 = $row['cognome'];
                                            $maglia_difensore2 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 3) {
                                            $difensore3 = $row['cognome'];
                                            $maglia_difensore3 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        $i++;
                                    }
                                }

                                $i = 1;
                                foreach ($topChampions['C'] as $row) {
                                    $percentuale_presenze = ($row['presenze'] * 100) / 16;
                                    //Impostare soglia percentuale presenze: 30 equivale al 30% delle partite giocate in Coppa
                                    if ($percentuale_presenze >= 30 && $i <= 4) {
                                        if ($i == 1) {
                                            $centrocampista1 = $row['cognome'];
                                            $maglia_centrocampista1 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 2) {
                                            $centrocampista2 = $row['cognome'];
                                            $maglia_centrocampista2 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 3) {
                                            $centrocampista3 = $row['cognome'];
                                            $maglia_centrocampista3 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 4) {
                                            $centrocampista4 = $row['cognome'];
                                            $maglia_centrocampista4 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        $i++;
                                    }
                                }

                                $i = 1;
                                foreach ($topChampions['A'] as $row) {
                                    $percentuale_presenze = ($row['presenze'] * 100) / 16;
                                    //Impostare soglia percentuale presenze: 30 equivale al 30% delle partite giocate in Coppa
                                    if ($percentuale_presenze >= 30 && $i <= 3) {
                                        if ($i == 1) {
                                            $attaccante1 = $row['cognome'];
                                            $maglia_attaccante1 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 2) {
                                            $attaccante2 = $row['cognome'];
                                            $maglia_attaccante2 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        if ($i == 3) {
                                            $attaccante3 = $row['cognome'];
                                            $maglia_attaccante3 = $this->mdl_team->getIdMaglia($this->mdl_team->getIdSquadraDaIdGiocatore($row['id_giocatore']));
                                        }
                                        $i++;
                                    }
                                }
                                ?>

                                <script>
                                    var canvas = document.getElementById('soccer-lineup');
                                    var context = canvas.getContext('2d');

                                    function loadImages(sources, callback) {
                                        var images = {};
                                        var loadedImages = 0;
                                        var numImages = 0;
                                        // get num of sources
                                        for (var src in sources) {
                                            numImages++;
                                        }
                                        for (var src in sources) {
                                            images[src] = new Image();
                                            images[src].onload = function () {
                                                if (++loadedImages >= numImages) {
                                                    callback(images);
                                                }
                                            };
                                            images[src].src = sources[src];
                                        }
                                    }

                                    // Players Shirt
                                    var sources = {
                                        player1: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_portiere ?>.png',
                                        player2: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_difensore1 ?>.png',
                                        player3: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_difensore2 ?>.png',
                                        player4: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_difensore3 ?>.png',
                                        player5: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_centrocampista1 ?>.png',
                                        player6: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_centrocampista2 ?>.png',
                                        player7: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_centrocampista3 ?>.png',
                                        player8: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_centrocampista4 ?>.png',
                                        player9: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_attaccante1 ?>.png',
                                        player10: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_attaccante2 ?>.png',
                                        player11: '<?= base_url('/') ?>images/maglie/mini<?= $maglia_attaccante3 ?>.png',
                                    };

                                    //Posizione magliette
                                    loadImages(sources, function (images) {
                                        context.drawImage(images.player1, 138, 26);
                                        //Difensori
                                        context.drawImage(images.player2, 51, 115);
                                        context.drawImage(images.player3, 226, 115);
                                        context.drawImage(images.player4, 138, 95);
                                        //Centrocampisti
                                        context.drawImage(images.player5, 176, 200);
                                        context.drawImage(images.player6, 99, 200);
                                        context.drawImage(images.player7, 33, 230);
                                        context.drawImage(images.player8, 243, 230);
                                        //Attaccanti
                                        context.drawImage(images.player9, 56, 314);
                                        context.drawImage(images.player10, 221, 314);
                                        context.drawImage(images.player11, 138, 358);
                                    });

                                    // Player Names
                                    var players = {
                                        player1: "<?= $portiere ?>",
                                        player2: "<?= $difensore1 ?>",
                                        player3: "<?= $difensore2 ?>",
                                        player4: "<?= $difensore3 ?>",
                                        player5: "<?= $centrocampista1 ?>",
                                        player6: "<?= $centrocampista2 ?>",
                                        player7: "<?= $centrocampista3 ?>",
                                        player8: "<?= $centrocampista4 ?>",
                                        player9: "<?= $attaccante1 ?>",
                                        player10: "<?= $attaccante2 ?>",
                                        player11: "<?= $attaccante3 ?>",
                                    };

                                    //Label giocatore
                                    drawTextBG(context, players.player1, 135, 66);
                                    drawTextBG(context, players.player2, 40, 155);
                                    drawTextBG(context, players.player3, 215, 155);
                                    drawTextBG(context, players.player4, 130, 135);
                                    drawTextBG(context, players.player5, 175, 240);
                                    drawTextBG(context, players.player6, 90, 240);
                                    drawTextBG(context, players.player7, 20, 270);
                                    drawTextBG(context, players.player8, 230, 270);
                                    drawTextBG(context, players.player9, 50, 354);
                                    drawTextBG(context, players.player10, 220, 354);
                                    drawTextBG(context, players.player11, 135, 398);

                                    /// expand with color, background etc.
                                    function drawTextBG(context, txt, x, y, padding) {
                                        padding = padding || 6;

                                        context.save();
                                        context.font = '10px Montserrat';
                                        context.textBaseline = 'top';
                                        context.fillStyle = 'rgba(35,43,49,0.6)';

                                        var width = context.measureText(txt).width;
                                        context.fillRect(x - padding, y - padding + 4, width + (padding * 2), parseInt(context.font, 10) + (padding * 1.1));


                                        context.fillStyle = '#fff';
                                        context.fillText(txt, x, y);

                                        context.restore();
                                    }

                                </script>

                            </div>
                        </aside>
                        <!-- Widget: Lineup / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Stats -->
                        <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                            <div class="widget__title card__header">
                                <h4>Statistiche Squadre</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Media per partita giocata</span>
                            </div>
                            <div class="widget__content card__content">
                                
                                <?php
                                //Calcolo maggior mediagol - DA MODIFICARE se più di 10 utenti
                                $media1 = ( $this->mdl_team->getMediaGolFattiChampions(1) / $this->mdl_team->getStatsPartiteGiocateChampions(1));
                                $media2 = ( $this->mdl_team->getMediaGolFattiChampions(2) / $this->mdl_team->getStatsPartiteGiocateChampions(2));
                                $media3 = ( $this->mdl_team->getMediaGolFattiChampions(3) / $this->mdl_team->getStatsPartiteGiocateChampions(3));
                                $media4 = ( $this->mdl_team->getMediaGolFattiChampions(4) / $this->mdl_team->getStatsPartiteGiocateChampions(4));
                                $media5 = ( $this->mdl_team->getMediaGolFattiChampions(5) / $this->mdl_team->getStatsPartiteGiocateChampions(5));
                                $media6 = ( $this->mdl_team->getMediaGolFattiChampions(6) / $this->mdl_team->getStatsPartiteGiocateChampions(6));
                                $media7 = ( $this->mdl_team->getMediaGolFattiChampions(7) / $this->mdl_team->getStatsPartiteGiocateChampions(7));
                                $media8 = ( $this->mdl_team->getMediaGolFattiChampions(8) / $this->mdl_team->getStatsPartiteGiocateChampions(8));
                                $media9 = ( $this->mdl_team->getMediaGolFattiChampions(9) / $this->mdl_team->getStatsPartiteGiocateChampions(9));
                                $media10 = ( $this->mdl_team->getMediaGolFattiChampions(10) / $this->mdl_team->getStatsPartiteGiocateChampions(10));

                                $medie_gol = array("1" => $media1, "2" => $media2, "3" => $media3, "4" => $media4, "5" => $media5, "6" => $media6, "7" => $media7, "8" => $media8, "9" => $media9, "10" => $media10);

                                $topmediagol = max($medie_gol);

                                //Cerco index per id_utente
                                foreach ($medie_gol as $key => $value) {

                                    if ($value == $topmediagol) {
                                        $utente_mediagol = $key;
                                    }
                                }
                                ?>
                                
                                <ul class="team-stats-box">
                                    <li class="team-stats__item team-stats__item--clean">
                                        <div class="team-stats__label">Reti Realizzate</div><br>
                                        <div class="team-stats__icon team-stats__icon--circle">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                        </div>
                                        <div class="team-stats__value"><?= number_format($topmediagol, 2) ?></div>
                                        <div class="team-stats__label" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($utente_mediagol) ?></div>
                                    </li>

                                    <?php
                                    //Calcolo maggior mediagolsubiti - DA MODIFICARE se più di 10 utenti
                                    $media1 = ( $this->mdl_team->getMediaGolSubitiChampions(1) / $this->mdl_team->getStatsPartiteGiocateChampions(1));
                                    $media2 = ( $this->mdl_team->getMediaGolSubitiChampions(2) / $this->mdl_team->getStatsPartiteGiocateChampions(2));
                                    $media3 = ( $this->mdl_team->getMediaGolSubitiChampions(3) / $this->mdl_team->getStatsPartiteGiocateChampions(3));
                                    $media4 = ( $this->mdl_team->getMediaGolSubitiChampions(4) / $this->mdl_team->getStatsPartiteGiocateChampions(4));
                                    $media5 = ( $this->mdl_team->getMediaGolSubitiChampions(5) / $this->mdl_team->getStatsPartiteGiocateChampions(5));
                                    $media6 = ( $this->mdl_team->getMediaGolSubitiChampions(6) / $this->mdl_team->getStatsPartiteGiocateChampions(6));
                                    $media7 = ( $this->mdl_team->getMediaGolSubitiChampions(7) / $this->mdl_team->getStatsPartiteGiocateChampions(7));
                                    $media8 = ( $this->mdl_team->getMediaGolSubitiChampions(8) / $this->mdl_team->getStatsPartiteGiocateChampions(8));
                                    $media9 = ( $this->mdl_team->getMediaGolSubitiChampions(9) / $this->mdl_team->getStatsPartiteGiocateChampions(9));
                                    $media10 = ( $this->mdl_team->getMediaGolSubitiChampions(10) / $this->mdl_team->getStatsPartiteGiocateChampions(10));

                                    $medie_golsubiti = array("1" => $media1, "2" => $media2, "3" => $media3, "4" => $media4, "5" => $media5, "6" => $media6, "7" => $media7, "8" => $media8, "9" => $media9, "10" => $media10);

                                    $topmediagolsubiti = max($medie_golsubiti);

                                    //Cerco index per id_utente
                                    foreach ($medie_golsubiti as $key => $value) {

                                        if ($value == $topmediagolsubiti) {
                                            $utente_mediagolsubiti = $key;
                                        }
                                    }
                                    ?>

                                    <li class="team-stats__item team-stats__item--clean">
                                        <div class="team-stats__label">Gol Subiti</div><br>
                                        <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots-ot">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-gate.svg" alt="" class="team-stats__icon-secondary">
                                        </div>
                                        <div class="team-stats__value"><?= number_format($topmediagolsubiti, 2) ?></div>
                                        <div class="team-stats__label" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($utente_mediagolsubiti) ?></div>
                                    </li>

                                    <?php
                                    //Calcolo maggior mediaassist - DA MODIFICARE se più di 10 utenti
                                    if ($giornata_media > 0) {
                                        $media1 = ( $this->mdl_team->getMediaAssistFattiChampions(1) / $this->mdl_team->getStatsPartiteGiocateChampions(1));
                                        $media2 = ( $this->mdl_team->getMediaAssistFattiChampions(2) / $this->mdl_team->getStatsPartiteGiocateChampions(2));
                                        $media3 = ( $this->mdl_team->getMediaAssistFattiChampions(3) / $this->mdl_team->getStatsPartiteGiocateChampions(3));
                                        $media4 = ( $this->mdl_team->getMediaAssistFattiChampions(4) / $this->mdl_team->getStatsPartiteGiocateChampions(4));
                                        $media5 = ( $this->mdl_team->getMediaAssistFattiChampions(5) / $this->mdl_team->getStatsPartiteGiocateChampions(5));
                                        $media6 = ( $this->mdl_team->getMediaAssistFattiChampions(6) / $this->mdl_team->getStatsPartiteGiocateChampions(6));
                                        $media7 = ( $this->mdl_team->getMediaAssistFattiChampions(7) / $this->mdl_team->getStatsPartiteGiocateChampions(7));
                                        $media8 = ( $this->mdl_team->getMediaAssistFattiChampions(8) / $this->mdl_team->getStatsPartiteGiocateChampions(8));
                                        $media9 = ( $this->mdl_team->getMediaAssistFattiChampions(9) / $this->mdl_team->getStatsPartiteGiocateChampions(9));
                                        $media10 = ( $this->mdl_team->getMediaAssistFattiChampions(10) / $this->mdl_team->getStatsPartiteGiocateChampions(10));
                                    }

                                    $medie_assist = array("1" => $media1, "2" => $media2, "3" => $media3, "4" => $media4, "5" => $media5, "6" => $media6, "7" => $media7, "8" => $media8, "9" => $media9, "10" => $media10);

                                    $topmediaassist = max($medie_assist);

                                    //Cerco index per id_utente
                                    foreach ($medie_assist as $key => $value) {

                                        if ($value == $topmediaassist) {
                                            $utente_mediaassist = $key;
                                        }
                                    }
                                    ?>

                                    <li class="team-stats__item team-stats__item--clean">
                                        <div class="team-stats__label">Assist</div><br>
                                        <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-shots.svg" alt="" class="team-stats__icon-secondary">
                                        </div>
                                        <div class="team-stats__value"><?= number_format($topmediaassist, 2) ?></div>
                                        <div class="team-stats__label" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($utente_mediaassist) ?></div>
                                    </li>
                                    
                                    <li class="team-stats__item team-stats__item--clean">
                                        <div class="team-stats__label">Numero Cartellini</div><br>
                                        <div class="team-stats__icon team-stats__icon--circle team-stats__icon--assists">
                                            <img src="<?= base_url('/') ?>assets/images/soccer/yellow-red_card.png" alt="" class="team-stats__icon-primary">
                                        </div>
                                        <?php
                                        $nome_utente = "";
                                        if ($giornata_media > 0) {
                                            $partite_giocate = $this->mdl_team->getStatsPartiteGiocateChampions($topTeamFallosa[0]['id_utente']);
                                            $pca = ($topTeamFallosa[0]['totale_cartellini'] / $partite_giocate);
                                            $nome_utente = $this->mdl_team->getNomeTeam($topTeamFallosa[0]['id_utente']);
                                        }
                                        ?>
                                        <div class="team-stats__value"><?= number_format(@$pca, 2) ?></div>
                                        <div class="team-stats__label" style="color: #1892ED;"><?= $nome_utente ?></div>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Team Stats / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Latest Results -->
                        <aside class="widget card widget--sidebar widget-results">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>Top Match</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Partite con maggior fantapunti</span>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="widget-results__list">

                                    <?php
                                    foreach ($bestmatch as $row) {
                                        ?>
                                        <!-- Game 3 -->
                                        <li class="widget-results__item">
                                            <h5 class="widget-results__title"><?= dataSettimanale($row['data']) ?></h5>
                                            <div class="widget-results__content">
                                                <div class="widget-results__team widget-results__team--first">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" alt="" >
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($row['id1']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="widget-results__result">
                                                    <div class="widget-results__score">
                                                        <span class="widget-results__score-draw" style="font-size: 12px;"><?= $row['risultato1'] ?></span> - <span class="widget-results__score-draw"  style="font-size: 12px;"><?= $row['risultato2'] ?></span>
                                                        <div class="widget-results__status"><?= $row['punteggio1'] ?> - <?= $row['punteggio2'] ?></div>
                                                        <div class="widget-results__status" style="color: #1892ED; font-size: 10px;"><?= $row['totale_punti'] ?></div>
                                                    </div>
                                                </div>
                                                <div class="widget-results__team widget-results__team--second">
                                                    <figure class="widget-results__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="widget-results__team-details">
                                                        <h5 class="widget-results__team-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($row['id2']) ?></h5>
                                                        <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Game 3 / End -->

                                        <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Latest Results / End -->

                    </div>

                </div>

                <div class="spacer"></div>

                <div class="row">

                    <div class="col-md-4">

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
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
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
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-leader__goals"><?= $this->mdl_team->getGolChampions($row['id_giocatore']) ?></td>
                                                    <td class="team-leader__gp"><?= $this->mdl_team->getAssistChampions($row['id_giocatore']) ?></td>
                                                    <?php
                                                    $partite_schierato = $this->mdl_team->getPartite_schieratoChampions($row['id_giocatore']);
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
                                                <!-- Anno DA MODIFICARE -->
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Assist</th>
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
                                                    $partite_schierato = $this->mdl_team->getPartite_schieratoChampions($row['id_giocatore']);
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
                                <h4>Giocatori più fallosi</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MPP : Media cartellino per partite in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
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
                                                    <td class="team-leader__goals"><?= $this->mdl_team->getSommaAmmonizioniSchieratoChampions($row['id_giocatore']) ?></td>
                                                    <td class="team-leader__gp"><?= $this->mdl_team->getSommaEspulsioniSchieratoChampions($row['id_giocatore']) ?></td>
                                                    <?php
                                                    $partite_schierato = $this->mdl_team->getPartite_schieratoChampions($row['id_giocatore']);
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
                </div>

                <div class="spacer"></div>

                <div class="row">

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Top Media FantaVoto</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MFV : Media Fantavoto per partite ( almeno 30% ) in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Presenze</th>
                                                <th class="team-leader__avg">MFV</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($topmediafantavoto as $row) {
                                                $percentuale_presenze = ($row['presenze'] * 100) / 16;

                                                //Impostare soglia percentuale presenze: 20 equivale al 20% delle partite giocate del FantaTreble
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

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Flop Media FantaVoto</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MFV : Media Fantavoto per partite ( almeno 30% ) in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Presenze</th>
                                                <th class="team-leader__avg">MFV</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($flopmediavoto as $row) {
                                                $percentuale_presenze = ($row['presenze'] * 100) / 16;

                                                //Impostare soglia percentuale presenze: 20 equivale al 20% delle partite giocate del FantaTreble
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
                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Top Media Voto</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MV : Media voto per partite ( almeno 30% ) in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Presenze</th>
                                                <th class="team-leader__avg">MV</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($topmediavoto as $row) {
                                                $percentuale_presenze = ($row['presenze'] * 100) / 16;

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

                <div class="spacer"></div>

                <div class="row">

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Top Reti Subite</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* MPP : Media reti subite per partite in cui è stato schierato</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Reti</th>
                                                <th class="team-leader__avg">MPP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($peggioriportieri as $row) {
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
                                                    <td class="team-leader__gp"><?= $row['totale_golsubiti'] ?></td>
                                                    <?php
                                                    $partite_schierato = $this->mdl_team->getPartite_schieratoChampions($row['id_giocatore']);
                                                    $mpp = ($row['totale_golsubiti'] / $partite_schierato);
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
                                <h4>Top Team Rigori Parati</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Rigori parati da portieri schierati</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Rigori Parati</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rigori_parati as $row) {
                                                ?>
                                                <tr>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_utente'] ?>.png" alt="">
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($row['id_utente']) ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_utenti->getNomeUtente($row['id_utente']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-leader__gp"><?= $row['totale_rigpar'] ?></td>
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
                                <h4>Top Team Rigori Sbagliati</h4>
                                <span class="team-leader__player-position"  style="text-transform: capitalize;">* Rigori sbagliati da giocatori schierati</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Champions League 2018 / 19</th>
                                                <th class="team-leader__gp">Rigori Sbagliati</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rigori_sbagliati as $row) {
                                                ?>
                                                <tr>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_utente'] ?>.png" alt="">
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getNomeTeam($row['id_utente']) ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_utenti->getNomeUtente($row['id_utente']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-leader__gp"><?= $row['totale_rigsba'] ?></td>
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
        </div>

        <!-- Content / End -->

