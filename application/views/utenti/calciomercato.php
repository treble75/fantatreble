
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Calciomercato</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/calciomercato">Calciomercato</a></li>
                            <li class="active">Offerte</li>
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

                        <!-- Staff Member -->
                        <div class="card card--clean alc-staff">

                            <div class="card__header card__header--has-btn">
                                <h4>Offerte</h4>
                                <!-- <a class="btn btn-default btn-outline btn-xs card-header__button" href="#" title="Go to the Team">Go to the Team</a> -->
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Il calciomercato è aperto dal 03/09/2018 alle 24:00 del 28/02/2019.<br>Le offerte saranno valide per 48 ore, poi verranno aggiudicate se non ci sono rilanci o controfferte.</label>
                                            <label class="checkbox checkbox-inline">
                                                <input type="radio" id="radio" value="Scambio" name="chkOfferta">&nbsp; Scambio alla pari
                                            </label>
                                            <label class="checkbox checkbox-inline">
                                                <input type="radio" id="radio2" value="Offerta" name="chkOfferta">&nbsp; Offerta di mercato
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account-address-1">Inserisci la tua offerta</label>
                                            <textarea class="form-control" name="offerta" id="offerta" placeholder="Max 80 caratteri..." rows="2" maxlength="80"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci la tua offerta" name="but_commento" class="btn btn-default btn-lg btn-block">
                                </div>

                            </div>

                            <div class="card__content">

                                <!-- Shop List -->
                                <div class="card card--clean">

                                    <div class="card__content">

                                        <!-- Ciclo offerte -->
                                        <?php if ($offerte) { ?>
                                            <ul class="products products--list products--list-condensed">

                                                <?php
                                                foreach ($offerte as $row) {
                                                    $stato = (($row['attiva'] == 1) ? "Aperta" : "Chiusa");
                                                    $colore = (($row['attiva'] == 1) ? "onsale" : "onsale_chiusa");
                                                    ?>
                                                    <li class="product__item card">

                                                        <span class="<?= $colore ?>">
                                                            <span class="onsale__inner" style="font-size: 9px"><?= $stato ?></span>
                                                        </span>

                                                        <div class="product__img">
                                                            <div class="product__img-holder" style="padding-top: 30px;">
                                                                <img src="<?= base_url('/') ?>images/users/<?= $row['id_utente'] ?>.png" />
                                                            </div>
                                                        </div>

                                                        <div class="product__content card__content">

                                                            <header class="product__header">
                                                                <div class="product__header-inner">
                                                                    <span class="product__category" style="color: #1892ED;">Tipologia : <?= $row['tipo'] ?></span>
                                                                    <h4 class="product__title"><a href="_soccer_shop-product.html"><?= $row['offerta'] ?></a></h4>
                                                                </div>
                                                            </header>

                                                            <div class="product__excerpt">
                                                                <h5 class="team-leader__player-name" style="color: #1892ED;">
                                                                    <?= $this->mdl_utenti->getNomeUtente($row['id_utente']) ?>
                                                                </h5>
                                                                <span class="team-leader__player-position">
                                                                    <?= $this->mdl_utenti->getSquadra($row['id_utente']) ?>
                                                                </span>
                                                                <span>&nbsp;</span>
                                                                <h5 class="team-leader__player-name" style="font-size: 12px">
                                                                    Offerta inserita alle ore <?= $row['orario'] ?>
                                                                </h5>
                                                                <span>&nbsp;</span>
                                                                <?php
                                                                $ora_offerta = substr($row['orario'], 19, 4) . "-" . substr($row['orario'], 16, 2) . "-" . (substr($row['orario'], 13, 2) + 02) . " " . substr($row['orario'], 0, 8);
                                                                ?> 
                                                                <h5 class="team-leader__player-name" style="font-size: 12px">
                                                                    <div class="countdown-counter" data-date="<?= $ora_offerta ?>" ></div>
                                                                </h5>
                                                            </div>

                                                            <?php
                                                            //Parte amministrativa
                                                            if ($_SESSION['username'] == "treble") {
                                                                ?>
                                                                <footer class="product__footer">
                                                                    <a href='<?= base_url('/') . "index.php/utente/closeofferta/" . $row['id_offerta'] ?>' class="btn btn-primary-inverse btn-icon product__add-to-cart"></i> Chiudi offerta</a>
                                                                    <a href='<?= base_url('/') . "index.php/utente/delofferta/" . $row['id_offerta'] ?>' class="btn btn-default btn-icon"></i> Cancella offerta</a>
                                                                </footer>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php } else {
                                            ?>
                                            <div class = 'alert alert-warning alert-dismissible'>
                                                <strong>Attualmente non sono presenti offerte di mercato</strong>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <!-- Ciclo Offerte / End -->

                                    </div>
                                </div>
                                <!-- Shop List / End -->

                            </div>

                        </div>
                        <!-- Staff Member / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: TOP 11 Giornata -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Fantamilioni Residui</h4>
                            </div>

                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">

                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">Team</th>
                                                <th class="team-leader__gp">&nbsp;</th>
                                                <th class="team-leader__avg">FantaMilioni</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            if (count($fanta) > 0) {

                                                foreach ($fanta as $row) {
                                                    $utente = $this->mdl_utenti->getDatiUtente($row['id_utente']);
                                                    ?>
                                                    <tr>
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/users/<?= $row['id_utente'] ?>.png" >
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $utente[0]['nome'] . " " . $utente[0]['cognome'] ?></h5>
                                                                    <span class="team-leader__player-position"><?= $utente[0]['squadra'] ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__goals"></td>
                                                        <td class="team-leader__gp" style="color: #1892ED; font-size: 14px;"><?= $row['fantamilioni'] ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->

                            </div>
                        </aside>
                        <!-- Widget: TOP 11 Giornata / End -->

                        </form>

                    </div>
                    <!-- Sidebar / End -->
                </div>

            </div>
        </div>

        <!-- Content / End -->

