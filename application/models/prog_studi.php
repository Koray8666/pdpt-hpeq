<?php

class Prog_Studi extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function data_list($params = NULL) {
		$sql = "SELECT * FROM (
					SELECT 
						DISTINCT(TMST_PROGRAM_STUDI.KODE_PROGRAM_STUDI) AS ID, 
						TREF_JENJANG_PENDIDIKAN.NAMA_JENJANG_PENDIDIKAN || ' ' || TMST_PROGRAM_STUDI.NAMA_PROGRAM_STUDI AS LABEL 
					FROM TMST_PROGRAM_STUDI 
					JOIN TREF_JENJANG_PENDIDIKAN ON TREF_JENJANG_PENDIDIKAN.KODE_JENJANG_PENDIDIKAN = TMST_PROGRAM_STUDI.KODE_JENJANG_PENDIDIKAN 
					WHERE STATUS_VALIDASI = 1 ";
		if($params != NULL) {
			$sql .= "AND REGEXP_LIKE(TMST_PROGRAM_STUDI.NAMA_PROGRAM_STUDI, '".$params['term']."', 'i') ";
			if($params['pt']!="") {
				$pt = explode('-', $params['pt']);
				$sql .= "AND TMST_PROGRAM_STUDI.KODE_PERGURUAN_TINGGI = '".$pt[0]."' ";
			}
		}
		$sql .= "ORDER BY LABEL ASC) WHERE ROWNUM <= 5";
		$return = $this->db->query($sql);
		return $return->result_array();
	}

}
?>