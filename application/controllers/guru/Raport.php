<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Raport extends CI_controller
{
    /**
     * Constructs a new instance.
     */
    function __construct()
    {
        parent::__construct();
        //login cek and authentication
        getAuthGuru();
        $this->load->helper('cektahun');
        $this->load->model("m_gtk");
    }

    public function index()
    {
        $id_tahun =  getIdTahun(getTahun());
        $nip = $this->session->userdata('username');
        $data['title'] = 'Naik Kelas';
        $data['kelas_pilih'] = $this->db->query("SELECT * FROM `guru_kelas` JOIN kelas ON kelas.id_kelas=guru_kelas.id_kelas JOIN tenaga_kependidikan AS gtk ON gtk.id_tenaga_kependidikan=guru_kelas.id_gtk WHERE gtk.nip = $nip")->result_array();
        // $data['kelas'] = $this->db->query("SELECT kelas.id_kelas, kelas.nama_kelas FROM `guru_kelas` JOIN tenaga_kependidikan AS gtk ON gtk.id_tenaga_kependidikan=guru_kelas.id_gtk JOIN kelas ON kelas.id_kelas=guru_kelas.id_kelas WHERE gtk.nip = $nip ")->result_array();
      //  $data['kelas'] =  $this->db->query("SELECT kelas.id_kelas, kelas.nama_kelas FROM `guru_mengajar` JOIN tenaga_kependidikan AS gtk ON gtk.id_tenaga_kependidikan=guru_mengajar.id_guru JOIN kelas ON kelas.id_kelas=guru_mengajar.id_kelas WHERE gtk.nip = $nip ")->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', ['id_tahun_ajaran' => getIdTahun(getTahun())])->row_array();

            $data['siswa'] = $this->m_gtk->getSiswaRaport($nip);


        getViews($data, 'v_guru/v_list_siswa_raport');
    }

    public function download($nisn){

        $data = [
            'siswa' => $this->db->query("SELECT * FROM `siswa` JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE siswa.nisn = $nisn")->row_array(),
            'id_tahun' => getIdTahun(getTahun()),
            'mapel' => $this->db->query("SELECT * FROM `mapel_kelas` JOIN siswa ON siswa.id_kelas=mapel_kelas.id_kelas JOIN mata_pelajaran AS mapel ON mapel.kode_mapel=mapel_kelas.kode_mapel WHERE siswa.nisn = $nisn")->result_array()
        ];

        $nama = $data['siswa']['nama_siswa'];
        $nisn = $data['siswa']['nisn'];
        $kelas = $data['siswa']['nama_kelas'];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "raport_".$nama."_".$nisn.".pdf";
        $this->pdf->load_view('v_guru/v_raport_siswa', $data);
    }

    public function test($nisn){
        $data = [
            'siswa' => $this->db->get_where('siswa', ['nisn' => $nisn])->result_array(),
            'id_tahun' => getIdTahun(getTahun()),
            'mapel' => $this->db->query("SELECT * FROM `mapel_kelas` JOIN siswa ON siswa.id_kelas=mapel_kelas.id_kelas JOIN mata_pelajaran AS mapel ON mapel.kode_mapel=mapel_kelas.kode_mapel WHERE siswa.nisn = $nisn")->result_array()
        ];

        getViews($data, 'v_guru/v_raport_siswa');
    }

}