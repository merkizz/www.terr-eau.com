<?php

function ShowFieldVideos()
{
	echo'
	<fieldset class=fieldborders_htdtc>
	<legend class=fieldlegend_htdtc><img class=shadow_htdtc src=\'inc/gfx/videos.gif\' border=0 align=absbottom>&nbsp;<b>'.$_GET['folder'].'</b>&nbsp;';
	
	($_GET['htdtc']=='OnlyShowVideos')? OtherFolders():Insert();
	
	echo '
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=UL&typul=Videos&folder='.$_GET['folder'].'\' target=\'fframe\'>'.ADDVIDEO.'</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreateFolder&fdir='.VIDEODIR.'&typ=Video&showtyp=Video&QString=',urlencode($_SERVER['QUERY_STRING']),'\' target=\'fframe\'>'.ADDFOLDER.'</a>&nbsp;
	';
	
	echo ($_GET['htdtc']=='OnlyShowVideos')? '':VIDEOSHELP;echo '</legend>
	<iframe src=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowVideos&folder='.$_GET['folder'].'\' name=\'fframe\' height=100 width=100% frameborder=0 scrolling=auto></iframe>
	</fieldset>';
	
	if (isset($_GET['DelF'])){DeleteFolder();}
}

?>