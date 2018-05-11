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
                        <h1 class="page-heading__title"><span class="highlight">Modifica</span> Utente</h1>
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
                                            <a href="<?= base_url('/') ?>index.php/utente/registra_utente" >Registra Utente</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/modifica_utente" >Modifica Utente</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/fantamilioni" >FantaMilioni</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/quote" >Quote</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/news_desktop" >News Desktop</a>
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
                                <h4>Modifica utente</h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('utente/modifica_utente') ?>

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
                                            $js = 'id="account-city" class="form-control" onChange="refresh()"';
                                            ?>
                                            <label for="account-email">Seleziona Utente</label>
                                            <?= form_dropdown('cmbUtente', $Utenti, set_value('cmbUtente', $this->input->post('cmbUtente')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Nome</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['nome'] ?>" name="nome" id="account-first-name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-last-name">Cognome</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['cognome'] ?>" name="cognome" id="account-last-name" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-address-1">Nome Squadra</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['squadra'] ?>" name="squadra" id="account-address-1" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-address-1">Soprannome Utente</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['soprannome'] ?>" name="soprannome" id="account-address-1" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-address-1">Email</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['email'] ?>" name="email" id="account-address-1" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-address-1">Username</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['username'] ?>" name="username" id="account-address-1" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-password">Cambia Password</label>
                                            <input type="password" class="form-control" value="" name="pwd1" id="account-password" placeholder="**********">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-password-repeat">Ripeti Password</label>
                                            <input type="password" class="form-control" value="" name="pwd_utente" id="account-password-repeat" placeholder="**********">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Salva profilo utente" name="but_modifica" class="btn btn-default btn-lg btn-block">
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
