<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_auth extends CI_Model
{

    public function cekUserAdmin($email){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $email);
        return $this->db->get()->row_array();
    }

    public function cekUserGuru($email){
        return $this->db->query("SELECT * FROM `tenaga_kependidikan` WHERE `nip` = $email AND (`hak_akses` = 'guru' OR `hak_akses` = 'wali kelas')")->row_array();
    }

    public function cekUserPegawai($email){
        $this->db->select('*');
        $this->db->from('tenaga_kependidikan');
        $this->db->where('nip', $email);
        $this->db->where('hak_akses', 'pegawai');
        return $this->db->get()->row_array();
    }

    public function updateStatus($id, $status){
    	//update login status
        $this->db->set('login_status', $status);
        $this->db->where('id_pengguna',$id);
        return $this->db->update('pengguna');
    }
}