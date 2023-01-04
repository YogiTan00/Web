<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("info_model");
    }

    public function index()
    {
        $data["info"] = $this->info_model->getAll();
        $this->load->view("siswa/info/data_newsinfo", $data);
    }

    public function search()
    {
    	$data["info"] = $this->info_model->getSearch();
        $this->load->view("siswa/info/data_newsinfo", $data);
    }


  	public function delete($pt=null)
    {
        if (!isset($pt)) show_404();
        
        if ($this->info_model->delete($pt)) {
            redirect(site_url('siswa/info'));
        }
    }
}
?>