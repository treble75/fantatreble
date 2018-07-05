
        <?php
        switch ($stagione) {
            case "2011_12":
                $cena1 = 2;
                $cena2 = 4;
                $cena3 = 8;
                $scudettato = 7;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 30;
                $finale1 = 31;
                $finale2 = 32;
                $ultima_fittizia = 33;
                break;
            case "2012_13":
                $cena1 = 2;
                $cena2 = 6;
                $cena3 = 7;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 30;
                $finale1 = 31;
                $finale2 = 32;
                $ultima_fittizia = 33;
                break;
            case "2013_14":
                $cena1 = 2;
                $cena2 = 5;
                $cena3 = 8;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2014_15":
                $cena1 = 3;
                $cena2 = 4;
                $cena3 = 8;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2015_16":
                $cena1 = 2;
                $cena2 = 4;
                $cena3 = 7;
                $scudettato = 3;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2016_17":
                $cena1 = 6;
                $cena2 = 7;
                $cena3 = 10;
                $scudettato = 5;
                $partecipanti = 10;
                $ultima_campionato = 27;
                $prima_playoff = 28;
                $ultima_playoff = 33;
                $finale1 = 34;
                $finale2 = 35;
                $ultima_fittizia = 36;
                break;
            case "2017_18":
                $cena1 = 1;
                $cena2 = 6;
                $cena3 = 8;
                $scudettato = 7;
                $partecipanti = 10;
                $ultima_campionato = 27;
                $prima_playoff = 28;
                $ultima_playoff = 33;
                $finale1 = 34;
                $finale2 = 35;
                $ultima_fittizia = 36;
                break;
        }
        ?>

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Stagione <span class="highlight"><?= str_replace("_", "/" , $stagione) ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                          <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                          <li><a href="<?= base_url('/') ?>index.php/home/stagioni_precedenti">Stagioni Precedenti</a></li>
                          <li class="active">Stagione <?= str_replace("_", "/" , $stagione) ?></li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Treble League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/campionati_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Treble League</small>Classifica</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/calendari_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Treble League</small>Risultati</a></li>
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
                        <h4>Calendario <?= str_replace("_", "/" , $stagione) ?></h4>
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
                                    for ($i = 1; $i < $ultima_fittizia; $i++) {

                                        switch ($i) {
                                            case ($i <= $ultima_campionato):
                                                $label = $i;
                                                break;
                                            case ($i >= $prima_playoff && $i <= $ultima_playoff):
                                                $label = "Playoff";
                                                break;
                                            case ($i == $finale1):
                                                $label = "Finale";
                                                break;
                                            case ($i == $finale2):
                                                $label = "Finale";
                                                break;
                                        }

                                        if ($i % 2 == 0) {
                                            $color = 'bgcolor="#ffffff"';
                                        } else {
                                            $color = 'bgcolor="#f2fff0"';
                                        }

                                        foreach ($risultati as $row) {
                                            if ($row['giornata'] == $i) {
                                                ?>

                                                <tr <?= $color ?> >
                                                    <td class="team-result__date" style="width: 12%"><?= dataSettimanale($row['data']) ?></td>
                                                    <td class="team-result__status" style="width: 10%"><?= $label ?></td>
                                                    <td class="team-result__status" style="width: 18%">
                                                        <div class="team-meta">
                                                            <figure class="team-meta__logoCalendar">
                                                                <?php if ($row['id1'] != $row['id2']) { ?>
                                                                    <img src="<?= base_url('/') ?>images/albo/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], str_replace("_", "-" , $stagione)) ?>">
                                                                <?php } ?>
                                                            </figure>
                                                            <div class="team-meta__info">
                                                                <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], str_replace("_", "-" , $stagione)) ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], str_replace("_", "-" , $stagione)) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__score" style="color: #1892ED; font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                    <td class="team-result__status" align='right' style="width: 18%">
                                                        <div class="team-meta" style="text-align: right;">
                                                            <div class="team-meta__info" align='right'>
                                                                <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], str_replace("_", "-" , $stagione)) ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], str_replace("_", "-" , $stagione)) ?></span>
                                                            </div>
                                                            <figure class="team-meta__logoCalendar">
                                                                <?php if ($row['id1'] != $row['id2']) { ?>
                                                                    <img src="<?= base_url('/') ?>images/albo/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], str_replace("_", "-" , $stagione)) ?>">
                                                                <?php } ?>
                                                            </figure>
                                                        </div>
                                                    </td>
                                                    <td class="team-result__fouls" align='center' style="width: 12%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                            <?php
                                                            //Setto l'icona scudetto o cena o altre
                                                            if ($i > ($prima_playoff - 1) && $i < ($ultima_playoff + 1)) {
                                                                //Metto id degli ultimi 3 qualificati
                                                                if ($row['id1'] == $cena1 || $row['id1'] == $cena2 || $row['id1'] == $cena3) {
                                                                    ?>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/cena_black.png" />
                                                                    </figure>
                                                                    <?php
                                                                } else {
                                                                    if ($stagione == "2016_17" && $row['id1'] == 5 && $i == 29 || $stagione == "2016_17" && $row['id1'] == 2 && $i == 28) { ?>
                                                                        <figure class="team-meta__logoCalendar">
                                                                            <img src="<?= base_url('/') ?>images/molinari.png" />
                                                                        </figure>
                                                                    <?php
                                                                    } else {
                                                                ?>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                    </figure>
                                                                    <?php
                                                                    }
                                                                }
                                                                
                                                            } else {
                                                                ?>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>
                                                            <?php }
                                                            ?>

                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>index.php/home/dettagli_precedenti/<?= $i ?>/<?= $stagione ?>" class="btn btn-xs btn-default btn-outline btn-block"> Dettagli partita </a>
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

