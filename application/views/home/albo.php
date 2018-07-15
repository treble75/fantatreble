
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/albo_statistiche" class="content-filter__link"><small>Albo d'oro</small>Statistiche</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>home/albo" class="content-filter__link"><small>Albo d'oro</small>Treble League</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/albo_champions" class="content-filter__link"><small>Albo d'oro</small>Champions League</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/albo_coppa" class="content-filter__link"><small>Albo d'oro</small>Coppa Treble</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>home/albo_supercoppa" class="content-filter__link"><small>Albo d'oro</small>SuperCoppa Treble</a></li>
                </ul>
            </div>
        </nav>
        <!-- Team Pages Filter / End -->


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <!-- Team Standings -->
                <div class="card card--has-table">
                    <div class="card__header">
                        <h4>Treble League</h4>
                    </div>
                </div>
                <!-- Team Standings / End -->

                <div class="row">

                    <!-- Content -->
                    <div class="content col-md-8">

                        <!-- Last Game Log -->
                        <div class="card card--has-table">
                            <div class="card__header card__header--has-btn">
                                <h4>Albo d'oro</h4>
                                <br><span style="font-size: 12px;">* Risultati relativi alla regular season</span>
                                <a href="<?= base_url('/') ?>home/classifica_perpetua" class="btn btn-default btn-outline btn-xs card-header__button">Vedi Classifica Perpetua</a>
                            </div>
                            <div class="card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover game-player-result">
                                        <thead>
                                            <tr>
                                                <th class="game-player-result__date">Stagione</th>
                                                <th class="game-player-result__vs">Vincitore</th>
                                                <th class="game-player-result__score">Punti</th>
                                                <th class="game-player-result__min">PG</th>
                                                <th class="game-player-result__tg">V</th>
                                                <th class="game-player-result__ts">N</th>
                                                <th class="game-player-result__ga">P</th>
                                                <th class="game-player-result__fc">GF</th>
                                                <th class="game-player-result__fs">GS</th>
                                                <th class="game-player-result__yc">DIFF</th>
                                                <th class="game-player-result__rc">FP</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="game-player-result__date">2017 / 18</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/sportingkrk.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Sporting KRK</h6>
                                                            <span class="team-meta__place">Francesco Carchedi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">39</span></td>
                                                <td class="game-player-result__min">27</td>
                                                <td class="game-player-result__tg">11</td>
                                                <td class="game-player-result__ts">6</td>
                                                <td class="game-player-result__ga">10</td>
                                                <td class="game-player-result__fc">44</td>
                                                <td class="game-player-result__fs">46</td>
                                                <td class="game-player-result__yc">-2</td>
                                                <td class="game-player-result__rc">1964.0</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2016 / 17</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Frank One</h6>
                                                            <span class="team-meta__place">Antonio Francone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">57</span></td>
                                                <td class="game-player-result__min">27</td>
                                                <td class="game-player-result__tg">18</td>
                                                <td class="game-player-result__ts">3</td>
                                                <td class="game-player-result__ga">6</td>
                                                <td class="game-player-result__fc">52</td>
                                                <td class="game-player-result__fs">28</td>
                                                <td class="game-player-result__yc">+24</td>
                                                <td class="game-player-result__rc">2000.5</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2015 / 16</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Frank One</h6>
                                                            <span class="team-meta__place">Antonio Francone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">51</span></td>
                                                <td class="game-player-result__min">28</td>
                                                <td class="game-player-result__tg">15</td>
                                                <td class="game-player-result__ts">6</td>
                                                <td class="game-player-result__ga">7</td>
                                                <td class="game-player-result__fc">50</td>
                                                <td class="game-player-result__fs">32</td>
                                                <td class="game-player-result__yc">+18</td>
                                                <td class="game-player-result__rc">2037.0</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2014 / 15</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">61</span></td>
                                                <td class="game-player-result__min">28</td>
                                                <td class="game-player-result__tg">18</td>
                                                <td class="game-player-result__ts">7</td>
                                                <td class="game-player-result__ga">3</td>
                                                <td class="game-player-result__fc">57</td>
                                                <td class="game-player-result__fs">34</td>
                                                <td class="game-player-result__yc">+23</td>
                                                <td class="game-player-result__rc">2094.0</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2013 / 14</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">41</span></td>
                                                <td class="game-player-result__min">28</td>
                                                <td class="game-player-result__tg">11</td>
                                                <td class="game-player-result__ts">8</td>
                                                <td class="game-player-result__ga">9</td>
                                                <td class="game-player-result__fc">36</td>
                                                <td class="game-player-result__fs">35</td>
                                                <td class="game-player-result__yc">+1</td>
                                                <td class="game-player-result__rc">1969.5</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2012 / 13</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">42</span></td>
                                                <td class="game-player-result__min">28</td>
                                                <td class="game-player-result__tg">10</td>
                                                <td class="game-player-result__ts">12</td>
                                                <td class="game-player-result__ga">6</td>
                                                <td class="game-player-result__fc">40</td>
                                                <td class="game-player-result__fs">34</td>
                                                <td class="game-player-result__yc">+6</td>
                                                <td class="game-player-result__rc">2003.0</td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2011 / 12</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/allblacks.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">All Blacks</h6>
                                                            <span class="team-meta__place">Luca Cerri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__score"><span style="color: #1892ED; font-size: 12px;">50</span></td>
                                                <td class="game-player-result__min">28</td>
                                                <td class="game-player-result__tg">14</td>
                                                <td class="game-player-result__ts">8</td>
                                                <td class="game-player-result__ga">6</td>
                                                <td class="game-player-result__fc">55</td>
                                                <td class="game-player-result__fs">39</td>
                                                <td class="game-player-result__yc">+16</td>
                                                <td class="game-player-result__rc">2079.5</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Last Game Log / End -->
                        
                        <!-- Piazzamenti -->
                        <div class="card card--has-table">
                            <div class="card__header card__header--has-btn">
                                <h4>Piazzamenti</h4>
                            </div>
                            <div class="card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover game-player-result">
                                        <thead>
                                            <tr>
                                                <th class="game-player-result__date">Stagione</th>
                                                <th class="game-player-result__vs">Vincitore</th>
                                                <th class="game-player-result__vs">2° Posto</th>
                                                <th class="game-player-result__vs">3° Posto</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="game-player-result__date">2017 / 18</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/sportingkrk.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Sporting KRK</h6>
                                                            <span class="team-meta__place">Francesco Carchedi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Frank One</h6>
                                                            <span class="team-meta__place">Antonio Francone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors2.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2016 / 17</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Frank One</h6>
                                                            <span class="team-meta__place">Antonio Francone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/sportingkrk.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Sporting KRK</h6>
                                                            <span class="team-meta__place">Francesco Carchedi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/scarsenal.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">S.C.Arsenal</h6>
                                                            <span class="team-meta__place">Ivano Staccone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2015 / 16</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Frank One</h6>
                                                            <span class="team-meta__place">Antonio Francone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/scarsenal.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">S.C.Arsenal</h6>
                                                            <span class="team-meta__place">Ivano Staccone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/curvasud.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Curva Sud</h6>
                                                            <span class="team-meta__place">Pietro Bonelli</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2014 / 15</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors2.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/erawan.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Erawan</h6>
                                                            <span class="team-meta__place">Alex Zangrilli</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/allblacks.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">All Blacks</h6>
                                                            <span class="team-meta__place">Luca Cerri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2013 / 14</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors2.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/zacapa23.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Zacapa 23</h6>
                                                            <span class="team-meta__place">Claudio Frioni</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/allblacks.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">All Blacks</h6>
                                                            <span class="team-meta__place">Luca Cerri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2012 / 13</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors1.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/dreamteam.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Dream Team</h6>
                                                            <span class="team-meta__place">Ivano Staccone</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/sangue&oro.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Sangue&Oro</h6>
                                                            <span class="team-meta__place">Francesco Carriero</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="game-player-result__date">2011 / 12</td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/allblacks.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">All Blacks</h6>
                                                            <span class="team-meta__place">Luca Cerri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/redbull.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Red Bull</h6>
                                                            <span class="team-meta__place">Alex Zangrilli</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="game-player-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="<?= base_url('/') ?>images/albo/logo/warriors1.png" alt="" width="30px">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Warriors</h6>
                                                            <span class="team-meta__place">Luca Guerrieri</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Piazzamenti / End -->


                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">


                        <!-- Widget: Team Leaders -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="card__header">
                                <h4>Top 10 Capocannonieri</h4>
                                <span style="font-size: 12px;">* Compresi playoff e finali</span>
                            </div>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">
                                        <thead>
                                            <tr>
                                                <th class="team-leader__type">&nbsp;</th>
                                                <th class="team-leader__goals">Gol</th>
                                                <th class="team-leader__avg">Media</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/higuain.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">HIGUAIN Gonzalo</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">All Blacks</span>
                                                            <span class="team-leader__player-position">Stagione 2015 / 16</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">28</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="98.3">
                                                            <span class="circular__percents">9.83</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/ibrahimovic.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">IBRAHIMOVIC Zlatan</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">All Blacks</span>
                                                            <span class="team-leader__player-position">Stagione 2011 / 12</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">26</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="98.0">
                                                            <span class="circular__percents">9.80</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/mertens.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">MERTENS Dries</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Sporting KRK</span>
                                                            <span class="team-leader__player-position">Stagione 2016 / 17</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">25</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="99.8">
                                                            <span class="circular__percents">9.98</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/dzeko.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">DZEKO Edin</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Zacapa 23</span>
                                                            <span class="team-leader__player-position">Stagione 2016 / 17</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">24</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="87.9">
                                                            <span class="circular__percents">8.79</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/icardi.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">ICARDI Mauro</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Sporting KRK</span>
                                                            <span class="team-leader__player-position">Stagione 2017 / 18</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">24</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="85.6">
                                                            <span class="circular__percents">8.56</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/immobile.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">IMMOBILE Ciro</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Sangue&Oro</span>
                                                            <span class="team-leader__player-position">Stagione 2017 / 18</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">23</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="92.6">
                                                            <span class="circular__percents">9.26</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/belotti.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">BELOTTI Andrea</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">F.C. Longobarda</span>
                                                            <span class="team-leader__player-position">Stagione 2016 / 17</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">21</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="89.1">
                                                            <span class="circular__percents">8.91</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/cavani.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">CAVANI Edinson</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Bella Ciao</span>
                                                            <span class="team-leader__player-position">Stagione 2012 / 13</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">21</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="86.2">
                                                            <span class="circular__percents">8.62</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/tevez.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">TEVEZ Carlos</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Nestlè</span>
                                                            <span class="team-leader__player-position">Stagione 2014 / 15</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">20</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="87.7">
                                                            <span class="circular__percents">8.77</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="team-leader__player">
                                                    <div class="team-leader__player-info">
                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                            <img src="<?= base_url('/') ?>images/albo/giocatori/icardi.png" alt="">
                                                        </figure>
                                                        <div class="team-leader__player-inner">
                                                            <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">ICARDI Mauro</h5>
                                                            <span class="team-leader__player-position" style="color: #000000;">Warriors</span>
                                                            <span class="team-leader__player-position">Stagione 2016 / 17</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">19</td>
                                                <td class="team-leader__avg">
                                                    <div class="circular">
                                                        <div class="circular__bar" data-percent="84.4">
                                                            <span class="circular__percents">8.44</span>
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


                    </div>
                    <!-- Sidebar / End -->
                </div>

            </div>
        </div>

        <!-- Content / End -->

