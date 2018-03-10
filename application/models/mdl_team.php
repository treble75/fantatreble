<?php

class mdl_team extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function insertGiocatore($data) {
        $this->db->insert('tb_giocatori', $data);
    }

    public function addSchierati($data) {
        $this->db->insert('tb_formazioni_schierate', $data);
    }

    public function addSchieratiCoppa($data) {
        $this->db->insert('tb_formazioni_schierate_coppa', $data);
    }

    public function getGiocatoreRuolo($ruolo, $order) {
        $this->db->select('*');
        $this->db->where('ruolo', $ruolo);
        $this->db->order_by($order);
        $this->db->from('tb_giocatori');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getTop($giornata) {
        $queryP = $this->db->query('select * from tb_giocatori, tb_voti where tb_giocatori.id_giocatore = tb_voti.id_giocatore and giornata = ' . $giornata . ' and ruolo = 1 ORDER BY fantavoto DESC, voto DESC limit 1');
        $result['P'] = $queryP->result_array();

        $queryD = $this->db->query('select * from tb_giocatori, tb_voti where tb_giocatori.id_giocatore = tb_voti.id_giocatore and giornata = ' . $giornata . ' and ruolo = 2 ORDER BY fantavoto DESC, voto DESC limit 3');
        $result['D'] = $queryD->result_array();

        $queryC = $this->db->query('select * from tb_giocatori, tb_voti where tb_giocatori.id_giocatore = tb_voti.id_giocatore and giornata = ' . $giornata . ' and ruolo = 3 ORDER BY fantavoto DESC, voto DESC limit 4');
        $result['C'] = $queryC->result_array();

        $queryA = $this->db->query('select * from tb_giocatori, tb_voti where tb_giocatori.id_giocatore = tb_voti.id_giocatore and giornata = ' . $giornata . ' and ruolo = 4 ORDER BY fantavoto DESC, voto DESC limit 3');
        $result['A'] = $queryA->result_array();

        return $result;
    }

    public function getTopCampionato() {
        $queryP = $this->db->query('SELECT
										avg(fantavoto) AS fv,
										avg(voto) AS vt,
										tb_giocatori.cognome,
										tb_giocatori.nome,
										tb_giocatori.squadra,
										tb_giocatori.id_utente,
										tb_voti.id_giocatore,
										tb_voti.giornata,
										tb_voti.voto,
										tb_voti.fantavoto,
										tb_voti.gol,
										tb_voti.assist,
										tb_voti.ammonizioni,
										tb_voti.espulsioni,
										tb_voti.rigore_parato,
										tb_voti.rigore_sbagliato,
										tb_voti.autogol,
										tb_voti.gol_subiti,
										tb_voti.schierato
										from tb_voti, tb_giocatori
										where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
										and tb_giocatori.inattivo = 0
										and tb_giocatori.ruolo =  1
										group by id_giocatore 
										order by fv DESC, vt DESC, cognome ASC
                                        limit 1');
        $result['P'] = $queryP->result_array();

        $queryD = $this->db->query('SELECT
										avg(fantavoto) AS fv,
										avg(voto) AS vt,
										tb_giocatori.cognome,
										tb_giocatori.nome,
										tb_giocatori.squadra,
										tb_giocatori.id_utente,
										tb_voti.id_giocatore,
										tb_voti.giornata,
										tb_voti.voto,
										tb_voti.fantavoto,
										tb_voti.gol,
										tb_voti.assist,
										tb_voti.ammonizioni,
										tb_voti.espulsioni,
										tb_voti.rigore_parato,
										tb_voti.rigore_sbagliato,
										tb_voti.autogol,
										tb_voti.gol_subiti,
										tb_voti.schierato
										from tb_voti, tb_giocatori
										where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
										and tb_giocatori.inattivo = 0
										and tb_giocatori.ruolo =  2
										group by id_giocatore 
										order by fv DESC, vt DESC, cognome ASC
                                        limit 3');
        $result['D'] = $queryD->result_array();

        $queryC = $this->db->query('SELECT
										avg(fantavoto) AS fv,
										avg(voto) AS vt,
										tb_giocatori.cognome,
										tb_giocatori.nome,
										tb_giocatori.squadra,
										tb_giocatori.id_utente,
										tb_voti.id_giocatore,
										tb_voti.giornata,
										tb_voti.voto,
										tb_voti.fantavoto,
										tb_voti.gol,
										tb_voti.assist,
										tb_voti.ammonizioni,
										tb_voti.espulsioni,
										tb_voti.rigore_parato,
										tb_voti.rigore_sbagliato,
										tb_voti.autogol,
										tb_voti.gol_subiti,
										tb_voti.schierato
										from tb_voti, tb_giocatori
										where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
										and tb_giocatori.inattivo = 0
										and tb_giocatori.ruolo =  3
										group by id_giocatore 
										order by fv DESC, vt DESC, cognome ASC
                                        limit 4');
        $result['C'] = $queryC->result_array();

        $queryA = $this->db->query('SELECT
										avg(fantavoto) AS fv,
										avg(voto) AS vt,
										tb_giocatori.cognome,
										tb_giocatori.nome,
										tb_giocatori.squadra,
										tb_giocatori.id_utente,
										tb_voti.id_giocatore,
										tb_voti.giornata,
										tb_voti.voto,
										tb_voti.fantavoto,
										tb_voti.gol,
										tb_voti.assist,
										tb_voti.ammonizioni,
										tb_voti.espulsioni,
										tb_voti.rigore_parato,
										tb_voti.rigore_sbagliato,
										tb_voti.autogol,
										tb_voti.gol_subiti,
										tb_voti.schierato
										from tb_voti, tb_giocatori
										where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
										and tb_giocatori.inattivo = 0
										and tb_giocatori.ruolo =  4
										group by id_giocatore 
										order by fv DESC, vt DESC, cognome ASC
                                        limit 3');
        $result['A'] = $queryA->result_array();

        return $result;
    }

    public function getLastOfferte() {
        $this->db->select('*');
        $this->db->order_by('id_offerta', 'DESC');
        $this->db->from('tb_offerte');
        $this->db->limit(3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSquadraA($id) {
        $this->db->select('squadra');
        $this->db->where('id_squadra', $id);
        $this->db->from('tb_squadre');

        return $this->db->get()->row('squadra');
    }
    
    public function getNomeTeam($id) {
        $this->db->select('squadra');
        $this->db->where('id_utente', $id);
        $this->db->from('tb_utenti');

        return $this->db->get()->row('squadra');
    }
    
    public function getSquadraBomber($id_giocatore) {
        $this->db->select('id_utente');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        
        $squadra = $this->getNomeTeam($this->db->get()->row('id_utente'));
        return $squadra;
    }

    public function getBomber($giornata) {
        //inserire ultima giornata del FantaTreble
        if ($giornata != 35) {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and giornata < ' . $giornata . '
							group by id_giocatore 
							order by gol DESC, fv DESC
							limit 10');
        } else {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							group by id_giocatore 
							order by gol DESC, fv DESC
							limit 10');
        }

        return $query->result_array();
    }

    public function getBomberCampionato($giornata) {
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, nome, tb_giocatori.id_giocatore, avg(tb_voti.fantavoto) as fv
                                                        FROM tb_voti
                                                        join tb_giocatori on tb_voti.id_giocatore = tb_giocatori.id_giocatore
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc
                                                        limit 10;');

        return $query->result_array();
    }
    
    public function getBomberCampionatoTotale($giornata) {
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, nome, tb_giocatori.id_giocatore, tb_giocatori.ruolo, tb_giocatori.id_utente, sum(schierato) as pg, sum(espulsioni) as espu, sum(ammonizioni) as ammo, sum(assist) as assist, avg(tb_voti.voto) as voto, avg(tb_voti.fantavoto) as fv
                                                        FROM tb_voti
                                                        join tb_giocatori on tb_voti.id_giocatore = tb_giocatori.id_giocatore
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc, voto desc
                                                        ;');

        return $query->result_array();
    }

    public function getBomberCoppa($giornata) {
        //Inserire le giornate di Coppa Treble
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, tb_giocatori.id_giocatore, avg(tb_voti_coppa.fantavoto) as fv 
                                                        FROM tb_voti_coppa
                                                        join tb_giocatori on tb_voti_coppa.id_giocatore = tb_giocatori.id_giocatore
                                                        where giornata in (4,7,10,11,15,20,26,31) 
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc
                                                        limit 10;');

        return $query->result_array();
    }
    
    public function getBomberCoppaTotale($giornata) {
        //Inserire le giornate di Coppa Treble
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, nome, tb_giocatori.id_giocatore, tb_giocatori.ruolo, tb_giocatori.id_utente, sum(schierato) as pg, sum(espulsioni) as espu, sum(ammonizioni) as ammo, sum(assist) as assist, avg(tb_voti_coppa.voto) as voto, avg(tb_voti_coppa.fantavoto) as fv 
                                                        FROM tb_voti_coppa
                                                        join tb_giocatori on tb_voti_coppa.id_giocatore = tb_giocatori.id_giocatore
                                                        where giornata in (4,7,10,11,15,20,26,31) 
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc, voto desc
                                                        ;');

        return $query->result_array();
    }

    public function getBomberChampions($giornata) {
        //Inserire le giornate di Champions
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, tb_giocatori.id_giocatore, avg(tb_voti_coppa.fantavoto) as fv 
                                                        FROM tb_voti_coppa
                                                        join tb_giocatori on tb_voti_coppa.id_giocatore = tb_giocatori.id_giocatore
                                                        where giornata in (2,3,6,9,12,13,16,17,19,22,23,24,27,28,30,33) 
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc
                                                        limit 10;');

        return $query->result_array();
    }
    
    public function getBomberChampionsTotale($giornata) {
        //Inserire le giornate di Champions
        $query = $this->db->query('SELECT sum(gol) as gol,cognome, nome, tb_giocatori.id_giocatore, tb_giocatori.ruolo, tb_giocatori.id_utente, sum(schierato) as pg, sum(espulsioni) as espu, sum(ammonizioni) as ammo, sum(assist) as assist, avg(tb_voti_coppa.voto) as voto, avg(tb_voti_coppa.fantavoto) as fv 
                                                        FROM tb_voti_coppa
                                                        join tb_giocatori on tb_voti_coppa.id_giocatore = tb_giocatori.id_giocatore
                                                        where giornata in (2,3,6,9,12,13,16,17,19,22,23,24,27,28,30,33) 
                                                        and schierato = 1 
                                                        group by cognome
                                                        order by gol desc, fv desc, voto desc
                                                        ;');

        return $query->result_array();
    }

    public function getMarcatori() {
        $query = $this->db->query('SELECT
							Sum(gol) AS gol,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							group by id_giocatore 
							order by gol DESC, fv DESC
							limit 10');

        return $query->result_array();
    }

    public function getBomberTeam($id_utente, $giornata) {
        //Indicare ultima giornata del FantaTreble
        if ($giornata != 35) {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and id_utente = ' . $id_utente . '
							and giornata < ' . $giornata . '
							group by id_giocatore 
							order by gol DESC, fv DESC
							limit 10');
        } else {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							and id_utente = ' . $id_utente . '
							group by id_giocatore 
							order by gol DESC, fv DESC
							limit 10');
        }

        return $query->result_array();
    }
    
    public function getBomberTeamTotali($id_utente, $giornata) {
        //Indicare ultima giornata del FantaTreble
        if ($giornata != 35) {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
                                                        sum(schierato) as pg,
							tb_giocatori.cognome,
							tb_giocatori.nome,
                                                        tb_giocatori.ruolo,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv,
                                                        sum(assist) as assist,
                                                        sum(espulsioni) as espu,
                                                        sum(ammonizioni) as ammo
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and id_utente = ' . $id_utente . '
							and giornata < ' . $giornata . '
							group by id_giocatore 
							order by gol DESC, fv DESC
							');
        } else {
            $query = $this->db->query('SELECT
							Sum(gol) AS gol,
                                                        sum(schierato) as pg,
							tb_giocatori.cognome,
							tb_giocatori.nome,
                                                        tb_giocatori.ruolo,
							tb_voti.id_giocatore,
							avg(tb_voti.voto) as voto,
							avg(tb_voti.fantavoto) as fv,
                                                        sum(assist) as assist,
                                                        sum(espulsioni) as espu,
                                                        sum(ammonizioni) as ammo
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							and id_utente = ' . $id_utente . '
							group by id_giocatore 
							order by gol DESC, fv DESC
							');
        }

        return $query->result_array();
    }

    public function getGolCampionato($id_giocatore) {
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and schierato = 1');

        return $query->row('gol');
    }

    public function getGolCoppa($id_giocatore) {
        //Indicare le giornate di coppa Treble
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 4');
        $gol = $query->row('gol');
        $sommagol = ($gol == null ? 0 : $gol);
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 7');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 10');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 11');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 15');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 20');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 26');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 31');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;

        return $sommagol;
    }

    public function getGolChampions($id_giocatore) {
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 2');
        $gol = $query->row('gol');
        $sommagol = ($gol == null ? 0 : $gol);
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 3');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 6');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 9');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 12');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 13');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 16');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 17');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 19');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 22');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 23');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 24');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 27');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 28');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 30');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti_coppa, tb_giocatori where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.id_giocatore = ' . $id_giocatore . ' and schierato = 1 and giornata = 33');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;

        return $sommagol;
    }

    public function getGolTotaliChampions($id_giocatore) {
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 4');
        $gol = $query->row('gol');
        $sommagol = ($gol == null ? 0 : $gol);
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 6');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 8');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 12');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 14');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 16');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 20');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 22');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 26');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 30');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;

        return $sommagol;
    }

    public function getGolTotaliCoppa($id_giocatore) {
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 2');
        $gol = $query->row('gol');
        $sommagol = ($gol == null ? 0 : $gol);
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 10');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 18');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 24');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 28');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;
        $query = $this->db->query('select sum(gol) as gol from tb_voti, tb_giocatori where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.id_giocatore = ' . $id_giocatore . ' and giornata = 32');
        $gol = $query->row('gol');
        $gol = ($gol == null ? 0 : $gol);
        $sommagol += $gol;

        return $sommagol;
    }

    public function getGiocatoreFV($ruolo, $order) {
        $query = $this->db->query('SELECT
							Sum(' . $order . ') AS ' . $order . ',
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_giocatori.squadra,
							tb_giocatori.id_utente,
							tb_giocatori.inattivo,
							tb_voti.id_giocatore,
							tb_voti.giornata,
							tb_voti.voto,
							tb_voti.fantavoto,
							tb_voti.gol,
							tb_voti.assist,
							tb_voti.ammonizioni,
							tb_voti.espulsioni,
							tb_voti.rigore_parato,
							tb_voti.rigore_sbagliato,
							tb_voti.autogol,
							tb_voti.gol_subiti,
							tb_voti.schierato
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and tb_giocatori.ruolo =  ' . $ruolo . '
							group by id_giocatore 
							order by ' . $order . ' DESC, tb_voti.voto DESC ');

        if ($order == "voto" || $order == "fantavoto") {
            if ($order == "voto")
                $chk = "fantavoto";
            if ($order == "fantavoto")
                $chk = "voto";
            $query = $this->db->query('SELECT
							avg(' . $order . ') AS ' . $order . ',
							avg(' . $chk . ') AS ' . $chk . ',
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_giocatori.squadra,
							tb_giocatori.id_utente,
							tb_giocatori.inattivo,
							tb_voti.id_giocatore,
							tb_voti.giornata,
							tb_voti.voto,
							tb_voti.fantavoto,
							tb_voti.gol,
							tb_voti.assist,
							tb_voti.ammonizioni,
							tb_voti.espulsioni,
							tb_voti.rigore_parato,
							tb_voti.rigore_sbagliato,
							tb_voti.autogol,
							tb_voti.gol_subiti,
							tb_voti.schierato
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and tb_giocatori.ruolo =  ' . $ruolo . '
							group by id_giocatore 
							order by ' . $order . ' DESC, ' . $chk . ' DESC');
        }

        if ($order == "squadra") {
            $query = $this->db->query('SELECT
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_giocatori.squadra,
							tb_squadre.id_squadra,
							tb_squadre.squadra AS team,
							tb_giocatori.id_utente,
							tb_giocatori.inattivo,
							tb_voti.id_giocatore,
							tb_voti.giornata,
							tb_voti.voto,
							tb_voti.fantavoto,
							tb_voti.gol,
							tb_voti.assist,
							tb_voti.ammonizioni,
							tb_voti.espulsioni,
							tb_voti.rigore_parato,
							tb_voti.rigore_sbagliato,
							tb_voti.autogol,
							tb_voti.gol_subiti,
							tb_voti.schierato
							from tb_voti, tb_giocatori, tb_squadre
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							and tb_giocatori.squadra = tb_squadre.id_squadra 
							and tb_giocatori.ruolo =  ' . $ruolo . '
							group by id_giocatore 
							order by tb_squadre.squadra ASC, tb_giocatori.cognome ASC, tb_voti.voto desc ');
        }
        
        if ($order == "gol") {
            $query = $this->db->query('SELECT
                                                        Sum(' . $order . ') AS ' . $order . ',
                                                        avg(fantavoto) AS fv,
							avg(voto) AS mediavoto,
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_giocatori.squadra,
							tb_giocatori.id_utente,
							tb_giocatori.inattivo,
							tb_voti.id_giocatore,
							tb_voti.giornata,
							tb_voti.voto,
							tb_voti.fantavoto,
							tb_voti.assist,
							tb_voti.ammonizioni,
							tb_voti.espulsioni,
							tb_voti.rigore_parato,
							tb_voti.rigore_sbagliato,
							tb_voti.autogol,
							tb_voti.gol_subiti,
							tb_voti.schierato
							from tb_voti, tb_giocatori
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore 
							and tb_giocatori.ruolo =  ' . $ruolo . '
							group by id_giocatore 
							order by gol DESC, fv desc, mediavoto DESC ');
        }

        if ($order == "id_utente") {
            $query = $this->db->query('SELECT
							tb_giocatori.cognome,
							tb_giocatori.nome,
							tb_giocatori.squadra,
							tb_squadre.id_squadra,
							tb_squadre.squadra AS team,
							tb_giocatori.id_utente,
							tb_giocatori.inattivo,
							tb_voti.id_giocatore,
							tb_voti.giornata,
							tb_voti.voto,
							tb_voti.fantavoto,
							tb_voti.gol,
							tb_voti.assist,
							tb_voti.ammonizioni,
							tb_voti.espulsioni,
							tb_voti.rigore_parato,
							tb_voti.rigore_sbagliato,
							tb_voti.autogol,
							tb_voti.gol_subiti,
							tb_voti.schierato
							from tb_voti, tb_giocatori, tb_squadre
							where tb_voti.id_giocatore = tb_giocatori.id_giocatore
							and tb_giocatori.squadra = tb_squadre.id_squadra 
							and tb_giocatori.ruolo =  ' . $ruolo . '
							and tb_giocatori.id_utente = 0 
							group by id_giocatore 
							order by tb_squadre.squadra ASC, tb_giocatori.cognome ASC ');
        }

        return $query->result_array();
    }

    public function getStatistiche($id_giocatore) {
        $query = $this->db->query('select avg(fantavoto) as totFantavoto, avg(voto) as totVoto, sum(gol) as totGol, sum(gol_subiti) as totGolsubiti, 
			         sum(ammonizioni) as totAmmonizioni, sum(assist) as totAssist, sum(espulsioni) as totEspulsioni, sum(rigore_parato) as totRigoreparato,
					 sum(rigore_sbagliato) as totRigoresbagliato, sum(autogol) as totAutogol from tb_voti where id_giocatore = ' . $id_giocatore . '');

        return $query->row();
    }

    public function getPartite_schierato($id_giocatore) {
        $query = $this->db->query('select count(*) from tb_voti where id_giocatore = ' . $id_giocatore . ' and schierato = 1');

        return $query->row('count(*)');
    }

    public function getPartite_giocate($id_giocatore) {
        $query = $this->db->query('select count(*) from tb_voti where id_giocatore = ' . $id_giocatore . '');

        return $query->row('count(*)');
    }

    public function getFantaPuntiTotali($id_squadra) {
        //Limitare la query all'ultima giornata di campionato, in questo caso la 27
        $query1 = $this->db->query('select SUM(punteggio1) as somma1 from tb_calendario where id1 = ' . $id_squadra . ' and giornata <= 27;');
        $parziale1 = $query1->row('somma1');

        $query2 = $this->db->query('select SUM(punteggio2) as somma2 from tb_calendario where id2 = ' . $id_squadra . ' and giornata <= 27;');
        $parziale2 = $query2->row('somma2');

        $totale = ( $parziale1 + $parziale2 );

        return $totale;
    }
    
    public function getFantaPuntiTotaliChampionsAB($id_squadra) {
        //Limitare la query all'ultima giornata di campionato, in questo caso la 22
        $query1 = $this->db->query('select SUM(punteggio1) as somma1 from tb_champions where id1 = ' . $id_squadra . ' and giornata <= 22;');
        $parziale1 = $query1->row('somma1');

        $query2 = $this->db->query('select SUM(punteggio2) as somma2 from tb_champions where id2 = ' . $id_squadra . ' and giornata <= 22;');
        $parziale2 = $query2->row('somma2');

        $totale = ( $parziale1 + $parziale2 );

        return $totale;
    }

    public function getTeamGiornata($giornata) {
        $this->db->select('*');
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_formazioni_schierate');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getTeamGiornataCoppa($giornata) {
        $this->db->select('*');
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_formazioni_schierate_coppa');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getSchieratoCoppa($id_giocatore,$giornata) {
        $this->db->select('schierato');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_voti_coppa');
        $query = $this->db->get();

        return $row = $query->row('schierato');
    }
    
    public function getSchieratoCampionato($id_giocatore,$giornata) {
        $this->db->select('schierato');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_voti');
        $query = $this->db->get();

        return $row = $query->row('schierato');
    }
    
    public function getModulo($id_utente) {
        $this->db->select('tattica');
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('giornata', 'desc');
        $this->db->from('tb_tattica_campionato');
        $this->db->limit(1);
        $query = $this->db->get();

        return $row = $query->row('tattica');
    }

    public function getAllRigoristi($id_utente) {
        $this->db->select('*');
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('giornata', 'desc');
        $this->db->order_by('ordine', 'asc');
        $this->db->from('tb_rigoristi');
        $this->db->limit(25);
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getRigoristiSchierati($id_utente, $giornata) {
        $this->db->select('*');
        $this->db->where('giornata', $giornata);
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ordine', 'asc');
        $this->db->from('tb_rigoristi');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchierati() {
        $this->db->select('*');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->from('tb_formazioni_schierate');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchieratiCoppa() {
        $this->db->select('*');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->from('tb_formazioni_schierate_coppa');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSchieratiStats() {
        $this->db->select('*');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_utente', $_SESSION['id_utente']);
        $this->db->from('tb_formazioni_schierate');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getVotiGiornata($giocatore, $giornata) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $giocatore);
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_voti');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getVotiGiornataCoppa($giocatore, $giornata) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $giocatore);
        $this->db->where('giornata', $giornata);
        $this->db->from('tb_voti_coppa');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getFormazioni() {
        $this->db->select('*');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->from('tb_voti');
        $query = $this->db->get();

        return $query->result_array();
    }

    //Aggiorno tb_voti con schierato in Campionato
    public function addChk($id_giocatore) {
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_voti', array('schierato' => 1));
    }

    //Aggiorno tb_voti con schierato in Coppa
    public function addChkCoppa($id_giocatore) {
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_voti_coppa', array('schierato' => 1));
    }
    
    public function getArrow($id_squadra, $giornata) {
        if ($giornata >= 2){
            $query1 = $this->db->query("SELECT posizione from tb_posizione_classifica WHERE giornata = ". $giornata ." and id_squadra = ". $id_squadra ."");
            $pos_attuale = $query1->row('posizione');
            
            $precedente = ( $giornata - 1 );
            $query2 = $this->db->query("SELECT posizione from tb_posizione_classifica WHERE giornata = ". $precedente ." and id_squadra = ". $id_squadra ."");
            $pos_precedente = $query2->row('posizione');

            if ($pos_attuale < $pos_precedente){
                $chk = 1;
            }
            if ($pos_attuale > $pos_precedente){
                $chk = 2;
            }
            if ($pos_attuale == $pos_precedente){
                $chk = "";
            }

            return $chk;
        }
        
    }

    public function getClassifica($giornata_posizione) {
        //Prima aggiorno la tabella tb_classifica con il totale fantapunteggio
        $i = "";
        for ($i = 1; $i <= 10; $i++) {

            $totale = $this->getFantaPuntiTotali($i);

            $this->db->where('id_squadra', $i);
            $this->db->update('tb_classifica', array('fanta_punteggio' => $totale));
        }

        //Ricavo classifica aggiornata
        $this->db->select('*');
        $this->db->select('(gol_fatti-gol_subiti) as DIFF');
        $this->db->from('tb_classifica');
        $this->db->order_by('punti', 'desc');
        $this->db->order_by('fanta_punteggio', 'desc');
        $this->db->order_by('DIFF', 'desc');
        $this->db->order_by('gol_fatti', 'desc');
        $this->db->order_by('id_squadra', 'desc');
        $query = $this->db->get();
        
        //Cancello tabella posizione per la giornata di riferimento
        $this->db->where('giornata', $giornata_posizione);
        $this->db->delete('tb_posizione_classifica');
        
        //Aggiorno tabella posizione classifica
        $i = 1;
        foreach ($query->result_array() as $row) {
            $this->db->insert('tb_posizione_classifica', array('giornata' => $giornata_posizione, 'id_squadra' => $row['id_squadra'], 'posizione' => $i));
            $i++;
        }

        return $query->result_array();
    }

    public function insertClassifica($id_squadra, $data) {
        $query = $this->db->query("update tb_classifica set partite_giocate = (partite_giocate+1), punti = (punti+" . $data['punti'] . "), 
					 vittorie = (vittorie+" . $data['vittorie'] . "),pareggi = (pareggi+" . $data['pareggi'] . "), sconfitte = (sconfitte+" . $data['sconfitte'] . "), 
					 gol_fatti = (gol_fatti+" . $data['gol_fatti'] . "), gol_subiti = (gol_subiti+" . $data['gol_subiti'] . ") where id_squadra = " . $id_squadra . "");
    }

    public function closeGiornata() {
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_calendario', array('giocata' => 1));
    }

    public function getTeam($id_utente) {
        $this->db->select('*');
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ruolo');
        $this->db->order_by('cognome');
        $this->db->from('tb_giocatori');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getGiornata() {
        $query = $this->db->query("SELECT MIN(giornata) as giornata from tb_calendario WHERE giocata = 0");
        $row = $query->row('giornata');

        return $row;
    }

    public function getGiornataCoppa() {
        $query = $this->db->query("SELECT MIN(giornata) as giornata from tb_calendario WHERE giocata = 0");
        $row = $query->row('giornata');
        $giornata = ($row - 1);

        return $giornata;
    }

    public function insertPunteggi($data, $punteggi) {
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 1);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale1'], 'risultato1' => $punteggi['risultato1'], 'bonus_modificatore1' => $data['bonus1'], 'num_difensori1' => $data['num_difensori1'], 'totale_modificatore1' => $data['totale_modificatore1'], 'media_difensori1' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 1);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale1'], 'risultato2' => $punteggi['risultato1'], 'bonus_modificatore2' => $data['bonus1'], 'num_difensori2' => $data['num_difensori1'], 'totale_modificatore2' => $data['totale_modificatore1'], 'media_difensori2' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 2);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale2'], 'risultato1' => $punteggi['risultato2'], 'bonus_modificatore1' => $data['bonus2'], 'num_difensori1' => $data['num_difensori2'], 'totale_modificatore1' => $data['totale_modificatore2'], 'media_difensori1' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 2);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale2'], 'risultato2' => $punteggi['risultato2'], 'bonus_modificatore2' => $data['bonus2'], 'num_difensori2' => $data['num_difensori2'], 'totale_modificatore2' => $data['totale_modificatore2'], 'media_difensori2' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 3);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale3'], 'risultato1' => $punteggi['risultato3'], 'bonus_modificatore1' => $data['bonus3'], 'num_difensori1' => $data['num_difensori3'], 'totale_modificatore1' => $data['totale_modificatore3'], 'media_difensori1' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 3);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale3'], 'risultato2' => $punteggi['risultato3'], 'bonus_modificatore2' => $data['bonus3'], 'num_difensori2' => $data['num_difensori3'], 'totale_modificatore2' => $data['totale_modificatore3'], 'media_difensori2' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 4);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale4'], 'risultato1' => $punteggi['risultato4'], 'bonus_modificatore1' => $data['bonus4'], 'num_difensori1' => $data['num_difensori4'], 'totale_modificatore1' => $data['totale_modificatore4'], 'media_difensori1' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 4);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale4'], 'risultato2' => $punteggi['risultato4'], 'bonus_modificatore2' => $data['bonus4'], 'num_difensori2' => $data['num_difensori4'], 'totale_modificatore2' => $data['totale_modificatore4'], 'media_difensori2' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 5);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale5'], 'risultato1' => $punteggi['risultato5'], 'bonus_modificatore1' => $data['bonus5'], 'num_difensori1' => $data['num_difensori5'], 'totale_modificatore1' => $data['totale_modificatore5'], 'media_difensori1' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 5);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale5'], 'risultato2' => $punteggi['risultato5'], 'bonus_modificatore2' => $data['bonus5'], 'num_difensori2' => $data['num_difensori5'], 'totale_modificatore2' => $data['totale_modificatore5'], 'media_difensori2' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 6);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale6'], 'risultato1' => $punteggi['risultato6'], 'bonus_modificatore1' => $data['bonus6'], 'num_difensori1' => $data['num_difensori6'], 'totale_modificatore1' => $data['totale_modificatore6'], 'media_difensori1' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 6);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale6'], 'risultato2' => $punteggi['risultato6'], 'bonus_modificatore2' => $data['bonus6'], 'num_difensori2' => $data['num_difensori6'], 'totale_modificatore2' => $data['totale_modificatore6'], 'media_difensori2' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 7);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale7'], 'risultato1' => $punteggi['risultato7'], 'bonus_modificatore1' => $data['bonus7'], 'num_difensori1' => $data['num_difensori7'], 'totale_modificatore1' => $data['totale_modificatore7'], 'media_difensori1' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 7);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale7'], 'risultato2' => $punteggi['risultato7'], 'bonus_modificatore2' => $data['bonus7'], 'num_difensori2' => $data['num_difensori7'], 'totale_modificatore2' => $data['totale_modificatore7'], 'media_difensori2' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 8);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale8'], 'risultato1' => $punteggi['risultato8'], 'bonus_modificatore1' => $data['bonus8'], 'num_difensori1' => $data['num_difensori8'], 'totale_modificatore1' => $data['totale_modificatore8'], 'media_difensori1' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 8);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale8'], 'risultato2' => $punteggi['risultato8'], 'bonus_modificatore2' => $data['bonus8'], 'num_difensori2' => $data['num_difensori8'], 'totale_modificatore2' => $data['totale_modificatore8'], 'media_difensori2' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 9);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale9'], 'risultato1' => $punteggi['risultato9'], 'bonus_modificatore1' => $data['bonus9'], 'num_difensori1' => $data['num_difensori9'], 'totale_modificatore1' => $data['totale_modificatore9'], 'media_difensori1' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 9);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale9'], 'risultato2' => $punteggi['risultato9'], 'bonus_modificatore2' => $data['bonus9'], 'num_difensori2' => $data['num_difensori9'], 'totale_modificatore2' => $data['totale_modificatore9'], 'media_difensori2' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 10);
        $this->db->update('tb_calendario', array('punteggio1' => $data['totale10'], 'risultato1' => $punteggi['risultato10'], 'bonus_modificatore1' => $data['bonus10'], 'num_difensori1' => $data['num_difensori10'], 'totale_modificatore1' => $data['totale_modificatore10'], 'media_difensori1' => $data['media_difensori10']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 10);
        $this->db->update('tb_calendario', array('punteggio2' => $data['totale10'], 'risultato2' => $punteggi['risultato10'], 'bonus_modificatore2' => $data['bonus10'], 'num_difensori2' => $data['num_difensori10'], 'totale_modificatore2' => $data['totale_modificatore10'], 'media_difensori2' => $data['media_difensori10']));
    }

    public function insertPunteggiSuperCoppa($data, $punteggi) {
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 1);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale1'], 'risultato1' => $punteggi['risultato1'], 'bonus_modificatore1' => $data['bonus1'], 'num_difensori1' => $data['num_difensori1'], 'totale_modificatore1' => $data['totale_modificatore1'], 'media_difensori1' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 1);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale1'], 'risultato2' => $punteggi['risultato1'], 'bonus_modificatore2' => $data['bonus1'], 'num_difensori2' => $data['num_difensori1'], 'totale_modificatore2' => $data['totale_modificatore1'], 'media_difensori2' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 2);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale2'], 'risultato1' => $punteggi['risultato2'], 'bonus_modificatore1' => $data['bonus2'], 'num_difensori1' => $data['num_difensori2'], 'totale_modificatore1' => $data['totale_modificatore2'], 'media_difensori1' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 2);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale2'], 'risultato2' => $punteggi['risultato2'], 'bonus_modificatore2' => $data['bonus2'], 'num_difensori2' => $data['num_difensori2'], 'totale_modificatore2' => $data['totale_modificatore2'], 'media_difensori2' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 3);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale3'], 'risultato1' => $punteggi['risultato3'], 'bonus_modificatore1' => $data['bonus3'], 'num_difensori1' => $data['num_difensori3'], 'totale_modificatore1' => $data['totale_modificatore3'], 'media_difensori1' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 3);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale3'], 'risultato2' => $punteggi['risultato3'], 'bonus_modificatore2' => $data['bonus3'], 'num_difensori2' => $data['num_difensori3'], 'totale_modificatore2' => $data['totale_modificatore3'], 'media_difensori2' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 4);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale4'], 'risultato1' => $punteggi['risultato4'], 'bonus_modificatore1' => $data['bonus4'], 'num_difensori1' => $data['num_difensori4'], 'totale_modificatore1' => $data['totale_modificatore4'], 'media_difensori1' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 4);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale4'], 'risultato2' => $punteggi['risultato4'], 'bonus_modificatore2' => $data['bonus4'], 'num_difensori2' => $data['num_difensori4'], 'totale_modificatore2' => $data['totale_modificatore4'], 'media_difensori2' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 5);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale5'], 'risultato1' => $punteggi['risultato5'], 'bonus_modificatore1' => $data['bonus5'], 'num_difensori1' => $data['num_difensori5'], 'totale_modificatore1' => $data['totale_modificatore5'], 'media_difensori1' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 5);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale5'], 'risultato2' => $punteggi['risultato5'], 'bonus_modificatore2' => $data['bonus5'], 'num_difensori2' => $data['num_difensori5'], 'totale_modificatore2' => $data['totale_modificatore5'], 'media_difensori2' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 6);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale6'], 'risultato1' => $punteggi['risultato6'], 'bonus_modificatore1' => $data['bonus6'], 'num_difensori1' => $data['num_difensori6'], 'totale_modificatore1' => $data['totale_modificatore6'], 'media_difensori1' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 6);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale6'], 'risultato2' => $punteggi['risultato6'], 'bonus_modificatore2' => $data['bonus6'], 'num_difensori2' => $data['num_difensori6'], 'totale_modificatore2' => $data['totale_modificatore6'], 'media_difensori2' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 7);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale7'], 'risultato1' => $punteggi['risultato7'], 'bonus_modificatore1' => $data['bonus7'], 'num_difensori1' => $data['num_difensori7'], 'totale_modificatore1' => $data['totale_modificatore7'], 'media_difensori1' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 7);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale7'], 'risultato2' => $punteggi['risultato7'], 'bonus_modificatore2' => $data['bonus7'], 'num_difensori2' => $data['num_difensori7'], 'totale_modificatore2' => $data['totale_modificatore7'], 'media_difensori2' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 8);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale8'], 'risultato1' => $punteggi['risultato8'], 'bonus_modificatore1' => $data['bonus8'], 'num_difensori1' => $data['num_difensori8'], 'totale_modificatore1' => $data['totale_modificatore8'], 'media_difensori1' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 8);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale8'], 'risultato2' => $punteggi['risultato8'], 'bonus_modificatore2' => $data['bonus8'], 'num_difensori2' => $data['num_difensori8'], 'totale_modificatore2' => $data['totale_modificatore8'], 'media_difensori2' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 9);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale9'], 'risultato1' => $punteggi['risultato9'], 'bonus_modificatore1' => $data['bonus9'], 'num_difensori1' => $data['num_difensori9'], 'totale_modificatore1' => $data['totale_modificatore9'], 'media_difensori1' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 9);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale9'], 'risultato2' => $punteggi['risultato9'], 'bonus_modificatore2' => $data['bonus9'], 'num_difensori2' => $data['num_difensori9'], 'totale_modificatore2' => $data['totale_modificatore9'], 'media_difensori2' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 10);
        $this->db->update('tb_supercoppa', array('punteggio1' => $data['totale10'], 'risultato1' => $punteggi['risultato10'], 'bonus_modificatore1' => $data['bonus10'], 'num_difensori1' => $data['num_difensori10'], 'totale_modificatore1' => $data['totale_modificatore10'], 'media_difensori1' => $data['media_difensori10']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 10);
        $this->db->update('tb_supercoppa', array('punteggio2' => $data['totale10'], 'risultato2' => $punteggi['risultato10'], 'bonus_modificatore2' => $data['bonus10'], 'num_difensori2' => $data['num_difensori10'], 'totale_modificatore2' => $data['totale_modificatore10'], 'media_difensori2' => $data['media_difensori10']));

        //Chiudo giornata SuperCoppa
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_supercoppa', array('giocata' => 1));
    }

    public function insertPunteggiCoppa($data, $punteggi) {
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 1);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale1'], 'risultato1' => $punteggi['risultato1'], 'bonus_modificatore1' => $data['bonus1'], 'num_difensori1' => $data['num_difensori1'], 'totale_modificatore1' => $data['totale_modificatore1'], 'media_difensori1' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 1);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale1'], 'risultato2' => $punteggi['risultato1'], 'bonus_modificatore2' => $data['bonus1'], 'num_difensori2' => $data['num_difensori1'], 'totale_modificatore2' => $data['totale_modificatore1'], 'media_difensori2' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 2);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale2'], 'risultato1' => $punteggi['risultato2'], 'bonus_modificatore1' => $data['bonus2'], 'num_difensori1' => $data['num_difensori2'], 'totale_modificatore1' => $data['totale_modificatore2'], 'media_difensori1' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 2);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale2'], 'risultato2' => $punteggi['risultato2'], 'bonus_modificatore2' => $data['bonus2'], 'num_difensori2' => $data['num_difensori2'], 'totale_modificatore2' => $data['totale_modificatore2'], 'media_difensori2' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 3);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale3'], 'risultato1' => $punteggi['risultato3'], 'bonus_modificatore1' => $data['bonus3'], 'num_difensori1' => $data['num_difensori3'], 'totale_modificatore1' => $data['totale_modificatore3'], 'media_difensori1' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 3);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale3'], 'risultato2' => $punteggi['risultato3'], 'bonus_modificatore2' => $data['bonus3'], 'num_difensori2' => $data['num_difensori3'], 'totale_modificatore2' => $data['totale_modificatore3'], 'media_difensori2' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 4);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale4'], 'risultato1' => $punteggi['risultato4'], 'bonus_modificatore1' => $data['bonus4'], 'num_difensori1' => $data['num_difensori4'], 'totale_modificatore1' => $data['totale_modificatore4'], 'media_difensori1' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 4);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale4'], 'risultato2' => $punteggi['risultato4'], 'bonus_modificatore2' => $data['bonus4'], 'num_difensori2' => $data['num_difensori4'], 'totale_modificatore2' => $data['totale_modificatore4'], 'media_difensori2' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 5);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale5'], 'risultato1' => $punteggi['risultato5'], 'bonus_modificatore1' => $data['bonus5'], 'num_difensori1' => $data['num_difensori5'], 'totale_modificatore1' => $data['totale_modificatore5'], 'media_difensori1' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 5);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale5'], 'risultato2' => $punteggi['risultato5'], 'bonus_modificatore2' => $data['bonus5'], 'num_difensori2' => $data['num_difensori5'], 'totale_modificatore2' => $data['totale_modificatore5'], 'media_difensori2' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 6);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale6'], 'risultato1' => $punteggi['risultato6'], 'bonus_modificatore1' => $data['bonus6'], 'num_difensori1' => $data['num_difensori6'], 'totale_modificatore1' => $data['totale_modificatore6'], 'media_difensori1' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 6);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale6'], 'risultato2' => $punteggi['risultato6'], 'bonus_modificatore2' => $data['bonus6'], 'num_difensori2' => $data['num_difensori6'], 'totale_modificatore2' => $data['totale_modificatore6'], 'media_difensori2' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 7);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale7'], 'risultato1' => $punteggi['risultato7'], 'bonus_modificatore1' => $data['bonus7'], 'num_difensori1' => $data['num_difensori7'], 'totale_modificatore1' => $data['totale_modificatore7'], 'media_difensori1' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 7);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale7'], 'risultato2' => $punteggi['risultato7'], 'bonus_modificatore2' => $data['bonus7'], 'num_difensori2' => $data['num_difensori7'], 'totale_modificatore2' => $data['totale_modificatore7'], 'media_difensori2' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 8);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale8'], 'risultato1' => $punteggi['risultato8'], 'bonus_modificatore1' => $data['bonus8'], 'num_difensori1' => $data['num_difensori8'], 'totale_modificatore1' => $data['totale_modificatore8'], 'media_difensori1' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 8);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale8'], 'risultato2' => $punteggi['risultato8'], 'bonus_modificatore2' => $data['bonus8'], 'num_difensori2' => $data['num_difensori8'], 'totale_modificatore2' => $data['totale_modificatore8'], 'media_difensori2' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 9);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale9'], 'risultato1' => $punteggi['risultato9'], 'bonus_modificatore1' => $data['bonus9'], 'num_difensori1' => $data['num_difensori9'], 'totale_modificatore1' => $data['totale_modificatore9'], 'media_difensori1' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 9);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale9'], 'risultato2' => $punteggi['risultato9'], 'bonus_modificatore2' => $data['bonus9'], 'num_difensori2' => $data['num_difensori9'], 'totale_modificatore2' => $data['totale_modificatore9'], 'media_difensori2' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 10);
        $this->db->update('tb_coppa', array('punteggio1' => $data['totale10'], 'risultato1' => $punteggi['risultato10'], 'bonus_modificatore1' => $data['bonus10'], 'num_difensori1' => $data['num_difensori10'], 'totale_modificatore1' => $data['totale_modificatore10'], 'media_difensori1' => $data['media_difensori10']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 10);
        $this->db->update('tb_coppa', array('punteggio2' => $data['totale10'], 'risultato2' => $punteggi['risultato10'], 'bonus_modificatore2' => $data['bonus10'], 'num_difensori2' => $data['num_difensori10'], 'totale_modificatore2' => $data['totale_modificatore10'], 'media_difensori2' => $data['media_difensori10']));

        //Chiudo giornata Coppa Treble
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_coppa', array('giocata' => 1));
    }

    public function insertPunteggiChampions($data, $punteggi) {
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 1);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale1'], 'risultato1' => $punteggi['risultato1'], 'bonus_modificatore1' => $data['bonus1'], 'num_difensori1' => $data['num_difensori1'], 'totale_modificatore1' => $data['totale_modificatore1'], 'media_difensori1' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 1);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale1'], 'risultato2' => $punteggi['risultato1'], 'bonus_modificatore2' => $data['bonus1'], 'num_difensori2' => $data['num_difensori1'], 'totale_modificatore2' => $data['totale_modificatore1'], 'media_difensori2' => $data['media_difensori1']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 2);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale2'], 'risultato1' => $punteggi['risultato2'], 'bonus_modificatore1' => $data['bonus2'], 'num_difensori1' => $data['num_difensori2'], 'totale_modificatore1' => $data['totale_modificatore2'], 'media_difensori1' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 2);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale2'], 'risultato2' => $punteggi['risultato2'], 'bonus_modificatore2' => $data['bonus2'], 'num_difensori2' => $data['num_difensori2'], 'totale_modificatore2' => $data['totale_modificatore2'], 'media_difensori2' => $data['media_difensori2']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 3);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale3'], 'risultato1' => $punteggi['risultato3'], 'bonus_modificatore1' => $data['bonus3'], 'num_difensori1' => $data['num_difensori3'], 'totale_modificatore1' => $data['totale_modificatore3'], 'media_difensori1' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 3);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale3'], 'risultato2' => $punteggi['risultato3'], 'bonus_modificatore2' => $data['bonus3'], 'num_difensori2' => $data['num_difensori3'], 'totale_modificatore2' => $data['totale_modificatore3'], 'media_difensori2' => $data['media_difensori3']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 4);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale4'], 'risultato1' => $punteggi['risultato4'], 'bonus_modificatore1' => $data['bonus4'], 'num_difensori1' => $data['num_difensori4'], 'totale_modificatore1' => $data['totale_modificatore4'], 'media_difensori1' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 4);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale4'], 'risultato2' => $punteggi['risultato4'], 'bonus_modificatore2' => $data['bonus4'], 'num_difensori2' => $data['num_difensori4'], 'totale_modificatore2' => $data['totale_modificatore4'], 'media_difensori2' => $data['media_difensori4']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 5);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale5'], 'risultato1' => $punteggi['risultato5'], 'bonus_modificatore1' => $data['bonus5'], 'num_difensori1' => $data['num_difensori5'], 'totale_modificatore1' => $data['totale_modificatore5'], 'media_difensori1' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 5);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale5'], 'risultato2' => $punteggi['risultato5'], 'bonus_modificatore2' => $data['bonus5'], 'num_difensori2' => $data['num_difensori5'], 'totale_modificatore2' => $data['totale_modificatore5'], 'media_difensori2' => $data['media_difensori5']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 6);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale6'], 'risultato1' => $punteggi['risultato6'], 'bonus_modificatore1' => $data['bonus6'], 'num_difensori1' => $data['num_difensori6'], 'totale_modificatore1' => $data['totale_modificatore6'], 'media_difensori1' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 6);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale6'], 'risultato2' => $punteggi['risultato6'], 'bonus_modificatore2' => $data['bonus6'], 'num_difensori2' => $data['num_difensori6'], 'totale_modificatore2' => $data['totale_modificatore6'], 'media_difensori2' => $data['media_difensori6']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 7);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale7'], 'risultato1' => $punteggi['risultato7'], 'bonus_modificatore1' => $data['bonus7'], 'num_difensori1' => $data['num_difensori7'], 'totale_modificatore1' => $data['totale_modificatore7'], 'media_difensori1' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 7);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale7'], 'risultato2' => $punteggi['risultato7'], 'bonus_modificatore2' => $data['bonus7'], 'num_difensori2' => $data['num_difensori7'], 'totale_modificatore2' => $data['totale_modificatore7'], 'media_difensori2' => $data['media_difensori7']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 8);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale8'], 'risultato1' => $punteggi['risultato8'], 'bonus_modificatore1' => $data['bonus8'], 'num_difensori1' => $data['num_difensori8'], 'totale_modificatore1' => $data['totale_modificatore8'], 'media_difensori1' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 8);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale8'], 'risultato2' => $punteggi['risultato8'], 'bonus_modificatore2' => $data['bonus8'], 'num_difensori2' => $data['num_difensori8'], 'totale_modificatore2' => $data['totale_modificatore8'], 'media_difensori2' => $data['media_difensori8']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 9);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale9'], 'risultato1' => $punteggi['risultato9'], 'bonus_modificatore1' => $data['bonus9'], 'num_difensori1' => $data['num_difensori9'], 'totale_modificatore1' => $data['totale_modificatore9'], 'media_difensori1' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 9);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale9'], 'risultato2' => $punteggi['risultato9'], 'bonus_modificatore2' => $data['bonus9'], 'num_difensori2' => $data['num_difensori9'], 'totale_modificatore2' => $data['totale_modificatore9'], 'media_difensori2' => $data['media_difensori9']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id1', 10);
        $this->db->update('tb_champions', array('punteggio1' => $data['totale10'], 'risultato1' => $punteggi['risultato10'], 'bonus_modificatore1' => $data['bonus10'], 'num_difensori1' => $data['num_difensori10'], 'totale_modificatore1' => $data['totale_modificatore10'], 'media_difensori1' => $data['media_difensori10']));

        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id2', 10);
        $this->db->update('tb_champions', array('punteggio2' => $data['totale10'], 'risultato2' => $punteggi['risultato10'], 'bonus_modificatore2' => $data['bonus10'], 'num_difensori2' => $data['num_difensori10'], 'totale_modificatore2' => $data['totale_modificatore10'], 'media_difensori2' => $data['media_difensori10']));

        //Chiudo giornata Champions
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->update('tb_champions', array('giocata' => 1));
    }

    public function getFantavotoP($id_giocatore) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti');

        return $this->db->get()->row('fantavoto');
    }

    public function getFantavotoPCoppa($id_giocatore) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti_coppa');

        return $this->db->get()->row('fantavoto');
    }

    public function getNomeRuolo($id_giocatore) {
        $this->db->select('ruolo');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');

        $ruolo = $this->db->get()->row('ruolo');
        switch ($ruolo) {
            case 1 : $ruolo = "P";
                break;
            case 2 : $ruolo = "D";
                break;
            case 3 : $ruolo = "C";
                break;
            case 4 : $ruolo = "A";
                break;
        }
        return $ruolo;
    }

    public function getRuolo($id_giocatore) {
        $this->db->select('ruolo');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');

        return $this->db->get()->row('ruolo');
    }

    public function getNomeGiocatore($id_giocatore) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        $cog = $this->db->get()->row('cognome');
        $this->db->select('*');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        $nom = $this->db->get()->row('nome');
        $nome = $cog . " " . $nom;

        return $nome;
    }

    public function getNome($id_giocatore) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        $nom = $this->db->get()->row('nome');

        return $nom;
    }

    public function getCognome($id_giocatore) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        $cog = $this->db->get()->row('cognome');

        return $cog;
    }

    public function getFV($id_giocatore, $giornata) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $giornata);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti');

        return $this->db->get()->row('fantavoto');
    }

    public function getVoto($id_giocatore, $giornata) {
        $this->db->select('voto');
        $this->db->where('giornata', $giornata);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti');

        return $this->db->get()->row('voto');
    }

    public function getVotoCoppa($id_giocatore, $giornata) {
        $this->db->select('voto');
        $this->db->where('giornata', $giornata);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti_coppa');

        return $this->db->get()->row('voto');
    }

    public function getFVCoppa($id_giocatore, $giornata) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $giornata);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_voti_coppa');

        return $this->db->get()->row('fantavoto');
    }

    public function getFantavotoS($id_giocatore) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('schierato', 1);
        $this->db->from('tb_voti');

        return $this->db->get()->row('fantavoto');
    }
    
    public function getVotoS($id_giocatore) {
        $this->db->select('voto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('schierato', 1);
        $this->db->from('tb_voti');

        return $this->db->get()->row('voto');
    }
    
    public function getVotoSCoppa($id_giocatore) {
        $this->db->select('voto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('schierato', 1);
        $this->db->from('tb_voti_coppa');

        return $this->db->get()->row('voto');
    }
    
    public function getTeamForResetRigori($id_utente) {
        $this->db->select('id_giocatore');
        $this->db->where('id_utente', $id_utente);
        $this->db->order_by('ruolo', 'DESC');
        $this->db->order_by('cognome');
        $this->db->from('tb_giocatori');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function getTrasferimentiSquadra($team, $asta) {
        $this->db->select('*');
        if ($team != 0){
            $this->db->where('id_squadra_partenza', $team);
            $this->db->or_where('id_squadra_arrivo', $team);
        }
        if ($asta == 0){
            $this->db->where('tipologia !=', "Asta Iniziale");
        }
        $this->db->order_by('id');
        $this->db->from('tb_trasferimenti');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function getTrasferimenti($mese) {
        $this->db->select('*');
        $this->db->where('data <', $mese);
        $this->db->order_by('id');
        $this->db->from('tb_trasferimenti');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getFantavotoSCoppa($id_giocatore) {
        $this->db->select('fantavoto');
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->where('schierato', 1);
        $this->db->from('tb_voti_coppa');

        return $this->db->get()->row('fantavoto');
    }

    public function getGiocatore($id_giocatore) {
        $this->db->select('*');
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->from('tb_giocatori');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateGiocatore($data) {
        $this->db->where('id_giocatore', $data['giocatore']);
        $this->db->update('tb_giocatori', array('nome' => $data['nome'], 'cognome' => $data['cognome'], 'squadra' => $data['squadra'], 'ruolo' => $data['ruolo']));

        return true;
    }

    public function updateVotoCampionato($data) {
        $this->db->where('id_giocatore', $data['giocatore']);
        $this->db->where('giornata', $data['giornata']);
        $this->db->update('tb_voti', array('voto' => $data['voto'], 'fantavoto' => $data['fanta_voto'], 'gol' => $data['gol'], 'assist' => $data['assist'], 'ammonizioni' => $data['ammonizioni'], 'espulsioni' => $data['espulsioni'], 'rigore_parato' => $data['rigore_parato'], 'rigore_sbagliato' => $data['rigore_sbagliato'], 'autogol' => $data['autogol'], 'gol_subiti' => $data['gol_subiti'], 'schierato' => $data['schierato']));
        
        $this->db->where('id_giocatore', $data['giocatore']);
        $this->db->where('giornata', $data['giornata']);
        $this->db->update('tb_voti_coppa', array('voto' => $data['voto'], 'fantavoto' => $data['fanta_voto'], 'gol' => $data['gol'], 'assist' => $data['assist'], 'ammonizioni' => $data['ammonizioni'], 'espulsioni' => $data['espulsioni'], 'rigore_parato' => $data['rigore_parato'], 'rigore_sbagliato' => $data['rigore_sbagliato'], 'autogol' => $data['autogol'], 'gol_subiti' => $data['gol_subiti'], 'schierato' => $data['schierato']));

        return true;
    }

    public function delFormazioneT($id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->delete('tb_formazionit');
    }

    public function delFormazioneTCoppa($id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->delete('tb_formazionit_coppa');
    }

    public function delOfferta($id_offerta) {
        $this->db->where('id_offerta', $id_offerta);
        $this->db->delete('tb_offerte');
    }

    public function closeOfferta($id_offerta) {
        $this->db->where('id_offerta', $id_offerta);
        $this->db->update('tb_offerte', array('attiva' => 0));

        return true;
    }

    public function delFormazioneP($id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->delete('tb_formazionip');
    }

    public function delFormazionePCoppa($id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->delete('tb_formazionip_coppa');
    }

    public function deleteRigoristi($giornata, $id_utente) {
        $this->db->where('id_utente', $id_utente);
        $this->db->where('giornata', $giornata);
        $this->db->delete('tb_rigoristi');
    }

    public function insertRigoristi($giornata, $id_utente, $id_giocatore, $ordine) {
        $this->db->insert('tb_rigoristi', array('giornata' => $giornata, 'id_utente' => $id_utente, 'id_giocatore' => $id_giocatore, 'ordine' => $ordine));
    }

    public function insertFormazioneT($id_utente, $id_giocatore, $ruolo) {
        $this->db->insert('tb_formazionit', array('id_utente' => $id_utente, 'id_giocatore' => $id_giocatore, 'ruolo' => $ruolo));
    }

    public function insertFormazioneTCoppa($id_utente, $id_giocatore, $ruolo) {
        $this->db->insert('tb_formazionit_coppa', array('id_utente' => $id_utente, 'id_giocatore' => $id_giocatore, 'ruolo' => $ruolo));
    }
    
    public function insertModuloTattico($id_utente, $giornata, $modulo) {
        $this->db->insert('tb_tattica_campionato', array('id_utente' => $id_utente, 'tattica' => $modulo, 'giornata' => $giornata));
    }
    
    public function deleteModuloTattico($id_utente, $giornata) {
        $this->db->where('id_utente', $id_utente);
        $this->db->where('giornata', $giornata);
        $this->db->delete('tb_tattica_campionato');
    }

    public function insertFormazioneP($dataP) {
        $this->db->insert('tb_formazionip', $dataP);
    }

    public function insertFormazionePCoppa($dataP) {
        $this->db->insert('tb_formazionip_coppa', $dataP);
    }

    public function getDettagliCampionatoTotaleModificatore($id_utente, $giornata, $chk) {
        if ($chk == 1) {

            $this->db->select('totale_modificatore1');
            $this->db->where('giornata', $giornata);
            $this->db->where('id1', $id_utente);
            $this->db->from('tb_calendario');

            $totale_modificatore = $this->db->get()->row('totale_modificatore1');
        } else {
            $this->db->select('totale_modificatore2');
            $this->db->where('giornata', $giornata);
            $this->db->where('id2', $id_utente);
            $this->db->from('tb_calendario');

            $totale_modificatore = $this->db->get()->row('totale_modificatore2');
        }

        return $totale_modificatore;
    }

    public function getDettagliCampionatoTotaleModificatoreCoppa($id_utente, $giornata, $chk, $competition) {
        if ($chk == 1) {

            $this->db->select('totale_modificatore1');
            $this->db->where('giornata', $giornata);
            $this->db->where('id1', $id_utente);

            //Switcho le tabelle in base alla competition
            if ($competition == "champions")
                $this->db->from('tb_champions');
            if ($competition == "coppa")
                $this->db->from('tb_coppa');
            if ($competition == "supercoppa")
                $this->db->from('tb_supercoppa');

            $totale_modificatore = $this->db->get()->row('totale_modificatore1');
        }
        else {
            $this->db->select('totale_modificatore2');
            $this->db->where('giornata', $giornata);
            $this->db->where('id2', $id_utente);

            //Switcho le tabelle in base alla competition
            if ($competition == "champions")
                $this->db->from('tb_champions');
            if ($competition == "coppa")
                $this->db->from('tb_coppa');
            if ($competition == "supercoppa")
                $this->db->from('tb_supercoppa');

            $totale_modificatore = $this->db->get()->row('totale_modificatore2');
        }

        return $totale_modificatore;
    }

    public function getNumeroDifensori($id_utente) {
        $query = $this->db->query('select count(*) from tb_formazionit where id_utente = ' . $id_utente . ' and ruolo = 2');

        return $query->row('count(*)');
    }

    public function getNumeroDifensoriCoppa($id_utente) {
        $query = $this->db->query('select count(*) from tb_formazionit_coppa where id_utente = ' . $id_utente . ' and ruolo = 2');

        return $query->row('count(*)');
    }

    public function getNumeroDifensoriSchieratiCoppa($id_utente, $giornata) {
        //Recupero la formazione schierata per la giornata e l'utente
        $query = $this->db->query('select T2 as id1, T3 as id2, T4 as id3, T5 as id4, T6 as id5, P3 as id6, P4 as id7, P5 as id8, P6 as id9, P7 as id10, P8 as id11, P9 as id12, P10 as id13, P11 as id14, P12 as id15, P13 as id16, P14 as id17 from tb_formazioni_schierate_coppa where id_utente = ' . $id_utente . ' and giornata = ' . $giornata . ';');
        $result = $query->result_array();

        $numero = 0;

        //Verifico per ogni id_giocatore che si tratti di un difensore, che sia schierato e li conto
        foreach ($result as $row) {
            for ($i = 1; $i <= 17; $i++) {
                $query2 = $this->db->query('select count(*) as num from tb_giocatori, tb_voti_coppa where tb_giocatori.id_giocatore = tb_voti_coppa.id_giocatore and tb_voti_coppa.giornata = ' . $giornata . ' and tb_voti_coppa.id_giocatore = ' . $row['id' . $i] . ' and ruolo = 2 and schierato = 1;');

                foreach ($query2->result_array() as $row2) {
                    $numero += $row2['num'];
                }
            }
        }

        return $numero;
    }

    public function getNumeroDifensoriSchierati($id_utente, $giornata) {
        //Recupero la formazione schierata per la giornata e l'utente
        $query = $this->db->query('select T2 as id1, T3 as id2, T4 as id3, T5 as id4, T6 as id5, P3 as id6, P4 as id7, P5 as id8, P6 as id9, P7 as id10, P8 as id11, P9 as id12, P10 as id13, P11 as id14, P12 as id15, P13 as id16, P14 as id17 from tb_formazioni_schierate where id_utente = ' . $id_utente . ' and giornata = ' . $giornata . ';');
        $result = $query->result_array();

        $numero = 0;

        //Verifico per ogni id_giocatore che si tratti di un difensore, che sia schierato e li conto
        foreach ($result as $row) {
            for ($i = 1; $i <= 17; $i++) {
                $query2 = $this->db->query('select count(*) as num from tb_giocatori, tb_voti where tb_giocatori.id_giocatore = tb_voti.id_giocatore and tb_voti.giornata = ' . $giornata . ' and tb_voti.id_giocatore = ' . $row['id' . $i] . ' and ruolo = 2 and schierato = 1;');

                foreach ($query2->result_array() as $row2) {
                    $numero += $row2['num'];
                }
            }
        }

        return $numero;
    }

    public function getMediaDifensoriSchieratiCoppa($id_utente, $giornata) {
        //Calcolo voto portiere
        $query = $this->db->query('select voto from tb_voti_coppa, tb_formazioni_schierate_coppa where tb_formazioni_schierate_coppa.giornata = tb_voti_coppa.giornata and tb_voti_coppa.id_giocatore = tb_formazioni_schierate_coppa.T1 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate_coppa.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere1 = $query->row('voto');
        if (is_array($voto_portiere1))
            $voto_portiere1 = "";
        else
            $voto_portiere1 = $voto_portiere1;

        $query = $this->db->query('select voto from tb_voti_coppa, tb_formazioni_schierate_coppa where tb_formazioni_schierate_coppa.giornata = tb_voti_coppa.giornata and tb_voti_coppa.id_giocatore = tb_formazioni_schierate_coppa.P1 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate_coppa.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere2 = $query->row('voto');
        if (is_array($voto_portiere2))
            $voto_portiere2 = "";
        else
            $voto_portiere2 = $voto_portiere2;

        $query = $this->db->query('select voto from tb_voti_coppa, tb_formazioni_schierate_coppa where tb_formazioni_schierate_coppa.giornata = tb_voti_coppa.giornata and tb_voti_coppa.id_giocatore = tb_formazioni_schierate_coppa.P2 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate_coppa.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere3 = $query->row('voto');
        if (is_array($voto_portiere3))
            $voto_portiere3 = 0;
        else
            $voto_portiere3 = $voto_portiere3;

        $totale_portieri = ($voto_portiere1 + $voto_portiere2 + $voto_portiere3);

        //Calcolo totale voti difensori
        $query = $this->db->query('select voto as somma from tb_voti_coppa, tb_formazioni_schierate_coppa, tb_giocatori where tb_formazioni_schierate_coppa.id_utente = tb_giocatori.id_utente and tb_voti_coppa.id_giocatore = tb_giocatori.id_giocatore and tb_formazioni_schierate_coppa.giornata = tb_voti_coppa.giornata and tb_giocatori.ruolo = 2 and tb_formazioni_schierate_coppa.id_utente = ' . $id_utente . ' and tb_formazioni_schierate_coppa.giornata = ' . $giornata . ' and schierato = 1 ORDER BY voto DESC LIMIT 3');

        $voto_difensori = 0;

        foreach ($query->result_array() as $row) {
            $voto_difensori += $row['somma'];
        }

        //$voto_difensori = $query->row('somma');
        if (is_array($voto_difensori))
            $totale_difensori = "";
        else
            $totale_difensori = $voto_difensori;

        $totale = (@$totale_portieri + @$totale_difensori);

        return $totale;
    }

    public function getMediaDifensoriSchierati($id_utente, $giornata) {
        //Calcolo voto portiere
        $query = $this->db->query('select voto from tb_voti, tb_formazioni_schierate where tb_formazioni_schierate.giornata = tb_voti.giornata and tb_voti.id_giocatore = tb_formazioni_schierate.T1 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere1 = $query->row('voto');
        if (is_array($voto_portiere1))
            $voto_portiere1 = 0;
        else
            $voto_portiere1 = $voto_portiere1;

        $query = $this->db->query('select voto from tb_voti, tb_formazioni_schierate where tb_formazioni_schierate.giornata = tb_voti.giornata and tb_voti.id_giocatore = tb_formazioni_schierate.P1 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere2 = $query->row('voto');
        if (is_array($voto_portiere2))
            $voto_portiere2 = 0;
        else
            $voto_portiere2 = $voto_portiere2;
        
        $query = $this->db->query('select voto from tb_voti, tb_formazioni_schierate where tb_formazioni_schierate.giornata = tb_voti.giornata and tb_voti.id_giocatore = tb_formazioni_schierate.P2 and id_utente = ' . $id_utente . ' and tb_formazioni_schierate.giornata = ' . $giornata . ' and schierato = 1;');
        $voto_portiere3 = $query->row('voto');
        if (is_array($voto_portiere3))
            $voto_portiere3 = 0;
        else
            $voto_portiere3 = $voto_portiere3;

        $totale_portieri = ($voto_portiere1 + $voto_portiere2 + $voto_portiere3);

        //Calcolo totale voti difensori
        $query = $this->db->query('select voto as somma from tb_voti, tb_formazioni_schierate, tb_giocatori where tb_formazioni_schierate.id_utente = tb_giocatori.id_utente and tb_voti.id_giocatore = tb_giocatori.id_giocatore and tb_formazioni_schierate.giornata = tb_voti.giornata and tb_giocatori.ruolo = 2 and tb_formazioni_schierate.id_utente = ' . $id_utente . ' and tb_formazioni_schierate.giornata = ' . $giornata . ' and schierato = 1 ORDER BY voto DESC LIMIT 3');

        $voto_difensori = 0;

        foreach ($query->result_array() as $row) {
            $voto_difensori += $row['somma'];
        }

        //$voto_difensori = $query->row('somma');
        if (is_array($voto_difensori))
            $totale_difensori = "";
        else
            $totale_difensori = $voto_difensori;

        $totale = (@$totale_portieri + @$totale_difensori);

        return $totale;
    }

    public function getMediaDifensoriCoppa($id_utente, $giornata) {
        //Calcolo voto portiere
        $query = $this->db->query('select voto from tb_voti_coppa, tb_formazionit_coppa where tb_voti_coppa.id_giocatore = tb_formazionit_coppa.id_giocatore and id_utente = ' . $id_utente . ' and ruolo = 1 and giornata = ' . $giornata . '');
        $voto_portiere = $query->row('voto');
        if (is_array($voto_portiere))
            $totale_voto = "";
        else
            $totale_voto = $voto_portiere;

        //Calcolo totale voti difensori
        $query = $this->db->query('select voto as somma from tb_voti_coppa, tb_formazionit_coppa where tb_voti_coppa.id_giocatore = tb_formazionit_coppa.id_giocatore and id_utente = ' . $id_utente . ' and ruolo = 2 and giornata = ' . $giornata . ' ORDER BY voto DESC LIMIT 3');

        $voto_difensori = 0;

        foreach ($query->result_array() as $row) {
            $voto_difensori += $row['somma'];
        }

        //$voto_difensori = $query->row('somma');
        if (is_array($voto_difensori))
            $totale_difensori = "";
        else
            $totale_difensori = $voto_difensori;

        $totale = (@$totale_voto + @$totale_difensori);

        return $totale;
    }

    public function getMediaDifensori($id_utente, $giornata) {
        //Calcolo voto portiere
        $query = $this->db->query('select voto from tb_voti, tb_formazionit where tb_voti.id_giocatore = tb_formazionit.id_giocatore and id_utente = ' . $id_utente . ' and ruolo = 1 and giornata = ' . $giornata . '');
        $voto_portiere = $query->row('voto');
        if (is_array($voto_portiere))
            $totale_voto = "";
        else
            $totale_voto = $voto_portiere;

        //Calcolo totale voti difensori
        $query = $this->db->query('select voto as somma from tb_voti, tb_formazionit where tb_voti.id_giocatore = tb_formazionit.id_giocatore and id_utente = ' . $id_utente . ' and ruolo = 2 and giornata = ' . $giornata . ' ORDER BY voto DESC LIMIT 3');

        $voto_difensori = 0;

        foreach ($query->result_array() as $row) {
            $voto_difensori += $row['somma'];
        }

        //$voto_difensori = $query->row('somma');
        if (is_array($voto_difensori))
            $totale_difensori = "";
        else
            $totale_difensori = $voto_difensori;

        $totale = (@$totale_voto + @$totale_difensori);

        return $totale;
    }

    //Qui gestisco i bonus relativi al modificatore della difesa
    public function getBonusModificatore($media) {

        switch ($media) {
            case ($media < 6):
                $bonus = 0;
                break;
            case ($media == 6 ):
                $bonus = 0.5;
                break;
            case ($media > 6 && $media <= 6.125 ):
                $bonus = 1;
                break;
            case ($media > 6.125 && $media <= 6.25 ):
                $bonus = 1.5;
                break;
            case ($media > 6.25 && $media <= 6.375 ):
                $bonus = 2;
                break;
            case ($media > 6.375 && $media <= 6.500 ):
                $bonus = 2.5;
                break;
            case ($media > 6.500 && $media <= 6.625 ):
                $bonus = 3;
                break;
            case ($media > 6.625 && $media <= 6.750 ):
                $bonus = 3.5;
                break;
            case ($media > 6.750 && $media <= 6.875 ):
                $bonus = 4;
                break;
            case ($media > 6.875 && $media <= 7 ):
                $bonus = 4.5;
                break;
            case ($media > 7 && $media <= 7.125 ):
                $bonus = 5;
                break;
            case ($media > 7.125 && $media <= 7.250 ):
                $bonus = 5.5;
                break;
            case ($media > 7.250 && $media <= 7.375 ):
                $bonus = 6;
                break;
            case ($media > 7.375 && $media <= 7.5 ):
                $bonus = 6.5;
                break;
            case ($media > 7.5 && $media <= 7.625 ):
                $bonus = 7;
                break;
            case ($media > 7.625 && $media <= 7.750 ):
                $bonus = 7.5;
                break;
            case ($media > 7.750 && $media <= 8 ):
                $bonus = 8;
                break;
            case ($media > 8 ):
                $bonus = 9;
                break;
        }

        return $bonus;
    }

    public function getFormazioneT() {
        $this->db->select('*');
        $this->db->from('tb_formazionit');
        $this->db->order_by('ruolo');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getFormazioneTUtente($id_utente) {
        $this->db->select('*');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_formazionit');
        $this->db->order_by('ruolo');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getFormazioneT_Coppa() {
        $this->db->select('*');
        $this->db->from('tb_formazionit_coppa');
        $this->db->order_by('ruolo');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getFormazionePUtente($id_utente) {
        $this->db->select('*');
        $this->db->where('id_utente', $id_utente);
        $this->db->from('tb_formazionip');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getFormazioneP() {
        $this->db->select('*');
        $this->db->from('tb_formazionip');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getFormazioneP_coppa() {
        $this->db->select('*');
        $this->db->from('tb_formazionip_coppa');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function attivaRigoristi($giornata, $competizione) {
        $this->db->where('giornata', $giornata);
        
        if ($competizione == "Campionato")
            $this->db->update('tb_calendario', array('rigoristi' => 1));
        
        if ($competizione == "Champions League")
            $this->db->update('tb_champions', array('rigoristi' => 1));
        
        if ($competizione == "Coppa Treble")
            $this->db->update('tb_coppa', array('rigoristi' => 1));
        
        if ($competizione == "SuperCoppa Treble")
            $this->db->update('tb_supercoppa', array('rigoristi' => 1));
        
        return true;
    }

    public function insertVoto($data) {
        $this->db->insert('tb_voti', $data);
        $this->db->insert('tb_voti_coppa', $data);
    }

    public function updateGiocatori($id_giocatore, $giornata) {
        $this->db->where('id_giocatore', $id_giocatore);
        $this->db->update('tb_giocatori', array('ultima_giornata' => $giornata));
    }

    public function updateTeam($squadra, $giocatore, $sostituto, $costo_uscente, $costo_entrante) {
        $this->db->where('id_giocatore', $giocatore);
        $this->db->update('tb_giocatori', array('id_utente' => 0));

        $this->db->where('id_giocatore', $sostituto);
        $this->db->update('tb_giocatori', array('id_utente' => $squadra));
        
        //Tengo traccia del trasferimento su tb_trasferimenti
        //Prima svincolo il giocatore uscente
        $this->db->insert('tb_trasferimenti', array('id_utente' => $squadra, 'id_giocatore' => $giocatore, 'data' => date("Y-m-d H:i:s"), 'tipologia' => 'Vendita', 'id_squadra_partenza' => $squadra, 'costo' => $costo_uscente));
        
        //Poi traccio l'acquisto e inserisco l'id di correlazione per capire che si tratta di un unico movimento di calciomercato
        $query = $this->db->query('SELECT id FROM tb_trasferimenti ORDER BY id DESC LIMIT 1');
        $last_id = $query->row('id');
        
        $this->db->insert('tb_trasferimenti', array('id_utente' => $squadra, 'id_giocatore' => $sostituto, 'data' => date("Y-m-d H:i:s"), 'tipologia' => 'Acquisto', 'id_squadra_arrivo' => $squadra, 'costo' => $costo_entrante, 'id_correlato' => $last_id));
        return true;
    }
    
    public function updateScambio($squadra1, $giocatore, $squadra2, $sostituto) {
        $this->db->where('id_giocatore', $giocatore);
        $this->db->update('tb_giocatori', array('id_utente' => $squadra2));

        $this->db->where('id_giocatore', $sostituto);
        $this->db->update('tb_giocatori', array('id_utente' => $squadra1));
        
        //Tengo traccia del trasferimento su tb_trasferimenti
        //Prima svincolo il giocatore uscente
        $this->db->insert('tb_trasferimenti', array('id_utente' => $squadra1, 'id_giocatore' => $giocatore, 'data' => date("Y-m-d H:i:s"), 'tipologia' => 'Scambio', 'id_squadra_partenza' => $squadra1, 'id_squadra_arrivo' => $squadra2));
        
        //Poi traccio l'acquisto e inserisco l'id di correlazione per capire che si tratta di un unico movimento di calciomercato
        $query = $this->db->query('SELECT id FROM tb_trasferimenti ORDER BY id DESC LIMIT 1');
        $last_id = $query->row('id');
        
        $this->db->insert('tb_trasferimenti', array('id_utente' => $squadra2, 'id_giocatore' => $sostituto, 'data' => date("Y-m-d H:i:s"), 'tipologia' => 'Scambio', 'id_squadra_partenza' => $squadra2, 'id_squadra_arrivo' => $squadra1, 'id_correlato' => $last_id));
        return true;
    }

    public function assegnaGiocatore($data, $costo) {
        $this->db->where('id_giocatore', $data['giocatore']);
        $this->db->update('tb_giocatori', array('id_utente' => $data['squadra']));
        
        //Tengo traccia dell'acquisto su tb_trasferimenti. Come tipologia mettiamo acquisto Asta
        $this->db->insert('tb_trasferimenti', array('id_utente' => $data['squadra'], 'id_giocatore' => $data['giocatore'], 'data' => date("Y-m-d H:i:s"), 'tipologia' => 'Asta Iniziale', 'id_squadra_arrivo' => $data['squadra'], 'costo' => $costo));
    }

    public function getCalendario1A() {
        $this->db->order_by('giornata');
        $query = $this->db->get('tb_calendario');
        return $query->result_array();
    }

    public function getGiornataGiocata() {
        $this->db->where('giornata', $_SESSION['giornata']);
        $query = $this->db->get('tb_calendario');
        return $query->result_array();
    }

    public function getCalendariogiornata($giornata) {
        $this->db->where('giornata', $giornata);
        $query = $this->db->get('tb_calendario');
        return $query->result_array();
    }

    public function getPartitegiocate() {
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'ASC');
        $query = $this->db->get('tb_calendario');
        return $query->result_array();
    }

    public function getPartitegiocateChampions() {
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'ASC');
        $query = $this->db->get('tb_champions');
        return $query->result_array();
    }

    public function getPartitegiocateCoppa() {
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'ASC');
        $query = $this->db->get('tb_coppa');
        return $query->result_array();
    }

    //Lista partite per pagina team
    public function getPartitegiocateSuperCoppa() {
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'ASC');
        $query = $this->db->get('tb_supercoppa');
        return $query->result_array();
    }

    //Prossime partite di campionato
    public function getProssimapartita() {
        $this->db->where('giocata', 0);
        $this->db->where('giornata', $_SESSION['giornata']);
        $this->db->limit(5);
        $query = $this->db->get('tb_calendario');
        return $query->result_array();
    }

    //Champions e Coppa

    public function getClassificaChampionsA() {
        //Prima aggiorno la tabella tb_classifica_championsA con il totale fantapunteggio
        //Seleziono le squadre del girone A
        $this->db->select('*');
        $this->db->from('tb_classifica_championsA');
        $this->db->order_by('id_squadra');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $totale = $this->getFantaPuntiTotaliChampionsAB($row['id_squadra']);

            $this->db->where('id_squadra', $row['id_squadra']);
            $this->db->update('tb_classifica_championsA', array('fanta_punteggio' => $totale));
        }
        
        $this->db->select('*');
        $this->db->select('(gol_fatti-gol_subiti) as DIFF');
        $this->db->from('tb_classifica_championsA');
        $this->db->order_by('punti', 'desc');
        $this->db->order_by('fanta_punteggio', 'desc');
        $this->db->order_by('DIFF', 'desc');
        $this->db->order_by('gol_fatti', 'desc');
        $this->db->order_by('id_squadra', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getClassificaChampionsB() {
        //Prima aggiorno la tabella tb_classifica_championsB con il totale fantapunteggio
        //Seleziono le squadre del girone B
        $this->db->select('*');
        $this->db->from('tb_classifica_championsB');
        $this->db->order_by('id_squadra');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $totale = $this->getFantaPuntiTotaliChampionsAB($row['id_squadra']);

            $this->db->where('id_squadra', $row['id_squadra']);
            $this->db->update('tb_classifica_championsB', array('fanta_punteggio' => $totale));
        }
        
        $this->db->select('*');
        $this->db->select('(gol_fatti-gol_subiti) as DIFF');
        $this->db->from('tb_classifica_championsB');
        $this->db->order_by('punti', 'desc');
        $this->db->order_by('fanta_punteggio', 'desc');
        $this->db->order_by('DIFF', 'desc');
        $this->db->order_by('gol_fatti', 'desc');
        $this->db->order_by('id_squadra', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function insertClassificaChampions($id_squadra, $data) {
        $query = $this->db->query("update tb_classifica_championsA set partite_giocate = (partite_giocate+1), punti = (punti+" . $data['punti'] . "), 
					 vittorie = (vittorie+" . $data['vittorie'] . "),pareggi = (pareggi+" . $data['pareggi'] . "), sconfitte = (sconfitte+" . $data['sconfitte'] . "), 
					 gol_fatti = (gol_fatti+" . $data['gol_fatti'] . "), gol_subiti = (gol_subiti+" . $data['gol_subiti'] . ") where id_squadra = " . $id_squadra . "");
        $query = $this->db->query("update tb_classifica_championsB set partite_giocate = (partite_giocate+1), punti = (punti+" . $data['punti'] . "), 
					 vittorie = (vittorie+" . $data['vittorie'] . "),pareggi = (pareggi+" . $data['pareggi'] . "), sconfitte = (sconfitte+" . $data['sconfitte'] . "), 
					 gol_fatti = (gol_fatti+" . $data['gol_fatti'] . "), gol_subiti = (gol_subiti+" . $data['gol_subiti'] . ") where id_squadra = " . $id_squadra . "");
        return true;
    }

    public function updateChampions($giornata, $T1, $T2, $P1, $P2, $G1, $G2) {
        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T1);
        $this->db->update('tb_champions', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T1);
        $this->db->update('tb_champions', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T2);
        $this->db->update('tb_champions', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T2);
        $this->db->update('tb_champions', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        return true;
    }

    public function updateCoppa($giornata, $T1, $T2, $P1, $P2, $G1, $G2) {
        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T1);
        $this->db->update('tb_coppa', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T1);
        $this->db->update('tb_coppa', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T2);
        $this->db->update('tb_coppa', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T2);
        $this->db->update('tb_coppa', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        return true;
    }

    public function updateSuperCoppa($giornata, $T1, $T2, $P1, $P2, $G1, $G2) {
        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T1);
        $this->db->update('tb_supercoppa', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T1);
        $this->db->update('tb_supercoppa', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id1', $T2);
        $this->db->update('tb_supercoppa', array('punteggio1' => $P1, 'risultato1' => $G1, 'giocata' => '1'));

        $this->db->where('giornata', $giornata);
        $this->db->where('id2', $T2);
        $this->db->update('tb_supercoppa', array('punteggio2' => $P2, 'risultato2' => $G2, 'giocata' => '1'));

        return true;
    }

    public function getCalendarioChampions() {
        $query = $this->db->get('tb_champions');
        return $query->result_array();
    }

    public function getCalendariogiornatacoppa($giornata) {
        $this->db->where('giornata', $giornata);
        $query = $this->db->get('tb_coppa');
        return $query->result_array();
    }

    public function getCalendariogiornatachampions($giornata) {
        $this->db->where('giornata', $giornata);
        $query = $this->db->get('tb_champions');
        return $query->result_array();
    }

    public function getCalendariogiornatasupercoppa($giornata) {
        $this->db->where('giornata', $giornata);
        $query = $this->db->get('tb_supercoppa');
        return $query->result_array();
    }

    public function getUltimaGiornataChampions($giornata) {
        $this->db->where('giornata <', $giornata);
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'desc');
        if ($giornata < 28)
            $this->db->limit(4);
        if ($giornata >= 29 && $giornata <= 30)
            $this->db->limit(2);
        if ($giornata > 30)
            $this->db->limit(1);
        $query = $this->db->get('tb_champions');

        return $query->result_array();
    }

    public function getUltimaGiornataCoppa($giornata) {
        $this->db->where('giornata <', $giornata);
        $this->db->where('giocata', 1);
        $this->db->order_by('giornata', 'desc');
        if ($giornata < 11)
            $this->db->limit(5);
        if ($giornata >= 11 && $giornata <= 15)
            $this->db->limit(4);
        if ($giornata > 15 && $giornata <= 26)
            $this->db->limit(2);
        if ($giornata > 26)
            $this->db->limit(1);
        $query = $this->db->get('tb_coppa');

        return $query->result_array();
    }

    public function getCalendariocoppa() {
        $query = $this->db->get('tb_coppa');

        return $query->result_array();
    }

    public function getCalendarioSupercoppa() {
        $query = $this->db->get('tb_supercoppa');

        return $query->result_array();
    }

    public function getProssimapartitacoppa() {
        $giornata = $_SESSION['giornata'];

        $this->db->where('giocata', 0);
        $this->db->where('giornata >=', $_SESSION['giornata']);
        //Nei preliminari limit 5 altrimenti limit 4
        if ($giornata > 7) {
            $this->db->limit(4);
        } else {
            $this->db->limit(5);
        }
        $this->db->order_by('giornata', 'asc');
        $query = $this->db->get('tb_coppa');

        return $query->result_array();
    }

    public function getProssimapartitachampions() {
        $this->db->where('giocata', 0);
        $this->db->where('giornata >=', $_SESSION['giornata']);
        $this->db->limit(4);
        $this->db->order_by('giornata', 'asc');
        $query = $this->db->get('tb_champions');

        return $query->result_array();
    }

}

?>