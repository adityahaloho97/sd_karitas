<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class M_gtk extends CI_Model
{ 
	public function getAllGtk(){
        return $this->db->get('tenaga_kependidikan')->result_array();
    }

    public function ambilKelasSiswa($nisn){
        //kelas sekarang
        $kelas_sekarang = $this->db->query("SELECT `id_kelas` FROM `siswa` WHERE `nisn` = $nisn")->row_array();

        //riwayat kelas 
        $riwayat = $this->db->query("SELECT GROUP_CONCAT(id_kelas) AS kelas FROM `riwayat_kelas` WHERE `nisn` = $nisn");
        $kelas_riwayat = $riwayat->row_array();
        $kelas_riwayat = $kelas_riwayat['kelas'];

        if($riwayat->num_rows() > 0){
           $kelas = explode(',', $kelas_riwayat);

           array_push($kelas, $kelas_sekarang['id_kelas']);
        }else{
            $kelas = array_push($kelas_sekarang, $kelas_riwayat);
        }

        return array_filter($kelas);
    }

    public function DashboardGuru(){
        $siswa = $this->db->query("SELECT * FROM siswa JOIN pendaftaran ON pendaftaran.nisn=siswa.nisn WHERE pendaftaran.status = 'terima'")->num_rows();
        $kelas = $this->db->get('kelas')->num_rows();
        $mapel = $this->db->get('mata_pelajaran')->num_rows();

        return [$siswa, $kelas, $mapel];
    }

    public function getGender(){
		$cowok = $this->db->get_where('siswa', ['jenis_kelamin' => 'L'])->num_rows();
		$cewek = $this->db->get_where('siswa', ['jenis_kelamin' => 'P'])->num_rows();

		return [$cowok, $cewek];
    }
    
    public function chartStatus(){
		$mendaftar = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.nisn=pendaftaran.nisn")->num_rows();

		$terima = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.nisn=pendaftaran.nisn WHERE pendaftaran.status = 'terima'")->num_rows();

		$belum = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.nisn=pendaftaran.nisn WHERE pendaftaran.status = 'menunggu'")->num_rows();

		$tidak = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.nisn=pendaftaran.nisn WHERE pendaftaran.status = 'tolak'")->num_rows();

		return [$mendaftar, $terima, $belum, $tidak];
	}
}
