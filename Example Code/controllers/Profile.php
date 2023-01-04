<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("profile_model");
    }

    public function index()
    {
        $data["profile"] = $this->profile_model->getByID();
        $this->load->view("profile_page", $data);
    }
}
?>