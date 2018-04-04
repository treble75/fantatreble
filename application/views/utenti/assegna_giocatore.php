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
                        <h1 class="page-heading__title"><span class="highlight">Assegna </span> Giocatore</h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li class="active">Assegna Giocatore</li>
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
                                <h4>Assegna Giocatore</h4>
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
                                
                                echo form_open_multipart('utente/assegna_giocatore', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Ruolo</label>
                                            <?php $js = 'id="account-city" class="form-control" onChange="refresh()"'; ?>
                                            <?= form_dropdown('cmbRuoli', $Ruoli, set_value('cmbRuoli', $this->input->post('cmbRuoli')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-username">Giocatori</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbGiocatori', $Giocatori, set_value('cmbGiocatori'), $js) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-city">Squadra</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbSquadra', $Squadre, set_value('cmbSquadra', $this->input->post('cmbSquadra')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Costo</label>
                                            <input type="text" class="form-control" value="<?php echo set_value('costo'); ?>" name="costo" id="account-username" placeholder="Costo giocatore...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <button type="submit" name="but_assegna" class="btn btn-default btn-lg btn-block">Assegna Giocatore</button>
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
