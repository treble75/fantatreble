

        <!-- Page Heading
        ================================================== -->

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Risultati <span class="highlight">Treble League</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>Giornata n° <?= $giornata ?></li>
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
                        <h4>Inserisci Risultati Treble League</h4>
                    </div>
                    <div class="card__content" style="overflow-x:auto;">
                        <div class="table-responsive" style="min-width:768px;">

                            <?php
                            if ($giornata > 35) { ?>
                                <div class="spacer"></div>
                                <div class = 'alert alert-warning alert-dismissible'>
                                    <strong>Non viene disputata nessuna partita di Treble League in questa giornata</strong>
                                </div>
                            <?php
                            }
                            if (is_array($risultati) && count($risultati) > 0 && $giornata < 36) {
                            
                                echo form_open_multipart('utente/inserisci_risultati');

                                foreach ($risultati as $row) {
                                    //Inizializzo variabili
                                    $totaleA = 0;
                                    $totaleB = 0;
                                    $z = 1;
                                    ?>

                                    <input type="hidden" value="Y" name="check_invio" />
                                    <div class="col-md-6 col-sm-6 col-xs-6">

                                        <!-- Widget: FORMAZIONE IN CASA -->
                                        <aside class="widget card card--has-table widget--sidebar widget-lineup-table">

                                            <div class="widget__content card__content">

                                                <!-- Lineup Table -->
                                                <div class="table-responsive">
                                                    <table class="table lineup-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="lineup__num" style="width: 40px; text-align: center;">&nbsp;</th>
                                                                <th class="lineup__name" style="width: 170px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></th>
                                                                <th class="lineup__pos" style="width: 50px; text-align: right;">&nbsp;</th>
                                                                <th class="lineup__pos" style="width: 50px; text-align: center;">&nbsp;</th>
                                                                <th class="lineup__info" style="width: 50px; color: #1892ED; font-size: 14px; text-align: right;">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            //Ciclo titolari in casa
                                                            for ($c = 0; $c < count($titolari); $c++) {
                                                                if ($row['id1'] == $titolari[$c]['id_utente']) {

                                                                    //Inizializzo variabili
                                                                    $chkMod = "";
                                                                    $chkid = "";

                                                                    //Calcolo numeri difensori per Modificatore difesa
                                                                    @$num_difensori = $this->mdl_team->getNumeroDifensori($row['id1']);

                                                                    //Calcolo media voto difensori per Modificatore difesa
                                                                    @$media_difensori = $this->mdl_team->getMediaDifensori($row['id1'], $giornata);

                                                                    $dettagli = $this->mdl_team->getGiocatore($titolari[$c]['id_giocatore']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>
                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($titolari[$c]['id_giocatore'], $giornata);
                                                                        $v = (($v == "" || count($v) == 0) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                                        $voto = (($voto == "" || count($voto) == 0) ? "" : $voto);
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type="hidden" value="<?= $titolari[$c]['id_giocatore']?>" name="<?= $titolari[$c]['id_utente'] . "T" . $z ?>" />
                                                                        <?php
                                                                        $chk = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                                        $chk = (($chk == "" || count($chk) == 0) ? "" : "checked='checked'");
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $z . $titolari[$c]['id_utente'] ?>" value="Y" name="<?= $titolari[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $totaleA = (round($totaleA, 2) + round($voto, 2));
                                                                    $z++;
                                                                    ?>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                            <tr>
                                                                <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                            </tr>

                                                            <!-- Panchinari in casa ---->

                                                            <?php
                                                            for ($c = 0; $c < count($panchinari); $c++) {

                                                                if ($row['id1'] == $panchinari[$c]['id_utente']) {

                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P1']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P1'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P1']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P1'] . "' name='" . $panchinari[$c]['id_utente'] . "P1' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P1'] . "' name='" . $panchinari[$c]['id_utente'] . "P1" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P1' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P1check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P2']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P2'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P2']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P2'] . "' name='" . $panchinari[$c]['id_utente'] . "P2' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P2'] . "' name='" . $panchinari[$c]['id_utente'] . "P2" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P2' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P2check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P3']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P3'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P3']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P3'] . "' name='" . $panchinari[$c]['id_utente'] . "P3' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P3'] . "' name='" . $panchinari[$c]['id_utente'] . "P3" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P3' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P3check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P4']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P4'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P4']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P4'] . "' name='" . $panchinari[$c]['id_utente'] . "P4' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P4'] . "' name='" . $panchinari[$c]['id_utente'] . "P4" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P4' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P4check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P5']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P5'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P5']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P5'] . "' name='" . $panchinari[$c]['id_utente'] . "P5' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P5'] . "' name='" . $panchinari[$c]['id_utente'] . "P5" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P5' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P5check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P6']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P6'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P6']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P6'] . "' name='" . $panchinari[$c]['id_utente'] . "P6' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P6'] . "' name='" . $panchinari[$c]['id_utente'] . "P6" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P6' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P6check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P7']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P7'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P7']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P7'] . "' name='" . $panchinari[$c]['id_utente'] . "P7' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P7'] . "' name='" . $panchinari[$c]['id_utente'] . "P7" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P7' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P7check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P8']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P8'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P8']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P8'] . "' name='" . $panchinari[$c]['id_utente'] . "P8' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P8'] . "' name='" . $panchinari[$c]['id_utente'] . "P8" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P8' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P8check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P9']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P9'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P9']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P9'] . "' name='" . $panchinari[$c]['id_utente'] . "P9' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P9'] . "' name='" . $panchinari[$c]['id_utente'] . "P9" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P9' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P9check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P10']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P10'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P10']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P10'] . "' name='" . $panchinari[$c]['id_utente'] . "P10' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P10'] . "' name='" . $panchinari[$c]['id_utente'] . "P10" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P10' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P10check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P11']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P11'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P11']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P11'] . "' name='" . $panchinari[$c]['id_utente'] . "P11' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P11'] . "' name='" . $panchinari[$c]['id_utente'] . "P11" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P11' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P11check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P12']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P12'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P12']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P12'] . "' name='" . $panchinari[$c]['id_utente'] . "P12' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P12'] . "' name='" . $panchinari[$c]['id_utente'] . "P12" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P12' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P12check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P13']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P13'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P13']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P13'] . "' name='" . $panchinari[$c]['id_utente'] . "P13' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P13'] . "' name='" . $panchinari[$c]['id_utente'] . "P13" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P13' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P13check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P14']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P14'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P14']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P14'] . "' name='" . $panchinari[$c]['id_utente'] . "P14' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P14'] . "' name='" . $panchinari[$c]['id_utente'] . "P14" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P14' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P14check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                            <!-- Modificatore Difesa squadra in casa -->

                                                            <?php
                                                            if (@$num_difensori < 4) {
                                                                $chkMod = "Non Attivo";
                                                                $chkid = "non_attivo";
                                                                $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                            } else {
                                                                $chkMod = "Attivo";
                                                                $chkid = "attivo";
                                                                $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                            }

                                                            $num_difesa = 4;

                                                            //Calcolo media voto
                                                            $media = (@$media_difensori / @$num_difesa);
                                                            $media = number_format(@$media, 3);
                                                            $bonus = $this->mdl_team->getBonusModificatore(@$media);
                                                            ?>

                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Difensori : <?= @$num_difensori ?></th>
                                                                <th class="lineup__subheader" style="text-align: center;">
                                                                <figure>
                                                                    <?= $abilitazione ?>
                                                                </figure>
                                                                </th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $media_difensori . " / " . $media . " -> + " . $bonus ?></th>
                                                            </tr>

                                                        <!-- Modificatore Difesa squadra in casa / END -->

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Criterio sostituzione</th>
                                                            <th class="lineup__subheader" style="text-align: center;">&nbsp;</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $this->mdl_team->getCriterioSquadra($row['id1'], $giornata, "campionato") ?></th>
                                                        </tr>
                                                        
                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Totale Parziale</th>
                                                            <th class="lineup__subheader" style="text-align: center;">&nbsp;</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $totaleA ?></th>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Lineup Table / End -->

                                            </div>
                                        </aside>
                                        <!-- Widget: FORMAZIONE IN CASA / End -->

                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-6">

                                        <!-- Widget: FORMAZIONE TRASFERTA -->
                                        <aside class="widget card card--alt-color card--has-table widget--sidebar widget-lineup-table">

                                            <div class="widget__content card__content">

                                                <!-- Lineup Table -->
                                                <div class="table-responsive">
                                                    <table class="table lineup-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="lineup__num" style="width: 40px; text-align: center;">&nbsp;</th>
                                                                <th class="lineup__name" style="width: 170px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></th>
                                                                <th class="lineup__pos" style="width: 50px; text-align: right;">&nbsp;</th>
                                                                <th class="lineup__pos" style="width: 50px; text-align: center;">&nbsp;</th>
                                                                <th class="lineup__info" style="width: 50px; color: #1892ED; font-size: 14px; text-align: right;">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $z = 1;
                                                            //Ciclo Titolari in Trasferta
                                                            for ($c = 0; $c < count($titolari); $c++) {
                                                                if ($row['id2'] == $titolari[$c]['id_utente']) {

                                                                    //Inizializzo variabili
                                                                    $chkMod = "";
                                                                    $chkid = "";

                                                                    //Calcolo numeri difensori per Modificatore difesa
                                                                    @$num_difensori = $this->mdl_team->getNumeroDifensori($row['id2']);

                                                                    //Calcolo media voto difensori per Modificatore difesa
                                                                    @$media_difensori = $this->mdl_team->getMediaDifensori($row['id2'], $giornata);

                                                                    $dettagli = $this->mdl_team->getGiocatore($titolari[$c]['id_giocatore']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>
                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($titolari[$c]['id_giocatore'], $giornata);
                                                                        $v = (($v == "" || count($v) == 0) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                                        $voto = (($voto == "" || count($voto) == 0) ? "" : $voto);
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type="hidden" value="<?= $titolari[$c]['id_giocatore']?>" name="<?= $titolari[$c]['id_utente'] . "T" . $z ?>" />
                                                                        <?php
                                                                        $chk = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                                        $chk = (($chk == "" || count($chk) == 0) ? "" : "checked='checked'");
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $z . $titolari[$c]['id_utente'] ?>" value="Y" name="<?= $titolari[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $totaleB = (round($totaleB, 2) + round($voto, 2));
                                                                    $z++;
                                                                }
                                                            }
                                                            ?>

                                                            <tr>
                                                                <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                            </tr>

                                                            <?php
                                                            for ($c = 0; $c < count($panchinari); $c++) {
                                                                //Panchinari in trasferta
                                                                if ($row['id2'] == $panchinari[$c]['id_utente']) {

                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P1']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P1'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P1']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P1'] . "' name='" . $panchinari[$c]['id_utente'] . "P1' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P1'] . "' name='" . $panchinari[$c]['id_utente'] . "P1" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P1' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P1check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P2']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P2'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P2']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P2'] . "' name='" . $panchinari[$c]['id_utente'] . "P2' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P2'] . "' name='" . $panchinari[$c]['id_utente'] . "P2" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P2' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P2check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P3']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P3'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P3']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P3'] . "' name='" . $panchinari[$c]['id_utente'] . "P3' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P3'] . "' name='" . $panchinari[$c]['id_utente'] . "P3" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P3' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P3check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P4']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P4'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P4']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P4'] . "' name='" . $panchinari[$c]['id_utente'] . "P4' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P4'] . "' name='" . $panchinari[$c]['id_utente'] . "P4" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P4' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P4check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P5']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P5'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P5']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P5'] . "' name='" . $panchinari[$c]['id_utente'] . "P5' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P5'] . "' name='" . $panchinari[$c]['id_utente'] . "P5" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P5' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P5check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P6']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P6'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P6']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P6'] . "' name='" . $panchinari[$c]['id_utente'] . "P6' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P6'] . "' name='" . $panchinari[$c]['id_utente'] . "P6" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P6' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P6check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P7']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P7'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P7']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P7'] . "' name='" . $panchinari[$c]['id_utente'] . "P7' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P7'] . "' name='" . $panchinari[$c]['id_utente'] . "P7" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P7' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P7check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P8']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P8'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P8']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P8'] . "' name='" . $panchinari[$c]['id_utente'] . "P8' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P8'] . "' name='" . $panchinari[$c]['id_utente'] . "P8" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P8' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P8check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P9']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P9'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P9']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P9'] . "' name='" . $panchinari[$c]['id_utente'] . "P9' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P9'] . "' name='" . $panchinari[$c]['id_utente'] . "P9" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P9' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P9check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P10']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P10'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P10']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P10'] . "' name='" . $panchinari[$c]['id_utente'] . "P10' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P10'] . "' name='" . $panchinari[$c]['id_utente'] . "P10" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P10' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P10check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P11']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P11'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P11']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P11'] . "' name='" . $panchinari[$c]['id_utente'] . "P11' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P11'] . "' name='" . $panchinari[$c]['id_utente'] . "P11" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P11' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P11check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P12']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P12'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P12']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P12'] . "' name='" . $panchinari[$c]['id_utente'] . "P12' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P12'] . "' name='" . $panchinari[$c]['id_utente'] . "P12" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P12' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P12check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P13']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P13'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P13']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P13'] . "' name='" . $panchinari[$c]['id_utente'] . "P13' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P13'] . "' name='" . $panchinari[$c]['id_utente'] . "P13" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P13' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P13check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                    $dettagli = $this->mdl_team->getGiocatore($panchinari[$c]['P14']);
                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);
                                                                    if ($role == "P") {
                                                                        $colRuolo = 'bgcolor="#fafafa"';
                                                                    }
                                                                    if ($role == "D") {
                                                                        $colRuolo = 'bgcolor="#f0fbff"';
                                                                    }
                                                                    if ($role == "C") {
                                                                        $colRuolo = 'bgcolor="#fff2f2"';
                                                                    }
                                                                    if ($role == "A") {
                                                                        $colRuolo = 'bgcolor="#eefaeb"';
                                                                    }
                                                                    ?>

                                                                    <tr <?= $colRuolo ?> >
                                                                        <td class="lineup__num" style="text-align: center;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                        <td class="lineup__name" style="font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVoto($panchinari[$c]['P14'], $giornata);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P14']);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        echo "<input type='hidden' value='" . $panchinari[$c]['P14'] . "' name='" . $panchinari[$c]['id_utente'] . "P14' />";
                                                                        ?>
                                                                        <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                        <input type='hidden' value='<?= $panchinari[$c]['P14'] . "' name='" . $panchinari[$c]['id_utente'] . "P14" ?>' />
                                                                        <td class="lineup__pos" style="text-align: center;">
                                                                            <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P14' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P14check' ?>"  />
                                                                        </td>
                                                                        <td class="lineup__info"style="color: #1892ED; font-size: 12px; text-align: center;"><?= $voto ?></td>
                                                                    </tr>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                            <!-- Modificatore Difesa squadra in trasferta -->

                                                                <?php
                                                                if (@$num_difensori < 4) {
                                                                    $chkMod = "Non Attivo";
                                                                    $chkid = "non_attivo";
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                                } else {
                                                                    $chkMod = "Attivo";
                                                                    $chkid = "attivo";
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                                }

                                                                $num_difesa = 4;

                                                                //Calcolo media voto
                                                                $media = (@$media_difensori / @$num_difesa);
                                                                $media = number_format(@$media, 3);
                                                                $bonus = $this->mdl_team->getBonusModificatore(@$media);
                                                                ?>

                                                                <tr style="vertical-align: middle;">
                                                                    <th colspan="2" class="lineup__subheader">Difensori : <?= @$num_difensori ?></th>
                                                                    <th class="lineup__subheader" style="text-align: center;">
                                                                    <figure>
                                                                        <?= $abilitazione ?>
                                                                    </figure>
                                                                    </th>
                                                                    <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $media_difensori . " / " . $media . " -> + " . $bonus ?></th>
                                                                </tr>

                                                            <!-- Modificatore Difesa squadra in trasferta / END --> 

                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Criterio sostituzione</th>
                                                                <th class="lineup__subheader" style="text-align: center;">&nbsp;</th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $this->mdl_team->getCriterioSquadra($row['id2'], $giornata, "campionato") ?></th>
                                                            </tr>
                                                            
                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Totale Parziale</th>
                                                                <th class="lineup__subheader" style="text-align: center;">&nbsp;</th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $totaleB ?></th>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Lineup Table / End -->

                                            </div>
                                        </aside>
                                        <!-- Widget: FORMAZIONE TRASFERTA / End -->

                                    </div>

                                    <?php
                                }
                            }
                            
                            if ($giornata < 36) { ?>
                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Risultati Treble League" name="but_risultati" class="btn btn-default btn-lg btn-block">
                                </div>
                            <?php
                            }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

            </div>
        </div>

        <!-- Content / End -->

