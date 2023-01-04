<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	private $_table = "users";
	private $_table_sekolah = "dt_siswa";

    public function getAll()
    {
        $this->db->select('users.*, dt_siswa.active');
        $this->db->from('users');
        $this->db->join('dt_siswa', 'users.id = dt_siswa.id');
        return $this->db->get()->result();
    }

    public function getAllID()
    {
        return $this->db->get_where($this->_table_sekolah, ["active" => 0])->result();
    }

    public function getByid($id)
    {
        $this->db->select('users.*, dt_siswa.active');
        $this->db->from('users');
        $this->db->join('dt_siswa', 'users.id = dt_siswa.id');
        $this->db->where('users.id', $id);
        return $this->db->get()->row();
    }
    
    public function getSearch()
    {
        $keyword = $this->input->get('keyword');

        $this->db->select('users.*, dt_siswa.active');
        $this->db->from('users');
        $this->db->join('dt_siswa', 'users.id = dt_siswa.id');
        $this->db->like('users.id', $keyword);
        
        return $this->db->get()->result();
    }

    public function rules()
    {
        return [
            ['field' => 'id',
            'label' => 'id',
            'rules' => 'required'],
            
            ['field' => 'level',
            'label' => 'Level',
            'rules' => 'required']
        ];
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id          = $post["id"];
        $this->password     = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->level 	    = $post["level"];

		$this->db->update($this->_table_sekolah, array('active'=>1), array('id' => $this->input->post('id')));
 		 		
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->level     	= $post["level"];

        $this->db->update($this->_table_sekolah, array('active'=>$this->input->post('active')), 
        	array('id' => $this->input->post('id')));

        return $this->db->update($this->_table, $this, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        $this->db->update($this->_table_sekolah, array('active'=>0), array('id' => $id));
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
?>