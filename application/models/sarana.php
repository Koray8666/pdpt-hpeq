<?php

class Sarana extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function total_by_type() {
		$sql = "SELECT * FROM (
					SELECT 
						DISTINCT(TMST_SARANA_KLINIS.TIPE_RS) AS TIPE_RS,
						COUNT(TMST_SARANA_KLINIS.KODE_SARANA) AS JUMLAH
					FROM TMST_SARANA_KLINIS
					GROUP BY TMST_SARANA_KLINIS.TIPE_RS
					)
				JOIN TREF_TIPE_RS ON TIPE_RS = TREF_TIPE_RS.KODE_TIPE_RS";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
}

?>