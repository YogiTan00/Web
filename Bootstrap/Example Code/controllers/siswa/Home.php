<?php

class Home extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("login_model");
		if($this->login_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
        // load view siswa/home.php
        $this->load->view("siswa/home");
	}
}