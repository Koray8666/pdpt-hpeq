<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDPTKes Dashboard</title>
<base href="<?=base_url() ?>resource/statplanet/indonesia-province/web/" />
<link href="<?=base_url() ?>resource/images/favicon.png" rel="shortcut icon" />
<link href="<?=base_url() ?>resource/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>resource/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url() ?>resource/js/chart.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?=base_url() ?>resource/js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?=base_url() ?>resource/statplanet/indonesia-province/web/swfobject.js"></script>
<script type="text/javascript">
function getURLParam(strParamName){
	var strReturn = "";
	var strHref = window.location.href;
	if ( strHref.indexOf("?") > -1 ){
		var strQueryString = strHref.substr(strHref.indexOf("?"));
		var aQueryString = strQueryString.split("&");
		for ( var iParam = 0; iParam < aQueryString.length; iParam++ ){
			if ( aQueryString[iParam].indexOf(strParamName.toLowerCase() + "=") > -1 ){
				var aParam = aQueryString[iParam].split("=");
				strReturn = aParam[1];
				break;
			}
		}	
	}
	return unescape(strReturn);
}
var swfVersionStr = "9.0.45";
var xiSwfUrlStr = "";
var flashvars = {};
flashvars.location = getURLParam("l");
flashvars.data = "data.zip";
flashvars.settings = "settings.csv";
var params = {};
params.quality = "high";
params.bgcolor = "#ffffff";
params.play = "true";
params.loop = "false";
params.wmode = "window";
params.allowfullScreen ="false";
params.scale = "showall";
params.menu = "true";
params.devicefont = "false";
params.salign = "";
params.allowscriptaccess = "sameDomain";
var attributes = {};
attributes.id = "StatPlanet";
attributes.name = "StatPlanet";
attributes.align = "middle";
swfobject.createCSS("html", "height:100%; background-color: #ffffff;");
swfobject.createCSS("body", "margin:0; padding:0; overflow:hidden; height:100%;");
swfobject.embedSWF(
	"<?=base_url() ?>resource/statplanet/indonesia-province/web/StatPlanet.swf", "flashContent",
	"100%", "100%",
	swfVersionStr, xiSwfUrlStr,
	flashvars, params, attributes);		
</script>
</head>
<body>
<div id="wrap">
  <header>
    <a href="<?=base_url() ?>"><span><strong>PDPTKes</strong>dashboard</span></a>
    <ul>
      <li>Detail</li>
      <a onClick="loadSection('geostats')"><li>Sebaran</li></a>
    </ul>
  </header>

  <div id="flashContent">
    <a href="http://www.adobe.com/go/getflash">
      <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
    </a>
    <p>This page requires Flash Player version 9.0.45 or higher.</p>
  </div>
</div>
</body>