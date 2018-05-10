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

                <!-- Player Glossary -->
                <div class="card">
                    <div class="card__header">
                        <h4>Ricerca Trasferimenti</h4>
                    </div>
                    <div class="card__content">
                        <?php
                        echo form_open_multipart('utente/calciomercato');

                        if (validation_errors()) {
                            ?>
                            <div class = 'alert alert-danger alert-dismissible'>
                                <strong><?= validation_errors(); ?></strong>
                            </div>
                            <?php
                        }
                        if (@$message) {
                            ?>
                            <div class = 'alert alert-warning alert-dismissible'>
                                <strong><?= @$message ?></strong>
                            </div>
                            <?php
                        }
                        if (@$success_message) {
                            ?>
                            <div class = 'alert alert-success alert-dismissible'>
                                <strong><?= @$success_message ?></strong>
                            </div>
                            <?php
                        }
                        ?>  
                        <div class="row" align='center'>
                            
                            <div class="col-md-3">&nbsp;</div>
                            
                            <div class="col-md-6" align='left'>
                                <div class="form-group">
                                    <label>Seleziona la Squadra</label>
                                    <?php $js = 'id="account-city" class="form-control"';
                                    echo form_dropdown('cmbSquadra', $Squadre, set_value('cmbSquadra', $this->input->post('cmbSquadra')), $js) ?>
                                    <div class="spacer"></div>
                                    <label class="checkbox checkbox-inline">
                                        <input type="radio" name="chkAsta" id="radio" value=1 <?= $checked1?> >&nbsp; Inclusa Asta Iniziale
                                    </label><br>
                                    <label class="checkbox checkbox-inline">
                                        <input type="radio" name="chkAsta" id="radio2" value=0 <?= $checked2?> >&nbsp; Esclusa Asta Iniziale
                                    </label>
                                    <div class="spacer"></div>
                                    <input type="submit" value="Avvia Ricerca Trasferimenti" name="but_invia" class="btn btn-default btn-lg btn-block">
                                </div>
                            </div>
                            
                            <div class="col-md-3">&nbsp;</div>
                            
                        </div>
                    </div>
                </div>
                <!-- Player Glossary / End -->

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
                                        <th class="team-roster-table__age" style="width: 6%; text-align: center;">Cedente</th>
                                        <th class="team-roster-table__foot" style="width: 6%; text-align: center;">Acquirente</th>
                                        <th class="team-roster-table__height" style="width: 6%; text-align: center;">Valore</th>
                                        <th class="team-roster-table__fouls" style="width: 8%; text-align: center;">Trasferimento</th>
                                        <th class="team-roster-table__card-y" style="width: 4%; text-align: center;">Plusvalenza</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (count(@$trasferimenti) > 0) {
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

                                                <td class="team-roster-table__position" style="width: 4%; vertical-align: middle; text-align: center; color: <?= $color ?>;"><?= $role ?></td>
                                                <td class="team-roster-table__name" style="width: 16%; vertical-align: middle; color: #1892ED;"><?= $this->mdl_team->getNomeGiocatore($row['id_giocatore']) ?></td>
                                                <td class="team-roster-table__number" style="width: 6%; vertical-align: middle; text-align: center;"><?= $row['tipologia'] ?></td>
                                                <?php
                                                if ($row['id_squadra_partenza'] != "") {
                                                    $chkteam1 = $this->mdl_utenti->getSquadra($row['id_squadra_partenza']);
                                                } else {
                                                    $chkteam1 = "";
                                                }
                                                if ($row['id_squadra_arrivo'] != "") {
                                                    $chkteam2 = $this->mdl_utenti->getSquadra($row['id_squadra_arrivo']);
                                                } else {
                                                    $chkteam2 = "";
                                                }
                                                ?>
                                                <td class="team-roster-table__age" style="width: 6%; vertical-align: middle; text-align: center;"><?= $chkteam1 ?></td>
                                                <td class="team-roster-table__foot" style="width: 6%; vertical-align: middle; text-align: center;"><?= $chkteam2 ?></td>
                                                <td class="team-roster-table__weight team-leader__avg" style="width: 8%; vertical-align: middle; text-align: center;"><?= $row['costo'] ?></td>
                                                <?php
                                                $data = substr($row['data'], 11, 8) . " del " . substr($row['data'], 8, 2) . "-" . substr($row['data'], 5, 2) . "-" . substr($row['data'], 0, 4);
                                                ?>
                                                <td class="team-roster-table__fouls" style="width: 6%; vertical-align: middle; text-align: center;"><?= $data ?></td>
                                                <?php
                                                $plus = $this->mdl_utenti->getPlusvalenza($row['id']);
                                                $chk = "color:#055573";
                                                if ($plus < 0) {
                                                    $chk = "color:red";
                                                }
                                                if ($plus > 0) {
                                                    $chk = "color:green";
                                                    $plus = "+" . $plus;
                                                }
                                                if ($plus == 0) {
                                                    $chk = "color:green";
                                                    $plus = "-";
                                                }
                                                ?>
                                                <td class="team-roster-table__card-y" style="width: 4%; vertical-align: middle; text-align: center; <?= $chk ?>; "><?= $plus ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
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

            </div>
        </div>

        </form>

        <!-- Content / End -->

