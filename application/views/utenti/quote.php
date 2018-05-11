
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Quote</span></h1>
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
                                <h4>Quote</h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('utente/quote') ?>

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

                                <?php
                                $cassa       = 0.00;
                                $quota       = 135.00;
                                foreach ($debiti as $row) {
                                    $utente = $this->mdl_utenti->getDatiUtente($row['id_utente']);
                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-first-name" style="color: #1892ED"><?= $utente[0]['nome'] . " " . $utente[0]['cognome'] ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-first-name">€ <?= replace($row['debito']) ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $cassa += number_format(($quota - $row['debito']), 2);
                                }
                                ?>
                                
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-first-name" style="color: #1892ED">In cassa : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-first-name" style="color: #009900">€ <?= replace(number_format($cassa, 2)) ?></label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Utente/Squadra</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            echo form_dropdown('cmbSquadra', $Squadre, set_value('cmbSquadra', $this->input->post('cmbSquadra')), $js)
                                            ?>
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
                                            <label for="account-first-name">Tipologia Movimento</label>
                                            <select name="cmbDebito" <?= $js ?> >
                                                <option value="0">Aggiungi Debito</option>
                                                <option value="1">Sottrai dal Debito</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-address-1">Quota</label>
                                            <input type="text" class="form-control" value="" name="txtDebito" id="account-address-1" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Conferma Movimento" name="but_debito" class="btn btn-default btn-lg btn-block">
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
