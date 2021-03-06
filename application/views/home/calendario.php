

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Treble</span> League</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/classifica_perpetua" class="content-filter__link"><small>Treble League</small>Classifica Perpetua</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/statistiche_treble_league" class="content-filter__link"><small>Treble League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/marcatori" class="content-filter__link"><small>Treble League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/campionato" class="content-filter__link"><small>Treble League</small>Classifica</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/calendario" class="content-filter__link"><small>Treble League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/stagioni_precedenti" class="content-filter__link"><small>Treble League</small>Stagioni Precedenti</a></li>
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
                                            case ($i <= 27):
                                                $label = $i;
                                                break;
                                            case ($i >= 28 && $i <= 33):
                                                $label = "Playoff";
                                                break;
                                            case ($i == 34):
                                                $label = "Finale";
                                                break;
                                            case ($i == 35):
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
                                                                <h6 class="team-meta__name"><?= $nome_squadra ?></h6>
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
                                                                <h6 class="team-meta__name"><?= $nome_squadra ?></h6>
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

                                                            <?php
                                                            //Setto l'icona scudetto o cena o altre
                                                            if ($i > 27 && $i < 34) {
                                                                //Metto id degli ultimi 3 qualificati
                                                                if ($row['id1'] == 1 || $row['id1'] == 6 || $row['id1'] == 8) {
                                                                    ?>
                                                                    <figure class="team-meta__logoCalendar">
                                                                        <img src="<?= base_url('/') ?>images/cena_black.png" />
                                                                    </figure>
                                                                    <?php
                                                                } else {
                                                                ?>
                                                                        <figure class="team-meta__logoCalendar">
                                                                            <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                        </figure>
                                                                        <?php
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
                                                            <a href="<?= base_url('/') ?>home/dettagli/<?= $i ?>" class="btn btn-xs btn-default btn-outline btn-block"> Dettagli partita </a>
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

