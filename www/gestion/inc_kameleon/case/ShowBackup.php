<?php

ShowMenu ();
if (isset($_GET["TheFile"]))
{

	echo "
	<table border=0 width=100% cellspacing=\"0\" cellpadding=\"0\">
	<tr><td colspan=2 height=5></td></tr>
	<tr><td width=50% class=pagename_htdtc align=right>".$_GET['PageName']."&nbsp;</td><td>
	";

	if (isset($_GET['lang']))
	{
		echo "<img src=\"inc/gfx/flags/".$_GET['flag']."\" align=\"absmiddle\" border=\"0\">&nbsp;";
	}
	
	echo "<span class=infos_htdtc>&nbsp;".SHOWBACKUPMSG."&nbsp;</span>&nbsp;&nbsp;".HISTORYGOBACK."
	</td>
	<tr><td colspan=2 height=5></td></tr>
	<tr><td colspan=2 align=center>
	<a class=bouton_htdtc href=\"".$_SERVER['PHP_SELF']."?htdtc=GetBackup&TheFile=".$_GET['TheFile']."&PageName=".$_GET['PageName'].""; 
	if (isset($_GET['lang']))
	{ 
		echo "&lang=".$_GET['lang']."&flag=".$_GET['flag']."";
	}  
	
	echo "\" onclick=";?>"if(window.confirm('<?php echo CLIENT ?>\n<?php echo WARNINGBACKUPMSG ?> \'<?php echo $_GET['PageName']; ?>\' ?\n<?php echo WARNINGBACKUPMSG2 ?>\n<?php echo DELCONFIRM ?>')) {return true;} else {return false;}"<?php echo ">&nbsp;".RESTOREBACKUPMSG."&nbsp;</a>";
	
	if (isset($_GET['lang']))
	{
		$content='../content/l'.$_GET['lang'].'/';$dirbackup = $content.'backup/';
	}
	else
	{
		$content=CONTENTL1;$dirbackup = CONTENTL1.'backup/';
	}
	
	$backup=$dirbackup.$_GET['TheFile'];
	echo "<br /><br /></td></tr>
	<tr><td  colspan=2 align=\"center\" valign=\"top\">
		<table bgcolor=\"".BCKGRNDCLR."\" border=0 class=CltWindowBorders_htdtc width=".BODYWIDTH." align=center>
		<tr><td>";
		
	$content =  file_get_contents($backup);
	echo BEGINSTYLE.stripslashes($content).ENDSTYLE
	/*
		$file = $backup;
		$fd = fopen($file, "r");
		$content = fread($fd, filesize ($file));
		fclose($fd);
		echo stripslashes($content)."
	*/
					
	."</td></tr></table>
	</td></tr></table>";
}
			
?>