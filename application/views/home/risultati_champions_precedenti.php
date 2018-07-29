
        <?php
        // DA MODIFICARE
        switch ($stagione) {
            case "2015_16":
                $preliminari = 16;
                $semi   = 22;
                $finale = 30;
                break;
            case "2016_17":
                $preliminari = 22;
                $quarti = 24;
                $semi   = 28;
                $finale = 33;
                break;
            case "2017_18":
                $preliminari = 22;
                $quarti = 24;
                $semi   = 28;
                $finale = 33;
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
                          <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                          <li><a href="<?= base_url('/') ?>home/stagioni_precedenti_champions">Stagioni Precedenti</a></li>
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
                    <li class="content-filter__item"><a href="<?= base_url('/') ?>home/marcatori_precedenti_champions/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Marcatori</a></li>
                    <li class="content-filter__item"><a href="<?= base_url('/') ?>home/champions_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Classifica</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/risultati_champions_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Risultati</a></li>
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
                        <h4>Calendario Champions League <?= str_replace("_", "/" , $stagione) ?></h4>
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
                                    for ($i = 1; $i <= $finale; $i++) {

                                        foreach ($risultati as $row) {
                                            if ($row['giornata'] == $i) {
                                                if ($stagione == "2015_16") {
                                                    
                                                    switch ($i) {
                                                        case ($i == 4):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 6):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 8):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 12):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 14):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 16):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 20):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 22):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 26):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 30):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                    }
                                                    
                                                    switch ($i) {
                                                        case ($i == 4):
                                                            $label = "1";
                                                            break;
                                                        case ($i == 6):
                                                            $label = "2";
                                                            break;
                                                        case ($i == 8):
                                                            $label = "3";
                                                            break;
                                                        case ($i == 12):
                                                            $label = "4";
                                                            break;
                                                        case ($i == 14):
                                                            $label = "5";
                                                            break;
                                                        case ($i == 16):
                                                            $label = "6";
                                                            break;
                                                        case ($i > $preliminari && $i <= $semi):
                                                            $label = "Semifinali";
                                                            break;
                                                        case ($i > $semi && $i <= $finale):
                                                            $label = "Finale";
                                                            break;
                                                    }
                                                    
                                                } else {
                                                    
                                                    switch ($i) {
                                                        case ($i == 2):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 3):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 6):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 9):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 12):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 13):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 16):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 17):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 19):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 22):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 23):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 24):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 27):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 28):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 30):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 33):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                    }
                                                    
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
                                                        case ($i > $preliminari && $i <= $quarti):
                                                            $label = "Quarti";
                                                            break;
                                                        case ($i > $quarti && $i <= $semi):
                                                            $label = "Semifinali";
                                                            break;
                                                        case ($i > $semi && $i <= $finale):
                                                            $label = "Finale";
                                                            break;
                                                    }
                                                    
                                                }
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
                                                        <figure class="team-meta__logoCalendar">
                                                            <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                        </figure>
                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>home/dettagli_precedenti_champions/<?= $i ?>/<?= $stagione ?>" class="btn btn-xs btn-default btn-outline btn-block"> Dettagli partita </a>
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

