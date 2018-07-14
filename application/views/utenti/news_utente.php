
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">News</span> Utente</h1>
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
                                <h4>Gestione Utenti</h4>
                            </div>
                            <div class="card__content">
                                <nav class="df-account-navigation">
                                    <ul>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/registra_utente" >Registra Utente</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/modifica_utente" >Modifica Utente</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/fantamilioni" >FantaMilioni</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/quote" >Quote</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/news_desktop" >News Desktop</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/news_utente" >News Utente</a>
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
                                <h4>Gestione News Utente</h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('utente/news_utente') ?>

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
                                ?>  

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            ?>
                                            <label for="account-email">Seleziona Utente/Squadra</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbSquadra', $Squadre, set_value('cmbSquadra', $this->input->post('cmbSquadra')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                            $js = 'id="account-city" class="form-control"';
                                            ?>
                                            <label for="account-email">Seleziona Tipologia</label>
                                            <select name="cmbNews" id="account-city" class="form-control">
                                                <option value="infortunio">Infortunio</option>
                                                <option value="cessione">Cessione</option>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            ?>
                                            <label for="account-email">Seleziona Giocatore</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbGiocatore', $Giocatori, set_value('cmbGiocatore', $this->input->post('cmbGiocatore')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account-first-name">Testo News</label>
                                            <input type="text" class="form-control" value="" name="testo_news" id="account-first-name" maxlength="256" placeholder="Max 256 caratteri" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group--submit">
                                    <input type="submit" value="Salva News" name="but_inserisci" class="btn btn-default btn-lg btn-block">
                                </div>
                                
                                

                                </form>
                            </div>
                        </div>
                        <!-- Personal Information / End -->
                    </div>
                </div>
            </div>
        </div>

        </form>

        <!-- Content / End -->
