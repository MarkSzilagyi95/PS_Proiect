<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intrari extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Intrari_db'); ## incarca model-ul pt date din db.
    }
	public function index($page = 'adaugare')
	{
        $data['controller'] = 'intrari_' . $page;
        $this->load->view('frame',$data);
        $this->load->view('intrari_' . $page);
        $this->load->view('footer');
    }
    
    public function getIntrari()
    {
        $post = $this->input->post();
        if(isset($post['start_date'])) {
            $sdate = new DateTime($post['start_date']);
            $edate = new DateTime($post['end_date']);
            $post['start_date'] = $sdate->format('Y-m-d');
            $post['end_date'] = $edate->format('Y-m-d');
        }
        echo json_encode($this->Intrari_db->getIntrari($post)); ## returneaza rezultatul cu incarcari
    }

    public function adu_list_produse_si_ambalaje()
    {
        echo json_encode($this->Intrari_db->adu_list_produse_si_ambalaje($this->input->post()['cautare'])); 
    }

    public function adaugaIntrare()
    {
        echo json_encode($this->Intrari_db->adaugaIntrare($this->input->post())); 
    }
    
}