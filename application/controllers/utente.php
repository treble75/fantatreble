<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utente extends CI_Controller {

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
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        @session_start();
        //ini_set('session.gc_maxlifetime', 24000);
        //ini_set('session.cookie_lifetime', 24000);
        $CI->load->helper(array('form', 'url'));
        $CI->load->library('form_validation');
        $CI->load->library('session');
    }

    public function show($pagina, $dati = '') {
        if ($pagina != "utenti/login")
            $this->load->view('include/header');
        else
            $this->load->view('include/header_login');
        //$this->load->view('include/menu');
        $this->load->view($pagina, $dati);
        $this->load->view('include/footer');
    }

    public function formazioni_campionato() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['titolari'] = $this->mdl_team->getFormazioneT();
        $data['panchinari'] = $this->mdl_team->getFormazioneP();
        $data['risultati'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata']);
        $this->show('utenti/formazioni_campionato', $data);
    }

    public function formazioni_coppe() {
        $this->load->model('mdl_team');
        $this->load->model('mdl_utenti');
        $_SESSION['giornata'] = $this->mdl_team->getGiornata();
        $data['giornata'] = $_SESSION['giornata'];
        $data['titolari_coppa'] = $this->mdl_team->getFormazioneT_Coppa();
        $data['panchinari_coppa'] = $this->mdl_team->getFormazioneP_Coppa();
        $data['risultati_coppa'] = $this->mdl_team->getCalendariogiornatacoppa($_SESSION['giornata']);
        $data['risultati_champions'] = $this->mdl_team->getCalendariogiornatachampions($_SESSION['giornata']);
        $data['risultati_supercoppa'] = $this->mdl_team->getCalendariogiornatasupercoppa($_SESSION['giornata']);
        $this->show('utenti/formazioni_coppe', $data);
    }

    public function inserisci_risultati() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $data['giornata'] = $_SESSION['giornata'];

            $this->form_validation->set_rules('1T1', '1T1');
            $this->form_validation->set_rules('1T2', '1T2');
            $this->form_validation->set_rules('1T3', '1T3');
            $this->form_validation->set_rules('1T4', '1T4');
            $this->form_validation->set_rules('1T5', '1T5');
            $this->form_validation->set_rules('1T6', '1T6');
            $this->form_validation->set_rules('1T7', '1T7');
            $this->form_validation->set_rules('1T8', '1T8');
            $this->form_validation->set_rules('1T9', '1T9');
            $this->form_validation->set_rules('1T10', '1T10');
            $this->form_validation->set_rules('1T11', '1T11');
            $this->form_validation->set_rules('2T1', '2T1');
            $this->form_validation->set_rules('2T2', '2T2');
            $this->form_validation->set_rules('2T3', '2T3');
            $this->form_validation->set_rules('2T4', '2T4');
            $this->form_validation->set_rules('2T5', '2T5');
            $this->form_validation->set_rules('2T6', '2T6');
            $this->form_validation->set_rules('2T7', '2T7');
            $this->form_validation->set_rules('2T8', '2T8');
            $this->form_validation->set_rules('2T9', '2T9');
            $this->form_validation->set_rules('2T10', '2T10');
            $this->form_validation->set_rules('2T11', '2T11');
            $this->form_validation->set_rules('3T1', '3T1');
            $this->form_validation->set_rules('3T2', '3T2');
            $this->form_validation->set_rules('3T3', '3T3');
            $this->form_validation->set_rules('3T4', '3T4');
            $this->form_validation->set_rules('3T5', '3T5');
            $this->form_validation->set_rules('3T6', '3T6');
            $this->form_validation->set_rules('3T7', '3T7');
            $this->form_validation->set_rules('3T8', '3T8');
            $this->form_validation->set_rules('3T9', '3T9');
            $this->form_validation->set_rules('3T10', '3T10');
            $this->form_validation->set_rules('3T11', '3T11');
            $this->form_validation->set_rules('4T1', '4T1');
            $this->form_validation->set_rules('4T2', '4T2');
            $this->form_validation->set_rules('4T3', '4T3');
            $this->form_validation->set_rules('4T4', '4T4');
            $this->form_validation->set_rules('4T5', '4T5');
            $this->form_validation->set_rules('4T6', '4T6');
            $this->form_validation->set_rules('4T7', '4T7');
            $this->form_validation->set_rules('4T8', '4T8');
            $this->form_validation->set_rules('4T9', '4T9');
            $this->form_validation->set_rules('4T10', '4T10');
            $this->form_validation->set_rules('4T11', '4T11');
            $this->form_validation->set_rules('5T1', '5T1');
            $this->form_validation->set_rules('5T2', '5T2');
            $this->form_validation->set_rules('5T3', '5T3');
            $this->form_validation->set_rules('5T4', '5T4');
            $this->form_validation->set_rules('5T5', '5T5');
            $this->form_validation->set_rules('5T6', '5T6');
            $this->form_validation->set_rules('5T7', '5T7');
            $this->form_validation->set_rules('5T8', '5T8');
            $this->form_validation->set_rules('5T9', '5T9');
            $this->form_validation->set_rules('5T10', '5T10');
            $this->form_validation->set_rules('5T11', '5T11');
            $this->form_validation->set_rules('6T1', '6T1');
            $this->form_validation->set_rules('6T2', '6T2');
            $this->form_validation->set_rules('6T3', '6T3');
            $this->form_validation->set_rules('6T4', '6T4');
            $this->form_validation->set_rules('6T5', '6T5');
            $this->form_validation->set_rules('6T6', '6T6');
            $this->form_validation->set_rules('6T7', '6T7');
            $this->form_validation->set_rules('6T8', '6T8');
            $this->form_validation->set_rules('6T9', '6T9');
            $this->form_validation->set_rules('6T10', '6T10');
            $this->form_validation->set_rules('6T11', '6T11');
            $this->form_validation->set_rules('7T1', '7T1');
            $this->form_validation->set_rules('7T2', '7T2');
            $this->form_validation->set_rules('7T3', '7T3');
            $this->form_validation->set_rules('7T4', '7T4');
            $this->form_validation->set_rules('7T5', '7T5');
            $this->form_validation->set_rules('7T6', '7T6');
            $this->form_validation->set_rules('7T7', '7T7');
            $this->form_validation->set_rules('7T8', '7T8');
            $this->form_validation->set_rules('7T9', '7T9');
            $this->form_validation->set_rules('7T10', '7T10');
            $this->form_validation->set_rules('7T11', '7T11');
            $this->form_validation->set_rules('8T1', '8T1');
            $this->form_validation->set_rules('8T2', '8T2');
            $this->form_validation->set_rules('8T3', '8T3');
            $this->form_validation->set_rules('8T4', '8T4');
            $this->form_validation->set_rules('8T5', '8T5');
            $this->form_validation->set_rules('8T6', '8T6');
            $this->form_validation->set_rules('8T7', '8T7');
            $this->form_validation->set_rules('8T8', '8T8');
            $this->form_validation->set_rules('8T9', '8T9');
            $this->form_validation->set_rules('8T10', '8T10');
            $this->form_validation->set_rules('8T11', '8T11');
            $this->form_validation->set_rules('9T1', '9T1');
            $this->form_validation->set_rules('9T2', '9T2');
            $this->form_validation->set_rules('9T3', '9T3');
            $this->form_validation->set_rules('9T4', '9T4');
            $this->form_validation->set_rules('9T5', '9T5');
            $this->form_validation->set_rules('9T6', '9T6');
            $this->form_validation->set_rules('9T7', '9T7');
            $this->form_validation->set_rules('9T8', '9T8');
            $this->form_validation->set_rules('9T9', '9T9');
            $this->form_validation->set_rules('9T10', '9T10');
            $this->form_validation->set_rules('9T11', '9T11');
            $this->form_validation->set_rules('10T1', '10T1');
            $this->form_validation->set_rules('10T2', '10T2');
            $this->form_validation->set_rules('10T3', '10T3');
            $this->form_validation->set_rules('10T4', '10T4');
            $this->form_validation->set_rules('10T5', '10T5');
            $this->form_validation->set_rules('10T6', '10T6');
            $this->form_validation->set_rules('10T7', '10T7');
            $this->form_validation->set_rules('10T8', '10T8');
            $this->form_validation->set_rules('10T9', '10T9');
            $this->form_validation->set_rules('10T10', '10T10');
            $this->form_validation->set_rules('10T11', '10T11');
            $this->form_validation->set_rules('1P1', '1P1');
            $this->form_validation->set_rules('1P2', '1P2');
            $this->form_validation->set_rules('1P3', '1P3');
            $this->form_validation->set_rules('1P4', '1P4');
            $this->form_validation->set_rules('1P5', '1P5');
            $this->form_validation->set_rules('1P6', '1P6');
            $this->form_validation->set_rules('1P7', '1P7');
            $this->form_validation->set_rules('1P8', '1P8');
            $this->form_validation->set_rules('1P9', '1P9');
            $this->form_validation->set_rules('1P10', '1P10');
            $this->form_validation->set_rules('1P11', '1P11');
            $this->form_validation->set_rules('1P12', '1P12');
            $this->form_validation->set_rules('1P13', '1P13');
            $this->form_validation->set_rules('1P14', '1P14');
            $this->form_validation->set_rules('2P1', '2P1');
            $this->form_validation->set_rules('2P2', '2P2');
            $this->form_validation->set_rules('2P3', '2P3');
            $this->form_validation->set_rules('2P4', '2P4');
            $this->form_validation->set_rules('2P5', '2P5');
            $this->form_validation->set_rules('2P6', '2P6');
            $this->form_validation->set_rules('2P7', '2P7');
            $this->form_validation->set_rules('2P8', '2P8');
            $this->form_validation->set_rules('2P9', '2P9');
            $this->form_validation->set_rules('2P10', '2P10');
            $this->form_validation->set_rules('2P11', '2P11');
            $this->form_validation->set_rules('2P12', '2P12');
            $this->form_validation->set_rules('2P13', '2P13');
            $this->form_validation->set_rules('2P14', '2P14');
            $this->form_validation->set_rules('3P1', '3P1');
            $this->form_validation->set_rules('3P2', '3P2');
            $this->form_validation->set_rules('3P3', '3P3');
            $this->form_validation->set_rules('3P4', '3P4');
            $this->form_validation->set_rules('3P5', '3P5');
            $this->form_validation->set_rules('3P6', '3P6');
            $this->form_validation->set_rules('3P7', '3P7');
            $this->form_validation->set_rules('3P8', '3P8');
            $this->form_validation->set_rules('3P9', '3P9');
            $this->form_validation->set_rules('3P10', '3P10');
            $this->form_validation->set_rules('3P11', '3P11');
            $this->form_validation->set_rules('3P12', '3P12');
            $this->form_validation->set_rules('3P13', '3P13');
            $this->form_validation->set_rules('3P14', '3P14');
            $this->form_validation->set_rules('4P1', '4P1');
            $this->form_validation->set_rules('4P2', '4P2');
            $this->form_validation->set_rules('4P3', '4P3');
            $this->form_validation->set_rules('4P4', '4P4');
            $this->form_validation->set_rules('4P5', '4P5');
            $this->form_validation->set_rules('4P6', '4P6');
            $this->form_validation->set_rules('4P7', '4P7');
            $this->form_validation->set_rules('4P8', '4P8');
            $this->form_validation->set_rules('4P9', '4P9');
            $this->form_validation->set_rules('4P10', '4P10');
            $this->form_validation->set_rules('4P11', '4P11');
            $this->form_validation->set_rules('4P12', '4P12');
            $this->form_validation->set_rules('4P13', '4P13');
            $this->form_validation->set_rules('4P14', '4P14');
            $this->form_validation->set_rules('5P1', '5P1');
            $this->form_validation->set_rules('5P2', '5P2');
            $this->form_validation->set_rules('5P3', '5P3');
            $this->form_validation->set_rules('5P4', '5P4');
            $this->form_validation->set_rules('5P5', '5P5');
            $this->form_validation->set_rules('5P6', '5P6');
            $this->form_validation->set_rules('5P7', '5P7');
            $this->form_validation->set_rules('5P8', '5P8');
            $this->form_validation->set_rules('5P9', '5P9');
            $this->form_validation->set_rules('5P10', '5P10');
            $this->form_validation->set_rules('5P11', '5P11');
            $this->form_validation->set_rules('5P12', '5P12');
            $this->form_validation->set_rules('5P13', '5P13');
            $this->form_validation->set_rules('5P14', '5P14');
            $this->form_validation->set_rules('6P1', '6P1');
            $this->form_validation->set_rules('6P2', '6P2');
            $this->form_validation->set_rules('6P3', '6P3');
            $this->form_validation->set_rules('6P4', '6P4');
            $this->form_validation->set_rules('6P5', '6P5');
            $this->form_validation->set_rules('6P6', '6P6');
            $this->form_validation->set_rules('6P7', '6P7');
            $this->form_validation->set_rules('6P8', '6P8');
            $this->form_validation->set_rules('6P9', '6P9');
            $this->form_validation->set_rules('6P10', '6P10');
            $this->form_validation->set_rules('6P11', '6P11');
            $this->form_validation->set_rules('6P12', '6P12');
            $this->form_validation->set_rules('6P13', '6P13');
            $this->form_validation->set_rules('6P14', '6P14');
            $this->form_validation->set_rules('7P1', '7P1');
            $this->form_validation->set_rules('7P2', '7P2');
            $this->form_validation->set_rules('7P3', '7P3');
            $this->form_validation->set_rules('7P4', '7P4');
            $this->form_validation->set_rules('7P5', '7P5');
            $this->form_validation->set_rules('7P6', '7P6');
            $this->form_validation->set_rules('7P7', '7P7');
            $this->form_validation->set_rules('7P8', '7P8');
            $this->form_validation->set_rules('7P9', '7P9');
            $this->form_validation->set_rules('7P10', '7P10');
            $this->form_validation->set_rules('7P11', '7P11');
            $this->form_validation->set_rules('7P12', '7P12');
            $this->form_validation->set_rules('7P13', '7P13');
            $this->form_validation->set_rules('7P14', '7P14');
            $this->form_validation->set_rules('8P1', '8P1');
            $this->form_validation->set_rules('8P2', '8P2');
            $this->form_validation->set_rules('8P3', '8P3');
            $this->form_validation->set_rules('8P4', '8P4');
            $this->form_validation->set_rules('8P5', '8P5');
            $this->form_validation->set_rules('8P6', '8P6');
            $this->form_validation->set_rules('8P7', '8P7');
            $this->form_validation->set_rules('8P8', '8P8');
            $this->form_validation->set_rules('8P9', '8P9');
            $this->form_validation->set_rules('8P10', '8P10');
            $this->form_validation->set_rules('8P11', '8P11');
            $this->form_validation->set_rules('8P12', '8P12');
            $this->form_validation->set_rules('8P13', '8P13');
            $this->form_validation->set_rules('8P14', '8P14');
            $this->form_validation->set_rules('9P1', '9P1');
            $this->form_validation->set_rules('9P2', '9P2');
            $this->form_validation->set_rules('9P3', '9P3');
            $this->form_validation->set_rules('9P4', '9P4');
            $this->form_validation->set_rules('9P5', '9P5');
            $this->form_validation->set_rules('9P6', '9P6');
            $this->form_validation->set_rules('9P7', '9P7');
            $this->form_validation->set_rules('9P8', '9P8');
            $this->form_validation->set_rules('9P9', '9P9');
            $this->form_validation->set_rules('9P10', '9P10');
            $this->form_validation->set_rules('9P11', '9P11');
            $this->form_validation->set_rules('9P12', '9P12');
            $this->form_validation->set_rules('9P13', '9P13');
            $this->form_validation->set_rules('9P14', '9P14');
            $this->form_validation->set_rules('10P1', '10P1');
            $this->form_validation->set_rules('10P2', '10P2');
            $this->form_validation->set_rules('10P3', '10P3');
            $this->form_validation->set_rules('10P4', '10P4');
            $this->form_validation->set_rules('10P5', '10P5');
            $this->form_validation->set_rules('10P6', '10P6');
            $this->form_validation->set_rules('10P7', '10P7');
            $this->form_validation->set_rules('10P8', '10P8');
            $this->form_validation->set_rules('10P9', '10P9');
            $this->form_validation->set_rules('10P10', '10P10');
            $this->form_validation->set_rules('10P11', '10P11');
            $this->form_validation->set_rules('10P12', '10P12');
            $this->form_validation->set_rules('10P13', '10P13');
            $this->form_validation->set_rules('10P14', '10P14');

            if ($this->form_validation->run()) {
                $data = array(
                    'id_utente' => 1,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('1T1'),
                    'T2' => $this->input->post('1T2'),
                    'T3' => $this->input->post('1T3'),
                    'T4' => $this->input->post('1T4'),
                    'T5' => $this->input->post('1T5'),
                    'T6' => $this->input->post('1T6'),
                    'T7' => $this->input->post('1T7'),
                    'T8' => $this->input->post('1T8'),
                    'T9' => $this->input->post('1T9'),
                    'T10' => $this->input->post('1T10'),
                    'T11' => $this->input->post('1T11'),
                    'P1' => $this->input->post('1P1'),
                    'P2' => $this->input->post('1P2'),
                    'P3' => $this->input->post('1P3'),
                    'P4' => $this->input->post('1P4'),
                    'P5' => $this->input->post('1P5'),
                    'P6' => $this->input->post('1P6'),
                    'P7' => $this->input->post('1P7'),
                    'P8' => $this->input->post('1P8'),
                    'P9' => $this->input->post('1P9'),
                    'P10' => $this->input->post('1P10'),
                    'P11' => $this->input->post('1P11'),
                    'P12' => $this->input->post('1P12'),
                    'P13' => $this->input->post('1P13'),
                    'P14' => $this->input->post('1P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 2,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('2T1'),
                    'T2' => $this->input->post('2T2'),
                    'T3' => $this->input->post('2T3'),
                    'T4' => $this->input->post('2T4'),
                    'T5' => $this->input->post('2T5'),
                    'T6' => $this->input->post('2T6'),
                    'T7' => $this->input->post('2T7'),
                    'T8' => $this->input->post('2T8'),
                    'T9' => $this->input->post('2T9'),
                    'T10' => $this->input->post('2T10'),
                    'T11' => $this->input->post('2T11'),
                    'P1' => $this->input->post('2P1'),
                    'P2' => $this->input->post('2P2'),
                    'P3' => $this->input->post('2P3'),
                    'P4' => $this->input->post('2P4'),
                    'P5' => $this->input->post('2P5'),
                    'P6' => $this->input->post('2P6'),
                    'P7' => $this->input->post('2P7'),
                    'P8' => $this->input->post('2P8'),
                    'P9' => $this->input->post('2P9'),
                    'P10' => $this->input->post('2P10'),
                    'P11' => $this->input->post('2P11'),
                    'P12' => $this->input->post('2P12'),
                    'P13' => $this->input->post('2P13'),
                    'P14' => $this->input->post('2P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 3,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('3T1'),
                    'T2' => $this->input->post('3T2'),
                    'T3' => $this->input->post('3T3'),
                    'T4' => $this->input->post('3T4'),
                    'T5' => $this->input->post('3T5'),
                    'T6' => $this->input->post('3T6'),
                    'T7' => $this->input->post('3T7'),
                    'T8' => $this->input->post('3T8'),
                    'T9' => $this->input->post('3T9'),
                    'T10' => $this->input->post('3T10'),
                    'T11' => $this->input->post('3T11'),
                    'P1' => $this->input->post('3P1'),
                    'P2' => $this->input->post('3P2'),
                    'P3' => $this->input->post('3P3'),
                    'P4' => $this->input->post('3P4'),
                    'P5' => $this->input->post('3P5'),
                    'P6' => $this->input->post('3P6'),
                    'P7' => $this->input->post('3P7'),
                    'P8' => $this->input->post('3P8'),
                    'P9' => $this->input->post('3P9'),
                    'P10' => $this->input->post('3P10'),
                    'P11' => $this->input->post('3P11'),
                    'P12' => $this->input->post('3P12'),
                    'P13' => $this->input->post('3P13'),
                    'P14' => $this->input->post('3P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 4,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('4T1'),
                    'T2' => $this->input->post('4T2'),
                    'T3' => $this->input->post('4T3'),
                    'T4' => $this->input->post('4T4'),
                    'T5' => $this->input->post('4T5'),
                    'T6' => $this->input->post('4T6'),
                    'T7' => $this->input->post('4T7'),
                    'T8' => $this->input->post('4T8'),
                    'T9' => $this->input->post('4T9'),
                    'T10' => $this->input->post('4T10'),
                    'T11' => $this->input->post('4T11'),
                    'P1' => $this->input->post('4P1'),
                    'P2' => $this->input->post('4P2'),
                    'P3' => $this->input->post('4P3'),
                    'P4' => $this->input->post('4P4'),
                    'P5' => $this->input->post('4P5'),
                    'P6' => $this->input->post('4P6'),
                    'P7' => $this->input->post('4P7'),
                    'P8' => $this->input->post('4P8'),
                    'P9' => $this->input->post('4P9'),
                    'P10' => $this->input->post('4P10'),
                    'P11' => $this->input->post('4P11'),
                    'P12' => $this->input->post('4P12'),
                    'P13' => $this->input->post('4P13'),
                    'P14' => $this->input->post('4P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 5,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('5T1'),
                    'T2' => $this->input->post('5T2'),
                    'T3' => $this->input->post('5T3'),
                    'T4' => $this->input->post('5T4'),
                    'T5' => $this->input->post('5T5'),
                    'T6' => $this->input->post('5T6'),
                    'T7' => $this->input->post('5T7'),
                    'T8' => $this->input->post('5T8'),
                    'T9' => $this->input->post('5T9'),
                    'T10' => $this->input->post('5T10'),
                    'T11' => $this->input->post('5T11'),
                    'P1' => $this->input->post('5P1'),
                    'P2' => $this->input->post('5P2'),
                    'P3' => $this->input->post('5P3'),
                    'P4' => $this->input->post('5P4'),
                    'P5' => $this->input->post('5P5'),
                    'P6' => $this->input->post('5P6'),
                    'P7' => $this->input->post('5P7'),
                    'P8' => $this->input->post('5P8'),
                    'P9' => $this->input->post('5P9'),
                    'P10' => $this->input->post('5P10'),
                    'P11' => $this->input->post('5P11'),
                    'P12' => $this->input->post('5P12'),
                    'P13' => $this->input->post('5P13'),
                    'P14' => $this->input->post('5P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 6,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('6T1'),
                    'T2' => $this->input->post('6T2'),
                    'T3' => $this->input->post('6T3'),
                    'T4' => $this->input->post('6T4'),
                    'T5' => $this->input->post('6T5'),
                    'T6' => $this->input->post('6T6'),
                    'T7' => $this->input->post('6T7'),
                    'T8' => $this->input->post('6T8'),
                    'T9' => $this->input->post('6T9'),
                    'T10' => $this->input->post('6T10'),
                    'T11' => $this->input->post('6T11'),
                    'P1' => $this->input->post('6P1'),
                    'P2' => $this->input->post('6P2'),
                    'P3' => $this->input->post('6P3'),
                    'P4' => $this->input->post('6P4'),
                    'P5' => $this->input->post('6P5'),
                    'P6' => $this->input->post('6P6'),
                    'P7' => $this->input->post('6P7'),
                    'P8' => $this->input->post('6P8'),
                    'P9' => $this->input->post('6P9'),
                    'P10' => $this->input->post('6P10'),
                    'P11' => $this->input->post('6P11'),
                    'P12' => $this->input->post('6P12'),
                    'P13' => $this->input->post('6P13'),
                    'P14' => $this->input->post('6P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 7,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('7T1'),
                    'T2' => $this->input->post('7T2'),
                    'T3' => $this->input->post('7T3'),
                    'T4' => $this->input->post('7T4'),
                    'T5' => $this->input->post('7T5'),
                    'T6' => $this->input->post('7T6'),
                    'T7' => $this->input->post('7T7'),
                    'T8' => $this->input->post('7T8'),
                    'T9' => $this->input->post('7T9'),
                    'T10' => $this->input->post('7T10'),
                    'T11' => $this->input->post('7T11'),
                    'P1' => $this->input->post('7P1'),
                    'P2' => $this->input->post('7P2'),
                    'P3' => $this->input->post('7P3'),
                    'P4' => $this->input->post('7P4'),
                    'P5' => $this->input->post('7P5'),
                    'P6' => $this->input->post('7P6'),
                    'P7' => $this->input->post('7P7'),
                    'P8' => $this->input->post('7P8'),
                    'P9' => $this->input->post('7P9'),
                    'P10' => $this->input->post('7P10'),
                    'P11' => $this->input->post('7P11'),
                    'P12' => $this->input->post('7P12'),
                    'P13' => $this->input->post('7P13'),
                    'P14' => $this->input->post('7P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 8,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('8T1'),
                    'T2' => $this->input->post('8T2'),
                    'T3' => $this->input->post('8T3'),
                    'T4' => $this->input->post('8T4'),
                    'T5' => $this->input->post('8T5'),
                    'T6' => $this->input->post('8T6'),
                    'T7' => $this->input->post('8T7'),
                    'T8' => $this->input->post('8T8'),
                    'T9' => $this->input->post('8T9'),
                    'T10' => $this->input->post('8T10'),
                    'T11' => $this->input->post('8T11'),
                    'P1' => $this->input->post('8P1'),
                    'P2' => $this->input->post('8P2'),
                    'P3' => $this->input->post('8P3'),
                    'P4' => $this->input->post('8P4'),
                    'P5' => $this->input->post('8P5'),
                    'P6' => $this->input->post('8P6'),
                    'P7' => $this->input->post('8P7'),
                    'P8' => $this->input->post('8P8'),
                    'P9' => $this->input->post('8P9'),
                    'P10' => $this->input->post('8P10'),
                    'P11' => $this->input->post('8P11'),
                    'P12' => $this->input->post('8P12'),
                    'P13' => $this->input->post('8P13'),
                    'P14' => $this->input->post('8P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 9,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('9T1'),
                    'T2' => $this->input->post('9T2'),
                    'T3' => $this->input->post('9T3'),
                    'T4' => $this->input->post('9T4'),
                    'T5' => $this->input->post('9T5'),
                    'T6' => $this->input->post('9T6'),
                    'T7' => $this->input->post('9T7'),
                    'T8' => $this->input->post('9T8'),
                    'T9' => $this->input->post('9T9'),
                    'T10' => $this->input->post('9T10'),
                    'T11' => $this->input->post('9T11'),
                    'P1' => $this->input->post('9P1'),
                    'P2' => $this->input->post('9P2'),
                    'P3' => $this->input->post('9P3'),
                    'P4' => $this->input->post('9P4'),
                    'P5' => $this->input->post('9P5'),
                    'P6' => $this->input->post('9P6'),
                    'P7' => $this->input->post('9P7'),
                    'P8' => $this->input->post('9P8'),
                    'P9' => $this->input->post('9P9'),
                    'P10' => $this->input->post('9P10'),
                    'P11' => $this->input->post('9P11'),
                    'P12' => $this->input->post('9P12'),
                    'P13' => $this->input->post('9P13'),
                    'P14' => $this->input->post('9P14')
                );
                $this->mdl_team->addSchierati($data);
                $data = "";
                $data = array(
                    'id_utente' => 10,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('10T1'),
                    'T2' => $this->input->post('10T2'),
                    'T3' => $this->input->post('10T3'),
                    'T4' => $this->input->post('10T4'),
                    'T5' => $this->input->post('10T5'),
                    'T6' => $this->input->post('10T6'),
                    'T7' => $this->input->post('10T7'),
                    'T8' => $this->input->post('10T8'),
                    'T9' => $this->input->post('10T9'),
                    'T10' => $this->input->post('10T10'),
                    'T11' => $this->input->post('10T11'),
                    'P1' => $this->input->post('10P1'),
                    'P2' => $this->input->post('10P2'),
                    'P3' => $this->input->post('10P3'),
                    'P4' => $this->input->post('10P4'),
                    'P5' => $this->input->post('10P5'),
                    'P6' => $this->input->post('10P6'),
                    'P7' => $this->input->post('10P7'),
                    'P8' => $this->input->post('10P8'),
                    'P9' => $this->input->post('10P9'),
                    'P10' => $this->input->post('10P10'),
                    'P11' => $this->input->post('10P11'),
                    'P12' => $this->input->post('10P12'),
                    'P13' => $this->input->post('10P13'),
                    'P14' => $this->input->post('10P14')
                );
                $this->mdl_team->addSchierati($data);

                //Inserisco i giocatori schierati titolari
                for ($c = 1; $c < 11; $c++) {
                    for ($y = 1; $y < 12; $y++) {
                        $var = $c . "Tcheck" . $y;
                        $txt = $c . "T" . $y;
                        if ($this->input->post($var) == 'Y')
                            $this->mdl_team->addChk($this->input->post($txt));
                    }
                }

                //Inserisco i giocatori schierati panchinari
                for ($c = 1; $c < 15; $c++) {
                    $var = $c . "P1check";
                    $txt = $c . "P1";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P2check";
                    $txt = $c . "P2";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P3check";
                    $txt = $c . "P3";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P4check";
                    $txt = $c . "P4";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P5check";
                    $txt = $c . "P5";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P6check";
                    $txt = $c . "P6";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P7check";
                    $txt = $c . "P7";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P8check";
                    $txt = $c . "P8";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P9check";
                    $txt = $c . "P9";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P10check";
                    $txt = $c . "P10";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P11check";
                    $txt = $c . "P11";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P12check";
                    $txt = $c . "P12";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P13check";
                    $txt = $c . "P13";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                    $var = $c . "P14check";
                    $txt = $c . "P14";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChk($this->input->post($txt));
                }

                $data = "";
                //Vado avanti con l'inserimento dei risultati
                $data['risultati'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata']);
                $data['schierati'] = $this->mdl_team->getSchierati();
                $this->show('utenti/risultati_success', $data);
                return;
            }

            $data['titolari'] = $this->mdl_team->getFormazioneT();
            $data['panchinari'] = $this->mdl_team->getFormazioneP();
            $data['risultati'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata']);
            $this->show('utenti/inserisci_risultati', $data);
        } else
            redirect('utente/login');
    }

    public function inserisci_risultati_Coppe() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $_SESSION['giornata'] = "";
            $_SESSION['giornata'] = $this->mdl_team->getGiornataCoppa();
            $data['giornata'] = $_SESSION['giornata'];

            $this->form_validation->set_rules('1T1', '1T1');
            $this->form_validation->set_rules('1T2', '1T2');
            $this->form_validation->set_rules('1T3', '1T3');
            $this->form_validation->set_rules('1T4', '1T4');
            $this->form_validation->set_rules('1T5', '1T5');
            $this->form_validation->set_rules('1T6', '1T6');
            $this->form_validation->set_rules('1T7', '1T7');
            $this->form_validation->set_rules('1T8', '1T8');
            $this->form_validation->set_rules('1T9', '1T9');
            $this->form_validation->set_rules('1T10', '1T10');
            $this->form_validation->set_rules('1T11', '1T11');
            $this->form_validation->set_rules('2T1', '2T1');
            $this->form_validation->set_rules('2T2', '2T2');
            $this->form_validation->set_rules('2T3', '2T3');
            $this->form_validation->set_rules('2T4', '2T4');
            $this->form_validation->set_rules('2T5', '2T5');
            $this->form_validation->set_rules('2T6', '2T6');
            $this->form_validation->set_rules('2T7', '2T7');
            $this->form_validation->set_rules('2T8', '2T8');
            $this->form_validation->set_rules('2T9', '2T9');
            $this->form_validation->set_rules('2T10', '2T10');
            $this->form_validation->set_rules('2T11', '2T11');
            $this->form_validation->set_rules('3T1', '3T1');
            $this->form_validation->set_rules('3T2', '3T2');
            $this->form_validation->set_rules('3T3', '3T3');
            $this->form_validation->set_rules('3T4', '3T4');
            $this->form_validation->set_rules('3T5', '3T5');
            $this->form_validation->set_rules('3T6', '3T6');
            $this->form_validation->set_rules('3T7', '3T7');
            $this->form_validation->set_rules('3T8', '3T8');
            $this->form_validation->set_rules('3T9', '3T9');
            $this->form_validation->set_rules('3T10', '3T10');
            $this->form_validation->set_rules('3T11', '3T11');
            $this->form_validation->set_rules('4T1', '4T1');
            $this->form_validation->set_rules('4T2', '4T2');
            $this->form_validation->set_rules('4T3', '4T3');
            $this->form_validation->set_rules('4T4', '4T4');
            $this->form_validation->set_rules('4T5', '4T5');
            $this->form_validation->set_rules('4T6', '4T6');
            $this->form_validation->set_rules('4T7', '4T7');
            $this->form_validation->set_rules('4T8', '4T8');
            $this->form_validation->set_rules('4T9', '4T9');
            $this->form_validation->set_rules('4T10', '4T10');
            $this->form_validation->set_rules('4T11', '4T11');
            $this->form_validation->set_rules('5T1', '5T1');
            $this->form_validation->set_rules('5T2', '5T2');
            $this->form_validation->set_rules('5T3', '5T3');
            $this->form_validation->set_rules('5T4', '5T4');
            $this->form_validation->set_rules('5T5', '5T5');
            $this->form_validation->set_rules('5T6', '5T6');
            $this->form_validation->set_rules('5T7', '5T7');
            $this->form_validation->set_rules('5T8', '5T8');
            $this->form_validation->set_rules('5T9', '5T9');
            $this->form_validation->set_rules('5T10', '5T10');
            $this->form_validation->set_rules('5T11', '5T11');
            $this->form_validation->set_rules('6T1', '6T1');
            $this->form_validation->set_rules('6T2', '6T2');
            $this->form_validation->set_rules('6T3', '6T3');
            $this->form_validation->set_rules('6T4', '6T4');
            $this->form_validation->set_rules('6T5', '6T5');
            $this->form_validation->set_rules('6T6', '6T6');
            $this->form_validation->set_rules('6T7', '6T7');
            $this->form_validation->set_rules('6T8', '6T8');
            $this->form_validation->set_rules('6T9', '6T9');
            $this->form_validation->set_rules('6T10', '6T10');
            $this->form_validation->set_rules('6T11', '6T11');
            $this->form_validation->set_rules('7T1', '7T1');
            $this->form_validation->set_rules('7T2', '7T2');
            $this->form_validation->set_rules('7T3', '7T3');
            $this->form_validation->set_rules('7T4', '7T4');
            $this->form_validation->set_rules('7T5', '7T5');
            $this->form_validation->set_rules('7T6', '7T6');
            $this->form_validation->set_rules('7T7', '7T7');
            $this->form_validation->set_rules('7T8', '7T8');
            $this->form_validation->set_rules('7T9', '7T9');
            $this->form_validation->set_rules('7T10', '7T10');
            $this->form_validation->set_rules('7T11', '7T11');
            $this->form_validation->set_rules('8T1', '8T1');
            $this->form_validation->set_rules('8T2', '8T2');
            $this->form_validation->set_rules('8T3', '8T3');
            $this->form_validation->set_rules('8T4', '8T4');
            $this->form_validation->set_rules('8T5', '8T5');
            $this->form_validation->set_rules('8T6', '8T6');
            $this->form_validation->set_rules('8T7', '8T7');
            $this->form_validation->set_rules('8T8', '8T8');
            $this->form_validation->set_rules('8T9', '8T9');
            $this->form_validation->set_rules('8T10', '8T10');
            $this->form_validation->set_rules('8T11', '8T11');
            $this->form_validation->set_rules('9T1', '9T1');
            $this->form_validation->set_rules('9T2', '9T2');
            $this->form_validation->set_rules('9T3', '9T3');
            $this->form_validation->set_rules('9T4', '9T4');
            $this->form_validation->set_rules('9T5', '9T5');
            $this->form_validation->set_rules('9T6', '9T6');
            $this->form_validation->set_rules('9T7', '9T7');
            $this->form_validation->set_rules('9T8', '9T8');
            $this->form_validation->set_rules('9T9', '9T9');
            $this->form_validation->set_rules('9T10', '9T10');
            $this->form_validation->set_rules('9T11', '9T11');
            $this->form_validation->set_rules('10T1', '10T1');
            $this->form_validation->set_rules('10T2', '10T2');
            $this->form_validation->set_rules('10T3', '10T3');
            $this->form_validation->set_rules('10T4', '10T4');
            $this->form_validation->set_rules('10T5', '10T5');
            $this->form_validation->set_rules('10T6', '10T6');
            $this->form_validation->set_rules('10T7', '10T7');
            $this->form_validation->set_rules('10T8', '10T8');
            $this->form_validation->set_rules('10T9', '10T9');
            $this->form_validation->set_rules('10T10', '10T10');
            $this->form_validation->set_rules('10T11', '10T11');
            $this->form_validation->set_rules('1P1', '1P1');
            $this->form_validation->set_rules('1P2', '1P2');
            $this->form_validation->set_rules('1P3', '1P3');
            $this->form_validation->set_rules('1P4', '1P4');
            $this->form_validation->set_rules('1P5', '1P5');
            $this->form_validation->set_rules('1P6', '1P6');
            $this->form_validation->set_rules('1P7', '1P7');
            $this->form_validation->set_rules('1P8', '1P8');
            $this->form_validation->set_rules('1P9', '1P9');
            $this->form_validation->set_rules('1P10', '1P10');
            $this->form_validation->set_rules('1P11', '1P11');
            $this->form_validation->set_rules('1P12', '1P12');
            $this->form_validation->set_rules('1P13', '1P13');
            $this->form_validation->set_rules('1P14', '1P14');
            $this->form_validation->set_rules('2P1', '2P1');
            $this->form_validation->set_rules('2P2', '2P2');
            $this->form_validation->set_rules('2P3', '2P3');
            $this->form_validation->set_rules('2P4', '2P4');
            $this->form_validation->set_rules('2P5', '2P5');
            $this->form_validation->set_rules('2P6', '2P6');
            $this->form_validation->set_rules('2P7', '2P7');
            $this->form_validation->set_rules('2P8', '2P8');
            $this->form_validation->set_rules('2P9', '2P9');
            $this->form_validation->set_rules('2P10', '2P10');
            $this->form_validation->set_rules('2P11', '2P11');
            $this->form_validation->set_rules('2P12', '2P12');
            $this->form_validation->set_rules('2P13', '2P13');
            $this->form_validation->set_rules('2P14', '2P14');
            $this->form_validation->set_rules('3P1', '3P1');
            $this->form_validation->set_rules('3P2', '3P2');
            $this->form_validation->set_rules('3P3', '3P3');
            $this->form_validation->set_rules('3P4', '3P4');
            $this->form_validation->set_rules('3P5', '3P5');
            $this->form_validation->set_rules('3P6', '3P6');
            $this->form_validation->set_rules('3P7', '3P7');
            $this->form_validation->set_rules('3P8', '3P8');
            $this->form_validation->set_rules('3P9', '3P9');
            $this->form_validation->set_rules('3P10', '3P10');
            $this->form_validation->set_rules('3P11', '3P11');
            $this->form_validation->set_rules('3P12', '3P12');
            $this->form_validation->set_rules('3P13', '3P13');
            $this->form_validation->set_rules('3P14', '3P14');
            $this->form_validation->set_rules('4P1', '4P1');
            $this->form_validation->set_rules('4P2', '4P2');
            $this->form_validation->set_rules('4P3', '4P3');
            $this->form_validation->set_rules('4P4', '4P4');
            $this->form_validation->set_rules('4P5', '4P5');
            $this->form_validation->set_rules('4P6', '4P6');
            $this->form_validation->set_rules('4P7', '4P7');
            $this->form_validation->set_rules('4P8', '4P8');
            $this->form_validation->set_rules('4P9', '4P9');
            $this->form_validation->set_rules('4P10', '4P10');
            $this->form_validation->set_rules('4P11', '4P11');
            $this->form_validation->set_rules('4P12', '4P12');
            $this->form_validation->set_rules('4P13', '4P13');
            $this->form_validation->set_rules('4P14', '4P14');
            $this->form_validation->set_rules('5P1', '5P1');
            $this->form_validation->set_rules('5P2', '5P2');
            $this->form_validation->set_rules('5P3', '5P3');
            $this->form_validation->set_rules('5P4', '5P4');
            $this->form_validation->set_rules('5P5', '5P5');
            $this->form_validation->set_rules('5P6', '5P6');
            $this->form_validation->set_rules('5P7', '5P7');
            $this->form_validation->set_rules('5P8', '5P8');
            $this->form_validation->set_rules('5P9', '5P9');
            $this->form_validation->set_rules('5P10', '5P10');
            $this->form_validation->set_rules('5P11', '5P11');
            $this->form_validation->set_rules('5P12', '5P12');
            $this->form_validation->set_rules('5P13', '5P13');
            $this->form_validation->set_rules('5P14', '5P14');
            $this->form_validation->set_rules('6P1', '6P1');
            $this->form_validation->set_rules('6P2', '6P2');
            $this->form_validation->set_rules('6P3', '6P3');
            $this->form_validation->set_rules('6P4', '6P4');
            $this->form_validation->set_rules('6P5', '6P5');
            $this->form_validation->set_rules('6P6', '6P6');
            $this->form_validation->set_rules('6P7', '6P7');
            $this->form_validation->set_rules('6P8', '6P8');
            $this->form_validation->set_rules('6P9', '6P9');
            $this->form_validation->set_rules('6P10', '6P10');
            $this->form_validation->set_rules('6P11', '6P11');
            $this->form_validation->set_rules('6P12', '6P12');
            $this->form_validation->set_rules('6P13', '6P13');
            $this->form_validation->set_rules('6P14', '6P14');
            $this->form_validation->set_rules('7P1', '7P1');
            $this->form_validation->set_rules('7P2', '7P2');
            $this->form_validation->set_rules('7P3', '7P3');
            $this->form_validation->set_rules('7P4', '7P4');
            $this->form_validation->set_rules('7P5', '7P5');
            $this->form_validation->set_rules('7P6', '7P6');
            $this->form_validation->set_rules('7P7', '7P7');
            $this->form_validation->set_rules('7P8', '7P8');
            $this->form_validation->set_rules('7P9', '7P9');
            $this->form_validation->set_rules('7P10', '7P10');
            $this->form_validation->set_rules('7P11', '7P11');
            $this->form_validation->set_rules('7P12', '7P12');
            $this->form_validation->set_rules('7P13', '7P13');
            $this->form_validation->set_rules('7P14', '7P14');
            $this->form_validation->set_rules('8P1', '8P1');
            $this->form_validation->set_rules('8P2', '8P2');
            $this->form_validation->set_rules('8P3', '8P3');
            $this->form_validation->set_rules('8P4', '8P4');
            $this->form_validation->set_rules('8P5', '8P5');
            $this->form_validation->set_rules('8P6', '8P6');
            $this->form_validation->set_rules('8P7', '8P7');
            $this->form_validation->set_rules('8P8', '8P8');
            $this->form_validation->set_rules('8P9', '8P9');
            $this->form_validation->set_rules('8P10', '8P10');
            $this->form_validation->set_rules('8P11', '8P11');
            $this->form_validation->set_rules('8P12', '8P12');
            $this->form_validation->set_rules('8P13', '8P13');
            $this->form_validation->set_rules('8P14', '8P14');
            $this->form_validation->set_rules('9P1', '9P1');
            $this->form_validation->set_rules('9P2', '9P2');
            $this->form_validation->set_rules('9P3', '9P3');
            $this->form_validation->set_rules('9P4', '9P4');
            $this->form_validation->set_rules('9P5', '9P5');
            $this->form_validation->set_rules('9P6', '9P6');
            $this->form_validation->set_rules('9P7', '9P7');
            $this->form_validation->set_rules('9P8', '9P8');
            $this->form_validation->set_rules('9P9', '9P9');
            $this->form_validation->set_rules('9P10', '9P10');
            $this->form_validation->set_rules('9P11', '9P11');
            $this->form_validation->set_rules('9P12', '9P12');
            $this->form_validation->set_rules('9P13', '9P13');
            $this->form_validation->set_rules('9P14', '9P14');
            $this->form_validation->set_rules('10P1', '10P1');
            $this->form_validation->set_rules('10P2', '10P2');
            $this->form_validation->set_rules('10P3', '10P3');
            $this->form_validation->set_rules('10P4', '10P4');
            $this->form_validation->set_rules('10P5', '10P5');
            $this->form_validation->set_rules('10P6', '10P6');
            $this->form_validation->set_rules('10P7', '10P7');
            $this->form_validation->set_rules('10P8', '10P8');
            $this->form_validation->set_rules('10P9', '10P9');
            $this->form_validation->set_rules('10P10', '10P10');
            $this->form_validation->set_rules('10P11', '10P11');
            $this->form_validation->set_rules('10P12', '10P12');
            $this->form_validation->set_rules('10P13', '10P13');
            $this->form_validation->set_rules('10P14', '10P14');

            if ($this->form_validation->run()) {
                $data = array(
                    'id_utente' => 1,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('1T1'),
                    'T2' => $this->input->post('1T2'),
                    'T3' => $this->input->post('1T3'),
                    'T4' => $this->input->post('1T4'),
                    'T5' => $this->input->post('1T5'),
                    'T6' => $this->input->post('1T6'),
                    'T7' => $this->input->post('1T7'),
                    'T8' => $this->input->post('1T8'),
                    'T9' => $this->input->post('1T9'),
                    'T10' => $this->input->post('1T10'),
                    'T11' => $this->input->post('1T11'),
                    'P1' => $this->input->post('1P1'),
                    'P2' => $this->input->post('1P2'),
                    'P3' => $this->input->post('1P3'),
                    'P4' => $this->input->post('1P4'),
                    'P5' => $this->input->post('1P5'),
                    'P6' => $this->input->post('1P6'),
                    'P7' => $this->input->post('1P7'),
                    'P8' => $this->input->post('1P8'),
                    'P9' => $this->input->post('1P9'),
                    'P10' => $this->input->post('1P10'),
                    'P11' => $this->input->post('1P11'),
                    'P12' => $this->input->post('1P12'),
                    'P13' => $this->input->post('1P13'),
                    'P14' => $this->input->post('1P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 2,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('2T1'),
                    'T2' => $this->input->post('2T2'),
                    'T3' => $this->input->post('2T3'),
                    'T4' => $this->input->post('2T4'),
                    'T5' => $this->input->post('2T5'),
                    'T6' => $this->input->post('2T6'),
                    'T7' => $this->input->post('2T7'),
                    'T8' => $this->input->post('2T8'),
                    'T9' => $this->input->post('2T9'),
                    'T10' => $this->input->post('2T10'),
                    'T11' => $this->input->post('2T11'),
                    'P1' => $this->input->post('2P1'),
                    'P2' => $this->input->post('2P2'),
                    'P3' => $this->input->post('2P3'),
                    'P4' => $this->input->post('2P4'),
                    'P5' => $this->input->post('2P5'),
                    'P6' => $this->input->post('2P6'),
                    'P7' => $this->input->post('2P7'),
                    'P8' => $this->input->post('2P8'),
                    'P9' => $this->input->post('2P9'),
                    'P10' => $this->input->post('2P10'),
                    'P11' => $this->input->post('2P11'),
                    'P12' => $this->input->post('2P12'),
                    'P13' => $this->input->post('2P13'),
                    'P14' => $this->input->post('2P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 3,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('3T1'),
                    'T2' => $this->input->post('3T2'),
                    'T3' => $this->input->post('3T3'),
                    'T4' => $this->input->post('3T4'),
                    'T5' => $this->input->post('3T5'),
                    'T6' => $this->input->post('3T6'),
                    'T7' => $this->input->post('3T7'),
                    'T8' => $this->input->post('3T8'),
                    'T9' => $this->input->post('3T9'),
                    'T10' => $this->input->post('3T10'),
                    'T11' => $this->input->post('3T11'),
                    'P1' => $this->input->post('3P1'),
                    'P2' => $this->input->post('3P2'),
                    'P3' => $this->input->post('3P3'),
                    'P4' => $this->input->post('3P4'),
                    'P5' => $this->input->post('3P5'),
                    'P6' => $this->input->post('3P6'),
                    'P7' => $this->input->post('3P7'),
                    'P8' => $this->input->post('3P8'),
                    'P9' => $this->input->post('3P9'),
                    'P10' => $this->input->post('3P10'),
                    'P11' => $this->input->post('3P11'),
                    'P12' => $this->input->post('3P12'),
                    'P13' => $this->input->post('3P13'),
                    'P14' => $this->input->post('3P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 4,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('4T1'),
                    'T2' => $this->input->post('4T2'),
                    'T3' => $this->input->post('4T3'),
                    'T4' => $this->input->post('4T4'),
                    'T5' => $this->input->post('4T5'),
                    'T6' => $this->input->post('4T6'),
                    'T7' => $this->input->post('4T7'),
                    'T8' => $this->input->post('4T8'),
                    'T9' => $this->input->post('4T9'),
                    'T10' => $this->input->post('4T10'),
                    'T11' => $this->input->post('4T11'),
                    'P1' => $this->input->post('4P1'),
                    'P2' => $this->input->post('4P2'),
                    'P3' => $this->input->post('4P3'),
                    'P4' => $this->input->post('4P4'),
                    'P5' => $this->input->post('4P5'),
                    'P6' => $this->input->post('4P6'),
                    'P7' => $this->input->post('4P7'),
                    'P8' => $this->input->post('4P8'),
                    'P9' => $this->input->post('4P9'),
                    'P10' => $this->input->post('4P10'),
                    'P11' => $this->input->post('4P11'),
                    'P12' => $this->input->post('4P12'),
                    'P13' => $this->input->post('4P13'),
                    'P14' => $this->input->post('4P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 5,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('5T1'),
                    'T2' => $this->input->post('5T2'),
                    'T3' => $this->input->post('5T3'),
                    'T4' => $this->input->post('5T4'),
                    'T5' => $this->input->post('5T5'),
                    'T6' => $this->input->post('5T6'),
                    'T7' => $this->input->post('5T7'),
                    'T8' => $this->input->post('5T8'),
                    'T9' => $this->input->post('5T9'),
                    'T10' => $this->input->post('5T10'),
                    'T11' => $this->input->post('5T11'),
                    'P1' => $this->input->post('5P1'),
                    'P2' => $this->input->post('5P2'),
                    'P3' => $this->input->post('5P3'),
                    'P4' => $this->input->post('5P4'),
                    'P5' => $this->input->post('5P5'),
                    'P6' => $this->input->post('5P6'),
                    'P7' => $this->input->post('5P7'),
                    'P8' => $this->input->post('5P8'),
                    'P9' => $this->input->post('5P9'),
                    'P10' => $this->input->post('5P10'),
                    'P11' => $this->input->post('5P11'),
                    'P12' => $this->input->post('5P12'),
                    'P13' => $this->input->post('5P13'),
                    'P14' => $this->input->post('5P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 6,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('6T1'),
                    'T2' => $this->input->post('6T2'),
                    'T3' => $this->input->post('6T3'),
                    'T4' => $this->input->post('6T4'),
                    'T5' => $this->input->post('6T5'),
                    'T6' => $this->input->post('6T6'),
                    'T7' => $this->input->post('6T7'),
                    'T8' => $this->input->post('6T8'),
                    'T9' => $this->input->post('6T9'),
                    'T10' => $this->input->post('6T10'),
                    'T11' => $this->input->post('6T11'),
                    'P1' => $this->input->post('6P1'),
                    'P2' => $this->input->post('6P2'),
                    'P3' => $this->input->post('6P3'),
                    'P4' => $this->input->post('6P4'),
                    'P5' => $this->input->post('6P5'),
                    'P6' => $this->input->post('6P6'),
                    'P7' => $this->input->post('6P7'),
                    'P8' => $this->input->post('6P8'),
                    'P9' => $this->input->post('6P9'),
                    'P10' => $this->input->post('6P10'),
                    'P11' => $this->input->post('6P11'),
                    'P12' => $this->input->post('6P12'),
                    'P13' => $this->input->post('6P13'),
                    'P14' => $this->input->post('6P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 7,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('7T1'),
                    'T2' => $this->input->post('7T2'),
                    'T3' => $this->input->post('7T3'),
                    'T4' => $this->input->post('7T4'),
                    'T5' => $this->input->post('7T5'),
                    'T6' => $this->input->post('7T6'),
                    'T7' => $this->input->post('7T7'),
                    'T8' => $this->input->post('7T8'),
                    'T9' => $this->input->post('7T9'),
                    'T10' => $this->input->post('7T10'),
                    'T11' => $this->input->post('7T11'),
                    'P1' => $this->input->post('7P1'),
                    'P2' => $this->input->post('7P2'),
                    'P3' => $this->input->post('7P3'),
                    'P4' => $this->input->post('7P4'),
                    'P5' => $this->input->post('7P5'),
                    'P6' => $this->input->post('7P6'),
                    'P7' => $this->input->post('7P7'),
                    'P8' => $this->input->post('7P8'),
                    'P9' => $this->input->post('7P9'),
                    'P10' => $this->input->post('7P10'),
                    'P11' => $this->input->post('7P11'),
                    'P12' => $this->input->post('7P12'),
                    'P13' => $this->input->post('7P13'),
                    'P14' => $this->input->post('7P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 8,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('8T1'),
                    'T2' => $this->input->post('8T2'),
                    'T3' => $this->input->post('8T3'),
                    'T4' => $this->input->post('8T4'),
                    'T5' => $this->input->post('8T5'),
                    'T6' => $this->input->post('8T6'),
                    'T7' => $this->input->post('8T7'),
                    'T8' => $this->input->post('8T8'),
                    'T9' => $this->input->post('8T9'),
                    'T10' => $this->input->post('8T10'),
                    'T11' => $this->input->post('8T11'),
                    'P1' => $this->input->post('8P1'),
                    'P2' => $this->input->post('8P2'),
                    'P3' => $this->input->post('8P3'),
                    'P4' => $this->input->post('8P4'),
                    'P5' => $this->input->post('8P5'),
                    'P6' => $this->input->post('8P6'),
                    'P7' => $this->input->post('8P7'),
                    'P8' => $this->input->post('8P8'),
                    'P9' => $this->input->post('8P9'),
                    'P10' => $this->input->post('8P10'),
                    'P11' => $this->input->post('8P11'),
                    'P12' => $this->input->post('8P12'),
                    'P13' => $this->input->post('8P13'),
                    'P14' => $this->input->post('8P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 9,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('9T1'),
                    'T2' => $this->input->post('9T2'),
                    'T3' => $this->input->post('9T3'),
                    'T4' => $this->input->post('9T4'),
                    'T5' => $this->input->post('9T5'),
                    'T6' => $this->input->post('9T6'),
                    'T7' => $this->input->post('9T7'),
                    'T8' => $this->input->post('9T8'),
                    'T9' => $this->input->post('9T9'),
                    'T10' => $this->input->post('9T10'),
                    'T11' => $this->input->post('9T11'),
                    'P1' => $this->input->post('9P1'),
                    'P2' => $this->input->post('9P2'),
                    'P3' => $this->input->post('9P3'),
                    'P4' => $this->input->post('9P4'),
                    'P5' => $this->input->post('9P5'),
                    'P6' => $this->input->post('9P6'),
                    'P7' => $this->input->post('9P7'),
                    'P8' => $this->input->post('9P8'),
                    'P9' => $this->input->post('9P9'),
                    'P10' => $this->input->post('9P10'),
                    'P11' => $this->input->post('9P11'),
                    'P12' => $this->input->post('9P12'),
                    'P13' => $this->input->post('9P13'),
                    'P14' => $this->input->post('9P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);
                $data = "";
                $data = array(
                    'id_utente' => 10,
                    'giornata' => $_SESSION['giornata'],
                    'T1' => $this->input->post('10T1'),
                    'T2' => $this->input->post('10T2'),
                    'T3' => $this->input->post('10T3'),
                    'T4' => $this->input->post('10T4'),
                    'T5' => $this->input->post('10T5'),
                    'T6' => $this->input->post('10T6'),
                    'T7' => $this->input->post('10T7'),
                    'T8' => $this->input->post('10T8'),
                    'T9' => $this->input->post('10T9'),
                    'T10' => $this->input->post('10T10'),
                    'T11' => $this->input->post('10T11'),
                    'P1' => $this->input->post('10P1'),
                    'P2' => $this->input->post('10P2'),
                    'P3' => $this->input->post('10P3'),
                    'P4' => $this->input->post('10P4'),
                    'P5' => $this->input->post('10P5'),
                    'P6' => $this->input->post('10P6'),
                    'P7' => $this->input->post('10P7'),
                    'P8' => $this->input->post('10P8'),
                    'P9' => $this->input->post('10P9'),
                    'P10' => $this->input->post('10P10'),
                    'P11' => $this->input->post('10P11'),
                    'P12' => $this->input->post('10P12'),
                    'P13' => $this->input->post('10P13'),
                    'P14' => $this->input->post('10P14')
                );
                $this->mdl_team->addSchieratiCoppa($data);

                //Inserisco i giocatori schierati titolari Coppa
                for ($c = 1; $c < 11; $c++) {
                    for ($y = 1; $y < 12; $y++) {
                        $var = $c . "Tcheck" . $y;
                        $txt = $c . "T" . $y;
                        if ($this->input->post($var) == 'Y')
                            $this->mdl_team->addChkCoppa($this->input->post($txt));
                    }
                }

                //Inserisco i giocatori schierati panchinari Coppa
                for ($c = 1; $c < 15; $c++) {
                    $var = $c . "P1check";
                    $txt = $c . "P1";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P2check";
                    $txt = $c . "P2";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P3check";
                    $txt = $c . "P3";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P4check";
                    $txt = $c . "P4";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P5check";
                    $txt = $c . "P5";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P6check";
                    $txt = $c . "P6";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P7check";
                    $txt = $c . "P7";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P8check";
                    $txt = $c . "P8";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P9check";
                    $txt = $c . "P9";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P10check";
                    $txt = $c . "P10";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P11check";
                    $txt = $c . "P11";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P12check";
                    $txt = $c . "P12";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P13check";
                    $txt = $c . "P13";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                    $var = $c . "P14check";
                    $txt = $c . "P14";
                    if ($this->input->post($var) == 'Y')
                        $this->mdl_team->addChkCoppa($this->input->post($txt));
                }

                $data = "";
                //Vado avanti solo per realizzare i totali
                $data['risultati_champions'] = $this->mdl_team->getCalendariogiornatachampions($_SESSION['giornata']);
                $data['risultati_coppa'] = $this->mdl_team->getCalendariogiornatacoppa($_SESSION['giornata']);
                $data['risultati_supercoppa'] = $this->mdl_team->getCalendariogiornatasupercoppa($_SESSION['giornata']);
                $data['schierati'] = $this->mdl_team->getSchieratiCoppa();
                $this->show('utenti/risultati_successCoppa', $data);
                return;
            }

            $data['titolari'] = $this->mdl_team->getFormazioneT_Coppa();
            $data['panchinari'] = $this->mdl_team->getFormazioneP_Coppa();
            $data['risultati_champions'] = $this->mdl_team->getCalendariogiornatachampions($_SESSION['giornata']);
            $data['risultati_coppa'] = $this->mdl_team->getCalendariogiornatacoppa($_SESSION['giornata']);
            $data['risultati_supercoppa'] = $this->mdl_team->getCalendariogiornatasupercoppa($_SESSION['giornata']);
            $this->show('utenti/inserisci_risultatiCoppe', $data);
        } else
            redirect('utente/login');
    }

    function risultati_successCoppa() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $_SESSION['giornata'] = $this->mdl_team->getGiornataCoppa();

            $this->form_validation->set_rules('totale0', 'Totale1');
            $this->form_validation->set_rules('totale1', 'Totale2');
            $this->form_validation->set_rules('totale2', 'Totale3');
            $this->form_validation->set_rules('totale3', 'Totale4');
            $this->form_validation->set_rules('totale4', 'Totale5');
            $this->form_validation->set_rules('totale5', 'Totale6');
            $this->form_validation->set_rules('totale6', 'Totale7');
            $this->form_validation->set_rules('totale7', 'Totale8');
            $this->form_validation->set_rules('totale8', 'Totale9');
            $this->form_validation->set_rules('totale9', 'Totale10');
            $this->form_validation->set_rules('bonus0', 'Bonus1');
            $this->form_validation->set_rules('bonus1', 'Bonus2');
            $this->form_validation->set_rules('bonus2', 'Bonus3');
            $this->form_validation->set_rules('bonus3', 'Bonus4');
            $this->form_validation->set_rules('bonus4', 'Bonus5');
            $this->form_validation->set_rules('bonus5', 'Bonus6');
            $this->form_validation->set_rules('bonus6', 'Bonus7');
            $this->form_validation->set_rules('bonus7', 'Bonus8');
            $this->form_validation->set_rules('bonus8', 'Bonus9');
            $this->form_validation->set_rules('bonus9', 'Bonus10');
            $this->form_validation->set_rules('numero_difensori0', 'Numero_difensori1');
            $this->form_validation->set_rules('numero_difensori1', 'Numero_difensori2');
            $this->form_validation->set_rules('numero_difensori2', 'Numero_difensori3');
            $this->form_validation->set_rules('numero_difensori3', 'Numero_difensori4');
            $this->form_validation->set_rules('numero_difensori4', 'Numero_difensori5');
            $this->form_validation->set_rules('numero_difensori5', 'Numero_difensori6');
            $this->form_validation->set_rules('numero_difensori6', 'Numero_difensori7');
            $this->form_validation->set_rules('numero_difensori7', 'Numero_difensori8');
            $this->form_validation->set_rules('numero_difensori8', 'Numero_difensori9');
            $this->form_validation->set_rules('numero_difensori9', 'Numero_difensori10');

            if ($this->form_validation->run()) {
                $data = array(
                    'totale1' => $this->input->post('totale0'),
                    'totale2' => $this->input->post('totale1'),
                    'totale3' => $this->input->post('totale2'),
                    'totale4' => $this->input->post('totale3'),
                    'totale5' => $this->input->post('totale4'),
                    'totale6' => $this->input->post('totale5'),
                    'totale7' => $this->input->post('totale6'),
                    'totale8' => $this->input->post('totale7'),
                    'totale9' => $this->input->post('totale8'),
                    'totale10' => $this->input->post('totale9'),
                    'bonus1' => $this->input->post('bonus0'),
                    'bonus2' => $this->input->post('bonus1'),
                    'bonus3' => $this->input->post('bonus2'),
                    'bonus4' => $this->input->post('bonus3'),
                    'bonus5' => $this->input->post('bonus4'),
                    'bonus6' => $this->input->post('bonus5'),
                    'bonus7' => $this->input->post('bonus6'),
                    'bonus8' => $this->input->post('bonus7'),
                    'bonus9' => $this->input->post('bonus8'),
                    'bonus10' => $this->input->post('bonus9'),
                    'num_difensori1' => $this->input->post('numero_difensori0'),
                    'num_difensori2' => $this->input->post('numero_difensori1'),
                    'num_difensori3' => $this->input->post('numero_difensori2'),
                    'num_difensori4' => $this->input->post('numero_difensori3'),
                    'num_difensori5' => $this->input->post('numero_difensori4'),
                    'num_difensori6' => $this->input->post('numero_difensori5'),
                    'num_difensori7' => $this->input->post('numero_difensori6'),
                    'num_difensori8' => $this->input->post('numero_difensori7'),
                    'num_difensori9' => $this->input->post('numero_difensori8'),
                    'num_difensori10' => $this->input->post('numero_difensori9'),
                    'totale_modificatore1' => $this->input->post('totale_modificatore0'),
                    'totale_modificatore2' => $this->input->post('totale_modificatore1'),
                    'totale_modificatore3' => $this->input->post('totale_modificatore2'),
                    'totale_modificatore4' => $this->input->post('totale_modificatore3'),
                    'totale_modificatore5' => $this->input->post('totale_modificatore4'),
                    'totale_modificatore6' => $this->input->post('totale_modificatore5'),
                    'totale_modificatore7' => $this->input->post('totale_modificatore6'),
                    'totale_modificatore8' => $this->input->post('totale_modificatore7'),
                    'totale_modificatore9' => $this->input->post('totale_modificatore8'),
                    'totale_modificatore10' => $this->input->post('totale_modificatore9'),
                    'media_difensori1' => $this->input->post('media_difensori0'),
                    'media_difensori2' => $this->input->post('media_difensori1'),
                    'media_difensori3' => $this->input->post('media_difensori2'),
                    'media_difensori4' => $this->input->post('media_difensori3'),
                    'media_difensori5' => $this->input->post('media_difensori4'),
                    'media_difensori6' => $this->input->post('media_difensori5'),
                    'media_difensori7' => $this->input->post('media_difensori6'),
                    'media_difensori8' => $this->input->post('media_difensori7'),
                    'media_difensori9' => $this->input->post('media_difensori8'),
                    'media_difensori10' => $this->input->post('media_difensori9')
                );

                //inserisco risultati
                switch ($data['totale1']) {
                    case ((0 <= $data['totale1']) && ($data['totale1'] <= 65.5)) : $punteggi['risultato1'] = 0;
                        break;
                    case ((66 <= $data['totale1']) && ($data['totale1'] <= 71.5)) : $punteggi['risultato1'] = 1;
                        break;
                    case ((72 <= $data['totale1']) && ($data['totale1'] <= 77.5)) : $punteggi['risultato1'] = 2;
                        break;
                    case ((78 <= $data['totale1']) && ($data['totale1'] <= 83.5)) : $punteggi['risultato1'] = 3;
                        break;
                    case ((84 <= $data['totale1']) && ($data['totale1'] <= 89.5)) : $punteggi['risultato1'] = 4;
                        break;
                    case ((90 <= $data['totale1']) && ($data['totale1'] <= 95.5)) : $punteggi['risultato1'] = 5;
                        break;
                    case ((96 <= $data['totale1']) && ($data['totale1'] <= 101.5)) : $punteggi['risultato1'] = 6;
                        break;
                    case ((102 <= $data['totale1']) && ($data['totale1'] <= 107.5)) : $punteggi['risultato1'] = 7;
                        break;
                    case ((108 <= $data['totale1']) && ($data['totale1'] <= 113.5)) : $punteggi['risultato1'] = 8;
                        break;
                }
                switch ($data['totale2']) {
                    case ((0 <= $data['totale2']) && ($data['totale2']) <= 65.5) : $punteggi['risultato2'] = 0;
                        break;
                    case ((66 <= $data['totale2']) && ($data['totale2']) <= 71.5) : $punteggi['risultato2'] = 1;
                        break;
                    case ((72 <= $data['totale2']) && ($data['totale2']) <= 77.5) : $punteggi['risultato2'] = 2;
                        break;
                    case ((78 <= $data['totale2']) && ($data['totale2']) <= 83.5) : $punteggi['risultato2'] = 3;
                        break;
                    case ((84 <= $data['totale2']) && ($data['totale2']) <= 89.5) : $punteggi['risultato2'] = 4;
                        break;
                    case ((90 <= $data['totale2']) && ($data['totale2']) <= 95.5) : $punteggi['risultato2'] = 5;
                        break;
                    case ((96 <= $data['totale2']) && ($data['totale2']) <= 101.5) : $punteggi['risultato2'] = 6;
                        break;
                    case ((102 <= $data['totale2']) && ($data['totale2']) <= 107.5) : $punteggi['risultato2'] = 7;
                        break;
                    case ((108 <= $data['totale2']) && ($data['totale2']) <= 113.5) : $punteggi['risultato2'] = 8;
                        break;
                }
                switch ($data['totale3']) {
                    case ((0 <= $data['totale3']) && ($data['totale3'] <= 65.5)) : $punteggi['risultato3'] = 0;
                        break;
                    case ((66 <= $data['totale3']) && ($data['totale3'] <= 71.5)) : $punteggi['risultato3'] = 1;
                        break;
                    case ((72 <= $data['totale3']) && ($data['totale3'] <= 77.5)) : $punteggi['risultato3'] = 2;
                        break;
                    case ((78 <= $data['totale3']) && ($data['totale3'] <= 83.5)) : $punteggi['risultato3'] = 3;
                        break;
                    case ((84 <= $data['totale3']) && ($data['totale3'] <= 89.5)) : $punteggi['risultato3'] = 4;
                        break;
                    case ((90 <= $data['totale3']) && ($data['totale3'] <= 95.5)) : $punteggi['risultato3'] = 5;
                        break;
                    case ((96 <= $data['totale3']) && ($data['totale3'] <= 101.5)) : $punteggi['risultato3'] = 6;
                        break;
                    case ((102 <= $data['totale3']) && ($data['totale3'] <= 107.5)) : $punteggi['risultato3'] = 7;
                        break;
                    case ((108 <= $data['totale3']) && ($data['totale3'] <= 113.5)) : $punteggi['risultato3'] = 8;
                        break;
                }
                switch ($data['totale4']) {
                    case ((0 <= $data['totale4']) && ($data['totale4'] <= 65.5)) : $punteggi['risultato4'] = 0;
                        break;
                    case ((66 <= $data['totale4']) && ($data['totale4'] <= 71.5)) : $punteggi['risultato4'] = 1;
                        break;
                    case ((72 <= $data['totale4']) && ($data['totale4'] <= 77.5)) : $punteggi['risultato4'] = 2;
                        break;
                    case ((78 <= $data['totale4']) && ($data['totale4'] <= 83.5)) : $punteggi['risultato4'] = 3;
                        break;
                    case ((84 <= $data['totale4']) && ($data['totale4'] <= 89.5)) : $punteggi['risultato4'] = 4;
                        break;
                    case ((90 <= $data['totale4']) && ($data['totale4'] <= 95.5)) : $punteggi['risultato4'] = 5;
                        break;
                    case ((96 <= $data['totale4']) && ($data['totale4'] <= 101.5)) : $punteggi['risultato4'] = 6;
                        break;
                    case ((102 <= $data['totale4']) && ($data['totale4'] <= 107.5)) : $punteggi['risultato4'] = 7;
                        break;
                    case ((108 <= $data['totale4']) && ($data['totale4'] <= 113.5)) : $punteggi['risultato4'] = 8;
                        break;
                }
                switch ($data['totale5']) {
                    case ((0 <= $data['totale5']) && ($data['totale5'] <= 65.5)) : $punteggi['risultato5'] = 0;
                        break;
                    case ((66 <= $data['totale5']) && ($data['totale5'] <= 71.5)) : $punteggi['risultato5'] = 1;
                        break;
                    case ((72 <= $data['totale5']) && ($data['totale5'] <= 77.5)) : $punteggi['risultato5'] = 2;
                        break;
                    case ((78 <= $data['totale5']) && ($data['totale5'] <= 83.5)) : $punteggi['risultato5'] = 3;
                        break;
                    case ((84 <= $data['totale5']) && ($data['totale5'] <= 89.5)) : $punteggi['risultato5'] = 4;
                        break;
                    case ((90 <= $data['totale5']) && ($data['totale5'] <= 95.5)) : $punteggi['risultato5'] = 5;
                        break;
                    case ((96 <= $data['totale5']) && ($data['totale5'] <= 101.5)) : $punteggi['risultato5'] = 6;
                        break;
                    case ((102 <= $data['totale5']) && ($data['totale5'] <= 107.5)) : $punteggi['risultato5'] = 7;
                        break;
                    case ((108 <= $data['totale5']) && ($data['totale5'] <= 113.5)) : $punteggi['risultato5'] = 8;
                        break;
                }
                switch ($data['totale6']) {
                    case ((0 <= $data['totale6']) && ($data['totale6'] <= 65.5)) : $punteggi['risultato6'] = 0;
                        break;
                    case ((66 <= $data['totale6']) && ($data['totale6'] <= 71.5)) : $punteggi['risultato6'] = 1;
                        break;
                    case ((72 <= $data['totale6']) && ($data['totale6'] <= 77.5)) : $punteggi['risultato6'] = 2;
                        break;
                    case ((78 <= $data['totale6']) && ($data['totale6'] <= 83.5)) : $punteggi['risultato6'] = 3;
                        break;
                    case ((84 <= $data['totale6']) && ($data['totale6'] <= 89.5)) : $punteggi['risultato6'] = 4;
                        break;
                    case ((90 <= $data['totale6']) && ($data['totale6'] <= 95.5)) : $punteggi['risultato6'] = 5;
                        break;
                    case ((96 <= $data['totale6']) && ($data['totale6'] <= 101.5)) : $punteggi['risultato6'] = 6;
                        break;
                    case ((102 <= $data['totale6']) && ($data['totale6'] <= 107.5)) : $punteggi['risultato6'] = 7;
                        break;
                    case ((108 <= $data['totale6']) && ($data['totale6'] <= 113.5)) : $punteggi['risultato6'] = 8;
                        break;
                }
                switch ($data['totale7']) {
                    case ((0 <= $data['totale7']) && ($data['totale7'] <= 65.5)) : $punteggi['risultato7'] = 0;
                        break;
                    case ((66 <= $data['totale7']) && ($data['totale7'] <= 71.5)) : $punteggi['risultato7'] = 1;
                        break;
                    case ((72 <= $data['totale7']) && ($data['totale7'] <= 77.5)) : $punteggi['risultato7'] = 2;
                        break;
                    case ((78 <= $data['totale7']) && ($data['totale7'] <= 83.5)) : $punteggi['risultato7'] = 3;
                        break;
                    case ((84 <= $data['totale7']) && ($data['totale7'] <= 89.5)) : $punteggi['risultato7'] = 4;
                        break;
                    case ((90 <= $data['totale7']) && ($data['totale7'] <= 95.5)) : $punteggi['risultato7'] = 5;
                        break;
                    case ((96 <= $data['totale7']) && ($data['totale7'] <= 101.5)) : $punteggi['risultato7'] = 6;
                        break;
                    case ((102 <= $data['totale7']) && ($data['totale7'] <= 107.5)) : $punteggi['risultato7'] = 7;
                        break;
                    case ((108 <= $data['totale7']) && ($data['totale7'] <= 113.5)) : $punteggi['risultato7'] = 8;
                        break;
                }
                switch ($data['totale8']) {
                    case ((0 <= $data['totale8']) && ($data['totale8'] <= 65.5)) : $punteggi['risultato8'] = 0;
                        break;
                    case ((66 <= $data['totale8']) && ($data['totale8'] <= 71.5)) : $punteggi['risultato8'] = 1;
                        break;
                    case ((72 <= $data['totale8']) && ($data['totale8'] <= 77.5)) : $punteggi['risultato8'] = 2;
                        break;
                    case ((78 <= $data['totale8']) && ($data['totale8'] <= 83.5)) : $punteggi['risultato8'] = 3;
                        break;
                    case ((84 <= $data['totale8']) && ($data['totale8'] <= 89.5)) : $punteggi['risultato8'] = 4;
                        break;
                    case ((90 <= $data['totale8']) && ($data['totale8'] <= 95.5)) : $punteggi['risultato8'] = 5;
                        break;
                    case ((96 <= $data['totale8']) && ($data['totale8'] <= 101.5)) : $punteggi['risultato8'] = 6;
                        break;
                    case ((102 <= $data['totale8']) && ($data['totale8'] <= 107.5)) : $punteggi['risultato8'] = 7;
                        break;
                    case ((108 <= $data['totale8']) && ($data['totale8'] <= 113.5)) : $punteggi['risultato8'] = 8;
                        break;
                }
                switch ($data['totale9']) {
                    case ((0 <= $data['totale9']) && ($data['totale9'] <= 65.5)) : $punteggi['risultato9'] = 0;
                        break;
                    case ((66 <= $data['totale9']) && ($data['totale9'] <= 71.5)) : $punteggi['risultato9'] = 1;
                        break;
                    case ((72 <= $data['totale9']) && ($data['totale9'] <= 77.5)) : $punteggi['risultato9'] = 2;
                        break;
                    case ((78 <= $data['totale9']) && ($data['totale9'] <= 83.5)) : $punteggi['risultato9'] = 3;
                        break;
                    case ((84 <= $data['totale9']) && ($data['totale9'] <= 89.5)) : $punteggi['risultato9'] = 4;
                        break;
                    case ((90 <= $data['totale9']) && ($data['totale9'] <= 95.5)) : $punteggi['risultato9'] = 5;
                        break;
                    case ((96 <= $data['totale9']) && ($data['totale9'] <= 101.5)) : $punteggi['risultato9'] = 6;
                        break;
                    case ((102 <= $data['totale9']) && ($data['totale9'] <= 107.5)) : $punteggi['risultato9'] = 7;
                        break;
                    case ((108 <= $data['totale9']) && ($data['totale9'] <= 113.5)) : $punteggi['risultato9'] = 8;
                        break;
                }
                switch ($data['totale10']) {
                    case ((0 <= $data['totale10']) && ($data['totale10'] <= 65.5)) : $punteggi['risultato10'] = 0;
                        break;
                    case ((66 <= $data['totale10']) && ($data['totale10'] <= 71.5)) : $punteggi['risultato10'] = 1;
                        break;
                    case ((72 <= $data['totale10']) && ($data['totale10'] <= 77.5)) : $punteggi['risultato10'] = 2;
                        break;
                    case ((78 <= $data['totale10']) && ($data['totale10'] <= 83.5)) : $punteggi['risultato10'] = 3;
                        break;
                    case ((84 <= $data['totale10']) && ($data['totale10'] <= 89.5)) : $punteggi['risultato10'] = 4;
                        break;
                    case ((90 <= $data['totale10']) && ($data['totale10'] <= 95.5)) : $punteggi['risultato10'] = 5;
                        break;
                    case ((96 <= $data['totale10']) && ($data['totale10'] <= 101.5)) : $punteggi['risultato10'] = 6;
                        break;
                    case ((102 <= $data['totale10']) && ($data['totale10'] <= 107.5)) : $punteggi['risultato10'] = 7;
                        break;
                    case ((108 <= $data['totale10']) && ($data['totale10'] <= 113.5)) : $punteggi['risultato10'] = 8;
                        break;
                }

                //Differenzio i tipi di inserimento
                $competizione = "";
                $d = $_SESSION['giornata'];

                //Supercoppa giornata 1
                if ($d == 1)
                    $competizione = "SuperCoppa";

                //Champions League giornate : 2-3-6-9-12-13-16-17-19-22-23-24-27-28-30-33
                if ($d == 2 || $d == 3 || $d == 6 || $d == 9 || $d == 12 || $d == 13 || $d == 16 || $d == 17 || $d == 19 || $d == 22 || $d == 23 || $d == 24 || $d == 27 || $d == 28 || $d == 30 || $d == 33)
                    $competizione = "Champions League";

                //Coppa Treble giornate : 4-7-10-11-15-20-26-31
                if ($d == 4 || $d == 7 || $d == 10 || $d == 11 || $d == 15 || $d == 20 || $d == 26 || $d == 31)
                    $competizione = "Coppa Treble";

                switch ($competizione) {
                    case ($competizione == "SuperCoppa") :
                        //inserisco totali e risultati SuperCoppa
                        $this->mdl_team->insertPunteggiSuperCoppa($data, $punteggi);
                        $risultati = $this->mdl_team->getCalendariogiornatasupercoppa($_SESSION['giornata']);
                        break;
                    case ($competizione == "Champions League") :
                        //inserisco totali e risultati Champions League
                        $this->mdl_team->insertPunteggiChampions($data, $punteggi);
                        $risultati = $this->mdl_team->getCalendariogiornatachampions($_SESSION['giornata']);
                        break;
                    case ($competizione == "Coppa Treble") :
                        //inserisco totali e risultati Coppa Treble
                        $this->mdl_team->insertPunteggiCoppa($data, $punteggi);
                        $risultati = $this->mdl_team->getCalendariogiornatacoppa($_SESSION['giornata']);
                        break;
                }

                //Configuro l'invio mail
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.fantatreble.it',
                    'smtp_port' => 587,
                    'smtp_user' => 'formazioni@fantatreble.it',
                    'smtp_pass' => '3ble160475',
                    'mailtype' => 'html'
                );

                $this->load->library('email', $config);

                $this->email->from('risultati@fantatreble.it', 'FantaTreble');

                $message = "<u>Risultati di " . $competizione . "</u><br><br>";

                foreach ($risultati as $row) {
                    $message .= $this->mdl_utenti->getSquadra($row['id1']) . " - " . $this->mdl_utenti->getSquadra($row['id2']) . " = ";
                    $message .= $row['risultato1'] . " - " . $row['risultato2'] . "<br><br>";
                }

                //Invio la mail all'utente
                $this->load->model('mdl_utenti');
                $mail1 = $this->mdl_utenti->getMail(1);
                $mail2 = $this->mdl_utenti->getMail(2);
                $mail3 = $this->mdl_utenti->getMail(3);
                $mail4 = $this->mdl_utenti->getMail(4);
                $mail5 = $this->mdl_utenti->getMail(5);
                $mail6 = $this->mdl_utenti->getMail(6);
                $mail7 = $this->mdl_utenti->getMail(7);
                $mail8 = $this->mdl_utenti->getMail(8);
                $mail9 = $this->mdl_utenti->getMail(9);
                $mail10 = $this->mdl_utenti->getMail(10);

                $list = array($mail2, $mail3, $mail4, $mail5, $mail6, $mail7, $mail8, $mail9, $mail10);

                $this->email->to($list);
                $this->email->cc($mail1);
                $this->email->bcc("risultati@fantatreble.it");
                $this->email->subject("Risultati Giornata di " . $competizione);
                $this->email->message($message);

                $this->email->send();
            }
            redirect('home/campionato');
        } else
            redirect('utente/login');
    }

    function risultati_success() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();

            $this->form_validation->set_rules('totale0', 'Totale1');
            $this->form_validation->set_rules('totale1', 'Totale2');
            $this->form_validation->set_rules('totale2', 'Totale3');
            $this->form_validation->set_rules('totale3', 'Totale4');
            $this->form_validation->set_rules('totale4', 'Totale5');
            $this->form_validation->set_rules('totale5', 'Totale6');
            $this->form_validation->set_rules('totale6', 'Totale7');
            $this->form_validation->set_rules('totale7', 'Totale8');
            $this->form_validation->set_rules('totale8', 'Totale9');
            $this->form_validation->set_rules('totale9', 'Totale10');
            $this->form_validation->set_rules('bonus0', 'Bonus1');
            $this->form_validation->set_rules('bonus1', 'Bonus2');
            $this->form_validation->set_rules('bonus2', 'Bonus3');
            $this->form_validation->set_rules('bonus3', 'Bonus4');
            $this->form_validation->set_rules('bonus4', 'Bonus5');
            $this->form_validation->set_rules('bonus5', 'Bonus6');
            $this->form_validation->set_rules('bonus6', 'Bonus7');
            $this->form_validation->set_rules('bonus7', 'Bonus8');
            $this->form_validation->set_rules('bonus8', 'Bonus9');
            $this->form_validation->set_rules('bonus9', 'Bonus10');
            $this->form_validation->set_rules('numero_difensori0', 'Numero_difensori1');
            $this->form_validation->set_rules('numero_difensori1', 'Numero_difensori2');
            $this->form_validation->set_rules('numero_difensori2', 'Numero_difensori3');
            $this->form_validation->set_rules('numero_difensori3', 'Numero_difensori4');
            $this->form_validation->set_rules('numero_difensori4', 'Numero_difensori5');
            $this->form_validation->set_rules('numero_difensori5', 'Numero_difensori6');
            $this->form_validation->set_rules('numero_difensori6', 'Numero_difensori7');
            $this->form_validation->set_rules('numero_difensori7', 'Numero_difensori8');
            $this->form_validation->set_rules('numero_difensori8', 'Numero_difensori9');
            $this->form_validation->set_rules('numero_difensori9', 'Numero_difensori10');

            if ($this->form_validation->run()) {
                $data = array(
                    'totale1' => $this->input->post('totale0'),
                    'totale2' => $this->input->post('totale1'),
                    'totale3' => $this->input->post('totale2'),
                    'totale4' => $this->input->post('totale3'),
                    'totale5' => $this->input->post('totale4'),
                    'totale6' => $this->input->post('totale5'),
                    'totale7' => $this->input->post('totale6'),
                    'totale8' => $this->input->post('totale7'),
                    'totale9' => $this->input->post('totale8'),
                    'totale10' => $this->input->post('totale9'),
                    'bonus1' => $this->input->post('bonus0'),
                    'bonus2' => $this->input->post('bonus1'),
                    'bonus3' => $this->input->post('bonus2'),
                    'bonus4' => $this->input->post('bonus3'),
                    'bonus5' => $this->input->post('bonus4'),
                    'bonus6' => $this->input->post('bonus5'),
                    'bonus7' => $this->input->post('bonus6'),
                    'bonus8' => $this->input->post('bonus7'),
                    'bonus9' => $this->input->post('bonus8'),
                    'bonus10' => $this->input->post('bonus9'),
                    'num_difensori1' => $this->input->post('numero_difensori0'),
                    'num_difensori2' => $this->input->post('numero_difensori1'),
                    'num_difensori3' => $this->input->post('numero_difensori2'),
                    'num_difensori4' => $this->input->post('numero_difensori3'),
                    'num_difensori5' => $this->input->post('numero_difensori4'),
                    'num_difensori6' => $this->input->post('numero_difensori5'),
                    'num_difensori7' => $this->input->post('numero_difensori6'),
                    'num_difensori8' => $this->input->post('numero_difensori7'),
                    'num_difensori9' => $this->input->post('numero_difensori8'),
                    'num_difensori10' => $this->input->post('numero_difensori9'),
                    'totale_modificatore1' => $this->input->post('totale_modificatore0'),
                    'totale_modificatore2' => $this->input->post('totale_modificatore1'),
                    'totale_modificatore3' => $this->input->post('totale_modificatore2'),
                    'totale_modificatore4' => $this->input->post('totale_modificatore3'),
                    'totale_modificatore5' => $this->input->post('totale_modificatore4'),
                    'totale_modificatore6' => $this->input->post('totale_modificatore5'),
                    'totale_modificatore7' => $this->input->post('totale_modificatore6'),
                    'totale_modificatore8' => $this->input->post('totale_modificatore7'),
                    'totale_modificatore9' => $this->input->post('totale_modificatore8'),
                    'totale_modificatore10' => $this->input->post('totale_modificatore9'),
                    'media_difensori1' => $this->input->post('media_difensori0'),
                    'media_difensori2' => $this->input->post('media_difensori1'),
                    'media_difensori3' => $this->input->post('media_difensori2'),
                    'media_difensori4' => $this->input->post('media_difensori3'),
                    'media_difensori5' => $this->input->post('media_difensori4'),
                    'media_difensori6' => $this->input->post('media_difensori5'),
                    'media_difensori7' => $this->input->post('media_difensori6'),
                    'media_difensori8' => $this->input->post('media_difensori7'),
                    'media_difensori9' => $this->input->post('media_difensori8'),
                    'media_difensori10' => $this->input->post('media_difensori9')
                );

                //inserisco risultati
                switch ($data['totale1']) {
                    case ((0 <= $data['totale1']) && ($data['totale1'] <= 65.5)) : $punteggi['risultato1'] = 0;
                        break;
                    case ((66 <= $data['totale1']) && ($data['totale1'] <= 71.5)) : $punteggi['risultato1'] = 1;
                        break;
                    case ((72 <= $data['totale1']) && ($data['totale1'] <= 77.5)) : $punteggi['risultato1'] = 2;
                        break;
                    case ((78 <= $data['totale1']) && ($data['totale1'] <= 83.5)) : $punteggi['risultato1'] = 3;
                        break;
                    case ((84 <= $data['totale1']) && ($data['totale1'] <= 89.5)) : $punteggi['risultato1'] = 4;
                        break;
                    case ((90 <= $data['totale1']) && ($data['totale1'] <= 95.5)) : $punteggi['risultato1'] = 5;
                        break;
                    case ((96 <= $data['totale1']) && ($data['totale1'] <= 101.5)) : $punteggi['risultato1'] = 6;
                        break;
                    case ((102 <= $data['totale1']) && ($data['totale1'] <= 107.5)) : $punteggi['risultato1'] = 7;
                        break;
                    case ((108 <= $data['totale1']) && ($data['totale1'] <= 113.5)) : $punteggi['risultato1'] = 8;
                        break;
                }
                switch ($data['totale2']) {
                    case ((0 <= $data['totale2']) && ($data['totale2']) <= 65.5) : $punteggi['risultato2'] = 0;
                        break;
                    case ((66 <= $data['totale2']) && ($data['totale2']) <= 71.5) : $punteggi['risultato2'] = 1;
                        break;
                    case ((72 <= $data['totale2']) && ($data['totale2']) <= 77.5) : $punteggi['risultato2'] = 2;
                        break;
                    case ((78 <= $data['totale2']) && ($data['totale2']) <= 83.5) : $punteggi['risultato2'] = 3;
                        break;
                    case ((84 <= $data['totale2']) && ($data['totale2']) <= 89.5) : $punteggi['risultato2'] = 4;
                        break;
                    case ((90 <= $data['totale2']) && ($data['totale2']) <= 95.5) : $punteggi['risultato2'] = 5;
                        break;
                    case ((96 <= $data['totale2']) && ($data['totale2']) <= 101.5) : $punteggi['risultato2'] = 6;
                        break;
                    case ((102 <= $data['totale2']) && ($data['totale2']) <= 107.5) : $punteggi['risultato2'] = 7;
                        break;
                    case ((108 <= $data['totale2']) && ($data['totale2']) <= 113.5) : $punteggi['risultato2'] = 8;
                        break;
                }
                switch ($data['totale3']) {
                    case ((0 <= $data['totale3']) && ($data['totale3'] <= 65.5)) : $punteggi['risultato3'] = 0;
                        break;
                    case ((66 <= $data['totale3']) && ($data['totale3'] <= 71.5)) : $punteggi['risultato3'] = 1;
                        break;
                    case ((72 <= $data['totale3']) && ($data['totale3'] <= 77.5)) : $punteggi['risultato3'] = 2;
                        break;
                    case ((78 <= $data['totale3']) && ($data['totale3'] <= 83.5)) : $punteggi['risultato3'] = 3;
                        break;
                    case ((84 <= $data['totale3']) && ($data['totale3'] <= 89.5)) : $punteggi['risultato3'] = 4;
                        break;
                    case ((90 <= $data['totale3']) && ($data['totale3'] <= 95.5)) : $punteggi['risultato3'] = 5;
                        break;
                    case ((96 <= $data['totale3']) && ($data['totale3'] <= 101.5)) : $punteggi['risultato3'] = 6;
                        break;
                    case ((102 <= $data['totale3']) && ($data['totale3'] <= 107.5)) : $punteggi['risultato3'] = 7;
                        break;
                    case ((108 <= $data['totale3']) && ($data['totale3'] <= 113.5)) : $punteggi['risultato3'] = 8;
                        break;
                }
                switch ($data['totale4']) {
                    case ((0 <= $data['totale4']) && ($data['totale4'] <= 65.5)) : $punteggi['risultato4'] = 0;
                        break;
                    case ((66 <= $data['totale4']) && ($data['totale4'] <= 71.5)) : $punteggi['risultato4'] = 1;
                        break;
                    case ((72 <= $data['totale4']) && ($data['totale4'] <= 77.5)) : $punteggi['risultato4'] = 2;
                        break;
                    case ((78 <= $data['totale4']) && ($data['totale4'] <= 83.5)) : $punteggi['risultato4'] = 3;
                        break;
                    case ((84 <= $data['totale4']) && ($data['totale4'] <= 89.5)) : $punteggi['risultato4'] = 4;
                        break;
                    case ((90 <= $data['totale4']) && ($data['totale4'] <= 95.5)) : $punteggi['risultato4'] = 5;
                        break;
                    case ((96 <= $data['totale4']) && ($data['totale4'] <= 101.5)) : $punteggi['risultato4'] = 6;
                        break;
                    case ((102 <= $data['totale4']) && ($data['totale4'] <= 107.5)) : $punteggi['risultato4'] = 7;
                        break;
                    case ((108 <= $data['totale4']) && ($data['totale4'] <= 113.5)) : $punteggi['risultato4'] = 8;
                        break;
                }
                switch ($data['totale5']) {
                    case ((0 <= $data['totale5']) && ($data['totale5'] <= 65.5)) : $punteggi['risultato5'] = 0;
                        break;
                    case ((66 <= $data['totale5']) && ($data['totale5'] <= 71.5)) : $punteggi['risultato5'] = 1;
                        break;
                    case ((72 <= $data['totale5']) && ($data['totale5'] <= 77.5)) : $punteggi['risultato5'] = 2;
                        break;
                    case ((78 <= $data['totale5']) && ($data['totale5'] <= 83.5)) : $punteggi['risultato5'] = 3;
                        break;
                    case ((84 <= $data['totale5']) && ($data['totale5'] <= 89.5)) : $punteggi['risultato5'] = 4;
                        break;
                    case ((90 <= $data['totale5']) && ($data['totale5'] <= 95.5)) : $punteggi['risultato5'] = 5;
                        break;
                    case ((96 <= $data['totale5']) && ($data['totale5'] <= 101.5)) : $punteggi['risultato5'] = 6;
                        break;
                    case ((102 <= $data['totale5']) && ($data['totale5'] <= 107.5)) : $punteggi['risultato5'] = 7;
                        break;
                    case ((108 <= $data['totale5']) && ($data['totale5'] <= 113.5)) : $punteggi['risultato5'] = 8;
                        break;
                }
                switch ($data['totale6']) {
                    case ((0 <= $data['totale6']) && ($data['totale6'] <= 65.5)) : $punteggi['risultato6'] = 0;
                        break;
                    case ((66 <= $data['totale6']) && ($data['totale6'] <= 71.5)) : $punteggi['risultato6'] = 1;
                        break;
                    case ((72 <= $data['totale6']) && ($data['totale6'] <= 77.5)) : $punteggi['risultato6'] = 2;
                        break;
                    case ((78 <= $data['totale6']) && ($data['totale6'] <= 83.5)) : $punteggi['risultato6'] = 3;
                        break;
                    case ((84 <= $data['totale6']) && ($data['totale6'] <= 89.5)) : $punteggi['risultato6'] = 4;
                        break;
                    case ((90 <= $data['totale6']) && ($data['totale6'] <= 95.5)) : $punteggi['risultato6'] = 5;
                        break;
                    case ((96 <= $data['totale6']) && ($data['totale6'] <= 101.5)) : $punteggi['risultato6'] = 6;
                        break;
                    case ((102 <= $data['totale6']) && ($data['totale6'] <= 107.5)) : $punteggi['risultato6'] = 7;
                        break;
                    case ((108 <= $data['totale6']) && ($data['totale6'] <= 113.5)) : $punteggi['risultato6'] = 8;
                        break;
                }
                switch ($data['totale7']) {
                    case ((0 <= $data['totale7']) && ($data['totale7'] <= 65.5)) : $punteggi['risultato7'] = 0;
                        break;
                    case ((66 <= $data['totale7']) && ($data['totale7'] <= 71.5)) : $punteggi['risultato7'] = 1;
                        break;
                    case ((72 <= $data['totale7']) && ($data['totale7'] <= 77.5)) : $punteggi['risultato7'] = 2;
                        break;
                    case ((78 <= $data['totale7']) && ($data['totale7'] <= 83.5)) : $punteggi['risultato7'] = 3;
                        break;
                    case ((84 <= $data['totale7']) && ($data['totale7'] <= 89.5)) : $punteggi['risultato7'] = 4;
                        break;
                    case ((90 <= $data['totale7']) && ($data['totale7'] <= 95.5)) : $punteggi['risultato7'] = 5;
                        break;
                    case ((96 <= $data['totale7']) && ($data['totale7'] <= 101.5)) : $punteggi['risultato7'] = 6;
                        break;
                    case ((102 <= $data['totale7']) && ($data['totale7'] <= 107.5)) : $punteggi['risultato7'] = 7;
                        break;
                    case ((108 <= $data['totale7']) && ($data['totale7'] <= 113.5)) : $punteggi['risultato7'] = 8;
                        break;
                }
                switch ($data['totale8']) {
                    case ((0 <= $data['totale8']) && ($data['totale8'] <= 65.5)) : $punteggi['risultato8'] = 0;
                        break;
                    case ((66 <= $data['totale8']) && ($data['totale8'] <= 71.5)) : $punteggi['risultato8'] = 1;
                        break;
                    case ((72 <= $data['totale8']) && ($data['totale8'] <= 77.5)) : $punteggi['risultato8'] = 2;
                        break;
                    case ((78 <= $data['totale8']) && ($data['totale8'] <= 83.5)) : $punteggi['risultato8'] = 3;
                        break;
                    case ((84 <= $data['totale8']) && ($data['totale8'] <= 89.5)) : $punteggi['risultato8'] = 4;
                        break;
                    case ((90 <= $data['totale8']) && ($data['totale8'] <= 95.5)) : $punteggi['risultato8'] = 5;
                        break;
                    case ((96 <= $data['totale8']) && ($data['totale8'] <= 101.5)) : $punteggi['risultato8'] = 6;
                        break;
                    case ((102 <= $data['totale8']) && ($data['totale8'] <= 107.5)) : $punteggi['risultato8'] = 7;
                        break;
                    case ((108 <= $data['totale8']) && ($data['totale8'] <= 113.5)) : $punteggi['risultato8'] = 8;
                        break;
                }
                switch ($data['totale9']) {
                    case ((0 <= $data['totale9']) && ($data['totale9'] <= 65.5)) : $punteggi['risultato9'] = 0;
                        break;
                    case ((66 <= $data['totale9']) && ($data['totale9'] <= 71.5)) : $punteggi['risultato9'] = 1;
                        break;
                    case ((72 <= $data['totale9']) && ($data['totale9'] <= 77.5)) : $punteggi['risultato9'] = 2;
                        break;
                    case ((78 <= $data['totale9']) && ($data['totale9'] <= 83.5)) : $punteggi['risultato9'] = 3;
                        break;
                    case ((84 <= $data['totale9']) && ($data['totale9'] <= 89.5)) : $punteggi['risultato9'] = 4;
                        break;
                    case ((90 <= $data['totale9']) && ($data['totale9'] <= 95.5)) : $punteggi['risultato9'] = 5;
                        break;
                    case ((96 <= $data['totale9']) && ($data['totale9'] <= 101.5)) : $punteggi['risultato9'] = 6;
                        break;
                    case ((102 <= $data['totale9']) && ($data['totale9'] <= 107.5)) : $punteggi['risultato9'] = 7;
                        break;
                    case ((108 <= $data['totale9']) && ($data['totale9'] <= 113.5)) : $punteggi['risultato9'] = 8;
                        break;
                }
                switch ($data['totale10']) {
                    case ((0 <= $data['totale10']) && ($data['totale10'] <= 65.5)) : $punteggi['risultato10'] = 0;
                        break;
                    case ((66 <= $data['totale10']) && ($data['totale10'] <= 71.5)) : $punteggi['risultato10'] = 1;
                        break;
                    case ((72 <= $data['totale10']) && ($data['totale10'] <= 77.5)) : $punteggi['risultato10'] = 2;
                        break;
                    case ((78 <= $data['totale10']) && ($data['totale10'] <= 83.5)) : $punteggi['risultato10'] = 3;
                        break;
                    case ((84 <= $data['totale10']) && ($data['totale10'] <= 89.5)) : $punteggi['risultato10'] = 4;
                        break;
                    case ((90 <= $data['totale10']) && ($data['totale10'] <= 95.5)) : $punteggi['risultato10'] = 5;
                        break;
                    case ((96 <= $data['totale10']) && ($data['totale10'] <= 101.5)) : $punteggi['risultato10'] = 6;
                        break;
                    case ((102 <= $data['totale10']) && ($data['totale10'] <= 107.5)) : $punteggi['risultato10'] = 7;
                        break;
                    case ((108 <= $data['totale10']) && ($data['totale10'] <= 113.5)) : $punteggi['risultato10'] = 8;
                        break;
                }
                //inserisco totali e risultati
                $this->mdl_team->insertPunteggi($data, $punteggi);

                //Configuro l'invio mail
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.fantatreble.it',
                    'smtp_port' => 587,
                    'smtp_user' => 'formazioni@fantatreble.it',
                    'smtp_pass' => '3ble160475',
                    'mailtype' => 'html'
                );

                $this->load->library('email', $config);

                $this->email->from('risultati@fantatreble.it', 'FantaTreble');

                $message = "<u>Risultati Fantatreble</u><br><br>";
                $risultati = $this->mdl_team->getCalendariogiornata($_SESSION['giornata']);
                foreach ($risultati as $row) {
                    $message .= $this->mdl_utenti->getSquadra($row['id1']) . " - " . $this->mdl_utenti->getSquadra($row['id2']) . " = ";
                    $message .= $row['risultato1'] . " - " . $row['risultato2'] . "<br><br>";
                }

                //Invio la mail all'utente
                $this->load->model('mdl_utenti');
                $mail1 = $this->mdl_utenti->getMail(1);
                $mail2 = $this->mdl_utenti->getMail(2);
                $mail3 = $this->mdl_utenti->getMail(3);
                $mail4 = $this->mdl_utenti->getMail(4);
                $mail5 = $this->mdl_utenti->getMail(5);
                $mail6 = $this->mdl_utenti->getMail(6);
                $mail7 = $this->mdl_utenti->getMail(7);
                $mail8 = $this->mdl_utenti->getMail(8);
                $mail9 = $this->mdl_utenti->getMail(9);
                $mail10 = $this->mdl_utenti->getMail(10);

                $list = array($mail2, $mail3, $mail4, $mail5, $mail6, $mail7, $mail8, $mail9, $mail10);

                $this->email->to($list);
                $this->email->cc($mail1);
                $this->email->bcc("risultati@fantatreble.it");
                $this->email->subject("Risultati Giornata n. " . $_SESSION['giornata']);
                $this->email->message($message);

                $this->email->send();
            }
            redirect('utente/giornata');
        } else
            redirect('utente/login');
    }

    function giornata() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();

            if ($this->input->post('but_archivia')) {
                $this->form_validation->set_rules('GF1', 'GF1');
                $this->form_validation->set_rules('GS1', 'GS1');
                $this->form_validation->set_rules('GF2', 'GF2');
                $this->form_validation->set_rules('GS2', 'GS2');
                $this->form_validation->set_rules('GF3', 'GF3');
                $this->form_validation->set_rules('GS3', 'GS3');
                $this->form_validation->set_rules('GF4', 'GF4');
                $this->form_validation->set_rules('GS4', 'GS4');
                $this->form_validation->set_rules('GF5', 'GF5');
                $this->form_validation->set_rules('GS5', 'GS5');
                $this->form_validation->set_rules('GF6', 'GF6');
                $this->form_validation->set_rules('GS6', 'GS6');
                $this->form_validation->set_rules('GF7', 'GF7');
                $this->form_validation->set_rules('GS7', 'GS7');
                $this->form_validation->set_rules('GF8', 'GF8');
                $this->form_validation->set_rules('GS8', 'GS8');
                $this->form_validation->set_rules('GF9', 'GF9');
                $this->form_validation->set_rules('GS9', 'GS9');
                $this->form_validation->set_rules('GF10', 'GF10');
                $this->form_validation->set_rules('GS10', 'GS10');

                $classifica = "";
                $GF = $this->input->post('GF1');
                $GS = $this->input->post('GS1');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(1, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF2');
                $GS = $this->input->post('GS2');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(2, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF3');
                $GS = $this->input->post('GS3');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(3, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF4');
                $GS = $this->input->post('GS4');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(4, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF5');
                $GS = $this->input->post('GS5');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(5, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF6');
                $GS = $this->input->post('GS6');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(6, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF7');
                $GS = $this->input->post('GS7');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(7, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF8');
                $GS = $this->input->post('GS8');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(8, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF9');
                $GS = $this->input->post('GS9');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(9, $classifica);
                }
                $classifica = "";
                $GF = $this->input->post('GF10');
                $GS = $this->input->post('GS10');
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
                //Inserire ultima giornata di Regular Season
                if ($_SESSION['giornata'] <= 27) {
                    $this->mdl_team->insertClassifica(10, $classifica);
                }

                //Chiudo la giornata
                $this->mdl_team->closeGiornata();
                $data['message'] = "Risultati inseriti con successo. La giornata è conclusa !";

                $data['giornata'] = $_SESSION['giornata'];
                $data['risultati_giornata'] = $this->mdl_team->getCalendariogiornata($_SESSION['giornata'] - 1);
                $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
                $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
                $data['bomber'] = $this->mdl_team->getBomber($_SESSION['giornata']);

                $data['risultati'] = $this->mdl_team->getCalendario1A();
                $data['classifica'] = $this->mdl_team->getClassifica($_SESSION['giornata']);
                $this->show('home/campionato', $data);
                return;
            }

            $data['giornata'] = $_SESSION['giornata'];
            $data['risultati'] = $this->mdl_team->getGiornataGiocata();
            $this->show('utenti/giornata', $data);
        } else
            redirect('utente/login');
    }

    function inserisci_voti() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();

            //Calcolo fantavoto per i portieri
            if ($this->input->post('but_vota1')) {
                $this->form_validation->set_rules('cmbPortieri', 'Portieri');
                $this->form_validation->set_rules('txtVotoP', 'Voto', 'trim|required|numeric|greater_than[0]|less_than[10]');
                $this->form_validation->set_rules('GolP', 'Gol');
                $this->form_validation->set_rules('AssistP', 'Assist');
                $this->form_validation->set_rules('AmmoP', 'Ammonizione');
                $this->form_validation->set_rules('EspuP', 'Espulsione');
                $this->form_validation->set_rules('RigParP', 'Rigore Parato');
                $this->form_validation->set_rules('RigSbaP', 'Rigore Sbagliato');
                $this->form_validation->set_rules('AutogolP', 'Autogol');
                $this->form_validation->set_rules('Golsubiti', 'Gol Subiti');

                if ($this->form_validation->run()) {
                    $fantavoto = $this->input->post('txtVotoP');

                    if ($this->input->post('Golsubiti') != 0)
                        $fantavoto = ($fantavoto - $this->input->post('Golsubiti'));
                    if ($this->input->post('GolP') != 0) {
                        $bonus = (5 * $this->input->post('GolP'));
                        $fantavoto = ($fantavoto + $bonus);
                    }
                    if ($this->input->post('AssistP') != 0)
                        $fantavoto = ($fantavoto + $this->input->post('AssistP'));
                    if ($this->input->post('AmmoP') == 1)
                        $fantavoto = ($fantavoto - 0.5);
                    if ($this->input->post('EspuP') == 1)
                        $fantavoto = ($fantavoto - 1);
                    if ($this->input->post('RigParP') != 0)
                        $fantavoto = ($fantavoto + (3 * $this->input->post('RigParP')));
                    if ($this->input->post('RigSbaP') != 0)
                        $fantavoto = ($fantavoto - (3 * $this->input->post('RigSbaP')));
                    if ($this->input->post('AutogolP') != 0)
                    //Modifica GDS 2016 : autogol del portiere vale -1
                        $fantavoto = ($fantavoto - (1 * $this->input->post('AutogolP')));

                    $data = array(
                        'giornata' => $_SESSION['giornata'],
                        'id_giocatore' => $this->input->post('cmbPortieri'),
                        'voto' => $this->input->post('txtVotoP'),
                        'gol' => $this->input->post('GolP'),
                        'assist' => $this->input->post('AssistP'),
                        'ammonizioni' => $this->input->post('AmmoP'),
                        'espulsioni' => $this->input->post('EspuP'),
                        'rigore_parato' => $this->input->post('RigParP'),
                        'rigore_sbagliato' => $this->input->post('RigSbaP'),
                        'autogol' => $this->input->post('AutogolP'),
                        'gol_subiti' => $this->input->post('Golsubiti'),
                        'fantavoto' => $fantavoto,
                        'schierato' => 0,
                    );

                    //Inserisco voti e modifico tabella giocatori
                    $this->mdl_team->insertVoto($data);
                    $this->mdl_team->updateGiocatori($data['id_giocatore'], $_SESSION['giornata']);
                    $data['message'] = "Voto inserito: " . $this->mdl_team->getNomeGiocatore($data['id_giocatore']) . " - Voto: " . $data['voto'] . " - FV: " . $data['fantavoto'] . " - Gol: " . $data['gol'] . " - Assist: " . $data['assist'] . " - Ammo: " . $data['ammonizioni'] . " - Espu: " . $data['espulsioni'] . " - RigPar: " . $data['rigore_parato'] . " - RigSba: " . $data['rigore_sbagliato'] . " - Autogol: " . $data['autogol'] . " - Gol Subiti: " . $data['gol_subiti'];
                }
            }

            //Calcolo fantavoto per i difensori
            if ($this->input->post('but_vota2')) {
                $this->form_validation->set_rules('cmbDifensori', 'Difensori');
                $this->form_validation->set_rules('txtVotoD', 'Voto', 'trim|required|numeric|greater_than[0]|less_than[10]');
                $this->form_validation->set_rules('GolD', 'Gol');
                $this->form_validation->set_rules('AssistD', 'Assist');
                $this->form_validation->set_rules('AmmoD', 'Ammonizione');
                $this->form_validation->set_rules('EspuD', 'Espulsione');
                $this->form_validation->set_rules('RigParD', 'Rigore Parato');
                $this->form_validation->set_rules('RigSbaD', 'Rigore Sbagliato');
                $this->form_validation->set_rules('AutogolD', 'Autogol');
                $this->form_validation->set_rules('GolsubitiD', 'Gol Subiti');

                if ($this->form_validation->run()) {
                    $fantavoto = $this->input->post('txtVotoD');

                    if ($this->input->post('GolsubitiD') != 0)
                        $fantavoto = ($fantavoto - $this->input->post('GolsubitiD'));
                    if ($this->input->post('GolD') != 0) {
                        $bonus = (4 * $this->input->post('GolD'));
                        $fantavoto = ($fantavoto + $bonus);
                    }
                    if ($this->input->post('AssistD') != 0)
                        $fantavoto = ($fantavoto + $this->input->post('AssistD'));
                    if ($this->input->post('AmmoD') == 1)
                        $fantavoto = ($fantavoto - 0.5);
                    if ($this->input->post('EspuD') == 1)
                        $fantavoto = ($fantavoto - 1);
                    if ($this->input->post('RigParD') != 0)
                        $fantavoto = ($fantavoto + (3 * $this->input->post('RigParD')));
                    if ($this->input->post('RigSbaD') != 0)
                        $fantavoto = ($fantavoto - (3 * $this->input->post('RigSbaD')));
                    if ($this->input->post('AutogolD') != 0)
                        $fantavoto = ($fantavoto - (2 * $this->input->post('AutogolD')));

                    $data = array(
                        'giornata' => $_SESSION['giornata'],
                        'id_giocatore' => $this->input->post('cmbDifensori'),
                        'voto' => $this->input->post('txtVotoD'),
                        'gol' => $this->input->post('GolD'),
                        'assist' => $this->input->post('AssistD'),
                        'ammonizioni' => $this->input->post('AmmoD'),
                        'espulsioni' => $this->input->post('EspuD'),
                        'rigore_parato' => $this->input->post('RigParD'),
                        'rigore_sbagliato' => $this->input->post('RigSbaD'),
                        'autogol' => $this->input->post('AutogolD'),
                        'gol_subiti' => $this->input->post('GolsubitiD'),
                        'fantavoto' => $fantavoto,
                        'schierato' => 0,
                    );

                    //Inserisco voti e modifico tabella giocatori
                    $this->mdl_team->insertVoto($data);
                    $this->mdl_team->updateGiocatori($data['id_giocatore'], $_SESSION['giornata']);
                    $data['message'] = "Voto inserito: " . $this->mdl_team->getNomeGiocatore($data['id_giocatore']) . " - Voto: " . $data['voto'] . " - FV: " . $data['fantavoto'] . " - Gol: " . $data['gol'] . " - Assist: " . $data['assist'] . " - Ammo: " . $data['ammonizioni'] . " - Espu: " . $data['espulsioni'] . " - RigPar: " . $data['rigore_parato'] . " - RigSba: " . $data['rigore_sbagliato'] . " - Autogol: " . $data['autogol'] . " - Gol Subiti: " . $data['gol_subiti'];
                }
            }

            //Calcolo fantavoto per i centrocampisti
            if ($this->input->post('but_vota3')) {
                $this->form_validation->set_rules('cmbCentrocampisti', 'Centrocampisti');
                $this->form_validation->set_rules('txtVotoC', 'Voto', 'trim|required|numeric|greater_than[0]|less_than[10]');
                $this->form_validation->set_rules('GolC', 'Gol');
                $this->form_validation->set_rules('AssistC', 'Assist');
                $this->form_validation->set_rules('AmmoC', 'Ammonizione');
                $this->form_validation->set_rules('EspuC', 'Espulsione');
                $this->form_validation->set_rules('RigParC', 'Rigore Parato');
                $this->form_validation->set_rules('RigSbaC', 'Rigore Sbagliato');
                $this->form_validation->set_rules('AutogolC', 'Autogol');
                $this->form_validation->set_rules('GolsubitiC', 'Gol Subiti');

                if ($this->form_validation->run()) {
                    $fantavoto = $this->input->post('txtVotoC');

                    if ($this->input->post('GolsubitiC') != 0)
                        $fantavoto = ($fantavoto - $this->input->post('GolsubitiC'));
                    if ($this->input->post('GolC') != 0) {
                        $bonus = (3.5 * $this->input->post('GolC'));
                        $fantavoto = ($fantavoto + $bonus);
                    }
                    if ($this->input->post('AssistC') != 0)
                        $fantavoto = ($fantavoto + $this->input->post('AssistC'));
                    if ($this->input->post('AmmoC') == 1)
                        $fantavoto = ($fantavoto - 0.5);
                    if ($this->input->post('EspuC') == 1)
                        $fantavoto = ($fantavoto - 1);
                    if ($this->input->post('RigParC') != 0)
                        $fantavoto = ($fantavoto + (3 * $this->input->post('RigParC')));
                    if ($this->input->post('RigSbaC') != 0)
                        $fantavoto = ($fantavoto - (3 * $this->input->post('RigSbaC')));
                    if ($this->input->post('AutogolC') != 0)
                        $fantavoto = ($fantavoto - (2 * $this->input->post('AutogolC')));

                    $data = array(
                        'giornata' => $_SESSION['giornata'],
                        'id_giocatore' => $this->input->post('cmbCentrocampisti'),
                        'voto' => $this->input->post('txtVotoC'),
                        'gol' => $this->input->post('GolC'),
                        'assist' => $this->input->post('AssistC'),
                        'ammonizioni' => $this->input->post('AmmoC'),
                        'espulsioni' => $this->input->post('EspuC'),
                        'rigore_parato' => $this->input->post('RigParC'),
                        'rigore_sbagliato' => $this->input->post('RigSbaC'),
                        'autogol' => $this->input->post('AutogolC'),
                        'gol_subiti' => $this->input->post('GolsubitiC'),
                        'fantavoto' => $fantavoto,
                        'schierato' => 0,
                    );

                    //Inserisco voti e modifico tabella giocatori
                    $this->mdl_team->insertVoto($data);
                    $this->mdl_team->updateGiocatori($data['id_giocatore'], $_SESSION['giornata']);
                    $data['message'] = "Voto inserito: " . $this->mdl_team->getNomeGiocatore($data['id_giocatore']) . " - Voto: " . $data['voto'] . " - FV: " . $data['fantavoto'] . " - Gol: " . $data['gol'] . " - Assist: " . $data['assist'] . " - Ammo: " . $data['ammonizioni'] . " - Espu: " . $data['espulsioni'] . " - RigPar: " . $data['rigore_parato'] . " - RigSba: " . $data['rigore_sbagliato'] . " - Autogol: " . $data['autogol'] . " - Gol Subiti: " . $data['gol_subiti'];
                }
            }

            //Calcolo fantavoto per gli attaccanti
            if ($this->input->post('but_vota4')) {
                $this->form_validation->set_rules('cmbAttaccanti', 'Attaccanti');
                $this->form_validation->set_rules('txtVotoA', 'Voto', 'trim|required|numeric|greater_than[0]|less_than[10]');
                $this->form_validation->set_rules('GolA', 'Gol');
                $this->form_validation->set_rules('AssistA', 'Assist');
                $this->form_validation->set_rules('AmmoA', 'Ammonizione');
                $this->form_validation->set_rules('EspuA', 'Espulsione');
                $this->form_validation->set_rules('RigParA', 'Rigore Parato');
                $this->form_validation->set_rules('RigSbaA', 'Rigore Sbagliato');
                $this->form_validation->set_rules('AutogolA', 'Autogol');
                $this->form_validation->set_rules('GolsubitiA', 'Gol Subiti');

                if ($this->form_validation->run()) {
                    $fantavoto = $this->input->post('txtVotoA');

                    if ($this->input->post('GolsubitiA') != 0)
                        $fantavoto = ($fantavoto - $this->input->post('GolsubitiA'));
                    if ($this->input->post('GolA') != 0) {
                        $bonus = (3 * $this->input->post('GolA'));
                        $fantavoto = ($fantavoto + $bonus);
                    }
                    if ($this->input->post('AssistA') != 0)
                        $fantavoto = ($fantavoto + $this->input->post('AssistA'));
                    if ($this->input->post('AmmoA') == 1)
                        $fantavoto = ($fantavoto - 0.5);
                    if ($this->input->post('EspuA') == 1)
                        $fantavoto = ($fantavoto - 1);
                    if ($this->input->post('RigParA') != 0)
                        $fantavoto = ($fantavoto + (3 * $this->input->post('RigParA')));
                    if ($this->input->post('RigSbaA') != 0)
                        $fantavoto = ($fantavoto - (3 * $this->input->post('RigSbaA')));
                    if ($this->input->post('AutogolA') != 0)
                        $fantavoto = ($fantavoto - (2 * $this->input->post('AutogolA')));

                    $data = array(
                        'giornata' => $_SESSION['giornata'],
                        'id_giocatore' => $this->input->post('cmbAttaccanti'),
                        'voto' => $this->input->post('txtVotoA'),
                        'gol' => $this->input->post('GolA'),
                        'assist' => $this->input->post('AssistA'),
                        'ammonizioni' => $this->input->post('AmmoA'),
                        'espulsioni' => $this->input->post('EspuA'),
                        'rigore_parato' => $this->input->post('RigParA'),
                        'rigore_sbagliato' => $this->input->post('RigSbaA'),
                        'autogol' => $this->input->post('AutogolA'),
                        'gol_subiti' => $this->input->post('GolsubitiA'),
                        'fantavoto' => $fantavoto,
                        'schierato' => 0,
                    );

                    //Inserisco voti e modifico tabella giocatori
                    $this->mdl_team->insertVoto($data);
                    $this->mdl_team->updateGiocatori($data['id_giocatore'], $_SESSION['giornata']);
                    $data['message'] = "Voto inserito: " . $this->mdl_team->getNomeGiocatore($data['id_giocatore']) . " - Voto: " . $data['voto'] . " - FV: " . $data['fantavoto'] . " - Gol: " . $data['gol'] . " - Assist: " . $data['assist'] . " - Ammo: " . $data['ammonizioni'] . " - Espu: " . $data['espulsioni'] . " - RigPar: " . $data['rigore_parato'] . " - RigSba: " . $data['rigore_sbagliato'] . " - Autogol: " . $data['autogol'] . " - Gol Subiti: " . $data['gol_subiti'];
                }
            }

            $data['Portieri'] = $this->mdl_categories->getGiocatoriSel(false, 1, $_SESSION['giornata']);
            $data['Difensori'] = $this->mdl_categories->getGiocatoriSel(false, 2, $_SESSION['giornata']);
            $data['Centrocampisti'] = $this->mdl_categories->getGiocatoriSel(false, 3, $_SESSION['giornata']);
            $data['Attaccanti'] = $this->mdl_categories->getGiocatoriSel(false, 4, $_SESSION['giornata']);

            $this->show('utenti/inserisci_voti', $data);
        } else
            redirect('utente/login');
    }

    public function login() {
        $this->load->model('mdl_utenti');

        $this->form_validation->set_rules('utente', 'Utente', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            $utente = $this->input->post('utente');
            $password = md5($this->input->post('password'));

            if ($this->mdl_utenti->login($utente, $password)) {
                redirect('home/index');
            } else {
                $topData['message'] = 'Utente o password errati<br>';
                $this->show('home/homepage', $topData);
            }
        } else {
            $topData['message'] = '';
            $this->show('home/homepage', $topData);
        }
    }

    public function home() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();

            $giornata = ($_SESSION['giornata'] - 1);
            $data['top'] = $this->mdl_team->getTop($giornata);
            $data['topCampionato'] = $this->mdl_team->getTopCampionato();
            $data['offerte'] = $this->mdl_team->getLastOfferte();

            $this->show('utenti/home.php', $data);
        } else
            redirect('utente/login');
    }

    public function news() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->view('home/news');
        } else
            redirect('utente/login');
    }

    public function elenco_rigoristi() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');

            //$data['rigoristi'] = $this->mdl_team->getAllRigoristi();

            $this->show('utenti/elenco_rigoristi.php');
        } else
            redirect('utente/login');
    }

    public function rigoristi() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $this->load->model('mdl_categories');
            $giornata = $this->mdl_team->getGiornata();

            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            //Recupero dal db, data e ora di blocco invio formazioni
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }

            //Setto il timezone per ogni evenienza
            date_default_timezone_set('Europe/Rome');

            //Verifico se la formazione è creata prima del blocco orario
            $orario = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
            $blocco = $this->mdl_utenti->getBlocco();
            $bloccoO = substr($blocco, 11, 2);
            $bloccoM = substr($blocco, 14, 2);
            $bloccoS = substr($blocco, 17, 2);
            $bloccom = substr($blocco, 5, 2);
            $bloccod = substr($blocco, 8, 2);
            $bloccoY = substr($blocco, 0, 4);
            $blocco = mktime($bloccoO, $bloccoM, $bloccoS, $bloccom, $bloccod, $bloccoY);

            if ($orario <= $blocco) {

                $this->form_validation->set_rules('cmbRigorista1', 'cmbRigorista1');
                $this->form_validation->set_rules('cmbRigorista2', 'cmbRigorista2');
                $this->form_validation->set_rules('cmbRigorista3', 'cmbRigorista3');
                $this->form_validation->set_rules('cmbRigorista4', 'cmbRigorista4');
                $this->form_validation->set_rules('cmbRigorista5', 'cmbRigorista5');
                $this->form_validation->set_rules('cmbRigorista6', 'cmbRigorista6');
                $this->form_validation->set_rules('cmbRigorista7', 'cmbRigorista7');
                $this->form_validation->set_rules('cmbRigorista8', 'cmbRigorista8');
                $this->form_validation->set_rules('cmbRigorista9', 'cmbRigorista9');
                $this->form_validation->set_rules('cmbRigorista10', 'cmbRigorista10');
                $this->form_validation->set_rules('cmbRigorista11', 'cmbRigorista11');
                $this->form_validation->set_rules('cmbRigorista12', 'cmbRigorista12');
                $this->form_validation->set_rules('cmbRigorista13', 'cmbRigorista13');
                $this->form_validation->set_rules('cmbRigorista14', 'cmbRigorista14');
                $this->form_validation->set_rules('cmbRigorista15', 'cmbRigorista15');
                $this->form_validation->set_rules('cmbRigorista16', 'cmbRigorista16');
                $this->form_validation->set_rules('cmbRigorista17', 'cmbRigorista17');
                $this->form_validation->set_rules('cmbRigorista18', 'cmbRigorista18');
                $this->form_validation->set_rules('cmbRigorista19', 'cmbRigorista19');
                $this->form_validation->set_rules('cmbRigorista20', 'cmbRigorista20');
                $this->form_validation->set_rules('cmbRigorista21', 'cmbRigorista21');
                $this->form_validation->set_rules('cmbRigorista22', 'cmbRigorista22');
                $this->form_validation->set_rules('cmbRigorista23', 'cmbRigorista23');
                $this->form_validation->set_rules('cmbRigorista24', 'cmbRigorista24');
                $this->form_validation->set_rules('cmbRigorista25', 'cmbRigorista25');

                if ($this->input->post('but_reset_rigoristi')) {
                    //Prima svuoto i rigoristi precedenti
                    $deleteRigoristi = $this->mdl_team->deleteRigoristi($giornata, $_SESSION['id_utente']);

                    //Poi inserisco la formazione standard partendo da attaccanti, centrocampisti ecc.
                    $formazione = $this->mdl_team->getTeamForResetRigori($_SESSION['id_utente']);

                    $i = 1;
                    for ($c = 0; $c < 25; $c++) {
                        //Inserisco i rigoristi nell'ordine di inserimento
                        $ins = $this->mdl_team->insertRigoristi($giornata, $_SESSION['id_utente'], $formazione[$c]['id_giocatore'], $i);

                        $i++;
                    }
                    $data['formazione'] = "";
                    $data['rigoristi'] = "";
                    $data['message'] = '<p style="color:green;">Rigoristi resettati con successo !</p>';
                    $data['rigoristi'] = $this->mdl_categories->getRigoristi(false, $_SESSION['id_utente']);
                    $data['formazione'] = $this->mdl_categories->getTeamForRigori(false, $_SESSION['id_utente']);

                    $this->show('utenti/rigoristi.php', $data);
                    return;
                }

                if ($this->form_validation->run()) {

                    for ($i = 1; $i <= 25; $i++) {

                        //Verifico che non ci siano campi uguali
                        $rig1 = $this->input->post('cmbRigorista' . $i);
                        for ($chk = ($i + 1); $chk <= 26; $chk++) {
                            $rig2 = $this->input->post('cmbRigorista' . $chk);
                            if ($rig1 == $rig2) {
                                $data['rigoristi'] = $this->mdl_categories->getRigoristi(false, $_SESSION['id_utente']);
                                $data['formazione'] = $this->mdl_categories->getTeamForRigori(false, $_SESSION['id_utente']);
                                $data['message'] = '<p style="color:red;">ATTENZIONE : hai inserito più volte lo stesso rigorista !</p>';

                                $this->show('utenti/rigoristi.php', $data);
                                return;
                            }
                            //echo "i = ".$i." - c = ".$chk."<br>";
                        }
                    }

                    //Prima svuoto i rigoristi precedenti
                    $deleteRigoristi = $this->mdl_team->deleteRigoristi($giornata, $_SESSION['id_utente']);

                    $i = "";
                    for ($i = 1; $i <= 25; $i++) {
                        //Inserisco i rigoristi nell'ordine di inserimento
                        $rig = $this->input->post('cmbRigorista' . $i);
                        $ins = $this->mdl_team->insertRigoristi($giornata, $_SESSION['id_utente'], $rig, $i);
                    }

                    $data['message'] = '<p style="color:green;">Rigoristi inseriti con successo !</p>';
                }
            } else {
                $data['message'] = "<p>Non è possibile modificare i rigoristi a partite già iniziate !<br>Verranno selezionati gli ultimi rigoristi schierati.</p>";
            }

            $data['rigoristi'] = $this->mdl_categories->getRigoristi(false, $_SESSION['id_utente']);
            $data['formazione'] = $this->mdl_categories->getTeamForRigori(false, $_SESSION['id_utente']);

            $this->show('utenti/rigoristi.php', $data);
        } else
            redirect('utente/login');
    }

    public function team($team) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');

            $data['id_utente'] = $team;
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $data['giornata'] = $_SESSION['giornata'];
            $data['myteamT'] = $this->mdl_utenti->getSchieramentoT($team);
            $data['myteamTCoppa'] = $this->mdl_utenti->getSchieramentoTCoppa($team);
            $data['myteamP'] = $this->mdl_utenti->getSchieramentoP($team);
            $data['myteamPCoppa'] = $this->mdl_utenti->getSchieramentoPCoppa($team);
            $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
            $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
            $data['utente'] = $this->mdl_utenti->getDatiUtente($team);
            $data['team'] = $this->mdl_team->getTeam($team);
            $data['partitegiocate'] = $this->mdl_team->getPartitegiocate();
            $data['partitegiocateChampions'] = $this->mdl_team->getPartitegiocateChampions();
            $data['partitegiocateCoppa'] = $this->mdl_team->getPartitegiocateCoppa();
            $data['partitegiocateSuperCoppa'] = $this->mdl_team->getPartitegiocateSuperCoppa();
            $data['prossimapartita'] = $this->mdl_team->getProssimapartita();
            $data['prossimapartitacoppa'] = $this->mdl_team->getProssimapartitacoppa();
            $data['prossimapartitachampions'] = $this->mdl_team->getProssimapartitachampions();
            $data['bomber'] = $this->mdl_team->getBomberTeam($team, $_SESSION['giornata']);

            $this->show('utenti/team', $data);
        } else
            redirect('utente/login');
    }

    public function myteam() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }
            $data['giornata'] = $_SESSION['giornata'];
            $data['myteamT'] = $this->mdl_utenti->getSchieramentoT($_SESSION['id_utente']);
            $data['myteamTCoppa'] = $this->mdl_utenti->getSchieramentoTCoppa($_SESSION['id_utente']);
            $data['myteamP'] = $this->mdl_utenti->getSchieramentoP($_SESSION['id_utente']);
            $data['myteamPCoppa'] = $this->mdl_utenti->getSchieramentoPCoppa($_SESSION['id_utente']);
            $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
            $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
            $data['utente'] = $this->mdl_utenti->getDatiUtente($_SESSION['id_utente']);
            $data['team'] = $this->mdl_team->getTeam($_SESSION['id_utente']);
            $data['partitegiocate'] = $this->mdl_team->getPartitegiocate();
            $data['partitegiocateChampions'] = $this->mdl_team->getPartitegiocateChampions();
            $data['partitegiocateCoppa'] = $this->mdl_team->getPartitegiocateCoppa();
            $data['partitegiocateSuperCoppa'] = $this->mdl_team->getPartitegiocateSuperCoppa();
            $data['prossimapartita'] = $this->mdl_team->getProssimapartita();
            $data['prossimapartitacoppa'] = $this->mdl_team->getProssimapartitacoppa();
            $data['prossimapartitachampions'] = $this->mdl_team->getProssimapartitachampions();
            $data['bomber'] = $this->mdl_team->getBomberTeam($_SESSION['id_utente'], $_SESSION['giornata']);
            $this->show('utenti/myteam', $data);
        } else
            redirect('home/index');
    }
    
    public function myteam_bacheca() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }
            $data['giornata'] = $_SESSION['giornata'];
            $data['myteamT'] = $this->mdl_utenti->getSchieramentoT($_SESSION['id_utente']);
            $data['myteamTCoppa'] = $this->mdl_utenti->getSchieramentoTCoppa($_SESSION['id_utente']);
            $data['myteamP'] = $this->mdl_utenti->getSchieramentoP($_SESSION['id_utente']);
            $data['myteamPCoppa'] = $this->mdl_utenti->getSchieramentoPCoppa($_SESSION['id_utente']);
            $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
            $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
            $data['utente'] = $this->mdl_utenti->getDatiUtente($_SESSION['id_utente']);
            $data['team'] = $this->mdl_team->getTeam($_SESSION['id_utente']);
            $data['partitegiocate'] = $this->mdl_team->getPartitegiocate();
            $data['partitegiocateChampions'] = $this->mdl_team->getPartitegiocateChampions();
            $data['partitegiocateCoppa'] = $this->mdl_team->getPartitegiocateCoppa();
            $data['partitegiocateSuperCoppa'] = $this->mdl_team->getPartitegiocateSuperCoppa();
            $data['prossimapartita'] = $this->mdl_team->getProssimapartita();
            $data['prossimapartitacoppa'] = $this->mdl_team->getProssimapartitacoppa();
            $data['prossimapartitachampions'] = $this->mdl_team->getProssimapartitachampions();
            $data['bomber'] = $this->mdl_team->getBomberTeam($_SESSION['id_utente'], $_SESSION['giornata']);
            $this->show('utenti/myteam_bacheca', $data);
        } else
            redirect('home/index');
    }

    public function myteam_marcatori() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();

            $data['giornata'] = $_SESSION['giornata'];
            $data['bomberTotali'] = $this->mdl_team->getBomberTeamTotali($_SESSION['id_utente'], $_SESSION['giornata']);
            $data['bomberTotaliChampions'] = $this->mdl_team->getBomberTeamChampionsTotale($_SESSION['id_utente']);
            $data['bomberTotaliCoppa'] = $this->mdl_team->getBomberTeamCoppaTotale($_SESSION['id_utente']);
            $this->show('utenti/myteam_marcatori', $data);
        } else
            redirect('home/index');
    }

    public function myteam_risultati() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }
            $data['giornata'] = $_SESSION['giornata'];
            $data['myteamT'] = $this->mdl_utenti->getSchieramentoT($_SESSION['id_utente']);
            $data['myteamTCoppa'] = $this->mdl_utenti->getSchieramentoTCoppa($_SESSION['id_utente']);
            $data['myteamP'] = $this->mdl_utenti->getSchieramentoP($_SESSION['id_utente']);
            $data['myteamPCoppa'] = $this->mdl_utenti->getSchieramentoPCoppa($_SESSION['id_utente']);
            $data['ultima_champions'] = $this->mdl_team->getUltimaGiornataChampions($_SESSION['giornata']);
            $data['ultima_coppa'] = $this->mdl_team->getUltimaGiornataCoppa($_SESSION['giornata']);
            $data['utente'] = $this->mdl_utenti->getDatiUtente($_SESSION['id_utente']);
            $data['team'] = $this->mdl_team->getTeam($_SESSION['id_utente']);
            $data['partitegiocate'] = $this->mdl_team->getPartitegiocate();
            $data['partitegiocateChampions'] = $this->mdl_team->getPartitegiocateChampions();
            $data['partitegiocateCoppa'] = $this->mdl_team->getPartitegiocateCoppa();
            $data['partitegiocateSuperCoppa'] = $this->mdl_team->getPartitegiocateSuperCoppa();
            $data['prossimapartita'] = $this->mdl_team->getProssimapartita();
            $data['prossimapartitacoppa'] = $this->mdl_team->getProssimapartitacoppa();
            $data['prossimapartitachampions'] = $this->mdl_team->getProssimapartitachampions();
            $data['bomber'] = $this->mdl_team->getBomberTeam($_SESSION['id_utente'], $_SESSION['giornata']);
            $this->show('utenti/myteam_risultati', $data);
        } else
            redirect('home/index');
    }
    
    public function myteam_calendario() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }
            
            $data['prossimiMatch'] = $this->mdl_team->getProssimiMatch($_SESSION['id_utente']);
            $data['prossimiMatchCoppa'] = $this->mdl_team->getProssimiMatchCoppa($_SESSION['id_utente']);
            $data['prossimiMatchChampions'] = $this->mdl_team->getProssimiMatchChampions($_SESSION['id_utente']);
            
            $this->show('utenti/myteam_calendario', $data);
        } else
            redirect('home/index');
    }

    public function schiera_formazione() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $data['Tattica'] = $this->mdl_categories->getTattiche(true);
            $_SESSION['giornata'] = $this->mdl_team->getGiornata();
            $data['giornata'] = $_SESSION['giornata'];

            //Recupero dal db, data e ora di blocco invio form
            if ($_SESSION['giornata'] != "") {
                $blocco = $this->mdl_utenti->getBlocco();
                $blocco = substr(@$blocco, 11, 5) . " del " . dataIns(substr(@$blocco, 0, 10));
                $data['blocco'] = $blocco;
            }

            if ($this->input->post('chkButton') == "Y") {
                $this->load->model('mdl_utenti');
                $this->load->model('mdl_team');
                $_SESSION['giornata'] = $this->mdl_team->getGiornata();

                //Setto il timezone per ogni evenienza
                date_default_timezone_set('Europe/Rome');

                //Verifico se la formazione è creata prima del blocco orario
                $orario = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $blocco = $this->mdl_utenti->getBlocco();
                $bloccoO = substr($blocco, 11, 2);
                $bloccoM = substr($blocco, 14, 2);
                $bloccoS = substr($blocco, 17, 2);
                $bloccom = substr($blocco, 5, 2);
                $bloccod = substr($blocco, 8, 2);
                $bloccoY = substr($blocco, 0, 4);
                $blocco = mktime($bloccoO, $bloccoM, $bloccoS, $bloccom, $bloccod, $bloccoY);

                if ($orario <= $blocco) {
                    $this->form_validation->set_rules('cmbTattica', 'Tattica');
                    $this->form_validation->set_rules('cmbCampionato', 'Campionato');
                    $this->form_validation->set_rules('cmbPortieri', '1');
                    $this->form_validation->set_rules('cmbDifensori1', '2');
                    $this->form_validation->set_rules('cmbDifensori2', '3');
                    $this->form_validation->set_rules('cmbDifensori3', '4');
                    $this->form_validation->set_rules('cmbDifensori4', '5');
                    $this->form_validation->set_rules('cmbDifensori5', '6');
                    $this->form_validation->set_rules('cmbCentrocampisti1', '7');
                    $this->form_validation->set_rules('cmbCentrocampisti2', '8');
                    $this->form_validation->set_rules('cmbCentrocampisti3', '9');
                    $this->form_validation->set_rules('cmbCentrocampisti4', '10');
                    $this->form_validation->set_rules('cmbCentrocampisti5', '11');
                    $this->form_validation->set_rules('cmbCentrocampisti6', '12');
                    $this->form_validation->set_rules('cmbAttaccanti1', '13');
                    $this->form_validation->set_rules('cmbAttaccanti2', '14');
                    $this->form_validation->set_rules('cmbAttaccanti3', '15');
                    $this->form_validation->set_rules('cmbPortieriP1', '16');
                    $this->form_validation->set_rules('cmbPortieriP2', '17');
                    $this->form_validation->set_rules('cmbPanchina1', '18');
                    $this->form_validation->set_rules('cmbPanchina2', '19');
                    $this->form_validation->set_rules('cmbPanchina3', '20');
                    $this->form_validation->set_rules('cmbPanchina4', '21');
                    $this->form_validation->set_rules('cmbPanchina5', '22');
                    $this->form_validation->set_rules('cmbPanchina6', '23');
                    $this->form_validation->set_rules('cmbPanchina7', '24');
                    $this->form_validation->set_rules('cmbPanchina8', '25');
                    $this->form_validation->set_rules('cmbPanchina9', '26');
                    $this->form_validation->set_rules('cmbPanchina10', '27');
                    $this->form_validation->set_rules('cmbPanchina11', '28');
                    $this->form_validation->set_rules('cmbPanchina12', '29');

                    if ($this->form_validation->run()) {
                        $this->load->model('mdl_team');

                        //Setto anche il modulo tattico usato
                        $modulo = $this->input->post('cmbTattica');

                        $dataT1 = array(
                            '1' => $this->input->post('cmbPortieri'),
                        );

                        $dataT2 = array(
                            '2' => $this->input->post('cmbDifensori1'),
                            '3' => $this->input->post('cmbDifensori2'),
                            '4' => $this->input->post('cmbDifensori3'),
                            '5' => $this->input->post('cmbDifensori4'),
                            '6' => $this->input->post('cmbDifensori5')
                        );

                        $dataT3 = array(
                            '7' => $this->input->post('cmbCentrocampisti1'),
                            '8' => $this->input->post('cmbCentrocampisti2'),
                            '9' => $this->input->post('cmbCentrocampisti3'),
                            '10' => $this->input->post('cmbCentrocampisti4'),
                            '11' => $this->input->post('cmbCentrocampisti5'),
                            '12' => $this->input->post('cmbCentrocampisti6')
                        );

                        $dataT4 = array(
                            '13' => $this->input->post('cmbAttaccanti1'),
                            '14' => $this->input->post('cmbAttaccanti2'),
                            '15' => $this->input->post('cmbAttaccanti3')
                        );

                        $dataP = array(
                            'id_utente' => $_SESSION['id_utente'],
                            'P1' => $this->input->post('cmbPortieriP1'),
                            'P2' => $this->input->post('cmbPortieriP2'),
                            'P3' => $this->input->post('cmbPanchina1'),
                            'P4' => $this->input->post('cmbPanchina2'),
                            'P5' => $this->input->post('cmbPanchina3'),
                            'P6' => $this->input->post('cmbPanchina4'),
                            'P7' => $this->input->post('cmbPanchina5'),
                            'P8' => $this->input->post('cmbPanchina6'),
                            'P9' => $this->input->post('cmbPanchina7'),
                            'P10' => $this->input->post('cmbPanchina8'),
                            'P11' => $this->input->post('cmbPanchina9'),
                            'P12' => $this->input->post('cmbPanchina10'),
                            'P13' => $this->input->post('cmbPanchina11'),
                            'P14' => $this->input->post('cmbPanchina12')
                        );

                        if ($this->input->post('cmbCampionato') == 1 || $this->input->post('cmbCampionato') == 2) {
                            //Cancello vecchia formazione Campionato e imposto la nuova
                            $this->mdl_team->delFormazioneT($_SESSION['id_utente']);
                            $this->mdl_team->delFormazioneP($_SESSION['id_utente']);
                            foreach ($dataT1 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneT($_SESSION['id_utente'], $row, 1);
                            }

                            foreach ($dataT2 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneT($_SESSION['id_utente'], $row, 2);
                            }

                            foreach ($dataT3 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneT($_SESSION['id_utente'], $row, 3);
                            }

                            foreach ($dataT4 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneT($_SESSION['id_utente'], $row, 4);
                            }

                            $this->mdl_team->insertFormazioneP($dataP);
                            //Inserisco modulo tattico Campionato per recuperare formazione in seguito; Per la coppa utilizzo sempre il modulo del campionato.
                            //Prima cancello quello precedente
                            $this->mdl_team->deleteModuloTattico($_SESSION['id_utente'], $_SESSION['giornata']);
                            $this->mdl_team->insertModuloTattico($_SESSION['id_utente'], $_SESSION['giornata'], $modulo);
                        }

                        if ($this->input->post('cmbCampionato') == 1 || $this->input->post('cmbCampionato') == 3) {
                            //Cancello vecchia formazione Coppa e imposto la nuova
                            $this->mdl_team->delFormazioneTCoppa($_SESSION['id_utente']);
                            $this->mdl_team->delFormazionePCoppa($_SESSION['id_utente']);
                            foreach ($dataT1 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneTCoppa($_SESSION['id_utente'], $row, 1);
                            }

                            foreach ($dataT2 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneTCoppa($_SESSION['id_utente'], $row, 2);
                            }

                            foreach ($dataT3 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneTCoppa($_SESSION['id_utente'], $row, 3);
                            }

                            foreach ($dataT4 as $row) {
                                if ($row != "")
                                    $this->mdl_team->insertFormazioneTCoppa($_SESSION['id_utente'], $row, 4);
                            }

                            $this->mdl_team->insertFormazionePCoppa($dataP);
                        }

                        switch ($this->input->post('cmbCampionato')) {
                            case 1:
                                $selCampionato = "CAMPIONATO E COPPA";
                                $selEmail = "Campionato e Coppa";
                                break;
                            case 2:
                                $selCampionato = "CAMPIONATO";
                                $selEmail = "Campionato";
                                break;
                            case 3:
                                $selCampionato = "COPPA";
                                $selEmail = "Coppa";
                                break;
                        }

                        //Configuro l'invio mail
                        $config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'mail.fantatreble.it',
                            'smtp_port' => 587,
                            'smtp_user' => 'formazioni@fantatreble.it',
                            'smtp_pass' => '3ble160475',
                            'mailtype' => 'html'
                        );
                        $this->load->library('email', $config);
                        $this->email->from('formazioni@fantatreble.it', 'FantaTreble');

                        //Invio la mail all'utente
                        $message = "<u>Formazione " . $this->mdl_utenti->getSquadra($_SESSION['id_utente']) . " inviata da " . $_SESSION['utente'] . "</u><br><br>";
                        $message .= "<u>FORMAZIONE TITOLARE SCHIERATA PER " . $selCampionato . "</u><br><br>";
                        $playerP = $this->mdl_team->getGiocatore($this->input->post('cmbPortieri'));
                        $message .= "<u>Portiere</u><br>";
                        $message .= $playerP[0]['cognome'] . " " . $playerP[0]['nome'] . "<br><br>";

                        $playerD1 = $this->mdl_team->getGiocatore($this->input->post('cmbDifensori1'));
                        $playerD2 = $this->mdl_team->getGiocatore($this->input->post('cmbDifensori2'));
                        $playerD3 = $this->mdl_team->getGiocatore($this->input->post('cmbDifensori3'));
                        $playerD4 = @$this->mdl_team->getGiocatore($this->input->post('cmbDifensori4'));
                        $playerD5 = @$this->mdl_team->getGiocatore($this->input->post('cmbDifensori5'));

                        $message .= "<u>Difensori</u><br>";
                        $message .= $playerD1[0]['cognome'] . " " . $playerD1[0]['nome'] . "<br>";
                        $message .= $playerD2[0]['cognome'] . " " . $playerD2[0]['nome'] . "<br>";
                        $message .= $playerD3[0]['cognome'] . " " . $playerD3[0]['nome'] . "<br>";
                        $message .= @$playerD4[0]['cognome'] . " " . @$playerD4[0]['nome'] . "<br>";
                        $message .= @$playerD5[0]['cognome'] . " " . @$playerD5[0]['nome'] . "<br>";

                        $playerC1 = $this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti1'));
                        $playerC2 = $this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti2'));
                        $playerC3 = $this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti3'));
                        $playerC4 = @$this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti4'));
                        $playerC5 = @$this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti5'));
                        $playerC6 = @$this->mdl_team->getGiocatore($this->input->post('cmbCentrocampisti6'));

                        $message .= "<u>Centrocampisti</u><br>";
                        $message .= $playerC1[0]['cognome'] . " " . $playerC1[0]['nome'] . "<br>";
                        $message .= $playerC2[0]['cognome'] . " " . $playerC2[0]['nome'] . "<br>";
                        $message .= $playerC3[0]['cognome'] . " " . $playerC3[0]['nome'] . "<br>";
                        $message .= @$playerC4[0]['cognome'] . " " . @$playerC4[0]['nome'] . "<br>";
                        $message .= @$playerC5[0]['cognome'] . " " . @$playerC5[0]['nome'] . "<br>";
                        $message .= @$playerC6[0]['cognome'] . " " . @$playerC6[0]['nome'] . "<br>";

                        $playerA1 = $this->mdl_team->getGiocatore($this->input->post('cmbAttaccanti1'));
                        $playerA2 = @$this->mdl_team->getGiocatore($this->input->post('cmbAttaccanti2'));
                        $playerA3 = @$this->mdl_team->getGiocatore($this->input->post('cmbAttaccanti3'));

                        $message .= "<u>Attaccanti</u><br>";
                        $message .= $playerA1[0]['cognome'] . " " . $playerA1[0]['nome'] . "<br>";
                        $message .= @$playerA2[0]['cognome'] . " " . @$playerA2[0]['nome'] . "<br>";
                        $message .= @$playerA3[0]['cognome'] . " " . @$playerA3[0]['nome'] . "<br>";

                        $message .= "<br><u>FORMAZIONE IN PANCHINA PER " . $selCampionato . "</u><br><br>";
                        $playerP1 = $this->mdl_team->getGiocatore($this->input->post('cmbPortieriP1'));
                        $playerP2 = $this->mdl_team->getGiocatore($this->input->post('cmbPortieriP2'));

                        $message .= "<u>Portieri</u><br><br>";
                        $message .= "1) " . $playerP1[0]['cognome'] . " " . $playerP1[0]['nome'] . "<br>";
                        $message .= "2) " . $playerP2[0]['cognome'] . " " . $playerP2[0]['nome'] . "<br><br>";

                        $playerP3 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina1'));
                        $playerP4 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina2'));
                        $playerP5 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina3'));
                        $playerP6 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina4'));
                        $playerP7 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina5'));
                        $playerP8 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina6'));
                        $playerP9 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina7'));
                        $playerP10 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina8'));
                        $playerP11 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina9'));
                        $playerP12 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina10'));
                        $playerP13 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina11'));
                        $playerP14 = $this->mdl_team->getGiocatore($this->input->post('cmbPanchina12'));

                        $message .= "<u>Altri Ruoli</u><br><br>";
                        $message .= "1) " . $playerP3[0]['cognome'] . " " . $playerP3[0]['nome'] . "<br>";
                        $message .= "2) " . $playerP4[0]['cognome'] . " " . $playerP4[0]['nome'] . "<br>";
                        $message .= "3) " . $playerP5[0]['cognome'] . " " . $playerP5[0]['nome'] . "<br>";
                        $message .= "4) " . $playerP6[0]['cognome'] . " " . $playerP6[0]['nome'] . "<br>";
                        $message .= "5) " . $playerP7[0]['cognome'] . " " . $playerP7[0]['nome'] . "<br>";
                        $message .= "6) " . $playerP8[0]['cognome'] . " " . $playerP8[0]['nome'] . "<br>";
                        $message .= "7) " . $playerP9[0]['cognome'] . " " . $playerP9[0]['nome'] . "<br>";
                        $message .= "8) " . $playerP10[0]['cognome'] . " " . $playerP10[0]['nome'] . "<br>";
                        $message .= "9) " . $playerP11[0]['cognome'] . " " . $playerP11[0]['nome'] . "<br>";
                        $message .= "10) " . $playerP12[0]['cognome'] . " " . $playerP12[0]['nome'] . "<br>";
                        $message .= "11) " . $playerP13[0]['cognome'] . " " . $playerP13[0]['nome'] . "<br>";
                        $message .= "12) " . $playerP14[0]['cognome'] . " " . $playerP14[0]['nome'] . "<br><br>";

                        $this->load->model('mdl_utenti');
                        $mail1 = $this->mdl_utenti->getMail(1);
                        $mail2 = $this->mdl_utenti->getMail(2);
                        $mail3 = $this->mdl_utenti->getMail(3);
                        $mail4 = $this->mdl_utenti->getMail(4);
                        $mail5 = $this->mdl_utenti->getMail(5);
                        $mail6 = $this->mdl_utenti->getMail(6);
                        $mail7 = $this->mdl_utenti->getMail(7);
                        $mail8 = $this->mdl_utenti->getMail(8);
                        $mail9 = $this->mdl_utenti->getMail(9);
                        $mail10 = $this->mdl_utenti->getMail(10);

                        $list = array($mail2, $mail3, $mail4, $mail5, $mail6, $mail7, $mail8, $mail9, $mail10);

                        $this->email->to($list);
                        $this->email->cc($mail1);
                        $this->email->bcc("formazioni@fantatreble.it");
                        $this->email->subject("Invio formazione " . $this->mdl_utenti->getSquadra($_SESSION['id_utente']) . " schierata da " . $_SESSION['utente'] . " per " . $selEmail);
                        $this->email->message($message);

                        $this->email->send();

                        $data['message'] = "<p style='color:green;'>Formazione per " . $selEmail . " inserita con successo !</p>";

                        $data['Selezione'] = $this->mdl_team->getModulo($_SESSION['id_utente']);
                        $data['Portieri'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 1);
                        $data['Difensori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 2);
                        $data['Centrocampisti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 3);
                        $data['Attaccanti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 4);
                        $data['Giocatori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], "");
                        $data['titolari'] = $this->mdl_team->getFormazioneTUtente($_SESSION['id_utente']);
                        $data['panchinari'] = $this->mdl_team->getFormazionePUtente($_SESSION['id_utente']);

                        $this->show('utenti/schiera_formazione', $data);
                        return;
                    }
                } else
                    $data['message'] = "Non è possibile impostare la formazione a partite già iniziate !<br>Verrà inserita l'ultima formazione schierata.";

                $data['Selezione'] = $this->mdl_team->getModulo($_SESSION['id_utente']);
                $data['Portieri'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 1);
                $data['Difensori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 2);
                $data['Centrocampisti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 3);
                $data['Attaccanti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 4);
                $data['Giocatori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], "");
                $data['titolari'] = $this->mdl_team->getFormazioneTUtente($_SESSION['id_utente']);
                $data['panchinari'] = $this->mdl_team->getFormazionePUtente($_SESSION['id_utente']);

                $this->show('utenti/schiera_formazione', $data);
                return;
            }

            $this->form_validation->set_rules('cmbTattica', 'Tattica');
            $this->form_validation->set_rules('cmbCampionato', 'Campionato');

            if ($this->form_validation->run()) {
                $data['Selezione'] = $this->input->post('cmbTattica');
                $data['Campionato'] = $this->input->post('cmbCampionato');
                $data['Portieri'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 1);
                $data['Difensori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 2);
                $data['Centrocampisti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 3);
                $data['Attaccanti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 4);
                $data['Giocatori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], "");
                $data['titolari'] = $this->mdl_team->getFormazioneTUtente($_SESSION['id_utente']);
                $data['panchinari'] = $this->mdl_team->getFormazionePUtente($_SESSION['id_utente']);

                $this->show('utenti/schiera_formazione', $data);
                return;
            } else
                $data['message'] = "";

            $data['Selezione'] = $this->mdl_team->getModulo($_SESSION['id_utente']);
            $data['Portieri'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 1);
            $data['Difensori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 2);
            $data['Centrocampisti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 3);
            $data['Attaccanti'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], 4);
            $data['Giocatori'] = $this->mdl_categories->getFormazione(true, $_SESSION['id_utente'], "");
            $data['titolari'] = $this->mdl_team->getFormazioneTUtente($_SESSION['id_utente']);
            $data['panchinari'] = $this->mdl_team->getFormazionePUtente($_SESSION['id_utente']);

            $this->show('utenti/schiera_formazione', $data);
        } else
            redirect('utente/login');
    }

    public function trattative() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            //$this->load->model('mdl_categories');
            //Setto il timezone per ogni evenienza
            date_default_timezone_set('Europe/Rome');

            $data['offerte'] = $this->mdl_utenti->getTrattativeInCorso();
            //$data['fanta'] = $this->mdl_utenti->getFanta();
            //$data['Squadre'] = $this->mdl_categories->getSquadre(false);
            $this->show('utenti/trattative', $data);
        } else
            redirect('utente/login');
    }

    public function calciomercato() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_team');
            $this->load->model('mdl_categories');

            $this->form_validation->set_rules('offerta', 'Offerta', 'trim|required|min_length[2]|max_length[600]');
            $this->form_validation->set_rules('chkOfferta', 'Tipo offerta', 'trim|required');

            //Setto il timezone per ogni evenienza
            date_default_timezone_set('Europe/Rome');

            if ($this->form_validation->run()) {
                $data = array(
                    'id_utente' => $_SESSION['id_utente'],
                    'offerta' => $this->input->post('offerta'),
                    'tipo' => $this->input->post('chkOfferta'),
                    'orario' => date("H:i:s") . " del " . date("d/m/Y"),
                    'attiva' => 1,
                );
                $this->mdl_utenti->insertOfferta($data);

                //Configuro l'invio mail
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.fantatreble.it',
                    'smtp_port' => 587,
                    'smtp_user' => 'mercato@fantatreble.it',
                    'smtp_pass' => '3ble160475',
                    'mailtype' => 'html'
                );

                $this->load->library('email', $config);
                $this->email->from('mercato@fantatreble.it', 'FantaTreble');

                //Invio la mail all'utente
                $this->load->model('mdl_utenti');

                $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                                                           <html>
                                                              <head><title>FantaTreble - Calciomercato</title></head>
                                                              <body>
                                                                 <div style="max-width: 600px; margin: 0; padding: 30px 0;">
                                                                 <table width="80%" border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                       <td width="5%"></td>
                                                                       <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                                                                       <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">';
                $message .= $this->mdl_utenti->getUtente($_SESSION['id_utente']);
                $message .= ' ha inserito una nuova offerta di mercato:</h2>';
                $message .= "<i> " . $this->input->post('offerta') . " </i><br />";
                $message .= '<br />
                                                                       </td>
                                                                    </tr>
                                                                 </table>
                                                                 </div>
                                                              </body>
                                                           </html>
                                                           ';

                $mail1 = $this->mdl_utenti->getMail(1);
                $mail2 = $this->mdl_utenti->getMail(2);
                $mail3 = $this->mdl_utenti->getMail(3);
                $mail4 = $this->mdl_utenti->getMail(4);
                $mail5 = $this->mdl_utenti->getMail(5);
                $mail6 = $this->mdl_utenti->getMail(6);
                $mail7 = $this->mdl_utenti->getMail(7);
                $mail8 = $this->mdl_utenti->getMail(8);
                $mail9 = $this->mdl_utenti->getMail(9);
                $mail10 = $this->mdl_utenti->getMail(10);

                $list = array($mail2, $mail3, $mail4, $mail5, $mail6, $mail7, $mail8, $mail9, $mail10);

                $this->email->to($list);
                $this->email->cc($mail1);
                $this->email->bcc("mercato@fantatreble.it");
                $this->email->subject("Nuova offerta di mercato inserita");
                $this->email->message($message);

                $this->email->send();
            }

            $data['offerte'] = $this->mdl_utenti->getOfferte();
            $data['fanta'] = $this->mdl_utenti->getFanta();
            $data['Squadre'] = $this->mdl_categories->getSquadre(false);
            $this->show('utenti/calciomercato', $data);
        } else
            redirect('home/index');
    }

    public function delofferta($id_offerta) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $this->mdl_team->delOfferta($id_offerta);

            redirect('utente/calciomercato');
        } else
            redirect('utente/login');
    }

    public function closeofferta($id_offerta) {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $this->mdl_team->closeOfferta($id_offerta);

            redirect('utente/calciomercato');
        } else
            redirect('utente/login');
    }

    function logout() {
        unset($_SESSION['id_utente']);
        unset($_SESSION['username']);
        unset($_SESSION['utente']);
        unset($_SESSION['giornata']);
        unset($_SESSION['squadra']);

        $this->session->sess_destroy();

        //Ricarico homepage
        $data['message'] = 'Logout effettuato con successo';

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

    // Funzioni di Amministrazione e Gestione

    function registra_utente() {
        if (isset($_SESSION['id_utente'])) {

            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('soprannome', 'Soprannome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('squadra', 'Nome Squadra', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[40]');
            $this->form_validation->set_rules('pwd1', 'Password 1', 'trim|required|min_length[6]|max_length[15]');
            $this->form_validation->set_rules('pwd_utente', 'Conferma Password', 'trim|required|min_length[6]|max_length[15]');

            if ($this->form_validation->run()) {
                if ($this->input->post('pwd1') == $this->input->post('pwd_utente')) {
                    $data = array(
                        'nome' => ucwords($this->input->post('nome')),
                        'cognome' => ucwords($this->input->post('cognome')),
                        'soprannome' => ucwords($this->input->post('soprannome')),
                        'squadra' => ucwords($this->input->post('squadra')),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'pwd_utente' => md5($this->input->post('pwd_utente'))
                    );
                    $this->load->model('mdl_utenti');
                    $this->mdl_utenti->insertUtente($data);

                    //Configuro l'invio mail
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.fantatreble.it',
                        'smtp_port' => 587,
                        'smtp_user' => 'info@fantatreble.it',
                        'smtp_pass' => '3ble160475',
                        'mailtype' => 'html'
                    );

                    $this->load->library('email', $config);

                    $this->email->from('info@fantatreble.it', 'FantaTreble');

                    $message = "Benvenuto al FantaTreble <b>" . $data['nome'] . "</b><br><br>";

                    $message .= "Ecco le tue credenziali per accedere : <br><br>";
                    $message .= "Username : <b>" . $data['username'] . "</b><br><br>";
                    $message .= "Password  : <b>" . $this->input->post('pwd_utente') . "</b><br>";

                    //Invio la mail all'utente
                    $this->email->to($data['email']);
                    $this->email->cc("guerrieriluca@gmail.com");
                    $this->email->bcc("info@fantatreble.it");
                    $this->email->subject("Registrazione al FantaTreble");
                    $this->email->message($message);

                    $this->email->send();

                    $data['message'] = "<p style='color:green;'>Nuovo utente registrato con successo !</p>";
                    $this->show('utenti/registra_utente', $data);
                } else {
                    $data['message'] = "<p style='color:red;'>Le password inserite non combaciano</p>";
                    $this->show('utenti/registra_utente', $data);
                }
            } else
                $this->show('utenti/registra_utente');
        } else
            redirect('utente/login');
    }

    function profilo() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_utenti');

            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('soprannome', 'Soprannome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('squadra', 'Nome Squadra', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[40]');
            $this->form_validation->set_rules('pwd1', 'Password 1');
            $this->form_validation->set_rules('pwd_utente', 'Conferma Password');

            if ($this->form_validation->run()) {
                if ($this->input->post('pwd1') == $this->input->post('pwd_utente')) {
                    $utente = $_SESSION['id_utente'];

                    if ($this->input->post('pwd1') != "") {
                        $data = array(
                            'nome' => ucwords($this->input->post('nome')),
                            'cognome' => ucwords($this->input->post('cognome')),
                            'soprannome' => ucwords($this->input->post('soprannome')),
                            'squadra' => ucwords($this->input->post('squadra')),
                            'email' => $this->input->post('email'),
                            'username' => $this->input->post('username'),
                            'pwd_utente' => md5($this->input->post('pwd_utente'))
                        );
                    } else {
                        $data = array(
                            'nome' => ucwords($this->input->post('nome')),
                            'cognome' => ucwords($this->input->post('cognome')),
                            'soprannome' => ucwords($this->input->post('soprannome')),
                            'squadra' => ucwords($this->input->post('squadra')),
                            'email' => $this->input->post('email'),
                            'username' => $this->input->post('username')
                        );
                    }
                    $this->load->model('mdl_utenti');
                    $this->mdl_utenti->updateUtente($utente, $data);

                    //Configuro l'invio mail
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.fantatreble.it',
                        'smtp_port' => 587,
                        'smtp_user' => 'info@fantatreble.it',
                        'smtp_pass' => '3ble160475',
                        'mailtype' => 'html'
                    );

                    $this->load->library('email', $config);

                    $this->email->from('info@fantatreble.it', 'FantaTreble');

                    $message = "Ciao <b>" . $data['nome'] . "</b><br><br>";

                    $message .= "Ecco di seguito le modifiche apportate al tuo account FantaTreble : <br><br>";
                    $message .= "Email : <b>" . $data['email'] . "</b><br><br>";
                    $message .= "Squadra : <b>" . $data['squadra'] . "</b><br><br>";
                    $message .= "Username : <b>" . $data['username'] . "</b><br><br>";
                    $message .= "Password  : <b>" . $this->input->post('pwd_utente') . "</b><br>";

                    //Invio la mail all'utente
                    $this->email->to($data['email']);
                    $this->email->cc("guerrieriluca@gmail.com");
                    $this->email->bcc("info@fantatreble.it");
                    $this->email->subject("Modifiche al tuo account FantaTreble");
                    $this->email->message($message);

                    $this->email->send();

                    $data['dettagliUtente'] = $this->mdl_utenti->getDatiUtente($utente);
                    $data['message'] = "<span style='color:green;'>Utente modificato con successo !</span>";
                    $this->show('utenti/profilo', $data);
                    return;
                } else {
                    $data['dettagliUtente'] = $this->mdl_utenti->getDatiUtente($utente);
                    $data['message'] = "<p style='color:red;'>Le password inserite non combaciano</p>";
                    $this->show('utenti/profilo', $data);
                    return;
                }
            } else {

                $utente = $_SESSION['id_utente'];

                $data['dettagliUtente'] = $this->mdl_utenti->getDatiUtente($utente);
                $this->show('utenti/profilo', $data);

                return;
            }
        } else
            redirect('home/index');
    }

    function crea_giocatore() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
            $data['Squadre'] = $this->mdl_categories->getSquadreA(false);

            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]|max_length[40]');
            $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required|min_length[2]|max_length[40]|callback_checkGiocatore');

            if ($this->form_validation->run()) {
                $data = array(
                    'nome' => ucwords($this->input->post('nome')),
                    'cognome' => strtoupper($this->input->post('cognome')),
                    'ruolo' => $this->input->post('cmbRuoli'),
                    'squadra' => $this->input->post('cmbSquadre'),
                    'id_utente' => 0,
                    'ultima_giornata' => 0,
                );
                $this->load->model('mdl_team');
                $this->mdl_team->insertGiocatore($data);

                $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                $data['Squadre'] = $this->mdl_categories->getSquadreA(false);
                $data['message'] = "Nuovo calciatore inserito con successo !";
                $this->show('utenti/crea_giocatore', $data);
            } else
                $this->show('utenti/crea_giocatore', $data);
        } else
            redirect('utente/login');
    }

    function modifica_voto() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $ruolo = 1;
            $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
            $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);

            if ($this->input->post('but_modifica')) {
                $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
                $this->form_validation->set_rules('cmbGiornata', 'Giornata');
                $this->form_validation->set_rules('voto', 'voto');
                $this->form_validation->set_rules('fanta_voto', 'fanta_voto');
                $this->form_validation->set_rules('gol', 'gol');
                $this->form_validation->set_rules('assist', 'assist');
                $this->form_validation->set_rules('ammonizioni', 'ammonizioni');
                $this->form_validation->set_rules('espulsioni', 'espulsioni');
                $this->form_validation->set_rules('rigore_parato', 'rigore_parato');
                $this->form_validation->set_rules('rigore_sbagliato', 'rigore_sbagliato');
                $this->form_validation->set_rules('autogol', 'autogol');
                $this->form_validation->set_rules('gol_subiti', 'gol_subiti');
                $this->form_validation->set_rules('cmbSchierato', 'Schierato');

                if ($this->form_validation->run()) {
                    $data = array(
                        'giocatore' => $this->input->post('cmbGiocatori'),
                        'giornata' => $this->input->post('cmbGiornata'),
                        'voto' => $this->input->post('voto'),
                        'fanta_voto' => $this->input->post('fanta_voto'),
                        'gol' => $this->input->post('gol'),
                        'assist' => $this->input->post('assist'),
                        'ammonizioni' => $this->input->post('ammonizioni'),
                        'espulsioni' => $this->input->post('espulsioni'),
                        'rigore_parato' => $this->input->post('rigore_parato'),
                        'rigore_sbagliato' => $this->input->post('rigore_sbagliato'),
                        'autogol' => $this->input->post('autogol'),
                        'gol_subiti' => $this->input->post('gol_subiti'),
                        'schierato' => $this->input->post('cmbSchierato'),
                    );

                    $this->load->model('mdl_team');
                    $this->mdl_team->updateVotoCampionato($data);
                    $data['message'] = "Voto modificato con successo !";

                    $id_giocatore = $this->input->post('cmbGiocatori');
                    $ruolo = $this->input->post('cmbRuoli');
                    $giornata = $this->input->post('cmbGiornata');

                    $ruolo = $this->input->post('cmbRuoli');
                    $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                    $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);
                    $data['Dettagli'] = $this->mdl_team->getGiocatore($id_giocatore);
                    $data['Voti'] = $this->mdl_team->getVotiGiornata($id_giocatore, $giornata);

                    $this->show('utenti/modifica_voto', $data);
                    return;
                }
            }

            $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
            $this->form_validation->set_rules('cmbGiornata', 'Giornata');
            $this->form_validation->set_rules('cmbRuoli', 'Ruoli');

            if ($this->form_validation->run()) {
                $id_giocatore = $this->input->post('cmbGiocatori');
                $ruolo = $this->input->post('cmbRuoli');
                $giornata = $this->input->post('cmbGiornata');

                $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);
                $data['Dettagli'] = $this->mdl_team->getGiocatore($id_giocatore);
                $data['Voti'] = $this->mdl_team->getVotiGiornata($id_giocatore, $giornata);

                $this->show('utenti/modifica_voto', $data);
            } else
                $this->show('utenti/modifica_voto', $data);
        } else
            redirect('utente/login');
    }

    function modifica_giocatore() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $ruolo = 1;
            $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
            $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);
            $data['Squadre'] = $this->mdl_categories->getSquadreA(false);

            if ($this->input->post('but_modifica')) {
                $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]|max_length[40]');
                $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required|min_length[2]|max_length[40]');
                $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
                $this->form_validation->set_rules('cmbSquadre', 'Squadra di appartenenza');
                $this->form_validation->set_rules('cmbRuoloNuovo', 'Ruolo Nuovo');

                if ($this->form_validation->run()) {
                    $data = array(
                        'giocatore' => $this->input->post('cmbGiocatori'),
                        'nome' => ucwords($this->input->post('nome')),
                        'cognome' => strtoupper($this->input->post('cognome')),
                        'squadra' => $this->input->post('cmbSquadre'),
                        'ruolo' => $this->input->post('cmbRuoloNuovo'),
                    );

                    $this->load->model('mdl_team');
                    $this->mdl_team->updateGiocatore($data);
                    $data['message'] = "Giocatore modificato con successo !";

                    $ruolo = $this->input->post('cmbRuoli');
                    $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                    $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);
                    $data['Squadre'] = $this->mdl_categories->getSquadreA(false);

                    $this->show('utenti/modifica_giocatore', $data);
                    return;
                }
            }

            $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
            $this->form_validation->set_rules('cmbSquadra', 'Squadra');
            $this->form_validation->set_rules('cmbRuoli', 'Ruoli');

            if ($this->form_validation->run()) {
                $id_giocatore = $this->input->post('cmbGiocatori');
                $ruolo = $this->input->post('cmbRuoli');
                $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                $data['Giocatori'] = $this->mdl_categories->getAllGiocatori(false, $ruolo);
                $data['Squadre'] = $this->mdl_categories->getSquadreA(false);
                $data['Dettagli'] = $this->mdl_team->getGiocatore($id_giocatore);

                $this->show('utenti/modifica_giocatore', $data);
            } else
                $this->show('utenti/modifica_giocatore', $data);
        } else
            redirect('utente/login');
    }

    public function assegna_giocatore() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $ruolo = 1;
            $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
            $data['Giocatori'] = $this->mdl_categories->getGiocatori(false, $ruolo);
            $data['Squadre'] = $this->mdl_categories->getSquadre(false);

            if ($this->input->post('but_assegna')) {
                $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
                $this->form_validation->set_rules('cmbSquadra', 'Squadra');
                $this->form_validation->set_rules('cmbRuoli', 'Ruoli');
                $this->form_validation->set_rules('costo', 'Costo');

                if ($this->form_validation->run()) {
                    $data = array(
                        'giocatore' => $this->input->post('cmbGiocatori'),
                        'squadra' => $this->input->post('cmbSquadra'),
                        'ruoli' => $this->input->post('cmbRuoli')
                    );

                    $costo = $this->input->post('costo');
                    $this->load->model('mdl_team');
                    $this->mdl_team->assegnaGiocatore($data, $costo);
                    $data['message'] = "<p style='color:green;'>Giocatore assegnato con successo !</p>";

                    $ruolo = $this->input->post('cmbRuoli');
                    $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                    $data['Giocatori'] = $this->mdl_categories->getGiocatori(false, $ruolo);
                    $data['Squadre'] = $this->mdl_categories->getSquadre(false);

                    $this->show('utenti/assegna_giocatore', $data);
                    return;
                }
            }

            $this->form_validation->set_rules('cmbGiocatori', 'Giocatori');
            $this->form_validation->set_rules('cmbSquadra', 'Squadra');
            $this->form_validation->set_rules('cmbRuoli', 'Ruoli');

            if ($this->form_validation->run()) {
                $data = array(
                    'giocatore' => $this->input->post('cmbGiocatori'),
                    'squadra' => $this->input->post('cmbSquadra'),
                    'ruoli' => $this->input->post('cmbRuoli'),
                );

                $ruolo = $this->input->post('cmbRuoli');
                $data['Ruoli'] = $this->mdl_categories->getRuoli(false);
                $data['Giocatori'] = $this->mdl_categories->getGiocatori(false, $ruolo);
                $data['Squadre'] = $this->mdl_categories->getSquadre(false);

                $this->show('utenti/assegna_giocatore', $data);
                return;
            } else
                $data['message'] = "";
            $this->show('utenti/assegna_giocatore', $data);
        } else
            redirect('utente/login');
    }

    public function trasferimenti() {
        if (isset($_SESSION['id_utente'])) {

            $this->load->model('mdl_team');
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_categories');

            $this->form_validation->set_rules('cmbSquadra', 'Squadra');
            $this->form_validation->set_rules('chkAsta', 'Asta');

            if ($this->form_validation->run()) {
                $team = $this->input->post('cmbSquadra');
                $asta = $this->input->post('chkAsta');
                if ($asta == 1) {
                    $data['checked1'] = "checked='checked'";
                    $data['checked2'] = "";
                }
                if ($asta == 0) {
                    $data['checked1'] = "";
                    $data['checked2'] = "checked='checked'";
                }
                $data['Squadre'] = $this->mdl_categories->getSquadre(true);
                $data['trasferimenti'] = $this->mdl_team->getTrasferimentiSquadra($team, $asta);
                $this->show('utenti/trasferimenti', $data);
                return;
            }

            $mese = date("Y-m-d H:i:s");
            $data['trasferimenti'] = $this->mdl_team->getTrasferimenti($mese);

            $data['Squadre'] = $this->mdl_categories->getSquadre(true);
            $data['checked1'] = "checked='checked'";
            $data['checked2'] = "";
            $this->show('utenti/trasferimenti', $data);
        } else
            redirect('utente/login');
    }

    public function esegui_scambio() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);

            $this->form_validation->set_rules('cmbSquadra', 'Squadra 1');
            $this->form_validation->set_rules('cmbSquadra2', 'Squadra 2');
            $this->form_validation->set_rules('cmbTeam', 'Giocatore 1');
            $this->form_validation->set_rules('cmbTeam2', 'Giocatore 2');

            if ($this->input->post('but_modifica')) {
                if (($this->input->post('cmbSquadra') != 0) && ($this->input->post('cmbTeam') != 0) && ($this->input->post('cmbSquadra2') != 0) && ($this->input->post('cmbTeam2') != 0)) {
                    $change = $this->mdl_team->updateScambio($this->input->post('cmbSquadra'), $this->input->post('cmbTeam'), $this->input->post('cmbSquadra2'), $this->input->post('cmbTeam2'));
                    if ($change)
                        $data['message'] = "<p style='color:green;'>Scambio effettuato con successo</p>";

                    $this->show('utenti/esegui_scambio', $data);
                    return;
                }else {
                    $data['message'] = "<p style='color:red;'>ATTENZIONE: Verifica che le selezioni siano esatte !</p>";
                    $this->show('utenti/esegui_scambio', $data);
                    return;
                }
            }

            if ($this->form_validation->run()) {
                $data['Team'] = $this->mdl_categories->getTeam(false, $this->input->post('cmbSquadra'));
                $data['Team2'] = @$this->mdl_categories->getTeam(false, @$this->input->post('cmbSquadra2'));
            }

            $this->show('utenti/esegui_scambio', $data);
        } else
            redirect('utente/login');
    }

    public function modifica_squadre() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_categories');
            $this->load->model('mdl_team');
            $data['Squadre'] = $this->mdl_categories->getSquadre(true);

            $this->form_validation->set_rules('cmbSquadra', 'Squadra');
            $this->form_validation->set_rules('cmbTeam', 'Giocatore');
            $this->form_validation->set_rules('cmbGiocatori', 'Sostituto');
            $this->form_validation->set_rules('costo_uscente', 'Vendita uscente');
            $this->form_validation->set_rules('costo_entrante', 'Costo entrante');

            if ($this->input->post('but_modifica')) {
                if (($this->input->post('cmbSquadra') != 0) && ($this->input->post('cmbTeam') != 0) && ($this->input->post('cmbGiocatori') != 0) && ($this->input->post('costo_uscente') != "") && ($this->input->post('costo_entrante') != "")) {
                    $change = $this->mdl_team->updateTeam($this->input->post('cmbSquadra'), $this->input->post('cmbTeam'), $this->input->post('cmbGiocatori'), $this->input->post('costo_uscente'), $this->input->post('costo_entrante'));
                    if ($change)
                        $data['message'] = "<p style='color:green;'>Modifica effettuata con successo</p>";

                    $this->show('utenti/modifica_squadre', $data);
                    return;
                }else {
                    $data['message'] = "<p style='color:red;'>ATTENZIONE: Verifica che le selezioni siano esatte !</p>";
                    $this->show('utenti/modifica_squadre', $data);
                    return;
                }
            }

            if ($this->form_validation->run()) {
                $data['Team'] = $this->mdl_categories->getTeam(false, $this->input->post('cmbSquadra'));
                $ruolo = $this->mdl_team->getRuolo($this->input->post('cmbTeam'));
                if (!is_Array($ruolo))
                    $data['Giocatori'] = $this->mdl_categories->getGiocatori(true, $ruolo);
            }

            $this->show('utenti/modifica_squadre', $data);
        } else
            redirect('utente/login');
    }

    function fantamilioni() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_categories');

            //Aggiungo o sottraggo il debito inserito all'utente selezionato
            if ($this->input->post('but_fanta')) {
                $this->form_validation->set_rules('cmbScelta', 'Scelta');
                $this->form_validation->set_rules('txtFanta', 'Debito', 'trim|required|numeric');
                $this->form_validation->set_rules('cmbSquadra', 'Squadra');

                if ($this->form_validation->run()) {
                    if ($this->input->post('cmbScelta') == 0)
                        $this->mdl_utenti->addFanta($this->input->post('txtFanta'), $this->input->post('cmbSquadra'));

                    if ($this->input->post('cmbScelta') == 1)
                        $this->mdl_utenti->delFanta($this->input->post('txtFanta'), $this->input->post('cmbSquadra'));

                    $data['message'] = "Fantamilioni modificati con successo !";
                }
            }
            $data['fanta'] = $this->mdl_utenti->getFanta();
            $data['Squadre'] = $this->mdl_categories->getSquadre(false);

            $this->show('utenti/fantamilioni', $data);
        } else
            redirect('utente/login');
    }

    function quote() {
        if (isset($_SESSION['id_utente'])) {
            $this->load->model('mdl_utenti');
            $this->load->model('mdl_categories');

            //Aggiungo o sottraggo il debito inserito all'utente selezionato
            if ($this->input->post('but_debito')) {
                $this->form_validation->set_rules('cmbDebito', 'Scelta');
                $this->form_validation->set_rules('txtDebito', 'Debito', 'trim|required|numeric');
                $this->form_validation->set_rules('cmbSquadra', 'Squadra');

                if ($this->form_validation->run()) {
                    if ($this->input->post('cmbDebito') == 0)
                        $this->mdl_utenti->addDebito($this->input->post('txtDebito'), $this->input->post('cmbSquadra'));

                    if ($this->input->post('cmbDebito') == 1)
                        $this->mdl_utenti->delDebito($this->input->post('txtDebito'), $this->input->post('cmbSquadra'));
                }
            }
            $data['debiti'] = $this->mdl_utenti->getDebiti();
            $data['Squadre'] = $this->mdl_categories->getSquadre(false);

            $this->show('utenti/quote', $data);
        } else
            redirect('utente/login');
    }

    public function checkGiocatore($cognome) {
        $this->db->where('cognome', $cognome);
        $query = $this->db->get("tb_giocatori");

        if ($query->num_rows() == 0)
            return true;
        else
            return false;
    }

}

/* End of file utente.php */
/* Location: ./application/controllers/utente.php */