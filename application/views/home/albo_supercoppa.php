	
  

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
              <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_statistiche" class="content-filter__link"><small>Albo d'oro</small>Statistiche</a></li>
              <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo" class="content-filter__link"><small>Albo d'oro</small>Treble League</a></li>
              <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_champions" class="content-filter__link"><small>Albo d'oro</small>Champions League</a></li>
              <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/home/albo_coppa" class="content-filter__link"><small>Albo d'oro</small>Coppa Treble</a></li>
              <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/home/albo_supercoppa" class="content-filter__link"><small>Albo d'oro</small>SuperCoppa Treble</a></li>
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
            <!-- Anno da modificare -->
            <h4>SuperCoppa Treble</h4>
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
                    <a href="_soccer_player-stats.html" class="btn btn-default btn-outline btn-xs card-header__button">See complete games log</a>
              </div>
              <div class="card__content">
                <div class="table-responsive">
                  <table class="table table-hover game-player-result">
                    <thead>
                      <tr>
                        <th class="game-player-result__date">Stagione</th>
                        <th class="game-player-result__vs">Vincitore</th>
                        <th class="game-player-result__fc">Risultato</th>
                        <th class="game-player-result__vs" style="text-align: right;">Finalista</th>
                        <th class="game-player-result__rc">FP</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class="game-player-result__date">2017 / 18</td>
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
                            <td class="game-player-result__fc" style="color: #1892ED; font-size: 12px;">2 - 1</td>
                            <td class="game-player-result__finalista">
                              <div class="team-meta" style="text-align: right;">
                                <div class="team-meta__info" style="text-align: right;">
                                  <h6 class="team-meta__name" style="color: #000000; font-size: 12px; text-align: right;">All Blacks</h6>
                                  <span class="team-meta__place" style="text-align: right;">Luca Cerri</span>
                                </div>
                                <figure class="team-meta__logo" style="text-align: right;">
                                  <img src="<?= base_url('/') ?>images/albo/logo/allblacks.png" alt="" width="30px">
                                </figure>
                              </div>
                            </td>
                            <td class="game-player-result__rc">75.0 - 70.0</td>
                        </tr>
                        <tr>
                            <td class="game-player-result__date">2016 / 17</td>
                            <td class="game-player-result__vs">
                              <div class="team-meta">
                                <figure class="team-meta__logo">
                                  <img src="<?= base_url('/') ?>images/albo/logo/zacapa.png" alt="" width="30px">
                                </figure>
                                <div class="team-meta__info">
                                  <h6 class="team-meta__name" style="color: #1892ED; font-size: 12px;">Zacapa 23</h6>
                                  <span class="team-meta__place">Claudio Frioni</span>
                                </div>
                              </div>
                            </td>
                            <td class="game-player-result__fc" style="color: #1892ED; font-size: 12px;">2 - 2</td>
                            <td class="game-player-result__finalista">
                              <div class="team-meta" style="text-align: right;">
                                <div class="team-meta__info" style="text-align: right;">
                                  <h6 class="team-meta__name" style="color: #000000; font-size: 12px; text-align: right;">Frank One</h6>
                                  <span class="team-meta__place" style="text-align: right;">Antonio Francone</span>
                                </div>
                                <figure class="team-meta__logo">
                                  <img src="<?= base_url('/') ?>images/albo/logo/frankone.png" alt="" width="30px">
                                </figure>
                              </div>
                            </td>
                            <td class="game-player-result__rc">74.0 - 73.5</td>
                        </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Last Game Log / End -->

            
          </div>
          <!-- Content / End -->

          <!-- Sidebar -->
          <div class="sidebar col-md-4">

              
            <!-- Widget: Team Leaders -->
            <aside class="widget widget--sidebar card card--has-table widget-leaders">
              <div class="card__header">
                <h4>Top 10 Capocannonieri</h4>
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
                              <img src="<?= base_url('/') ?>images/albo/giocatori/astori.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">ASTORI Davide</h5>
                              <span class="team-leader__player-position" style="color: #000000;">All Blacks</span>
                              <span class="team-leader__player-position">Stagione 2017 / 18</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="110.0">
                              <span class="circular__percents">11.00</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="team-leader__player">
                          <div class="team-leader__player-info">
                            <figure class="team-leader__player-img team-leader__player-img--sm">
                              <img src="<?= base_url('/') ?>images/albo/giocatori/pjanic.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">PJANIC Miralem</h5>
                              <span class="team-leader__player-position" style="color: #000000;">Frank One</span>
                              <span class="team-leader__player-position">Stagione 2016 / 17</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="110.0">
                              <span class="circular__percents">11.00</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="team-leader__player">
                          <div class="team-leader__player-info">
                            <figure class="team-leader__player-img team-leader__player-img--sm">
                              <img src="<?= base_url('/') ?>images/albo/giocatori/iago.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">IAGO Falque</h5>
                              <span class="team-leader__player-position" style="color: #000000;">Frank One</span>
                              <span class="team-leader__player-position">Stagione 2017 / 18</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="105.0">
                              <span class="circular__percents">10.50</span>
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
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="100.0">
                              <span class="circular__percents">10.00</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="team-leader__player">
                          <div class="team-leader__player-info">
                            <figure class="team-leader__player-img team-leader__player-img--sm">
                              <img src="<?= base_url('/') ?>images/albo/giocatori/hamsik.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">HAMSIK Marek</h5>
                              <span class="team-leader__player-position" style="color: #000000;">Zacapa 23</span>
                              <span class="team-leader__player-position">Stagione 2016 / 17</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="100.0">
                              <span class="circular__percents">10.00</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="team-leader__player">
                          <div class="team-leader__player-info">
                            <figure class="team-leader__player-img team-leader__player-img--sm">
                              <img src="<?= base_url('/') ?>images/albo/giocatori/higuain.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">HIGUAIN Gonzalo</h5>
                              <span class="team-leader__player-position" style="color: #000000;">Frank One</span>
                              <span class="team-leader__player-position">Stagione 2017 / 18</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="90.0">
                              <span class="circular__percents">9.00</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="team-leader__player">
                          <div class="team-leader__player-info">
                            <figure class="team-leader__player-img team-leader__player-img--sm">
                              <img src="<?= base_url('/') ?>images/albo/giocatori/simeone.png" alt="">
                            </figure>
                            <div class="team-leader__player-inner">
                              <h5 class="team-leader__player-name" style="color: #1892ED; font-size: 12px;">SIMEONE Giovanni</h5>
                              <span class="team-leader__player-position" style="color: #000000;">All Blacks</span>
                              <span class="team-leader__player-position">Stagione 2017 / 18</span>
                            </div>
                          </div>
                        </td>
                        <td class="team-leader__goals" style="color: #1892ED; font-size: 12px;">1</td>
                        <td class="team-leader__avg">
                          <div class="circular">
                            <div class="circular__bar" data-percent="85.0">
                              <span class="circular__percents">8.50</span>
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

