

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Treble</span> League</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/statistiche_treble_league" class="content-filter__link"><small>Treble League</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/marcatori" class="content-filter__link"><small>Treble League</small>Marcatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/campionato" class="content-filter__link"><small>Treble League</small>Classifica</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/calendario" class="content-filter__link"><small>Treble League</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-schedule.html" class="content-filter__link"><small>Treble League</small>Schedule</a></li>
                    <li class="content-filter__item "><a href="_soccer_team-gallery.html" class="content-filter__link"><small>Treble League</small>Gallery</a></li>
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
                                echo form_open('home/statistiche_treble_league', array(
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
                if ($check == 1) {
                    ?>

                    <!-- Related Products -->
                    <div class="card card--clean">
                        <header class="card__header">
                            <h4>Precedenti storici fra <span style='color: #1892ED;'><?= @$squadra1 ?></span> e <span style='color: #1892ED;'><?= @$squadra2 ?></span> </h4>
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2017-18") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2017-18") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2017-18") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2016-17") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2016-17") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2016-17") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2015-16") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2015-16") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2015-16") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2014-15") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2014-15") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2014-15") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2014-15") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2013-14") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2013-14") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2013-14") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2013-14") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2012-13") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2012-13") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2012-13") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2012-13") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png">
                                                                    <?php } ?>
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id1'], "2011-12") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id1'], "2011-12") ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-result__score" style="font-size: 14px; width: 12%;"><?= $row['risultato1'] . " - " . $row['risultato2'] ?></td>
                                                        <td class="team-result__status" align='right' style="width: 22%">
                                                            <div class="team-meta" style="text-align: right;">
                                                                <div class="team-meta__info" align='right'>
                                                                    <h6 class="team-meta__name"><?= $this->mdl_utenti->getSquadraPrecedente($row['id2'], "2011-12") ?></h6>
                                                                    <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtentePrecedente($row['id2'], "2011-12") ?></span>
                                                                </div>
                                                                <figure class="team-meta__logoCalendar">
                                                                    <?php if ($row['id1'] != $row['id2']) { ?>
                                                                        <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png">
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
                                                    <img src="<?= base_url('/') ?>images/albo/utenti/Frioni.png" alt="">
                                                </figure>
                                                <div class="game-result__team-info">
                                                    <h5 class="game-result__team-name" style="color: #1892ED;"><?= $squadra1 ?></h5>
                                                </div>
                                            </div>
                                            <!-- 1st Team / End -->

                                            <!-- 2nd Team -->
                                            <div class="game-result__team game-result__team--second">
                                                <figure class="game-result__team-logo">
                                                    <img src="<?= base_url('/') ?>images/albo/utenti/Guerrieri.png" alt="">
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
                                                                        <td>25(14)</td>
                                                                        <td>Totali</td>
                                                                        <td>16(6)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9</td>
                                                                        <td>Treble League</td>
                                                                        <td>7</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>0</td>
                                                                        <td>Champions League</td>
                                                                        <td>2</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Coppa Treble</td>
                                                                        <td>0</td>
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
                                                                    <div class="circular__bar" data-percent="84.5">
                                                                        <span class="circular__percents">84.5<small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Shot<br> Accuracy</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <div class="circular__bar" data-percent="62.3">
                                                                        <span class="circular__percents">62.3<small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Pass<br> Accuracy</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="spacer"></div>

                                                        <!-- Progress: Assists -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">Sho</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar-width-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">25</div>
                                                        </div>
                                                        <!-- Progress: Assists / End -->

                                                        <!-- Progress: Fouls -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">Fou</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar-width-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">12</div>
                                                        </div>
                                                        <!-- Progress: Fouls / End -->

                                                        <!-- Progress: OFF -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">OFF</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar-width-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">10</div>
                                                        </div>
                                                        <!-- Progress: OFF / End -->

                                                    </div>
                                                    <div class="col-xs-6 col-md-3 game-result__stats-team-2">

                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <div class="circular__bar" data-percent="74.6" data-bar-color="#9fe900">
                                                                        <span class="circular__percents">74.6<small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Shot<br> Accuracy</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <div class="circular circular--size-70">
                                                                    <div class="circular__bar" data-percent="53.9" data-bar-color="#9fe900">
                                                                        <span class="circular__percents">53.9<small>%</small></span>
                                                                    </div>
                                                                    <span class="circular__label">Pass<br> Accuracy</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="spacer"></div>

                                                        <!-- Progress: Assists -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">Sho</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar--success progress__bar-width-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">25</div>
                                                        </div>
                                                        <!-- Progress: Assists / End -->

                                                        <!-- Progress: Fouls -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">Fou</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar--success progress__bar-width-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">14</div>
                                                        </div>
                                                        <!-- Progress: Fouls / End -->

                                                        <!-- Progress: OFF -->
                                                        <div class="progress-stats">
                                                            <div class="progress__label">OFF</div>
                                                            <div class="progress">
                                                                <div class="progress__bar progress__bar--success progress__bar-width-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="progress__number">12</div>
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

                                            <!-- Progress: Ball Posession -->
                                            <div class="progress-double-wrapper">
                                                <div class="progress-inner-holder">
                                                    <div class="progress__digit progress__digit--left progress__digit--highlight">62%</div>
                                                    <div class="progress__double">
                                                        <div class="progress progress--lg">
                                                            <div class="progress__bar progress__bar-width-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="progress progress--lg">
                                                            <div class="progress__bar progress__bar--success progress__bar-width-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress__digit progress__digit--right progress__digit--highlight">38%</div>
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

                        <!-- Widget: Lineup -->
                        <aside class="widget card widget--sidebar widget-lineup">
                            <div class="widget__title card__header">
                                <h4>Lineup and Tactic</h4>
                            </div>
                            <div class="widget__content card__content">

                                <canvas id="soccer-lineup" class="soccer-lineup" width="316" height="460">
                                    <!-- Fallback Image -->
                                    <img src="<?= base_url('/') ?>assets/images/soccer/_soccer_field-lineup.jpg" alt="">
                                    <!-- Fallback Image / End -->
                                </canvas>

                                <script>
                                    var canvas = document.getElementById('soccer-lineup');
                                    var context = canvas.getContext('2d');

                                    function loadImages(sources, callback) {
                                        var images = {};
                                        var loadedImages = 0;
                                        var numImages = 0;
                                        // get num of sources
                                        for (var src in sources) {
                                            numImages++;
                                        }
                                        for (var src in sources) {
                                            images[src] = new Image();
                                            images[src].onload = function () {
                                                if (++loadedImages >= numImages) {
                                                    callback(images);
                                                }
                                            };
                                            images[src].src = sources[src];
                                        }
                                    }

                                    // Players Shirt
                                    var sources = {
                                        player1: 'assets/images/soccer/lineup_01.png',
                                        player2: 'assets/images/soccer/lineup_04.png',
                                        player3: 'assets/images/soccer/lineup_03.png',
                                        player4: 'assets/images/soccer/lineup_22.png',
                                        player5: 'assets/images/soccer/lineup_05.png',
                                        player6: 'assets/images/soccer/lineup_02.png',
                                        player7: 'assets/images/soccer/lineup_08.png',
                                        player8: 'assets/images/soccer/lineup_26.png',
                                        player9: 'assets/images/soccer/lineup_07.png',
                                        player10: 'assets/images/soccer/lineup_18.png',
                                        player11: 'assets/images/soccer/lineup_09.png',
                                    };

                                    loadImages(sources, function (images) {
                                        context.drawImage(images.player1, 142, 26);
                                        context.drawImage(images.player2, 79, 72);
                                        context.drawImage(images.player3, 207, 72);
                                        context.drawImage(images.player4, 37, 137);
                                        context.drawImage(images.player5, 247, 137);
                                        context.drawImage(images.player6, 142, 198);
                                        context.drawImage(images.player7, 63, 230);
                                        context.drawImage(images.player8, 221, 230);
                                        context.drawImage(images.player9, 37, 314);
                                        context.drawImage(images.player10, 247, 314);
                                        context.drawImage(images.player11, 142, 358);
                                    });

                                    // Player Names
                                    var players = {
                                        player1: 'Rodgers',
                                        player2: 'Ironson',
                                        player3: 'Kingster',
                                        player4: 'Girobilli',
                                        player5: 'Black',
                                        player6: 'Arrowhead',
                                        player7: 'Grass',
                                        player8: 'Peterson',
                                        player9: 'Messinal',
                                        player10: 'Hawkins',
                                        player11: 'Stevens',
                                    };

                                    drawTextBG(context, players.player1, 135, 64);
                                    drawTextBG(context, players.player2, 77, 110);
                                    drawTextBG(context, players.player3, 205, 110);
                                    drawTextBG(context, players.player4, 33, 174);
                                    drawTextBG(context, players.player5, 249, 174);
                                    drawTextBG(context, players.player6, 130, 238);
                                    drawTextBG(context, players.player7, 64, 269);
                                    drawTextBG(context, players.player8, 215, 269);
                                    drawTextBG(context, players.player9, 33, 353);
                                    drawTextBG(context, players.player10, 242, 353);
                                    drawTextBG(context, players.player11, 137, 398);

                                    /// expand with color, background etc.
                                    function drawTextBG(context, txt, x, y, padding) {
                                        padding = padding || 6;

                                        context.save();
                                        context.font = '10px Montserrat';
                                        context.textBaseline = 'top';
                                        context.fillStyle = 'rgba(35,43,49,0.6)';

                                        var width = context.measureText(txt).width;
                                        context.fillRect(x - padding, y - padding + 4, width + (padding * 2), parseInt(context.font, 10) + (padding * 1.1));


                                        context.fillStyle = '#fff';
                                        context.fillText(txt, x, y);

                                        context.restore();
                                    }

                                </script>

                            </div>
                        </aside>
                        <!-- Widget: Lineup / End -->

                    </div>
                    <!-- Sidebar / End -->
                </div>
            </div>
            </div>

            <!-- Content / End -->

            <?php
        }
        ?>

        </div>
        </div>

        <!-- Content / End -->

