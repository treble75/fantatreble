

        <!-- Page Heading
        ================================================== -->
        <div class="page-heading page-heading-prepartita">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-heading__title"><span class="highlight">Prepartita</span></h1>
                        <ol class="page-heading__breadcrumb breadcrumb">
                            <li><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li><a href="<?= base_url('/') ?>index.php/utente/myteam">My Team</a></li>
                            <li class="active">Prepartita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">
                <div class="card card--has-table">

                    <div class="card__header">
                        <h4>Prepartita</h4>
                        <span style="font-size: 12px; color: #000000;">Alcuni consigli utili, ma ricordate... il vero fantacalcista segue l'istinto !</span>
                    </div>
                    
                    <iframe src="http://www.fantaformazione.com/fantacalcio.formazioni_utente/formazione/Home.htm?idf=<?= @$_SESSION['id_fantaformazione'] ?>" width="100%" height="2000px" seamless></iframe>

                </div>
            </div>
        </div>

        <!-- Content / End -->

