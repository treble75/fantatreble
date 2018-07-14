


        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-marcatori-coppa">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Coppa <span class="highlight">Treble</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/statistiche_coppa" class="content-filter__link"><small>Coppa Treble</small>Statistiche</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/marcatori_coppa" class="content-filter__link"><small>Coppa Treble</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/coppa" class="content-filter__link"><small>Coppa Treble</small>Griglia</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/calendario_coppa" class="content-filter__link"><small>Coppa Treble</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-gallery.html" class="content-filter__link"><small>Coppa Treble</small>Stagioni Precedenti</a></li>
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
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__position" style="width: 8%"  align="center">Ruolo</th>
                                        <th class="team-roster-table__number" style="width: 7%">&nbsp;</th>
                                        <th class="team-roster-table__name" style="width: 15%">Giocatore</th>
                                        <th class="team-roster-table__age" style="width: 8%">Gol</th>
                                        <th class="team-roster-table__foot" style="width: 8%">Presenze</th>
                                        <th class="team-roster-table__height" style="width: 8%">Voto</th>
                                        <th class="team-roster-table__weight" style="width: 8%">Media</th>
                                        <th class="team-roster-table__assists" style="width: 8%">Assist</th>
                                        <th class="team-roster-table__fouls" style="width: 8%"><img src="<?= base_url('/') ?>images/ammo.png"</th>
                                        <th class="team-roster-table__card-y" style="width: 8%"><img src="<?= base_url('/') ?>images/espu.png"</th>
                                        <th class="team-roster-table__name" style="width: 14%">Squadra</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if ($giornata > 0) {
                                    ?>
                                    <tbody>
                                        <?php
                                        foreach ($bomber as $row) {
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
                                                    <td class="team-roster-table__name" style="vertical-align: middle; width: 15%; color: #1892ED;"><?= $row['cognome'] . " " . $row['nome'] ?></td>
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
                                                    $squadra_precedente = $this->mdl_team->getNomeTeam($row['id_utente']);
                                                    if (is_array($squadra_precedente) && count($squadra_precedente) == 0) {
                                                        $squadra_precedente = "";
                                                    }
                                                    ?>
                                                    <td class="team-roster-table__name" style="vertical-align: middle; width: 14%;"><?= $squadra_precedente ?></td>
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

            </div>
        </div>

        <!-- Content / End -->

