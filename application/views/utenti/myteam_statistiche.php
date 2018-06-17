

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Statistiche <span class="highlight"><?= $_SESSION['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/myteam">My Team</a></li>
                            <li class="active">Statistiche</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pages Filter -->
        <nav class="content-filter">
            <div class="container">
                <a href="#" class="content-filter__toggle"></a>
                <ul class="content-filter__list">
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam" class="content-filter__link"><small>My Team</small>Rosa Giocatori</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_marcatori" class="content-filter__link"><small>My Team</small>Marcatori</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/utente/myteam_statistiche" class="content-filter__link"><small>My Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_risultati" class="content-filter__link"><small>My Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_calendario" class="content-filter__link"><small>My Team</small>Calendario</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_bacheca" class="content-filter__link"><small>My Team</small>Bacheca</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <div class="row">

                    <!-- Content -->
                    <div class="content col-md-8">

                        <div class="row">

                            <div class="col-md-6">

                                <!-- Widget: Team Stats -->
                                <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                                    <div class="widget__title card__header">
                                        <h4>Statistiche 2018/19</h4>
                                        <span class="team-leader__player-position"  style="text-transform: capitalize;">* Media per partita giocata</span>
                                    </div>
                                    <div class="widget__content card__content">
                                        <ul class="team-stats-box">
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                $media = ( $this->mdl_team->getMediaGolFatti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Reti realizzate</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots-ot">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-gate.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                $media = ( $this->mdl_team->getMediaGolSubiti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Gol Subiti</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--shots">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-ball.svg" alt="" class="team-stats__icon-primary">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/icon-soccer-shots.svg" alt="" class="team-stats__icon-secondary">
                                                </div>
                                                <?php
                                                //Calcolo maggior mediagolsubiti
                                                $media = ( $this->mdl_team->getMediaAssistFatti($_SESSION['id_utente']) / $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']));
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Assist</div>
                                            </li>
                                            <li class="team-stats__item team-stats__item--clean">
                                                <div class="team-stats__icon team-stats__icon--circle team-stats__icon--assists">
                                                    <img src="<?= base_url('/') ?>assets/images/soccer/yellow-red_card.png" alt="" class="team-stats__icon-primary">
                                                </div>
                                                <?php
                                                $partite_giocate = $this->mdl_team->getPartiteGiocateTL($_SESSION['id_utente']);
                                                $totale_cartellini = $this->mdl_team->getTotaleCartellini($_SESSION['id_utente']);
                                                $media = ($totale_cartellini / $partite_giocate);
                                                ?>
                                                <div class="team-stats__value"><?= number_format($media, 2) ?></div>
                                                <div class="team-stats__label">Numero Cartellini</div>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget: Team Stats / End -->


                            </div>
                            <div class="col-md-6">

                                <!-- Widget: Awards -->
                                <aside class="widget card widget--sidebar widget-awards">
                                    <div class="widget__title card__header">
                                        <h4>Our Awards</h4>
                                    </div>
                                    <div class="widget__content card__content">
                                        <div class="awards awards--slider">
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">West League Champions</h5>
                                                    <div class="awards__date">December 2012</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">East League Champions</h5>
                                                    <div class="awards__date">November 2010</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="awards__item">
                                                <figure class="awards__figure awards__figure--space">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/trophy-04.svg" alt="">
                                                </figure>
                                                <div class="awards__desc">
                                                    <h5 class="awards__name">Big League Champions</h5>
                                                    <div class="awards__date">December 2012</div>
                                                    <div class="awards__stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Widget: Awards / End -->


                            </div>
                        </div>

                        <!-- Points History -->
                        <div class="card">
                            <div class="card__header card__header--has-legend">
                                <h4>Storico punti</h4>
                                <div id="gamesPoinstsLegendSoccer" class="chart-legend"></div>
                            </div>
                            <div class="card__content">
                                <canvas id="points-history-soccer" class="points-history-chart" height="135"></canvas>
                            </div>
                        </div>
                        <!-- Points History / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Standings -->
                        <aside class="widget card widget--sidebar widget-standings">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>West League 2016</h4>
                                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See All Stats</a>
                            </div>
                            <div class="widget__content card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-standings">
                                        <thead>
                                            <tr>
                                                <th>Team Positions</th>
                                                <th>W</th>
                                                <th>L</th>
                                                <th>D</th>
                                                <th>PTS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/pirates_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">L.A Pirates</h6>
                                                            <span class="team-meta__place">Bebop Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>36</td>
                                                <td>14</td>
                                                <td>10</td>
                                                <td>118</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/sharks_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Sharks</h6>
                                                            <span class="team-meta__place">Marine College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>32</td>
                                                <td>20</td>
                                                <td>8</td>
                                                <td>104</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">The Alchemists</h6>
                                                            <span class="team-meta__place">Eric Bros School</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>32</td>
                                                <td>21</td>
                                                <td>7</td>
                                                <td>103</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/ocean_kings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Ocean Kings</h6>
                                                            <span class="team-meta__place">Bay College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>30</td>
                                                <td>20</td>
                                                <td>10</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/red_wings_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Red Wings</h6>
                                                            <span class="team-meta__place">Icarus College</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>28</td>
                                                <td>24</td>
                                                <td>8</td>
                                                <td>92</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Lucky Clovers</h6>
                                                            <span class="team-meta__place">St. Patrick’s Institute</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>27</td>
                                                <td>24</td>
                                                <td>9</td>
                                                <td>90</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/draconians_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Draconians</h6>
                                                            <span class="team-meta__place">Draconians</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>28</td>
                                                <td>7</td>
                                                <td>82</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>assets/images/samples/logos/bloody_wave_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">Bloody Wave</h6>
                                                            <span class="team-meta__place">Atlantic School</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>24</td>
                                                <td>30</td>
                                                <td>6</td>
                                                <td>78</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Standings / End -->


                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Team Goalscorers</h4>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">West League 2016</th>
                                                <th class="team-leader__goals">G</th>
                                                <th class="team-leader__gp">P</th>
                                                <th class="team-leader__avg">AVG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">James Messinal</h5>
                                                            <span class="team-leader__player-position">Forward</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">11</td>
                                                <td class="team-leader__gp">12</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="91">
                                                            <span class="circular__percents">0.91</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_02.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">David Hawkins</h5>
                                                            <span class="team-leader__player-position">Forward</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">10</td>
                                                <td class="team-leader__gp">12</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="83">
                                                            <span class="circular__percents">0.83</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Griffin Peterson</h5>
                                                            <span class="team-leader__player-position">Midfielder</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">8</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="80">
                                                            <span class="circular__percents">0.80</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_02.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Christofer Grass</h5>
                                                            <span class="team-leader__player-position">Midfielder</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">7</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="70">
                                                            <span class="circular__percents">0.70</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>assets/images/soccer/samples/goalscorer_01.jpg" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name">Mark Ironson</h5>
                                                            <span class="team-leader__player-position">Defender</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals">5</td>
                                                <td class="team-leader__gp">10</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="50">
                                                            <span class="circular__percents">0.50</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->


                            </div>
                        </aside>
                        <!-- Widget: Team Leaders / End -->


                        <!-- Widget: Latest Results -->
                        <aside class="widget card widget--sidebar widget-results">
                            <div class="widget__title card__header card__header--has-btn">
                                <h4>Latest Results</h4>
                                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">See Full Results</a>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="widget-results__list">

                                    <!-- Game 1 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Saturday, March 24</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Elric Bros School</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                                                    <div class="widget-results__status">Home</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/sharks_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Sharks</h5>
                                                    <span class="widget-results__team-info">Marine College</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 1 / End -->

                                    <!-- Game 2 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Friday, March 16</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/pirates_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">L.A. Pirates</h5>
                                                    <span class="widget-results__team-info">Bebop Institute</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-winner">4</span> - <span class="widget-results__score-loser">2</span>
                                                    <div class="widget-results__status">Away</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 2 / End -->

                                    <!-- Game 3 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Saturday, March 10</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-draw">0</span> - <span class="widget-results__score-draw">0</span>
                                                    <div class="widget-results__status">Home</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Clovers</h5>
                                                    <span class="widget-results__team-info">St. Patrick’s Inst</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 3 / End -->

                                    <!-- Game 4 -->
                                    <li class="widget-results__item">
                                        <h5 class="widget-results__title">Friday, March 4</h5>
                                        <div class="widget-results__content">
                                            <div class="widget-results__team widget-results__team--first">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/ocean_kings_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Ocean Kings</h5>
                                                    <span class="widget-results__team-info">Bay College</span>
                                                </div>
                                            </div>
                                            <div class="widget-results__result">
                                                <div class="widget-results__score">
                                                    <span class="widget-results__score-loser">2</span> - <span class="widget-results__score-winner">3</span>
                                                    <div class="widget-results__status">Away</div>
                                                </div>
                                            </div>
                                            <div class="widget-results__team widget-results__team--second">
                                                <figure class="widget-results__team-logo">
                                                    <img src="<?= base_url('/') ?>assets/images/samples/logos/alchemists_b_shield.png" alt="">
                                                </figure>
                                                <div class="widget-results__team-details">
                                                    <h5 class="widget-results__team-name">Alchemists</h5>
                                                    <span class="widget-results__team-info">Eric Bros School</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Game 4 / End -->

                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Latest Results / End -->


                        <!-- Widget: Games History -->
                        <aside class="widget card widget--sidebar widget-games-history">
                            <div class="widget__title card__header card__header--has-legend">
                                <h4>Games History</h4>
                                <div id="gamesHistoryLegendSoccer" class="chart-legend chart-legend--games-history"></div>
                            </div>
                            <div class="widget__content card__content">
                                <canvas id="games-history-soccer" class="games-history-chart" height="230"></canvas>
                            </div>
                        </aside>
                        <!-- Widget: Games History / End -->


                    </div>
                    <!-- Sidebar / End -->
                </div>
            </div>
        </div>

        <!-- Content / End -->

