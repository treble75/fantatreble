
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
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
                                            <a href="<?= base_url('/') ?>index.php/utente/profilo" >Informazioni personali</a>
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

                                <div class="col-md-9">
                                    <label for="account-address-1">Seleziona la maglia ufficiale</label>
                                    <div class="form-group form-group--sm">
                                        <input type="radio" name="cmbMaglia" id="inlineRadio1" value="1">
                                        <label for="inlineRadio1"><img src="<?= base_url('/') ?>images/maglie/1.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio2" value="2">
                                        <label for="inlineRadio2"><img src="<?= base_url('/') ?>images/maglie/2.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio3" value="3">
                                        <label for="inlineRadio3"><img src="<?= base_url('/') ?>images/maglie/3.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio4" value="4">
                                        <label for="inlineRadio4"><img src="<?= base_url('/') ?>images/maglie/4.png"></label>
                                    </div>
                                    <div class="form-group form-group--sm">
                                        <input type="radio" name="cmbMaglia" id="inlineRadio5" value="5">
                                        <label for="inlineRadio5"><img src="<?= base_url('/') ?>images/maglie/5.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio6" value="6">
                                        <label for="inlineRadio6"><img src="<?= base_url('/') ?>images/maglie/6.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio7" value="7">
                                        <label for="inlineRadio7"><img src="<?= base_url('/') ?>images/maglie/7.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio8" value="8">
                                        <label for="inlineRadio8"><img src="<?= base_url('/') ?>images/maglie/8.png"></label>
                                    </div>
                                    <div class="form-group form-group--sm">
                                        <input type="radio" name="cmbMaglia" id="inlineRadio9" value="9">
                                        <label for="inlineRadio9"><img src="<?= base_url('/') ?>images/maglie/9.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio10" value="10">
                                        <label for="inlineRadio10"><img src="<?= base_url('/') ?>images/maglie/10.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio11" value="11">
                                        <label for="inlineRadio11"><img src="<?= base_url('/') ?>images/maglie/11.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio12" value="12">
                                        <label for="inlineRadio12"><img src="<?= base_url('/') ?>images/maglie/12.png"></label>
                                    </div>
                                    <div class="form-group form-group--sm">
                                        <input type="radio" name="cmbMaglia" id="inlineRadio13" value="13">
                                        <label for="inlineRadio13"><img src="<?= base_url('/') ?>images/maglie/13.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio14" value="14">
                                        <label for="inlineRadio14"><img src="<?= base_url('/') ?>images/maglie/14.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio15" value="15">
                                        <label for="inlineRadio15"><img src="<?= base_url('/') ?>images/maglie/15.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio16" value="16">
                                        <label for="inlineRadio16"><img src="<?= base_url('/') ?>images/maglie/16.png"></label>
                                    </div>
                                    <div class="form-group form-group--sm">
                                        <input type="radio" name="cmbMaglia" id="inlineRadio17" value="17">
                                        <label for="inlineRadio17"><img src="<?= base_url('/') ?>images/maglie/17.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio18" value="18">
                                        <label for="inlineRadio18"><img src="<?= base_url('/') ?>images/maglie/18.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio19" value="19">
                                        <label for="inlineRadio19"><img src="<?= base_url('/') ?>images/maglie/19.png"></label>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio20" value="20">
                                        <label for="inlineRadio20"><img src="<?= base_url('/') ?>images/maglie/20.png"></label>
                                        <div style="width: 40px;">&nbsp;</div>
                                        <input type="radio" name="cmbMaglia" id="inlineRadio21" value="21">
                                        <label for="inlineRadio21"><img src="<?= base_url('/') ?>images/maglie/21.png"></label>
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
