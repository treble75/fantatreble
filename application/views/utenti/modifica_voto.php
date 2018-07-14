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
                        <h1 class="page-heading__title">Modifica <span class="highlight">Voto</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>home/homepage">Home</a></li>
                            <li class="active">Modifica Voto</li>
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
                                            <a href="<?= base_url('/') ?>utente/crea_giocatore">Crea Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/assegna_giocatore">Assegna Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/modifica_giocatore">Modifica Giocatore</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/modifica_squadre">Modifica Squadre</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/esegui_scambio">Esegui Scambio</a>
                                        </li>
                                        <li class="df-account-navigation__link">
                                            <a href="<?= base_url('/') ?>utente/modifica_voto">Modifica Voto</a>
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
                                <h4>Modifica Voto</h4>
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

                                echo form_open_multipart('utente/modifica_voto', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">Seleziona Ruolo</label>
                                            <?php
                                            $js = 'id="account-city" class="form-control" onChange="refresh()"';
                                            echo form_dropdown('cmbRuoli', $Ruoli, set_value('cmbRuoli', $this->input->post('cmbRuoli')), $js)
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-username">Seleziona Giocatore</label>
                                            <?php $js = 'id="account-city" class="form-control" onChange="refresh()"'; ?>
                                            <?= form_dropdown('cmbGiocatori', $Giocatori, set_value('cmbGiocatori'), $js) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-city">Seleziona Giornata</label>
                                            <select name="cmbGiornata" id="account-city" class="form-control" onChange="refresh()">
                                                <option value="<?= @$this->input->post('cmbGiornata') ?>" selected="selected"><?= @$this->input->post('cmbGiornata') ?></option>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Voto</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['voto'] ?>" name="voto" id="account-username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">FantaVoto</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['fantavoto'] ?>" name="fanta_voto" id="account-username">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Gol Realizzati</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['gol'] ?>" name="gol" id="account-username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Assist</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['assist'] ?>" name="assist" id="account-username">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Ammonizioni</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['ammonizioni'] ?>" name="ammonizioni" id="account-username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Espulsioni</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['espulsioni'] ?>" name="espulsioni" id="account-username">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Rigori Parati</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['rigore_parato'] ?>" name="rigore_parato" id="account-username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Rigori Sbagliati</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['rigore_sbagliato'] ?>" name="rigore_sbagliato" id="account-username">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Autogol</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['autogol'] ?>" name="autogol" id="account-username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Gol Subiti</label>
                                            <input type="text" class="form-control" value="<?= @$Voti[0]['gol_subiti'] ?>" name="gol_subiti" id="account-username">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-postcode">Schierato in Campo</label>
                                            <select name="cmbSchierato" id="account-city" class="form-control" >
                                                <option value="<?= @$Voti[0]['schierato'] ?>" selected="selected">
                                                    <?php
                                                    if (@$Voti[0]['schierato'] == 0) {
                                                        echo "NO";
                                                    }
                                                    if (@$Voti[0]['schierato'] == 1) {
                                                        echo "SI";
                                                    }
                                                    ?>
                                                </option>
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                </div>

                                <div class="form-group--submit">
                                    <input type="submit" value="Modifica Voto" name="but_modifica" class="btn btn-default btn-lg btn-block">
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
