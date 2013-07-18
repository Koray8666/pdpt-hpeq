<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDPT Dashboard</title>
<link href="<?=base_url() ?>resource/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>resource/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url() ?>resource/js/chart.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script>
function loadView(url) {
	$("#content").slideUp("fast", function() {
		$(".loading").fadeIn("slow");
		$(this).load("<?=base_url() ?>index.php/" + url, function() {
			$(".loading").hide();
			$(this).slideDown("slow");
		});
	});
}
$(document).ready(function() {
	$("#sidebar li a.main").click(function() {
		$(this).parent().find("ul").slideToggle("fast");
	});
});
</script>
</head>

<body>

<div id="wrap">
  <header>
    <a onclick="loadView('dash/clear')"><strong>PDPTKes</strong>dashboard</a>
  </header>
  
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
      <li>Dosen<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right"></li>
      <li><a class="main">Sarana Klinis<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" /></a>
        <ul>
          <li><a onClick="loadView('dataview/sarana/types')">Jenis Sarana</a></li>
          <li><a onClick="loadView('dataview/sarana/acc')">Akreditasi Sarana</a></li>
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
  
  