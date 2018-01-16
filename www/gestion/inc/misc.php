<?php
/*************************************************************************************************
**                                                                                              **
**  + BackOffice +                               + HTDTC100%                                    **
**   + Version :                                  + #V.5 - 280508                               **
**    + Auteur : (c) S. Tristant                   + Email : stristant@gmail.com                **
**     + Bon voyage !                               +                                           **
**                                                                                              **
*************************************************************************************************/
require_once 'client.php';


//Default constants :

define('LANG', 'fr');
define('NAMELANG1', 'Fran&ccedil;ais');define('FLAGLANG1', 'fr');

define('HTDTCA_USER', 'letme');define('HTDTCA_PWD', 'in');
define('IMGMFS',   '102400');define('SHOWIMGMFS', '100 Ko');
define('PDFMFS',   '5242880');define('SHOWPDFMFS', '5 Mo');
define('SOUNDMFS', '5242880');define('SHOWSOUNDMFS', '5 Mo');
define('VIDEOMFS', '5242880');define('SHOWVIDEOMFS', '5 Mo');
define('ENDPAGE',  '</font></div>');
define('BEGINSTYLE',  '<span style=\'font-family: Verdana, Arial, Sans-Serif;font-size: 12px;color:'.TXTCLR.';\'>');
define('ENDSTYLE',  '</span>');
define('CONTENTL1','../content/l1/');
define('IMGDIR',   '../content/pics/');
define('PDFDIR',   '../content/pdf/');
define('POPDIR',   '../content/pop/');
define('SOUNDDIR', '../content/music/');
define('VIDEODIR', '../content/videos/');
//YOUR HTDTC :
define('PAGETITLE', '&copy;&copy;Kam&eacute;l&eacute;on Online');
define('SOFTTITLE', '<b>&copy;&copy;Kam&eacute;l&eacute;on</b> <small>Online</small>');
define('LOGINLOGO', '<img src=\'gestion/inc/gfx/htdtc_login.gif\'  border=0>');
define('TEMPLATE1',
'
<html>
<head>
<title>'.CLIENT.'</title>
<style type=\'text/css\'>.pics_htdtc{cursor:pointer;}</style>
</head>
<body bgcolor='.BCKGRNDCLR.' topmargin=0 leftmargin=0>
'
);
define("TEMPLATE2","
<script language=\"JavaScript\"><!--
function IPop_Htdtc(url,name,largeur,hauteur) {
var gauche = (screen.width - largeur)/2
var haut =  (screen.height - hauteur)/2
IPopHtdtc = window.open(url,name,\"width=\"+largeur+\",height=\"+hauteur+\",location=0,toolbar=0,scrollbars=0,menubar=0,resizable=1,directories=0,status=0,left=\"+gauche+\",top=\"+haut)
html = '<HTML><HEAD><TITLE>".CLIENT."</TITLE></HEAD><BODY LEFTMARGIN=0 MARGINWIDTH=0 TOPMARGIN=0 MARGINHEIGHT=0><CENTER><IMG SRC=\"'+url+'\" BORDER=0></CENTER></BODY></HTML>';
IPopHtdtc.document.open();
IPopHtdtc.document.write(html);
IPopHtdtc.document.close()
}
-->
</script>
");
define('TEMPLATE3','</body></html>');
//END OF PARAMETERS

//OTHER FUNCTIONS (not for files administration) :
//SHOW CONTENT ON PUBLIC PAGES
function HtdtcShow($dir,$thefile){
JS_IPop_Htdtc();
$content =  file_get_contents($dir.$thefile);
echo BEGINSTYLE.stripslashes($content).ENDSTYLE;
}
//LOGIN PAGE
function htdtc_login(){
include 'gestion/inc/lang/'.LANG.'.php';
echo '
<head>
<title>',PAGETITLE,'-',CLIENT,'</title>
<link rel=\'stylesheet\' type=\'text/css\' href=\'gestion/inc/gfx/htdtc.css\' />
</head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
<center>
	<table width=350 class=blue_htdtc border=0 height=100% align=center cellpadding=0 cellspacing=0>
	<tr>
	<td align=center valign=center>
		<form method=\'POST\' name=\'loginform\' action=\'',$_SERVER['PHP_SELF'],'\'>
		<fieldset>
		<legend class=loginlegend_htdtc>',SOFTTITLE,'&nbsp;<img src=\'gestion/inc/gfx/leftarrow.gif\' width=11 height=8 border=0>&nbsp;<b>',CLIENT,'</b>&nbsp;</legend>
		<table width=100% class=blue_htdtc border=0 cellspacing=0 cellpadding=3>
		<tr><td colspan=3>&nbsp;</td></tr>
		<tr>
		<td rowspan=2 align=center>',LOGINLOGO,'</td>
		<td align=right>',LOGINUSER,'</td>
		<td align=center><input type=\'text\' name=\'htdtc_user\' class=input_uploadfile_htdtc size=15 />&nbsp;&nbsp;</td>
		</tr>
		<tr>
		<td align=right>',LOGINPWD,'</td>
		<td align=center><input type =\'password\'  name=\'htdtc_pwd\' class=input_uploadfile_htdtc size=15 />&nbsp;&nbsp;</td>
		</tr>
		<tr><td colspan=3>&nbsp;</td></tr>
		<tr>
		<td colspan=3 align=right>
		<input type=\'button\' class=formbouton_htdtc value=\'',ABORT,'\' onclick=\'javascript:history.go(-1);\'>
		<input type=\'submit\' class=formbouton_htdtc value=\'',LOGININ,'\'>
		</td></tr>
		</table>
		</fieldset>
		</form>
	<script>document.loginform.htdtc_user.focus();</script>
	</td></tr>
	</table>

</center>
</body>
</html>
';
}

//JAVASCRIPT
function JS_htmlarea(){
?>
<script language="Javascript1.2"><!--
_editor_url = "inc/";
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
document.write(' language="Javascript1.2"></scr' + 'ipt>');
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// -->
</script>
<?php
}
//JSCenterPop CenterPop
function JS_CPop_Htdtc(){
echo "
<script language=\"JavaScript\"><!--
function CPop_Htdtc(url,name,largeur,hauteur) {
var gauche = (screen.width - largeur)/2
var haut =  (screen.height - hauteur)/2
window.open(url,name,\"width=\"+largeur+\",height=\"+hauteur+\",location=0,toolbar=0,scrollbars=0,menubar=0,resizable=0,directories=0,status=0,left=\"+gauche+\",top=\"+haut)
}
-->
</script>
";
}
function JS_CPop2_Htdtc(){
echo "
<script language=\"JavaScript\"><!--
function CPop2_Htdtc(url,name,largeur,hauteur) {
var gauche = (screen.width - largeur)/2
var haut =  (screen.height - hauteur)/2
window.open(url,name,\"width=\"+largeur+\",height=\"+hauteur+\",location=0,toolbar=0,scrollbars=0,menubar=0,resizable=0,directories=0,status=0,left=\"+gauche+\",top=\"+haut)
}
-->
</script>
";
}
function JS_IPop_Htdtc(){
echo "
<style type=\"text/css\">.pics_htdtc{cursor:pointer;}</style>
<script language=\"JavaScript\"><!--
function IPop_Htdtc(url,name,largeur,hauteur) {
var gauche = (screen.width - largeur)/2
var haut =  (screen.height - hauteur)/2
IPopHtdtc = window.open(url,name,\"width=\"+largeur+\",height=\"+hauteur+\",location=0,toolbar=0,scrollbars=0,menubar=0,resizable=1,directories=0,status=0,left=\"+gauche+\",top=\"+haut)
html = '<HTML><HEAD><TITLE>".CLIENT."</TITLE></HEAD><BODY LEFTMARGIN=0 MARGINWIDTH=0 TOPMARGIN=0 MARGINHEIGHT=0><CENTER><IMG SRC=\"'+url+'\" BORDER=0></CENTER></BODY></HTML>';
IPopHtdtc.document.open();
IPopHtdtc.document.write(html);
IPopHtdtc.document.close()
}
-->
</script>
";
}

function JS_Help_Htdtc(){
echo "
<SCRIPT LANGUAGE=\"JavaScript\" type=\"text/javascript\">
var IB=new Object;
var posX=0;posY=0;
var xOffset=10;yOffset=10;
function AffBulle(texte) {
  contenu=\"<TABLE border=0 cellspacing=0 cellpadding=\"+IB.NbPixel+\"><TR bgcolor='\"+IB.ColContour+\"'><TD><TABLE border=0 cellpadding=2 cellspacing=0 bgcolor='\"+IB.ColFond+\"'><TR><TD><FONT size='-1' face='arial' color='\"+IB.ColTexte+\"'>\"+texte+\"</FONT></TD></TR></TABLE></TD></TR></TABLE>&nbsp;\";
  var finalPosX=posX-xOffset;
  if (finalPosX<0) finalPosX=0;
  if (document.layers) {
    document.layers[\"bulle\"].document.write(contenu);
    document.layers[\"bulle\"].document.close();
    document.layers[\"bulle\"].top=posY+yOffset;
    document.layers[\"bulle\"].left=finalPosX;
    document.layers[\"bulle\"].visibility=\"show\";}
  if (document.all) {
    //var f=window.event;
    //doc=document.body.scrollTop;
    bulle.innerHTML=contenu;
    document.all[\"bulle\"].style.top=posY+yOffset;
    document.all[\"bulle\"].style.left=finalPosX;//f.x-xOffset;
    document.all[\"bulle\"].style.visibility=\"visible\";
  }
  //modif CL 09/2001 - NS6 : celui-ci ne supporte plus document.layers mais document.getElementById
  else if (document.getElementById) {
    document.getElementById(\"bulle\").innerHTML=contenu;
    document.getElementById(\"bulle\").style.top=posY+yOffset;
    document.getElementById(\"bulle\").style.left=finalPosX;
    document.getElementById(\"bulle\").style.visibility=\"visible\";
  }
}
function getMousePos(e) {
  if (document.all) {
  posX=event.x+document.body.scrollLeft; //modifs CL 09/2001 - IE : regrouper l'évènement
  posY=event.y+document.body.scrollTop;
  }
  else {
  posX=e.pageX; //modifs CL 09/2001 - NS6 : celui-ci ne supporte pas e.x et e.y
  posY=e.pageY;
  }
}
function HideBulle() {
	if (document.layers) {document.layers[\"bulle\"].visibility=\"hide\";}
	if (document.all) {document.all[\"bulle\"].style.visibility=\"hidden\";}
	else if (document.getElementById){document.getElementById(\"bulle\").style.visibility=\"hidden\";}
}

function InitBulle(ColTexte,ColFond,ColContour,NbPixel) {
	IB.ColTexte=ColTexte;IB.ColFond=ColFond;IB.ColContour=ColContour;IB.NbPixel=NbPixel;
	if (document.layers) {
		window.captureEvents(Event.MOUSEMOVE);window.onMouseMove=getMousePos;
		document.write(\"<LAYER name='bulle' top=0 left=0 visibility='hide'></LAYER>\");
	}
	if (document.all) {
		document.write(\"<DIV id='bulle' style='position:absolute;top:0;left:0;visibility:hidden'></DIV>\");
		document.onmousemove=getMousePos;
	}
	//modif CL 09/2001 - NS6 : celui-ci ne supporte plus document.layers mais document.getElementById
	else if (document.getElementById) {
	        document.onmousemove=getMousePos;
	        document.write(\"<DIV id='bulle' style='position:absolute;top:0;left:0;visibility:hidden'></DIV>\");
	}

}
</SCRIPT>
";
}


function Css_Frame_Htdtc(){
JS_Help_Htdtc();JS_IPop_Htdtc();
echo '
<html>
<head>
<title>',PAGETITLE,' ',CLIENT,'</title>
<link rel=\'stylesheet\' type=\'text/css\' href=\'inc/gfx/htdtc.css\' />
<style type=\'text/css\'>
.pics_htdtc{
border: transparent 1px outset;cursor:move;
filter:progid:DXImageTransform.Microsoft.Shadow(color=Buttonshadow,direction=135,strength=3);
}
.vignette_htdtc{border: #CCCCCC 1px solid;}
.justpic_htdtc{
border: transparent 1px outset;cursor:move;
filter:progid:DXImageTransform.Microsoft.Shadow(color=Red,direction=135,strength=3);
}
.picsr_htdtc{
border: transparent 1px outset;
filter:progid:DXImageTransform.Microsoft.Shadow(color=Buttonshadow,direction=135,strength=3);
}
.infos{font-family:courrier,tahoma,Arial,sans-serif; font-size: 11px; color: #666666;}
</style>
</head>
<body topmargin=0 leftmargin=0>
<script language=\'JavaScript\'>InitBulle(\'#333333\',\'transparent\',\'transparent\',5);</script>
';
}
function create_vignette($img){//T. Poitreau
	
	$attr = getimagesize($img);
	//echo $attr[0].'___'.$attr[1].'--';
	//width=160 height=99 border=0>	
	while ($attr[0]*$attr[1]>3375){
		$attr[0]=round ($attr[0]/1.1 , 0);
		$attr[1]=round ( $attr[1]/1.1 , 0 );
	}	
	//echo $attr[0].'___'.$attr[1].'--';
	return $attr;
}
//LOGOUT
function Logout(){
session_unset ();
session_destroy ();
echo'<meta http-equiv=\'refresh\' content=\'0;URL='.URLSITE.'\'>';
//echo '<SCRIPT LANGUAGE=\'JavaScript\'>window.parent.location = \''.URLSITE.'\'</SCRIPT>';
}




function css_panier () {
?>
<style type="text/css">
<!--
.bodypanier{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #eee;
}
div#htdtc_print {visibility: visible; }
@media print {div#htdtc_print {visibility: hidden; }}
.ligne{background-color: #eee;}
.txtnoir {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
	
}
.select_css {
	background-color: #FFDB96;
	font-family: tahoma,arial,verdana;
	font-size: 9px;
	color: #333;
	border: 1px inset;}
	
.important{

	font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #FF0000;
	
}
.importants{

	font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: #FF0000;
	
}
.infos{
	border:orange 1px outset;
	background-color: #EEEEEE;
	font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	text-align:justify;
	font-size: 11px;
	font-weight: normal;
	color: #000000;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=orange,direction=135,strength=3);
}

.brdtbl{
	border:#eee 1px outset;
	border-collapse:collapse;
	background-color: #FFFFFF;
	font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.brdtbl2{
	border:#eee 1px outset;
	background-color: #eee;
	font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.pinput{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.pinputqte{
	font-family: Arial, Helvetica, sans-serif;
	text-align:right;
	padding-right:2px;
	font-size: 10px;
	width:30px;
	font-weight: normal;
	color: #333333;
}
A.panier:link,A.panier:visited,A.panier:active{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: underline;
}
A.panier:hover {
	color: #000;
	text-decoration: underline overline;
}



A.panier2:link,A.panier2:visited,A.panier2:active{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: blue;
	text-decoration: none;
}
A.panier2:hover {
	text-decoration: underline overline;
}

.tr {
	cursor:pointer;background-color: #FFFFFF;
}
.trover {
	cursor:pointer;background-color: #EEEEEE;
}
.formalert {

	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: red;
}
.tdprod_htdtc {
	background-color: #FFFFFF;
	BORDER:#999999 1px solid;
	border-collapse:collapse;
	font-size: 10px;
	font-family: Arial;
	color: #333;
}
.trprod_htdtc {
	background-color: #EEEEEE;
	BORDER:#999999 1px solid;
	border-collapse:collapse;
	font-size: 11px;
	font-family: Arial;
	color: #333;
	font-weight:bold;
}
-->
</style>

<div class=bodypanier>
<?php
}
function js_panier () {
?>

<SCRIPT LANGUAGE="JavaScript">
function checkMail(formulaire)
{
	var x = formulaire.adrmailclt.value;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x)) {return true;}
	else {alert('Adresse email invalide');formulaire.adrmailclt.style.backgroundColor='#FFCC66';formulaire.adrmailclt.focus();}
}
</script>

<?php
echo '
<SCRIPT LANGUAGE="JavaScript">
function checkAdr(formulaire)
{
if(formulaire.adrclt_adrlivr && formulaire.adrclt_adrlivr[1].checked){
		document.all.livraison.style.display=\'\';
	
	}
}

function verifForm2(formulaire){
	var ErrorColor = \'#FFCC66\';
	
	
	if (formulaire.civlivr.options[formulaire.civlivr.selectedIndex].value < 0 ) {	
	formulaire.civlivr.style.backgroundColor=ErrorColor;
	document.all.errormsg.innerHTML=\'Adresse de livraison : Quelle est votre civilité ?\';
	document.all.tdcivlivr.className=\'formalert\';
	
	return false;
	}
	
	if( formulaire.nomlivr.value == ""){
	  formulaire.nomlivr.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Adresse de livraison : Quel est votre nom ?\';
	  document.all.tdnomlivr.className=\'formalert\';
	 return false; 
	}
	if( formulaire.prenomlivr.value == ""){
	  formulaire.prenomlivr.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Adresse de livraison : Quel est votre prénom ?\';
	  document.all.tdprenomlivr.className=\'formalert\';
	 return false; 
	}
	
	if( formulaire.adrlivr.value == ""){
	  formulaire.adrlivr.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Adresse de livraison : Quelle est votre adresse postal ?\';
	  document.all.tdadrlivr.className=\'formalert\';
	  return false;	 
	} 
	if( formulaire.cplivr.value == ""){
	  formulaire.cplivr.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Adresse de livraison : Quel est votre code postal ?\';
	  document.all.tdcplivr.className=\'formalert\';
	  return false;	 
	}  
	if( formulaire.villelivr.value == ""){
	  formulaire.villelivr.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Adresse de livraison : Quelle est votre ville ?\';
	  document.all.tdvillelivr.className=\'formalert\';
	  return false;	 
	}  
	
	
	else{
	  formulaire.submit();
	}
}	





function verifForm(formulaire){
	var ErrorColor = \'#FFCC66\';
	var msg = \'\';
	
	if (formulaire.civclt.options[formulaire.civclt.selectedIndex].value < 0 ) {
	formulaire.civclt.style.backgroundColor=ErrorColor;
	document.all.errormsg.innerHTML=\'Quelle est votre civilité ?\';
	document.all.tdcivclt.className=\'formalert\';
	return false;
	}
	  if( formulaire.nomclt.value == ""){
	  formulaire.nomclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quel est votre nom ?\';
	  document.all.tdnomclt.className=\'formalert\';
	 return false; 
	}
	if( formulaire.prenomclt.value == ""){
	  formulaire.prenomclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quel est votre prénom ?\';
	  document.all.tdprenomclt.className=\'formalert\';
	  return false;	 
	}
	if( formulaire.adrmailclt.value == ""){
	  formulaire.adrmailclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quel est votre email ?\';
	  document.all.tdadrmailclt.className=\'formalert\';
	  return false;	 
	}
	
	if( formulaire.pwdclt.value.length < 6){
	  formulaire.pwdclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Email : 6 caractères minimum !\';
	  document.all.tdpwdclt.className=\'formalert\';
	  return false;
	 }
	 
	if( formulaire.adrclt.value == ""){
	  formulaire.adrclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quelle est votre adresse postal ?\';
	  document.all.tdadrclt.className=\'formalert\';
	  return false;	 
	} 
	if( formulaire.cpclt.value == ""){
	  formulaire.cpclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quel est votre code postal ?\';
	  document.all.tdcpclt.className=\'formalert\';
	  return false;	 
	}  
	if( formulaire.villeclt.value == ""){
	  formulaire.villeclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quelle est votre ville ?\';
	  document.all.tdvilleclt.className=\'formalert\';
	  return false;	 
	}  
	if( formulaire.telclt.value == ""){
	  formulaire.telclt.style.backgroundColor=ErrorColor;
	  document.all.errormsg.innerHTML=\'Quel est votre téléphone ?\';
	  document.all.tdtelclt.className=\'formalert\';
	  return false;	 
	}  
	
	
	if(formulaire.adrclt_adrlivr && formulaire.adrclt_adrlivr[1].checked){
		verifForm2(formulaire);
	
	}
	if (formulaire.conditions && formulaire.conditions.checked==false) {	
	document.all.tr_conditions.style.backgroundColor=ErrorColor;
	alert(\'Avez-vous pris connaissance des\nconditions générales de vente ?\nSi oui, cochez la case.\');
	
	return false;
	}
	else{
	  formulaire.submit();
	}
 }
</SCRIPT>
';
}


define("CSS_MAIL",

"
<style type=\"text/css\">
<!--
.bodypanier{
font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #CCCCCC;
}
div#htdtc_print {visibility: visible; }
@media print {div#htdtc_print {visibility: hidden; }}
.ligne{background-color: #EEEEEE;}
.txtnoir {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
	
}
.important{

font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #FF0000;
	
}
.importants{

font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: #FF0000;
	
}
.infos{
border:orange 1px outset;
background-color: #EEEEEE;
font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;text-align:justify;
	font-size: 11px;
	font-weight: normal;
	color: #000000;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=orange,direction=135,strength=3);
}

.brdtbl{
border:#CCCCCC 1px outset;border-collapse:collapse;
background-color: #FFFFFF;
font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.brdtbl2{
border:#EEEEEE 1px outset;
background-color: #EEEEEE;
font-family: tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.pinput{
font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
}
.pinputqte{
font-family: Arial, Helvetica, sans-serif;text-align:right;padding-right:2px;
	font-size: 10px;width:30px;
	font-weight: normal;
	color: #333333;
}
A.panier:link,A.panier:visited,A.panier:active{
font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: blue;
text-decoration: none;
}
A.panier:hover {
text-decoration: underline overline;
}



A.panier2:link,A.panier2:visited,A.panier2:active{
font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: blue;
text-decoration: none;
}
A.panier2:hover {
text-decoration: underline overline;
}

.tr {
cursor:pointer;background-color: #FFFFFF;
}
.trover {
cursor:pointer;background-color: #EEEEEE;
}
.formalert {

font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: red;
}
.tdprod_htdtc {background-color: #FFFFFF;
BORDER:#999999 1px solid;border-collapse:collapse;
font-size: 10px;font-family: Arial;color: #333;
}
.trprod_htdtc {background-color: #EEEEEE;
BORDER:#999999 1px solid;border-collapse:collapse;
font-size: 11px;font-family: Arial;color: #333;font-weight:bold;
}
-->
</style>
"


);

/*
This is...
.: HTDTC->100% - Online Web Editor :.
Copyright (c) 2004->2007 - Sebastien Tristant -> stristant@gmail.com
*/
?>
