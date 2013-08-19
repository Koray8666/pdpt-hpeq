<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perg_Tinggi extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function data_list($param = NULL) {
		$sql = "SELECT * FROM (
					SELECT 
						KODE_PERGURUAN_TINGGI AS ID, 
						NAMA_PT AS LABEL
					FROM TMST_PERGURUAN_TINGGI 
					WHERE STATUS_VALIDASI = 1 ";
		if($param != NULL)
			$sql .= "AND REGEXP_LIKE(NAMA_PT, '".$param."', 'i')";
		$sql .= "ORDER BY LABEL ASC) WHERE ROWNUM <= 5";
		$return = $this->db->query($sql);
		return $return->result_array();
	}
	
}

?>