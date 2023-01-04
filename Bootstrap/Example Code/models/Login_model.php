<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_model extends CI_Model
{
    private $_table = "users";
    private $_table_data = "dt_siswa";

    public function doLogin(){
		$post = $this->input->post();
        
        // cari user berdasarkan id
        $user = $this->db->get_where($this->_table, ["id" => $post["id"]])->row();
        $kry = $this->db->get_where($this->_table_data, ["id" => $post["id"]])->row();

        $arrdata = array(
                    'id'       => $kry->id,
                    'photo'     => $kry->photo,
                    'fullname'  => $kry->fullname,
                    'level'     => $user->level
                );
                
        $this->session->set_userdata($arrdata);

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa level-nya
            $isAdmin   = $user->level == "Admin";
            $isSiswa  = $user->level == "Siswa";

            // jika password benar dan dia HR
            if($isPasswordTrue && $isAdmin){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);

                $this->_updateLastLogin($user->id);

                if(!empty($post["remember"])) {
                    setcookie ("loginID", $post["id"], time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("loginPass", $post["password"],  time()+ (10 * 365 * 24 * 60 * 60));
                } 
                else {
                    setcookie ("loginID",""); 
                    setcookie ("loginPass","");
                }
                return true;
            }

            if($isPasswordTrue && $isSiswa){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);

                $this->_updateLastLogin($user->id);

                if(!empty($post["remember"])) {
                    setcookie ("loginID", $post["id"], time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("loginPass", $post["password"],  time()+ (10 * 365 * 24 * 60 * 60));
                } 
                else {
                    setcookie ("loginID",""); 
                    setcookie ("loginPass","");
                }
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id){
        $sql = "UPDATE {$this->_table} SET last=now() WHERE id={$id}";
        $this->db->query($sql);
    }

}

?>