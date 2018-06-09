
        <script type="text/javascript">

            function refresh()
            {
                document.forms[0].submit();
            }
            

            function resetta()
            {
                var e = document.forms[0].elements;

                for (var i = 5; i < 30; i++) {

                    e[i].selectedIndex = 0;

                }

            }


            function check()
            {
                if (document.getElementById("cmbPortieri").selectedIndex == 0) {
                    alert("Non hai schierato il portiere titolare !");
                    return;
                }
                if (document.getElementById("cmbDifensori1").selectedIndex == 0) {
                    alert("Non hai schierato il primo difensore !");
                    return;
                }
                if (document.getElementById("cmbDifensori2").selectedIndex == 0) {
                    alert("Non hai schierato il secondo difensore !");
                    return;
                }
                if (document.getElementById("cmbDifensori3").selectedIndex == 0) {
                    alert("Non hai schierato il terzo difensore !");
                    return;
                }
                if ((document.getElementById("cmbDifensori4") != null) || (document.getElementById("cmbDifensori4") != undefined)) {
                    if (document.getElementById("cmbDifensori4").selectedIndex == 0) {
                    alert("Non hai schierato il quarto difensore !");
                    return;
                    }
                }
                if ((document.getElementById("cmbDifensori5") != null) || (document.getElementById("cmbDifensori5") != undefined)) {
                    if (document.getElementById("cmbDifensori5").selectedIndex == 0) {
                    alert("Non hai schierato il quinto difensore !");
                    return;
                    }
                }
                if (document.getElementById("cmbCentrocampisti1").selectedIndex == 0) {
                    alert("Non hai schierato il primo centrocampista !");
                    return;
                }
                if (document.getElementById("cmbCentrocampisti2").selectedIndex == 0) {
                    alert("Non hai schierato il secondo centrocampista !");
                    return;
                }
                if (document.getElementById("cmbCentrocampisti3").selectedIndex == 0) {
                    alert("Non hai schierato il terzo centrocampista !");
                    return;
                }
                if ((document.getElementById("cmbCentrocampisti4") != null) || (document.getElementById("cmbCentrocampisti4") != undefined)) {
                    if (document.getElementById("cmbCentrocampisti4").selectedIndex == 0) {
                    alert("Non hai schierato il quarto centrocampista !");
                    return;
                    }
                }
                if ((document.getElementById("cmbCentrocampisti5") != null) || (document.getElementById("cmbCentrocampisti5") != undefined)) {
                    if (document.getElementById("cmbCentrocampisti5").selectedIndex == 0) {
                    alert("Non hai schierato il quinto centrocampista !");
                    return;
                    }
                }
                if ((document.getElementById("cmbCentrocampisti6") != null) || (document.getElementById("cmbCentrocampisti6") != undefined)) {
                    if (document.getElementById("cmbCentrocampisti6").selectedIndex == 0) {
                    alert("Non hai schierato il sesto centrocampista !");
                    return;
                    }
                }
                if (document.getElementById("cmbAttaccanti1").selectedIndex == 0) {
                    alert("Non hai schierato il primo attaccante !");
                    return;
                }
                if ((document.getElementById("cmbAttaccanti2") != null) || (document.getElementById("cmbAttaccanti2") != undefined)) {
                    if (document.getElementById("cmbAttaccanti2").selectedIndex == 0) {
                    alert("Non hai schierato il secondo attaccante !");
                    return;
                    }
                }
                if ((document.getElementById("cmbAttaccanti3") != null) || (document.getElementById("cmbAttaccanti3") != undefined)) {
                    if (document.getElementById("cmbAttaccanti3").selectedIndex == 0) {
                    alert("Non hai schierato il terzo attaccante !");
                    return;
                    }
                }
                if (document.getElementById("cmbPortieriP1").selectedIndex == 0) {
                    alert("Non hai schierato il primo portiere in panchina !");
                    return;
                }
                if (document.getElementById("cmbPortieriP2").selectedIndex == 0) {
                    alert("Non hai schierato il secondo portiere in panchina !");
                    return;
                }
                if (document.getElementById("cmbPanchina1").selectedIndex == 0) {
                    alert("Non hai schierato il primo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina2").selectedIndex == 0) {
                    alert("Non hai schierato il secondo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina3").selectedIndex == 0) {
                    alert("Non hai schierato il terzo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina4").selectedIndex == 0) {
                    alert("Non hai schierato il quarto panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina5").selectedIndex == 0) {
                    alert("Non hai schierato il quinto panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina6").selectedIndex == 0) {
                    alert("Non hai schierato il sesto panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina7").selectedIndex == 0) {
                    alert("Non hai schierato il settimo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina8").selectedIndex == 0) {
                    alert("Non hai schierato l'ottavo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina9").selectedIndex == 0) {
                    alert("Non hai schierato il nono panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina10").selectedIndex == 0) {
                    alert("Non hai schierato il decimo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina11").selectedIndex == 0) {
                    alert("Non hai schierato l'undicesimo panchinaro !");
                    return;
                }
                if (document.getElementById("cmbPanchina12").selectedIndex == 0) {
                    alert("Non hai schierato il dodicesimo panchinaro !");
                    return;
                }
                

                if (document.forms[0].cmbPortieri.value == document.forms[0].cmbPortieriP1.value) {
                    alert("Non puoi schierare lo stesso portiere in panchina !");
                    return;
                }


                var e = document.forms[0].elements;
                var g = document.forms[0].elements;
                for (var i = 5; i < 29; i++) {
                    for (var j = 5; j < 30; j++) {
                        if (i != j) {
                            if (e[i].value == g[j].value) {
                                alert("ATTENZIONE ! " + e[i].options[e[i].selectedIndex].text + " è presente 2 volte in formazione !");
                                return;
                            }
                        }
                    }
                }

                document.forms[0].chkButton.value = "Y";
                document.forms[0].submit();
            }

        </script>

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Schiera <span class="highlight">Formazione</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">


                <!-- Single Product Tabbed Content -->
                <div class="product-tabs card card--xlg">
                    <div class="card__header">
                        <h4>Schiera Formazione <?= $_SESSION['squadra'] ?></h4>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content card__content">

                        <!-- Tab: Reviews -->
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-precedenti">

                            <section class="product-tabs__section">

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

                                <header class="product-tabs__header">
                                    <h2>Impostazioni</h2>
                                </header>

                                <!-- Reviews Form -->
                                <!-- <form action="#" class="reviews-form"> -->
                                <?php
                                echo form_open('utente/schiera_formazione', array(
                                    'class' => 'reviews-form'
                                ));
                                ?>
                                <input type="hidden" name="chkButton" value="N" >
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="review-stars">Seleziona una tattica</label>
                                            <?php $js = 'id="review-stars" class="form-control" onChange="refresh();"'; ?>
                                            <?php echo form_dropdown('cmbTattica', $Tattica, set_value('cmbTattica', @$Selezione), $js) ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="review-title">Competizione</label>
                                            <select name="cmbCampionato" id="review-stars" class="form-control">
                                                <option value="1">Campionato e Coppa</option>
                                                <option value="2">Campionato</option>
                                                <option value="3">Coppa</option>
                                            </select>
                                        </div>
                                        <label class="control-label" for="review-title">Criterio di sostituzione</label>
                                        <div class="form-group">
                                            <select name="cmbCriterioSostituzione" id="review-stars" class="form-control">
                                                <option value="1">Ordine Panchina</option>
                                                <option value="2">P-D-C-A</option>
                                                <option value="3">A-C-D-P</option>
                                            </select>
                                        </div>
                                        <label class="control-label" for="review-title">Blocco Formazioni</label>
                                        <div class="form-group">
                                            <?php if (@$blocco == " del //") { ?>
                                                <div class = 'alert alert-warning alert-dismissible'>
                                                    <strong>Non impostato</strong>
                                                </div>
                                                <?php
                                            } else {
                                                echo @$blocco;
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            //DA MODIFICARE - Inserire giornata successiva all'ultima di campionato
                                            $chk = ($giornata == 36) ? 'disabled="disabled"' : '';
                                            ?>
                                            <button type="submit" class="btn btn-default btn-block btn-lg" name="but_svuota" <?= $chk ?> onclick="resetta()" >Svuota Formazione</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                    </div>
                                    
                                    <!-- Tattica 4-4-2 -->
                                    <?php
                                    if (@$Selezione == 1) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori4" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori4', $Difensori, set_value('cmbDifensori4', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti2" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti2', $Attaccanti, set_value('cmbAttaccanti2', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 5-3-2 -->
                                    <?php
                                    if (@$Selezione == 2) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori4" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori4', $Difensori, set_value('cmbDifensori4', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori5" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori5', $Difensori, set_value('cmbDifensori5', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti2" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti2', $Attaccanti, set_value('cmbAttaccanti2', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 3-5-2 -->
                                    <?php
                                    if (@$Selezione == 3) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti5" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti5', $Centrocampisti, set_value('cmbCentrocampisti5', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti2" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti2', $Attaccanti, set_value('cmbAttaccanti2', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 3-4-3 -->
                                    <?php
                                    if (@$Selezione == 4) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti2" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti2', $Attaccanti, set_value('cmbAttaccanti2', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti3" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti3', $Attaccanti, set_value('cmbAttaccanti3', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 4-3-3 -->
                                    <?php
                                    if (@$Selezione == 5) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori4" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori4', $Difensori, set_value('cmbDifensori4', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti2" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti2', $Attaccanti, set_value('cmbAttaccanti2', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti3" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti3', $Attaccanti, set_value('cmbAttaccanti3', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 5-4-1 -->
                                    <?php
                                    if (@$Selezione == 6) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori4" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori4', $Difensori, set_value('cmbDifensori4', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori5" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori5', $Difensori, set_value('cmbDifensori5', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 4-5-1 -->
                                    <?php
                                    if (@$Selezione == 7) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori4" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori4', $Difensori, set_value('cmbDifensori4', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti5" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti5', $Centrocampisti, set_value('cmbCentrocampisti5', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Tattica 3-6-1 -->
                                    <?php
                                    if (@$Selezione == 8) { ?>
                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona il portiere</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbPortieri" class="form-control Portieri"'; ?>
                                                <?php echo form_dropdown('cmbPortieri', $Portieri, set_value('cmbPortieri', @$titolari[0]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i difensori</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori1" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori1', $Difensori, set_value('cmbDifensori1', @$titolari[1]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori2" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori2', $Difensori, set_value('cmbDifensori2', @$titolari[2]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbDifensori3" class="form-control Difensori"'; ?>
                                                <?php echo form_dropdown('cmbDifensori3', $Difensori, set_value('cmbDifensori3', @$titolari[3]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona i centrocampisti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti1" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti1', $Centrocampisti, set_value('cmbCentrocampisti1', @$titolari[4]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti2" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti2', $Centrocampisti, set_value('cmbCentrocampisti2', @$titolari[5]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti3" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti3', $Centrocampisti, set_value('cmbCentrocampisti3', @$titolari[6]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti4" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti4', $Centrocampisti, set_value('cmbCentrocampisti4', @$titolari[7]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="rcmbCentrocampisti5" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti5', $Centrocampisti, set_value('cmbCentrocampisti5', @$titolari[8]['id_giocatore']), $js) ?>
                                            </div>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbCentrocampisti6" class="form-control Centrocampisti"'; ?>
                                                <?php echo form_dropdown('cmbCentrocampisti6', $Centrocampisti, set_value('cmbCentrocampisti6', @$titolari[9]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label" for="review-title">Seleziona gli attaccanti</label>
                                            <div class="form-group">
                                                <?php $js = 'id="cmbAttaccanti1" class="form-control Attaccanti"'; ?>
                                                <?php echo form_dropdown('cmbAttaccanti1', $Attaccanti, set_value('cmbAttaccanti1', @$titolari[10]['id_giocatore']), $js) ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <div class="col-md-5">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="control-label" for="review-title">Seleziona i panchinari</label>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPortieriP1" class="form-control Portieri"'; ?>
                                            <?php echo form_dropdown('cmbPortieriP1', $Portieri, set_value('cmbPortieriP1', @$panchinari[0]['P1']), $js) ?>
                                        </div>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPortieriP2" class="form-control Portieri"'; ?>
                                            <?php echo form_dropdown('cmbPortieriP2', $Portieri, set_value('cmbPortieriP2', @$panchinari[0]['P2']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P3']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina1" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina1', $Giocatori, set_value('cmbPanchina1', @$panchinari[0]['P3']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P4']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina2" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina2', $Giocatori, set_value('cmbPanchina2', @$panchinari[0]['P4']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P5']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina3" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina3', $Giocatori, set_value('cmbPanchina3', @$panchinari[0]['P5']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P6']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina4" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina4', $Giocatori, set_value('cmbPanchina4', @$panchinari[0]['P6']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P7']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina5" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina5', $Giocatori, set_value('cmbPanchina5', @$panchinari[0]['P7']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P8']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina6" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina6', $Giocatori, set_value('cmbPanchina6', @$panchinari[0]['P8']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P9']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina7" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina7', $Giocatori, set_value('cmbPanchina7', @$panchinari[0]['P9']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P10']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina8" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina8', $Giocatori, set_value('cmbPanchina8', @$panchinari[0]['P10']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P11']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina9" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina9', $Giocatori, set_value('cmbPanchina9', @$panchinari[0]['P11']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P12']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina10" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina10', $Giocatori, set_value('cmbPanchina10', @$panchinari[0]['P12']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P13']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina11" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina11', $Giocatori, set_value('cmbPanchina11', @$panchinari[0]['P13']), $js) ?>
                                        </div>
                                        <?php
                                        $role = "";
                                        $role = $this->mdl_team->getNomeRuolo(@$panchinari[0]['P14']);
                                        if ($role == "P") {
                                            $class = "Portieri";
                                        }
                                        if ($role == "D") {
                                            $class = "Difensori";
                                        }
                                        if ($role == "C") {
                                            $class = "Centrocampisti";
                                        }
                                        if ($role == "A") {
                                            $class = "Attaccanti";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php $js = 'id="cmbPanchina12" class="form-control ' . $class . '"'; ?>
                                            <?php echo form_dropdown('cmbPanchina12', $Giocatori, set_value('cmbPanchina12', @$panchinari[0]['P14']), $js) ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                //DA MODIFICARE - Inserire giornata successiva all'ultima di campionato
                                $chk = ($giornata == 36) ? 'disabled="disabled"' : '';
                                ?>
                                <div class="form-group form-group--submit">
                                    <button type="submit" class="btn btn-default btn-block btn-lg" name="but_schiera" <?= $chk ?> onclick="check()" >Schiera Formazione</button>
                                </div>
                                </form>
                                <!-- Reviews Form / End -->

                            </section>

                        </div>
                        <!-- Tab: Reviews / End -->

                    </div>

                </div>
                <!-- Single Product Tabbed Content / End -->
            </div>
        </div>

        <!-- Content / End -->

