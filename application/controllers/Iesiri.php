<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iesiri extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Iesiri_db'); ## incarca model-ul pt date din db.
    }
	public function index()
	{
        $data['controller'] = __CLASS__;
        $this->load->view('frame',$data);
        $this->load->view('iesiri');
        $this->load->view('footer');
    }
    public function getIesiri()
    {
        $post = $this->input->post();
        if(isset($post['start_date'])) {
            $sdate = new DateTime($post['start_date']);
            $edate = new DateTime($post['end_date']);
            $post['start_date'] = $sdate->format('Y-m-d');
            $post['end_date'] = $edate->format('Y-m-d');
        }
        
        echo json_encode($this->Iesiri_db->getIesiri($post)); ## returneaza rezultatul cu incarcari
    }
}