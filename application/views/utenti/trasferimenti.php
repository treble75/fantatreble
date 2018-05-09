        <script language="JavaScript" type="text/javascript">
            function refresh()
            {
                document.forms[0].submit();
            }
        </script>

        <?php
        echo form_open('utente/trasferimenti');
        ?>

        <!-- Page Heading
        ================================================== -->

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Trasferimenti</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <!-- Anno da modificare -->
                            <li>Stagione 2018/19</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <!-- Team Roster: Table -->
                <div class="card card--has-table">
                    <div class="card__header">

                        <!-- Anno da modificare -->
                        <h4>Trasferimenti 2018/19</h4>

                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__position" style="width: 4%; text-align: center;">Ruolo</th>
                                        <th class="team-roster-table__name" style="width: 16%">Giocatore</th>
                                        <th class="team-roster-table__number" style="width: 6%; text-align: center;">Tipologia</th>
                                        <th class="team-roster-table__age" style="width: 6%; text-align: center;">Squadra Cedente</th>
                                        <th class="team-roster-table__foot" style="width: 6%; text-align: center;">Squadra Acquirente</th>
                                        <th class="team-roster-table__height" style="width: 6%; text-align: center;">Valore</th>
                                        <th class="team-roster-table__fouls" style="width: 8%; text-align: center;">Data Trasferimento</th>
                                        <th class="team-roster-table__card-y" style="width: 4%; text-align: center;">Plusvalenza</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (count(@$trasferimenti) > 0){
                                        foreach ($trasferimenti as $row) {
                                            
                                            $role = "";
                                            $role = $this->mdl_team->getNomeRuolo($row['id_giocatore']);
                                            if ($role == "P") {
                                                $color = "#000000";
                                                $bgcolor = 'bgcolor="#fafafa"';
                                            }
                                            if ($role == "D") {
                                                $color = "#1486F4";
                                                $bgcolor = 'bgcolor="#f0fbff"';
                                            }
                                            if ($role == "C") {
                                                $color = "#F93469";
                                                $bgcolor = 'bgcolor="#fff2f2"';
                                            }
                                            if ($role == "A") {
                                                $color = "#199D5B";
                                                $bgcolor = 'bgcolor="#eefaeb"';
                                            }
                                            ?>
                                            <tr style="padding: 0px 0px;" <?= $bgcolor ?> >
                                                
                                                <td class="team-roster-table__position" style="width: 4%; vertical-align: middle; text-align: center; color: <?= $color ?>;"><?=$role?></td>
                                                <td class="team-roster-table__name" style="width: 16%; vertical-align: middle;"><?= $this->mdl_team->getNomeGiocatore($row['id_giocatore']) ?></td>
                                                <td class="team-roster-table__number" style="width: 6%; vertical-align: middle; text-align: center;"><?= $row['tipologia'] ?></td>
                                                <?php
                                                if ($row['id_squadra_partenza'] != ""){
                                                    $chkteam1 = $this->mdl_utenti->getSquadra($row['id_squadra_partenza']);
                                                }else{
                                                    $chkteam1 = "";
                                                }
                                                if ($row['id_squadra_arrivo'] != ""){
                                                    $chkteam2 = $this->mdl_utenti->getSquadra($row['id_squadra_arrivo']);
                                                }else{
                                                    $chkteam2 = "";
                                                }
                                                ?>
                                                <td class="team-roster-table__age" style="width: 6%; vertical-align: middle; text-align: center;"><?= $chkteam1 ?></td>
                                                <td class="team-roster-table__foot" style="width: 6%; vertical-align: middle; text-align: center;"><?= $chkteam2 ?></td>
                                                <td class="team-roster-table__weight team-leader__avg" style="width: 8%; vertical-align: middle; text-align: center;"><?= $row['costo'] ?></td>
                                                <?php
                                                $data = substr($row['data'],11,8) . " del " . substr($row['data'],8,2) . "-" . substr($row['data'],5,2) . "-" . substr($row['data'],0,4);
                                                ?>
                                                <td class="team-roster-table__fouls" style="width: 6%; vertical-align: middle; text-align: center; color:#e69500;"><?= $data ?></td>
                                                <?php
                                                $plus = $this->mdl_utenti->getPlusvalenza($row['id']);
                                                $chk = "color:#055573";
                                                if ($plus < 0){
                                                    $chk = "color:red";
                                                }
                                                if ($plus > 0){
                                                    $chk = "color:green";
                                                    $plus = "+" . $plus;
                                                }
                                                if ($plus == 0){
                                                    $chk = "color:green";
                                                    $plus = "-";
                                                }
                                                ?>
                                                <td class="team-roster-table__card-y" style="width: 4%; vertical-align: middle; text-align: center; <?= $chk ?>; "><?= $plus ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{ ?>
                                        <div class = 'alert alert-warning alert-dismissible'>
                                            <strong>Non ci sono trasferimenti da visualizzare</strong>
                                        </div>
                                    <?php
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

