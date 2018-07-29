

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-team-calendario">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Calendario <span class="highlight"><?= $utente[0]['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>utente/team/<?= $utente[0]['id_utente'] ?>">Team</a></li>
                            <li class="active">Calendario</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_marcatori/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_statistiche/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_risultati/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Risultati</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>utente/team_calendario/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>utente/team_bacheca/<?= $utente[0]['id_utente'] ?>" class="content-filter__link"><small>Team</small>Bacheca</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">


                <!-- Single Product Tabbed Content -->
                <div class="product-tabs card card--xlg">
                    <div class="card__header">
                        <h4>Calendario 2018/19</h4>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-desciption" role="tab" data-toggle="tab"><small>Calendario</small>Treble League</a></li>
                        <li role="presentation"><a href="#tab-info" role="tab" data-toggle="tab"><small>Calendario</small>Champions League</a></li>
                        <li role="presentation"><a href="#tab-reviews" role="tab" data-toggle="tab"><small>Calendario</small>Coppa Treble</a></li>
                        <li role="presentation"><a href="#tab-supercoppa" role="tab" data-toggle="tab"><small>Calendario</small>SuperCoppa Treble</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content card__content">

                        <!-- Tab: Description -->
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-desciption">

                            <!-- Team Latest Results -->
                            <div class="card card--has-table">

                                <?php
                                $bgcolor = 'bgcolor="#ffffff"';
                                $i = 1;
                                if (count($prossimiMatch) > 0) {
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Giornata</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">&nbsp;</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                $i = 1;
                                                $bgcolor = 'bgcolor="#ffffff"';
                                                foreach ($prossimiMatch as $row) {
                                                    if ($row['id1'] == $utente[0]['id_utente'] || $row['id2'] == $utente[0]['id_utente']) {
                                                        $colore = "";
                                                        $evidenzia1 = "";
                                                        $evidenzia2 = "";
                                                        if ($row['id1'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato1'] > $row['risultato2'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato1'] < $row['risultato2'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia1 = "style='color: #1892ED; font-size: 12px;'";
                                                        }
                                                        if ($row['id2'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato2'] > $row['risultato1'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato2'] < $row['risultato1'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia2 = "style='color: #1892ED; font-size: 12px;'";
                                                        }

                                                        switch ($row['giornata']) {
                                                            case ($row['giornata'] <= 27):
                                                                $label = $row['giornata'];
                                                                break;
                                                            case ($row['giornata'] >= 28 && $row['giornata'] <= 33):
                                                                $label = "Playoff";
                                                                break;
                                                            case ($row['giornata'] == 34):
                                                                $label = "Finale";
                                                                break;
                                                            case ($row['giornata'] == 35):
                                                                $label = "Finale";
                                                                break;
                                                        }

                                                        if ($row['giornata'] % 2 == 0) {
                                                            $color = 'bgcolor="#ffffff"';
                                                        } else {
                                                            $color = 'bgcolor="#f2fff0"';
                                                        }
                                                        ?>

                                                        <tr <?= $color ?> >
                                                            <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                            <td class="team-result__status" style="width: 14%"><?= $label ?></td>
                                                            <td class="team-result__status" style="width: 22%">
                                                                <div class="team-meta">
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                    <div class="team-meta__info">
                                                                        <h6 class="team-meta__name" <?= $evidenzia1 ?>><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__score" style="<?= $colore ?> font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                            <td class="team-result__status" align='right' style="width: 22%">
                                                                <div class="team-meta" style="text-align: right;">
                                                                    <div class="team-meta__info" align='right'>
                                                                        <h6 class="team-meta__name" <?= $evidenzia2 ?>><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                    </div>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                    </figure>

                                                            </td>
                                                        </tr>

                                                        <!-- Generazione Calendario / END  --->
                                                        <?php
                                                    }
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                <?php } else {
                                    ?>
                                    <div class = "alert alert-warning alert-dismissible">
                                        <strong>Nessuna partita di Treble League in programma</strong>
                                    </div>
                                    <?php
                                }
                                ?> 

                            </div>
                            <!-- Team Latest Results / End -->

                        </div>
                        <!-- Tab: Description / End -->

                        <!-- Tab: Shipping -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-info">

                            <!-- Team Latest Results -->
                            <div class="card card--has-table">

                                <div class="table-responsive">

                                    <?php
                                    $bgcolor = 'bgcolor="#ffffff"';
                                    $i = 1;
                                    if (count($prossimiMatchChampions) > 0) {
                                        ?>

                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Giornata</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">&nbsp;</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                $i = 1;
                                                $bgcolor = 'bgcolor="#ffffff"';
                                                foreach ($prossimiMatchChampions as $row) {
                                                    if ($row['id1'] == $utente[0]['id_utente'] || $row['id2'] == $utente[0]['id_utente']) {
                                                        $colore = "";
                                                        $label = "";
                                                        $evidenzia1 = "";
                                                        $evidenzia2 = "";
                                                        if ($row['id1'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato1'] > $row['risultato2'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato1'] < $row['risultato2'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia1 = "style='color: #1892ED; font-size: 12px;'";
                                                        }
                                                        if ($row['id2'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato2'] > $row['risultato1'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato2'] < $row['risultato1'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia2 = "style='color: #1892ED; font-size: 12px;'";
                                                        }

                                                        switch ($row['giornata']) {
                                                            case ($row['giornata'] = 2):
                                                                $label = "1";
                                                                break;
                                                            case ($row['giornata'] = 3):
                                                                $label = "2";
                                                                break;
                                                            case ($row['giornata'] = 6):
                                                                $label = "3";
                                                                break;
                                                            case ($row['giornata'] = 9):
                                                                $label = "4";
                                                                break;
                                                            case ($row['giornata'] = 12):
                                                                $label = "5";
                                                                break;
                                                            case ($row['giornata'] = 13):
                                                                $label = "6";
                                                                break;
                                                            case ($row['giornata'] = 16):
                                                                $label = "7";
                                                                break;
                                                            case ($row['giornata'] = 17):
                                                                $label = "8";
                                                                break;
                                                            case ($row['giornata'] = 19):
                                                                $label = "9";
                                                                break;
                                                            case ($row['giornata'] = 22):
                                                                $label = "10";
                                                                break;
                                                            case ($row['giornata'] = 23):
                                                                $label = "Quarti";
                                                                break;
                                                            case ($row['giornata'] = 24):
                                                                $label = "Quarti";
                                                                break;
                                                            case ($row['giornata'] = 27):
                                                                $label = "Semifinali";
                                                                break;
                                                            case ($row['giornata'] = 28):
                                                                $label = "Semifinali";
                                                                break;
                                                            case ($row['giornata'] = 30):
                                                                $label = "Finale";
                                                                break;
                                                            case ($row['giornata'] = 33):
                                                                $label = "Finale";
                                                                break;
                                                        }

                                                        if ($bgcolor == 'bgcolor="#f2fff0"') {
                                                            $bgcolor = 'bgcolor="#ffffff"';
                                                        } else {
                                                            $bgcolor = 'bgcolor="#f2fff0"';
                                                        }
                                                        ?>

                                                        <tr <?= $bgcolor ?> >
                                                            <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                            <td class="team-result__status" style="width: 14%"><?= $label ?></td>
                                                            <td class="team-result__status" style="width: 22%">
                                                                <div class="team-meta">
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                    <div class="team-meta__info">
                                                                        <h6 class="team-meta__name" <?= $evidenzia1 ?>><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__score" style="<?= $colore ?> font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                            <td class="team-result__status" align='right' style="width: 22%">
                                                                <div class="team-meta" style="text-align: right;">
                                                                    <div class="team-meta__info" align='right'>
                                                                        <h6 class="team-meta__name" <?= $evidenzia2 ?>><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                    </div>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                                    </figure>

                                                            </td>
                                                        </tr>

                                                        <!-- Generazione Calendario / END  --->
                                                        <?php
                                                    }
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    <?php } else {
                                        ?>
                                        <div class = "alert alert-warning alert-dismissible">
                                            <strong>Nessuna partita di Champions League in programma</strong>
                                        </div>
                                        <?php
                                    }
                                    ?> 

                                </div>

                            </div>
                            <!-- Team Latest Results / End -->

                        </div>
                        <!-- Tab: Shipping / End -->

                        <!-- Tab: Reviews -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-reviews">

                            <!-- Team Latest Results -->
                            <div class="card card--has-table">

                                <div class="table-responsive">

                                    <?php
                                    $bgcolor = 'bgcolor="#ffffff"';
                                    $i = 1;
                                    if (count($prossimiMatchCoppa) > 0) {
                                        ?>

                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Giornata</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">&nbsp;</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($prossimiMatchCoppa as $row) {
                                                    if ($row['id1'] == $utente[0]['id_utente'] || $row['id2'] == $utente[0]['id_utente']) {
                                                        $colore = "";
                                                        $label = "";
                                                        $evidenzia1 = "";
                                                        $evidenzia2 = "";
                                                        if ($row['id1'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato1'] > $row['risultato2'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato1'] < $row['risultato2'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia1 = "style='color: #1892ED; font-size: 12px;'";
                                                        }
                                                        if ($row['id2'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato2'] > $row['risultato1'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato2'] < $row['risultato1'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia2 = "style='color: #1892ED; font-size: 12px;'";
                                                        }

                                                        switch ($row['giornata']) {
                                                            case ($row['giornata'] <= 7):
                                                                $label = "Preliminari";
                                                                break;
                                                            case ($row['giornata'] >= 10 && $row['giornata'] <= 11):
                                                                $label = "Quarti";
                                                                break;
                                                            case ($row['giornata'] >= 15 && $row['giornata'] <= 20):
                                                                $label = "Semifinali";
                                                                break;
                                                            case ($row['giornata'] >= 26 && $row['giornata'] <= 31):
                                                                $label = "Finale";
                                                                break;
                                                        }

                                                        if ($bgcolor == 'bgcolor="#f2fff0"') {
                                                            $bgcolor = 'bgcolor="#ffffff"';
                                                        } else {
                                                            $bgcolor = 'bgcolor="#f2fff0"';
                                                        }
                                                        ?>

                                                        <tr <?= $bgcolor ?> >
                                                            <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                            <td class="team-result__status" style="width: 14%"><?= $label ?></td>
                                                            <td class="team-result__status" style="width: 22%">
                                                                <div class="team-meta">
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                    <div class="team-meta__info">
                                                                        <h6 class="team-meta__name" <?= $evidenzia1 ?>><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__score" style="<?= $colore ?> font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                            <td class="team-result__status" align='right' style="width: 22%">
                                                                <div class="team-meta" style="text-align: right;">
                                                                    <div class="team-meta__info" align='right'>
                                                                        <h6 class="team-meta__name" <?= $evidenzia2 ?>><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                    </div>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                                    </figure>

                                                            </td>
                                                        </tr>

                                                        <!-- Generazione Calendario / END  --->
                                                        <?php
                                                    }
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php } else {
                                        ?>
                                        <div class = "alert alert-warning alert-dismissible">
                                            <strong>Nessuna partita di Coppa Treble in programma</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>            

                                </div>

                            </div>
                            <!-- Team Latest Results / End -->

                        </div>
                        <!-- Tab: Reviews / End -->
                        
                        <!-- Tab: Reviews -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-supercoppa">

                            <!-- Team Latest Results -->
                            <div class="card card--has-table">

                                <div class="table-responsive">

                                    <?php
                                    $bgcolor = 'bgcolor="#ffffff"';
                                    $i = 1;
                                    if (count($prossimiMatchSuperCoppa) > 0) {
                                        ?>

                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Giornata</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">&nbsp;</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($prossimiMatchSuperCoppa as $row) {
                                                    if ($row['id1'] == $utente[0]['id_utente'] || $row['id2'] == $utente[0]['id_utente']) {
                                                        $colore = "";
                                                        $label = "";
                                                        $evidenzia1 = "";
                                                        $evidenzia2 = "";
                                                        if ($row['id1'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato1'] > $row['risultato2'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato1'] < $row['risultato2'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia1 = "style='color: #1892ED; font-size: 12px;'";
                                                        }
                                                        if ($row['id2'] == $utente[0]['id_utente']) {
                                                            if ($row['risultato2'] > $row['risultato1'])
                                                                $colore = "color: #009900;";
                                                            if ($row['risultato2'] < $row['risultato1'])
                                                                $colore = "color: #ff3d3d;";
                                                            $evidenzia2 = "style='color: #1892ED; font-size: 12px;'";
                                                        }

                                                        $label = "Finale";

                                                        if ($bgcolor == 'bgcolor="#f2fff0"') {
                                                            $bgcolor = 'bgcolor="#ffffff"';
                                                        } else {
                                                            $bgcolor = 'bgcolor="#f2fff0"';
                                                        }
                                                        ?>

                                                        <tr <?= $bgcolor ?> >
                                                            <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                            <td class="team-result__status" style="width: 14%"><?= $label ?></td>
                                                            <td class="team-result__status" style="width: 22%">
                                                                <div class="team-meta">
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                    <div class="team-meta__info">
                                                                        <h6 class="team-meta__name" <?= $evidenzia1 ?>><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__score" style="<?= $colore ?> font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                            <td class="team-result__status" align='right' style="width: 22%">
                                                                <div class="team-meta" style="text-align: right;">
                                                                    <div class="team-meta__info" align='right'>
                                                                        <h6 class="team-meta__name" <?= $evidenzia2 ?>><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
                                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                    </div>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <?php if ($row['id1'] != $row['id2']) { ?>
                                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
                                                                        <?php } ?>
                                                                    </figure>
                                                                </div>
                                                            </td>
                                                            <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/supercoppa.png" width="20px" />
                                                                    </figure>

                                                            </td>
                                                        </tr>

                                                        <!-- Generazione Calendario / END  --->
                                                        <?php
                                                    }
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php } else {
                                        ?>
                                    <div class="spacer"></div>
                                        <div class = "alert alert-warning alert-dismissible">
                                            <strong>Nessuna partita di Coppa Treble in programma</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>            

                                </div>

                            </div>
                            <!-- Team Latest Results / End -->

                        </div>
                        <!-- Tab: Reviews / End -->
                        
                    </div>

                </div>
                <!-- Single Product Tabbed Content / End -->


            </div>
        </div>

        <!-- Content / End -->

