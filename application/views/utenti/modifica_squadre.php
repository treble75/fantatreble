        <script language="JavaScript" type="text/javascript">
            function refresh()
            {
                document.forms[0].submit();
            }
        </script>

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Modifica </span> Squadre</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li class="active">Modifica Squadre</li>
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
                                <h4>Modifica Squadre</h4>
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
                                
                                echo form_open_multipart('utente/modifica_squadre', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Seleziona Squadra</label>
                                            <?php $js = 'id="account-city" class="form-control" onChange="refresh()"'; ?>
                                            <?= form_dropdown('cmbSquadra', $Squadre, set_value('cmbSquadra', $this->input->post('cmbSquadra')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            if (is_Array(@$Team)) { ?>
                                                <label for="account-username">Giocatore Venduto</label>
                                                <?php $js = 'id="account-city" class="form-control" onChange="refresh()"'; 
                                                echo form_dropdown('cmbTeam', $Team, set_value('cmbTeam', $this->input->post('cmbTeam')), $js);
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            if (is_Array(@$Giocatori)) { ?>
                                                <label for="account-city">Prezzo vendita</label>
                                                <?php $js = 'id="account-city" class="form-control"'; ?>
                                                <input type="text" class="form-control" value="<?php echo set_value('costo'); ?>" name="costo_uscente" id="account-username" placeholder="Prezzo Vendita...">
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            if (is_Array(@$Giocatori)) { ?>
                                                <label for="account-postcode">Giocatore Acquistato</label>
                                                <?php
                                                echo form_dropdown('cmbGiocatori', $Giocatori, set_value('cmbGiocatori', $this->input->post('cmbGiocatori')), $js);
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            if (is_Array(@$Giocatori)) { ?>
                                                <label for="account-city">Costo Acquisto</label>
                                                <?php $js = 'id="account-city" class="form-control"'; ?>
                                                <input type="text" class="form-control" value="<?php echo set_value('costo'); ?>" name="costo_entrante" id="account-username" placeholder="Costo Acquisto...">
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Conferma modifica" name="but_modifica" class="btn btn-default btn-lg btn-block">
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
