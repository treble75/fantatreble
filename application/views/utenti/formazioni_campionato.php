

		<!-- Page Heading
		================================================== -->
                
                <?php if ($giornata <= 27) { 
                    
                    $label = "Giornata " . $giornata ; 
                    
                }

                if ($giornata >= 28 && $giornata <= 33) {
                    
                    $label = "Playoff" ; 
                    
                }

                if ($giornata >= 34 && $giornata <= 35) {
                    
                    $label = "Finalissima" ; 
                    
                }
                ?>
                
		<div class="page-heading">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h1 class="page-heading__title">Formazioni <span class="highlight">Treble League</span></h1>
                                <ol class="page-heading__breadcrumb breadcrumb">
                                    <li><?= $label ?></li>
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
                                    foreach ($risultati as $row) {
                                        //Inizializzo variabili
                                        $totaleA = 0;
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
                                                        <th class="lineup__num">&nbsp;</th>
                                                        <th colspan="2" style="color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></th>
                                                        <th class="lineup__info">&nbsp;</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //Ciclo titolari in casa
                                                    for ($c = 0; $c < count($titolari); $c++) {
                                                        if ($row['id1'] == $titolari[$c]['id_utente']) {
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
                                                              <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                              <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                              <?php
                                                              $voto = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                              $voto = (($voto == "") ? "S.V." : $voto);
                                                              ?>
                                                              <td class="lineup__pos"><?= $voto ?></td>
                                                              <?php
                                                              $chk = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                              $chk = (($chk == "") ? "" : "checked='checked'");
                                                              ?>
                                                              <td class="lineup__info">
                                                                  <input type="checkbox" id="copy<?= $z . $titolari[$c]['id_utente']?>" value="Y" name="<?= $titolari[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                              </td>
                                                            </tr>
                                                            <?php
                                                            $totaleA = (round($totaleA,2) + round($voto,2));
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P1']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P1' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P1check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P2']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P2' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P2check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P3']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P3' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P3check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P4']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P4' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P4check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P5']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P5' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P5check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P6']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P6' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P6check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P7']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P7' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P7check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P8']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P8' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P8check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P9']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P9' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P9check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P10']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P10' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P10check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P11']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P11' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P11check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P12']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P12' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P12check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P13']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P13' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P13check' ?>"  />
                                                            </td>
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P14']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] . 'P14' ?>" value="Y" name="<?= $panchinari[$c]['id_utente'] . 'P14check' ?>"  />
                                                            </td>
                                                        </tr>
                                                      
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                        
                                                    <tr>
                                                        <th colspan="2" class="lineup__subheader">Totale Parziale</th>
                                                        <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $totaleA ?></th>
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
                                                        <th class="lineup__num">&nbsp;</th>
                                                        <th colspan="2" style="color: #1892ED; font-size: 14px; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></th>
                                                        <th class="lineup__info">&nbsp;</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $z = 1;
                                                        //Ciclo Titolari in Trasferta
                                                        for ($c = 0; $c < count($titolari); $c++) {
                                                            if ($row['id2'] == $titolari[$c]['id_utente']) {
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
                                                            <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                            <td class="lineup__name" style="color: #1892ED; font-size: 11px;"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                            <?php
                                                            $voto = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                            $voto = (($voto == "") ? "S.V." : $voto);
                                                            ?>
                                                            <td class="lineup__pos"><?= $voto ?></td>
                                                            <?php
                                                            $chk = $this->mdl_team->getFantavotoP($titolari[$c]['id_giocatore']);
                                                            $chk = (($chk == "") ? "" : "checked='checked'");
                                                            ?>
                                                            <td class="lineup__info">
                                                                <input type="checkbox" id="copy<?= $z . $titolari[$c]['id_utente'] ?>" value="Y" name="<?= $titolari[$c]['id_utente'] . 'Tcheck' . $z ?>" <?= $chk ?> />
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            $totaleB = (round($totaleB,2) + round($voto,2));
                                                            $z++;
                                                            }
                                                        }
                                                        ?>
                                                        
                                                        <tr>
                                                            <th colspan="4" class="lineup__subheader">Giocatori in Panchina</th>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P1']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P1" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P1check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P2']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P2" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P2check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P3']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P3" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P3check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P4']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P4" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P4check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P5']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P5" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P5check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P6']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P6" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P6check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P7']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P7" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P7check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P8']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P8" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P8check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P9']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P9" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P9check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P10']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P10" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P10check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P11']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P11" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P11check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P12']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P12" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P12check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P13']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P13" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P13check"  />
                                                                    </td>
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
                                                                    <td class="lineup__num"><?= $this->mdl_team->getNomeRuolo($dettagli[0]['id_giocatore']) ?></td>
                                                                    <td class="lineup__name"><?= $dettagli[0]['cognome'] . " " . $dettagli[0]['nome'] ?></td>
                                                                    <?php
                                                                    $voto = $this->mdl_team->getFantavotoP($panchinari[$c]['P14']);
                                                                    $voto = (($voto == "") ? "S.V." : $voto);
                                                                    ?>
                                                                    <td class="lineup__pos"><?= $voto ?></td>
                                                                    <td class="lineup__info">
                                                                        <input type="checkbox" id="copy<?= $panchinari[$c]['id_utente'] ?>P14" value="Y" name="<?= $panchinari[$c]['id_utente'] ?>P14check"  />
                                                                    </td>
                                                                </tr>
                                                            
                                                        <?php   
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th colspan="2" class="lineup__subheader">Totale Parziale</th>
                                                            <th colspan="2" class="lineup__subheader" style="text-align: center"><?= $totaleB ?></th>
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

