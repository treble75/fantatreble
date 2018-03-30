

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
                                        <div class="form-group">
                                            <label class="radio radio-inline">
                                                <input type="radio" name="SelPrecedente" id="inlineRadio1" value="squadra" checked>Squadra
                                                <span class="radio-indicator"></span>
                                            </label>
                                            <label class="radio radio-inline">
                                                <input type="radio" name="SelPrecedente" id="inlineRadio2" value="utente">Utente
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
                if ($check == 1) {
                    ?>

                    <!-- Related Products -->
                    <div class="card card--clean">
                        <header class="card__header">
                            <h4>Precedenti storici fra <span style='color: #1892ED;'><?= @$squadra1 ?></span> e <span style='color: #1892ED;'><?= @$squadra2 ?></span> </h4>
                        </header>
                        <div class="card__content">

                            <?= @$message; ?>

                            <?php
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

                            if (is_array(@$precedenti2017_18)) {
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
                            ?>
                                
                            <?php
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
                            if (is_array(@$precedenti2016_17)) {
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
                            if (is_array(@$precedenti2015_16)) {
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
                            if (is_array(@$precedenti2014_15)) {
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
                            if (is_array(@$precedenti2013_14)) {
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
                            if (is_array(@$precedenti2012_13)) {
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
                            if (is_array(@$precedenti2011_12)) {
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

                    <?php
                }
                ?>

            </div>
        </div>

        <!-- Content / End -->

