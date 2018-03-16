

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Champions</span> League</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>Detentore: Frank One</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/statistiche_champions" class="content-filter__link"><small>Champions League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori_champions" class="content-filter__link"><small>Champions League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/champions" class="content-filter__link"><small>Champions League</small>Classifica</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/calendario_champions" class="content-filter__link"><small>Champions League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-schedule.html" class="content-filter__link"><small>Champions League</small>Schedule</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-gallery.html" class="content-filter__link"><small>Champions League</small>Gallery</a></li>
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
                                                                <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadra($row['id1']) . "<span style='color: #1892ED; font-size: 14px;'>" . @$ok1 . "</span>" ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__score" style="color: #1892ED; font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                    <td class="team-result__status" align='right' style="width: 18%">
                                                        <div class="team-meta" style="text-align: right;">
                                                            <div class="team-meta__info" align='right'>
                                                                <h6 class="team-meta__name"><?= "<span style='color: #1892ED; font-size: 14px;'>" . @$ok2 . "</span>" . $this->mdl_utenti->getSquadra($row['id2']) ?></h6>
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
                                                                <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                            </figure>                                      
                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>index.php/home/dettaglichampions/<?= $i ?>" class="btn btn-xs btn-default btn-outline btn-block">Dettaglio giornata</a>
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

