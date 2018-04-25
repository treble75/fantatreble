

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Albo <span class="highlight">D'Oro</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/albo_statistiche" class="content-filter__link"><small>Albo d'oro</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo" class="content-filter__link"><small>Albo d'oro</small>Treble League</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_champions" class="content-filter__link"><small>Albo d'oro</small>Champions League</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_coppa" class="content-filter__link"><small>Albo d'oro</small>Coppa Treble</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_supercoppa" class="content-filter__link"><small>Albo d'oro</small>SuperCoppa Treble</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">


                <!-- Single Product Tabbed Content -->
                <div class="product-tabs card card--xlg">
                    <div class="card__header">
                        <h4>Statistiche</h4>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-precedenti" role="tab" data-toggle="tab"><small>Statistiche</small>Precedenti Storici</a></li>
                        <li role="presentation"><a href="#tab-desciption" role="tab" data-toggle="tab"><small>Product</small>Full Description</a></li>
                        <li role="presentation"><a href="#tab-info" role="tab" data-toggle="tab"><small>Product</small>Additional Information</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content card__content">

                        <!-- Tab: Reviews -->
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-precedenti">

                            <section class="product-tabs__section">

                                <header class="product-tabs__header">
                                    <h2>Precedenti Storici</h2>
                                </header>

                                <!-- Reviews Form -->
                                <!-- <form action="#" class="reviews-form"> -->
                                <?php
                                echo form_open('home/albo_statistiche', array(
                                    'class' => 'reviews-form'
                                ));
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="review-stars">Seleziona una squadra</label>
                                            <?php $js = 'id="review-stars" class="form-control"'; ?>
                                            <?php echo form_dropdown('cmbStoricoSquadre1', $combo_storico_squadre, set_value('cmbStoricoSquadre1'), $js) ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="review-title">Seleziona la squadra sfidante</label>
                                            <?php $js = 'id="review-stars" class="form-control"'; ?>
                                            <?php echo form_dropdown('cmbStoricoSquadre2', $combo_storico_squadre, set_value('cmbStoricoSquadre2'), $js) ?>
                                        </div>
                                        <label class="control-label" for="review-title">Seleziona per : </label>
                                        <?php
                                        $chk1 = "";
                                        $chk2 = "";
                                        if ($radio == "squadra") {
                                            $chk1 = "checked";
                                        }
                                        if ($radio == "utente") {
                                            $chk2 = "checked";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label class="radio radio-inline">
                                                <input type="radio" name="SelPrecedente" id="inlineRadio1" value="squadra" <?= $chk1 ?> >Squadra
                                                <span class="radio-indicator"></span>
                                            </label>
                                            <label class="radio radio-inline">
                                                <input type="radio" name="SelPrecedente" id="inlineRadio2" value="utente" <?= $chk2 ?> >Utente
                                                <span class="radio-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="review-title">Elenco squadre partecipanti al fantatreble</label>
                                        <div class="form-group">
                                            <ol class="list">
                                                <?php
                                                foreach ($storico_squadre as $row) {
                                                    ?>
                                                    <li>
                                                        <label class="radio radio-inline" style='width: 45%; color: #1892ED;'>
                                                            <?= $row['squadra'] ?>
                                                        </label>
                                                        <label class="radio radio-inline">
                                                            <small><?= $row['nome'] . " " . $row['cognome'] ?></small>
                                                        </label>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ol>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group--submit">
                                    <button type="submit" class="btn btn-default btn-block btn-lg">Cerca tra i precedenti</button>
                                </div>
                                </form>
                                <!-- Reviews Form / End -->

                            </section>

                        </div>
                        <!-- Tab: Reviews / End -->

                        <!-- Tab: Description -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-desciption">

                            <header class="product-tabs__header">
                                <h2>Product Full Description</h2>
                            </header>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis eder nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <div class="spacer"></div>

                            <h4>US and International Sneaker Size</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <div class="spacer"></div>

                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Icobox -->
                                    <div class="icobox icobox--center">
                                        <div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
                                            <i class="icon-badge"></i>
                                        </div>
                                        <div class="icobox__content">
                                            <h4 class="icobox__title icobox__title--lg">Quality Assurance</h4>
                                            <div class="icobox__description">
                                                Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Icobox / End -->
                                </div>
                                <div class="col-md-4">
                                    <!-- Icobox -->
                                    <div class="icobox icobox--center">
                                        <div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
                                            <i class="icon-energy"></i>
                                        </div>
                                        <div class="icobox__content">
                                            <h4 class="icobox__title icobox__title--lg">Ultra Durability</h4>
                                            <div class="icobox__description">
                                                Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Icobox / End -->
                                </div>
                                <div class="col-md-4">
                                    <!-- Icobox -->
                                    <div class="icobox icobox--center">
                                        <div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
                                            <i class="icon-like"></i>
                                        </div>
                                        <div class="icobox__content">
                                            <h4 class="icobox__title icobox__title--lg">Super Comfort</h4>
                                            <div class="icobox__description">
                                                Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Icobox / End -->
                                </div>
                            </div>


                        </div>
                        <!-- Tab: Description / End -->

                        <!-- Tab: Shipping -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-info">

                            <header class="product-tabs__header">
                                <h2>Additional Information</h2>
                            </header>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

                            <div class="spacer"></div>

                            <h4>About Our Sneakers</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis eder nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


                        </div>
                        <!-- Tab: Shipping / End -->

                    </div>

                </div>
                <!-- Single Product Tabbed Content / End -->

                <?php
                echo @$message;
                //Inizializzo totali
                $parzialeSC = 0;
                $parzialeCO = 0;
                $parzialeCH = 0;
                $parzialeTL = 0;
                $parzVSC1 = 0;
                $parzNSC1 = 0;
                $parzPSC1 = 0;
                $parzVSC2 = 0;
                $parzNSC2 = 0;
                $parzPSC2 = 0;
                $parzVCO1 = 0;
                $parzNCO1 = 0;
                $parzPCO1 = 0;
                $parzVCO2 = 0;
                $parzNCO2 = 0;
                $parzPCO2 = 0;
                $parzVCH1 = 0;
                $parzNCH1 = 0;
                $parzPCH1 = 0;
                $parzVCH2 = 0;
                $parzNCH2 = 0;
                $parzPCH2 = 0;
                $parzVTL1 = 0;
                $parzNTL1 = 0;
                $parzPTL1 = 0;
                $parzVTL2 = 0;
                $parzNTL2 = 0;
                $parzPTL2 = 0;
                $golSC1 = 0;
                $golSC2 = 0;
                $golCO1 = 0;
                $golCO2 = 0;
                $golCH1 = 0;
                $golCH2 = 0;
                $golTL1 = 0;
                $golTL2 = 0;

                if ($check == 1) {
                    ?>

                    <!-- Related Products -->
                    <div class="card card--clean">
                        <header class="card__header">
                            <h4>Precedenti storici fra <span style="color: #1892ED;"><?= @$squadra1 ?></span> e <span style="color: #9edb00;"><?= @$squadra2 ?></span> </h4>
                        </header>
                        <div class="card__content">

                            <?php
                            if (is_array(@$supercoppa2017_18) && count(@$supercoppa2017_18) > 0) {
                                $parzialeSC += count(@$supercoppa2017_18);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($supercoppa2017_18 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2017-18</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/supercoppa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18  / End -->

                                <?php
                            }

                            if (is_array(@$coppa2017_18) && count(@$coppa2017_18) > 0) {
                                $parzialeCO += count(@$coppa2017_18);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($coppa2017_18 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2017-18</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18  / End -->

                                <?php
                            }

                            if (is_array(@$champions2017_18) && count(@$champions2017_18) > 0) {
                                $parzialeCH += count(@$champions2017_18);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($champions2017_18 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2017-18</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18  / End -->

                                <?php
                            }

                            if (is_array(@$precedenti2017_18) && count(@$precedenti2017_18) > 0) {
                                $parzialeTL += count(@$precedenti2017_18);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach (@$precedenti2017_18 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2017-18</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div
                                                                class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2017-18") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2017-18  / End -->

                                <?php
                            }

                            if (is_array(@$supercoppa2016_17) && count(@$supercoppa2016_17) > 0) {
                                $parzialeSC += count(@$supercoppa2016_17);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($supercoppa2016_17 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2016-17</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        //Parziali riferiti sempre a squadra1, per squadra2 li ribalto
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC1 += 1;
                                                                }
                                                                $golSC1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNSC2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPSC2 += 1;
                                                                }
                                                                $golSC2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/supercoppa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17  / End -->

                                <?php
                            }

                            if (is_array(@$coppa2016_17) && count(@$coppa2016_17) > 0) {
                                $parzialeCO += count(@$coppa2016_17);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($coppa2016_17 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2016-17</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$champions2016_17) && count(@$champions2016_17) > 0) {
                                $parzialeCH += count(@$champions2016_17);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($champions2016_17 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2016-17</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2016_17) && count(@$precedenti2016_17)) {
                                $parzialeTL += count(@$precedenti2016_17);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2016_17 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2016-17</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2016-17") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2016-17  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$coppa2015_16) && count(@$coppa2015_16) > 0) {
                                $parzialeCO += count(@$coppa2015_16);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($coppa2015_16 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2015-16</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO1 += 1;
                                                                }
                                                                $golCO1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCO2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCO2 += 1;
                                                                }
                                                                $golCO2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/coppa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$champions2015_16) && count(@$champions2015_16) > 0) {
                                $parzialeCH += count(@$champions2015_16);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($champions2015_16 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2015-16</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH1 += 1;
                                                                }
                                                                $golCH1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNCH2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPCH2 += 1;
                                                                }
                                                                $golCH2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/uefa.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2015_16) && count(@$precedenti2015_16)) {
                                $parzialeTL += count(@$precedenti2015_16);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2015_16 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2015-16</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2015-16") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2015-16  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2014_15) && count(@$precedenti2014_15)) {
                                $parzialeTL += count(@$precedenti2014_15);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2014-15 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2014_15 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2014-15</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2014-15") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2014-15") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2014-15") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2014-15")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2014-15")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2014-15")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2014-15")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2014-15")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2014-15")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2014-15")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2014-15")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2014-15") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2014-15") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2014-15") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2012-13  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2013_14) && count(@$precedenti2013_14)) {
                                $parzialeTL += count(@$precedenti2013_14);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2012-13 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2013_14 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2013-14</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2013-14") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2013-14") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2013-14") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2013-14")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2013-14")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2013-14")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2013-14")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2013-14")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2013-14")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2013-14")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2013-14")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>    
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2013-14") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2013-14") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2013-14") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2012-13  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2012_13) && count(@$precedenti2012_13)) {
                                $parzialeTL += count(@$precedenti2012_13);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2012-13 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2012_13 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2012-13</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2012-13") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2012-13") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2012-13") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2012-13")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2012-13")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2012-13")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2012-13")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2012-13")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2012-13")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2012-13")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2012-13")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2012-13") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2012-13") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2012-13") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2012-13  / End -->

                                <?php
                            }
                            ?>

                            <?php
                            if (is_array(@$precedenti2011_12) && count(@$precedenti2011_12)) {
                                $parzialeTL += count(@$precedenti2011_12);
                                ?>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2011-12 -->
                                <div class="card card--has-table">

                                    <div class="table-responsive">
                                        <table class="table table-hover team-result">
                                            <thead>
                                                <tr>
                                                    <th class="team-result__date" style="width: 14%">Data</th>
                                                    <th class="team-result__status" style="width: 14%">Stagione</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__score" style="width: 12%">Risultato</th>
                                                    <th class="team-result__status" style="width: 22%">&nbsp;</th>
                                                    <th class="team-result__fouls" style="width: 16%">Competizione</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Generazione Calendario  --->

                                                <?php
                                                foreach ($precedenti2011_12 as $row) {
                                                    ?>

                                                    <tr>
                                                        <td class="team-result__date" style="width: 14%"><?= dataSettimanale($row['data']) ?></td>
                                                        <td class="team-result__status" style="width: 14%">2011-12</td>
                                                        <td class="team-result__status" style="width: 22%">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id1'], "2011-12") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2011-12") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2011-12") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <?php
                                                        if ($radio == "squadra") {
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2011-12")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2011-12")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2011-12")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2011-12")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        if ($radio == "utente") {
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2011-12")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato1'];
                                                            }
                                                            if ($squadra1 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2011-12")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL1 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL1 += 1;
                                                                }
                                                                $golTL1 += $row['risultato2'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2011-12")) {
                                                                if ($row['risultato1'] > $row['risultato2']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] == $row['risultato2']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato1'] < $row['risultato2']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato1'];
                                                            }
                                                            if ($squadra2 == $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2011-12")) {
                                                                if ($row['risultato2'] > $row['risultato1']) {
                                                                    $parzVTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] == $row['risultato1']) {
                                                                    $parzNTL2 += 1;
                                                                }
                                                                if ($row['risultato2'] < $row['risultato1']) {
                                                                    $parzPTL2 += 1;
                                                                }
                                                                $golTL2 += $row['risultato2'];
                                                            }
                                                        }
                                                        ?>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2011-12") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2011-12") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $this->mdl_utenti->getLogoStorico($row['id2'], "2011-12") ?>">
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__fouls" align='center' style="width: 16%; text-align: center;"><div class="team-meta" style="text-align: center;">

                                                                <figure class="team-meta__logoCalendar">
                                                                    <img src="<?= base_url('/') ?>images/scudetto.png" width="20px" />
                                                                </figure>

                                                        </td>
                                                    </tr>

                                                    <!-- Generazione Calendario / END  --->
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- PARTITE DEI PRECEDENTI STORICI 2011-12  / End -->

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <!-- Related Products / End -->


                    <!-- Statistiche precedenti -->

                    <!-- Content -->
                    <div class="content col-md-8">

                        <!-- Game Scoreboard -->
                        <div class="card">
                            <header class="card__header card__header--has-btn">
                                <h4>Statistiche precedenti storici</h4>
                            </header>
                            <div class="card__content">

                                <!-- Game Result -->
                                <div class="game-result">
                                    <section class="game-result__section pt-0">
                                        <div class="game-result__content">

                                            <!-- 1st Team -->
                                            <div class="game-result__team game-result__team--first">
                                                <figure class="game-result__team-logo">
                                                    <?php
                                                    if ($radio == "squadra") {
                                                        if (file_exists("images/albo/logo/" . $this->mdl_utenti->getImmagine($team1, $radio))) {
                                                            $filename = $this->mdl_utenti->getImmagine($team1, $radio);
                                                        } else {
                                                            $filename = "dummy.png";
                                                        }
                                                        ?>
                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $filename ?>" alt="">
                                                        <?php
                                                    }
                                                    if ($radio == "utente") {
                                                        if (file_exists("images/albo/utenti/" . $this->mdl_utenti->getImmagine($team1, $radio))) {
                                                            $filename = $this->mdl_utenti->getImmagine($team1, $radio);
                                                        } else {
                                                            $filename = "dummy.png";
                                                        }
                                                        ?>
                                                        <img src="<?= base_url('/') ?>images/storico/utenti/<?= $filename ?>" alt="">
                                                        <?php
                                                    }
                                                    ?>
                                                </figure>
                                                <div class="game-result__team-info">
                                                    <h5 class="game-result__team-name" style="color: #1892ED;"><?= $squadra1 ?></h5>
                                                </div>
                                            </div>
                                            <!-- 1st Team / End -->

                                            <!-- 2nd Team -->
                                            <div class="game-result__team game-result__team--second">
                                                <figure class="game-result__team-logo">
                                                    <?php
                                                    if ($radio == "squadra") {
                                                        if (file_exists("images/albo/logo/" . $this->mdl_utenti->getImmagine($team2, $radio))) {
                                                            $filename = $this->mdl_utenti->getImmagine($team2, $radio);
                                                        } else {
                                                            $filename = "dummy.png";
                                                        }
                                                        ?>
                                                        <img src="<?= base_url('/') ?>images/storico/logo/<?= $filename ?>" alt="">
                                                        <?php
                                                    }
                                                    if ($radio == "utente") {
                                                        if (file_exists("images/albo/utenti/" . $this->mdl_utenti->getImmagine($team2, $radio))) {
                                                            $filename = $this->mdl_utenti->getImmagine($team2, $radio);
                                                        } else {
                                                            $filename = "dummy.png";
                                                        }
                                                        ?>
                                                        <img src="<?= base_url('/') ?>images/storico/utenti/<?= $filename ?>" alt="">
                                                        <?php
                                                    }
                                                    ?>
                                                </figure>
                                                <div class="game-result__team-info">
                                                    <h5 class="game-result__team-name" style="color: #9edb00;"><?= $squadra2 ?></h5>
                                                </div>
                                            </div>
                                            <!-- 2nd Team / End -->
                                        </div>
                                    </section>
                                    <?php
                                    //Calcolo totali incontri precedenti
                                    $totaleSC = @$parzialeSC;
                                    $totaleCO = @$parzialeCO;
                                    $totaleCH = @$parzialeCH;
                                    $totaleTL = @$parzialeTL;
                                    $TOTALE = (@$parzialeSC + @$parzialeCO + @$parzialeCH + @$parzialeTL);

                                    $TOTALEV1 = (@$parzVSC1 + @$parzVCO1 + @$parzVCH1 + @$parzVTL1);
                                    $TOTALEN1 = (@$parzNSC1 + @$parzNCO1 + @$parzNCH1 + @$parzNTL1);
                                    $TOTALEP1 = (@$parzPSC1 + @$parzPCO1 + @$parzPCH1 + @$parzPTL1);
                                    $TOTALEV2 = (@$parzVSC2 + @$parzVCO2 + @$parzVCH2 + @$parzVTL2);
                                    $TOTALEN2 = (@$parzNSC2 + @$parzNCO2 + @$parzNCH2 + @$parzNTL2);
                                    $TOTALEP2 = (@$parzPSC2 + @$parzPCO2 + @$parzPCH2 + @$parzPTL2);

                                    $GOLTOTALI1 = (@$golSC1 + @$golCO1 + @$golCH1 + @$golTL1);
                                    $GOLTOTALI2 = (@$golSC2 + @$golCO2 + @$golCH2 + @$golTL2);
                                    ?>
                                    <section class="game-result__section">
                                        <header class="game-result__subheader card__subheader">
                                        </header>
                                        <div class="game-result__content mb-0">
                                            <div class="game-result__stats">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6 col-md-push-3">
                                                        <div class="game-result__table-stats game-result__table-stats--soccer">
                                                            <table class="table table-wrap-bordered table-thead-color">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="3">Precedenti</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?= $TOTALE ?></td>
                                                                        <td>Totali</td>
                                                                        <td><?= $TOTALE ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $totaleTL ?></td>
                                                                        <td>Treble League</td>
                                                                        <td><?= $totaleTL ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $totaleCH ?></td>
                                                                        <td>Champions League</td>
                                                                        <td><?= $totaleCH ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $totaleCO ?></td>
                                                                        <td>Coppa Treble</td>
                                                                        <td><?= $totaleCO ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $totaleSC ?></td>
                                                                        <td>SuperCoppa Treble</td>
                                                                        <td><?= $totaleSC ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-md-3 col-md-pull-6 game-result__stats-team-1">

                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <?php
                                                                    $positivi1 = ($TOTALEV1 + $TOTALEN1);
                                                                    $percPositivi1 = (100 * $positivi1);
                                                                    $percPositivi1 = ($percPositivi1 / $TOTALE);
                                                                    ?>
                                                                    <div class="circular__bar" data-percent="<?= number_format($percPositivi1, 1) ?>">
                                                                        <span class="circular__percents"><?= number_format($percPositivi1, 1) ?><small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Risultati<br> Positivi</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <?php
                                                                    $percNegativi1 = (100 * $TOTALEP1);
                                                                    $percNegativi1 = ($percNegativi1 / $TOTALE);
                                                                    ?>
                                                                    <div class="circular__bar" data-percent="<?= number_format($percNegativi1, 1) ?>">
                                                                        <span class="circular__percents"><?= number_format($percNegativi1, 1) ?><small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Sconfitte</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="spacer"></div>

                                                        <!-- Progress: Assists -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label" style="color: #009900;">V</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percV1 = ($TOTALEV1 * 100);
                                                                $percV1 = ($percV1 / $TOTALE);
                                                                $percV1 = round($percV1);
                                                                ?>
                                                                <div class="progress__bar progress__bar-width-<?= $percV1 ?>" role="progressbar" aria-valuenow="<?= $percV1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #009900;"><?= $TOTALEV1 ?></div>
                                                        </div>
                                                        <!-- Progress: Assists / End -->

                                                        <!-- Progress: Fouls -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">N</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percN1 = ($TOTALEN1 * 100);
                                                                $percN1 = ($percN1 / $TOTALE);
                                                                $percN1 = round($percN1);
                                                                ?>
                                                                <div class="progress__bar progress__bar-width-<?= $percN1 ?>" role="progressbar" aria-valuenow="<?= $percN1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #000000;"><?= $TOTALEN1 ?></div>
                                                        </div>
                                                        <!-- Progress: Fouls / End -->

                                                        <!-- Progress: OFF -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label" style="color: #ff3d3d;">P</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percP1 = ($TOTALEP1 * 100);
                                                                $percP1 = ($percP1 / $TOTALE);
                                                                $percP1 = round($percP1);
                                                                ?>
                                                                <div class="progress__bar progress__bar-width-<?= $percP1 ?>" role="progressbar" aria-valuenow="<?= $percP1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #ff3d3d;"><?= $TOTALEP1 ?></div>
                                                        </div>
                                                        <!-- Progress: OFF / End -->

                                                    </div>
                                                    <div class="col-xs-6 col-md-3 game-result__stats-team-2">

                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <?php
                                                                    $positivi2 = ($TOTALEV2 + $TOTALEN2);
                                                                    $percPositivi2 = (100 * $positivi2);
                                                                    $percPositivi2 = ($percPositivi2 / $TOTALE);
                                                                    ?>
                                                                    <div class="circular__bar" data-percent="<?= number_format($percPositivi2, 1) ?>" data-bar-color="#9fe900">
                                                                        <span class="circular__percents"><?= number_format($percPositivi2, 1) ?><small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Risultati<br> Positivi</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <?php
                                                                    $percNegativi2 = (100 * $TOTALEP2);
                                                                    $percNegativi2 = ($percNegativi2 / $TOTALE);
                                                                    ?>
                                                                    <div class="circular__bar" data-percent="<?= number_format($percNegativi2, 1) ?>" data-bar-color="#9fe900">
                                                                        <span class="circular__percents"><?= number_format($percNegativi2, 1) ?><small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Sconfitte</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="spacer"></div>

                                                        <!-- Progress: Assists -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label" style="color: #009900;">V</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percV2 = ($TOTALEV2 * 100);
                                                                $percV2 = ($percV2 / $TOTALE);
                                                                $percV2 = round($percV2);
                                                                ?>
                                                                <div class="progress__bar progress__bar--success progress__bar-width-<?= $percV2 ?>" role="progressbar" aria-valuenow="<?= $percV2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #009900;"><?= $TOTALEV2 ?></div>
                                                        </div>
                                                        <!-- Progress: Assists / End -->

                                                        <!-- Progress: Fouls -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">N</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percN2 = ($TOTALEN2 * 100);
                                                                $percN2 = ($percN2 / $TOTALE);
                                                                $percN2 = round($percN2);
                                                                ?>
                                                                <div class="progress__bar progress__bar--success progress__bar-width-<?= $percN2 ?>" role="progressbar" aria-valuenow="<?= $percN2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #000000;"><?= $TOTALEN2 ?></div>
                                                        </div>
                                                        <!-- Progress: Fouls / End -->

                                                        <!-- Progress: OFF -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label" style="color: #ff3d3d;">P</div>
                                                            <div class="progress">
                                                                <?php
                                                                $percP2 = ($TOTALEP2 * 100);
                                                                $percP2 = ($percP2 / $TOTALE);
                                                                $percP2 = round($percP2);
                                                                ?>
                                                                <div class="progress__bar progress__bar--success progress__bar-width-<?= $percP2 ?>" role="progressbar" aria-valuenow="<?= $percP2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number" style="color: #ff3d3d;"><?= $TOTALEP2 ?></div>
                                                        </div>
                                                        <!-- Progress: OFF / End -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- Ball Posession -->
                                    <section class="game-result__section">
                                        <header class="game-result__subheader card__subheader">
                                            <h5 class="game-result__subtitle">Percentuale Vittorie</h5>
                                        </header>
                                        <div class="game-result__content">

                                            <div class="spacer-sm"></div>

                                            <?php
                                            $TotaleVittorie = ($TOTALEV1 + $TOTALEV2);
                                            $percVittorie1 = ($TOTALEV1 * 100);
                                            $percVittorie1 = round($percVittorie1 / $TotaleVittorie);
                                            $percVittorie2 = ($TOTALEV2 * 100);
                                            $percVittorie2 = round($percVittorie2 / $TotaleVittorie);
                                            ?>
                                            <!-- Progress: Ball Posession -->
                                            <div class="progress-double-wrapper">
                                                <div class="progress-inner-holder">
                                                    <div class="progress__digit progress__digit--left progress__digit--highlight"><?= $percVittorie1 ?>%</div>
                                                    <div class="progress__double">
                                                        <div class="progress progress--lg">
                                                            <div class="progress__bar progress__bar-width-<?= $percVittorie1 ?>" role="progressbar" aria-valuenow="<?= $percVittorie1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="progress progress--lg">
                                                            <div class="progress__bar progress__bar--success progress__bar-width-<?= $percVittorie2 ?>" role="progressbar" aria-valuenow="<?= $percVittorie2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress__digit progress__digit--right progress__digit--highlight"><?= $percVittorie2 ?>%</div>
                                                </div>
                                            </div>
                                            <!-- Progress: Ball Posession / End -->

                                        </div>
                                    </section>
                                    <!-- Ball Posession / End -->

                                </div>
                                <!-- Game Timeline / End -->

                            </div>
                        </div>
                        <!-- Game Scoreboard / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Featured Player - Alternative without Image -->
                        <aside class="widget card widget--sidebar widget-player widget-player--alt">
                            <div class="widget__title card__header">
                                <h4>Riepilogo Partite</h4>
                            </div>
                            <div class="widget__content-secondary">

                                <!-- Player Details -->
                                <div class="widget-player__details">

                                    <!-- Setto il background color --->
                                    <?php
                                    $bgcolor1 = "#f8f8f8;";
                                    ?>
                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style='color: #1892ED;'>Gol Fatti</span>
                                                    <span class="widget-player__details-desc" >Totali</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$GOLTOTALI1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Gol Fatti</span>
                                                    <span class="widget-player__details-desc">Totali</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$GOLTOTALI2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style='color: #1892ED;'>Gol Subiti</span>
                                                    <span class="widget-player__details-desc">Totali</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$GOLTOTALI2 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Gol Subiti</span>
                                                    <span class="widget-player__details-desc">Totali</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$GOLTOTALI1 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Treble League</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVTL1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Treble League</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVTL2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Treble League</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNTL1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Treble League</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNTL2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Treble League</span>
                                                    <span class="widget-player__details-desc"style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPTL1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Treble League</span>
                                                    <span class="widget-player__details-desc"style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPTL2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Champions L.</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVCH1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Champions L.</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVCH2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Champions L.</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNCH1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Champions L.</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNCH2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Champions L.</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPCH1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Champions L.</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPCH2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVCO1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVCO2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNCO1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNCO2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPCO1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">Coppa Treble</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPCO2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVSC1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc" style="color: #009900;">Vittorie</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzVSC2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNSC1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc">Pareggi</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzNSC2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-player__details-row">
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #1892ED;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPSC1 ?></span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item" style="background-color: <?= $bgcolor1 ?>">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label" style="color: #9edb00;">SuperCoppa T.</span>
                                                    <span class="widget-player__details-desc" style="color: #ff3d3d;">Sconfitte</span>
                                                </span>
                                                <span class="widget-player__details-value"><?= @$parzPSC2 ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Player Details / End -->

                            </div>

                            <div class="widget__content-tertiary widget__content--bottom-decor">
                                <div class="widget__content-inner">

                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Featured Player - Alternative without Image / End -->

                    </div>
                    <!-- Sidebar / End -->
                </div>
            </div>

            <!-- Content / End -->

            <?php
        }
        ?>

        <!-- Content / End -->

