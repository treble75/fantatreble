

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title">Bacheca <span class="highlight"><?= $_SESSION['squadra'] ?></span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/myteam">My Team</a></li>
                            <li class="active">Bacheca</li>
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
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_statistiche" class="content-filter__link"><small>My Team</small>Statistiche</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_risultati" class="content-filter__link"><small>My Team</small>Risultati</a></li>
                    <li class="content-filter__item "><a href="<?= base_url('/') ?>index.php/utente/myteam_calendario" class="content-filter__link"><small>My Team</small>Calendario</a></li>
                    <li class="content-filter__item content-filter__item--active"><a href="<?= base_url('/') ?>index.php/utente/myteam_bacheca" class="content-filter__link"><small>My Team</small>Bacheca</a></li>
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

                        <!-- Staff Member -->
                        <div class="card card--clean alc-staff">
                            <div class="card__header card__header--has-btn">
                                <h4>Bacheca</h4>
                                <!-- <a class="btn btn-default btn-outline btn-xs card-header__button" href="#" title="Go to the Team">Go to the Team</a> -->
                            </div>
                            <div class="card__content">

                                <div class="card">
                                    <div class="card__content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="alc-staff__photo">
                                                    <img src="<?= base_url('/') ?>images/<?= $_SESSION['id_utente'] ?>.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alc-staff-inner">
                                                    <header class="alc-staff__header">
                                                        <h1 class="alc-staff__header-name"><span class="alc-staff__header-last-name"><?= $_SESSION['squadra'] ?></span></h1>
                                                        <!-- <span class="alc-staff__header-role">Coach</span> -->
                                                    </header>

                                                    <!-- Excerpt -->
                                                    <div class="alc-staff-excerpt">
                                                        Sed ut perspiciatis unde omnis iste natus error sit lorel voluptatem accusantium doloremque de totam rem aperiam, eaque inventore veritatis.
                                                    </div>
                                                    <!-- Excerpt / End -->

                                                    <!-- Details -->
                                                    <dl class="alc-staff-details">
                                                        <dt class="alc-staff-details__label">Born:</dt>
                                                        <dd class="alc-staff-details__value">Australia</dd>

                                                        <dt class="alc-staff-details__label">Age:</dt>
                                                        <dd class="alc-staff-details__value">48</dd>

                                                        <dt class="alc-staff-details__label">Birthday:</dt>
                                                        <dd class="alc-staff-details__value">October 26th, 1968</dd>

                                                        <dt class="alc-staff-details__label">Current Team:</dt>
                                                        <dd class="alc-staff-details__value">Alchemists</dd>

                                                        <dt class="alc-staff-details__label">Past Teams:</dt>
                                                        <dd class="alc-staff-details__value">Lucky Clovers</dd>

                                                        <dt class="alc-staff-details__label">Competitions:</dt>
                                                        <dd class="alc-staff-details__value">Regular Season</dd>

                                                        <dt class="alc-staff-details__label">Seasons:</dt>
                                                        <dd class="alc-staff-details__value">2011, 2012, 2014, 2016, 2017</dd>

                                                    </dl>
                                                    <!-- Details / End -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- Staff Member / End -->

                        <!-- Lates News -->
                        <div class="card card--clean">
                            <header class="card__header card__header--has-btn">
                                <h4>Staff Related News</h4>
                                <a href="blog-1.html" class="btn btn-default btn-outline btn-xs card-header__button">See All Related News</a>
                            </header>
                            <div class="card__content">

                                <!-- Posts Grid -->
                                <div class="posts posts--cards post-grid post-grid--2cols post-grid--fitRows row">

                                    <div class="post-grid__item col-xs-6">
                                        <div class="posts__item posts__item--card posts__item--category-1 card">
                                            <figure class="posts__thumb">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">The Team</span>
                                                </div>
                                                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img2.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner card__content">
                                                <a href="#" class="posts__cta"></a>
                                                <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                                <h6 class="posts__title"><a href="#">Cheerleader tryouts will start next Friday at 5pm</a></h6>
                                                <div class="posts__excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                                                </div>
                                            </div>
                                            <footer class="posts__footer card__footer">
                                                <div class="post-author">
                                                    <figure class="post-author__avatar">
                                                        <img src="<?= base_url('/') ?>assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                                                    </figure>
                                                    <div class="post-author__info">
                                                        <h4 class="post-author__name">James Spiegel</h4>
                                                    </div>
                                                </div>
                                                <ul class="post__meta meta">
                                                    <li class="meta__item meta__item--views">2369</li>
                                                    <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                                    <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                                </ul>
                                            </footer>
                                        </div>
                                    </div>

                                    <div class="post-grid__item col-xs-6">
                                        <div class="posts__item posts__item--card posts__item--category-1 card">
                                            <figure class="posts__thumb">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">The Team</span>
                                                </div>
                                                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/post-img3.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner card__content">
                                                <a href="#" class="posts__cta"></a>
                                                <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                                <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                                                <div class="posts__excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                                                </div>
                                            </div>
                                            <footer class="posts__footer card__footer">
                                                <div class="post-author">
                                                    <figure class="post-author__avatar">
                                                        <img src="<?= base_url('/') ?>assets/images/samples/avatar-2.jpg" alt="Post Author Avatar">
                                                    </figure>
                                                    <div class="post-author__info">
                                                        <h4 class="post-author__name">Jessica Hoops</h4>
                                                    </div>
                                                </div>
                                                <ul class="post__meta meta">
                                                    <li class="meta__item meta__item--views">2369</li>
                                                    <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                                    <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                                </ul>
                                            </footer>
                                        </div>
                                    </div>

                                </div>
                                <!-- Post Grid / End -->

                            </div>
                        </div>
                        <!-- Lates News / End -->

                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div class="sidebar col-md-4">

                        <!-- Widget: Player Newslog -->
                        <aside class="widget card widget--sidebar widget-newslog">
                            <div class="widget__title card__header">
                                <h4>Staff Newslog</h4>
                            </div>
                            <div class="widget__content card__content">
                                <ul class="newslog">

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Jenny Thomps</strong> is now the new <strong>Team Recruiter</strong> for the East Coast Colleges.</div>
                                            <div class="newslog__date">December 19, 2015</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--injury">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Robert Frankson</strong> will have a surgery and will be out for a month. Interim coach will be <strong>Frank Roberts</strong>.</div>
                                            <div class="newslog__date">September 26, 2014</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Max Stevens</strong> is now the <strong>2nd Team Doctor</strong> after a succesfull run in the Sharks.</div>
                                            <div class="newslog__date">September 26, 2014</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--exit">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Tommy Flankers</strong> left the team after 2 years as the <strong>2nd Team Doctor</strong>.</div>
                                            <div class="newslog__date">August 12, 2014</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Patrick Storm</strong> is now the new <strong>Team Recruiter</strong> for the West Coast Colleges.</div>
                                            <div class="newslog__date">April 19, 2014</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Alexa Polson</strong> is now the new <strong>Athletic Trainer</strong> after a succesfull run in the Pirates.</div>
                                            <div class="newslog__date">November 27, 2013</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Savannah Lavender</strong> is the new <strong>Team Nutritionist</strong> with more than 500.000 followers.</div>
                                            <div class="newslog__date">February 15, 2012</div>
                                        </div>
                                    </li>

                                    <li class="newslog__item newslog__item--join">
                                        <div class="newslog__item-inner">
                                            <div class="newslog__content"><strong>Robert Frankson</strong> is now the new <strong>Alchemist Coach</strong> after a succesfull run in the Lucky Clovers.</div>
                                            <div class="newslog__date">March 22, 2008</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Player Newslog / End -->


                    </div>
                    <!-- Sidebar / End -->
                </div>

            </div>
        </div>

        <!-- Content / End -->

