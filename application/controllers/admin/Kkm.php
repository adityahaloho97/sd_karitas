<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Kkm extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        //login cek and authentication
        getAuthAdmin();
        $this->load->model('m_admin');
        $this->load->helper('cektahun');
    }

    public function index(){
        $id_tahun = getIdtahun(getTahun());
    	$data = [
            'title' => 'Daftar KKM',
            'mapel' => $this->db->get('mata_pelajaran')->result_array(),
            'kelas' => $this->db->get('kelas')->result_array(),
            'kkm' => $this->db->query("SELECT * FROM `kkm_mapel` JOIN kelas ON kelas.id_kelas=kkm_mapel.id_kelas JOIN mata_pelajaran AS mapel ON mapel.kode_mapel=kkm_mapel.kode_mapel WHERE kkm_mapel.id_tahun_pelajaran = $id_tahun")->result_array()
    	];

    	getViews($data,'v_admin/v_kkm');
    }

    public function tambah(){
        if(isset($_POST['simpan'])){
            $this->form_validation->set_rules('mapel', 'Nama mapel', 'required', ['required' => '{field} tidak boleh kososng!']);
            $this->form_validation->set_rules('kelas', 'Kelas', 'required', ['required' => '{field} tidak boleh kososng!']);
            $this->form_validation->set_rules('kkm', 'KKM', 'required', ['required' => '{field} tidak boleh kososng!']);

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('admin/kkm');
            }else{
                $data = [
                    'kkm' => $this->input->post('kkm'),
                    'kode_mapel' => $this->input->post('mapel'),
                    'id_kelas' => $this->input->post('kelas'),
                    'id_tahun_pelajaran' => getIdTahun(getTahun())
                ];

                if($this->db->insert('kkm_mapel', $data)){
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                    redirect('admin/kkm');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                    redirect('admin/kkm');
                }
            }
        }
    }

    public function delete($id){
        $delete = $this->db->delete('kkm_mapel', ['id_kkm'=> $id]);

    	if ($delete) {
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil dihapus');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Selamat, data gagal dihapus');
    		http_response_code(404);
    	}
    }

    public function get_mapel(){
        if(isset($_POST['id_kelas'])){
            $id_kelas = $_POST['id_kelas'];

            $data = $this->db->query("SELECT * FROM `mapel_kelas` JOIN mata_pelajaran AS mapel ON mapel.kode_mapel=mapel_kelas.kode_mapel WHERE id_kelas = $id_kelas")->result_array();

            echo json_encode($data);
        }
    }
}