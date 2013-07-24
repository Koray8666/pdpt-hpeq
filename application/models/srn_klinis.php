<?php

class Srn_Klinis extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function types_hos($params = NULL) {
		$sql = "SELECT 
					TIPE_RS, 
					COUNT(TIPE_RS) AS JUMLAH 
				FROM TMST_SARANA_KLINIS 
				GROUP BY TIPE_RS 
				ORDER BY TIPE_RS";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
}

?>