


        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">SuperCoppa <span class="highlight">Treble</span></h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <!-- Setto la giornata per la classifica
                <?php
                //$giornata = (isset($giornata) ? $giornata : 34);
                ?>

                <!-- Team Standings -->
                <div class="card card--has-table">
                    <div class="card__header">
                        <!-- Anno da modificare -->
                        <h4>SuperCoppa Treble 2018/19</h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">

                            <div class="card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover team-result">
                                        <thead>
                                            <tr>
                                                <th class="team-result__date" style="width: 13%">Data</th>
                                                <th class="team-result__status" style="width: 10%">&nbsp;</th>
                                                <th class="team-result__status" style="width: 18%">&nbsp;</th>
                                                <th class="team-result__score" style="width: 12%">Risultato</th>
                                                <th class="team-result__status" style="width: 18%">&nbsp;</th>
                                                <th class="team-result__fouls" style="width: 12%">&nbsp;</th>
                                                <th class="team-result__game-overview" style="width: 18%">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- Generazione Calendario  --->

                                            <tr>
                                                <td class="team-result__date" style="width: 13%"><?= dataSettimanale($risultati_supercoppa[0]['data']) ?></td>
                                                <td class="team-result__status" style="width: 10%">&nbsp;</td>
                                                <td class="team-result__status" style="width: 18%">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logoCalendar">
                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $risultati_supercoppa[0]['id1'] ?>.png">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadra($risultati_supercoppa[0]['id1']) . " " ?></h6>
                                                            <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($risultati_supercoppa[0]['id1']) ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-result__score" style="color: #1892ED; font-size: 14px; width: 12%;"><?= $risultati_supercoppa[0]['risultato1'] . " - " . $risultati_supercoppa[0]['risultato2'] ?></td>
                                                <td class="team-result__status" align='right' style="width: 18%">
                                                    <div class="team-meta" style="text-align: right;">
                                                        <div class="team-meta__info" align='right'>
                                                            <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadra($risultati_supercoppa[0]['id2']) ?></h6>
                                                            <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($risultati_supercoppa[0]['id2']) ?></span>
                                                        </div>
                                                        <figure class="team-meta__logoCalendar">
                                                            <img src="<?= base_url('/') ?>images/users/mini<?= $risultati_supercoppa[0]['id2'] ?>.png">
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td class="team-result__fouls" align='center' style="width: 12%; text-align: center;"><div class="team-meta" style="text-align: center;">
                                                        <figure class="team-meta__logoCalendar">
                                                            <img src="<?= base_url('/') ?>images/supercoppa.png" width="20px" />
                                                        </figure>                                      
                                                </td>
                                                <td class="team-result__game-overview" style="width: 18%">
                                                    <?php
                                                    if ($risultati_supercoppa[0]['risultato1'] != "" && $risultati_supercoppa[0]['risultato2'] != "") {
                                                        ?>
                                                        <a href="<?= base_url('/') ?>index.php/home/dettaglisupercoppa/1" class="btn btn-xs btn-default btn-outline btn-block">Dettaglio giornata</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <!-- Generazione Calendario / END  --->

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Team Standings / End -->

            </div>
        </div>

        <!-- Content / End -->

