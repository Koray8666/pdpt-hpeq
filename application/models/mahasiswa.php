<?php

class Mahasiswa extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function total_by_year($params) {
		$sql = "SELECT * FROM (
					SELECT
						COUNT(*) AS JML_MAHASISWA, 
						TAHUN_MASUK 
					FROM TMST_MAHASISWA ";
		if($params != NULL) {
			$sql .= "WHERE ";
			if($params['pt'] != "") {
				$kode_pt = explode('-', $params['pt']);
				$sql .= "KODE_PERGURUAN_TINGGI = '".$kode_pt[0]."' AND ";
			}
			$sql .=	"TAHUN_MASUK BETWEEN ".$params['start']." AND ".$params['end']." ";
		}
		$sql .= "GROUP BY TAHUN_MASUK 
				ORDER BY TAHUN_MASUK DESC
				)
				WHERE ROWNUM <= 10
				ORDER BY TAHUN_MASUK ASC";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
	function gender_by_year($params) {
		$sql = "SELECT * FROM (
					SELECT 
						TAHUN_MASUK AS TAHUN,
						SUM(CASE WHEN JENIS_KELAMIN='L' THEN 1 ELSE 0 END) AS L,
						SUM(CASE WHEN JENIS_KELAMIN='P' THEN 1 ELSE 0 END) AS P
					FROM TMST_MAHASISWA ";
		if($params != NULL) {
			$sql .= "WHERE ";
			if($params['pt'] != "") {
				$kode_pt = explode('-', $params['pt']);
				$sql .= "KODE_PERGURUAN_TINGGI = '".$kode_pt[0]."' AND ";
			}
			$sql .=	"TAHUN_MASUK BETWEEN ".$params['start']." AND ".$params['end']." ";
		}
		$sql .= "GROUP BY TAHUN_MASUK
				ORDER BY TAHUN_MASUK DESC
				)
				WHERE ROWNUM <= 10
				ORDER BY TAHUN ASC";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
	function class_by_year($params) {
		$sql = "SELECT * FROM (
					SELECT 
						TAHUN_MASUK AS TAHUN,
						SUM(CASE WHEN KELAS='R' THEN 1 ELSE 0 END) AS R,
						SUM(CASE WHEN KELAS='N' THEN 1 ELSE 0 END) AS N
					FROM TMST_MAHASISWA ";
		if($params != NULL) {
			$sql .= "WHERE ";
			if($params['pt'] != "") {
				$kode_pt = explode('-', $params['pt']);
				$sql .= "KODE_PERGURUAN_TINGGI = '".$kode_pt[0]."' AND ";
			}
			$sql .=	"TAHUN_MASUK BETWEEN ".$params['start']." AND ".$params['end']." ";
		}
		$sql .= "GROUP BY TAHUN_MASUK
				ORDER BY TAHUN_MASUK DESC
				)
				WHERE ROWNUM <= 10
				ORDER BY TAHUN ASC";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
	function degree_by_year($param = NULL) {
		if($param == "percent")
			$extra = "*100/count(*) ";
		else $extra = "";
		$sql = "SELECT
					TAHUN_MASUK AS TAHUN,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='A' THEN 1 ELSE 0 END)$extra AS S3,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='B' THEN 1 ELSE 0 END)$extra AS S2,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='C' THEN 1 ELSE 0 END)$extra AS S1,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='D' THEN 1 ELSE 0 END)$extra AS SP2,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='E' THEN 1 ELSE 0 END)$extra AS SP1,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='F' THEN 1 ELSE 0 END)$extra AS D4,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='G' THEN 1 ELSE 0 END)$extra AS D3,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='H' THEN 1 ELSE 0 END)$extra AS D2,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='I' THEN 1 ELSE 0 END)$extra AS D1,
					SUM(CASE WHEN KODE_JENJANG_PENDIDIKAN='J' THEN 1 ELSE 0 END)$extra AS PRO
				FROM TMST_MAHASISWA
				GROUP BY TAHUN_MASUK
				ORDER BY TAHUN_MASUK DESC";
		$return = $this->db->query($sql);
		return $return->row_array();
	}
	
}

?>