<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Iesiri_db extends CI_Model {

    public function __construct()
    {
        parent::__construct();        
    }

    public function getIesiri($post)
    {
        $this->db
            ->Select('
                produs.denumire as produs_nume,
                count(box.id) as produse_iesite,
                ambalaj.denumire as ambalaj_nume,
                tranzactii.created_at')
            ->from('tranzactii')
            ->join('box','box.id = tranzactii.box_id')
            ->join('ambalaj','ambalaj.id = box.ambalaj_id')
            ->join('produs','produs.id = box.produs_id')
            ->group_by('box.id, tranzactii.created_at')
            ->order_by('tranzactii.created_at desc');


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
        
        if(isset($post['start_date'])) {
            $this->db->where('tranzactii.created_at >=',$post['start_date']);
            $this->db->where('tranzactii.created_at <=',$post['end_date']);
        }
        return $this->db->get()->result_array();
    }

    // public function getMijloaceDeTransport()
    // {
    //     return $this->db->Select('transport.denumire')->get('transport')->result_array();
    // }
}