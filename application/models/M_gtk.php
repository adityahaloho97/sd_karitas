<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class M_gtk extends CI_Model
{ 
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('cektahun');
    }
	public function getAllGtk(){
        return $this->db->get('tenaga_kependidikan')->result_array();
    }

    public function getAllGuru(){
        $this->db->select('*');
        $this->db->from('tenaga_kependidikan');
        $this->db->where('hak_akses', 'guru');
        $this->db->or_where('hak_akses', 'wali kelas');
        return $this->db->get()->result_array();
    }

    public function getAllPegawai(){
        return $this->db->get_where('tenaga_kependidikan', ['hak_akses' => 'pegawai'])->result_array();
    }

    public function ambilKelasSiswa($nisn){
        //kelas sekarang
        $kelas_sekarang = $this->db->query("SELECT `id_kelas` FROM `siswa` WHERE `id_siswa` = $nisn")->row_array();

        //riwayat kelas 
        $riwayat = $this->db->query("SELECT GROUP_CONCAT(id_kelas) AS kelas FROM `riwayat_kelas` WHERE `id_siswa` = $nisn");
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
        $siswa = $this->db->query("SELECT * FROM siswa JOIN pendaftaran ON pendaftaran.id_siswa=siswa.id_siswa WHERE pendaftaran.status = 'terima'")->num_rows();
        $kelas = $this->db->get('kelas')->num_rows();
        $mapel = $this->db->get('mata_pelajaran')->num_rows();

        return [$siswa, $kelas, $mapel];
    }

    public function getGender(){
        $id_tahun = getIdTahun(getTahun());
        $cowok = $this->db->query("SELECT * FROM `siswa` JOIN pendaftaran ON pendaftaran.id_siswa=siswa.id_siswa WHERE pendaftaran.id_tahun_ajaran = $id_tahun AND siswa.jenis_kelamin = 'L'")->num_rows();
		
		$cewek = $this->db->query("SELECT * FROM `siswa` JOIN pendaftaran ON pendaftaran.id_siswa=siswa.id_siswa WHERE pendaftaran.id_tahun_ajaran = $id_tahun AND siswa.jenis_kelamin = 'P'")->num_rows();

		return [$cowok, $cewek];
    }
    
    public function chartStatus(){
        $id_tahun = getIdTahun(getTahun());

		$mendaftar = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.id_siswa=pendaftaran.id_siswa WHERE pendaftaran.id_tahun_ajaran = $id_tahun")->num_rows();

		$terima = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.id_siswa=pendaftaran.id_siswa WHERE pendaftaran.status = 'terima' AND pendaftaran.id_tahun_ajaran = $id_tahun")->num_rows();

		$belum = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.id_siswa=pendaftaran.id_siswa WHERE pendaftaran.status = 'menunggu' AND pendaftaran.id_tahun_ajaran = $id_tahun")->num_rows();

		$tidak = $this->db->query("SELECT * FROM `pendaftaran` JOIN siswa ON siswa.id_siswa=pendaftaran.id_siswa WHERE pendaftaran.status = 'tolak' AND pendaftaran.id_tahun_ajaran = $id_tahun")->num_rows();

		return [$mendaftar, $terima, $belum, $tidak];
    }
    
    public function getSiswaNaikKelas($kelas){
        $siswa = $this->db->query("SELECT * FROM `siswa` JOIN pendaftaran ON pendaftaran.id_siswa=siswa.id_siswa WHERE `id_kelas` = $kelas AND pendaftaran.status='terima'")->result_array();

        if(!empty($siswa)){
            foreach($siswa AS $s){
                //get mapel kelas
                $mapel_kelas = $this->db->get_where("mapel_kelas", ['id_kelas' => $kelas])->result_array();

                foreach($mapel_kelas AS $malas){
                    //hitung rata - rata
                    $kode = $malas['kode_mapel'];
                    $nilai_total = $this->db->query("SELECT `nilai_total` FROM `nilai` WHERE `id_kelas` = $kelas AND `kode_mapel` = '$kode' AND id_siswa =".$s['id_siswa'])->row_array();
                    if(!empty($nilai_total)){
                        $nilai_total = $nilai_total['nilai_total'];
                    }else{
                        $nilai_total = false;
                    }
                }

                $data[] = [
                    'nama' => $s['nama_siswa'],
                    'nisn' => $s['nisn'],
                    'id_siswa' => $s['id_siswa'],
                    'kelamin' => $s['jenis_kelamin'],
                    'rata' => $nilai_total
                ];
            }
        }else{
            $data = [];
        }

        return $data;
    }

    public function getSiswaRaport($nip){
        return $this->db->query("SELECT * FROM siswa JOIN guru_kelas ON guru_kelas.id_kelas=siswa.id_kelas JOIN tenaga_kependidikan AS gtk ON gtk.id_tenaga_kependidikan=guru_kelas.id_gtk JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE gtk.nip = $nip GROUP BY siswa.id_siswa")->result_array();
    }
}
