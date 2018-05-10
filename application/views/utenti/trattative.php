
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Trattative <span class="highlight">Calciomercato</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/calciomercato">Calciomercato</a></li>
                            <li class="active">Trattative</li>
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
                        <h4>Trattative Calciomercato</h4>
                        <span style="font-size: 12px;">Sono visibili soltanto le offerte ancora aperte e non ancora scadute</span>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table table--lg team-roster-table">
                                <?php
                                if ($offerte) { ?>
                                
                                <thead>
                                    <tr>
                                        <th class="team-roster-table__number" style="width: 15%">&nbsp;</th>
                                        <th class="team-roster-table__name" style="width: 15%; text-align: center;">Squadra</th>
                                        <th class="team-roster-table__age" style="width: 50%; text-align: center;">Offerta</th>
                                        <th class="team-roster-table__name" style="width: 20%; text-align: center;">Scadenza</th>
                                    </tr>
                                </thead>
                                
                                <?php
                                    $color = "#CCFFCC";
                                    ?>
                                    <tbody>
                                        <?php
                                        foreach ($offerte as $row) { 
                                            ?>

                                            <tr style="padding: 0px 0px;" >
                                                
                                                <td class="team-roster-table__number" style="padding: 0px 0px; vertical-align: middle; width: 15%;" align="center">
                                                    <figure class="team-leader__player-img team-leader__player-img--sm">
                                                        <img src="<?= base_url('/') ?>images/users/<?= $row['id_utente'] ?>.png" />
                                                    </figure>
                                                </td>
                                                <td class="team-roster-table__name" style="color: #1892ED; font-size: 13px; vertical-align: middle; width: 15%; text-align: center;"><?= $this->mdl_utenti->getSquadra($row['id_utente']) ?></td>
                                                <td class="team-roster-table__age" style="color: #1892ED; font-size: 13px; vertical-align: middle; width: 40%; text-align: center;"><?= $row['offerta'] ?></td>
                                                <?php
                                                $ora_offerta = substr($row['orario'], 19, 4) . "-" . substr($row['orario'], 16, 2) . "-" . (substr($row['orario'], 13, 2) + 02) . " " . substr($row['orario'], 0, 8);
                                                ?>
                                                <td class="team-roster-table__name" style="vertical-align: middle; width: 20%; text-align: center;"><div class="countdown-counter" style="width: 200px;" data-date="<?= $ora_offerta ?>" ></div></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                } else { ?>
                                    <div class="spacer"></div>
                                    <div class = 'alert alert-warning alert-dismissible'>
                                        <strong>Nessuna trattativa in corso</strong>
                                    </div>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Team Roster: Table / End -->

            </div>
        </div>

        <!-- Content / End -->

