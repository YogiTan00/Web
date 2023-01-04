<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $_table_data = "dt_siswa";

    public function getByid()
    {   
        $id = $_SESSION['id'];
        return $this->db->get_where($this->_table_data, ["id" => $id])->row();
    }
}
?>