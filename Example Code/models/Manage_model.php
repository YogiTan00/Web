<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_model extends CI_Model
{
    private $_table = "dt_siswa";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getSearch()
    {
        $keyword = $this->input->get('keyword');

        $this->db->like('id', $keyword);
        $this->db->or_like('fullname', $keyword);
        
        return $this->db->get($this->_table)->result();
    }

    public function rules()
    {
        return [
            ['field' => 'id',
            'label' => 'id',
            'rules' => 'required'],

            ['field' => 'fullname',
            'label' => 'Full Name',
            'rules' => 'required'],
            

            ['field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required'],

        ];
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id          = $post["id"];
        $this->photo        = $this->_uploadPhoto();
        $this->fullname     = $post["fullname"];
        $this->gender       = $post["gender"];
        $this->religion     = $post["religion"];
        $this->address      = $post["address"];
        $this->phone        = $post["phone"];
        $this->active       = $post["active"];
        return $this->db->insert($this->_table, $this);
    }
 
    private function _uploadPhoto()
    {
        $config['upload_path']          = './img/sekolah/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->input->post('id');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        
        return "no_image.png";
    }

    public function update()
    {
        $post = $this->input->post();

        if (!empty($_FILES["photo"]["name"])) 
        {
            $this-> _deletePhoto($this->input->post('id'));
            $this->photo = $this->_uploadPhoto();
        } 
        else 
        {
            $this->photo = $post["old_image"];
        }
        $this->fullname     = $post["fullname"];
        $this->gender       = $post["gender"];
        $this->religion     = $post["religion"];
        $this->address      = $post["address"];
        $this->phone        = $post["phone"];

        return $this->db->update($this->_table, $this, array('id' => $this->input->post('id')));
    }

    private function _deletePhoto($id)
    {
        $manage = $this->getByID($id);
        if ($manage->photo != "no_image.png") {
            $filename = explode(".", $manage->photo)[0];
            return array_map('unlink', glob(FCPATH."img/sekolah/$filename.*"));
        }
    }

    public function delete($id)
    {
        $this-> _deletePhoto($id);
        return $this->db->delete($this->_table, array("id" => $id));
    }
         
}
?>