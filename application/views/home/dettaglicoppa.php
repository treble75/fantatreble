

        <!-- Page Heading
        ================================================== -->

        <?php
        $labelCoppa = "";

        if ($giornata == 4 || $giornata == 7) {

            $labelCoppa = "Preliminari";
        }

        if ($giornata == 10 || $giornata == 11) {

            $labelCoppa = "Quarti";
        }

        if ($giornata == 15 || $giornata == 20) {

            $labelCoppa = "Semifinali";
        }

        if ($giornata == 26 || $giornata == 31) {

            $labelCoppa = "Finale";
        }
        ?>

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Coppa <span class="highlight">Treble </span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li class="active"><?= $labelCoppa ?></li>
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
                        <h4>Dettaglio partite</h4>
                    </div>
                    <div class="card__content" style="overflow-x:auto;">
                        <div class="table-responsive" style="min-width:768px;">

                            <?php
                            foreach ($risultati_coppa as $row) {
                                ?>

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
                                                            <th class="lineup__name" style="width: 130px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></th>
                                                            <th class="lineup__pos" style="width: 55px; text-align: right;">&nbsp;</th>
                                                            <th class="lineup__pos" style="width: 80px; text-align: center;">&nbsp;</th>
                                                            <th class="lineup__info" style="width: 50px; color: #1892ED; font-size: 14px; text-align: right;"><?= $row['risultato1'] ?></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php
                                                        //Ciclo titolari in casa
                                                        for ($c = 0; $c < count($player); $c++) {

                                                            if ($row['id1'] == $player[$c]['id_utente']) {

                                                                //Calcolo numeri difensori per Modificatore difesa
                                                                @$num_difensori = $this->mdl_team->getNumeroDifensoriSchieratiCoppa($row['id1'], $giornata);

                                                                //Calcolo media voto difensori per Modificatore difesa
                                                                @$media_difensori = $this->mdl_team->getDettagliCampionatoTotaleModificatoreCoppa($row['id1'], $giornata, 1, "coppa");

                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T1']);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']);

                                                                if ($role == "P") {
                                                                    $colRuolo = 'bgcolor="#fafafa"';
                                                                    $color = "#000000";
                                                                }
                                                                if ($role == "D") {
                                                                    $colRuolo = 'bgcolor="#f0fbff"';
                                                                    $color = "#1486F4";
                                                                }
                                                                if ($role == "C") {
                                                                    $colRuolo = 'bgcolor="#fff2f2"';
                                                                    $color = "#F93469";
                                                                }
                                                                if ($role == "A") {
                                                                    $colRuolo = 'bgcolor="#eefaeb"';
                                                                    $color = "#199D5B";
                                                                }
                                                                ?>
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T1'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T1'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T1'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T2']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T2'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T2'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T2'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI  --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T3']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T3'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T3'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T3'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T4']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T4'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T4'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T4'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T5']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T5'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T5'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T5'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T6']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T6'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T6'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T6'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T7']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T7'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T7'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T7'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T8']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T8'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T8'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T8'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T9']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T9'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T9'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T9'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T10']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T10'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T10'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T10'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T11']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T11'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T11'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T11'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <tr>
                                                                    <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                                </tr>

                                                                <!-- Panchinari in casa ---->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P1']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P1'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P1'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P1'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P2']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P2'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P2'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P2'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P3']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P3'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P3'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P3'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P4']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P4'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P4'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P4'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P5']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P5'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P5'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P5'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P6']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P6'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P6'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P6'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P7']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P7'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P7'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P7'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P8']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P8'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P8'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P8'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P9']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P9'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P9'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P9'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P10']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P10'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P10'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P10'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P11']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P11'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P11'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P11'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P12']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P12'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P12'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P12'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P13']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P13'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P13'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P13'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P14']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P14'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P14'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P14'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                if ($num_difensori < 4) {
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                                } else {
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                                }

                                                                $media = (@$media_difensori / 4);
                                                                $media = number_format(@$media, 3);

                                                                //Ricavo i due punteggi parziali al netto del bonus modificatore
                                                                $parzialeA = ( $row['punteggio1'] - $row['bonus_modificatore1']);

                                                                // SEQUENZA RIGORISTI IN CASA

                                                                if ($row['rigoristi'] == 1) {

                                                                    //Recupero i rigoristi
                                                                    $rigoristi = $this->mdl_team->getRigoristiSchierati($row['id1'], $giornata);

                                                                    //Rigoristi in Casa
                                                                    ?>
                                                                    <tr style="vertical-align: middle; text-align: center;">
                                                                        <th colspan="5" class="lineup__subheader">Sequenza calci di rigore <?= $this->mdl_utenti->getSquadra($row['id1']) ?></th>
                                                                    </tr>

                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($rigoristi as $rig) {

                                                                        $s = "";
                                                                        $schierato = "";
                                                                        //Calcolo colore per ruolo
                                                                        $role = "";
                                                                        $role = $this->mdl_team->getNomeRuolo($rig['id_giocatore']);
                                                                        if ($role == "P") {
                                                                            $colRuolo = "backRuoloP";
                                                                        }
                                                                        if ($role == "D") {
                                                                            $colRuolo = "backRuoloD";
                                                                        }
                                                                        if ($role == "C") {
                                                                            $colRuolo = "backRuoloC";
                                                                        }
                                                                        if ($role == "A") {
                                                                            $colRuolo = "backRuoloA";
                                                                        }

                                                                        $dettagli = $this->mdl_team->getGiocatore($rig['id_giocatore']);
                                                                        ?>
                                                                        <tr <?= $colRuolo ?> height="35px" >
                                                                            <td class="lineup__num" style="vertical-align: middle;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                            <td class="lineup__name" style="vertical-align: middle;"><?= $this->mdl_team->getNomeGiocatore($rig['id_giocatore']) ?></td>
                                                                            <?php
                                                                            $v = $this->mdl_team->getVotoCoppa($rig['id_giocatore'], $giornata);
                                                                            $v = (is_Array($v) ? "" : $v);

                                                                            $s = $this->mdl_team->getSchieratoCampionato($rig['id_giocatore'], $giornata);
                                                                            $s = (($s == 1) ? true : false);
                                                                            if ($s == true) {
                                                                                $schierato = "<img src='" . base_url('/') . "images/schierato.png' title='Giocatore schierato' />";
                                                                            }
                                                                            if ($s == false || $s == "") {
                                                                                $schierato = "";
                                                                            }
                                                                            ?>
                                                                            <td class="lineup__pos" style="vertical-align: middle;"><?= $v ?></td>
                                                                            <td class="lineup__pos" style="vertical-align: middle;"><?= $schierato ?></td>
                                                                            <?php
                                                                            $icon = "";
                                                                            if ($v != "" && $i <= 5 && $schierato != "") {
                                                                                if ($v < 6)
                                                                                    $icon = "<img src='" . base_url('/') . "images/rig_sbagliato.png' title='Rigore sbagliato' />";
                                                                                if ($v >= 6)
                                                                                    $icon = "<img src='" . base_url('/') . "images/rig_segnato.png' title='Rigore segnato' />";
                                                                                $i++;
                                                                            }
                                                                            ?>
                                                                            <td class="lineup__info" style="color: #1892ED; font-size: 12px; vertical-align: middle; text-align: right;">
                                                                                <?= $icon ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    //Fine Rigoristi in Casa
                                                                }

                                                                //SEQUENZA RIGORISTI IN CASA / END 
                                                            }
                                                        }
                                                        ?>
                                                        <!-- Righe totali squadra in casa -->

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Modificatore Difesa</th>
                                                            <th class="lineup__subheader" style="text-align: center">
                                                    <figure>
                                                        <?= $abilitazione ?>
                                                    </figure>
                                                    </th>
                                                    <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $media_difensori . " / " . $media . " -> + " . $row['bonus_modificatore1'] ?></th>
                                                    </tr>

                                                    <tr style="vertical-align: middle;">
                                                        <th colspan="2" class="lineup__subheader">Punteggio ( +2 in casa )</th>
                                                        <th class="lineup__subheader" style="text-align: center"><?= $parzialeA ?> + <?= $row['bonus_modificatore1'] ?></th>
                                                        <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $row['punteggio1'] ?></th>
                                                    </tr>

                                                    <!-- Righe totali squadra in casa / END -->

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
                                                            <th class="lineup__name" style="width: 130px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></th>
                                                            <th class="lineup__pos" style="width: 55px; text-align: right;">&nbsp;</th>
                                                            <th class="lineup__pos" style="width: 80px; text-align: right;">&nbsp;</th>
                                                            <th class="lineup__info" style="width: 50px; text-align: right; color: #1892ED; font-size: 14px;"><?= $row['risultato2'] ?></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $z = 1;
                                                        //Ciclo Titolari in Trasferta
                                                        for ($c = 0; $c < count($player); $c++) {
                                                            if ($row['id2'] == $player[$c]['id_utente']) {

                                                                //Calcolo numeri difensori per Modificatore difesa
                                                                @$num_difensori = $this->mdl_team->getNumeroDifensoriSchieratiCoppa($row['id2'], $giornata);

                                                                //Calcolo media voto difensori per Modificatore difesa
                                                                @$media_difensori = $this->mdl_team->getDettagliCampionatoTotaleModificatoreCoppa($row['id2'], $giornata, 2, "coppa");

                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T1']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T1'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T1'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T1'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T2']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T2'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T2'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T2'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T3']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T3'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T3'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T3'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T4']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T4'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T4'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T4'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T5']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T5'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T5'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T5'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T6']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T6'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T6'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T6'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T7']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T7'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T7'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T7'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T8']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T8'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T8'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T8'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T9']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T9'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T9'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T9'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T10']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T10'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T10'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T10'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['T11']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['T11'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['T11'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['T11'], $giornata);
                                                                            if ($detail[0]['gol_subiti'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                            if ($detail[0]['gol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                            if ($detail[0]['autogol'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                            if ($detail[0]['ammonizioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                            if ($detail[0]['espulsioni'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                            if ($detail[0]['assist'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_parato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                            if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                        } else
                                                                            echo "<img src='" . base_url('/') . "images/sv.png' title='Sostituito' />&nbsp;";
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI -->

                                                                <tr>
                                                                    <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                                </tr>

                                                                <!-- Panchinari in casa ---->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P1']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P1'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P1'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P1'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P2']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P2'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P2'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P2'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P3']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P3'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P3'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P3'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P4']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P4'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P4'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P4'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P5']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P5'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P5'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P5'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P6']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P6'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P6'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P6'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P7']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P7'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P7'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P7'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P8']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P8'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P8'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P8'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P9']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P9'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P9'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P9'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P10']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P10'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P10'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P10'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P11']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P11'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P11'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P11'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P12']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P12'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P12'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P12'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P13']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P13'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P13'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P13'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatore($player[$c]['P14']);

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
                                                                <tr <?= $colRuolo ?> height="35px" >
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoCoppa($player[$c]['P14'], $giornata);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVCoppa($player[$c]['P14'], $giornata);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataCoppa($player[$c]['P14'], $giornata);
                                                                            if ($detail[0]['schierato'] == 1) {
                                                                                if ($detail[0]['schierato'] == 1)
                                                                                    echo "<img src='" . base_url('/') . "images/sost.png' title='Entrato in sostituzione' />&nbsp;";
                                                                                if ($detail[0]['gol_subiti'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/golsub.png' title='Gol subiti: " . $detail[0]['gol_subiti'] . "' />&nbsp;";
                                                                                if ($detail[0]['gol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/gol.png' title='Gol : " . $detail[0]['gol'] . "' />&nbsp;";
                                                                                if ($detail[0]['autogol'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/auto.png' title='Autogol : " . $detail[0]['autogol'] . "' />&nbsp;";
                                                                                if ($detail[0]['ammonizioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/ammo.png' title='Ammonito' />&nbsp;";
                                                                                if ($detail[0]['espulsioni'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/espu.png' title='Espulso' />&nbsp;";
                                                                                if ($detail[0]['assist'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/assist.png' title='Assist : " . $detail[0]['assist'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_parato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigpa.png' title='Rigore parato : " . $detail[0]['rigore_parato'] . "' />&nbsp;";
                                                                                if ($detail[0]['rigore_sbagliato'] != 0)
                                                                                    echo "<img src='" . base_url('/') . "images/rigsba.png' title='Rigore sbagliato : " . $detail[0]['rigore_sbagliato'] . "' />&nbsp;";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info" style="color: #1892ED; font-size: 12px; width: 30px; text-align: right;">
                                                                        <?= $voto ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- FINE RIGA GIOCATORI --->

                                                                <?php
                                                                if ($num_difensori < 4) {
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                                } else {
                                                                    $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                                }

                                                                $media = (@$media_difensori / 4);
                                                                $media = number_format(@$media, 3);

                                                                //Ricavo i due punteggi parziali al netto del bonus modificatore
                                                                $parzialeB = ( $row['punteggio2'] - $row['bonus_modificatore2']);

                                                                // SEQUENZA RIGORISTI IN CASA

                                                                if ($row['rigoristi'] == 1) {

                                                                    //Recupero i rigoristi
                                                                    $rigoristi = $this->mdl_team->getRigoristiSchierati($row['id2'], $giornata);

                                                                    //Rigoristi in Casa
                                                                    ?>
                                                                    <tr style="vertical-align: middle; text-align: center;">
                                                                        <th colspan="5" class="lineup__subheader">Sequenza calci di rigore <?= $this->mdl_utenti->getSquadra($row['id2']) ?></th>
                                                                    </tr>

                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($rigoristi as $rig) {

                                                                        $s = "";
                                                                        $schierato = "";
                                                                        //Calcolo colore per ruolo
                                                                        $role = "";
                                                                        $role = $this->mdl_team->getNomeRuolo($rig['id_giocatore']);
                                                                        if ($role == "P") {
                                                                            $colRuolo = "backRuoloP";
                                                                        }
                                                                        if ($role == "D") {
                                                                            $colRuolo = "backRuoloD";
                                                                        }
                                                                        if ($role == "C") {
                                                                            $colRuolo = "backRuoloC";
                                                                        }
                                                                        if ($role == "A") {
                                                                            $colRuolo = "backRuoloA";
                                                                        }

                                                                        $dettagli = $this->mdl_team->getGiocatore($rig['id_giocatore']);
                                                                        ?>
                                                                        <tr <?= $colRuolo ?> height="35px" >
                                                                            <td class="lineup__num" style="vertical-align: middle;"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                            <td class="lineup__name" style="vertical-align: middle;"><?= $this->mdl_team->getNomeGiocatore($rig['id_giocatore']) ?></td>
                                                                            <?php
                                                                            $v = $this->mdl_team->getVotoCoppa($rig['id_giocatore'], $giornata);
                                                                            $v = (is_Array($v) ? "" : $v);

                                                                            $s = $this->mdl_team->getSchieratoCampionato($rig['id_giocatore'], $giornata);
                                                                            $s = (($s == 1) ? true : false);
                                                                            if ($s == true) {
                                                                                $schierato = "<img src='" . base_url('/') . "images/schierato.png' title='Giocatore schierato' />";
                                                                            }
                                                                            if ($s == false || $s == "") {
                                                                                $schierato = "";
                                                                            }
                                                                            ?>
                                                                            <td class="lineup__pos" style="vertical-align: middle;"><?= $v ?></td>
                                                                            <td class="lineup__pos" style="vertical-align: middle;"><?= $schierato ?></td>
                                                                            <?php
                                                                            $icon = "";
                                                                            if ($v != "" && $i <= 5 && $schierato != "") {
                                                                                if ($v < 6)
                                                                                    $icon = "<img src='" . base_url('/') . "images/rig_sbagliato.png' title='Rigore sbagliato' />";
                                                                                if ($v >= 6)
                                                                                    $icon = "<img src='" . base_url('/') . "images/rig_segnato.png' title='Rigore segnato' />";
                                                                                $i++;
                                                                            }
                                                                            ?>
                                                                            <td class="lineup__info" style="color: #1892ED; font-size: 12px; vertical-align: middle; text-align: right;">
                                                                                <?= $icon ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    //Fine Rigoristi in Casa
                                                                }

                                                                //SEQUENZA RIGORISTI IN CASA / END
                                                            }
                                                        }
                                                        ?>
                                                        <!-- Righe totali squadra in casa -->

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Modificatore Difesa</th>
                                                            <th class="lineup__subheader" style="text-align: center"><?= $abilitazione ?></th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $media_difensori . " / " . $media . " -> + " . $row['bonus_modificatore2'] ?></th>
                                                        </tr>

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Punteggio</th>
                                                            <th class="lineup__subheader" style="text-align: center"><?= $parzialeB ?> + <?= $row['bonus_modificatore2'] ?></th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $row['punteggio2'] ?></th>
                                                        </tr>

                                                        <!-- Righe totali squadra in casa / END -->

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
                            ?>

                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

            </div>
        </div>

        <!-- Content / End -->

