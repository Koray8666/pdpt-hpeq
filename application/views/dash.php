<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDPT Dashboard</title>
<link href="<?=base_url() ?>resource/images/favicon.png" rel="shortcut icon" />
<link href="<?=base_url() ?>resource/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>resource/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url() ?>resource/js/chart.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script>
function loadView(url) {
	$("#content").slideUp("fast", function() {
		$(".loading").fadeIn("slow");
		$(this).load("index.php/" + url, function() {
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
    <a onclick="loadView('dash/clear')"><span><strong>PDPTKes</strong>dashboard</span></a>
    <ul>
      <li>Detailed</li>
      <li>Geostats</li>
    </ul>
  </header>
  
  