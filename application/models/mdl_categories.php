<?php

class mdl_categories extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function getRuoli($blank = false) {
        $this->db->order_by('id_ruolo');
        $query = $this->db->get("tb_ruolo");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_ruolo']] = $row['ruolo'];
        }
        return $return;
    }

    public function getSquadreA($blank = false) {
        $this->db->order_by('squadra');
        $query = $this->db->get("tb_squadre");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_squadra']] = $row['squadra'];
        }
        return $return;
    }
    
    public function getComboStoricoSquadre($blank = false) {
        $query = $this->db->query('select distinct(squadra),cognome,nome from tb_all_teams order by squadra;');

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['squadra']] = $row['squadra'] . " / " . $row['nome'] . " " . $row['cognome'];
        }
        return $return;
    }

    public function getTattiche($blank = false) {
        $this->db->order_by('id_tattica');
        $query = $this->db->get("tb_tattica");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_tattica']] = $row['tattica'];
        }
        return $return;
    }
    
    public function getMaglie() {
        $this->db->select('*');
        $this->db->where('id_utente', '0');
        $this->db->order_by('id_maglia');
        $this->db->from('tb_maglie');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getGiocatori($blank = false, $ruolo) {
        $this->db->order_by('cognome');
        $this->db->where('id_utente', '0');
        $this->db->where('ruolo', $ruolo);
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }
    
    public function getGiocatoriAssegnati($blank = false) {
        $this->db->order_by('cognome');
        $this->db->where('id_utente <>', '0');
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }
    
    public function getGiocatoriTotali($blank = false) {
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

    public function getAllGiocatori($blank = false, $ruolo) {
        $this->db->order_by('cognome');
        $this->db->where('ruolo', $ruolo);
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

    //Inserisco inattivo = 0 per eliminare i ceduti fuori Serie A
    public function getGiocatoriSel($blank = false, $ruolo, $giornata) {
        $this->db->order_by('cognome');
        $this->db->where('ruolo', $ruolo);
        $this->db->where('ultima_giornata <>', $giornata);
        $this->db->where('inattivo', 0);
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

    public function getRigoristi($blank = false, $id_utente) {
        //Seleziono ultima giornata in cui utente ha schierato i rigoristi
        $query = $this->db->query("SELECT MAX(giornata) as giornata from tb_rigoristi WHERE id_utente = " . $id_utente);
        $row = $query->row('giornata');

        //Dopo seleziono rigoristi
        $this->load->model('mdl_team');
        $this->db->select('*');
        $this->db->where('id_utente', $id_utente);
        $this->db->where('giornata', $row);
        $this->db->order_by('ordine', 'asc');
        $query = $this->db->get("tb_rigoristi");

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $mediavoto = number_format($this->mdl_team->getMediaVotoGiocatore($row['id_giocatore']), 2);
            
            $return[$row['id_giocatore']] = $this->mdl_team->getCognome($row['id_giocatore']) . " " . $this->mdl_team->getNome($row['id_giocatore']) . " - " . $mediavoto;
        }
        return @$return;
    }

    public function getFormazione($blank = false, $id_utente, $ruolo="") {
        if($ruolo != ""){
            $this->db->order_by('cognome');
            $this->db->where('id_utente', $id_utente);
            $this->db->where('ruolo', $ruolo);
            $query = $this->db->get("tb_giocatori");
            $return = array();

            if ($blank)
                $return[] = '';

            foreach ($query->result_array() as $row) {
                $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
            }
            return $return;
        }else{
            $this->db->order_by('ruolo');
            $this->db->order_by('cognome');
            $this->db->where('id_utente', $id_utente);
            $this->db->where('ruolo >', 1);
            $query = $this->db->get("tb_giocatori");
            $return = array();

            if ($blank)
                $return[] = '';

            foreach ($query->result_array() as $row) {
                
                //switcho ruolo per aggiungere iniziale ruolo nella Select dei panchinari
                switch ($row['ruolo']) {
                    case 2:
                        $r = "D - ";
                        break;
                    case 3:
                        $r = "C - ";
                        break;
                    case 4:
                        $r = "A - ";
                        break;
                }
                
                $return[$row['id_giocatore']] = $r . $row['cognome'] . " " . $row['nome'];
            }
            return $return;
        }
    }
    
    public function getFormazionePerSelezioneRigoristi($id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ruolo', 'DESC');
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_giocatori");

        return $query->result_array();
    }

    public function getTeamForRigori($blank = false, $id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ruolo', 'DESC');
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

    public function getTeam($blank = false, $id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ruolo');
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_giocatori");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_giocatore']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

    public function getSquadre($blank = false) {
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_utenti");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_utente']] = $row['cognome'] . " " . $row['nome'] . " / " . $row['squadra'];
        }
        return $return;
    }
    
    public function getUtenti($blank = false) {
        $this->db->order_by('cognome');
        $query = $this->db->get("tb_utenti");
        $return = array();

        if ($blank)
            $return[] = '';

        foreach ($query->result_array() as $row) {
            $return[$row['id_utente']] = $row['cognome'] . " " . $row['nome'];
        }
        return $return;
    }

}

?>