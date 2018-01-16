<?php

$file = $_POST['TheFile'];$dircontent = $_POST['content'];$dirbackup = $_POST['content'].'backup/';
copy($dircontent.$file, $dirbackup.$file); //backup before save (//$thecontent = $_POST['cfr'];)
$thecontent = $_POST['FCKeditor1'];
//$thecontent = str_replace("border=2","border=0",$thecontent);
//$thecontent = str_replace("<TD>","<TD><div align='justify'>",$thecontent);
if (is_writable($dircontent.$file)) 
{
	if (!$handle = fopen($dircontent.$file, 'wb')) 
	{
		echo CANTOPENFILE;	exit;
	}
	if ((strrchr($file,'.'))==".html")
	{
		$newcontent= TEMPLATE1.BEGINSTYLE.stripslashes($thecontent).ENDSTYLE.TEMPLATE3;
		if (fwrite($handle, $newcontent) === FALSE) {echo CANTWRITEFILE;exit;}
	}
	else
	{
		if (fwrite($handle, $thecontent) === FALSE) {echo CANTWRITEFILE;exit;}
	}
	fclose($handle);
	echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?htdtc=ShowPage&TheFile=".$_POST['TheFile']."&PageName=".$_POST['lapage']."";if (isset($_POST["PopFolder"])){echo "&PopFolder=".$_POST["PopFolder"]."";} if (isset($_POST['lang'])){ echo "&lang=".$_POST['lang']."&flag=".$_POST['flag']."";}  echo "\">";
}
else
{
	echo CANTWRITEFILE;
}
			
?>