<?php

function ShowFieldMusic()
{
	echo'
	<fieldset class=fieldborders_htdtc>
	<legend class=fieldlegend_htdtc><img class=shadow_htdtc src=\'inc/gfx/music.gif\' border=0 align=absbottom>&nbsp;<b>'.$_GET['folder'].'</b>&nbsp;';
	
	($_GET['htdtc']=='OnlyShowMusic')? OtherFolders():Insert();
	
	echo '
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=UL&typul=Music&folder='.$_GET['folder'].'\' target=\'fframe\'>'.ADDSOUND.'</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreateFolder&fdir='.SOUNDDIR.'&typ=Music&showtyp=Music&QString=',urlencode($_SERVER['QUERY_STRING']),'\' target=\'fframe\'>'.ADDFOLDER.'</a>&nbsp;
	';
	
	echo ($_GET['htdtc']=='OnlyShowMusic')? '':SOUNDSHELP;echo '</legend>
	<iframe src=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowMusic&folder='.$_GET['folder'].'\' name=\'fframe\' height=100 width=100% frameborder=0 scrolling=auto></iframe>
	</fieldset>';
	
	if (isset($_GET['DelF'])){DeleteFolder();}
}

?>