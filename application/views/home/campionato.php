
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Treble</span> League</h1>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/statistiche_treble_league" class="content-filter__link"><small>Treble League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori" class="content-filter__link"><small>Treble League</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/campionato" class="content-filter__link"><small>Treble League</small>Classifica</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/calendario" class="content-filter__link"><small>Treble League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/classifica_perpetua" class="content-filter__link"><small>Treble League</small>Classifica Perpetua</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-gallery.html" class="content-filter__link"><small>Treble League</small>Gallery</a></li>
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
                        <h4>Classifica 2017/18</h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">
                                <thead>
                                    <tr>
                                        <th class="team-standings__pos">Pos</th>
                                        <th class="team-standings__team">Squadre</th>
                                        <th class="team-standings__pos">&nbsp;</th>
                                        <th class="team-standings__played">Giocate</th>
                                        <th class="team-standings__win">Vittorie</th>
                                        <th class="team-standings__lose">Pareggi</th>
                                        <th class="team-standings__drawn">Sconfitte</th>
                                        <th class="team-standings__goals-for">Gol Fatti</th>
                                        <th class="team-standings__goals-against">Gol Subiti</th>
                                        <th class="team-standings__goals-diff">Diff. Gol</th>
                                        <th class="team-standings__total-points">Punti</th>
                                        <th class="team-standings__points-diff">Fanta Punti</th>
                                        <th class="team-standings__points-diff">Forma Squadra</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Genero Classifica -->
                                    <?php
                                    $i = 1;
                                    foreach ($classifica as $row) {
                                        
                                        switch ($i) {
                                            case 1:
                                                $color = 'bgcolor="#f2fff0"';
                                                break;
                                            case 2;
                                            case 3;
                                            case 4;
                                            case 5;
                                            case 6;
                                            case 7;
                                                $color = "";
                                                break;
                                            case 8;
                                            case 9;
                                            case 10;
                                                $color = 'bgcolor="#ffebec"';
                                                break;
                                        }
                                        $chk = "";
                                        ?>  
                                        <tr <?= $color ?> >
                                            <td class="team-standings__pos" align='center'><?= $i ?></td>
                                            <td class="team-standings__team">
                                                <div class="team-meta">
                                                    <figure class="team-meta__logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_squadra'] ?>.png" width="30px">
                                                    </figure>
                                                    <div class="team-meta__info">
                                                        <h6 class="team-meta__name"><a href="<?= base_url('/') ?>index.php/utente/team/<?= $row['id_squadra'] ?>"><?= $this->mdl_utenti->getSquadra($row['id_squadra']) ?></a>
                                                            <?php
                                                            //Inserire ID della squadra scudettata
                                                            if ($row['id_squadra'] == 10) {
                                                                ?>
                                                                <img src="<?= base_url('/') ?>images/scudetto.png" width="12" height="15" />
                                                            <?php }
                                                            ?> 
                                                        </h6>
                                                        <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id_squadra']) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                            //Calcolo arrow di posizione
                                            $giornata = $row['partite_giocate'];
                                            $pos = $this->mdl_team->getArrow($row['id_squadra'], $giornata);
                                            if ($pos == 2) {
                                                $chk = '<img src="' . base_url('/') . 'images/down.png" width="17px" />';
                                            }
                                            if ($pos == 1) {
                                                $chk = '<img src="' . base_url('/') . 'images/up.png" width="16px" />';
                                            }
                                            if ($pos == "") {
                                                $chk = "";
                                            }
                                            // Se sono state giocate le 27 giornate di Regular Season, non faccio vedere il posizionamento
                                            if ($giornata < 27) {
                                                $chkVisible = $chk;
                                            } else {
                                                $chkVisible = "";
                                            }
                                            ?>

                                            <td class="team-standings__pos" align='center'>
                                                <figure class="team-meta__logo">
                                                    <?= $chkVisible ?>
                                                </figure>
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
                                            <td class="team-standings__points-diff">
                                                
                                                <?php
                                                $forma = $this->mdl_team->getFormaSquadra($row['id_squadra']);
                                                
                                                foreach ($forma as $team) {
                                                    if ($row['id_squadra'] == $team['id1']) {
                                                        if ($team['risultato1'] > $team['risultato2']){ ?>
                                                            <img src="<?= base_url('/') ?>images/v.png">
                                                        <?php
                                                        }
                                                        if ($team['risultato1'] == $team['risultato2']){ ?>
                                                            <img src="<?= base_url('/') ?>images/n.png">
                                                        <?php
                                                        }
                                                        if ($team['risultato1'] < $team['risultato2']){ ?>
                                                            <img src="<?= base_url('/') ?>images/p.png">
                                                        <?php
                                                        }
                                                    }
                                                    if ($row['id_squadra'] == $team['id2']) {
                                                        if ($team['risultato2'] > $team['risultato1']){ ?>
                                                            <img src="<?= base_url('/') ?>images/v.png">
                                                        <?php
                                                        }
                                                        if ($team['risultato2'] == $team['risultato1']){ ?>
                                                            <img src="<?= base_url('/') ?>images/n.png">
                                                        <?php
                                                        }
                                                        if ($team['risultato2'] < $team['risultato1']){ ?>
                                                            <img src="<?= base_url('/') ?>images/p.png">
                                                        <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
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

