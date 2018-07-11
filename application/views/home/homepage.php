
        <!-- Hero Slider
        1) Le immagini dello slider sono contenute in assets/images/soccer/samples e sono : 
           hero-slide-1.jpg, hero-slide-2.jpg e hero-slide-3.jpg
        2) Hanno dimensioni ideali : 1500x560px
        ================================================== -->

        <!-- Setto la giornata -->
        <?php
        $giornata = (isset($giornata) ? $giornata : 34);
        ?>

        <div class="hero-slider-wrapper">

            <div class="hero-slider">

                <!-- Slide #1 -->
                <div class="hero-slider__item hero-slider__item--img1">

                    <div class="container hero-slider__item-container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <!-- Post Meta - Top -->
                                <div class="post__meta-block post__meta-block--top">

                                    <!-- Post Category -->
                                    <div class="post__category">
                                        <span class="label posts__cat-label">Treble League</span>
                                    </div>
                                    <!-- Post Category / End -->

                                    <!-- Post Title -->
                                    <h1 class="page-heading__title"><a href="<?= base_url('/') ?>index.php/home/campionato"><?= $news_league[0]['riga1'] ?></br><?= $news_league[0]['riga2'] ?></a></h1>
                                    <!-- Post Title / End -->

                                    <!-- Post Meta Info -->
                                    <ul class="post__meta meta">
                                        <li class="meta__item meta__item--date"><time datetime="<?= $news_league[0]['data'] ?>"><?= dataSettimanale($news_league[0]['data']) ?></time></li>
                                    </ul>
                                    <!-- Post Meta Info / End -->

                                </div>
                                <!-- Post Meta - Top / End -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Slide #1 / End -->

                <!-- Slide #2 -->
                <div class="hero-slider__item hero-slider__item--img2">

                    <div class="container hero-slider__item-container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <!-- Post Meta - Top -->
                                <div class="post__meta-block post__meta-block--top">

                                    <!-- Post Category -->
                                    <div class="post__category">
                                        <span class="label posts__cat-label">Champions League</span>
                                    </div>
                                    <!-- Post Category / End -->

                                    <!-- Post Title -->
                                    <h1 class="page-heading__title"><a href="<?= base_url('/') ?>index.php/home/champions"><?= $news_champions[0]['riga1'] ?></br><?= $news_champions[0]['riga2'] ?></a></h1>
                                    <!-- Post Title / End -->

                                    <!-- Post Meta Info -->
                                    <ul class="post__meta meta">
                                        <li class="meta__item meta__item--date"><time datetime="<?= $news_champions[0]['data'] ?>"><?= dataSettimanale($news_champions[0]['data']) ?></time></li>
                                    </ul>
                                    <!-- Post Meta Info / End -->

                                </div>
                                <!-- Post Meta - Top / End -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Slide #2 / End -->

                <!-- Slide #3 -->
                <div class="hero-slider__item hero-slider__item--img3">

                    <div class="container hero-slider__item-container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <!-- Post Meta - Top -->
                                <div class="post__meta-block post__meta-block--top">

                                    <!-- Post Category -->
                                    <div class="post__category">
                                        <span class="label posts__cat-label">Coppa Treble</span>
                                    </div>
                                    <!-- Post Category / End -->

                                    <!-- Post Title -->
                                    <h1 class="page-heading__title"><a href="<?= base_url('/') ?>index.php/home/coppa"><?= $news_coppa[0]['riga1'] ?></br><?= $news_coppa[0]['riga2'] ?></a></h1>
                                    <!-- Post Title / End -->

                                    <!-- Post Meta Info -->
                                    <ul class="post__meta meta">
                                        <li class="meta__item meta__item--date"><time datetime="<?= $news_coppa[0]['data'] ?>"><?= dataSettimanale($news_coppa[0]['data']) ?></time></li>
                                    </ul>
                                    <!-- Post Meta Info / End -->

                                </div>
                                <!-- Post Meta - Top / End -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Slide #3 / End -->
            </div>

            <!-- Mini titoli inferiori allo slider -->
            <div class="hero-slider-thumbs-wrapper">
                <div class="container">
                    <div class="hero-slider-thumbs posts posts--simple-list">
                        <div class="hero-slider-thumbs__item">
                            <div class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">Treble League</span>
                                    </div>
                                    <h6 class="posts__title"><?= $news_league[0]['riga1'] ?></h6>
                                    <h6 class="posts__title"><?= $news_league[0]['riga2'] ?></h6>
                                    <time datetime="<?= $news_league[0]['data'] ?>" class="posts__date"><?= dataSettimanale($news_league[0]['data']) ?></time>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slider-thumbs__item">
                            <div class="posts__item posts__item--category-2">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">Champions League</span>
                                    </div>
                                    <h6 class="posts__title"><?= $news_champions[0]['riga1'] ?></h6>
                                    <h6 class="posts__title"><?= $news_champions[0]['riga2'] ?></h6>
                                    <time datetime="<?= $news_champions[0]['data'] ?>" class="posts__date"><?= dataSettimanale($news_champions[0]['data']) ?></time>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slider-thumbs__item">
                            <div class="posts__item posts__item--category-3">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">Coppa Treble</span>
                                    </div>
                                    <h6 class="posts__title"><?= $news_coppa[0]['riga1'] ?></h6>
                                    <h6 class="posts__title"><?= $news_coppa[0]['riga2'] ?></h6>
                                    <time datetime="<?= $news_coppa[0]['data'] ?>" class="posts__date"><?= dataSettimanale($news_coppa[0]['data']) ?></time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mini titoli inferiori allo slider / End -->

        </div>


        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">

                <div class="row">
                    <!-- Content -->
                    <div class="content col-md-8">

                        <!-- Ultimi Risultati -->
                        <div class="card card--clean">
                            <header class="card__header card__header--has-filter">
                                <h4>Ultimi Risultati</h4>
                                <ul class="category-filter category-filter--featured">
                                    <li class="category-filter__item"><a href="#" class="category-filter__link category-filter__link--reset category-filter__link--active">Tutti</a></li>
                                    <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-1">Treble League</a></li>
                                    <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-2">Champions League</a></li>
                                    <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-3">Coppa Treble</a></li>
                                </ul>
                            </header>

                            <div class="card__content">

                                <!-- Slider -->
                                <div class="slick posts posts--slider-featured posts-slider posts-slider--center">

                                    <div class="posts__item posts__item--category-1">
                                        <a href="<?= base_url('/') ?>index.php/home/campionato" class="posts__link-wrapper">

                                            <!-- Widget: Latest Results -->
                                            <aside class="widget card widget--sidebar widget-results">

                                                <div class="widget__content card__content">
                                                    <ul class="widget-results__list">

                                                        <!-- Risultati -->
                                                        <li class="widget-results__item">
                                                            <h5 class="widget-results__title" style="color: #1892ED; font-size: 14px;">Treble League</h5>
                                                            <h6 class="widget-results__title" style="font-size: 12px;">Giornata <?= $giornata = (($giornata > 1) ? ($giornata - 1) : "N.D.") ?></h6>
                                                            <?php
                                                            if ($giornata > 0) {
                                                                foreach ($risultati_giornata as $row) {
                                                                    ?>
                                                                    <div class="widget-results__content">
                                                                        <div class="widget-results__team widget-results__team--first" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__result">
                                                                            <div class="widget-results__score" style="color: #1892ED; font-size: 14px;" >
                                                                                <span class="widget-results__score-draw"></span> <?= $row['risultato1'] . " - " . $row['risultato2'] ?> <span class="widget-results__score-draw"></span>
                                                                                <div class="widget-results__status"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__team widget-results__team--second" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="widget-results__title"><?= dataSettimanale($row['data']) ?></h5>
                                                                    <?php
                                                                }
                                                            }   else { ?>
                                                                    <div class="spacer"></div>
                                                                    <div align='center'>Nessuna partita ancora disputata</div>
                                                                    <div class="spacer"></div>
                                                                <?php
                                                                }
                                                                ?>

                                                        </li>
                                                        <!-- Risultati / End -->

                                                    </ul>
                                                </div>
                                            </aside>
                                            <!-- Widget: Latest Results / End -->

                                        </a>
                                    </div>

                                    <div class="posts__item posts__item--category-2">
                                        <a href="<?= base_url('/') ?>index.php/home/champions" class="posts__link-wrapper">

                                            <!-- Widget: Latest Results -->
                                            <aside class="widget card widget--sidebar widget-results">

                                                <div class="widget__content card__content">
                                                    <ul class="widget-results__list">

                                                        <!-- Risultati -->
                                                        <li class="widget-results__item">
                                                            <h5 class="widget-results__title" style="color: #1892ED; font-size: 14px;">Champions League</h5>
                                                            <?php
                                                            $labelChampions = "";
                                                            switch ($giornata) {
                                                                case ($giornata == 2):
                                                                    $labelChampions = 'Giornata 1';
                                                                    break;
                                                                case ($giornata == 3 || $giornata == 4 || $giornata == 5):
                                                                    $labelChampions = 'Giornata 2';
                                                                    break;
                                                                case ($giornata == 6 || $giornata == 7 || $giornata == 8):
                                                                    $labelChampions = 'Giornata 3';
                                                                    break;
                                                                case ($giornata == 9 || $giornata == 10 || $giornata == 11):
                                                                    $labelChampions = 'Giornata 4';
                                                                    break;
                                                                case ($giornata == 12):
                                                                    $labelChampions = 'Giornata 5';
                                                                    break;
                                                                case ($giornata == 13 || $giornata == 14 || $giornata == 15):
                                                                    $labelChampions = 'Giornata 6';
                                                                    break;
                                                                case ($giornata == 16):
                                                                    $labelChampions = 'Giornata 7';
                                                                    break;
                                                                case ($giornata == 17 || $giornata == 18):
                                                                    $labelChampions = 'Giornata 8';
                                                                    break;
                                                                case ($giornata == 19 || $giornata == 20 || $giornata == 21):
                                                                    $labelChampions = 'Giornata 9';
                                                                    break;
                                                                case ($giornata == 22):
                                                                    $labelChampions = 'Giornata 10';
                                                                    break;
                                                                case ($giornata == 23 || $giornata == 24 || $giornata == 25 || $giornata == 26):
                                                                    $labelChampions = 'Quarti di finale';
                                                                    break;
                                                                case ($giornata == 27 || $giornata == 28 || $giornata == 29):
                                                                    $labelChampions = 'Semifinali';
                                                                    break;
                                                                case ($giornata == 30 || $giornata == 31 || $giornata == 32 || $giornata == 33 || $giornata == 34 || $giornata == 35):
                                                                    $labelChampions = 'Finale';
                                                                    break;
                                                            }
                                                            ?>
                                                            <h6 class="widget-results__title" style="font-size: 12px;"><?= $labelChampions ?></h6>
                                                            <?php
                                                            if ($giornata > 1) {
                                                                foreach ($ultima_champions as $row) {
                                                                    ?>
                                                                    <div class="widget-results__content">
                                                                        <div class="widget-results__team widget-results__team--first" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__result">
                                                                            <div class="widget-results__score"  style="color: #1892ED; font-size: 14px;" >
                                                                                <span class="widget-results__score-draw"></span> <?= $row['risultato1'] . " - " . $row['risultato2'] ?> <span class="widget-results__score-draw"></span>
                                                                                <div class="widget-results__status"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__team widget-results__team--second" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="widget-results__title"><?= dataSettimanale($row['data']) ?></h5>
                                                                    <?php
                                                                }
                                                            }   else { ?>
                                                                    <div class="spacer"></div>
                                                                    <div align='center'>Nessuna partita ancora disputata</div>
                                                                    <div class="spacer"></div>
                                                                <?php
                                                                }
                                                                ?>

                                                        </li>
                                                        <!-- Risultati / End -->

                                                    </ul>
                                                </div>
                                            </aside>
                                            <!-- Widget: Latest Results / End -->

                                        </a>
                                    </div>

                                    <div class="posts__item posts__item--category-3">
                                        <a href="<?= base_url('/') ?>index.php/home/coppa" class="posts__link-wrapper">

                                            <!-- Widget: Latest Results -->
                                            <aside class="widget card widget--sidebar widget-results">

                                                <div class="widget__content card__content">
                                                    <ul class="widget-results__list">

                                                        <!-- Risultati -->
                                                        <li class="widget-results__item">
                                                            <h5 class="widget-results__title" style="color: #1892ED; font-size: 14px;">Coppa Treble</h5>
                                                            <?php
                                                            $labelCoppa = "";
                                                            switch ($giornata) {
                                                                case ($giornata == 4 || $giornata == 5 || $giornata == 6):
                                                                    $labelCoppa = 'Preliminari';
                                                                    break;
                                                                case ($giornata == 7 || $giornata == 8 || $giornata == 9):
                                                                    $labelCoppa = 'Preliminari';
                                                                    break;
                                                                case ($giornata == 10):
                                                                    $labelCoppa = 'Quarti di Finale';
                                                                    break;
                                                                case ($giornata == 11 || $giornata == 12 || $giornata == 13 || $giornata == 14):
                                                                    $labelCoppa = 'Quarti di Finale';
                                                                    break;
                                                                case ($giornata == 15 || $giornata == 16 || $giornata == 17 || $giornata == 18 || $giornata == 19 || $giornata == 20 || $giornata == 21 || $giornata == 22 || $giornata == 23 || $giornata == 24 || $giornata == 25):
                                                                    $labelCoppa = 'Semifinali';
                                                                    break;
                                                                case ($giornata == 26 || $giornata == 27 || $giornata == 28 || $giornata == 29 || $giornata == 30 || $giornata == 31 || $giornata == 32 || $giornata == 33 || $giornata == 34 || $giornata == 35 ):
                                                                    $labelCoppa = 'Finale';
                                                                    break;
                                                            }
                                                            ?>
                                                            <h6 class="widget-results__title" style="font-size: 12px;"><?= $labelCoppa ?></h6>
                                                            <?php
                                                            if ($giornata > 3) {
                                                                foreach ($ultima_coppa as $row) {
                                                                    ?>
                                                                    <div class="widget-results__content">
                                                                        <div class="widget-results__team widget-results__team--first" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__result">
                                                                            <div class="widget-results__score"  style="color: #1892ED; font-size: 14px;" >
                                                                                <span class="widget-results__score-draw"></span> <?= $row['risultato1'] . " - " . $row['risultato2'] ?> <span class="widget-results__score-draw"></span>
                                                                                <div class="widget-results__status"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-results__team widget-results__team--second" style="width: 45%">
                                                                            <figure class="widget-results__team-logo">
                                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" width="40" >
                                                                            </figure>
                                                                            <div class="widget-results__team-details">
                                                                                <h5 class="widget-results__team-name"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h5>
                                                                                <span class="widget-results__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="widget-results__title"><?= dataSettimanale($row['data']) ?></h5>
                                                                    <?php
                                                                }
                                                            }   else { ?>
                                                                    <div class="spacer"></div>
                                                                    <div align='center'>Nessuna partita ancora disputata</div>
                                                                    <div class="spacer"></div>
                                                                <?php
                                                                }
                                                                ?>

                                                        </li>
                                                        <!-- Risultati / End -->

                                                    </ul>
                                                </div>
                                            </aside>
                                            <!-- Widget: Latest Results / End -->

                                        </a>
                                    </div>

                                </div>
                                <!-- Slider / End -->

                            </div>
                        </div>
                        <!-- Featured News / End -->


                        <!-- Post Area 2 -->
                        <div class="posts posts--cards post-grid row">

                            <div class="post-grid__item col-sm-6">

                                <!-- Match Clou --->  
                                <div class="posts__item posts__item--card posts__item--category-1 card">
                                    <div class="widget__title card__header">
                                        <h4>Top Match</h4>
                                    </div>
                                    <div class="widget__content card__content">

                                        <!-- Top Match Preview -->
                                        <div class="match-preview">
                                            <section class="match-preview__body">
                                                <header class="match-preview__header">
                                                    <?php
                                                    $blocco = $this->mdl_utenti->getBlocco();
                                                    if (is_array(@$topmatch) && @$topmatch[0] != "") {
                                                        switch ($topmatch[0]['competizione']) {
                                                            case "supercoppa":
                                                                $chk = "SuperCoppa Treble";
                                                                $gara = "supercoppa";
                                                                break;
                                                            case "league":
                                                                $chk = "Treble League";
                                                                $gara = "calendario";
                                                                break;
                                                            case "champions":
                                                                $chk = "Champions League";
                                                                $gara = "champions";
                                                                break;
                                                            case "coppa":
                                                                $chk = "Coppa Treble";
                                                                $gara = "coppa";
                                                                break;
                                                            default:
                                                                break;
                                                        }
                                                        ?> 
                                                        <time class="match-preview__date" datetime="<?= substr($blocco, 0, 10) ?>"><?= dataSettimanale($blocco) ?></time>
                                                        <h3 class="match-preview__title match-preview__title--lg"><?= $chk ?></h3>
                                                    <?php } else {
                                                        ?>
                                                        <span class="label posts__cat-label">Da Definire</span>
                                                        <div class="spacer"></div>
                                                        <?php
                                                    }
                                                    ?>
                                                </header>
                                                <?php
                                                if (is_array(@$topmatch) && @$topmatch[0] != "") {
                                                    ?>
                                                    <div class="match-preview__content">

                                                        <!-- 1st Team -->
                                                        <div class="match-preview__team match-preview__team--first">
                                                            <figure class="match-preview__team-logo">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $topmatch[0]['id1'] ?>.png" alt="">
                                                            </figure>
                                                            <h5 class="match-preview__team-name"><?= $this->mdl_utenti->getSquadra($topmatch[0]['id1']) ?></h5>
                                                            <div class="match-preview__team-info"><?= $this->mdl_utenti->getNomeUtente($topmatch[0]['id1']) ?></div>
                                                        </div>
                                                        <!-- 1st Team / End -->

                                                        <div class="match-preview__vs">
                                                            <div class="match-preview__conj">VS</div>
                                                            <div class="match-preview__match-info">
                                                                <time class="match-preview__match-time" datetime="<?= $blocco ?>"><?= substr($blocco, 11, 5) ?></time>
                                                                <div class="match-preview__match-place"></div>
                                                            </div>
                                                        </div>

                                                        <!-- 2nd Team -->
                                                        <div class="match-preview__team match-preview__team--second">
                                                            <figure class="match-preview__team-logo">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $topmatch[0]['id2'] ?>.png" alt="">
                                                            </figure>
                                                            <h5 class="match-preview__team-name"><?= $this->mdl_utenti->getSquadra($topmatch[0]['id2']) ?></h5>
                                                            <div class="match-preview__team-info"><?= $this->mdl_utenti->getNomeUtente($topmatch[0]['id2']) ?></div>
                                                        </div>
                                                        <!-- 2nd Team / End -->

                                                    </div>
                                                    <?php
                                                }
                                                ?>    
                                            </section>
                                            <?php
                                            if (is_array(@$topmatch) && @$topmatch[0] != "") {
                                                ?>
                                                <div class="countdown__content">
                                                    <!-- Conto alla rovescia Top Match --->                                        
                                                    <div class="countdown-counter" data-date="<?= $blocco ?>"></div>
                                                </div>
                                                <div class="match-preview__action match-preview__action--ticket">
                                                    <a href="<?= base_url('/') ?>index.php/home/<?= $gara ?>" class="btn btn-primary-inverse btn-lg btn-block">Vedi Calendario</a>
                                                </div>
                                                <?php
                                            }
                                            ?>  
                                        </div>
                                        <!--  Match Clou   / End -->

                                    </div>
                                </div>
                            </div>

                            <!--  Calciomercato -->
                            <div class="post-grid__item col-sm-6">
                                <div class="posts__item posts__item--card posts__item--category-1 card">

                                    <div class="widget__title card__header">
                                        <h4>Calciomercato</h4>
                                    </div>
                                    <div class="widget__content card__content">
                                        <ul class="comments-list">

                                            <?php
                                            if (isset($offerte[0]['offerta'])) {
                                                foreach (@$offerte as $row) {
                                                    ?>
                                                    <li class="comments-list__item">
                                                        <header class="comments-list__header" style="vertical-align:middle !important;">
                                                            <figure style="border-radius: 0% !important; vertical-align:middle !important; margin-right: 20px !important; display: inline-block !important; overflow: hidden !important;">
                                                                <img src="<?= base_url('/') ?>images/users/<?= $row['id_utente'] ?>.png" width="60px">
                                                            </figure>
                                                            <div class="comments-list__info">
                                                                <h5 class="comments-list__author-name"><?= $this->mdl_utenti->getNomeUtente($row['id_utente']) ?></h5>
                                                                <time class="comments-list__date" datetime="2016-08-23"><?= $this->mdl_utenti->getSquadra($row['id_utente']) ?></time>
                                                                <time class="comments-list__date" datetime="2016-08-23"><?= $row['orario'] ?></time>
                                                            </div>
                                                            <a href="<?= base_url('/') ?>index.php/utente/calciomercato" class="comments-list__link"><span class="icon-options"></span></a>
                                                        </header>
                                                        <div class="comments-list__body">
                                                            <br>
                                                            <p align="center" style="color: #1892ED"><?= $row['offerta'] ?></p>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <span class="label posts__cat-label">Non sono presenti offerte di mercato</span>
                                                <div class="spacer"></div>
                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!--  Calciomercato   / End -->

                        </div>
                        <!-- Post Area 2 / End -->

                        <!-- Post Area 3 -->
                        <div class="row">
                            <div class="col-sm-6">

                                <!-- Widget: Capocannonieri -->
                                <aside class="widget widget--sidebar card card--has-table widget-leaders">
                                    <div class="widget__title card__header">
                                        <h4>Capocannonieri</h4>
                                    </div>
                                    <div class="widget__content card__content">

                                        <!-- Leader: Points -->
                                        <div class="table-responsive">
                                            <table class="table team-leader">
                                                <thead>
                                                    <tr>
                                                        <!-- Anno da modificare -->
                                                        <th class="team-leader__type">Treble League 2018/19</th>
                                                        <th class="team-leader__goals">Gol</th>
                                                        <th class="team-leader__avg">Media</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    if ($giornata > 0) {
                                                        foreach ($bomber as $row) {
                                                            if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                                $filename = $row['id_giocatore'] . ".png";
                                                            } else
                                                                $filename = "dummy.png";

                                                            switch ($i) {
                                                                case ($i == 1):
                                                                    $bgcolor = 'bgcolor="#b6ffb3"';
                                                                    break;
                                                                case ($i == 2);
                                                                    $bgcolor = 'bgcolor="#ccffc9"';
                                                                    break;
                                                                case ($i == 3);
                                                                    $bgcolor = 'bgcolor="#e7ffe6"';
                                                                    break;
                                                                case ($i > 3);
                                                                    $bgcolor = "";
                                                                    break;
                                                            }
                                                            ?>
                                                            <tr <?= $bgcolor ?> >
                                                                <td class="team-leader__player">
                                                                    <div class="team-leader__player-info">
                                                                        <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                            <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" alt="">
                                                                        </figure>
                                                                        <div class="team-leader__player-inner">
                                                                            <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . $row['nome'] ?></h5>
                                                                            <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="team-leader__goals" style="color: #1892ED; font-size: 14px;" ><?= $row['gol'] ?></td>
                                                                <td class="team-leader__avg">
                                                                    <div class="circular">
                                                                        <?php $percentuale = number_format(($row['fv'] * 10), 2); ?>
                                                                        <div class="circular__bar" data-percent="<?= $percentuale ?>">
                                                                            <span class="circular__percents"><?= number_format($row['fv'], 2) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                            $i++;
                                                        }
                                                    }   else { ?>
                                                            <div class="spacer"></div>
                                                            <span class="label posts__cat-label" style="text-align: center; font-size: 10px; margin-left: 25px;">Nessuna partita ancora disputata</span>
                                                            <div class="spacer"></div>
                                                        <?php
                                                        }
                                                        ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Leader: Points / End -->


                                    </div>
                                </aside>
                                <!-- Widget: Capocannonieri / End -->

                            </div>

                            <div class="col-sm-6">
                                <!-- Widget: Match Announcement -->

                                <aside class="widget widget--sidebar card widget-preview">
                                    <div class="widget__title card__header">
                                        <h4>Prossima Giornata</h4>
                                    </div>
                                    <div class="widget__content card__content">

                                        <!-- Match Preview -->
                                        <div class="match-preview">
                                            <section class="match-preview__body">
                                                <?php
                                                if ($prossima_giornata[0]['giornata'] == 36) { ?>
                                                    <header class="match-preview__header">
                                                        <h3 class="match-preview__title match-preview__title--lg">Stagione terminata</h3>
                                                    </header>
                                                <?php
                                                } else {
                                                ?>
                                                    <header class="match-preview__header">
                                                        <time class="match-preview__date"><?= dataSettimanale($prossima_giornata[0]['data']) ?></time>
                                                        <h3 class="match-preview__title match-preview__title--lg">Treble League</h3>
                                                        <time class="match-preview__date">Giornata <?= $prossima_giornata[0]['giornata'] ?></time>
                                                    </header>
                                                    <?php
                                                    foreach ($prossima_giornata as $row) {
                                                    ?>
                                                        <div class="match-preview__content">

                                                            <!-- 1st Team -->
                                                            <div class="match-preview__team match-preview__team--first">
                                                                <figure class="match-preview__team-logo">
                                                                    <img src="<?= base_url('/') ?>images/users/mini<?= $row['id1'] ?>.png" alt="">
                                                                </figure>
                                                                <h5 class="match-preview__team-name"><?= $this->mdl_utenti->getSquadra($row['id1']) ?></h5>
                                                                <div class="match-preview__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id1']) ?></div>
                                                            </div>
                                                            <!-- 1st Team / End -->

                                                            <div class="match-preview__vs">
                                                                <div class="match-preview__conj">-</div>
                                                            </div>

                                                            <!-- 2nd Team -->
                                                            <div class="match-preview__team match-preview__team--second">
                                                                <figure class="match-preview__team-logo">
                                                                    <img src="<?= base_url('/') ?>images/users/mini<?= $row['id2'] ?>.png" alt="">
                                                                </figure>
                                                                <h5 class="match-preview__team-name"><?= $this->mdl_utenti->getSquadra($row['id2']) ?></h5>
                                                                <div class="match-preview__team-info"><?= $this->mdl_utenti->getNomeUtente($row['id2']) ?></div>
                                                            </div>
                                                            <!-- 2nd Team / End -->

                                                        </div>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                
                                            </section>
                                            <div class="countdown__content">
                                                <div class="countdown-counter" data-date="<?= substr($blocco, 5, 2) ?> <?= substr($blocco, 8, 2) ?>, <?= substr($blocco, 0, 4) ?> <?= substr($blocco,10, 8) ?>"></div>
                                            </div>
                                            <div class="match-preview__action match-preview__action--ticket">
                                                <a href="<?= base_url('/') ?>index.php/home/calendario" class="btn btn-primary-inverse btn-lg btn-block">Vedi Calendario</a>
                                            </div>
                                        </div>
                                        <!-- Match Preview / End -->

                                    </div>
                                </aside>
                                <!-- Widget: Match Announcement / End -->

                            </div>
                        </div>
                        <!-- Post Area 3 / End -->


                        <!-- Main News Banner -->
                        <div class="main-news-banner main-news-banner--soccer-ball">
                            <div class="main-news-banner__inner">
                                <div class="posts posts--simple-list posts--simple-list--xlg">
                                    <div class="posts__item posts__item--category-1">
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">Le Novità per la stagione 2018/19</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">Cambia il modo di gestire le <span class="main-news-banner__highlight">Sostituzioni !</span></a></h6>
                                            <div class="spacer"></div>
                                            <div class="posts__excerpt">
                                                <ul class="list" style="color: #fff">
                                                    <li>3 Criteri di sostituzione</li>
                                                    <li>Playoff rinnovati</li>
                                                    <li>Precedenti storici</li>
                                                    <li>Statistiche aggiornate in tempo reale</li>
                                                    <li>Selezione automatica dei rigoristi</li>
                                                    <li>Classifica Perpetua dal 2011 ad oggi</li>
                                                    <li>Archivio stagioni precedenti</li>
                                                </ul>
                                            </div>
                                            <div class="posts__more">
                                                <a href="<?= base_url('/') ?>index.php/home/regolamento" class="btn btn-inverse btn-sm btn-outline btn-icon-right btn-condensed">Vai al Regolamento</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Main News Banner / End -->


                    </div>
                    <!-- Content / End -->

                    <!-- Sidebar -->
                    <div id="sidebar" class="sidebar col-md-4">
                        <!-- Widget: Standings - Treble League -->
                        <aside class="widget card widget--sidebar widget-standings">
                            <div class="widget__title card__header card__header--has-btn">
                                <!-- ANNO - Modifica annuale -->
                                <h4>Treble League 2018/19</h4>
                                <a href="<?= base_url('/') ?>index.php/home/campionato" class="btn btn-default btn-outline btn-xs card-header__button">Vedi Classifica</a>
                            </div>
                            <div class="widget__content card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-standings">

                                        <!-- Classifica Treble League -->
                                        <thead>
                                            <tr>
                                                <th>Squadre</th>
                                                <th>V</th>
                                                <th>N</th>
                                                <th>P</th>
                                                <th>Punti</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            foreach ($classifica as $row) {
                                                switch ($i) {
                                                    case 1:
                                                        $color = 'bgcolor="#f2fff0"';
                                                        break;
                                                    case 2;
                                                    case 3;
                                                    case 4;
                                                    case 5;
                                                    case 6;
                                                    case 7;
                                                        $color = "";
                                                        break;
                                                    case 8;
                                                    case 9;
                                                    case 10;
                                                        $color = 'bgcolor="#ffebec"';
                                                        break;
                                                }
                                                ?>
                                                <tr <?= $color ?> >
                                                    <td>
                                                        <div class="team-meta">
                                                            <figure class="team-meta__logo">
                                                                <img src="<?= base_url('/') ?>images/users/mini<?= $row['id_squadra'] ?>.png" width="30" >
                                                            </figure>
                                                            <div class="team-meta__info">
                                                                <h6 class="team-meta__name" style="color: #1892ED;"><?= $this->mdl_utenti->getSquadra($row['id_squadra']) ?></h6>
                                                                <span class="team-meta__place"><?= $this->mdl_utenti->getNomeUtente($row['id_squadra']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= $row['vittorie'] ?></td>
                                                    <td><?= $row['pareggi'] ?></td>
                                                    <td><?= $row['sconfitte'] ?></td>
                                                    <td style="color: #1892ED; font-size: 14px;"><?= $row['punti'] ?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Standings / End -->


                        <!-- Widget: TOP 11 Giornata -->
                        <aside class="widget widget--sidebar card card--has-table widget-leaders">
                            <div class="widget__title card__header">
                                <h4>Top 11 ultima giornata</h4>
                            </div>
                            <?php
                            if (isset($top['P'][0]['giornata']))
                                $giornata = @$top['P'][0]['giornata'];
                            else
                                $giornata = "1";
                            ?>
                            <div class="widget__content card__content">

                                <!-- Leader: Points -->
                                <div class="table-responsive">
                                    <table class="table team-leader">


                                        <!-- Portiere -->
                                        <?php if (isset($top['P'][0]['giornata'])) { ?>

                                            <thead>
                                                <tr>
                                                    <th class="team-leader__type">Giornata n° <?= $giornata ?></th>
                                                    <th class="team-leader__gp">Voto</th>
                                                    <th class="team-leader__avg">FantaVoto</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                foreach ($top['P'] as $row) {
                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <tr bgcolor="#fafafa"> 
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                    <?php
                                                                    $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                                    if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                        $squadra_giocatore = "";
                                                                    }
                                                                    ?>
                                                                    <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__goals"><?= $row['voto'] ?></td>
                                                        <td class="team-leader__gp" style="color: #1892ED; font-size: 14px;"><?= $row['fantavoto'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                                <!-- Difensori -->
                                                <?php
                                                foreach ($top['D'] as $row) {
                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <tr bgcolor="#f0fbff">
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                    <span class="team-leader__player-position"><?= $this->mdl_team->getSquadraBomber($row['id_giocatore']) ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__goals"><?= $row['voto'] ?></td>
                                                        <td class="team-leader__gp" style="color: #1892ED; font-size: 14px;"><?= $row['fantavoto'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                                <!-- Centrocampisti -->
                                                <?php
                                                foreach ($top['C'] as $row) {
                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <tr bgcolor="#fff2f2">
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                    <?php
                                                                    $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                                    if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                        $squadra_giocatore = "";
                                                                    }
                                                                    ?>
                                                                    <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__goals"><?= $row['voto'] ?></td>
                                                        <td class="team-leader__gp" style="color: #1892ED; font-size: 14px;"><?= $row['fantavoto'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                                <!-- Attaccanti -->
                                                <?php
                                                foreach ($top['A'] as $row) {
                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <tr bgcolor="#eefaeb">
                                                        <td class="team-leader__player">
                                                            <div class="team-leader__player-info">
                                                                <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                    <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                                </figure>
                                                                <div class="team-leader__player-inner">
                                                                    <h5 class="team-leader__player-name" style="color: #1892ED;"><?= $row['cognome'] . " " . substr($row['nome'], 0, 1) . "." ?></h5>
                                                                    <?php
                                                                    $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                                    if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                        $squadra_giocatore = "";
                                                                    }
                                                                    ?>
                                                                    <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-leader__goals"><?= $row['voto'] ?></td>
                                                        <td class="team-leader__gp" style="color: #1892ED; font-size: 14px;"><?= $row['fantavoto'] ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else
                                                echo "<p align='center'> Nessuna partita ancora disputata </p>";
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Leader: Points / End -->


                            </div>
                        </aside>
                        <!-- Widget: TOP 11 Giornata / End -->


                        <!-- Widget: Ultime News -->
                        <aside class="widget widget--sidebar card widget-tabbed">
                            <div class="widget__title card__header">
                                <h4>Ultime News</h4>
                            </div>
                            <div class="widget__content card__content">
                                <div class="widget-tabbed__tabs">
                                    <!-- Widget Tabs -->
                                    <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                                        <li role="presentation" class="active"><a href="#widget-tabbed-sm-newest" aria-controls="widget-tabbed-sm-newest" role="tab" data-toggle="tab">Tutti</a></li>
                                        <li role="presentation"><a href="#widget-tabbed-sm-commented" aria-controls="widget-tabbed-sm-commented" role="tab" data-toggle="tab">Infortuni</a></li>
                                        <li role="presentation"><a href="#widget-tabbed-sm-popular" aria-controls="widget-tabbed-sm-popular" role="tab" data-toggle="tab">Trasferimenti</a></li>
                                    </ul>

                                    <!-- Widget Tab panes -->
                                    <div class="tab-content widget-tabbed__tab-content">
                                        <!-- Newest -->
                                        <div role="tabpanel" class="tab-pane fade in active" id="widget-tabbed-sm-newest">
                                            <ul class="posts posts--simple-list">

                                                <?php
                                                foreach ($newsAll as $row) {
                                                    if ($row['tipologia'] == "vendita" || $row['tipologia'] == "acquisto") {
                                                        if ($row['tipologia'] == "vendita") {
                                                            $type = "venduto";
                                                        }
                                                        if ($row['tipologia'] == "acquisto") {
                                                            $type = "acquistato";
                                                        }
                                                        $category = 1;
                                                        $label = "Trasferimenti";
                                                        $testo_news = "<span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_utenti->getSquadra($row['id_utente']) . "</span> ha " . $type . " <span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span> per una cifra di <span style='color: #1892ED; font-size: 14px;'>" . $row['costo'] . "</span> fantamilioni";
                                                    }
                                                    if ($row['tipologia'] == "infortunio") {
                                                        $category = 4;
                                                        $label = "Infortunio";
                                                        $testo_news = $row['testo_news'];
                                                    }
                                                    if ($row['tipologia'] == "cessione") {
                                                        $category = 3;
                                                        $label = "Cessione";
                                                        $testo_news = $row['testo_news'];
                                                    }

                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <li class="posts__item posts__item--category-<?= $category ?>">
                                                        <div class="posts__inner">
                                                            <div class="posts__cat">
                                                                <span class="label posts__cat-label"><?= $label ?></span>
                                                            </div>
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                            </figure><br><br>
                                                            <h6 class="posts__title"><?= $this->mdl_team->getNomeGiocatore($row['id_giocatore']) ?></h6>
                                                            <?php
                                                            $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                            if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                $squadra_giocatore = "";
                                                            }
                                                            ?>
                                                            <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                            <time datetime="<?= $row['data'] ?>" class="posts__date"><?= dataSettimanale($row['data']) ?></time>
                                                            <div class="posts__excerpt">
                                                                <?= $testo_news ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <!-- Commented -->
                                        <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-sm-commented">
                                            <ul class="posts posts--simple-list">

                                                <?php
                                                foreach ($newsInfortuni as $row) {
                                                    if ($row['tipologia'] == "vendita" || $row['tipologia'] == "acquisto") {
                                                        if ($row['tipologia'] == "vendita") {
                                                            $type = "venduto";
                                                        }
                                                        if ($row['tipologia'] == "acquisto") {
                                                            $type = "acquistato";
                                                        }
                                                        $category = 1;
                                                        $label = "Trasferimenti";
                                                        $testo_news = "<span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_utenti->getSquadra($row['id_utente']) . "</span> ha " . $type . " <span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span> per una cifra di <span style='color: #1892ED; font-size: 14px;'>" . $row['costo'] . "</span> fantamilioni";
                                                    }
                                                    if ($row['tipologia'] == "infortunio") {
                                                        $category = 4;
                                                        $label = "Infortunio";
                                                        $testo_news = $row['testo_news'];
                                                    }
                                                    if ($row['tipologia'] == "cessione") {
                                                        $category = 3;
                                                        $label = "Cessione";
                                                        $testo_news = $row['testo_news'];
                                                    }

                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <li class="posts__item posts__item--category-<?= $category ?>">
                                                        <div class="posts__inner">
                                                            <div class="posts__cat">
                                                                <span class="label posts__cat-label"><?= $label ?></span>
                                                            </div>
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                            </figure><br><br>
                                                            <h6 class="posts__title"><?= $this->mdl_team->getNomeGiocatore($row['id_giocatore']) ?></h6>
                                                            <?php
                                                            $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                            if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                $squadra_giocatore = "";
                                                            }
                                                            ?>
                                                            <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                            <time datetime="<?= $row['data'] ?>" class="posts__date"><?= dataSettimanale($row['data']) ?></time>
                                                            <div class="posts__excerpt">
                                                                <?= $testo_news ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <!-- Popular -->
                                        <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-sm-popular">
                                            <ul class="posts posts--simple-list">

                                                <?php
                                                foreach ($newsTrasferimenti as $row) {
                                                    if ($row['tipologia'] == "vendita" || $row['tipologia'] == "acquisto") {
                                                        if ($row['tipologia'] == "vendita") {
                                                            $type = "venduto";
                                                        }
                                                        if ($row['tipologia'] == "acquisto") {
                                                            $type = "acquistato";
                                                        }
                                                        $category = 1;
                                                        $label = "Trasferimenti";
                                                        $testo_news = "<span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_utenti->getSquadra($row['id_utente']) . "</span> ha " . $type . " <span style='color: #1892ED; font-size: 14px;'>" . $this->mdl_team->getNomeGiocatore($row['id_giocatore']) . "</span> per una cifra di <span style='color: #1892ED; font-size: 14px;'>" . $row['costo'] . "</span> fantamilioni";
                                                    }
                                                    if ($row['tipologia'] == "infortunio") {
                                                        $category = 4;
                                                        $label = "Infortunio";
                                                        $testo_news = $row['testo_news'];
                                                    }
                                                    if ($row['tipologia'] == "cessione") {
                                                        $category = 3;
                                                        $label = "Cessione";
                                                        $testo_news = $row['testo_news'];
                                                    }

                                                    if (file_exists("images/giocatori/" . $row['id_giocatore'] . ".png")) {
                                                        $filename = $row['id_giocatore'] . ".png";
                                                    } else
                                                        $filename = "dummy.png";
                                                    ?>
                                                    <li class="posts__item posts__item--category-<?= $category ?>">
                                                        <div class="posts__inner">
                                                            <div class="posts__cat">
                                                                <span class="label posts__cat-label"><?= $label ?></span>
                                                            </div>
                                                            <figure class="team-leader__player-img team-leader__player-img--sm">
                                                                <img src="<?= base_url('/') ?>images/giocatori/<?= $filename ?>" >
                                                            </figure><br><br>
                                                            <h6 class="posts__title"><?= $this->mdl_team->getNomeGiocatore($row['id_giocatore']) ?></h6>
                                                            <?php
                                                            $squadra_giocatore = $this->mdl_team->getSquadraBomber($row['id_giocatore']);
                                                            if (is_array($squadra_giocatore) && count($squadra_giocatore) == 0) {
                                                                $squadra_giocatore = "";
                                                            }
                                                            ?>
                                                            <span class="team-leader__player-position"><?= $squadra_giocatore ?></span>
                                                            <time datetime="<?= $row['data'] ?>" class="posts__date"><?= dataSettimanale($row['data']) ?></time>
                                                            <div class="posts__excerpt">
                                                                <?= $testo_news ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Trending News / End -->


                    </div>
                    <!-- Sidebar / End -->
                </div>

            </div>
        </div>

        <!-- Content / End -->

