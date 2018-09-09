

        <!-- Page Heading
        ================================================== -->

        <?php
        if (count($risultati_supercoppa) < 1) {
            if (count($risultati_coppa) > 0 && count($risultati_champions) < 1) {
                $competizione = "Coppa Treble";
                $txt = "+2 in casa";
            }
            if (count($risultati_coppa) < 1 && count($risultati_champions) > 0) {
                $competizione = "Champions League";
                $txt = "+2 in casa";
            }
            if (count($risultati_coppa) < 1 && count($risultati_champions) < 1) {
                $competizione = "";
                $txt = "";
            }
        } else {
            $competizione = "SuperCoppa Treble";
            $txt = "";
        }
        ?>

        <div class="page-heading page-heading-formazioni-coppe">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Formazioni <span class="highlight">Coppe</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li class="active"><?= $competizione ?></li>
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
                        <h4>Formazioni schierate</h4>
                    </div>
                    <div class="card__content" style="overflow-x:auto;">
                        <div class="table-responsive" style="min-width:768px;">

                            <?php
                            if (count($risultati_supercoppa) < 1)
                                $risultati = (count($risultati_coppa) > 0) ? $risultati_coppa : $risultati_champions;
                            else
                                $risultati = $risultati_supercoppa;

                            if (count($risultati) < 1) {
                                ?>
                                <div class="spacer"></div>
                                <div align="center" style="width:100%" style="text-align: center;">
                                    <div class="alert alert-info">
                                        Non viene disputata nessuna partita di coppa in questa giornata
                                    </div>
                                </div>
                                <?php
                            }

                            foreach ($risultati as $row) {
                                //Inizializzo variabili
                                $totaleA = 2;
                                $totaleB = 0;
                                if ($competizione == "SuperCoppa Treble") {
                                    $totaleA = 0;
                                }
                                $totaleB = 0;
                                $z = 1;
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
                                                            <th class="lineup__num" style="background-color: #f2d376;">&nbsp;</th>
                                                            <th colspan="2" style="color: #1892ED; font-size: 14px; text-align: center; background-color: #f2d376;"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></th>
                                                            <th class="lineup__info" style="background-color: #f2d376;">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        //Ciclo titolari in casa
                                                        for ($c = 0; $c < count($titolari_coppa); $c++) {
                                                            if ($row['id1'] == $titolari_coppa[$c]['id_utente']) {
                                                                $dettagli = $this->mdl_team->getGiocatore($titolari_coppa[$c]['id_giocatore']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($titolari_coppa[$c]['id_giocatore']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <?php
                                                                    $chk = $this->mdl_team->getFantavotoP($titolari_coppa[$c]['id_giocatore']);
                                                                    $chk = (($chk == "" || count($chk) == 0) ? "" : "checked='checked'");
                                                                    ?>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $z . $titolari_coppa[$c]['id_utente'] ?>" value="Y" name="<?= $titolari_coppa[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $totaleA = ((int) @$totaleA + (int) $voto);
                                                                $z++;
                                                                ?>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <tr>
                                                            <th colspan="4" class="lineup__subheader">Giocatori in Panchina</th>
                                                        </tr>

                                                        <!-- Panchinari in casa ---->

                                                        <?php
                                                        for ($c = 0; $c < count($panchinari_coppa); $c++) {
                                                            if ($row['id1'] == $panchinari_coppa[$c]['id_utente']) {

                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P1']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P1']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P1' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P1check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P2']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P2']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P2' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P2check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P3']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P3']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P3' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P3check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P4']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P4']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P4' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P4check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P5']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P5']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P5' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P5check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P6']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P6']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P6' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P6check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P7']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P7']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P7' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P7check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P8']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P8']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P8' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P8check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P9']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P9']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P9' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P9check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P10']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P10']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P10' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P10check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P11']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P11']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P11' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P11check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P12']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P12']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P12' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P12check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P13']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P13']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P13' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P13check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P14']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P14']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] . 'P14' ?>" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] . 'P14check' ?>"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <tr>
                                                            <th colspan="2" class="lineup__subheader">Criterio di Sostituzione</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $this->mdl_team->getCriterioSquadra($row['id1'], $giornata, "coppa") ?></th>
                                                        </tr>  

                                                        <tr>
                                                            <th colspan="2" class="lineup__subheader">Totale Parziale ( <?= $txt ?> )</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align:center; color: #1892ED;"><?= $totaleA ?></th>
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
                                                            <th class="lineup__num" style="background-color: #f2d376;">&nbsp;</th>
                                                            <th colspan="2" style="color: #1892ED; font-size: 14px; text-align: center; background-color: #f2d376;"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></th>
                                                            <th class="lineup__info" style="background-color: #f2d376;">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $z = 1;
                                                        //Ciclo Titolari in Trasferta
                                                        for ($c = 0; $c < count($titolari_coppa); $c++) {
                                                            if ($row['id2'] == $titolari_coppa[$c]['id_utente']) {
                                                                $dettagli = $this->mdl_team->getGiocatore($titolari_coppa[$c]['id_giocatore']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($titolari_coppa[$c]['id_giocatore']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <?php
                                                                    $chk = $this->mdl_team->getFantavotoP($titolari_coppa[$c]['id_giocatore']);
                                                                    $chk = (($chk == "" || count($chk) == 0) ? "" : "checked='checked'");
                                                                    ?>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $z . $titolari_coppa[$c]['id_utente'] ?>" value="Y" name="<?= $titolari_coppa[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $totaleB = ((int) @$totaleB + (int) $voto);
                                                                $z++;
                                                            }
                                                        }
                                                        ?>

                                                        <tr>
                                                            <th colspan="4" class="lineup__subheader">Giocatori in Panchina</th>
                                                        </tr>

                                                        <?php
                                                        for ($c = 0; $c < count($panchinari_coppa); $c++) {
                                                            //Panchinari in trasferta
                                                            if ($row['id2'] == $panchinari_coppa[$c]['id_utente']) {

                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P1']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P1']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P1" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P1check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P2']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P2']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P2" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P2check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P3']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P3']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P3" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P3check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P4']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P4']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P4" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P4check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P5']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P5']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P5" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P5check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P6']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P6']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P6" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P6check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P7']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P7']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P7" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P7check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P8']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P8']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P8" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P8check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P9']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P9']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P9" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P9check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P10']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P10']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P10" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P10check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P11']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P11']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P11" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P11check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P12']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P12']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P12" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P12check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P13']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P13']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P13" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P13check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $dettagli = $this->mdl_team->getGiocatore($panchinari_coppa[$c]['P14']);
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari_coppa[$c]['P14']);
                                                                    $voto = (($voto == "" || count($voto) == 0) ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari_coppa[$c]['id_utente'] ?>P14" value="Y" name="<?= $panchinari_coppa[$c]['id_utente'] ?>P14check"  />
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <tr>
                                                            <th colspan="2" class="lineup__subheader">Criterio di Sostituzione</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center; color: #1892ED;"><?= $this->mdl_team->getCriterioSquadra($row['id2'], $giornata, "coppa") ?></th>
                                                        </tr>         

                                                        <tr>
                                                            <th colspan="2" class="lineup__subheader">Totale Parziale</th>
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
                            ?>

                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

            </div>
        </div>

        <!-- Content / End -->

