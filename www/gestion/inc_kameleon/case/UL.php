
<?php

if ($_GET['typul']=='Images')
{
	$mfs=IMGMFS;
}
elseif($_GET['typul']=='Pdf')
{
	$mfs=PDFMFS;
}
elseif($_GET['typul']=='Music')
{
	$mfs=SOUNDMFS;
}
elseif($_GET['typul']=='Videos')
{
	$mfs=VIDEOMFS;
}

echo'<html><head><title>',PAGETITLE,' - ',CLIENT,'</title>
<link rel=\'stylesheet\' type=\'text/css\' href=\'inc/gfx/htdtc.css\' /></head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 style=\'border:medium none\'><center>
<table width=100% border=0 align=center cellpadding=4 cellspacing=2>
<tr><td align=';

if ($_GET['typul']=='Images')
{
	echo 'right';
}
else
{
	echo 'center';
} 

echo '>
<span class=infos_htdtc>',UPLOAD; if ($_GET['typul']=='Pdf'){echo 'documents';}else{echo $_GET['typul'];} echo ' :&nbsp;'; if ($_GET['typul']=='Images'){echo SHOWIMGMFS;}elseif($_GET['typul']=='Pdf'){echo SHOWPDFMFS;}elseif($_GET['typul']=='Music'){echo SHOWSOUNDMFS;}elseif($_GET['typul']=='Videos'){echo SHOWVIDEOMFS;} echo ' (',$mfs,' octets) Maxi.&nbsp;</span>';

if ($_GET['typul']=='Images')
{
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class=link_htdtc href=\'http://www.incomm.fr/aide_kameleon/imageresiz.htm\' target=\'_blank\'>',PICSHELPMSG,'</a>';
}

if ($_GET['typul']=='Pdf')
{
	echo '<br></span><span class=infoss>Fichiers acceptés : Pdf, Excel, Word (doc et rtf), Power Point (ppt et pps)</span>';
}

echo '</td></tr>
<tr><td align=center class=blue_htdtc>
<form method=\'post\' enctype=\'multipart/form-data\'>
<input type=\'hidden\' name=\'max_file_size\' value=\'',$mfs,'\'>
<input type=\'file\' class=formbouton_htdtc name=\'upfile\' size=40>
<img src=\'inc/gfx/rightarrow.gif\' width=11 height=8 border=0>&nbsp;<b>1</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>2</b>&nbsp;<img src=\'inc/gfx/leftarrow.gif\' width=11 height=8 border=0>
<input type=\'submit\' class=formbouton_htdtc value=\'',SENDFILE,'\'>
</form>';

