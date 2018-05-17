

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Top </span>Match</h1>
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

                        <!-- Account Navigation -->
                        <div class="card">
                            <div class="card__header">
                                <h4>Gestione Campionati</h4>
                            </div>
                            <div class="card__content">
                                <nav class="df-account-navigation">
                                    <ul>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_voti" >Inserisci Voti</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati" >Inserisci Risultati Campionato</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati_Coppe" >Inserisci Risultati Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/aggiorna_coppe" >Aggiorna Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/blocco" >Blocco Formazioni</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/gestione_rigoristi" >Gestione Rigoristi</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/topmatch" >Top Match</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Account Navigation / End -->
                    </div>

                    <div class="col-md-8">

                        <!-- Personal Information -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Top Match Giornata n° <?= $giornata ?></h4>
                            </div>
                            <div class="card__content">
                                <?php if (validation_errors()) { ?>
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

                                echo form_open_multipart('home/topmatch', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Seleziona Squadra di Casa</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbSquadraCasa', $Squadre, set_value('cmbSquadraCasa', $this->input->post('cmbSquadraCasa')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Seleziona Squadra in Trasferta</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbSquadraTrasferta', $Squadre, set_value('cmbSquadraTrasferta', $this->input->post('cmbSquadraTrasferta')), $js) ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Seleziona Competizione</label>
                                            <select name="cmbCompetizione" id="account-city" class="form-control">
                                                <option value="coppa">Coppa Treble</option>
                                                <option value="champions">Champions League</option>
                                                <option value="supercoppa">SuperCoppa Treble</option>
                                                <option value="league">Treble League</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Blocco Formazioni</label><br>
                                            <span style="color: #1892ED;"><?= oraedataIns($blocco) ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Top Match" name="but_inserisci" class="btn btn-default btn-lg btn-block">
                                </div>

                                </form>
                            </div>
                        </div>
                        <!-- Personal Information / End -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Content / End -->
