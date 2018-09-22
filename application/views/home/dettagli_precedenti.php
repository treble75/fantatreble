        
        <?php
        switch ($stagione) {
            case "2011_12":
                $cena1 = 2;
                $cena2 = 4;
                $cena3 = 8;
                $scudettato = 7;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 30;
                $finale1 = 31;
                $finale2 = 32;
                $ultima_fittizia = 33;
                break;
            case "2012_13":
                $cena1 = 2;
                $cena2 = 6;
                $cena3 = 7;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 30;
                $finale1 = 31;
                $finale2 = 32;
                $ultima_fittizia = 33;
                break;
            case "2013_14":
                $cena1 = 2;
                $cena2 = 5;
                $cena3 = 8;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2014_15":
                $cena1 = 3;
                $cena2 = 4;
                $cena3 = 8;
                $scudettato = 1;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2015_16":
                $cena1 = 2;
                $cena2 = 4;
                $cena3 = 7;
                $scudettato = 3;
                $partecipanti = 8;
                $ultima_campionato = 28;
                $prima_playoff = 29;
                $ultima_playoff = 32;
                $finale1 = 33;
                $finale2 = 34;
                $ultima_fittizia = 35;
                break;
            case "2016_17":
                $cena1 = 6;
                $cena2 = 7;
                $cena3 = 10;
                $scudettato = 5;
                $partecipanti = 10;
                $ultima_campionato = 27;
                $prima_playoff = 28;
                $ultima_playoff = 33;
                $finale1 = 34;
                $finale2 = 35;
                $ultima_fittizia = 36;
                break;
            case "2017_18":
                $cena1 = 1;
                $cena2 = 6;
                $cena3 = 8;
                $scudettato = 7;
                $partecipanti = 10;
                $ultima_campionato = 27;
                $prima_playoff = 28;
                $ultima_playoff = 33;
                $finale1 = 34;
                $finale2 = 35;
                $ultima_fittizia = 36;
                break;
        }
        ?>

        <!-- Page Heading
        ================================================== -->

        <?php
        if ($giornata <= $ultima_campionato) {

            $label = "Giornata " . $giornata;
        }

        if ($giornata >= $prima_playoff && $giornata <= $ultima_playoff) {

            $label = "Playoff";
        }

        if ($giornata >= $finale1 && $giornata <= $finale2) {

            $label = "Finalissima";
        }
        ?>

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Treble </span> League</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                          <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                          <li><a href="<?= base_url('/') ?>home/stagioni_precedenti">Stagioni Precedenti</a></li>
                          <li class="active"><a href="<?= base_url('/') ?>home/campionati_precedenti/<?=$stagione?>">Stagione <?= str_replace("_", "/" , $stagione) ?></a> - <?= $label ?></li>
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
                            foreach ($risultati as $row) {
                                ?>

                                <div class="col-md-6 col-sm-6 col-xs-6">

                                    <!-- Widget: FORMAZIONE IN CASA -->
                                    <aside class="widget card card--has-table widget--sidebar widget-lineup-table">

                                        <div class="widget__content card__content">

                                            <!-- Lineup Table -->
                                            <div class="table-responsive">
                                                <table class="table lineup-table">

                                                    <thead>
                                                        <tr style="background-color: #f2d376">
                                                            <th class="lineup__num" style="width: 40px; text-align: center;">&nbsp;</th>
                                                            <th class="lineup__name" style="width: 130px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], str_replace("_", "-" , $stagione)) ?></th>
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

                                                                if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") {
                                                                    //Calcolo numeri difensori per Modificatore difesa
                                                                    @$num_difensori = $this->mdl_team->getNumeroDifensoriSchieratiPrecedenti($row['id1'], $giornata, $stagione);

                                                                    //Calcolo media voto difensori per Modificatore difesa
                                                                    @$media_difensori = $this->mdl_team->getDettagliCampionatoTotaleModificatorePrecedenti($row['id1'], $giornata, 1, $stagione);
                                                                }

                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T1'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);

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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T1'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T1'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T1'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T2'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T2'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T2'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T2'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T3'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T3'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T3'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T3'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T4'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T4'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T4'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T4'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T5'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T5'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T5'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T5'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T6'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T6'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T6'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T6'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T7'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T7'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T7'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T7'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T8'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T8'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T8'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T8'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T9'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T9'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T9'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T9'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T10'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T10'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T10'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T10'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T11'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T11'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T11'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T11'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P1'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P1'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P1'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P1'], $giornata, $stagione);
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
                                                                if (isset($player[$c]['P2'])) {
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P2'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P2'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P2'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P2'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P3'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P3'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P3'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P3'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P4'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P4'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P4'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P4'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P5'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P5'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P5'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P5'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P6'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P6'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P6'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P6'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P7'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P7'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P7'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P7'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P8'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P8'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P8'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P8'], $giornata, $stagione);
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
                                                                if (isset($player[$c]['P9'])) {
                                                                 
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P9'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P9'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P9'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P9'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P10'])) {
                                                                   
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P10'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P10'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P10'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P10'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P11'])) {
                                                                  
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P11'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P11'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P11'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P11'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P12'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P12'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P12'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P12'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P12'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P13'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P13'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P13'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P13'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P13'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P14'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P14'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P14'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P14'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P14'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") {
                                                                    if ($num_difensori < 4) {
                                                                        $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                                    } else {
                                                                        $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                                    }

                                                                    $media = (@$media_difensori / 4);
                                                                    $media = number_format(@$media, 3);
                                                                }

                                                                //Ricavo i due punteggi parziali al netto del bonus modificatore
                                                                $parzialeA = ( $row['punteggio1'] - @$row['bonus_modificatore1']);

                                                                // SEQUENZA RIGORISTI IN CASA

                                                                if (@$row['rigoristi'] == 1) {

                                                                    //Recupero i rigoristi
                                                                    $rigoristi = $this->mdl_team->getRigoristiSchieratiPrecedenti($row['id1'], $giornata, $stagione);

                                                                    //Rigoristi in Casa
                                                                    ?>
                                                                    <tr style="vertical-align: middle; text-align: center;">
                                                                        <th colspan="5" class="lineup__subheader">Sequenza calci di rigore <?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], str_replace("_", "-" , $stagione)) ?></th>
                                                                    </tr>

                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($rigoristi as $rig) {

                                                                        $s = "";
                                                                        $schierato = "";
                                                                        //Calcolo colore per ruolo
                                                                        $role = "";
                                                                        $role = $this->mdl_team->getNomeRuoloPrecedente($rig['id_giocatore']);
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

                                                                        $dettagli = $this->mdl_team->getGiocatorePrecedenti($rig['id_giocatore'], $stagione);
                                                                        ?>
                                                                        <tr <?= $colRuolo ?> height="35px" >
                                                                            <td class="lineup__num" style="vertical-align: middle;"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                            <td class="lineup__name" style="vertical-align: middle;"><?= $this->mdl_team->getNomeGiocatorePrecedente($rig['id_giocatore'], $stagione) ?></td>
                                                                            <?php
                                                                            $v = $this->mdl_team->getVotoPrecedente($rig['id_giocatore'], $giornata, $stagione);
                                                                            $v = (is_Array($v) ? "" : $v);

                                                                            $s = $this->mdl_team->getSchieratoCampionatoPrecedente($rig['id_giocatore'], $giornata, $stagione);
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

                                                        <?php
                                                        if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") { ?>
                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Modificatore Difesa</th>
                                                                <th class="lineup__subheader" style="text-align: center">
                                                                <figure>
                                                                    <?= $abilitazione ?>
                                                                </figure>
                                                                </th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center">
                                                                    <?= $media_difensori . " / " . $media . " -> + " . @$row['bonus_modificatore1'] ?>
                                                                </th>
                                                            </tr>
                                                        <?php
                                                            $parzialeA = $parzialeA . " + ";
                                                        }
                                                        
                                                        if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17" && $stagione != "2017_18") { ?>
                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Criterio di Sostituzione</th>
                                                                <th class="lineup__subheader" style="text-align: center">&nbsp;</th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $this->mdl_team->getCriterioSquadraPrecedente($row['id1'], $giornata, "campionato", $stagione)?></th>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Punteggio</th>
                                                            <th class="lineup__subheader" style="text-align: center"><?= $parzialeA ?><?= @$row['bonus_modificatore1'] ?></th>
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
                                                        <tr style="background-color: #f2d376">
                                                            <th class="lineup__num" style="width: 40px; text-align: center;">&nbsp;</th>
                                                            <th class="lineup__name" style="width: 130px; text-align: center; color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], str_replace("_", "-" , $stagione)) ?></th>
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

                                                                if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") {
                                                                    //Calcolo numeri difensori per Modificatore difesa
                                                                    @$num_difensori = $this->mdl_team->getNumeroDifensoriSchieratiPrecedenti($row['id2'], $giornata, $stagione);

                                                                    //Calcolo media voto difensori per Modificatore difesa
                                                                    @$media_difensori = $this->mdl_team->getDettagliCampionatoTotaleModificatorePrecedenti($row['id2'], $giornata, 2, $stagione);
                                                                }

                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T1'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T1'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T1'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T1'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T2'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T2'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T2'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T2'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T3'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T3'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T3'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T3'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T4'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T4'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T4'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T4'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T5'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T5'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T5'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T5'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T6'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T6'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T6'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T6'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T7'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T7'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T7'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T7'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T8'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T8'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T8'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T8'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T9'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T9'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T9'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T9'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T10'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T10'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T10'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T10'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['T11'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['T11'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['T11'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['T11'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P1'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P1'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P1'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P1'], $giornata, $stagione);
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
                                                                if (isset($player[$c]['P2'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P2'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P2'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P2'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P2'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                //INIZIO RIGA GIOCATORI
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P3'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P3'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P3'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P3'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P4'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P4'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P4'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P4'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P5'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P5'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P5'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P5'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P6'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P6'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P6'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P6'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P7'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P7'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P7'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P7'], $giornata, $stagione);
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
                                                                $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P8'], $stagione);

                                                                $role = "";
                                                                $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $v = $this->mdl_team->getVotoPrecedente($player[$c]['P8'], $giornata, $stagione);
                                                                    $v = (is_Array($v) ? "S.V." : $v);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $v ?></td>
                                                                    <td class="lineup__pos">
                                                                        <?php
                                                                        $voto = $this->mdl_team->getFVPrecedente($player[$c]['P8'], $giornata, $stagione);
                                                                        $voto = (is_Array($voto) ? "" : $voto);
                                                                        if ($voto != "") {
                                                                            $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P8'], $giornata, $stagione);
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
                                                                if (isset($player[$c]['P9'])) {
                                                                   
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P9'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P9'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P9'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P9'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P10'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P10'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P10'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P10'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P10'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P11'])) {
                                                                
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P11'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P11'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P11'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P11'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P12'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P12'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P12'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P12'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P12'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P13'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P13'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P13'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P13'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P13'], $giornata, $stagione);
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
                                                                }
                                                                
                                                                if (isset($player[$c]['P14'])) {
                                                                    
                                                                    //INIZIO RIGA GIOCATORI
                                                                    $dettagli = $this->mdl_team->getGiocatorePrecedenti($player[$c]['P14'], $stagione);

                                                                    $role = "";
                                                                    $role = $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione);
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
                                                                        <td class="lineup__num"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                        <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                        <?php
                                                                        $v = $this->mdl_team->getVotoPrecedente($player[$c]['P14'], $giornata, $stagione);
                                                                        $v = (is_Array($v) ? "S.V." : $v);
                                                                        ?>
                                                                        <td class="lineup__pos"><?= $v ?></td>
                                                                        <td class="lineup__pos">
                                                                            <?php
                                                                            $voto = $this->mdl_team->getFVPrecedente($player[$c]['P14'], $giornata, $stagione);
                                                                            $voto = (is_Array($voto) ? "" : $voto);
                                                                            if ($voto != "") {
                                                                                $detail = $this->mdl_team->getVotiGiornataPrecedente($player[$c]['P14'], $giornata, $stagione);
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
                                                                } 
                                                                
                                                                if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") { 
                                                                
                                                                    if ($num_difensori < 4) {
                                                                        $abilitazione = "<img src='" . base_url('/') . "images/nonattivo.png' title='Modificatore non attivo' />";
                                                                    } else {
                                                                        $abilitazione = "<img src='" . base_url('/') . "images/attivo.png' title='Modificatore attivo' />";
                                                                    }

                                                                    $media = (@$media_difensori / 4);
                                                                    $media = number_format(@$media, 3);
                                                                    
                                                                } 

                                                                //Ricavo i due punteggi parziali al netto del bonus modificatore
                                                                $parzialeB = ( $row['punteggio2'] - @$row['bonus_modificatore2']);

                                                                // SEQUENZA RIGORISTI IN CASA

                                                                if (@$row['rigoristi'] == 1) {

                                                                    //Recupero i rigoristi
                                                                    $rigoristi = $this->mdl_team->getRigoristiSchieratiPrecedenti($row['id2'], $giornata, $stagione);

                                                                    //Rigoristi in Casa
                                                                    ?>
                                                                    <tr style="vertical-align: middle; text-align: center;">
                                                                        <th colspan="5" class="lineup__subheader">Sequenza calci di rigore <?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], str_replace("_", "-" , $stagione)) ?></th>
                                                                    </tr>

                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($rigoristi as $rig) {

                                                                        $s = "";
                                                                        $schierato = "";
                                                                        //Calcolo colore per ruolo
                                                                        $role = "";
                                                                        $role = $this->mdl_team->getNomeRuoloPrecedente($rig['id_giocatore']);
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

                                                                        $dettagli = $this->mdl_team->getGiocatorePrecedenti($rig['id_giocatore'], $stagione);
                                                                        ?>
                                                                        <tr <?= $colRuolo ?> height="35px" >
                                                                            <td class="lineup__num" style="vertical-align: middle;"><?= $this->mdl_team->getNomeRuoloPrecedente($dettagli[0]['id_giocatore'], $stagione) ?></td>
                                                                            <td class="lineup__name" style="vertical-align: middle;"><?= $this->mdl_team->getNomeGiocatorePrecedente($rig['id_giocatore'], $stagione) ?></td>
                                                                            <?php
                                                                            $v = $this->mdl_team->getVotoPrecedente($rig['id_giocatore'], $giornata, $stagione);
                                                                            $v = (is_Array($v) ? "" : $v);

                                                                            $s = $this->mdl_team->getSchieratoCampionatoPrecedente($rig['id_giocatore'], $giornata, $stagione);
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
                                                        <!-- Righe totali squadra in trasferta -->

                                                        <?php
                                                        if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17") { ?>  
                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Modificatore Difesa</th>
                                                                <th class="lineup__subheader" style="text-align: center"><?= $abilitazione ?></th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $media_difensori . " / " . $media . " -> + " . @$row['bonus_modificatore2'] ?></th>
                                                            </tr>
                                                        <?php
                                                            $parzialeB = $parzialeB . " + ";
                                                        }
                                                        
                                                        if ($stagione != "2011_12" && $stagione != "2012_13" && $stagione != "2013_14" && $stagione != "2014_15" && $stagione != "2015_16" && $stagione != "2016_17" && $stagione != "2017_18") { ?> 
                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">Criterio di Sostituzione</th>
                                                                <th class="lineup__subheader" style="text-align: center">&nbsp;</th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $this->mdl_team->getCriterioSquadraPrecedente($row['id2'], $giornata, "campionato", $stagione)?></th>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                        <tr style="vertical-align: middle;">
                                                            <th colspan="2" class="lineup__subheader">Punteggio</th>
                                                            <th class="lineup__subheader" style="text-align: center"><?= $parzialeB ?><?= @$row['bonus_modificatore2'] ?></th>
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

