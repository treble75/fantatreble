
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Rigoristi</span> Schierati</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(1) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(1);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(1);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(2) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(2);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(2);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(3) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(3);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(3);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                </div>

                <div class="spacer"></div>
                
                <div class="row">
                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(4) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(4);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(4);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(5) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(5);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(5);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(6) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(6);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(6);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                </div>
                
                <div class="spacer"></div>
                
                <div class="row">
                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(7) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(7);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(7);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(8) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(8);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(8);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(9) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(9);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(9);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                </div>
                
                <div class="spacer"></div>
                
                <div class="row">
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-4">

                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Rigoristi <span style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra(10) ?></span></h4>
                                <?php
                                $ora_inserimento = $this->mdl_utenti->getUltimaSelezioneRigoristi(10);
                                if ($ora_inserimento != "" && count($ora_inserimento) > 0) {
                                    $ora = "Ultima selezione ->  " . oraedataIns($ora_inserimento);
                                } else {
                                    $ora = "Mai selezionati";
                                }
                                ?>
                                <span style="font-size: 10px;"><?= $ora ?></span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__goals">&nbsp;</th>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__gp">Media Voto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rigoristi = $this->mdl_team->getAllRigoristi(10);
                                            foreach ($rigoristi as $row) {
                                                if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                    $filename = $row['id_giocatore'] . ".png";
                                                } else
                                                    $filename = "dummy.png";
                                                
                                                if ($row['ordine'] <= 5) {
                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                } else {
                                                    $bgcolor = '';
                                                }
                                                ?>
                                                <tr <?= $bgcolor ?> >
                                                    <td class="team-leader__goals"><?= $row['ordine'] ?></td>
                                                    <td class="team-leader__player">
                                                        <div class="team-leader__player-info">
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" width="50px" >
                                                            </figure>
                                                            <div class="team-leader__player-inner">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $this->mdl_team->getCognome($row['id_giocatore']) . " " . substr($this->mdl_team->getNome($row['id_giocatore']), 0, 1) . "." ?></h5>
                                                                <span class="team-leader__player-position"><?= $this->mdl_team->getDescrizioneRuolo($row['id_giocatore']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    $media_voto = $this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']);
                                                    
                                                    if (count($media_voto)>0 && $media_voto != "") {
                                                        if ($media_voto >= 6)
                                                            $colorefont = "#009900";
                                                        if ($media_voto < 6)
                                                            $colorefont = "#ff3d3d";
                                                    } else {
                                                        $media_voto = 0.00;
                                                        $colorefont = "#ff3d3d";
                                                    }
                                                    ?>
                                                    <td class="team-leader__gp" style="color: <?= $colorefont ?>;"><?= number_format(($media_voto), 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->

                    </div>

                    <div class="col-md-4">

                    </div>

                </div>

            </div>
        </div>

        <!-- Content / End -->
