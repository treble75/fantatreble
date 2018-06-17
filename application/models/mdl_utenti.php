<?php

class mdl_utenti extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function login($utente, $password) {
        $this->db->select('*');
        $this->db->where('username', $utente);
        $this->db->where('pwd_utente', $password);
        $this->db->from('tb_utenti');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $_SESSION['username'] = $query->row()->username;
            $_SESSION['utente'] = $query->row()->nome . " " . $query->row()->cognome;
            $_SESSION['id_utente'] = $query->row()->id_utente;
            $_SESSION['squadra'] = $query->row()->squadra;
            $_SESSION['id_fantaformazione'] = $query->row()->id_fantaformazione;
            $_SESSION['nome'] = $query->row()->nome;
            $_SESSION['cognome'] = $query->row()->cognome;

            /* $newdata = array(
              'username'  => $query->row()->username,
              'utente'    => $query->row()->nome." ".$query->row()->cognome,
              'id_utente' => $query->row()->id_utente,
              'logged_in' => TRUE
              );

              $this->session->set_userdata($newdata); */

            return true;
        } else {
            return false;
        }
    }

    public function getMail($id_utente) {
        $this->db->select('email');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_utenti');

        return $this->db->get()->row('email');
    }

    public function getBlocco() {
        $this->db->select('blocco');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->from('tb_calendario');

        return $this->db->get()->row('blocco');
    }

    public function getSquadra($id_utente) {
        $this->db->select('squadra');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_utenti');

        return $this->db->get()->row('squadra');
    }
    
    public function getSquadraPrecedente($id_utente, $stagione) {
        $this->db->select('squadra');
        $this->db->where('id_squadra', $id_utente);
        $this->db->where('stagione', $stagione);
        $this->db->from('tb_all_teams');

        return $this->db->get()->row('squadra');
    }
    
    public function getLogoStorico($id_utente, $stagione) {
        $this->db->select('logo');
        $this->db->where('id_squadra', $id_utente);
        $this->db->where('stagione', $stagione);
        $this->db->from('tb_all_teams');

        return $this->db->get()->row('logo');
    }
    
    public function getUltimaSelezioneRigoristi($id_utente) {
        $this->db->select('ora_inserimento');
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ora_inserimento', 'DESC');
        $this->db->from('tb_rigoristi');

        return $this->db->get()->row('ora_inserimento');
    }
    
    public function getPartecipazioni($nome, $cognome) {
        $query = $this->db->query('select count(*) from tb_all_teams where nome = "' . $nome . '" and cognome = "' . $cognome . '"');

        return $query->row('count(*)');
    }
    
    public function getImmagine($squadra, $type) {
        if ($type == "squadra") {
            
            $this->db->select('logo');
            $this->db->where('squadra', $squadra);
            $this->db->order_by('id', 'DESC');
            $this->db->from('tb_all_teams');

            return $this->db->get()->row('logo');
        }
        if ($type == "utente") {
            
            $this->db->select('user');
            $this->db->where('squadra', $squadra);
            $this->db->order_by('id', 'DESC');
            $this->db->from('tb_all_teams');

            return $this->db->get()->row('user');
        }
    }
    
    public function checkRigorista($id_giocatore, $id_utente) {
        $this->db->select('id_utente');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');

        $chk = $this->db->get()->row('id_utente');
        
        if ($chk == $id_utente){
            return true;
        }else{
            return false;
        }
    }
    
    public function getPlusvalenza($id) {
        $this->db->select('costo');
        $this->db->where('id_correlato', $id);
        $this->db->from('tb_trasferimenti');

        $costo_acquisto = $this->db->get()->row('costo');

        if ($costo_acquisto == ""){
            $plusvalenza = 0;            
        }else {
            $this->db->select('costo');
            $this->db->where('id', $id);
            $this->db->from('tb_trasferimenti');

            $costo_vendita = $this->db->get()->row('costo');
            
            $plusvalenza = ($costo_vendita - $costo_acquisto);
        }
        
        return $plusvalenza;
    }

    public function getUtente($id_utente) {
        $this->db->select('soprannome');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_utenti');

        return $this->db->get()->row('soprannome');
    }
    
    public function getNomeUtente($id_utente) {
        $this->db->select('nome');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_utenti');
        $nome = $this->db->get()->row('nome');
        
        $this->db->select('cognome');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_utenti');
        $cognome = $this->db->get()->row('cognome');

        return $nome . " " . $cognome;
    }
    
    public function getNomeUtenteDaSquadra($squadra) {
        $this->db->select('nome');
        $this->db->where('squadra', $squadra);
        $this->db->from('tb_all_teams');
        $nome = $this->db->get()->row('nome');
        
        $this->db->select('cognome');
        $this->db->where('squadra', $squadra);
        $this->db->from('tb_all_teams');
        $cognome = $this->db->get()->row('cognome');

        return $nome . " " . $cognome;
    }
    
    public function getNomeUtentePrecedente($id_utente, $stagione) {
        $this->db->select('nome');
        $this->db->where('id_squadra', $id_utente);
        $this->db->where('stagione', $stagione);
        $this->db->from('tb_all_teams');
        $nome = $this->db->get()->row('nome');
        
        $this->db->select('cognome');
        $this->db->where('id_squadra', $id_utente);
        $this->db->where('stagione', $stagione);
        $this->db->from('tb_all_teams');
        $cognome = $this->db->get()->row('cognome');

        return $nome . " " . $cognome;
    }

    public function getDatiUtente($id) {
        $this->db->where('id_utente', $id);
        $query = $this->db->get("tb_utenti");
        return $query->result_array();
    }
    
    public function getSquadre() {
        $this->db->order_by('squadra', 'asc');
        $query = $this->db->get("tb_utenti");
        return $query->result_array();
    }
    
    public function getNewsTeam($id) {
        $this->db->where('id_utente', $id);
        $this->db->order_by('data', 'desc');
        $this->db->limit(10);
        $query = $this->db->get("tb_news");
        return $query->result_array();
    }
    
    public function getNews() {
        $this->db->order_by('data', 'desc');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get("tb_news");
        return $query->result_array();
    }
    
    public function getNewsInfortuni() {
        $this->db->where('tipologia', 'infortunio');
        $this->db->order_by('data', 'desc');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get("tb_news");
        return $query->result_array();
    }
    
    public function getNewsTrasferimenti() {
        $this->db->where('tipologia', 'vendita');
        $this->db->or_where('tipologia', 'acquisto');
        $this->db->or_where('tipologia', 'cessione');
        $this->db->order_by('data', 'desc');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get("tb_news");
        return $query->result_array();
    }
    
    public function getNewsDesktop($competizione) {
        $this->db->where('tipologia', $competizione);
        $query = $this->db->get("tb_news_desktop");
        return $query->result_array();
    }
    
    public function deleteNewsDesktop($competizione) {
        $this->db->where('tipologia', $competizione);
        $this->db->delete('tb_news_desktop');
    }
    
    public function insertNewsDesktop($data) {
        $this->db->insert('tb_news_desktop', $data);
    }
    
    public function insertNewsUtente($data) {
        $this->db->insert('tb_news', $data);
    }

    function getOldDebito($utente) {
        $this->db->select('debito');
        $this->db->where('id_utente', $utente);
        $this->db->from('tb_debito');

        return $this->db->get()->row('debito');
    }

    function getFantamilioni($utente) {
        $this->db->select('fantamilioni');
        $this->db->where('id_utente', $utente);
        $this->db->from('tb_fantamilioni');

        return $this->db->get()->row('fantamilioni');
    }

    public function addDebito($debito, $id_utente) {
        $oldDebito = $this->getOldDebito($id_utente);
        $actDebito = ($oldDebito + $debito);
        $this->db->where('id_utente', $id_utente);
        $this->db->update('tb_debito', array('debito' => $actDebito));
        
        //Tengo traccia della data e della quota da versare
        $this->db->insert('tb_quote', array('id_utente' => $id_utente, 'quota' => $debito, 'data' => date("Y-m-d H:i:s"), 'tipologia' => "debito"));
    }

    public function addFanta($fanta, $id_utente) {
        $oldFanta = $this->getFantamilioni($id_utente);
        $actFanta = ($oldFanta + $fanta);
        $this->db->where('id_utente', $id_utente);
        $this->db->update('tb_fantamilioni', array('fantamilioni' => $actFanta));
    }

    public function delFanta($fanta, $id_utente) {
        $oldFanta = $this->getFantamilioni($id_utente);
        $actFanta = ($oldFanta - $fanta);
        $this->db->where('id_utente', $id_utente);
        $this->db->update('tb_fantamilioni', array('fantamilioni' => $actFanta));
    }

    public function delDebito($debito, $id_utente) {
        $oldDebito = $this->getOldDebito($id_utente);
        $actDebito = ($oldDebito - $debito);
        $this->db->where('id_utente', $id_utente);
        $this->db->update('tb_debito', array('debito' => $actDebito));
        
        //Tengo traccia della data e della quota versata
        $this->db->insert('tb_quote', array('id_utente' => $id_utente, 'quota' => $debito, 'data' => date("Y-m-d H:i:s"), 'tipologia' => "versamento"));
    }

    public function getFanta() {
        $this->db->select('*');
        $this->db->order_by('fantamilioni', 'desc');
        $query = $this->db->get("tb_fantamilioni");
        return $query->result_array();
    }

    public function getDebiti() {
        $this->db->select('*');
        $query = $this->db->get("tb_debito");
        return $query->result_array();
    }
    
    public function getDettaglioTrofei($nome, $cognome) {
        $this->db->select('*');
        $this->db->where('nome_utente', $nome);
        $this->db->where('cognome_utente', $cognome);
        $this->db->order_by('stagione', 'asc');
        $query = $this->db->get("tb_trofei");
        return $query->result_array();
    }
    
    public function getTrofei($id_utente) {
        $query = $this->db->query('select sum( `scudetto`) + sum( `champions`) + sum( `coppa`) + sum( `supercoppa`) AS totale_trofei from tb_utenti where id_utente = ' . $id_utente );

        return $query->row('totale_trofei');
    }

    public function getOfferte() {
        $this->db->select('*');
        $this->db->order_by('id_offerta', 'desc');
        $query = $this->db->get("tb_offerte");
        return $query->result_array();
    }

    public function getTrattativeInCorso() {
        $this->db->select('*');
        $this->db->where('attiva', 1);
        $this->db->order_by('id_offerta', 'asc');
        $query = $this->db->get("tb_offerte");
        return $query->result_array();
    }

    public function getCommenti($giornata) {
        $this->db->select('*');
        $this->db->where('giornata', $giornata);
        $this->db->order_by('id_commento', 'desc');
        $query = $this->db->get("tb_commenti");
        return $query->result_array();
    }

    public function getSchieramentoT($id) {
        $this->db->select('*');
        $this->db->where('id_utente', $id);
        $this->db->from('tb_formazionit');
        $this->db->order_by('ruolo');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchieramentoTCoppa($id) {
        $this->db->select('*');
        $this->db->where('id_utente', $id);
        $this->db->from('tb_formazionit_coppa');
        $this->db->order_by('ruolo');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchieramentoP($id) {
        $this->db->select('*');
        $this->db->where('id_utente', $id);
        $this->db->from('tb_formazionip');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchieramentoPCoppa($id) {
        $this->db->select('*');
        $this->db->where('id_utente', $id);
        $this->db->from('tb_formazionip_coppa');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function insertOfferta($data) {
        $this->db->insert('tb_offerte', $data);
    }

    public function insertCommento($data) {
        $this->db->insert('tb_commenti', $data);
    }

    public function insBlocco($giornata, $blocco) {
        $this->db->where('giornata', $giornata);
        $this->db->update('tb_calendario', array('blocco' => $blocco));
    }

    public function insertUtente($data) {
        $this->db->insert('tb_utenti', $data);
    }
    
    public function updateUtente($id_utente,$data) {
        $this->db->where('id_utente', $id_utente);
        $this->db->update('tb_utenti', $data);
    }

}

?>