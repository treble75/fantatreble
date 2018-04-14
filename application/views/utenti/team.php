

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Rosa <span class="highlight"><?= $utente[0]['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/team/<?= $utente[0]['id_utente'] ?>">Team</a></li>
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
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/utente/team/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/team_marcatori/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/team_statistiche/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/team_risultati/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/team_calendario/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/team_bacheca/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Bacheca</a></li>
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
                                        <th class="team-roster-table__foot" style="text-align: center !important;">SC</th>
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

                <div class="row">

                    <!-- Content -->
                    <div class="content col-md-8">




                        <div class="row">

                            <div class="col-md-6">

                                <!-- Widget: Team Stats -->
                                <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                                    <div class="widget__title card__header">
                                        <h4>Team Stats</h4>
                                    </div>
                                    <div class="widget__content card__content">
                                        <ul class="team-stats-box">
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                </div>
                                                <div class="team-stats__value">2.54</div>
                                                <div class="team-stats__label">Goals Per Game</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots-ot">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-gate.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <div class="team-stats__value">31.6</div>
                                                <div class="team-stats__label">Shots OT Per Game</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-shots.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <div class="team-stats__value">68.9</div>
                                                <div class="team-stats__label">Total Shots Per Game</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--assists">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <span class="team-stats__icon-secondary">A</span>
                                                </div>
                                                <div class="team-stats__value">1.7</div>
                                                <div class="team-stats__label">Goal Assists Per Game</div>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget: Team Stats / End -->


                            </div>
                            <div class="col-md-6">

                                <!-- Widget: Awards -->
                                <aside class="widget card widget--sidebar widget-awards">
                                    <div class="widget__title card__header">
                                        <h4>Our Awards</h4>
                                    </div>
                                    <div class="widget__content card__content">
                                        <div class="awards awards--slider">
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">West League Champions</h5>
                                                    <div class="awards__date">December 2012</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">East League Champions</h5>
                                                    <div class="awards__date">November 2010</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">Big League Champions</h5>
                                                    <div class="awards__date">December 2012</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Widget: Awards / End -->


                            </div>
                        </div>

                        <!-- Schedule & Tickets -->
                        <div class="card card--has-table">
                            <div class="card__header card__header--has-btn">
                                <h4>Games Schedule</h4>
                                <a href="_soccer_team-schedule.html" class="btn btn-default btn-outline btn-xs card-header__button">See Complete Schedule</a>
                            </div>
                            <div class="card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover team-schedule">
                                        <thead>
                                            <tr>
                                                <th class="team-schedule__date">Date</th>
                                                <th class="team-schedule__versus">Versus</th>
                                                <th class="team-schedule__time">Time</th>
                                                <th class="team-schedule__venue">Venue</th>
                                                <th class="team-schedule__tickets">Tickets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="team-schedule__date">Saturday, Mar 24</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Lucky Clovers</h6>
                                                            <span class="team-meta__place">St. Patrick’s Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">9:00PM EST</td>
                                                <td class="team-schedule__venue">Madison Cube Stadium</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                            </tr>
                                            <tr>
                                                <td class="team-schedule__date">Friday, May 31</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/red_wings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Red Wings</h6>
                                                            <span class="team-meta__place">Icarus College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">9:30PM EST</td>
                                                <td class="team-schedule__venue">Alchemists Stadium</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block disabled">Sold Out</a></td>
                                            </tr>
                                            <tr>
                                                <td class="team-schedule__date">Saturday, May 8</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/draconians_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Draconians</h6>
                                                            <span class="team-meta__place">Wyvern College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">10:00PM EST</td>
                                                <td class="team-schedule__venue">Scalding Rock Stadium</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                            </tr>
                                            <tr>
                                                <td class="team-schedule__date">Friday, May 14</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/aqua_keyes_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Aqua Keyes</h6>
                                                            <span class="team-meta__place">Pacific Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">10:00PM EST</td>
                                                <td class="team-schedule__venue">Alchemists Stadium</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                            </tr>
                                            <tr>
                                                <td class="team-schedule__date">Saturday, May 22</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/icarus_wings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Icarus Wings</h6>
                                                            <span class="team-meta__place">Waxer College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">10:30PM EST</td>
                                                <td class="team-schedule__venue">The FireStar Arena</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block disabled">Sold Out</a></td>
                                            </tr>
                                            <tr>
                                                <td class="team-schedule__date">Saturday, May 29</td>
                                                <td class="team-schedule__versus">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/bloody_wave_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Bloody Wave</h6>
                                                            <span class="team-meta__place">Atlantic School</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-schedule__time">9:00PM EST</td>
                                                <td class="team-schedule__venue">Alchemists Stadium</td>
                                                <td class="team-schedule__tickets"><a href="#" class="btn btn-xs btn-default btn-outline btn-block">Buy Game Tickets</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Schedule & Tickets / End -->

                        <!-- Points History -->
                        <div class="card">
                            <div class="card__header card__header--has-legend">
                                <h4>Points History</h4>
                                <div id="gamesPoinstsLegendSoccer" class="chart-legend"></div>
                            </div>
                            <div class="card__content">
                                <canvas id="points-history-soccer" class="points-history-chart" height="135"></canvas>
                            </div>
                        </div>
                        <!-- Points History / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Standings -->
                        <aside class="widget card widget--sidebar widget-standings">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>West League 2016</h4>
                                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See All Stats</a>
                            </div>
                            <div class="widget__content card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-standings">
                                        <thead>
                                            <tr>
                                                <th>Team Positions</th>
                                                <th>W</th>
                                                <th>L</th>
                                                <th>D</th>
                                                <th>PTS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/pirates_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">L.A Pirates</h6>
                                                            <span class="team-meta__place">Bebop Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>36</td>
                                                <td>14</td>
                                                <td>10</td>
                                                <td>118</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/sharks_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Sharks</h6>
                                                            <span class="team-meta__place">Marine College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>32</td>
                                                <td>20</td>
                                                <td>8</td>
                                                <td>104</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">The Alchemists</h6>
                                                            <span class="team-meta__place">Eric Bros School</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>32</td>
                                                <td>21</td>
                                                <td>7</td>
                                                <td>103</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/ocean_kings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Ocean Kings</h6>
                                                            <span class="team-meta__place">Bay College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>30</td>
                                                <td>20</td>
                                                <td>10</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/red_wings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Red Wings</h6>
                                                            <span class="team-meta__place">Icarus College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>28</td>
                                                <td>24</td>
                                                <td>8</td>
                                                <td>92</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Lucky Clovers</h6>
                                                            <span class="team-meta__place">St. Patrick’s Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27</td>
                                                <td>24</td>
                                                <td>9</td>
                                                <td>90</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/draconians_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Draconians</h6>
                                                            <span class="team-meta__place">Draconians</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>28</td>
                                                <td>7</td>
                                                <td>82</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/bloody_wave_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Bloody Wave</h6>
                                                            <span class="team-meta__place">Atlantic School</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>24</td>
                                                <td>30</td>
                                                <td>6</td>
                                                <td>78</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Standings / End -->


                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Team Goalscorers</h4>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">West League 2016</th>
                                                <th class="team-leader__goals">G</th>
                                                <th class="team-leader__gp">P</th>
                                                <th class="team-leader__avg">AVG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">James Messinal</h5>
                                                            <span class="team-leader__player-position">Forward</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">11</td>
                                                <td class="team-leader__gp">12</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="91">
                                                            <span class="circular__percents">0.91</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_02.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">David Hawkins</h5>
                                                            <span class="team-leader__player-position">Forward</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">10</td>
                                                <td class="team-leader__gp">12</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="83">
                                                            <span class="circular__percents">0.83</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Griffin Peterson</h5>
                                                            <span class="team-leader__player-position">Midfielder</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">8</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="80">
                                                            <span class="circular__percents">0.80</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_02.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Christofer Grass</h5>
                                                            <span class="team-leader__player-position">Midfielder</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">7</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="70">
                                                            <span class="circular__percents">0.70</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Mark Ironson</h5>
                                                            <span class="team-leader__player-position">Defender</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">5</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="50">
                                                            <span class="circular__percents">0.50</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->


                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->


                        <!-- Widget: Latest Results -->
                        <aside class="widget card widget--sidebar widget-results">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>Latest Results</h4>
                                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See Full Results</a>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="widget-results__list">

                                    <!-- Game 1 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Saturday, March 24</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Elric Bros School</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                                                    <div class="widget-results__status">Home</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/sharks_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Sharks</h5>
                                                    <span class="widget-results__team-info">Marine College</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 1 / End -->

                                    <!-- Game 2 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Friday, March 16</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/pirates_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">L.A. Pirates</h5>
                                                    <span class="widget-results__team-info">Bebop Institute</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-winner">4</span> - <span class="widget-results__score-loser">2</span>
                                                    <div class="widget-results__status">Away</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 2 / End -->

                                    <!-- Game 3 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Saturday, March 10</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-draw">0</span> - <span class="widget-results__score-draw">0</span>
                                                    <div class="widget-results__status">Home</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Clovers</h5>
                                                    <span class="widget-results__team-info">St. Patrick’s Inst</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 3 / End -->

                                    <!-- Game 4 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Friday, March 4</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/ocean_kings_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Ocean Kings</h5>
                                                    <span class="widget-results__team-info">Bay College</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-loser">2</span> - <span class="widget-results__score-winner">3</span>
                                                    <div class="widget-results__status">Away</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 4 / End -->

                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Latest Results / End -->


                        <!-- Widget: Team Newslog -->
                        <aside class="widget card widget--sidebar widget-newslog">
                            <div class="widget__title card__header">
                                <h4>Team Newslog</h4>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="newslog">
                                    <li class="newslog__item newslog__item--injury">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Mark Johnson</strong> has a tibia fracture and he’s gonna be out of the play for <strong>2 months</strong>.</div>
                                            <time class="newslog__date" datetime="2016-09-18">September 18, 2016</time>
                                        </div>
                                    </li>
                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Dominick R. Blink</strong>, a new <strong>Shooting Guard</strong> from San Francisco has joined the team!.</div>
                                            <time class="newslog__date" datetime="2016-09-06">August 24, 2016</time>
                                        </div>
                                    </li>
                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Christopher Grifin</strong>, a new <strong>Power Forward</strong> from Rockstar Bay College has joined the team!.</div>
                                            <time class="newslog__date" datetime="2016-08-24">August 17, 2016</time>
                                        </div>
                                    </li>
                                    <li class="newslog__item newslog__item--injury">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Thomas Durry</strong> has a composed hand fracture and he won’t be playing untill <strong>September</strong>.</div>
                                            <time class="newslog__date" datetime="2016-08-17">July 25, 2016</time>
                                        </div>
                                    </li>
                                    <li class="newslog__item newslog__item--exit">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Jeremy Rittersen</strong> left the team after 2 year in the club and his new house are the <strong>Clovers</strong>.</div>
                                            <time class="newslog__date" datetime="2016-08-12">July 20, 2016</time>
                                        </div>
                                    </li>
                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Thomas Black</strong>, a new <strong>Defender</strong> from East Bay Institute has joined the team!</div>
                                            <time class="newslog__date" datetime="2016-08-12">July 17, 2016</time>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Team Newslog / End -->


                        <!-- Widget: Games History -->
                        <aside class="widget card widget--sidebar widget-games-history">
                            <div class="widget__title card__header card__header--has-legend">
                                <h4>Games History</h4>
                                <div id="gamesHistoryLegendSoccer" class="chart-legend chart-legend--games-history"></div>
                            </div>
                            <div class="widget__content card__content">
                                <canvas id="games-history-soccer" class="games-history-chart" height="230"></canvas>
                            </div>
                        </aside>
                        <!-- Widget: Games History / End -->


                    </div>
                    <!-- Sidebar / End -->
                </div>
            </div>
        </div>

        <!-- Content / End -->

