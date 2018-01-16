<?php

function DeleteFolder()
{
	//$ForbidenFolderToDelete = array('images1', 'documents1','popup1','music1','videos1');
	if (!in_array( $_GET['folder'], $GLOBALS['Y']))
	{
		$DF=opendir($_GET['fdir'].$_GET['folder']); $total = 0;
		while ($files = readdir($DF)) {$l = array('.', '..','backup');if (!in_array( $files, $l)){ $total++;}}
		echo '<br><span class=warning_htdtc>'.WARNINGDELETEFOLDERTITLE.'</span><br><br>
		<span class=blue_htdtc>
		<img class=shadow_htdtc src=\'inc/gfx/dossier.gif\' align=absmiddle border=0>
		<img class=shadow_htdtc src=\'inc/gfx/'.$_GET['logo'].'.gif\' align=absmiddle border=0>
		'.$_GET['folder'].'<br><br><b>'.WARNINGDELETEFOLDERMSG.$total.WARNINGDELETEFOLDERMSG2.'<br>'.WARNINGDELETEFOLDERMSG3.'</b></span>
		<form method=\'POST\' name=\'HtdtcForm\'>
		<input type=\'hidden\' name=\'FolderToDelete\' value=\''.$_GET['fdir'].$_GET['folder'].'\'>
		<input type=\'hidden\' name=\'PathFolder\' value=\''.$_GET['fdir'].'\'>
		<input type=\'button\' class=\'formbouton_htdtc\' value=\''.ABORT.'\' onclick=\'javascript:history.go(-1);\' />
		<input type=\'submit\' class=\'formbouton_htdtc\' value=\''.DELETE.'\' /><br /><br />
		</form>
		';
		if(isset($_POST['FolderToDelete']))
		{

			if ($_POST['PathFolder']==POPDIR)
			{
				$DF=opendir($_POST['FolderToDelete'].'/backup');
				while ($files = readdir($DF)) 
				{
					$l = array('.', '..');
					if (!in_array( $files, $l))
					{
						//echo $files.'<br>';
						unlink($_POST['FolderToDelete'].'/backup/'.$files);
					}
				}
				@closedir($DF);rmdir($_POST['FolderToDelete'].'/backup');
				$DF=opendir($_POST['FolderToDelete']);
				while ($files = readdir($DF)) 
				{
					$l = array('.', '..');
					if (!in_array( $files, $l))
					{
							//echo $files.'<br>';
							unlink($_POST['FolderToDelete'].'/'.$files);
					}
				}
				@closedir($DF);
				echo '<meta http-equiv=\'refresh\' content=\'0;URL='.$_SERVER['PHP_SELF'].'?htdtc=FolderHasBeenDelete&folder='.$_GET['folder'].'&logo='.$_GET['logo'].'&nfiles='.$total.'\'>';
				rmdir($_POST['FolderToDelete']);
			}
			
			else
			{

				$DF=opendir($_POST['FolderToDelete']);
				while ($files = readdir($DF)) 
				{
					$l = array('.', '..');
					if (!in_array( $files, $l))
					{
							//echo $files.'<br>';
							unlink($_POST['FolderToDelete'].'/'.$files);
					}
				}
				@closedir($DF);
				echo'<meta http-equiv=\'refresh\' content=\'0;URL='.$_SERVER['PHP_SELF'].'?htdtc=FolderHasBeenDelete&folder='.$_GET['folder'].'&logo='.$_GET['logo'].'&nfiles='.$total.'\'>';
				rmdir($_POST['FolderToDelete']);

			}

		}
	}
	else
	{
		echo '<br><br>',FORBIDENFOLDERTODELETE;
	}

}
?>