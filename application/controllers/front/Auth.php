<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function logout()
    {
        //set redirect
        if ($this->session->userdata('role') == 1) {
           $direct = 'admin';
        }elseif ($this->session->userdata('role') == 2) {
            $direct = 'guru';
        }else{
            $direct = 'pegawai';
        }


        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('nama_role');
        $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil logout');
        redirect($direct);
    }

    public function logout_sistem()
    {

        //update login status
            $this->session->unset_userdata('is_login');
            $this->session->unset_userdata('nama');
            $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil logout');
            redirect('?p=login');
    }
}
