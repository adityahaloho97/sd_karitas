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
        getAuthAdmin();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['total'] = $this->m_admin->getTotal();
        getViews($data, 'v_admin/dashboard');
    }
    
}
