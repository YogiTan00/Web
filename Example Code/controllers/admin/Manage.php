<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("manage_model");
    }

    public function index()
    {
        $data["manage"] = $this->manage_model->getAll();
        $this->load->view("admin/manage/data_siswa", $data);
    }

    public function search()
    {
    	$data["manage"] = $this->manage_model->getSearch();
        $this->load->view("admin/manage/data_siswa", $data);
    }

    public function add()
    {
    	$manage = $this->manage_model;
        $validation = $this->form_validation;
        $validation->set_rules($manage->rules());

        if ($validation->run()) {
            $manage->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
    	$this->load->view('admin/manage/new_siswa');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/manage');
       
        $manage = $this->manage_model;
        $validation = $this->form_validation;
        $validation->set_rules($manage->rules());
        
        if ($validation->run()) {
            $manage->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["manage"] = $manage->getByID($id);
        if (!$data["manage"]) show_404();
        
        $this->load->view("admin/manage/edit_siswa", $data);
    }

  	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->manage_model->delete($id)) {
            redirect(site_url('admin/manage'));
        }
    }
}
?>