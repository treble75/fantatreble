
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Inserisci</span> Voti</h1>
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
                                            <a href="<?= base_url('/') ?>utente/inserisci_voti" >Inserisci Voti</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/inserisci_risultati" >Inserisci Risultati Campionato</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/inserisci_risultati_Coppe" >Inserisci Risultati Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>home/aggiorna_coppe" >Aggiorna Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>home/blocco" >Blocco Formazioni</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>home/gestione_rigoristi" >Gestione Rigoristi</a>
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
                                <h4>Inserisci Voti Giornata n° <?= $_SESSION['giornata'] ?></h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('utente/inserisci_voti') ?>

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

                                <!--- VOTO PORTIERI ---> 

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Portiere</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', $this->input->post('cmbPortieri')), $js);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account-first-name">Voto Portiere</label>
                                            <input type="text" class="form-control" value="" name="txtVotoP" id="account-username" placeholder="Voto...">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Fatti</label>
                                            <select name="GolP" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Assist</label>
                                            <select name="AssistP" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/ammo.png" /></label>
                                            <select name="AmmoP" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/espu.png" /></label>
                                            <select name="EspuP" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Parati</label>
                                            <select name="RigParP" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Errati</label>
                                            <select name="RigSbaP" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Autogol</label>
                                            <select name="AutogolP" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Subiti</label>
                                            <select name="Golsubiti" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Voto Portiere" name="but_vota1" class="btn btn-default btn-lg btn-block">
                                </div>

                                <div class="spacer"></div>
                                <!--- VOTO DIFENSORI ---> 

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Difensore</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            echo form_dropdown('cmbDifensori', $Difensori, set_value('cmbDifensori', $this->input->post('cmbDifensori')), $js);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account-first-name">Voto Difensore</label>
                                            <input type="text" class="form-control" value="" name="txtVotoD" id="account-username" placeholder="Voto...">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Fatti</label>
                                            <select name="GolD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Assist</label>
                                            <select name="AssistD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/ammo.png" /></label>
                                            <select name="AmmoD" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/espu.png" /></label>
                                            <select name="EspuD" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Parati</label>
                                            <select name="RigParD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Errati</label>
                                            <select name="RigSbaD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Autogol</label>
                                            <select name="AutogolD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Subiti</label>
                                            <select name="GolsubitiD" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Voto Difensore" name="but_vota2" class="btn btn-default btn-lg btn-block">
                                </div>

                                <div class="spacer"></div>
                                <!--- VOTO CENTROCAMPISTI ---> 

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Centrocampista</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            echo form_dropdown('cmbCentrocampisti', $Centrocampisti, set_value('cmbCentrocampisti', $this->input->post('cmbCentrocampisti')), $js);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account-first-name">Voto Centrocampista</label>
                                            <input type="text" class="form-control" value="" name="txtVotoC" id="account-username" placeholder="Voto...">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Fatti</label>
                                            <select name="GolC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Assist</label>
                                            <select name="AssistC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/ammo.png" /></label>
                                            <select name="AmmoC" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/espu.png" /></label>
                                            <select name="EspuC" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Parati</label>
                                            <select name="RigParC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Errati</label>
                                            <select name="RigSbaC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Autogol</label>
                                            <select name="AutogolC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Subiti</label>
                                            <select name="GolsubitiC" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Voto Centrocampista" name="but_vota3" class="btn btn-default btn-lg btn-block">
                                </div>

                                <div class="spacer"></div>
                                <!--- VOTO ATTACCANTI ---> 

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Attaccante</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control"';
                                            echo form_dropdown('cmbAttaccanti', $Attaccanti, set_value('cmbAttaccanti', $this->input->post('cmbAttaccanti')), $js);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account-first-name">Voto Attaccante</label>
                                            <input type="text" class="form-control" value="" name="txtVotoA" id="account-username" placeholder="Voto...">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Fatti</label>
                                            <select name="GolA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Assist</label>
                                            <select name="AssistA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/ammo.png" /></label>
                                            <select name="AmmoA" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name"><img src="<?= base_url('/') ?>images/espu.png" /></label>
                                            <select name="EspuA" <?= $js ?> >
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Parati</label>
                                            <select name="RigParA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Rigori Errati</label>
                                            <select name="RigSbaA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Autogol</label>
                                            <select name="AutogolA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="account-first-name">Gol Subiti</label>
                                            <select name="GolsubitiA" <?= $js ?> >
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Inserisci Voto Attaccante" name="but_vota4" class="btn btn-default btn-lg btn-block">
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
