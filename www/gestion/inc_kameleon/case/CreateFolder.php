<?php
echo'
<html><head><title>',PAGETITLE,' - ',CLIENT,'</title>
<link rel=\'stylesheet\' type=\'text/css\' href=\'inc/gfx/htdtc.css\' /></head>
<body leftmargin=0 topmargin=2 marginwidth=0 marginheight=0>
<table height=100% border=0 rules=none cellpadding=1 cellspacing=1 align=center>
<tr><td class=blue_htdtc valign=top><form method=\'POST\' name=\'HtdtcForm\'>
<img src=\'inc/gfx/dossier.gif\' border=0 align=absmiddle><b>',NEWDIRMSG,$_GET['showtyp'],'</b><br><img src=\'inc/gfx/leftarrow.gif\' width=11 height=8 border=0>
<input type=\'text\' class=input_uploadfile_htdtc size=30 name=\'newfolder\' maxlength=15>',NCHARMSG,'<br /><br />
<input type=\'submit\' class=formbouton_htdtc value=\'',SAVE1,'\' />
<input type=\'button\' class=formbouton_htdtc value=\'',ABORT,'\' onclick=\'javascript:history.go(-1);\' />
<br />
</form></td><td width=200 >';

if(isset($_POST['newfolder']) && !empty($_POST['newfolder'])) 
{
	$newQ=substr(urldecode($_GET['QString']), 0, (strlen(urldecode($_GET['QString']))-strlen(strrchr(urldecode($_GET['QString']),'=')))); 
	if ($_POST['newfolder']=='index') 
	{
		echo FORBIDDENFILENAME;
	}
	else
	{
		$newfolder=NameFile($_POST['newfolder']);		
		mkdir ($_GET['fdir'].'/'.$newfolder, 0777);
		chmod($_GET['fdir'].'/'.$newfolder,0755);
		if ($_GET['typ']=='pop') 
		{
			mkdir ($_GET['fdir'].'/'.$newfolder.'/'.'backup'.'/', 0777);
			chmod($_GET['fdir'].'/'.$newfolder.'/'.'backup'.'/',0755);
		}

		$NewQString=$newQ.'='.$newfolder;
		echo '<br>'. $NewQString;
		echo FOLDERSAVED,'<SCRIPT LANGUAGE=\'JavaScript\'>window.parent.location=\'',$_SERVER['PHP_SELF'],'?',$NewQString,'\';</SCRIPT>';
		//echo '<meta http-equiv=\'refresh\' content=\'0;URL=',$_SERVER['PHP_SELF'],'?',$NewQString,'\'>';
	}
}
echo '</td></tr></table><script>document.HtdtcForm.newfolder.focus();</script>';
?>