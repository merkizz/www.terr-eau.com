<?php

function ReNameFile($FileToRename,$way,$folder,$file,$htdtc)
{
	$ext=strrchr($file,'.');
	if ($FileToRename!='index')
	{			
		$RenameFileName=NameFile($FileToRename);							
		rename($way.$folder.'/'.$file, $way.$folder.'/'.$RenameFileName.$ext);
		echo FILERENAME.'<meta http-equiv=\'refresh\' content=\'0;URL='.$_SERVER['PHP_SELF'].'?htdtc='.$htdtc.'&folder='.$folder.'\'>';
	}
	else
	{
		echo FORBIDDENFILENAME;
	}
}	

?>