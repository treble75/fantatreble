

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-champions-calendario">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Champions</span> League</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>&nbsp;</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/statistiche_champions" class="content-filter__link"><small>Champions League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/marcatori_champions" class="content-filter__link"><small>Champions League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/champions" class="content-filter__link"><small>Champions League</small>Classifica</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/calendario_champions" class="content-filter__link"><small>Champions League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/stagioni_precedenti_champions" class="content-filter__link"><small>Champions League</small>Stagioni Precedenti</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <!-- Team Latest Results -->
                <div class="card card--has-table">
                    <div class="card__header card__header--has-btn">
                        <h4>Calendario 2018/19</h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover team-result">
                                <thead>
                                    <tr>
                                        <th class="team-result__date" style="width: 12%">Data</th>
                                        <th class="team-result__status" style="width: 10%">Giornata</th>
                                        <th class="team-result__status" style="width: 18%">&nbsp;</th>
                                        <th class="team-result__score" style="width: 12%">Risultato</th>
                                        <th class="team-result__status" style="width: 18%">&nbsp;</th>
                                        <th class="team-result__fouls" style="width: 12%">&nbsp;</th>
                                        <th class="team-result__game-overview" style="width: 18%">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Generazione Calendario  --->

                                    <?php
                                    for ($i = 1; $i < 36; $i++) {

                                        switch ($i) {
                                            case ($i == 2):
                                                $label = "1";
                                                break;
                                            case ($i == 3):
                                                $label = "2";
                                                break;
                                            case ($i == 6):
                                                $label = "3";
                                                break;
                                            case ($i == 9):
                                                $label = "4";
                                                break;
                                            case ($i == 12):
                                                $label = "5";
                                                break;
                                            case ($i == 13):
                                                $label = "6";
                                                break;
                                            case ($i == 16):
                                                $label = "7";
                                                break;
                                            case ($i == 17):
                                                $label = "8";
                                                break;
                                            case ($i == 19):
                                                $label = "9";
                                                break;
                                            case ($i == 22):
                                                $label = "10";
                                                break;
                                            case ($i >= 23 && $i <= 24):
                                                $label = "Quarti";
                                                break;
                                            case ($i >= 27 && $i <= 28):
                                                $label = "Semifinali";
                                                break;
                                            case ($i >= 30 && $i <= 33):
                                                $label = "Finale";
                                                break;
                                        }

                                        if ($i == 2 || $i == 6 || $i == 12 || $i == 16 || $i == 19 || $i == 23 || $i == 27 || $i == 30) {
                                            $color = 'bgcolor="#ffffff"';
                                        } else {
                                            $color = 'bgcolor="#f2fff0"';
                                        }

                                        $ok1 = "";
                                        $ok2 = "";

                                        foreach ($risultati_champions as $row) {
                                            if ($row['giornata'] == $i) {
                                                //Segnalo squadre qualificate
                                                /*
                                                if ($i == 24) {
                                                    //Segnalo in verde le squadre qualificate : inserire id delle squadre eliminate
                                                    if ($row['id1'] != 3 && $row['id1'] != 4 && $row['id1'] != 6 && $row['id1'] != 10) {
                                                        $ok1 = " * ";
                                                    } else
                                                        $ok1 = "";
                                                    if ($row['id2'] != 3 && $row['id2'] != 4 && $row['id2'] != 6 && $row['id2'] != 10) {
                                                        $ok2 = " * ";
                                                    } else
                                                        $ok2 = "";
                                                }
                                                if ($i == 28) {
                                                    //Segnalo in verde le squadre qualificate : inserire id delle squadre eliminate
                                                    if ($row['id1'] != 2 && $row['id1'] != 5 ) {
                                                        $ok1 = " * ";
                                                    } else
                                                        $ok1 = "";
                                                    if ($row['id2'] != 2 && $row['id2'] != 5 ) {
                                                        $ok2 = " * ";
                                                    } else
                                                        $ok2 = "";
                                                } */
                                                ?>

                                                <tr <?= $color ?> >
                                                    <td class="team-result__date" style="width: 12%"><?= dataSettimanale($row['data']) ?></td>
                                                    <td class="team-result__status" style="width: 10%"><?= $label ?></td>
                                                    <td class="team-result__status" style="width: 18%">
                                                        <div class="team-meta">
                                                            <figure class="team-meta__logoCalendar">
                                                                <?php if ($row['id1'] != $row['id2']) { ?>
                                                                    <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                <?php 
                                                                    $nome_squadra = $this->mdl_utenti->getSquadra($row['id1']);
                                                                    $nome_utente = $this->mdl_utenti->getNomeUtente($row['id1']);
                                                                } else {
                                                                    $nome_utente = "";
                                                                    $nome_squadra = "";
                                                                }
                                                                ?>
                                                            </figure>
                                                            <div class="team-meta__info">
                                                                <h6 class="team-meta__name"><?= $nome_squadra . "<span style='color: #1892ED; font-size: 14px;'>" . @$ok1 . "</span>" ?></h6>
                                                                <span class="team-meta__place"><?= $nome_utente ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__score" style="color: #1892ED; font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                    <td class="team-result__status" align='right' style="width: 18%">
                                                        <div class="team-meta" style="text-align: right;">
                                                            <div class="team-meta__info" align='right'>
                                                                <?php if ($row['id1'] != $row['id2']) { 
                                                                    $nome_squadra = $this->mdl_utenti->getSquadra($row['id2']);
                                                                    $nome_utente = $this->mdl_utenti->getNomeUtente($row['id2']);
                                                                } else {
                                                                    $nome_utente = "";
                                                                    $nome_squadra = "";
                                                                }
                                                                ?>
                                                                <h6 class="team-meta__name"><?= "<span style='color: #1892ED; font-size: 14px;'>" . @$ok2 . "</span>" . $nome_squadra ?></h6>
                                                                <span class="team-meta__place"><?= $nome_utente ?></span>
                                                            </div>
                                                            <figure class="team-meta__logoCalendar">
                                                                <?php if ($row['id1'] != $row['id2']) { ?>
                                                                    <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
                                                                <?php } ?>
                                                            </figure>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__fouls" align='center' style="width: 12%; text-align: center;"><div class="team-meta" style="text-align: center;">
                                                            <figure class="team-meta__logoCalendar">
                                                                <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                            </figure>                                      
                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>home/dettaglichampions/<?= $i ?>" class="btn btn-xs btn-default btn-outline btn-block">Dettaglio giornata</a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                                <!-- Generazione Calendario / END  --->
                                                <?php
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Team Latest Results / End -->

            </div>
        </div>

        <!-- Content / End -->

