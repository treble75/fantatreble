
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Crea </span> Giocatore</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li class="active">Crea Giocatore</li>
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

                    <div class="col-md-4">

                        <!-- Account Navigation -->
                        <div class="card">
                            <div class="card__header">
                                <h4>Gestione Giocatori</h4>
                            </div>
                            <div class="card__content">
                                <nav class="df-account-navigation">
                                    <ul>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/crea_giocatore">Crea Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/assegna_giocatore">Assegna Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/modifica_giocatore">Modifica Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/modifica_squadre">Modifica Squadre</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/esegui_scambio">Esegui Scambio</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/modifica_voto">Modifica Voto</a>
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
                                <h4>Crea Giocatore</h4>
                            </div>
                            <div class="card__content">
                                <?php
                                if (validation_errors()) { ?>
                                    <div class = 'alert alert-danger alert-dismissible'>
                                        <strong><?= validation_errors(); ?></strong>
                                    </div>
                                <?php
                                }
                                if (@$message) { ?>
                                    <div class = 'alert alert-warning alert-dismissible'>
                                        <strong><?= @$message ?></strong>
                                    </div>
                                <?php
                                }
                                if (@$success_message) { ?>
                                    <div class = 'alert alert-success alert-dismissible'>
                                        <strong><?= @$success_message ?></strong>
                                    </div>
                                <?php
                                }
                                ?>
                                
                                <?=
                                form_open('utente/crea_giocatore', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-email">Nome Giocatore</label>
                                                <input type="text" class="form-control" value="<?php echo set_value('nome'); ?>" name="nome" id="account-username" placeholder="Nome giocatore...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-username">Cognome Giocatore</label>
                                                <input type="text" class="form-control" value="<?php echo set_value('cognome'); ?>" name="cognome" id="account-username" placeholder="Cognome giocatore...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-city">Seleziona Ruolo</label>
                                                <?php $js = 'id="account-city" class="form-control"'; ?>
                                                <?= form_dropdown('cmbRuoli', $Ruoli, set_value('cmbRuoli', $this->input->post('cmbRuoli')), $js) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-postcode">Seleziona Squadra</label>
                                                <?= form_dropdown('cmbSquadre', $Squadre, set_value('cmbSquadre', $this->input->post('cmbSquadre')), $js) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group--submit">
                                        <button type="submit" class="btn btn-default btn-lg btn-block">Crea Nuovo Giocatore</button>
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