if(isset($_FILES['upfile'])) 
{
	$newupfile = $_FILES['upfile']['name'];$upfilesize = $_FILES['upfile']['size'];$upfiletype = $_FILES['upfile']['type'];
	$newupfile=NameFile($newupfile);
	if(($upfilesize>0 && $upfilesize<=$mfs)) 
	{

		switch ($_GET['typul'])
		{
		case 'Images':	
			if(!ereg('.jpeg$', $newupfile) && !ereg('.jpg$', $newupfile) && !ereg('.JPG$', $newupfile) && !ereg('.JPEG$', $newupfile) && !ereg('.GIF$', $newupfile) && !ereg('.gif$', $newupfile) && !ereg('.PNG$', $newupfile) && !ereg('.png$', $newupfile))
			{
				echo '<span class=warning_htdtc>&nbsp;',AFILE,'&nbsp;',$_GET['typul'],'&nbsp;',INVALID,' !&nbsp;</span>&nbsp;',INVALIDPICMSG;
				exit;
			}
			else
			{
				$savefile=IMGDIR.$_GET['folder'].'/'.$newupfile;$temp = $_FILES['upfile']['tmp_name'];

				if (isset($_GET['id']))
				{
					DB_Connexion ();						
					$sql="UPDATE produits SET ".$_GET['img']."='".$newupfile."' WHERE id_produit='".$_GET['id']."'";					
					mysql_query($sql);
				}


			}			
			break;	

		case 'Pdf':	
			if(!ereg('.pdf$', $newupfile) && !ereg('.PDF$', $newupfile) && !ereg('.XLS$', $newupfile) && !ereg('.xls$', $newupfile) && !ereg('.DOC$', $newupfile) && !ereg('.doc$', $newupfile) && !ereg('.PPT$', $newupfile) && !ereg('.ppt$', $newupfile)&& !ereg('.PPS$', $newupfile) && !ereg('.pps$', $newupfile)&& !ereg('.RTF$', $newupfile) && !ereg('.rtf$', $newupfile))
			{
				echo '<span class=warning_htdtc>&nbsp;',AFILE,'&nbsp;',$_GET['typul'],'&nbsp;',INVALID,' !&nbsp;</span>&nbsp;',INVALIDPDFMSG;
				exit;
			}
			else
			{
				$savefile=PDFDIR.$_GET['folder'].'/'.$newupfile;$temp = $_FILES['upfile']['tmp_name'];
			}						
			break;

		case 'Music':	
			if(!ereg('.mp3$', $newupfile) && !ereg('.MP3$', $newupfile) && !ereg('.wav$', $newupfile) && !ereg('.WAV$', $newupfile) && !ereg('.ogg$', $newupfile) && !ereg('.OGG$', $newupfile) && !ereg('.wma$', $newupfile) && !ereg('.WMA$', $newupfile))
			{
				echo '<span class=warning_htdtc>&nbsp;',AFILE,'&nbsp;',$_GET['typul'],'&nbsp;',INVALID,' !&nbsp;</span>&nbsp;',INVALIDSOUNDMSG;
				exit;
			}
			else
			{
				$savefile=SOUNDDIR.$_GET['folder'].'/'.$newupfile;$temp = $_FILES['upfile']['tmp_name'];
			}						
			break;
		case 'Videos':	
			if(!ereg('.avi$', $newupfile) && !ereg('.AVI$', $newupfile) && !ereg('.wmv$', $newupfile) && !ereg('.WMV$', $newupfile) && !ereg('.mov$', $newupfile) && !ereg('.MOV$', $newupfile) && !ereg('.mpeg$', $newupfile) && !ereg('.MPEG$', $newupfile) && !ereg('.mp4$', $newupfile) && !ereg('.MP4$', $newupfile))
			{
				echo '<span class=warning_htdtc>&nbsp;',AFILE,'&nbsp;',$_GET['typul'],'&nbsp;',INVALID,' !&nbsp;</span>&nbsp;',INVALIDVIDEOMSG;
				exit;
			}
			else
			{
				$savefile=VIDEODIR.$_GET['folder'].'/'.$newupfile;$temp = $_FILES['upfile']['tmp_name'];
			}						
			break;
		}

		if (move_uploaded_file($temp, $savefile)) 	
		{
			chmod($savefile,0644);
			echo'<SCRIPT LANGUAGE=\'JavaScript\'>window.history.go(-2);</SCRIPT>';

			if (isset($_GET['id']))
			{

				//echo $sql;exit();

				echo "<SCRIPT LANGUAGE=\"JavaScript\">window.close();window.opener.location.reload();</SCRIPT>";

			}
			else
			{						
				echo"<SCRIPT LANGUAGE=\"JavaScript\">window.history.go(-2);</SCRIPT>";
			}


		}
		else
		{
			echo ULERROR;
		}

	}
	else
	{
		echo INVALIDMFS; 
		if ($_GET['typul']=='Images')
		{
			echo SHOWIMGMFS;
		}
		elseif($_GET['typul']=='Pdf')
		{
			echo SHOWPDFMFS;
		}
		elseif($_GET['typul']=='Music')
		{
			echo SHOWSOUNDMFS;
		}
		elseif($_GET['typul']=='Videos')
		{
			echo SHOWVIDEOMFS;
		} 

		echo ' (',$mfs,' octets) maxi.</span>';
	}
}
echo '</td></tr></table>';

?>