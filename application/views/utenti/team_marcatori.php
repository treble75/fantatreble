

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Marcatori <span class="highlight"><?= $utente[0]['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>utente/team/<?= $utente[0]['id_utente'] ?>">Team</a></li>
                            <li class="active">Marcatori</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>utente/team_marcatori/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_statistiche/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_risultati/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_calendario/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_bacheca/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Bacheca</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">


                <!-- Team Roster: Table -->
                <div class="card card--has-table">

                    <div class="card__header">
                        <h4>Classifica Marcatori 2018/19</h4>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-league" role="tab" data-toggle="tab"><span style="line-height: 50px; font-family: Montserrat, sans-serif; font-weight: 600; letter-spacing: -0.02em;">Treble League</span></a></li>
                        <li role="presentation"><a href="#tab-champions" role="tab" data-toggle="tab"><span style="line-height: 50px; font-family: Montserrat, sans-serif; font-weight: 600; letter-spacing: -0.02em;">Champions League</span></a></li>
                        <li role="presentation"><a href="#tab-coppa" role="tab" data-toggle="tab"><span style="line-height: 50px; font-family: Montserrat, sans-serif; font-weight: 600; letter-spacing: -0.02em;">Coppa Treble</span></a></li>
                    </ul>

                    <div class="card__content tab-content">

                        <div role="tabpanel" class="table-responsive tab-pane fade in active" id="tab-league">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__position" style="width: 8%"  align="center">Ruolo</th>
                                        <th class="team-roster-table__number" style="width: 8%">&nbsp;</th>
                                        <th class="team-roster-table__name" style="width: 20%">Giocatore</th>
                                        <th class="team-roster-table__age" style="width: 8%">GOL</th>
                                        <th class="team-roster-table__foot" style="width: 8%">PRE</th>
                                        <th class="team-roster-table__height" style="width: 8%">VO</th>
                                        <th class="team-roster-table__weight" style="width: 8%">FV</th>
                                        <th class="team-roster-table__assists" style="width: 8%">AS</th>
                                        <th class="team-roster-table__fouls" style="width: 8%"><img src="<?= base_url('/') ?>images/ammo.png"</th>
                                        <th class="team-roster-table__card-y" style="width: 8%"><img src="<?= base_url('/') ?>images/espu.png"</th>
                                        <th class="team-roster-table__weight" style="width: 8%">G/P</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if ($giornata > 0) {
                                    ?>
                                    <tbody>
                                        <?php
                                        foreach ($bomberTotali as $row) {
                                            if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                $filename = $row['id_giocatore'] . ".png";
                                            } else
                                                $filename = "dummy.png";

                                            //Visualizzo giocatori con almeno 1 gol
                                            if ($row['gol'] > 0) {
                                                switch ($i) {
                                                    case ($i == 1):
                                                        $bgcolor = 'bgcolor="#b6ffb3"';
                                                        break;
                                                    case ($i == 2);
                                                        $bgcolor = 'bgcolor="#ccffc9"';
                                                        break;
                                                    case ($i == 3);
                                                        $bgcolor = 'bgcolor="#e7ffe6"';
                                                        break;
                                                    case ($i > 3);
                                                        $bgcolor = "";
                                                        break;
                                                }
                                                ?>

                                                <tr style="padding: 0px 0px;" <?= $bgcolor ?> >
                                                    <?php
                                                    switch ($row['ruolo']) {
                                                        case 1:
                                                            $color = "#F93469";
                                                            $ruolo = "P";
                                                            break;
                                                        case 2;
                                                            $color = "#FC7422";
                                                            $ruolo = "D";
                                                            break;
                                                        case 3;
                                                            $color = "#1486F4";
                                                            $ruolo = "C";
                                                            break;
                                                        case 4;
                                                            $color = "#199D5B";
                                                            $ruolo = "A";
                                                            break;
                                                    }
                                                    ?>
                                                    <td class="team-roster-table__position" align="center" style="color: <?= $color ?>; font-size: 14px; vertical-align: middle; width: 8%;"><?= $ruolo ?></td>
                                                    <td class="team-roster-table__number" style="padding: 0px 0px; vertical-align: middle; width: 7%;" align="center">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                        </figure>
                                                    </td>
                                                    <td class="team-roster-table__name" style="vertical-align: middle; width: 15%;"><?= $row['cognome'] . " " . $row['nome'] ?></td>
                                                    <td class="team-roster-table__age" style="color: #1892ED; font-size: 14px; vertical-align: middle; width: 8%;"><?= $row['gol'] ?></td>
                                                    <td class="team-roster-table__foot" style="vertical-align: middle; width: 8%;"><?= $row['pg'] ?></td>
                                                    <?php
                                                    if ($row['voto'] >= 6)
                                                        $colorefont = "#009900";
                                                    if ($row['voto'] < 6)
                                                        $colorefont = "#ff3d3d";
                                                    ?>
                                                    <td class="team-roster-table__height" style="vertical-align: middle; width: 8%; color: <?= $colorefont ?>;"><?= number_format($row['voto'], 2) ?></td>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($row['fv'] * 10), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($row['fv'], 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-roster-table__assists" style="vertical-align: middle; width: 8%; color:#009900;"><?= $row['assist'] ?></td>
                                                    <td class="team-roster-table__fouls" style="vertical-align: middle; width: 8%; color:#e69500;"><?= $row['ammo'] ?></td>
                                                    <td class="team-roster-table__card-y" style="vertical-align: middle; width: 8%; color:#ff3d3d;"><?= $row['espu'] ?></td>
                                                    <?php
                                                    $pg = $row['pg'];
                                                    $gol_partita = ( $row['gol'] / $pg );
                                                    ?>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($gol_partita * 100), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($gol_partita, 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                } else
                                    echo "<h6>Nessuna partita ancora disputata</h6>"
                                    ?>
                            </table>
                        </div>

                        <div role="tabpanel" class="table-responsive tab-pane fade" id="tab-champions">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__position" style="width: 8%"  align="center">Ruolo</th>
                                        <th class="team-roster-table__number" style="width: 8%">&nbsp;</th>
                                        <th class="team-roster-table__name" style="width: 20%">Giocatore</th>
                                        <th class="team-roster-table__age" style="width: 8%">GOL</th>
                                        <th class="team-roster-table__foot" style="width: 8%">PRE</th>
                                        <th class="team-roster-table__height" style="width: 8%">VO</th>
                                        <th class="team-roster-table__weight" style="width: 8%">FV</th>
                                        <th class="team-roster-table__assists" style="width: 8%">AS</th>
                                        <th class="team-roster-table__fouls" style="width: 8%"><img src="<?= base_url('/') ?>images/ammo.png"</th>
                                        <th class="team-roster-table__card-y" style="width: 8%"><img src="<?= base_url('/') ?>images/espu.png"</th>
                                        <th class="team-roster-table__weight" style="width: 8%">G/P</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if ($giornata > 0) {
                                    ?>
                                    <tbody>
                                        <?php
                                        foreach ($bomberTotaliChampions as $row) {
                                            if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                $filename = $row['id_giocatore'] . ".png";
                                            } else
                                                $filename = "dummy.png";

                                            //Visualizzo giocatori con almeno 1 gol
                                            if ($row['gol'] > 0) {
                                                switch ($i) {
                                                    case ($i == 1):
                                                        $bgcolor = 'bgcolor="#b6ffb3"';
                                                        break;
                                                    case ($i == 2);
                                                        $bgcolor = 'bgcolor="#ccffc9"';
                                                        break;
                                                    case ($i == 3);
                                                        $bgcolor = 'bgcolor="#e7ffe6"';
                                                        break;
                                                    case ($i > 3);
                                                        $bgcolor = "";
                                                        break;
                                                }
                                                ?>

                                                <tr style="padding: 0px 0px;" <?= $bgcolor ?> >
                                                    <?php
                                                    switch ($row['ruolo']) {
                                                        case 1:
                                                            $color = "#F93469";
                                                            $ruolo = "P";
                                                            break;
                                                        case 2;
                                                            $color = "#FC7422";
                                                            $ruolo = "D";
                                                            break;
                                                        case 3;
                                                            $color = "#1486F4";
                                                            $ruolo = "C";
                                                            break;
                                                        case 4;
                                                            $color = "#199D5B";
                                                            $ruolo = "A";
                                                            break;
                                                    }
                                                    ?>
                                                    <td class="team-roster-table__position" align="center" style="color: <?= $color ?>; font-size: 14px; vertical-align: middle; width: 8%;"><?= $ruolo ?></td>
                                                    <td class="team-roster-table__number" style="padding: 0px 0px; vertical-align: middle; width: 7%;" align="center">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                        </figure>
                                                    </td>
                                                    <td class="team-roster-table__name" style="vertical-align: middle; width: 15%;"><?= $row['cognome'] . " " . $row['nome'] ?></td>
                                                    <td class="team-roster-table__age" style="color: #1892ED; font-size: 14px; vertical-align: middle; width: 8%;"><?= $row['gol'] ?></td>
                                                    <td class="team-roster-table__foot" style="vertical-align: middle; width: 8%;"><?= $row['pg'] ?></td>
                                                    <?php
                                                    if ($row['voto'] >= 6)
                                                        $colorefont = "#009900";
                                                    if ($row['voto'] < 6)
                                                        $colorefont = "#ff3d3d";
                                                    ?>
                                                    <td class="team-roster-table__height" style="vertical-align: middle; width: 8%; color: <?= $colorefont ?>;"><?= number_format($row['voto'], 2) ?></td>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($row['fv'] * 10), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($row['fv'], 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-roster-table__assists" style="vertical-align: middle; width: 8%; color:#009900;"><?= $row['assist'] ?></td>
                                                    <td class="team-roster-table__fouls" style="vertical-align: middle; width: 8%; color:#e69500;"><?= $row['ammo'] ?></td>
                                                    <td class="team-roster-table__card-y" style="vertical-align: middle; width: 8%; color:#ff3d3d;"><?= $row['espu'] ?></td>
                                                    <?php
                                                    $pg = $row['pg'];
                                                    $gol_partita = ( $row['gol'] / $pg );
                                                    ?>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($gol_partita * 100), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($gol_partita, 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                } else
                                    echo "<h6>Nessuna partita ancora disputata</h6>"
                                    ?>
                            </table>
                        </div>

                        <div role="tabpanel" class="table-responsive tab-pane fade" id="tab-coppa">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__position" style="width: 8%"  align="center">Ruolo</th>
                                        <th class="team-roster-table__number" style="width: 8%">&nbsp;</th>
                                        <th class="team-roster-table__name" style="width: 20%">Giocatore</th>
                                        <th class="team-roster-table__age" style="width: 8%">GOL</th>
                                        <th class="team-roster-table__foot" style="width: 8%">PRE</th>
                                        <th class="team-roster-table__height" style="width: 8%">VO</th>
                                        <th class="team-roster-table__weight" style="width: 8%">FV</th>
                                        <th class="team-roster-table__assists" style="width: 8%">AS</th>
                                        <th class="team-roster-table__fouls" style="width: 8%"><img src="<?= base_url('/') ?>images/ammo.png"</th>
                                        <th class="team-roster-table__card-y" style="width: 8%"><img src="<?= base_url('/') ?>images/espu.png"</th>
                                        <th class="team-roster-table__weight" style="width: 8%">G/P</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if ($giornata > 0) {
                                    ?>
                                    <tbody>
                                        <?php
                                        foreach ($bomberTotaliCoppa as $row) {
                                            if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                $filename = $row['id_giocatore'] . ".png";
                                            } else
                                                $filename = "dummy.png";

                                            //Visualizzo giocatori con almeno 1 gol
                                            if ($row['gol'] > 0) {
                                                switch ($i) {
                                                    case ($i == 1):
                                                        $bgcolor = 'bgcolor="#b6ffb3"';
                                                        break;
                                                    case ($i == 2);
                                                        $bgcolor = 'bgcolor="#ccffc9"';
                                                        break;
                                                    case ($i == 3);
                                                        $bgcolor = 'bgcolor="#e7ffe6"';
                                                        break;
                                                    case ($i > 3);
                                                        $bgcolor = "";
                                                        break;
                                                }
                                                ?>

                                                <tr style="padding: 0px 0px;" <?= $bgcolor ?> >
                                                    <?php
                                                    switch ($row['ruolo']) {
                                                        case 1:
                                                            $color = "#F93469";
                                                            $ruolo = "P";
                                                            break;
                                                        case 2;
                                                            $color = "#FC7422";
                                                            $ruolo = "D";
                                                            break;
                                                        case 3;
                                                            $color = "#1486F4";
                                                            $ruolo = "C";
                                                            break;
                                                        case 4;
                                                            $color = "#199D5B";
                                                            $ruolo = "A";
                                                            break;
                                                    }
                                                    ?>
                                                    <td class="team-roster-table__position" align="center" style="color: <?= $color ?>; font-size: 14px; vertical-align: middle; width: 8%;"><?= $ruolo ?></td>
                                                    <td class="team-roster-table__number" style="padding: 0px 0px; vertical-align: middle; width: 7%;" align="center">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                        </figure>
                                                    </td>
                                                    <td class="team-roster-table__name" style="vertical-align: middle; width: 15%;"><?= $row['cognome'] . " " . $row['nome'] ?></td>
                                                    <td class="team-roster-table__age" style="color: #1892ED; font-size: 14px; vertical-align: middle; width: 8%;"><?= $row['gol'] ?></td>
                                                    <td class="team-roster-table__foot" style="vertical-align: middle; width: 8%;"><?= $row['pg'] ?></td>
                                                    <?php
                                                    if ($row['voto'] >= 6)
                                                        $colorefont = "#009900";
                                                    if ($row['voto'] < 6)
                                                        $colorefont = "#ff3d3d";
                                                    ?>
                                                    <td class="team-roster-table__height" style="vertical-align: middle; width: 8%; color: <?= $colorefont ?>;"><?= number_format($row['voto'], 2) ?></td>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($row['fv'] * 10), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($row['fv'], 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-roster-table__assists" style="vertical-align: middle; width: 8%; color:#009900;"><?= $row['assist'] ?></td>
                                                    <td class="team-roster-table__fouls" style="vertical-align: middle; width: 8%; color:#e69500;"><?= $row['ammo'] ?></td>
                                                    <td class="team-roster-table__card-y" style="vertical-align: middle; width: 8%; color:#ff3d3d;"><?= $row['espu'] ?></td>
                                                    <?php
                                                    $pg = $row['pg'];
                                                    $gol_partita = ( $row['gol'] / $pg );
                                                    ?>
                                                    <td class="team-roster-table__weight team-leader__avg" style="vertical-align: middle; width: 8%;">
                                                        <div class="circular">
                                                            <?php $percentuale = number_format(($gol_partita * 100), 2); ?>
                                                            <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                <span class="circular__percents"><?= number_format($gol_partita, 2) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                } else
                                    echo "<h6>Nessuna partita ancora disputata</h6>"
                                    ?>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- Team Roster: Table / End -->

                <!-- Player Glossary -->
                <div class="card">
                    <div class="card__header">
                        <h4>Glossario</h4>
                    </div>
                    <div class="card__content">
                        <div class="glossary">
                            <div class="glossary__item"><span class="glossary__abbr">GOL :</span> Gol Realizzati</div>
                            <div class="glossary__item"><span class="glossary__abbr">PRE :</span> Presenze</div>
                            <div class="glossary__item"><span class="glossary__abbr">VO :</span> Media Voto</div>
                            <div class="glossary__item"><span class="glossary__abbr">FV :</span> Media FantaVoto</div>
                            <div class="glossary__item"><span class="glossary__abbr">AS :</span> Assist Realizzati</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/ammo.png"> :</span> Numero di Ammonizioni</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/espu.png"> :</span> Numero di Espulsioni</div>
                            <div class="glossary__item"><span class="glossary__abbr">G/P :</span>Media Gol per Partita</div>
                        </div>
                    </div>
                </div>
                <!-- Player Glossary / End -->

            </div>
        </div>

        <!-- Content / End -->

