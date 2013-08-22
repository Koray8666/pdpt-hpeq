
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
          <li><a onClick="loadView('dataview/sarana/hos_totalbytype')">Jenis Sarana Klinis</a></li>
          <li><a onClick="loadView('dataview/sarana/com_totalbytype')">Jenis Sarana Klinis Komunitas</a></li>
          <li><a onClick="loadView('dataview/sarana/hos_coop')">Kerjasama Sarana Klinis</a></li>
          <li><a onClick="loadView('dataview/sarana/com_coop')">Kerjasama Sarana Klinis Komunitas</a></li>
        </ul>
      </li>
      <li>Program Studi<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></li>
      <li>Perguruan Tinggi<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></li>
    </ul>
  </div>
  
  
    
  <div id="content">
    <script>
	function initField(element) {
    	$("#" + element).slideToggle("fast");
		var iconimage = $("img[for=" + element + "]");
		if(iconimage.attr("collapsed") == "true") {
			iconimage.attr("src", "<?=base_url() ?>resource/images/collapse.png");
			iconimage.attr("collapsed", "false");
		} else {
			iconimage.attr("src", "<?=base_url() ?>resource/images/expand.png");
			iconimage.attr("collapsed", "true");
		}
    }
    </script>