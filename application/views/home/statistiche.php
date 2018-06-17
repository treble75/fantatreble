
        <script language="JavaScript" type="text/javascript">
            function Ordina(order)
            {
                document.forms[0].order.value = order;
                document.forms[0].submit();
            }
        </script>

        <?php
        switch ($ruolo) {
            case 1:
                $titolo = "Portieri";
                break;
            case 2:
                $titolo = "Difensori";
                break;
            case 3:
                $titolo = "Centrocampisti";
                break;
            case 4:
                $titolo = "Attaccanti";
                break;
        }

        switch (@$order) {
            case "voto":
                $h1 = " &#8595;";
                break;
            case "fantavoto":
                $h2 = " &#8595;";
                break;
            case "gol":
                $h3 = " &#8595;";
                break;
            case "assist":
                $h4 = " &#8595;";
                break;
            case "rigore_sbagliato":
                $h5 = " &#8595;";
                break;
            case "rigore_parato":
                $h6 = " &#8595;";
                break;
            case "autogol":
                $h7 = " &#8595;";
                break;
            case "gol_subiti":
                $h8 = " &#8595;";
                break;
            case "squadra":
                $h9 = " &#8595;";
                break;
            case "id_utente":
                $h10 = " &#8595;";
                break;
        }

        echo form_open('home/statistiche/' . $ruolo);
        ?>

        <!-- Page Heading
        ================================================== -->

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Statistiche <span class="highlight"><?= $titolo ?></span></h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <input name="order" type="hidden" value="cognome" />
                <!-- Team Roster: Table -->
                <div class="card card--has-table">
                    <div class="card__header">

                        <!-- Anno da modificare -->
                        <h4>Statistiche 2017/18 

                            <?php if (@$order != "") { ?>
                                &nbsp;&nbsp; <a href="<?= base_url('/') ?>index.php/home/statistiche/<?= $ruolo ?>"><img src="<?= base_url('/') ?>images/refresh.png" title="Aggiorna"></a>
                            <?php } ?>
                        </h4>
                        <span style="color:#ff3d3d; font-size: 12px;">* I giocatori segnalati in rosso non giocano più in serie A</span>

                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__name" style="width: 22%">Giocatore</th>
                                        <th class="team-roster-table__position" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Assegnazione"  onclick="javascript:Ordina('id_utente');">AC<?= @$h10 ?></a></th>
                                        <th class="team-roster-table__number" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Squadra"  onclick="javascript:Ordina('squadra');">SQ<?= @$h9 ?></a></th>
                                        <th class="team-roster-table__age" style="width: 6%; text-align: center;">PG</th>
                                        <th class="team-roster-table__foot" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Media Voto"  onclick="javascript:Ordina('voto');">MV<?= @$h1 ?></a></th>
                                        <th class="team-roster-table__height" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Media Fantavoto"  onclick="javascript:Ordina('fantavoto');">FV<?= @$h2 ?></a></th>
                                        <th class="team-roster-table__fouls" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Ammonizioni"  onclick="javascript:Ordina('ammonizioni');"><img src="<?= base_url('/') ?>images/ammo.png"></a></th>
                                        <th class="team-roster-table__card-y" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Espulsioni" onclick="javascript:Ordina('espulsioni');"><img src="<?= base_url('/') ?>images/espu.png"></a></th>
                                        <th class="team-roster-table__weight" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Gol Fatti"  onclick="javascript:Ordina('gol');">GO<?= @$h3 ?></a></th>
                                        <th class="team-roster-table__weight" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Assist" onclick="javascript:Ordina('assist');">AS<?= @$h4 ?></a></th>
                                        <th class="team-roster-table__assists" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Rigori Sbagliati" onclick="javascript:Ordina('rigore_sbagliato');">RS<?= @$h5 ?></a></th>
                                        <th class="team-roster-table__name" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Rigori Parati" onclick="javascript:Ordina('rigore_parato');">RP<?= @$h6 ?></a></th>
                                        <th class="team-roster-table__name" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Autogol" onclick="javascript:Ordina('autogol');">AU<?= @$h7 ?></a></th>
                                        <th class="team-roster-table__name" style="width: 6%; text-align: center;"><a href="#" title="Ordina per Gol Subiti" onclick="javascript:Ordina('gol_subiti');">SU<?= @$h8 ?></a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($player as $row) {
                                        $result = $this->mdl_team->getStatistiche($row['id_giocatore']);
                                        $PG = $this->mdl_team->getPartite_giocate($row['id_giocatore']);

                                        if ($PG != 0) {
                                            $voto = number_format(($result->totVoto), 2);
                                            $fantavoto = number_format(($result->totFantavoto), 2);
                                            $ammonizioni = $result->totAmmonizioni;
                                            $espulsioni = $result->totEspulsioni;
                                            $gol = $result->totGol;
                                            $assist = $result->totAssist;
                                            $rigSbagliato = $result->totRigoresbagliato;
                                            $rigParato = $result->totRigoreparato;
                                            $autogol = $result->totAutogol;
                                            $golSubiti = $result->totGolsubiti;
                                        } else {
                                            $voto = 0;
                                            $fantavoto = 0;
                                            $ammonizioni = 0;
                                            $espulsioni = 0;
                                            $gol = 0;
                                            $assist = 0;
                                            $rigSbagliato = 0;
                                            $rigParato = 0;
                                            $autogol = 0;
                                            $golSubiti = 0;
                                        }

                                        if ($row['inattivo'] == 1) {
                                            $inattivo = "color:#ff3d3d;";
                                        }
                                        if ($row['inattivo'] == 0) {
                                            $inattivo = "color:#1892ED;";
                                        }
                                        ?>

                                        <tr style="padding: 0px 0px;" >
                                            <td class="team-roster-table__name" style="width: 22%; vertical-align: middle; <?= $inattivo ?>"><?= $row['cognome'] . " " . $row['nome'] ?></td>
                                            <?php
                                            $ut = $row['id_utente'];
                                            $ut = ($ut == 0) ? $assegnato = "" : $assegnato = "<img src='" . base_url('/') . "images/assegnato.png' title='Assegnato' />"
                                            ?>
                                            <td class="team-roster-table__position" style="width: 6%; vertical-align: middle; text-align: center;"><?= $ut ?></td>
                                            <td class="team-roster-table__number" style="width: 6%; vertical-align: middle; text-align: center;"><?= substr($this->mdl_team->getSquadraA($row['squadra']), 0, 3) ?></td>
                                            <td class="team-roster-table__age" style="width: 6%; vertical-align: middle; text-align: center;"><?= $PG ?></td>
                                            <td class="team-roster-table__foot" style="width: 6%; vertical-align: middle; text-align: center;"><?= $voto ?></td>
                                            <td class="team-roster-table__weight team-leader__avg" style="width: 6%; vertical-align: middle; text-align: center;">
                                                <div class="circular">
                                                    <?php $percentuale = number_format(($fantavoto * 10), 2); ?>
                                                    <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                        <span class="circular__percents"><?= number_format($fantavoto, 2) ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="team-roster-table__fouls" style="width: 6%; vertical-align: middle; text-align: center; color:#e69500;"><?= $ammonizioni ?></td>
                                            <td class="team-roster-table__card-y" style="width: 6%; vertical-align: middle; text-align: center; color:#ff3d3d;"><?= $espulsioni ?></td>
                                            <td class="team-roster-table__weight" style="width: 6%; vertical-align: middle; text-align: center; color: #1892ED; font-size: 14px;"><?= $gol ?></td>
                                            <td class="team-roster-table__weight" style="width: 6%; vertical-align: middle; text-align: center; color:#009900;"><?= $assist ?></td>
                                            <td class="team-roster-table__assists" style="width: 6%; vertical-align: middle; text-align: center;"><?= $rigSbagliato ?></td>
                                            <td class="team-roster-table__name" style="width: 6%; vertical-align: middle; text-align: center;"><?= $rigParato ?></td>
                                            <td class="team-roster-table__name" style="width: 6%; vertical-align: middle; text-align: center;"><?= $autogol ?></td>
                                            <td class="team-roster-table__name" style="width: 6%; vertical-align: middle; text-align: center;"><?= $golSubiti ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

                <!-- Player Glossary -->
                <div class="card">
                    <div class="card__header">
                        <h4>Glossario</h4>
                    </div>
                    <div class="card__content">
                        <div class="glossary">
                            <div class="glossary__item"><span class="glossary__abbr">AC :</span> Acquistato o Svincolato al FantaTreble</div>
                            <div class="glossary__item"><span class="glossary__abbr">SQ :</span> Squadra di appartenenza in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">PG :</span> Partite Giocate in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">MV :</span> Media Voto in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">FV :</span> Media FantaVoto in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/ammo.png"> :</span> Numero di Ammonizioni in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr"><img src="<?= base_url('/') ?>images/espu.png"> :</span> Numero di Espulsioni in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">GO :</span> Gol Realizzati in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">AS :</span> Assist in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">RS :</span> Rigori Sbagliati in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">RP :</span> Rigori Parati  in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">AU :</span> Autogol  in Serie A</div>
                            <div class="glossary__item"><span class="glossary__abbr">GS :</span> Gol Subiti in Serie A</div>
                        </div>
                    </div>
                </div>
                <!-- Player Glossary / End -->

            </div>
        </div>

        </form>

        <!-- Content / End -->

