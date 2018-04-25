
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Seleziona <span class="highlight">Rigoristi</span></h1>
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
                                <h4>Gestione Rigoristi</h4>
                            </div>
                            <div class="card__content">
                                <nav class="df-account-navigation">
                                    <ul>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/rigoristi">Ripristina Rigoristi</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/reset_rigoristi">Resetta Rigoristi</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/selezione_automatica_rigoristi">Selezione Automatica</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Account Navigation / End -->
                    </div>

                    <div class="col-md-8">

                        <?php
                        echo form_open_multipart('utente/reset_confirmed_rigoristi', array(
                            'class' => 'df-personal-info'
                        ));
                        ?>
                        <!-- Personal Information -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Reset Rigoristi</h4>
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
                                <?php }
                                ?>
                            </div>
                            
                            <div class="alert alert-warning">
                                <input type="submit" value="Conferma Reset" name="but_reset_rigoristi" class="btn btn-xs btn-default btn-outline alert-btn-right">
                                <input type="submit" value="Annulla" name="but_annulla" class="btn btn-xs btn-default btn-outline alert-btn-right">
                                <strong>Confermi il reset dei rigoristi ?</strong>
                            </div>
                            
                        </div>
                        <!-- Personal Information / End -->
                        
                        </form>

                    </div>

                </div>

            </div>
        </div>

        <!-- Content / End -->
