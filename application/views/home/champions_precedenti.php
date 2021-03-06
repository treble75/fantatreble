
        <?php
        // DA MODIFICARE
        switch ($stagione) {
            case "2015_16":
                $vincitore = 5;
                $partecipanti = 8;
                break;
            case "2016_17":
                $vincitore = 5;
                $partecipanti = 10;
                break;
            case "2017_18":
                $vincitore = 7;
                $partecipanti = 10;
                break;
        }
        ?>

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-precedenti-champions">
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/marcatori_precedenti_champions/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/champions_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Classifica</a></li>
                    <li class="content-filter__item"><a href="<?= base_url('/') ?>home/risultati_champions_precedenti/<?= $stagione ?>" class="content-filter__link"><small>Champions League</small>Risultati</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


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
                        <h4>Classifica Girone A <?= str_replace("_", "/" , $stagione) ?></h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">
                                <thead>
                                    <tr>
                                        <th class="team-standings__pos">Pos</th>
                                        <th class="team-standings__team">Squadre</th>
                                        <th class="team-standings__played">Giocate</th>
                                        <th class="team-standings__win">Vittorie</th>
                                        <th class="team-standings__lose">Pareggi</th>
                                        <th class="team-standings__drawn">Sconfitte</th>
                                        <th class="team-standings__goals-for">Gol Fatti</th>
                                        <th class="team-standings__goals-against">Gol Subiti</th>
                                        <th class="team-standings__goals-diff">Diff. Gol</th>
                                        <th class="team-standings__total-points">Punti</th>
                                        <th class="team-standings__points-diff">Fanta Punti</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Genero Classifica -->
                                    <?php
                                    $i = 1;
                                    foreach ($classifica_championsA as $row) {
                                        
                                        if ($partecipanti == 8) {
                                            switch ($i) {
                                                case 1;
                                                    $color = '';
                                                    break;
                                                case 2;
                                                    $color = '';
                                                    break;
                                                case 3;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                                case 4;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                            }
                                        }
                                        
                                        if ($partecipanti == 10) {
                                            switch ($i) {
                                                case 1;
                                                    $color = '';
                                                    break;
                                                case 2;
                                                    $color = '';
                                                    break;
                                                case 3;
                                                    $color = '';
                                                    break;
                                                case 4;
                                                    $color = '';
                                                    break;
                                                case 5;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                            }
                                        }
                                        
                                        $chk = "";
                                        ?>  
                                        <tr <?= $color ?> >
                                            <td class="team-standings__pos" align='center'><?= $i ?></td>
                                            <td class="team-standings__team">
                                                <div class="team-meta">
                                                    <figure class="team-meta__logo">
                                                        <img src="<?= base_url('/') ?>images/albo/logo/<?= $this->mdl_utenti->getLogoStorico($row['id_squadra'], str_replace("_", "-" , $stagione)) ?>" width="30px">
                                                    </figure>
                                                    <div class="team-meta__info">
                                                        <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;"><?= $this->mdl_utenti->getSquadraPrecedente($row['id_squadra'], str_replace("_", "-" , $stagione)) ?>
                                                            <?php
                                                            //Inserire ID della squadra scudettata
                                                            if ($row['id_squadra'] == $vincitore) {
                                                                ?>
                                                                <img src="<?= base_url('/') ?>images/uefa.png"  width="12" height="15" />
                                                            <?php }
                                                            ?> 
                                                        </h6>
                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id_squadra'], str_replace("_", "-" , $stagione)) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="team-standings__played"><?= $row['partite_giocate'] ?></td>
                                            <td class="team-standings__win"><?= $row['vittorie'] ?></td>
                                            <td class="team-standings__lose"><?= $row['pareggi'] ?></td>
                                            <td class="team-standings__drawn"><?= $row['sconfitte'] ?></td>
                                            <td class="team-standings__goals-for"><?= $row['gol_fatti'] ?></td>
                                            <td class="team-standings__goals-against"><?= $row['gol_subiti'] ?></td>
                                            <td class="team-standings__goals-diff">
                                                <?php
                                                if ($row['DIFF'] > 0) {
                                                    echo "+";
                                                }
                                                echo $row['DIFF'];
                                                ?>
                                            </td>
                                            <td class="team-standings__total-points" style="color: #1892ED; font-size: 14px;"><?= $row['punti'] ?></td>
                                            <td class="team-standings__points-diff"><?= $row['fanta_punteggio'] ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="spacer"></div>
                        </div>
                    </div>

                </div>
                <!-- Team Standings / End -->

                <!-- Team Standings -->
                <div class="card card--has-table">
                    <div class="card__header">
                        <!-- Anno da modificare -->
                        <h4>Classifica Girone B <?= str_replace("_", "/" , $stagione) ?></h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">
                                <thead>
                                    <tr>
                                        <th class="team-standings__pos">Pos</th>
                                        <th class="team-standings__team">Squadre</th>
                                        <th class="team-standings__played">Giocate</th>
                                        <th class="team-standings__win">Vittorie</th>
                                        <th class="team-standings__lose">Pareggi</th>
                                        <th class="team-standings__drawn">Sconfitte</th>
                                        <th class="team-standings__goals-for">Gol Fatti</th>
                                        <th class="team-standings__goals-against">Gol Subiti</th>
                                        <th class="team-standings__goals-diff">Diff. Gol</th>
                                        <th class="team-standings__total-points">Punti</th>
                                        <th class="team-standings__points-diff">Fanta Punti</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Genero Classifica -->
                                    <?php
                                    $i = 1;
                                    foreach ($classifica_championsB as $row) {
                                        
                                        if ($partecipanti == 8) {
                                            switch ($i) {
                                                case 1;
                                                    $color = '';
                                                    break;
                                                case 2;
                                                    $color = '';
                                                    break;
                                                case 3;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                                case 4;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                            }
                                        }
                                        
                                        if ($partecipanti == 10) {
                                            switch ($i) {
                                                case 1;
                                                    $color = '';
                                                    break;
                                                case 2;
                                                    $color = '';
                                                    break;
                                                case 3;
                                                    $color = '';
                                                    break;
                                                case 4;
                                                    $color = '';
                                                    break;
                                                case 5;
                                                    $color = 'bgcolor="#ffebec"';
                                                    break;
                                            }
                                        }
                                        
                                        $chk = "";
                                        ?>  
                                        <tr <?= $color ?> >
                                            <td class="team-standings__pos" align='center'><?= $i ?></td>
                                            <td class="team-standings__team">
                                                <div class="team-meta">
                                                    <figure class="team-meta__logo">
                                                        <img src="<?= base_url('/') ?>images/albo/logo/<?= $this->mdl_utenti->getLogoStorico($row['id_squadra'], str_replace("_", "-" , $stagione)) ?>" width="30px">
                                                    </figure>
                                                    <div class="team-meta__info">
                                                        <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;"><?= $this->mdl_utenti->getSquadraPrecedente($row['id_squadra'], str_replace("_", "-" , $stagione)) ?>
                                                            <?php
                                                            //Inserire ID della squadra scudettata
                                                            if ($row['id_squadra'] == $vincitore) {
                                                                ?>
                                                                <img src="<?= base_url('/') ?>images/uefa.png"  width="12" height="15" />
                                                            <?php }
                                                            ?> 
                                                        </h6>
                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id_squadra'], str_replace("_", "-" , $stagione)) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="team-standings__played"><?= $row['partite_giocate'] ?></td>
                                            <td class="team-standings__win"><?= $row['vittorie'] ?></td>
                                            <td class="team-standings__lose"><?= $row['pareggi'] ?></td>
                                            <td class="team-standings__drawn"><?= $row['sconfitte'] ?></td>
                                            <td class="team-standings__goals-for" style="color:#009900;"><?= $row['gol_fatti'] ?></td>
                                            <td class="team-standings__goals-against" style="color:#ff3d3d;"><?= $row['gol_subiti'] ?></td>
                                            <td class="team-standings__goals-diff">
                                                <?php
                                                if ($row['DIFF'] > 0) {
                                                    echo "+";
                                                }
                                                echo $row['DIFF'];
                                                ?>
                                            </td>
                                            <td class="team-standings__total-points" style="color: #1892ED; font-size: 14px;"><?= $row['punti'] ?></td>
                                            <td class="team-standings__points-diff"><?= $row['fanta_punteggio'] ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="spacer"></div>
                        </div>
                    </div>

                </div>
                <!-- Team Standings / End -->

            </div>
        </div>

        <!-- Content / End -->

