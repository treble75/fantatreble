
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

                        <!-- Personal Information -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Seleziona i tuoi Rigoristi</h4>
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
                                
                                echo form_open_multipart('utente/reset_confirmed_rigoristi', array(
                                    'class' => 'df-personal-info'
                                ));
                                ?>
                                
                                <?php
                                //Se i rigoristi sono già stati selezionati almeno una volta li visualizzo
                                if (is_array(@$rigoristi) && count(@$rigoristi) > 0) {
                                    ?>
                                    <div class="alert alert-warning">
                                        <strong>Conferma</strong>
                                        <input type="submit" value="Conferma Reset" name="but_reset_rigoristi" class="btn btn-xs btn-default btn-outline alert-btn-right">
                                    </div>
                                    <div class="alert alert-danger">
                                        <strong>Annulla</strong>
                                        <input type="submit" value="Annulla operazione" name="but_annulla" class="btn btn-xs btn-default btn-outline alert-btn-right">
                                    </div>
                                
                                    <?php
                                    $n = 1;
                                    $c = 1;
                                    
                                    foreach (@$rigoristi as $key => $row) {
                                    ?>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-email">Seleziona Rigorista <?= $c ?></label>
                                                    <?php 
                                                    $js = 'id="account-city" class="form-control"'; 
                                                    //Verifico che il rigorista selezionato appartenga ancora all'utente
                                                    $chk = $this->mdl_utenti->checkRigorista($key, $_SESSION['id_utente']);
                                                    
                                                    if ($chk) {
                                                        $role = "";
                                                        $role = $this->mdl_team->getNomeRuolo(@$key);
                                                        if ($role == "P") {
                                                            $class = "background-color: rgba(249,52,105,.5);";
                                                        }
                                                        if ($role == "D") {
                                                            $class = "background-color: rgba(252,116,34,.5);";
                                                        }
                                                        if ($role == "C") {
                                                            $class = "background-color: rgba(20,134,244,.5);";
                                                        }
                                                        if ($role == "A") {
                                                            $class = "background-color: rgba(25,157,91,.5);";
                                                        }
                                                        $style = "id='account-city' class='form-control' style = 'font-size: 14px; color: white; ". $class ."' ";
                                                        echo form_dropdown('cmbRigorista' . $c, $rigoristi, $key, $style);
                                                    } else {
                                                        $n = 0;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                
                                <?php
                                    $c++;
                                    }
                                    
                                } else { ?>
                                    <div class = 'alert alert-warning alert-dismissible'>
                                        <strong>Devi impostare i rigoristi per la prima volta</strong>
                                    </div>
                                <?php
                                    $c = 1;
                                    foreach ($formazione as $key => $row) { ?>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-email">Seleziona Rigorista <?= $c ?></label>
                                                    <?php 
                                                    $js = 'id="account-city" class="form-control"'; 
                                                    //Verifico che il rigorista selezionato appartenga ancora all'utente
                                                    $chk = $this->mdl_utenti->checkRigorista($key, $_SESSION['id_utente']);
                                                    
                                                    $role = "";
                                                    $role = $this->mdl_team->getNomeRuolo(@$key);
                                                    if ($role == "P") {
                                                        $class = "background-color: rgba(249,52,105,.5);";
                                                    }
                                                    if ($role == "D") {
                                                        $class = "background-color: rgba(252,116,34,.5);";
                                                    }
                                                    if ($role == "C") {
                                                        $class = "background-color: rgba(20,134,244,.5);";
                                                    }
                                                    if ($role == "A") {
                                                        $class = "background-color: rgba(25,157,91,.5);";
                                                    }
                                                    $style = "id='account-city' class='form-control' style = 'font-size: 14px; color: white; ". $class ."' ";
                                                    echo form_dropdown('cmbRigorista' . $c, $formazione, $key, $style);
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $c++;
                                    }
                                    ?>
                                        
                                <?php  
                                }
                                ?>

                                </form>
                            </div>
                        </div>
                        <!-- Personal Information / End -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Content / End -->
