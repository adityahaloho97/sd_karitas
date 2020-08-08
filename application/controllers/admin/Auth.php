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

    public function login()
    {
        $this->form_validation->set_rules('username', 'Email Atau Username', 'required|trim', ['required' => 'Maaf, Email belum diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Maaf, Password belum diisi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_admin/v_login');
        } else {
            //cek data for admin
            $user = $this->m_auth->cekUserAdmin($this->input->post('username','password', TRUE));
            
            if (!empty($user)) {
                /*if (email_verify($this->input->post('username'), $user['username'])) {

                }
                */
                if (password_verify($this->input->post('password'), $user['password'])) {
                    $data = [
                        'is_login' => 'mangga',
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'nama_role' => 'Admin',
                        'foto' => $user['foto'],
                        'role' => 1
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil login');
                    redirect('admin/dashboard');
              /*  { else }
                    $this->session->set_flashdata('msg_failed','Ups!, Email atu Username anda salah!');redirect('admin');*/    
                } else {
                    $this->session->set_flashdata('msg_failed', 'Ups!, Password anda salah!');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('msg_failed', 'Ups!, Akun anda belum terdaftar!');
                redirect('admin');
            }
        }
    }
}
