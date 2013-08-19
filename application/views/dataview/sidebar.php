<div id="sidebar">
    <ul>
      <li><a class="main">Mahasiswa<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></a>
        <ul>
          <li><a onClick="loadView('dataview/mahasiswa/totalbyyear')">Jumlah Masuk PT</a></li>
          <li><a onClick="loadView('dataview/mahasiswa/classbyyear')">Pemilihan Kelas</a></li>
          <li><a onClick="loadView('dataview/mahasiswa/genderbyyear')">Jenis Kelamin Mahasiswa</a></li>
          <li><a onClick="loadView('dataview/mahasiswa/degreebyyear')">Pemilihan Jenjang Pendidikan</a></li>
        </ul>
      </li>
      <li>Tenaga Pengajar<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right"></li>
      <li><a class="main">Sarana Klinis<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></a>
        <ul>
          <li><a onClick="loadView('dataview/sarana/typeshos')">Jenis Sarana Klinis</a></li>
          <li><a onClick="loadView('dataview/sarana/typescomm')">Jenis Sarana Klinis Komunitas</a></li>
          <li><a onClick="loadView('dataview/sarana/cooperationhos')">Kerjasama Sarana Klinis</a></li>
          <li><a onClick="loadView('dataview/sarana/cooperationcomm')">Kerjasama Sarana Klinis Komunitas</a></li>
        </ul>
      </li>
      <li>Program Studi<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></li>
      <li>Perguruan Tinggi<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></li>
    </ul>
  </div>
  
  <div class="loading">
    <img src="<?=base_url() ?>resource/images/loading.gif"><br />
    Harap tunggu
  </div>
    
  <div id="content">
    <script>
	function initField(element) {
    	$("#" + element).slideToggle("fast");
    }
    </script>