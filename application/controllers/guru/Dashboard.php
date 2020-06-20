<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends CI_controller
{
    /**
     * Constructs a new instance.
     */
    function __construct()
    {
        parent::__construct();
        //login cek and authentication
        getAuthGuru();
        $this->load->model('m_gtk');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Guru';
        $data['total'] = $this->m_gtk->DashboardGuru();
        getViews($data, 'v_guru/dashboard');
    }

}
