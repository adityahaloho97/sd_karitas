<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Mengajar extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        //login cek and authentication
        getAuthAdmin();
        $this->load->model('m_admin');
        $this->load->model('m_gtk');
    }

    public function index(){
    	$data = [
            'title' => 'Daftar Guru Mengajar',
            'guru' => $this->m_gtk->getAllGuru(),
            'kelas' => $this->db->get('kelas')->result_array(),
            'mengajar' => $this->m_admin->getMengajar()
    	];

    	getViews($data,'v_admin/v_mengajar');
    }

    public function tambah(){

    	$this->form_validation->set_rules('guru', 'Guru', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('kelas', 'Nama Kelas', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim', ['required' => '{field} tidak boleh kosong']);

    	if ($this->form_validation->run() == FALSE) {
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
            redirect('admin/mengajar');
    	}else{
            $id_kelas = $this->input->post('kelas', true);
            $kode_mapel = $this->input->post('mapel', true);
            //cek data
            $cekData = $this->db->query("SELECT * FROM `guru_mengajar` WHERE `id_kelas` = $id_kelas AND `kode_mapel` = '$kode_mapel'")->num_rows();
            if ($cekData > 0) {
                $this->session->set_flashdata('msg_failed', 'Maaf, mapel dan kelas sudah diajar');
                    redirect('admin/mengajar');
            }else{
                $data = [
                    'id_guru' =>  $this->input->post('guru', true),
                    'id_kelas' => $this->input->post('kelas', true),
                    'kode_mapel' => $this->input->post('mapel', true)
                ];

                if (insertData('guru_mengajar', $data)) {
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                    redirect('admin/mengajar');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                    redirect('admin/mengajar');
                }
            }
    		
    	}
    }

    public function update(){
    	if (isset($_POST['id_get_update']) && !empty($_POST['id_get_update'])) {
    		$id = $_POST['id_get_update'];

    		$data = $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();

    		echo json_encode($data);
    	}

    	if (isset($_POST['simpan'])) {
    		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => '{field} tidak boleh kosong']);

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg_failed', 'Maaf, data kelas gagal diperbarui');
                redirect('admin/kelas');
            }else{
                $data = [
                    'nama_kelas' => $this->input->post('kelas', true)
                ];

                if ($this->db->update('kelas', $data, ['id_kelas' => $this->input->post('id')])) {
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil diperbarui');
                    redirect('admin/kelas');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                    redirect('admin/kelas');
                }
            }
    	}
    }

    public function delete($id){
    	$delete = $this->db->delete('guru_mengajar', ['id_guru_mengajar'=> $id]);

    	if ($delete) {
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil dihapus');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Selamat, data gagal dihapus');
    		http_response_code(404);
    	}
    }

    public function get_kelas(){
        if (isset($_POST['id_kelas'])) {
            $id_kelas = $_POST['id_kelas'];
            $data = $this->db->query("SELECT * FROM `mapel_kelas` JOIN mata_pelajaran ON mata_pelajaran.kode_mapel=mapel_kelas.kode_mapel WHERE mapel_kelas.id_kelas = $id_kelas")->result_array();

            echo json_encode($data);
        }
    }
}