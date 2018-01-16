<?php 
#V.5 - 280508
define('CLIENT',     'TERR&acute;EAU');  //Apostrophe >> &#146;  ex. : L'or >> L&#146;or

define('URLSITE',    'http://www.terr-eau.com/');

define('HTDTC_USER', 'terreau');define('HTDTC_PWD', 'te0501au');

define('MENUAUTO',   'YES'); 

define('BODYWIDTH',  '900');	// en % ou pixels

define('BCKGRNDCLR', '#f7f7f7');
define('TXTCLR', '#333333');


// INUTILE DE MODIFIER gestion\inc\editor\editor\css\fck_editorarea.css


define('FRS',        'incomm.fr'); // incomm.fr ou okkin.com !!!! [nécessaire pour le lien de l'aide en ligne]
define('LANG2', 'NO');define('NAMELANG2', 'Anglais'); define('FLAGLANG2', 'gb');
define('LANG3', 'NO');define('NAMELANG3', 'Allemand');define('FLAGLANG3', 'd');
define('LANG4', 'NO');define('NAMELANG4', 'Espagnol');define('FLAGLANG4', 'es');
define('LANG5', 'NO');define('NAMELANG5', 'Italien'); define('FLAGLANG5', 'it');
define('VIDEOMUSIC', 'NO');

/*
<?php require_once '../gestion/inc/misc.php';HtdtcShow('../content/l1/','01filename.txt');?>
*/

if(file_exists('gestion/inc/fonction_incomm.php'))
	require_once('gestion/inc/fonction_incomm.php'); 
if(file_exists('../gestion/inc/fonction_incomm.php'))
 require_once('../gestion/inc/fonction_incomm.php'); 

#CONNEXION BASE DE DONNEES (si nécessaire)
#function DB_Connexion (){
#$db_user = 'consmanoire';$db_pass = '4FDyAqnT';$db_name = 'conserveriedumanoire';$db_host = 'localhost';
#$connexion = mysql_connect($db_host, $db_user, $db_pass) or die (mysql_error());
#$db = mysql_select_db($db_name, $connexion) or die(mysql_error());
#mysql_query("SET NAMES 'utf8'");
#}

#MENU KAMELEON AVEC SOUS RUBRIQUES (MENUAUTO=NO)
function Complex_Menu_Htdtc(){
$content=(isset($_GET['lang']))? '../content/l'.$_GET['lang'].'/':CONTENTL1;

echo '<ul id=udm class=udm>';
echo (isset($_GET['lang']))? '<li><a class=nohref><img src=\'inc/gfx/flags/'.$_GET['flag'].'\' align=middle border=0></a></li>':'';
echo '


<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=01Presentation.txt&PageName=Presentation';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Présentation</a></li>



<li style=\'width:140px\'><a>NOM RUBRIQUE</a>
<ul style=\'width:140px\'>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=01Presentation.txt&PageName=Présentation';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Présentation</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=02Soinsduvisage.txt&PageName=Soin du visage';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Soin du visage</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=03Soinsbienetre.txt&PageName=Soin du corps - Bien être';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Soin du corps - Bien être</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=04Epilation.txt&PageName=Epilation';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Epilation</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=05Soinamincissement.txt&PageName=Soin du corps - amincissement';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Soin du corps - amincissement</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=06Maquillage.txt&PageName=Maquillage';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Maquillage</a></li>

<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=07Newsletter.txt&PageName=Newsletter institut';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Newsletter institut</a></li>

</ul></li>



<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=contact.txt&PageName=Contact';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Contact</a></li>


<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=mentions.txt&PageName=Mentions légales';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Mentions légales</a></li>


<li><a href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile=partenaires.txt&PageName=Partenaires';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>Partenaires</a></li>



</ul>';
}



#INFOS VENTE EN LIGNE  (si nécessaire)

define('URLCATALOGUE', 'produits.php');
define('URLCDV', 'http://www.porcelainecarpenet.com/pages/cgv.php');
define('URLCDV_EN', 'http://www.porcelainecarpenet.com/pagesan/cgv.php');
define('MAIL_WEBMASTER', 'seb@incomm.fr');
//define('MAIL_WEBMASTER', 'contact@porcelainecarpenet.com');
//define('LOGOSITE', '../gfx/logopanier.gif');
define('INFOSITEHTML1', CLIENT.' - Route de Bujaleuf - 87400 St Leonard de Noblat');
define('INFOSITEHTML2', INFOSITEHTML1.' - <br /><small>Site Web : </smal>'.URLSITE.' - <small>Email : </small> '.MAIL_WEBMASTER);
define('INFOSITE_MAIL', 
'
PORCELAINE CARPENET
Route de Bujaleuf
87400 St Leonard de Noblat
Tél : 05 55 56 02 39
Fax : 05 55 56 24 72

Site Web : '.URLSITE.'
Email : '.MAIL_WEBMASTER
);

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ".CLIENT." <".MAIL_WEBMASTER.">" . "\r\n";

#V.5 - 280508
?>