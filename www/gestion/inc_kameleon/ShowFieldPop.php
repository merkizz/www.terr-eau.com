<?php

function ShowFieldPop()
{
	 echo '
	<fieldset class=fieldborders_htdtc>
	<legend class=fieldlegend_htdtc><img class=shadow_htdtc src=\'inc/gfx/page_x.gif\' border=0 align=absbottom>&nbsp;<b>'.$_GET['folder'].'</b>&nbsp;';
	
	($_GET['htdtc']=='OnlyShowPop')? OtherFolders():Insert();
	
	echo '
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreatePage&folder='.$_GET['folder'].'\' target=\'fframe\'>&nbsp;'.ADDPOP.'&nbsp;</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreateFolder&fdir='.POPDIR.'&typ=pop&showtyp=PopUp&QString=',urlencode($_SERVER['QUERY_STRING']),'\' target=\'fframe\'>'.ADDFOLDER.'</a>&nbsp;
	';
	
	echo ($_GET['htdtc']=='OnlyShowPop')? '':POPHELP;echo '&nbsp;</legend>
	<iframe src=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPop&folder='.$_GET['folder'].'\' name=\'fframe\' height=100 width=100% frameborder=0 scrolling=auto></iframe>
	</fieldset>';
	
	if (isset($_GET['DelF'])){DeleteFolder();}
}

?>