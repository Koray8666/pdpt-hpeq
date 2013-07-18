<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataview extends CI_Controller {
	
	public function mahasiswa($view) {
		$data['params'] = $this->input->get(NULL, TRUE);
		$data['filter_url'] = "dataview/mahasiswa/".$view;
		$this->load->model('Mahasiswa');
		switch($view) {
			case "totalbyyear": 
				$data['res'] = $this->Mahasiswa->total_by_year($data['params']);
				if($data['params'] == NULL) {
					echo "<h1>Jumlah Mahasiswa Masuk PT per Tahun</h1>";
					$this->load->view('dataview/mahasiswa/filter', $data);
				}
				$this->load->view('dataview/mahasiswa/totalbyyear', $data);
				break;
			case "classbyyear":
				$data['res'] = $this->Mahasiswa->class_by_year($data['params']);
				if($data['params'] == NULL) {
					echo "<h1>Pemilihan Kelas per Tahun</h1>";
					$this->load->view('dataview/mahasiswa/filter', $data);
				}
				$this->load->view('dataview/mahasiswa/classbyyear', $data);
				break;
			case "genderbyyear":
				$data['res'] = $this->Mahasiswa->gender_by_year($data['params']);
				if($data['params'] == NULL) {
					echo "<h1>Jenis Kelamin Mahasiswa per Tahun</h1>";
					$this->load->view('dataview/mahasiswa/filter', $data);
				}
				$this->load->view('dataview/mahasiswa/genderbyyear', $data);
				break;
			case "degreebyyear":
				$data['res'] = $this->Mahasiswa->degree_by_year();
				$data['prc'] = $this->Mahasiswa->degree_by_year("percent");
				$this->load->view('dataview/mahasiswa/degreebyyear', $data);
				break;
		}
	}
	
	public function pt($view) {
		$this->load->model('Perg_Tinggi');
		switch($view) {
			case "daftar_json":
				$data['res'] = $this->Perg_Tinggi->data_list($this->input->get('term'));
				echo json_encode($data['res']);
				break;
		}
	}
	
	public function sarana($view) {
		$this->load->view('not_avail');
	}
	
}

?>