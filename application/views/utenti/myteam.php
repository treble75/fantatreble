

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Rosa <span class="highlight"><?= $_SESSION['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/myteam">My Team</a></li>
                            <li class="active">Rosa Giocatori</li>
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
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/utente/myteam" class="content-filter__link"><small>My Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_marcatori" class="content-filter__link"><small>My Team</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_statistiche" class="content-filter__link"><small>My Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_risultati" class="content-filter__link"><small>My Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_calendario" class="content-filter__link"><small>My Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_bacheca" class="content-filter__link"><small>My Team</small>Bacheca</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <!-- Rosa Giocatori: Table -->
                <div class="card card--has-table">

                    <div class="card__header">
                        <h4>Rosa Giocatori</h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__number">&nbsp;</th>
                                        <th class="team-roster-table__position">&nbsp;</th>
                                        <th class="team-roster-table__name">Giocatore</th>
                                        <th class="team-roster-table__foot">SC</th>
                                        <th class="team-roster-table__foot">PG</th>
                                        <th class="team-roster-table__age">PR</th>
                                        <th class="team-roster-table__height"><img src="<?= base_url('/') ?>images/ammo.png"></th>
                                        <th class="team-roster-table__weight"><img src="<?= base_url('/') ?>images/espu.png"></th>
                                        <th class="team-roster-table__goals">GO</th>
                                        <th class="team-roster-table__assists">AS</th>
                                        <th class="team-roster-table__fouls">VO</th>
                                        <th class="team-roster-table__card-y">FV</th>
                                        <th class="team-roster-table__card-r">G/P A</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($team as $row) {
                                        $bgcolor = "";
                                        $result = $this->mdl_team->getStatistiche($row['id_giocatore']);
                                        $PG = $this->mdl_team->getPartite_giocate($row['id_giocatore']);
                                        $PS = $this->mdl_team->getPartite_schierato($row['id_giocatore']);
                                        if ($PG != 0) {
                                            $voto = number_format(($result->totVoto), 2);
                                            $fantavoto = number_format(($result->totFantavoto), 2);
                                            $ammonizioni = $result->totAmmonizioni;
                                            $espulsioni = $result->totEspulsioni;
                                            $gol = $result->totGol;
                                            $assist = $result->totAssist;
                                            $rigSbagliato = $result->totRigoresbagliato;
                                            $rigParato = $result->totRigoreparato;
                                            $autogol = $result->totAutogol;
                                            $golSubiti = $result->totGolsubiti;
                                        } else {
                                            $voto = 0;
                                            $fantavoto = 0;
                                            $ammonizioni = 0;
                                            $espulsioni = 0;
                                            $gol = 0;
                                            $assist = 0;
                                            $rigSbagliato = 0;
                                            $rigParato = 0;
                                            $autogol = 0;
                                            $golSubiti = 0;
                                        }
                                        switch ($row['ruolo']) {
                                            case 1:
                                                $color = "#000000";
                                                $ruolo = "P";
                                                $bgcolor = 'bgcolor="#fafafa"';
                                                break;
                                            case 2;
                                                $color = "#1486F4";
                                                $ruolo = "D";
                                                $bgcolor = 'bgcolor="#f0fbff"';
                                                break;
                                            case 3;
                                                $color = "#F93469";
                                                $ruolo = "C";
                                                $bgcolor = 'bgcolor="#fff2f2"';
                                                break;
                                            case 4;
                                                $color = "#199D5B";
                                                $ruolo = "A";
                                                $bgcolor = 'bgcolor="#eefaeb"';
                                                break;
                                        }
                                        if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                            $filename = $row['id_giocatore'] . ".png";
                                        } else
                                            $filename = "dummy.png";
                                        $schierato = "";
                                        $schierato_coppa = "";
                                        foreach ($myteamT as $chk) {
                                            if ($chk['id_giocatore'] == $row['id_giocatore'])
                                                $schierato = "<img src='" . base_url('/') . "images/titolare.png' />";
                                        }
                                        foreach (@$myteamTCoppa as $chk) {
                                            if ($chk['id_giocatore'] == $row['id_giocatore'])
                                                $schierato_coppa = "<img src='" . base_url('/') . "images/titolare_coppa.png' />";
                                        }
                                        ?>

                                        <tr <?= $bgcolor ?> >
                                            <td class="team-roster-table__number" style="color: <?= $color ?>; font-size: 13px; vertical-align: middle;"><?= $ruolo ?></td>
                                            <td class="team-roster-table__position">
                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50" height="50" /></td>
                                            </figure>
                                            <td class="team-roster-table__name" style="color: #1892ED; font-size: 12px; vertical-align: middle;"><?= $row['cognome'] . " " . $row['nome'] ?></td>
                                            <td class="team-roster-table__foot" style="vertical-align: middle !important;">
                                                <figure style="vertical-align: middle !important; width: 50px;">
                                                    <?= $schierato ?>&nbsp;<?= $schierato_coppa ?>
                                                </figure>
                                            </td>
                                            <td class="team-roster-table__foot" style="vertical-align: middle;"><?= $PG ?></td>
                                            <td class="team-roster-table__age" style="vertical-align: middle;"><?= $PS ?></td>
                                            <td class="team-roster-table__height" style="vertical-align: middle;"><?= $ammonizioni ?></td>
                                            <td class="team-roster-table__weight" style="vertical-align: middle;"><?= $espulsioni ?></td>
                                            <td class="team-roster-table__goals" style="vertical-align: middle; color: #1892ED; font-size: 13px;"><?= $gol ?></td>
                                            <td class="team-roster-table__assists" style="vertical-align: middle; color: #009900; font-size: 13px;"><?= $assist ?></td>
                                            <!-- Setto rosso sotto il 6 e verde sopra il 6 -->
                                            <?php
                                            if ($voto >= 6)
                                                $colorefont = "#009900";
                                            if ($voto < 6)
                                                $colorefont = "#ff3d3d";
                                            ?>
                                            <td class="team-roster-table__fouls" style="vertical-align: middle; color: <?= $colorefont ?>;"><?= $voto ?></td>
                                            <td class="team-roster-table__card-y team-leader__avg" style="vertical-align: middle;">
                                                <div class="circular">
                                                    <?php $percentuale = number_format(($fantavoto * 10), 2); ?>
                                                    <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                        <span class="circular__percents"><?= number_format($fantavoto, 2) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="team-roster-table__card-r team-leader__avg" style="vertical-align: middle;">
                                                <div class="circular">
                                                    <?php
                                                    if ($gol > 0) {
                                                        $media_golA = ( $gol / $PG );
                                                    } else {
                                                        $media_golA = 0;
                                                    }
                                                    $percentuale = number_format(($media_golA * 100), 2);
                                                    ?>
                                                    <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                        <span class="circular__percents"><?= number_format($media_golA, 2) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Rosa Giocatori: Table / End -->  

                <!-- Player Glossary -->
                <div class="card">
                    <div class="card__header">
                        <h4>Glossario</h4>
                    </div>
                    <div class="card__content">
                        <div class="glossary">
                            <div class="glossary__item"><span class="glossary__abbr">SC :</span> Schierato in Treble League o in Coppa</div>
                            <div class="glossary__item"><span class="glossary__abbr">PG :</span> Partite Giocate in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">PR :</span> Presenze al FantaTreble</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/ammo.png"> :</span> Numero di Ammonizioni in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/espu.png"> :</span> Numero di Espulsioni in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">GO :</span> Gol Realizzati in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">AS :</span> Assist Realizzati in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">VO :</span> Media Voto in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">FV :</span> Media FantaVoto in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">G/P A :</span> Gol per Partita in Serie A</div>
                        </div>
                    </div>
                </div>
                <!-- Player Glossary / End -->

            </div>
        </div>

        <!-- Content / End -->

