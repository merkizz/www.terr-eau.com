<?php

echo'
<html><head><title>',PAGETITLE,' - ',CLIENT,'</title>
<link rel=\'stylesheet\' type=\'text/css\' href=\'inc/gfx/htdtc.css\' /></head>
<body leftmargin=0 topmargin=2 marginwidth=0 marginheight=0>
<table height=100% border=0 rules=none cellpadding=1 cellspacing=1 align=center>
<tr><td class=blue_htdtc valign=top align=center><form method=\'POST\' name=\'HtdtcForm\'>
',NEWFILEMSG,'<img src=\'inc/gfx/page_x.gif\' border=0 align=absmiddle><img src=\'inc/gfx/leftarrow.gif\' width=11 height=8 border=0>
<input type=\'text\' class=input_uploadfile_htdtc size=30 name=\'newpage\' maxlength=15>',NCHARMSG,'<br /><br />
<input type=\'submit\' class=formbouton_htdtc value=\'',SAVE1,'\' />
<input type=\'button\' class=formbouton_htdtc value=\'',ABORT,'\' onclick=\'javascript:history.go(-1);\' />
<br />
</form></td><td width=200 >';

if(isset($_POST['newpage']) && !empty($_POST['newpage'])) 
{
	if ($_POST['newpage']=='index') 
	{
		echo FORBIDDENFILENAME;
	}
	else
	{
		$template=TEMPLATE2;
		$newpage=NameFile($_POST['newpage']);		
		$file = $newpage.'.html';
		if (file_exists(POPDIR.$_GET['folder'].'/'.$file)) 
		{
			echo FILEEXIST;
		}
		else
		{
			if (!$handle = fopen(POPDIR.$_GET['folder'].'/'.$file, 'x+')) 
			{
				echo $file.' : '.CANTOPENFILE;exit;
			}

			if (fwrite($handle, $template) === FALSE) 
			{
				echo $file.' : '.CANTWRITEFILE;exit;
			}
			//ok
			fclose($handle);
			copy(POPDIR.$_GET['folder'].'/'.$file, POPDIR.$_GET['folder'].'/'.'backup/'.$file);
			echo FILESAVED.'<meta http-equiv=\'refresh\' content=\'0;URL=',$_SERVER['PHP_SELF'],'?htdtc=ShowPop&folder=',$_GET['folder'],'\'>';
		}
	}
}

echo '</td></tr></table><script>document.HtdtcForm.newpage.focus();</script>';
?>