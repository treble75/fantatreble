

        <!-- Page Heading
        ================================================== -->

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Conferma <span class="highlight">Risultati</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li>Giornata n° <?= $_SESSION['giornata'] ?></li>
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
                            echo form_open_multipart('utente/risultati_success');

                            foreach ($risultati as $row) {
                                //Inizializzo variabili
                                $totaleA = array();
                                $totaleB = array();
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
                                                        for ($c = 0; $c < count($schierati); $c++) {
                                                            if ($row['id1'] == $schierati[$c]['id_utente']) {

                                                                //Inizializzo variabili
                                                                $chkMod = "";
                                                                $chkid = "";
                                                                //+2 per chi gioca in casa o 0 per campionato a 10
                                                                $totaleA[$c] = 0;

                                                                //Calcolo numeri difensori per Modificatore difesa
                                                                @$num_difensori = $this->mdl_team->getNumeroDifensoriSchierati($row['id1'], $_SESSION['giornata']);

                                                                //Calcolo media voto difensori per Modificatore difesa
                                                                @$media_difensori = $this->mdl_team->getMediaDifensoriSchierati($row['id1'], $_SESSION['giornata']);

                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T1']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T1']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T1']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T2']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T2']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T2']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T3']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T3']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T3']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T4']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T4']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T4']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T5']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T5']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T5']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T6']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T6']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T6']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T7']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T7']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T7']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T8']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T8']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T8']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T9']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T9']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T9']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T10']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T10']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T10']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T11']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T11']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T11']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                                </tr>

                                                                <!-- Panchinari in casa ---->

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P1']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P1']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P1']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P2']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P2']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P2']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P3']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P3']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P3']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P4']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P4']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P4']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P5']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P5']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P5']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P6']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P6']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P6']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P7']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P7']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P7']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P8']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P8']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P8']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P9']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P9']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P9']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P10']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P10']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P10']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P11']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P11']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P11']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P12']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P12']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P12']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P13']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P13']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P13']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P14']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P14']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P14']);
                                                                    if ($voto != "") {
                                                                        $totaleA[$c] = (@$totaleA[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $parzialeA = $totaleA[$c];

                                                                //Modificatore Difesa squadra in casa

                                                                if ($num_difensori < 4) {
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
                                                                $bonusA = $this->mdl_team->getBonusModificatore(@$media);

                                                                //Fine Modificatore difesa
                                                                ?>

                                                                <tr style="vertical-align: middle;">
                                                                    <th colspan="2" class="lineup__subheader">Difensori : <?= @$num_difensori ?></th>
                                                                    <th class="lineup__subheader" style="text-align: center;">
                                                            <figure>
                                                                <?= $abilitazione ?>
                                                            </figure>
                                                            </th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center"><?= @$media_difensori . ' / ' . $media . ' -> + ' . $bonusA ?></th>
                                                            </tr>

                                                            <!-- Modificatore Difesa squadra in casa / END -->

                                                            <?php
                                                            //Calcolo somma totale squadra e bonus

                                                            if ($chkMod == "Attivo") {
                                                                $totaleA = ( $parzialeA + $bonusA );
                                                                //Campo nascosto per il bonus modificatore
                                                                echo "<input type='hidden' value='" . $bonusA . "' name='bonus" . $c . "' />";
                                                            } else {
                                                                $totaleA = $parzialeA;
                                                                //Campo nascosto per il bonus modificatore
                                                                echo "<input type='hidden' value=0 name='bonus" . $c . "' />";
                                                            }

                                                            //Campo nascosto per il totale parziale squadra in casa
                                                            echo "<input type='hidden' value='" . $totaleA . "' name='totale" . $c . "' />";

                                                            //Campo nascosto per il numero dei difensori
                                                            echo "<input type='hidden' value='" . @$num_difensori . "' name='numero_difensori" . $c . "' />";

                                                            //Campo nascosto per il totale modificatore
                                                            echo "<input type='hidden' value='" . @$media_difensori . "' name='totale_modificatore" . $c . "' />";

                                                            //Campo nascosto per la media difensori
                                                            echo "<input type='hidden' value='" . @$media . "' name='media_difensori" . $c . "' />";
                                                            ?>

                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">TOTALE PUNTI SQUADRA</th>
                                                                <th colspan="2"class="lineup__subheader" style="text-align: center;"><?= $parzialeA ?> ( + <?= $bonusA ?> )</th>
                                                                <th class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $totaleA ?></th>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
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
                                                        for ($c = 0; $c < count($schierati); $c++) {
                                                            if ($row['id2'] == $schierati[$c]['id_utente']) {

                                                                //Inizializzo variabili
                                                                $chkMod = "";
                                                                $chkid = "";

                                                                //Calcolo numeri difensori per Modificatore difesa
                                                                @$num_difensori = $this->mdl_team->getNumeroDifensori($row['id2']);

                                                                //Calcolo media voto difensori per Modificatore difesa
                                                                @$media_difensori = $this->mdl_team->getMediaDifensori($row['id2'], $giornata);

                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T1']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T1']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T1']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T2']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T2']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T2']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T3']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T3']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T3']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T4']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T4']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T4']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T5']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T5']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T5']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T6']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T6']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T6']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T7']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T7']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T7']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T8']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T8']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T8']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T9']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T9']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T9']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T10']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T10']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T10']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['T11']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['T11']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['T11']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto == "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sv2.png" title="Sostituito" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th colspan="5" class="lineup__subheader">Giocatori in Panchina</th>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P1']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P1']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P1']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P2']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P2']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P2']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P3']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P3']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P3']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P4']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P4']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P4']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P5']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P5']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P5']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P6']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P6']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P6']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P7']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P7']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P7']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P8']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P8']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P8']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P9']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P9']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P9']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P10']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P10']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P10']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P11']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P11']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P11']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P12']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P12']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P12']);
                                                                    if ($voto != "") {
                                                                        $$totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P13']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P13']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P13']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($schierati[$c]['P14']);
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
                                                                    $v = $this->mdl_team->getVotoS($schierati[$c]['P14']);
                                                                    $v = (is_Array($v) ? "" : $v);
                                                                    $voto = $this->mdl_team->getFantavotoS($schierati[$c]['P14']);
                                                                    if ($voto != "") {
                                                                        $totaleB[$c] = (@$totaleB[$c] + @$voto);
                                                                    }
                                                                    ?>
                                                                    <td class="lineup__pos" style="text-align: center;"><?= $v ?></td>
                                                                    <td class="lineup__pos" style="text-align: center;">
                                                                        <?php if ($voto != "") { ?>
                                                                            <img src="<?= base_url('/') ?>images/sost.png" title="Entrato in sostituzione" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="lineup__info"style="color: #1892ED; font-size: 11px; text-align: center;"><?= $voto ?></td>
                                                                </tr>

                                                                <?php
                                                                $parzialeB = $totaleB[$c];

                                                                //Modificatore Difesa squadra in trasferta -->

                                                                if ($num_difensori < 4) {
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
                                                                $bonusB = $this->mdl_team->getBonusModificatore(@$media);
                                                                ?>

                                                                <tr style="vertical-align: middle;">
                                                                    <th colspan="2" class="lineup__subheader">Difensori : <?= @$num_difensori ?></th>
                                                                    <th class="lineup__subheader" style="text-align: center;">
                                                            <figure>
                                                                <?= $abilitazione ?>
                                                            </figure>
                                                            </th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center"><?= @$media_difensori . ' / ' . $media . ' -> + ' . $bonusB ?></th>
                                                            </tr>

                                                            <!-- Modificatore Difesa squadra in trasferta / END --> 

                                                            <?php
                                                            //Sommo totale squadra e bonus

                                                            if ($chkMod == "Attivo") {
                                                                $totaleB = ( $parzialeB + $bonusB );
                                                                //Campo nascosto per il bonus modificatore
                                                                echo "<input type='hidden' value='" . $bonusB . "' name='bonus" . $c . "' />";
                                                            } else {
                                                                $totaleB = $parzialeB;
                                                                //Campo nascosto per il bonus modificatore
                                                                echo "<input type='hidden' value=0 name='bonus" . $c . "' />";
                                                            }

                                                            //Campo nascosto totale
                                                            echo "<input type='hidden' value='" . $totaleB . "' name='totale" . $c . "' />";

                                                            //Campo nascosto per il numero dei difensori
                                                            echo "<input type='hidden' value='" . @$num_difensori . "' name='numero_difensori" . $c . "' />";

                                                            //Campo nascosto per il totale modificatore
                                                            echo "<input type='hidden' value='" . @$media_difensori . "' name='totale_modificatore" . $c . "' />";

                                                            //Campo nascosto per la media difensori
                                                            echo "<input type='hidden' value='" . @$media . "' name='media_difensori" . $c . "' />";
                                                            ?>

                                                            <tr style="vertical-align: middle;">
                                                                <th colspan="2" class="lineup__subheader">TOTALE PUNTI SQUADRA</th>
                                                                <th colspan="2" class="lineup__subheader" style="text-align: center;"><?= $parzialeB ?> ( + <?= $bonusB ?> )</th>
                                                                <th class="lineup__subheader" style="text-align: center; color: #1892ED; font-size: 12px;"><?= $totaleB ?></th>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

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

                            <div class="form-group--submit">
                                <input type="submit" value="Chiudi Giornata Treble League" name="but_chiudigiornata" class="btn btn-default btn-lg btn-block">
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

            </div>
        </div>

        <!-- Content / End -->

