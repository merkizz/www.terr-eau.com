<?php

function ShowFieldPics()
{
	echo '
	<fieldset class=fieldborders_htdtc>
	<legend class=fieldlegend_htdtc><img class=shadow_htdtc src=\'inc/gfx/apphoto.gif\' border=0 align=absbottom>&nbsp;<b>'.$_GET['folder'].'</b>&nbsp;
	';
	
	($_GET['htdtc']=='OnlyShowPics')? OtherFolders():Insert();
	
	echo '
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=UL&typul=Images&folder='.$_GET['folder'].'\' target=\'fframe\'>'.ADDPIC.'</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreateFolder&fdir='.IMGDIR.'&typ=Pics&showtyp=Images&QString=',urlencode($_SERVER['QUERY_STRING']),'\' target=\'fframe\'>'.ADDFOLDER.'</a>&nbsp;
	';
	
	echo ($_GET['htdtc']=='OnlyShowPics')? '':PICSHELP;echo '</legend>
	<iframe src=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPics&folder='.$_GET['folder'].'\' name=\'fframe\' height=115 width=100% frameborder=0 scrolling=auto></iframe>
	</fieldset>';
	
	if (isset($_GET['DelF'])){DeleteFolder();}
} 
?>