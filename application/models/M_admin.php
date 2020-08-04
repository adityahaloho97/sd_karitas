<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class M_admin extends CI_Model
{ 

	public function getTotal(){
		$gtk = $this->db->get("tenaga_kependidikan")->num_rows();
		$kelas = $this->db->get("kelas")->num_rows();
		$mapel = $this->db->get("mata_pelajaran")->num_rows();
		return [$gtk, $kelas, $mapel];
	}

	public function getMengajar(){
		return $this->db->query("SELECT gtk.nama, gtk.foto, kelas.nama_kelas, mapel.nama_mapel, guru_mengajar.id_guru_mengajar AS id FROM `guru_mengajar` JOIN tenaga_kependidikan AS gtk ON gtk.id_tenaga_kependidikan=guru_mengajar.id_guru JOIN kelas ON kelas.id_kelas=guru_mengajar.id_kelas JOIN mata_pelajaran AS mapel ON mapel.kode_mapel=guru_mengajar.kode_mapel")->result_array();
	}
}
