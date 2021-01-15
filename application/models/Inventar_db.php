<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inventar_db extends CI_Model {

    public function __construct()
    {
        parent::__construct();        
    }

    public function getInventar($post)
    {
        $query = $this->db->query("
        with intrari_total as (
            select 
                i.produs_id ,
                i.ambalaj_id ,
                sum(cantitate) cantitate_inventar
            from intrari i
            group by produs_id, ambalaj_id 
            )
            select 
                tranzactii_agregat.produs_id,
                produs.denumire as nume_produs,
                tranzactii_agregat.ambalaj_id,
                ambalaj.denumire as nume_ambalaj,
                tranzactii_agregat.total_iesiri,
                IFNULL(it_produs.cantitate_inventar,0) - tranzactii_agregat.total_iesiri as cantitate_inventar_produs,
                IFNULL(it_ambalaj.cantitate_inventar,0) - tranzactii_agregat.total_iesiri as cantitate_inventar_ambalaj
            from (
                select 
                    b.produs_id ,
                    b.ambalaj_id ,
                    count(b.produs_id) total_iesiri
                from tranzactii t 
                join box b on b.id = t.box_id
                group by b.produs_id 
            ) as tranzactii_agregat
            left join intrari_total it_produs on it_produs.produs_id = tranzactii_agregat.produs_id
            left join intrari_total it_ambalaj on it_ambalaj.ambalaj_id = tranzactii_agregat.ambalaj_id
            right join produs  on tranzactii_agregat.produs_id = produs.id 
            right join ambalaj  on tranzactii_agregat.ambalaj_id = ambalaj.id 
        ");


        if(isset($post['iesire_dupa'])) {
            switch($post['iesire_dupa']) {
                case 'Produse': {
                    $this->db->order_by('produs.denumire asc');
                    break;
                }
                case 'Ambalaje': {
                    $this->db->order_by('ambalaj.denumire asc');
                    break;
                }
            }               
        }
        
        return $query->result_array();
    }

    public function getMijloaceTransport()
    {
        return $this->db->Select('denumire, capacitate,updated_at')->from('transport')
                ->order_by('capacitate DESC')->get()->result_array();
    }
}