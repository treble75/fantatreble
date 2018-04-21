
        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Gestione <span class="highlight">Rigoristi</span></h1>
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
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_voti" >Inserisci Voti</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati" >Inserisci Risultati Campionato</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/utente/inserisci_risultati_Coppe" >Inserisci Risultati Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/aggiorna_coppe" >Aggiorna Coppe</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/blocco" >Blocco Formazioni</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>index.php/home/gestione_rigoristi" >Gestione Rigoristi</a>
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
                                <h4>Gestione Rigoristi</h4>
                            </div>
                            <div class="card__content">
                                <?php echo form_open_multipart('home/gestione_rigoristi') ?>

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
                                            <label for="account-first-name">Seleziona Competizione</label>
                                            <select name="cmbScelta" id="account-city" class="form-control">
                                                <option value="Campionato">Campionato</option>
                                                <option value="Champions League">Champions League</option>
                                                <option value="Coppa Treble">Coppa Treble</option>
                                                <option value="SuperCoppa Treble">SuperCoppa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Seleziona Giornata</label>
                                            <select name="cmbGiornata" id="account-city" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>  
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Squadra in casa</label>
                                            <?php $js = 'id="account-city" class="form-control"'; ?>
                                            <?= form_dropdown('cmbSquadra1', $Squadre, set_value('cmbSquadra1', $this->input->post('cmbSquadra1')), $js) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-first-name">Squadra in Trasferta</label>
                                            <?= form_dropdown('cmbSquadra2', $Squadre, set_value('cmbSquadra2', $this->input->post('cmbSquadra2')), $js) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Attiva Rigoristi" name="but_modifica" class="btn btn-default btn-lg btn-block">
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
