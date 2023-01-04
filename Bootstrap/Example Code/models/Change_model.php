<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Change_model extends CI_Model
{
	private $_table = "users";
	
    public function getByID()
    {   
        $id = $_SESSION['id'];
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function rules()
    {
        return [
            ['field' => 'new_pass',
            'label' => 'New Password',
            'rules' => 'required'],
            
            ['field' => 'confirm_pass',
            'label' => 'Confirm Password',
            'rules' => 'required']
        ];
    }

    public function update()
    {
        $post = $this->input->post();
        
        $pass 		= $post["new_pass"];
        $confirm 	= $post["confirm_pass"];
        
        if($pass==$confirm)
        {
        	$this->password   = password_hash($post["confirm_pass"], PASSWORD_DEFAULT);	
        	return $this->db->update($this->_table, $this, array('id' => $this->input->post('id')));
        }
        
    }
}
?>