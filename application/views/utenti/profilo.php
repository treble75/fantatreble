
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-profilo">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Profilo</span> Utente</h1>
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
                                <h4>Bentornato <?= $_SESSION['utente'] ?> !</h4>
                            </div>
                            <div class="card__content">
                                <nav class="df-account-navigation">
                                    <ul>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/profilo" >Informazioni personali</a>
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
                                <h4>Informazioni personali</h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('utente/profilo') ?>

                                <?php if (validation_errors()) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong><?= validation_errors(); ?></strong>
                                    </div>
                                    <?php
                                }
                                if (@$message) {
                                    ?>
                                    <div class="alert alert-success">
                                        <strong><?= @$message ?></strong>
                                    </div>
                                    <?php
                                }
                                ?>  

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Email</label>
                                            <input type="email" class="form-control" value="<?= @$dettagliUtente[0]['email'] ?>" name="email" id="account-email" placeholder="tuamail@tuamail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-username">Username</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['username'] ?>" name="username" id="account-username" placeholder="username">
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Nome</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['nome'] ?>" name="nome" id="account-first-name" disabled="disabled" placeholder="nome...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-last-name">Cognome</label>
                                            <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['cognome'] ?>" name="cognome" id="account-last-name" disabled="disabled" placeholder="cognome...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group--sm">
                                    <label for="account-address-1">Nome Squadra</label>
                                    <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['squadra'] ?>" name="squadra" id="account-address-1" disabled="disabled" placeholder="nome squadra...">
                                </div>

                                <div class="form-group form-group--sm">
                                    <label for="account-address-1">Soprannome Utente</label>
                                    <input type="text" class="form-control" value="<?= @$dettagliUtente[0]['soprannome'] ?>" name="soprannome" id="account-address-1" placeholder="soprannome...">
                                </div>

                                <div class="col-md-6">
                                    <label for="account-address-1">Seleziona la maglia ufficiale</label>
                                    <div class="form-group form-group--sm">
                                        
                                            <?php
                                            foreach ($maglie as $row) { ?>
                                                <div class="form-group">
                                                    <input type="radio" name="cmbMaglia" id="inlineRadio<?= $row['id_maglia'] ?>" value="<?= $row['id_maglia'] ?>">
                                                    <label for="inlineRadio<?= $row['id_maglia'] ?>"><img src="<?= base_url('/') ?>images/maglie/<?= $row['id_maglia'] ?>.png"></label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <button type="submit" name="but_modifica" class="btn btn-default btn-lg btn-block">Salva profilo utente</button>
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
