
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Classifica <span class="highlight">Perpetua</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>Treble League</li>
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
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/classifica_perpetua" class="content-filter__link"><small>Treble League</small>Classifica Perpetua</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/statistiche_treble_league" class="content-filter__link"><small>Treble League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori" class="content-filter__link"><small>Treble League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/campionato" class="content-filter__link"><small>Treble League</small>Classifica</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/calendario" class="content-filter__link"><small>Treble League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/stagioni_precedenti" class="content-filter__link"><small>Treble League</small>Stagioni Precedenti</a></li>
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
                        <h4>Classifica Perpetua Treble League</h4>
                        <span style="font-size: 12px;">* Risultati relativi alla regular season aggiornati alla Stagione 2017/18</span>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">
                                <thead>
                                    <tr>
                                        <th class="team-standings__pos">Pos</th>
                                        <th class="team-standings__team">Squadre</th>
                                        <th class="team-standings__win">Sta</th>
                                        <th class="team-standings__played">Gio</th>
                                        <th class="team-standings__win">V</th>
                                        <th class="team-standings__lose">N</th>
                                        <th class="team-standings__drawn">P</th>
                                        <th class="team-standings__goals-for">GF</th>
                                        <th class="team-standings__goals-against">GS</th>
                                        <th class="team-standings__goals-diff">Diff</th>
                                        <th class="team-standings__total-points">Punti</th>
                                        <th class="team-standings__total-points">MPP</th>
                                        <th class="team-standings__win">MPS</th>
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
                                                //$color = 'bgcolor="#ffebec"';
                                                break;
                                        }
                                        $chk = "";
                                        ?>  
                                        <tr <?= $color ?> >
                                            <td class="team-standings__pos" align='center'><?= $i ?></td>
                                            <td class="team-standings__team">
                                                <div class="team-meta">
                                                    <figure class="team-meta__logo">
                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getImmagine($row['squadra'], 'squadra') ?>" width="30px">
                                                    </figure>
                                                    <div class="team-meta__info">
                                                        <h6 class="team-meta__name"><?= $row['squadra'] ?>
                                                            <?php
                                                            //Inserire scudetto per gli utenti scudettati
                                                            if ($row['scudettato'] == 1) {
                                                                ?>
                                                                <img src="<?= base_url('/') ?>images/scudetto.png" width="12" height="15" />
                                                            <?php }
                                                            ?> 
                                                        </h6>
                                                        <span class="team-meta__place"><?= $row['nome_utente'] . " " . $row['cognome_utente'] ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                            //Calcolo numero partecipazioni al FantaTreble
                                            $partecipazioni = $this->mdl_utenti->getPartecipazioni($row['nome_utente'],$row['cognome_utente']);
                                            ?>
                                            <td class="team-standings__win" align='center'><?= $partecipazioni ?></td>
                                            <td class="team-standings__played" style="color: #000"><?= $row['partite_storico'] ?></td>
                                            <td class="team-standings__win"><?= $row['v_storico'] ?></td>
                                            <td class="team-standings__lose"><?= $row['n_storico'] ?></td>
                                            <td class="team-standings__drawn"><?= $row['p_storico'] ?></td>
                                            <td class="team-standings__goals-for" style="color:#009900;"><?= $row['totale_golfatti'] ?></td>
                                            <td class="team-standings__goals-against" style="color:#ff3d3d;"><?= $row['totale_golsubiti'] ?></td>
                                            <?php
                                                $DIFF = ($row['totale_golfatti'] - $row['totale_golsubiti']);
                                                if ($DIFF > 0) {
                                                    $colorefont = 'style="color:#009900;"';
                                                }else{
                                                    $colorefont = 'style="color:#ff3d3d;"';
                                                }
                                                ?>
                                            <td class="team-standings__goals-diff" <?= $colorefont ?>>
                                                <?php
                                                if ($DIFF > 0) {
                                                    echo "+";
                                                }
                                                echo $DIFF;
                                                ?>
                                            </td>
                                            <td class="team-standings__total-points" style="color: #1892ED; font-size: 14px;"><?= $row['totale_punti'] ?></td>
                                            <?php
                                            //Calcolo media punti per partita
                                            $mpp = ($row['totale_punti'] / $row['partite_storico']);
                                            ?>
                                            <td class="team-standings__total-points"><?= number_format($mpp, 2) ?></td>
                                            <?php
                                            //Calcolo media punti per stagione
                                            $mps = ($row['totale_punti'] / $partecipazioni);
                                            ?>
                                            <td class="team-standings__win"><?= number_format($mps, 2) ?></td>
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
                
                <!-- Player Glossary -->
                <div class="card">
                    <div class="card__header">
                        <h4>Glossario</h4>
                        <span style="font-size: 12px;">* La Classifica non tiene conto delle squadre che avevano nome diverso, ma lo stesso proprietario, nelle precedenti stagioni. I risultati sportivi sono stati attribuiti alla squadra attualmente presente in Treble League.</span>
                    </div>
                    <div class="card__content">
                        <div class="glossary">
                            <div class="glossary__item"><span class="glossary__abbr">STA :</span> Stagioni disputate</div>
                            <div class="glossary__item"><span class="glossary__abbr">GIO :</span> Partite Giocate</div>
                            <div class="glossary__item"><span class="glossary__abbr">V :</span> Vittorie Totali</div>
                            <div class="glossary__item"><span class="glossary__abbr">N :</span> Pareggi Totali</div>
                            <div class="glossary__item"><span class="glossary__abbr">P :</span> Sconfitte Totali</div>
                            <div class="glossary__item"><span class="glossary__abbr">GF :</span> Gol Realizzati</div>
                            <div class="glossary__item"><span class="glossary__abbr">GS :</span> Gol Subiti</div>
                            <div class="glossary__item"><span class="glossary__abbr">DIFF :</span> Differenza Reti</div>
                            <div class="glossary__item"><span class="glossary__abbr">PUNTI :</span> Punti Totali In Treble League</div>
                            <div class="glossary__item"><span class="glossary__abbr">MPP :</span> Media Punti Per Partita</div>
                            <div class="glossary__item"><span class="glossary__abbr">MPS :</span> Media Punti Per Stagione</div>
                        </div>
                    </div>
                </div>
                <!-- Player Glossary / End -->

            </div>
        </div>

        <!-- Content / End -->

