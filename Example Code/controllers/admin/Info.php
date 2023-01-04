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
        $this->load->view("admin/info/data_newsinfo", $data);
    }

    public function search()
    {
    	$data["info"] = $this->info_model->getSearch();
        $this->load->view("admin/info/data_newsinfo", $data);
    }

    public function add()
    {
    	$info = $this->info_model;
        $validation = $this->form_validation;
        $validation->set_rules($info->rules());

        if ($validation->run()) {
            $info->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
    	$this->load->view('admin/info/new_newsinfo');
    }

    public function edit($pt = null)
    {
        if (!isset($pt)) redirect('admin/info');
       
        $info = $this->info_model;
        $validation = $this->form_validation;
        $validation->set_rules($info->rules());
        
        if ($validation->run()) {
            $info->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["info"] = $info->getByID($pt);
        if (!$data["info"]) show_404();
        
        $this->load->view("admin/info/edit_newsinfo", $data);
    }

  	public function delete($pt=null)
    {
        if (!isset($pt)) show_404();
        
        if ($this->info_model->delete($pt)) {
            redirect(site_url('admin/info'));
        }
    }
}
?>