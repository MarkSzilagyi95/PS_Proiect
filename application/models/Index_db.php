<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Index_db extends CI_Model {

    public function __construct()
    {
        parent::__construct();        
    }

    public function gettranzactii($post)
    {
        $this->db
            ->Select('transport.denumire, transport.capacitate, 
                    count(box.id) cantitate_incarcat, tranzactii.created_at')
            ->from('transport')
            ->join('tranzactii','tranzactii.transport_id = transport.id')
            ->join('box','box.id = tranzactii.box_id')
            ->group_by('tranzactii.transport_id, tranzactii.created_at')
            ->order_by('tranzactii.created_at desc, tranzactii.transport_id desc');

        if(isset($post['mijloc_transport']) && $post['mijloc_transport'] != 'any') {
            $this->db->where('transport.denumire',$post['mijloc_transport']);
        }
        if(isset($post['status_tranzactii'])) {
            switch($post['status_tranzactii']) {
                case 'Incarcat': {
                    $this->db->having('cantitate_incarcat >= transport.capacitate');
                    break;
                }
                case 'Partial': {
                    $this->db->having('cantitate_incarcat < transport.capacitate');
                    $this->db->having('cantitate_incarcat > 0');
                    break;
                }
                case 'Gol': {
                    $this->db->having('cantitate_incarcat','0');
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

    public function getMijloaceDeTransport()
    {
        return $this->db->Select('transport.denumire')->get('transport')->result_array();
    }
}