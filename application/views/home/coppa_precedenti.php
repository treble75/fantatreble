
        <?php
        // DA MODIFICARE
        switch ($stagione) {
            case "2015_16":
                $preliminari = 0;
                $quarti = 10;
                $semi   = 24;
                $finale = 32;
                break;
            case "2016_17":
                $preliminari = 7;
                $quarti = 11;
                $semi   = 20;
                $finale = 31;
                break;
            case "2017_18":
                $preliminari = 7;
                $quarti = 11;
                $semi   = 20;
                $finale = 31;
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
                          <li><a href="<?= base_url('/') ?>home/stagioni_precedenti_coppa">Stagioni Precedenti</a></li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/marcatori_precedenti_coppa/<?= $stagione ?>" class="content-filter__link"><small>Coppa Treble</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/coppa_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Coppa Treble</small>Risultati</a></li>
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
                        <h4>Calendario Coppa Treble <?= str_replace("_", "/" , $stagione) ?></h4>
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

                                        switch ($i) {
                                            case ($i <= $preliminari):
                                                $label = "Preliminari";
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

                                        foreach ($risultati as $row) {
                                            if ($row['giornata'] == $i) {
                                                if ($stagione == "2015_16") {
                                                    switch ($i) {
                                                        case ($i == 2):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 10):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 18):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 24):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 28):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 32):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                    }
                                                } else {
                                                    switch ($i) {
                                                        case ($i == 4):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i ==7):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 10):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 11):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 15):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 20):
                                                            $color = 'bgcolor="#ffffff"';
                                                            break;
                                                        case ($i == 26):
                                                            $color = 'bgcolor="#f2fff0"';
                                                            break;
                                                        case ($i == 31):
                                                            $color = 'bgcolor="#ffffff"';
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
                                                            <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                        </figure>
                                                    </td>
                                                    <td class="team-result__game-overview" style="width: 18%">
                                                        <?php
                                                        if ($row['risultato1'] != "" && $row['risultato2'] != "") {
                                                            ?>
                                                            <a href="<?= base_url('/') ?>home/dettagli_precedenti_coppa/<?= $i ?>/<?= $stagione ?>" class="btn btn-xs btn-default btn-outline btn-block"> Dettagli partita </a>
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

