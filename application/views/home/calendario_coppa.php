

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Coppa <span class="highlight">Treble</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>Detentore: All Blacks</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/statistiche_coppa" class="content-filter__link"><small>Coppa Treble</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori_coppa" class="content-filter__link"><small>Coppa Treble</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/coppa" class="content-filter__link"><small>Coppa Treble</small>Griglia</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/calendario_coppa" class="content-filter__link"><small>Coppa Treble</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-schedule.html" class="content-filter__link"><small>Coppa Treble</small>Schedule</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-gallery.html" class="content-filter__link"><small>Coppa Treble</small>Gallery</a></li>
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
                        <h4>Calendario 2017/18</h4>
                        <!-- Result Filter -->
                        <ul class="team-result-filter">
                            <!-- Selettore stagione Treble League 
                            <li class="team-result-filter__item">
                              <select class="form-control input-xs">
                                <option>Treble League 2016</option>
                                <option>Treble League 2015</option>
                                <option>Treble League 2014</option>
                              </select>
                            </li>
                            ---->
                            <li class="team-result-filter__item">
                                <select class="form-control input-xs">
                                    <option>Giornata</option>
                                    <option>December 2016</option>
                                    <option>November 2016</option>
                                    <option>October 2016</option>
                                    <option>September 2016</option>
                                    <option>August 2016</option>
                                    <option>July 2016</option>
                                    <option>June 2016</option>
                                    <option>May 2016</option>
                                    <option>April 2016</option>
                                    <option>March 2016</option>
                                    <option>February 2016</option>
                                    <option>January 2016</option>
                                </select>
                            </li>
                            <li class="team-result-filter__item">
                                <select class="form-control input-xs">
                                    <option>Ascending</option>
                                    <option>Descending</option>
                                </select>
                            </li>
                            <li class="team-result-filter__item">
                                <button type="submit" class="btn btn-default btn-outline btn-xs card-header__button">Filter Latest Results</button>
                            </li>
                        </ul>
                        <!-- Result Filter / End -->
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
                                            case ($i == 4):
                                                $label = "Preliminari";
                                                break;
                                            case ($i == 7):
                                                $label = "Preliminari";
                                                break;
                                            case ($i == 10):
                                                $label = "Quarti";
                                                break;
                                            case ($i == 11):
                                                $label = "Quarti";
                                                break;
                                            case ($i == 15):
                                                $label = "Semifinali";
                                                break;
                                            case ($i == 20):
                                                $label = "Semifinali";
                                                break;
                                            case ($i == 26):
                                                $label = "Finale";
                                                break;
                                            case ($i == 31):
                                                $label = "Finale";
                                                break;
                                                break;
                                        }

                                        if ($i == 4 || $i == 10 || $i == 15 || $i == 26) {
                                            $color = 'bgcolor="#ffffff"';
                                        } else {
                                            $color = 'bgcolor="#f2fff0"';
                                        }

                                        //Inizializzo * per le qualificate
                                        $ok1 = "";
                                        $ok2 = "";

                                        foreach ($risultati_coppa as $row) {
                                            if ($row['giornata'] == $i) {
                                                //Segnalo squadre qualificate
                                                if ($i == 7) {
                                                    //Segnalo in verde le squadre qualificate : inserire id delle squadre eliminate
                                                    if ($row['id1'] != 1 && $row['id1'] != 2 && $row['id1'] != 6 && $row['id1'] != 7 && $row['id1'] != 9) {
                                                        $ok1 = " * ";
                                                    } else
                                                        $ok1 = "";
                                                    if ($row['id2'] != 1 && $row['id2'] != 2 && $row['id2'] != 6 && $row['id2'] != 7 && $row['id2'] != 9) {
                                                        $ok2 = " * ";
                                                    } else
                                                        $ok2 = "";
                                                }

                                                if ($i == 11) {
                                                    //Segnalo in verde le squadre qualificate : inserire id delle squadre eliminate
                                                    if ($row['id1'] != 1 && $row['id1'] != 3 && $row['id1'] != 8 && $row['id1'] != 9) {
                                                        $ok1 = " * ";
                                                    } else
                                                        $ok1 = "";
                                                    if ($row['id2'] != 1 && $row['id2'] != 3 && $row['id2'] != 8 && $row['id2'] != 9) {
                                                        $ok2 = " * ";
                                                    } else
                                                        $ok2 = "";
                                                }

                                                if ($i == 20) {
                                                    //Segnalo in verde le squadre qualificate : inserire id delle squadre eliminate
                                                    if ($row['id1'] != 4 && $row['id1'] != 5) {
                                                        $ok1 = " * ";
                                                    } else
                                                        $ok1 = "";
                                                    if ($row['id2'] != 4 && $row['id2'] != 5) {
                                                        $ok2 = " * ";
                                                    } else
                                                        $ok2 = "";
                                                }
                                                ?>

                                                <tr <?= $color ?> >
                                                    <td class="team-result__date" style="width: 12%"><?= dataSettimanale($row['data']) ?></td>
                                                    <td class="team-result__status" style="width: 10%"><?= $label ?></td>
                                                    <td class="team-result__status" style="width: 18%">
                                                        <div class="team-meta">
                                                            <figure class="team-meta__logoCalendar">
                                                                <?php if ($row['id1'] != $row['id2']) { ?>
                                                                    <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                <?php } ?>
                                                            </figure>
                                                            <div class="team-meta__info">
                                                                <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadra($row['id1']) . " " . "<span style='color: #1892ED; font-size: 14px;'>" . $ok1 . "</span>" ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__score" style="color: #1892ED; font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                    <td class="team-result__status" align='right' style="width: 18%">
                                                        <div class="team-meta" style="text-align: right;">
                                                            <div class="team-meta__info" align='right'>
                                                                <h6 class="team-meta__name"><?= "<span style='color: #1892ED; font-size: 14px;'>" . $ok2 . "</span> " . $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
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
                                                                <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                            </figure>                                      
                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>index.php/home/dettaglicoppa/<?= $i ?>" class="btn btn-xs btn-default btn-outline btn-block">Dettaglio giornata</a>
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

