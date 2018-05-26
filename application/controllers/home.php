<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        @session_start();
        $CI->load->helper('form');
        $CI->load->library('form_validation');
        $CI->load->library('session');
        $CI->load->helper('ghelper');
        $CI->load->model('mdl_utenti');
    }

    public function show($pagina, $dati = '') {
        $this->load->view('include/header', $dati);
        //$this->load->view('include/menu');
        $this->load->view($pagina, $dati);
        $this->load->view('include/footer');
    }

    public function index() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        //La giornata utile per calcolare la posizione attuale in classifica deve essere relativa a quella precedente !
        $giornata_posizione = ($_SESSION['giornata'] - 1);

        $data['risultati'] = $this->mdl_team->getCalendario1A();
        $data['classifica'] = $this->mdl_team->getClassifica($giornata_posizione);
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
        $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
        $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
        $data['bomber'] = $this->mdl_team->getBomberCampionato($_SESSION['giornata']);

        $giornataTop = ($_SESSION['giornata'] - 1);
        $data['top'] = $this->mdl_team->getTop($giornataTop);
        $data['topCampionato'] = $this->mdl_team->getTopCampionato();
        $data['offerte'] = $this->mdl_team->getLastOfferte();
        
        $data['news_coppa'] = $this->mdl_utenti->getNewsDesktop("coppa");
        $data['news_champions'] = $this->mdl_utenti->getNewsDesktop("champions");
        $data['news_supercoppa'] = $this->mdl_utenti->getNewsDesktop("super");
        $data['news_league'] = $this->mdl_utenti->getNewsDesktop("league");
        
        $data['topmatch'] = $this->mdl_team->getTopMatch($_SESSION['giornata']);

        $this->show('home/homepage', $data);
    }

    public function homepage() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        //La giornata utile per calcolare la posizione attuale in classifica deve essere relativa a quella precedente !
        $giornata_posizione = ($_SESSION['giornata'] - 1);

        $data['risultati'] = $this->mdl_team->getCalendario1A();
        $data['classifica'] = $this->mdl_team->getClassifica($giornata_posizione);
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
        $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
        $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
        $data['bomber'] = $this->mdl_team->getBomberCampionato($_SESSION['giornata']);

        $giornataTop = ($_SESSION['giornata'] - 1);
        $data['top'] = $this->mdl_team->getTop($giornataTop);
        $data['topCampionato'] = $this->mdl_team->getTopCampionato();
        $data['offerte'] = $this->mdl_team->getLastOfferte();
        
        $data['news_coppa'] = $this->mdl_utenti->getNewsDesktop("coppa");
        $data['news_champions'] = $this->mdl_utenti->getNewsDesktop("champions");
        $data['news_supercoppa'] = $this->mdl_utenti->getNewsDesktop("super");
        $data['news_league'] = $this->mdl_utenti->getNewsDesktop("league");
        
        $data['topmatch'] = $this->mdl_team->getTopMatch($_SESSION['giornata']);

        $this->show('home/homepage', $data);
    }
    
    public function topmatch() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $data['active'] = 1;
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);
            $data['giornata'] = $_SESSION['giornata'];
            $data['blocco'] = $this->mdl_utenti->getBlocco();
            if ($data['blocco'] == "") {
                $data['message'] = "Orario blocco formazioni non impostato";
            }

            $this->form_validation->set_rules('cmbSquadraCasa', 'Squadra Casa', 'trim|required');
            $this->form_validation->set_rules('cmbSquadraTrasferta', 'Squadra Trasferta', 'trim|required');
            $this->form_validation->set_rules('cmbCompetizione', 'Competizione', 'trim|required');

            if ($this->form_validation->run()) {
                if ($this->input->post('cmbSquadraCasa') != 0 && $this->input->post('cmbSquadraTrasferta') != 0) {

                    //Prima cancello topmatch della stessa giornata
                    $deleteTopMatch = $this->mdl_team->deleteTopMatch($_SESSION['giornata']);
                    
                    $data = array(
                        'id1' => $this->input->post('cmbSquadraCasa'),
                        'id2' => $this->input->post('cmbSquadraTrasferta'),
                        'competizione' => $this->input->post('cmbCompetizione'),
                        'giornata' => $_SESSION['giornata']
                        );
                    
                    $insertTopMatch = $this->mdl_team->insertTopMatch($data);
                    
                $data['success_message'] = "Top Match inserito con successo";
                
                } else {
                    $data['message'] = "ATTENZIONE: Dati mancanti !";

                    $this->show('home/topmatch', $data);
                    return;
                }
            }
            
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);
            $data['giornata'] = $_SESSION['giornata'];
            $data['blocco'] = $this->mdl_utenti->getBlocco();
            if ($data['blocco'] == "") {
                $data['message'] = "Orario blocco formazioni non impostato";
            }
            
            $this->show('home/topmatch', $data);
        } else
            redirect('utente/login');
    }

    function blocco() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_categories');

            if ($this->input->post('but_blocco')) {
                $this->form_validation->set_rules('cmbGiornata', 'Giornata', 'trim|required');
                $this->form_validation->set_rules('cmbGiorno', 'Giorno', 'trim|required');
                $this->form_validation->set_rules('cmbMese', 'Mese', 'trim|required');
                $this->form_validation->set_rules('cmbAnno', 'Anno', 'trim|required');
                $this->form_validation->set_rules('cmbOra', 'Ora', 'trim|required');
                $this->form_validation->set_rules('cmbMinuti', 'Minuti', 'trim|required');

                if ($this->form_validation->run()) {
                    $blocco = $this->input->post('cmbAnno') . "-" . $this->input->post('cmbMese') . "-" . $this->input->post('cmbGiorno') . " " . $this->input->post('cmbOra') . ":" . $this->input->post('cmbMinuti') . ":00";
                    $this->mdl_utenti->insBlocco($this->input->post('cmbGiornata'), $blocco);
                    $data['success_message'] = "L'orario di blocco impostato per la Giornata " . $this->input->post('cmbGiornata') . " è : " . $this->input->post('cmbOra') . ":" . $this->input->post('cmbMinuti') . " del giorno " . $this->input->post('cmbGiorno') . "/" . $this->input->post('cmbMese') . "/" . $this->input->post('cmbAnno');
                }
            }
            
            $data['active'] = 1;
            $this->show('home/blocco', @$data);
        } else
            redirect('utente/login');
    }

    public function campionato() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        //La giornata utile per calcolare la posizione attuale in classifica deve essere relativa a quella precedente !
        $giornata_posizione = ($_SESSION['giornata'] - 1);

        $data['risultati'] = $this->mdl_team->getCalendario1A();
        $data['classifica'] = $this->mdl_team->getClassifica($giornata_posizione);
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
        $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
        $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
        $data['bomber'] = $this->mdl_team->getBomberCampionato($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/campionato', $data);
    }
    
    public function classifica_perpetua() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $data['classifica'] = $this->mdl_team->getClassificaPerpetua();

        $data['active'] = 5;
        $this->show('home/classifica_perpetua', $data);
    }

    public function calendario() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        //La giornata utile per calcolare la posizione attuale in classifica deve essere relativa a quella precedente !
        $giornata_posizione = ($_SESSION['giornata'] - 1);

        $data['risultati'] = $this->mdl_team->getCalendario1A();
        $data['classifica'] = $this->mdl_team->getClassifica($giornata_posizione);
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
        $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
        $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
        $data['bomber'] = $this->mdl_team->getBomberCampionato($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/calendario', $data);
    }

    public function albo_statistiche() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $this->load->model('mdl_categories');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['active'] = 5;

        $this->form_validation->set_rules('cmbStoricoSquadre1', 'Squadra 1', 'trim|required');
        $this->form_validation->set_rules('cmbStoricoSquadre2', 'Squadra 2', 'trim|required');
        $this->form_validation->set_rules('SelPrecedente', 'Selettore', 'trim|required');

        if ($this->form_validation->run()) {

            $squadra1   = $this->input->post('cmbStoricoSquadre1');
            $squadra2   = $this->input->post('cmbStoricoSquadre2');
            $type       = $this->input->post('SelPrecedente');

            $data['check'] = 0;
            $data['message'] = "<div class = 'alert alert-warning alert-dismissible'>
                                    <strong>Nessun precedente fra queste due squadre</strong>
                                </div>";
            
            if ($squadra1 != $squadra2) {
            
                //Seleziono i precedenti fra 2 squadre o fra 2 utenti
                $data['precedenti2011_12'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2011-12", "2011_12");
                if (is_array($data['precedenti2011_12']) && count($data['precedenti2011_12']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['precedenti2012_13'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2012-13", "2012_13");
                if (is_array($data['precedenti2012_13']) && count($data['precedenti2012_13']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['precedenti2013_14'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2013-14", "2013_14");
                if (is_array($data['precedenti2013_14']) && count($data['precedenti2013_14']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['precedenti2014_15'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2014-15", "2014_15");
                if (is_array($data['precedenti2014_15']) && count($data['precedenti2014_15']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['precedenti2015_16'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2015-16", "2015_16");
                if (is_array($data['precedenti2015_16']) && count($data['precedenti2015_16']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['champions2015_16'] = $this->mdl_team->getPrecedentiChampions($type, $squadra1, $squadra2, "2015-16", "2015_16");
                if (is_array($data['champions2015_16']) && count($data['champions2015_16']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['coppa2015_16'] = $this->mdl_team->getPrecedentiCoppa($type, $squadra1, $squadra2, "2015-16", "2015_16");
                if (is_array($data['coppa2015_16']) && count($data['coppa2015_16']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['precedenti2016_17'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2016-17", "2016_17");
                if (is_array($data['precedenti2016_17']) && count($data['precedenti2016_17']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['champions2016_17'] = $this->mdl_team->getPrecedentiChampions($type, $squadra1, $squadra2, "2016-17", "2016_17");
                if (is_array($data['champions2016_17']) && count($data['champions2016_17']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['coppa2016_17'] = $this->mdl_team->getPrecedentiCoppa($type, $squadra1, $squadra2, "2016-17", "2016_17");
                if (is_array($data['coppa2016_17']) && count($data['coppa2016_17']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['supercoppa2016_17'] = $this->mdl_team->getPrecedentiSuperCoppa($type, $squadra1, $squadra2, "2016-17", "2016_17");
                if (is_array($data['supercoppa2016_17']) && count($data['supercoppa2016_17']) > 0) {
                    $data['message'] = "";
                }
                $data['precedenti2017_18'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2017-18", "2017_18");
                if (is_array($data['precedenti2017_18']) && count($data['precedenti2017_18']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['champions2017_18'] = $this->mdl_team->getPrecedentiChampions($type, $squadra1, $squadra2, "2017-18", "2017_18");
                if (is_array($data['champions2017_18']) && count($data['champions2017_18']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['coppa2017_18'] = $this->mdl_team->getPrecedentiCoppa($type, $squadra1, $squadra2, "2017-18", "2017_18");
                if (is_array($data['coppa2017_18']) && count($data['coppa2017_18']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
                $data['supercoppa2017_18'] = $this->mdl_team->getPrecedentiSuperCoppa($type, $squadra1, $squadra2, "2017-18", "2017_18");
                if (is_array($data['supercoppa2017_18']) && count($data['supercoppa2017_18']) > 0) {
                    $data['message'] = "";
                    $data['check'] = 1;
                }
            }   else {
                    if ($type == "squadra") {
                        $data['message'] = "<div class = 'alert alert-danger alert-dismissible'>
                                            <strong>Selezionare squadre differenti</strong>
                                        </div>";
                    }
                    if ($type == "utente") {
                        $data['message'] = "<div class = 'alert alert-danger alert-dismissible'>
                                            <strong>Selezionare utenti differenti</strong>
                                        </div>";
                    }
                    $data['check'] = 0;
                }

            if ($type == "squadra") {
                $data['team1'] = $squadra1;
                $data['team2'] = $squadra2;
                $data['squadra1'] = $squadra1;
                $data['squadra2'] = $squadra2;
            }
            if ($type == "utente") {
                $data['team1'] = $squadra1;
                $data['team2'] = $squadra2;
                $data['squadra1'] = $this->mdl_utenti->getNomeUtenteDaSquadra($squadra1);
                $data['squadra2'] = $this->mdl_utenti->getNomeUtenteDaSquadra($squadra2);
                if ($data['squadra1'] == $data['squadra2']){
                    $data['check'] = 0;
                    $data['message'] = "<div class = 'alert alert-danger alert-dismissible'>
                                            <strong>Selezionare utenti differenti</strong>
                                        </div>";
                }
            }
            $data['radio'] = $type;
            $data['giornata'] = $_SESSION['giornata'];
            $data['storico_squadre'] = $this->mdl_team->getStoricoSquadre();
            $data['combo_storico_squadre'] = $this->mdl_categories->getComboStoricoSquadre();
            
            $this->show('home/albo_statistiche', $data);
            return;
        }
        
        $data['radio'] = "squadra";
        $data['check'] = 0;
        $data['message'] = "";
        $data['giornata'] = $_SESSION['giornata'];
        $data['storico_squadre'] = $this->mdl_team->getStoricoSquadre();
        $data['combo_storico_squadre'] = $this->mdl_categories->getComboStoricoSquadre();

        $this->show('home/albo_statistiche', $data);
    }

    public function marcatori() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        //La giornata utile per calcolare la posizione attuale in classifica deve essere relativa a quella precedente !
        $giornata_posizione = ($_SESSION['giornata'] - 1);

        $data['risultati'] = $this->mdl_team->getCalendario1A();
        $data['classifica'] = $this->mdl_team->getClassifica($giornata_posizione);
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
        $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
        $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
        $data['bomber'] = $this->mdl_team->getBomberCampionatoTotale($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/marcatori', $data);
    }

    public function dettagli($giornata) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $data['giornata'] = $giornata;
            $data['risultati'] = $this->mdl_team->getCalendariogiornata($giornata);
            $data['player'] = $this->mdl_team->getTeamGiornata($giornata);
            
            $data['active'] = 5;
            $this->show('home/dettagli', $data);
        } else
            redirect('utente/login');
    }

    public function dettaglichampions($giornata) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $data['giornata'] = $giornata;
            $data['risultati_champions'] = $this->mdl_team->getCalendariogiornatachampions($giornata);
            $data['player'] = $this->mdl_team->getTeamGiornataCoppa($giornata);

            $data['active'] = 5;
            $this->show('home/dettaglichampions', $data);
        } else
            redirect('utente/login');
    }

    public function dettaglisupercoppa($giornata) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $data['giornata'] = $giornata;
            $data['risultati_coppa'] = $this->mdl_team->getCalendariogiornatasupercoppa($giornata);
            $data['player'] = $this->mdl_team->getTeamGiornataCoppa($giornata);

            $data['active'] = 5;
            $this->show('home/dettaglisupercoppa', $data);
        } else
            redirect('utente/login');
    }

    public function dettaglicoppa($giornata) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $data['giornata'] = $giornata;
            $data['risultati_coppa'] = $this->mdl_team->getCalendariogiornatacoppa($giornata);
            $data['player'] = $this->mdl_team->getTeamGiornataCoppa($giornata);

            $data['active'] = 5;
            $this->show('home/dettaglicoppa', $data);
        } else
            redirect('utente/login');
    }

    public function prepartita() {
        if (isset($_SESSION['id_utente'])) {
            
            $data['active'] = 3;
            $this->show('home/prepartita.php', $data);
        } else
            redirect('utente/login');
    }

    public function regolamento() {

        $this->show('home/regolamento.php');
    }

    public function albo() {

        $data['active'] = 5;
        $this->show('home/albo.php', $data);
    }

    public function albo_champions() {

        $data['active'] = 5;
        $this->show('home/albo_champions.php', $data);
    }

    public function albo_coppa() {

        $data['active'] = 5;
        $this->show('home/albo_coppa.php', $data);
    }

    public function albo_supercoppa() {

        $data['active'] = 5;
        $this->show('home/albo_supercoppa.php', $data);
    }

    public function statistiche_treble_league() {
        $this->load->model('mdl_team');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        //Prendo le giornate giocate, quindi quella di sessione, meno 1 per avere l'ultima giocata
        $data['giornata_media'] = ($_SESSION['giornata'] - 1);
        
        $data['topmediavoto'] = $this->mdl_team->getTopMediaVoto($data['giornata_media']);
        $data['topmediafantavoto'] = $this->mdl_team->getTopMediaFantaVoto($data['giornata_media']);
        $data['topplayer'] = $this->mdl_team->getTopPlayer();
        $data['peggioriportieri'] = $this->mdl_team->getPeggioriPortieri();
        $data['assistmen'] = $this->mdl_team->getAssistmen();
        $data['fallosi'] = $this->mdl_team->getFallosi();
        $data['bestmatch'] = $this->mdl_team->getBestMatch();
        $data['rigori_sbagliati'] = $this->mdl_team->getTopRigoriSbagliati();
        $data['topCampionato'] = $this->mdl_team->getTopCampionato();
        
        $data['active'] = 5;
        $this->show('home/statistiche_treble_league.php', $data);
    }

    public function premi() {

        $data['active'] = 5;
        $this->show('home/premi.php', $data);
    }

    public function champions() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_champions'] = $this->mdl_team->getCalendarioChampions();
        $data['classifica_championsA'] = $this->mdl_team->getClassificaChampionsA();
        $data['classifica_championsB'] = $this->mdl_team->getClassificaChampionsB();
        $data['bomber'] = $this->mdl_team->getBomberChampions($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/champions.php', $data);
    }

    public function calendario_champions() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_champions'] = $this->mdl_team->getCalendarioChampions();
        $data['classifica_championsA'] = $this->mdl_team->getClassificaChampionsA();
        $data['classifica_championsB'] = $this->mdl_team->getClassificaChampionsB();
        $data['bomber'] = $this->mdl_team->getBomberChampions($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/calendario_champions.php', $data);
    }

    public function marcatori_champions() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_champions'] = $this->mdl_team->getCalendarioChampions();
        $data['classifica_championsA'] = $this->mdl_team->getClassificaChampionsA();
        $data['classifica_championsB'] = $this->mdl_team->getClassificaChampionsB();
        $data['bomber'] = $this->mdl_team->getBomberChampionsTotale($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/marcatori_champions.php', $data);
    }

    public function coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppa($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/coppa.php', $data);
    }

    public function marcatori_coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppaTotale($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/marcatori_coppa.php', $data);
    }

    public function calendario_coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppa($_SESSION['giornata']);

        $data['active'] = 5;
        $this->show('home/calendario_coppa.php', $data);
    }

    public function supercoppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_supercoppa'] = $this->mdl_team->getCalendarioSupercoppa();

        $data['active'] = 5;
        $this->show('home/supercoppa.php', $data);
    }

    public function statistiche($ruolo) {
        $this->load->model('mdl_categories');
        $this->load->model('mdl_team');

        $data['active'] = 5;
        $data['ruolo'] = $ruolo;

        $this->form_validation->set_rules('order', 'Ordine', 'trim|required');

        if ($this->form_validation->run()) {

            $order = $this->input->post('order');

            if ($order == "cognome")
                $data['player'] = $this->mdl_team->getGiocatoreRuolo($ruolo, $order);
            else
                $data['player'] = $this->mdl_team->getGiocatoreFV($ruolo, $order);

            $data['order'] = $order;
            $this->show('home/statistiche', $data);
            return;
        }

        $data['player'] = $this->mdl_team->getGiocatoreRuolo($ruolo, $order = "cognome");

        $this->show('home/statistiche', $data);
    }

    public function gestione_rigoristi() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_categories');
            
            $data['active'] = 1;
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);

            $this->form_validation->set_rules('cmbGiornata', 'Giornata', 'trim|required');
            $this->form_validation->set_rules('cmbScelta', 'Competizione', 'trim|required');
            $this->form_validation->set_rules('cmbSquadra1', 'Squadra1', 'trim|required');
            $this->form_validation->set_rules('cmbSquadra2', 'Squadra2', 'trim|required');

            if ($this->form_validation->run()) {
                
                if (($this->input->post('cmbGiornata') != 0) && ($this->input->post('cmbScelta') != 0) && ($this->input->post('cmbSquadra1') != 0) && ($this->input->post('cmbSquadra2') != 0)) {

                    $giornata       = $this->input->post('cmbGiornata');
                    $competizione   = $this->input->post('cmbScelta');
                    $squadra1       = $this->input->post('cmbSquadra1');
                    $squadra2       = $this->input->post('cmbSquadra2');

                    $aggiorna = $this->mdl_team->attivaRigoristi($giornata, $competizione, $squadra1, $squadra2);
                    if ($aggiorna)
                        $data['success_message'] = "Rigoristi per " . $competizione . " attivati con successo per la giornata " . $giornata;

                    $this->show('home/gestione_rigoristi', $data);
                    return;
                } else {
                    $data['message'] = "ATTENZIONE: Verificare le selezioni";

                    $this->show('home/gestione_rigoristi', $data);
                    return;
                }
            }
            $this->show('home/gestione_rigoristi', $data);
        } else
            redirect('utente/login');
    }

    public function aggiorna_coppe() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $data['active'] = 1;
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $giornatacoppa = ($_SESSION['giornata'] - 1);
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);
            $data['giornata'] = $_SESSION['giornata'];

            $this->form_validation->set_rules('cmbSquadraCasa', 'Squadra Casa', 'trim|required');
            $this->form_validation->set_rules('cmbSquadraTrasferta', 'Squadra Trasferta', 'trim|required');
            $this->form_validation->set_rules('txtPunteggioCasa', 'Punteggio Casa', 'trim|required');
            $this->form_validation->set_rules('txtGolCasa', 'Gol Casa', 'trim|required');
            $this->form_validation->set_rules('txtPunteggioTrasferta', 'Punteggio Trasferta', 'trim|required');
            $this->form_validation->set_rules('txtGolTrasferta', 'Gol Trasferta', 'trim|required');
            $this->form_validation->set_rules('cmbScelta', 'Coppa', 'trim|required');

            if ($this->form_validation->run()) {
                if (($this->input->post('cmbSquadraCasa') != 0) && ($this->input->post('cmbSquadraTrasferta') != 0) && ($this->input->post('txtPunteggioCasa') != "") && ($this->input->post('txtPunteggioTrasferta') != "") && ($this->input->post('txtGolCasa') != "") && ($this->input->post('txtGolTrasferta') != "")) {
                    if ($this->input->post('cmbScelta') == "Coppa") {
                        $aggiorna = $this->mdl_team->updateCoppa($giornatacoppa, $this->input->post('cmbSquadraCasa'), $this->input->post('cmbSquadraTrasferta'), $this->input->post('txtPunteggioCasa'), $this->input->post('txtPunteggioTrasferta'), $this->input->post('txtGolCasa'), $this->input->post('txtGolTrasferta'));
                        if ($aggiorna)
                            $data['success_message'] = "Risultati Coppa Treble aggiornati con successo";
                        $this->show('home/aggiorna_coppe', $data);
                        return;
                    }

                    if ($this->input->post('cmbScelta') == "SuperCoppa") {
                        $aggiorna = $this->mdl_team->updateSuperCoppa($giornatacoppa, $this->input->post('cmbSquadraCasa'), $this->input->post('cmbSquadraTrasferta'), $this->input->post('txtPunteggioCasa'), $this->input->post('txtPunteggioTrasferta'), $this->input->post('txtGolCasa'), $this->input->post('txtGolTrasferta'));
                        if ($aggiorna)
                            $data['success_message'] = "Risultati SuperCoppa Treble aggiornati con successo";
                        $this->show('home/aggiorna_coppe', $data);
                        return;
                    }

                    if ($this->input->post('cmbScelta') == "Champions") {
                        //Aggiorno punteggi
                        $aggiornaRisultatiChampions = $this->mdl_team->updateChampions($giornatacoppa, $this->input->post('cmbSquadraCasa'), $this->input->post('cmbSquadraTrasferta'), $this->input->post('txtPunteggioCasa'), $this->input->post('txtPunteggioTrasferta'), $this->input->post('txtGolCasa'), $this->input->post('txtGolTrasferta'));
                        $classifica = "";
                        $team1 = $this->input->post('cmbSquadraCasa');
                        $team2 = $this->input->post('cmbSquadraTrasferta');
                        $GF = $this->input->post('txtGolCasa');
                        $GS = $this->input->post('txtGolTrasferta');

                        //Aggiorno classifica squadra di casa
                        if ($GF < $GS) {
                            $classifica['punti'] = 0;
                            $classifica['vittorie'] = 0;
                            $classifica['pareggi'] = 0;
                            $classifica['sconfitte'] = 1;
                            $classifica['gol_fatti'] = $GF;
                            $classifica['gol_subiti'] = $GS;
                        }
                        if ($GF == $GS) {
                            $classifica['punti'] = 1;
                            $classifica['vittorie'] = 0;
                            $classifica['pareggi'] = 1;
                            $classifica['sconfitte'] = 0;
                            $classifica['gol_fatti'] = $GF;
                            $classifica['gol_subiti'] = $GS;
                        }
                        if ($GF > $GS) {
                            $classifica['punti'] = 3;
                            $classifica['vittorie'] = 1;
                            $classifica['pareggi'] = 0;
                            $classifica['sconfitte'] = 0;
                            $classifica['gol_fatti'] = $GF;
                            $classifica['gol_subiti'] = $GS;
                        }
                        //Inserire qui ultima giornata di Champions
                        if ($giornatacoppa <= 22) {
                            $aggiornaChampions1 = $this->mdl_team->insertClassificaChampions($team1, $classifica);
                        }

                        //Aggiorno classifica squadra in trasferta
                        $classifica = "";
                        if ($GS < $GF) {
                            $classifica['punti'] = 0;
                            $classifica['vittorie'] = 0;
                            $classifica['pareggi'] = 0;
                            $classifica['sconfitte'] = 1;
                            $classifica['gol_fatti'] = $GS;
                            $classifica['gol_subiti'] = $GF;
                        }
                        if ($GS == $GF) {
                            $classifica['punti'] = 1;
                            $classifica['vittorie'] = 0;
                            $classifica['pareggi'] = 1;
                            $classifica['sconfitte'] = 0;
                            $classifica['gol_fatti'] = $GS;
                            $classifica['gol_subiti'] = $GF;
                        }
                        if ($GS > $GF) {
                            $classifica['punti'] = 3;
                            $classifica['vittorie'] = 1;
                            $classifica['pareggi'] = 0;
                            $classifica['sconfitte'] = 0;
                            $classifica['gol_fatti'] = $GS;
                            $classifica['gol_subiti'] = $GF;
                        }
                        //Inserire qui ultima giornata di Champions
                        if ($giornatacoppa <= 22) {
                            $aggiornaChampions2 = $this->mdl_team->insertClassificaChampions($team2, $classifica);
                        }

                        if ($aggiornaRisultatiChampions)
                            $data['success_message'] = "Risultati Champions League aggiornati con successo";

                        $this->show('home/aggiorna_coppe', $data);
                        return;
                    }
                }else {
                    $data['message'] = "ATTENZIONE: Dati mancanti !";

                    $this->show('home/aggiorna_coppe', $data);
                    return;
                }
            }
            $this->show('home/aggiorna_coppe', $data);
        } else
            redirect('utente/login');
    }

}
