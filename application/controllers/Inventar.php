<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventar extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Inventar_db'); ## incarca model-ul pt date din db.
    }
	public function index()
	{
        $data['controller'] = __CLASS__;
        $this->load->view('frame',$data);
        $this->load->view('inventar');
        $this->load->view('footer');
    }

    public function getInventar()
    {
        $post = $this->input->post();       
        echo json_encode($this->Inventar_db->getInventar($post)); ## returneaza rezultatul cu inventar
    }

    public function getMijloaceTransport()
    {
        echo json_encode($this->Inventar_db->getMijloaceTransport()); 
    }
}