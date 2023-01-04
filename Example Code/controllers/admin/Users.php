<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
    }

    public function index()
    {
        $data["users"] = $this->users_model->getAll();
        $this->load->view("admin/users/data_users", $data);
    }

    public function search()
    {
        $data["users"] = $this->users_model->getSearch();
        $this->load->view("admin/users/data_users", $data);
    }

    public function add()
    {
        $data["id_users"] = $this->users_model->getAllID();

        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('admin/users/new_users',$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/users');
       


        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["users"] = $users->getByID($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/users/edit_users", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->users_model->delete($id)) {
            redirect(site_url('admin/users'));
        }
    }

}
?>