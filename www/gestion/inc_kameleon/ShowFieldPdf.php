<?php

function ShowFieldPdf()
{
	echo'
	<fieldset class=fieldborders_htdtc>
	<legend class=fieldlegend_htdtc><img class=shadow_htdtc src=\'inc/gfx/pdf_x.gif\' border=0 align=absbottom>&nbsp;<b>'.$_GET['folder'].'</b>&nbsp;';
	($_GET['htdtc']=='OnlyShowPdf')? OtherFolders():Insert();
	
	echo '
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=UL&typul=Pdf&folder='.$_GET['folder'].'\' target=\'fframe\'>'.ADDPDF.'</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=CreateFolder&fdir='.PDFDIR.'&typ=Pdf&showtyp=Pdf&QString=',urlencode($_SERVER['QUERY_STRING']),'\' target=\'fframe\'>'.ADDFOLDER.'</a>&nbsp;
	';
	
	echo ($_GET['htdtc']=='OnlyShowPdf')? '':PDFHELP;
	
	echo '</legend>
	<iframe src=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPdf&folder='.$_GET['folder'].'\' name=\'fframe\' height=100 width=100% frameborder=0 scrolling=auto></iframe>
	</fieldset>';
	
	if (isset($_GET['DelF'])){DeleteFolder();}
}

?>