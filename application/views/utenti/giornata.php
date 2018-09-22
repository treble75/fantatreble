
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Chiusura <span class="highlight">Giornata</span></h1>
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

                <div class="row">

                    <!-- Content -->
                    <div class="content col-md-8">

                        <!-- Game Scoreboard -->
                        <div class="card">
                            <header class="card__header card__header--has-btn">
                                <h4>Chiusura Giornata</h4>
                            </header>
                            <div class="card__content">

                                <!-- Game Result -->
                                <div class="game-result">

                                    <section class="game-result__section pt-0">

                                        <header class="game-result__header game-result__header--alt">
                                            <span class="game-result__league">Treble League 2018/19</span>
                                            <h3 class="game-result__title">Giornata <?= $giornata ?></h3>
                                            <time class="game-result__date" datetime="2017-03-17"></time>
                                        </header>

                                        <?php
                                        echo form_open_multipart('utente/giornata');

                                        foreach ($risultati as $row) {
                                            ?>
                                            <input type="hidden" value="Y" name="check_invio" />
                                            <div class="game-result__content">

                                                <!-- 1st Team -->
                                                <div class="game-result__team game-result__team--first">
                                                    <figure class="game-result__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="game-result__team-info">
                                                        <h5 class="game-result__team-name"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h5>
                                                        <div class="game-result__team-desc"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></div>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->

                                                <div class="game-result__score-wrap">
                                                    <div class="game-result__score game-result__score--lg">
                                                        <span class="game-result__score-result game-result__score-result--loser"><?= $row['risultato1'] ?></span> <span class="game-result__score-dash">-</span> <span class="game-result__score-result game-result__score-result--loser"><?= $row['risultato2'] ?></span>
                                                    </div>
                                                </div>

                                                <!-- 2nd Team -->
                                                <div class="game-result__team game-result__team--second">
                                                    <figure class="game-result__team-logo">
                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" alt="">
                                                    </figure>
                                                    <div class="game-result__team-info">
                                                        <h5 class="game-result__team-name"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h5>
                                                        <div class="game-result__team-desc"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></div>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                            <div class="spacer"></div>
                                            <?php
                                            echo "<input type='hidden' name='GF" . $row['id1'] . "' value='" . $row['risultato1'] . "' />";
                                            echo "<input type='hidden' name='GS" . $row['id1'] . "' value='" . $row['risultato2'] . "' />";
                                            echo "<input type='hidden' name='GF" . $row['id2'] . "' value='" . $row['risultato2'] . "' />";
                                            echo "<input type='hidden' name='GS" . $row['id2'] . "' value='" . $row['risultato1'] . "' />";
                                        }
                                        ?>

                                    </section>

                                </div>
                                <!-- Game Timeline / End -->

                            </div>
                        </div>
                        <!-- Game Scoreboard / End -->

                        <div class="form-group--submit">
                            <input type="submit" value="Conferma risultati" name="but_archivia" class="btn btn-default btn-lg btn-block">
                        </div>

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Standings -->
                        <aside class="widget card widget--sidebar widget-standings">
                            <div class="widget__title card__header card__header--has-btn">
                                <!-- Anno da modificare -->
                                <h4>Treble League 2018/19</h4>
                            </div>
                            <div class="widget__content card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-standings">

                                        <!-- Classifica Treble League -->
                                        <thead>
                                            <tr>
                                                <th>Squadre</th>
                                                <th>V</th>
                                                <th>N</th>
                                                <th>P</th>
                                                <th>Punti</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            foreach ($classifica as $row) {
                                                switch ($i) {
                                                    case 1:
                                                        $color = 'bgcolor="#f2fff0"';
                                                        break;
                                                    case 2;
                                                    case 3;
                                                    case 4;
                                                    case 5;
                                                    case 6;
                                                    case 7;
                                                        $color = "";
                                                        break;
                                                    case 8;
                                                    case 9;
                                                    case 10;
                                                        $color = 'bgcolor="#ffebec"';
                                                        break;
                                                }
                                                ?>
                                                <tr <?= $color ?> >
                                                    <td>
                                                        <div class="team-meta">
                                                            <figure class="team-meta__logo">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_squadra'] ?>.png" width="30" >
                                                            </figure>
                                                            <div class="team-meta__info">
                                                                <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadra($row['id_squadra']) ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id_squadra']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= $row['vittorie'] ?></td>
                                                    <td><?= $row['pareggi'] ?></td>
                                                    <td><?= $row['sconfitte'] ?></td>
                                                    <td style="color: #1892ED; font-size: 14px;"><?= $row['punti'] ?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Standings / End -->

                        </form>

                    </div>
                    <!-- Sidebar / End -->
                </div>
            </div>
        </div>

        <!-- Content / End -->
