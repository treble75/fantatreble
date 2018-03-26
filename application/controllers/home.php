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

        $this->show('home/homepage', $data);
    }

    function blocco() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_categories');

            if ($this->input->post('but_blocco')) {
                $this->form_validation->set_rules('cmbGiornata', 'Giornata');
                $this->form_validation->set_rules('cmbGiorno', 'Giorno');
                $this->form_validation->set_rules('cmbMese', 'Mese');
                $this->form_validation->set_rules('cmbAnno', 'Anno');
                $this->form_validation->set_rules('cmbOra', 'Ora');
                $this->form_validation->set_rules('cmbMinuti', 'Minuti');

                if ($this->form_validation->run()) {
                    $blocco = $this->input->post('cmbAnno') . "-" . $this->input->post('cmbMese') . "-" . $this->input->post('cmbGiorno') . " " . $this->input->post('cmbOra') . ":" . $this->input->post('cmbMinuti') . ":00";
                    $this->mdl_utenti->insBlocco($this->input->post('cmbGiornata'), $blocco);
                    $data['message'] = "L'orario di blocco impostato per la " . $this->input->post('cmbGiornata') . "° Giornata è : " . $this->input->post('cmbOra') . ":" . $this->input->post('cmbMinuti') . ":00 del giorno " . $this->input->post('cmbGiorno') . "/" . $this->input->post('cmbMese') . "/" . $this->input->post('cmbAnno');
                }
            }

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

        $this->show('home/campionato', $data);
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

        $this->show('home/calendario', $data);
    }

    public function statistiche_treble_league() {

        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $this->load->model('mdl_categories');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();

        $this->form_validation->set_rules('cmbStoricoSquadre1', 'Squadra 1', 'trim|required');
        $this->form_validation->set_rules('cmbStoricoSquadre2', 'Squadra 2', 'trim|required');
        $this->form_validation->set_rules('SelPrecedente', 'Selettore', 'trim|required');

        if ($this->form_validation->run()) {

            $squadra1   = $this->input->post('cmbStoricoSquadre1');
            $squadra2   = $this->input->post('cmbStoricoSquadre2');
            $type       = $this->input->post('SelPrecedente');

            $data['message'] = "<div class = 'alert alert-warning alert-dismissible'>
                                    <strong>Nessun precedente fra queste due squadre</strong>
                                </div>";
            
            //Seleziono i precedenti fra 2 squadre o fra 2 utenti
            $data['precedenti2011_12'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2011-12", "2011_12");
            if (is_array($data['precedenti2011_12'])) {
                $data['message'] = "";
            }
            $data['precedenti2012_13'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2012-13", "2012_13");
            if (is_array($data['precedenti2012_13'])) {
                $data['message'] = "";
            }
            $data['precedenti2013_14'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2013-14", "2013_14");
            if (is_array($data['precedenti2013_14'])) {
                $data['message'] = "";
            }
            $data['precedenti2014_15'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2014-15", "2014_15");
            if (is_array($data['precedenti2014_15'])) {
                $data['message'] = "";
            }
            $data['precedenti2015_16'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2015-16", "2015_16");
            if (is_array($data['precedenti2015_16'])) {
                $data['message'] = "";
            }
            $data['precedenti2016_17'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2016-17", "2016_17");
            if (is_array($data['precedenti2016_17'])) {
                $data['message'] = "";
            }
            $data['precedenti2017_18'] = $this->mdl_team->getPrecedenti($type, $squadra1, $squadra2, "2017-18", "2017_18");
            if (is_array($data['precedenti2017_18'])) {
                $data['message'] = "";
            }

            $data['giornata'] = $_SESSION['giornata'];
            $data['storico_squadre'] = $this->mdl_team->getStoricoSquadre();
            $data['combo_storico_squadre'] = $this->mdl_categories->getComboStoricoSquadre();
            
            $this->show('home/statistiche_treble_league', $data);
            return;
        }
        
        $data['message'] = "";
        $data['giornata'] = $_SESSION['giornata'];
        $data['storico_squadre'] = $this->mdl_team->getStoricoSquadre();
        $data['combo_storico_squadre'] = $this->mdl_categories->getComboStoricoSquadre();

        $this->show('home/statistiche_treble_league', $data);
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

        $this->show('home/marcatori', $data);
    }

    public function dettagli($giornata) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $data['giornata'] = $giornata;
            $data['risultati'] = $this->mdl_team->getCalendariogiornata($giornata);
            $data['player'] = $this->mdl_team->getTeamGiornata($giornata);

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

            $this->show('home/dettaglicoppa', $data);
        } else
            redirect('utente/login');
    }

    public function prepartita() {
        if (isset($_SESSION['id_utente'])) {
            $this->show('home/prepartita.php');
        } else
            redirect('utente/login');
    }

    public function regolamento() {

        $this->show('home/regolamento.php');
    }

    public function albo() {

        $this->show('home/albo.php');
    }

    public function albo_champions() {

        $this->show('home/albo_champions.php');
    }

    public function albo_coppa() {

        $this->show('home/albo_coppa.php');
    }

    public function albo_supercoppa() {

        $this->show('home/albo_supercoppa.php');
    }

    public function albo_statistiche() {

        $this->show('home/albo_statistiche.php');
    }

    public function bonus() {
        if (isset($_SESSION['id_utente'])) {
            $this->show('home/bonus.php');
        } else
            redirect('utente/login');
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

        $this->show('home/marcatori_champions.php', $data);
    }

    public function coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppa($_SESSION['giornata']);

        $this->show('home/coppa.php', $data);
    }

    public function marcatori_coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppaTotale($_SESSION['giornata']);

        $this->show('home/marcatori_coppa.php', $data);
    }

    public function calendario_coppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_coppa'] = $this->mdl_team->getCalendarioCoppa();
        $data['bomber'] = $this->mdl_team->getBomberCoppa($_SESSION['giornata']);

        $this->show('home/calendario_coppa.php', $data);
    }

    public function supercoppa() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');

        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['risultati_supercoppa'] = $this->mdl_team->getCalendarioSupercoppa();

        $this->show('home/supercoppa.php', $data);
    }

    public function statistiche($ruolo) {
        $this->load->model('mdl_categories');
        $this->load->model('mdl_team');

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

            $this->form_validation->set_rules('cmbGiornata', 'Giornata');
            $this->form_validation->set_rules('cmbScelta', 'Competizione');

            if ($this->form_validation->run()) {

                $giornata = $this->input->post('cmbGiornata');
                $competizione = $this->input->post('cmbScelta');

                $aggiorna = $this->mdl_team->attivaRigoristi($giornata, $competizione);
                if ($aggiorna)
                    $data['message'] = "<p style='color:green;'>Rigoristi per " . $competizione . " attivati con successo per la giornata " . $giornata . "<p>";

                $this->show('home/gestione_rigoristi', $data);
                return;
            }
            $this->show('home/gestione_rigoristi');
        } else
            redirect('utente/login');
    }

    public function aggiorna_coppe() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $giornatacoppa = ($_SESSION['giornata'] - 1);
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);
            $data['giornata'] = $_SESSION['giornata'];

            $this->form_validation->set_rules('cmbSquadraCasa', 'Squadra Casa');
            $this->form_validation->set_rules('cmbSquadraTrasferta', 'Squadra Trasferta');
            $this->form_validation->set_rules('txtPunteggioCasa', 'Punteggio Casa');
            $this->form_validation->set_rules('txtGolCasa', 'Gol Casa');
            $this->form_validation->set_rules('txtPunteggioTrasferta', 'Punteggio Trasferta');
            $this->form_validation->set_rules('txtGolTrasferta', 'Gol Trasferta');
            $this->form_validation->set_rules('cmbScelta', 'Coppa');

            if ($this->form_validation->run()) {
                if (($this->input->post('cmbSquadraCasa') != 0) && ($this->input->post('cmbSquadraTrasferta') != 0) && ($this->input->post('txtPunteggioCasa') != "") && ($this->input->post('txtPunteggioTrasferta') != "") && ($this->input->post('txtGolCasa') != "") && ($this->input->post('txtGolTrasferta') != "")) {
                    if ($this->input->post('cmbScelta') == "Coppa") {
                        $aggiorna = $this->mdl_team->updateCoppa($giornatacoppa, $this->input->post('cmbSquadraCasa'), $this->input->post('cmbSquadraTrasferta'), $this->input->post('txtPunteggioCasa'), $this->input->post('txtPunteggioTrasferta'), $this->input->post('txtGolCasa'), $this->input->post('txtGolTrasferta'));
                        if ($aggiorna)
                            $data['message'] = "Risultati Coppa Treble aggiornati con successo";
                        $this->show('home/aggiorna_coppe', $data);
                        return;
                    }

                    if ($this->input->post('cmbScelta') == "SuperCoppa") {
                        $aggiorna = $this->mdl_team->updateSuperCoppa($giornatacoppa, $this->input->post('cmbSquadraCasa'), $this->input->post('cmbSquadraTrasferta'), $this->input->post('txtPunteggioCasa'), $this->input->post('txtPunteggioTrasferta'), $this->input->post('txtGolCasa'), $this->input->post('txtGolTrasferta'));
                        if ($aggiorna)
                            $data['message'] = "Risultati SuperCoppa Treble aggiornati con successo";
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
                        if ($giornatacoppa <= 24) {
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
                        if ($giornatacoppa <= 24) {
                            $aggiornaChampions2 = $this->mdl_team->insertClassificaChampions($team2, $classifica);
                        }

                        if ($aggiornaRisultatiChampions)
                            $data['message'] = "Risultati Champions League aggiornati con successo";

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
