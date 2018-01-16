<?php

Css_Frame_Htdtc();

if (isset($_GET['DeleteFile']))
{
	unlink(VIDEODIR.$_GET['folder'].'/'.$_GET['Video']);
}
if (!isset($_GET['RenameFile']))
{
	echo "<table border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"2\"><tr>";
	if ($dh = @opendir(VIDEODIR.$_GET['folder'].'/')) 
	{
		$x=0;
		while (($VideoName = readdir($dh))) 
		{
			if (!in_array($VideoName, $GLOBALS['X']))
			{
				$showVideo = (str_replace(strrchr($VideoName,'.'),'',$VideoName));
				
				echo "<td>
				<table class='insert_htdtc' height=60 border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"0\">
				<tr><td align=center>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowVideos&RenameFile&folder=".$_GET['folder']."&Video=$VideoName\"><img class=shadow_htdtc src='inc/gfx/rename.gif' border='0' onMouseOver=\"AffBulle('".RFILEMSG."')\" onMouseOut=\"HideBulle()\"></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowVideos&DeleteFile&folder=".$_GET['folder']."&Video=$VideoName\" onclick=";?>"if(window.confirm('<?php echo CLIENT; ?>\n<?php echo WARNINGDELETEFILE; ?>\'<?php echo $showSound; ?>\' ?\n<?php echo DELCONFIRM; ?>')) {return true;} else {return false;}"<?php echo "  onMouseOver=\"AffBulle('".DELFILEMSG."')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src='inc/gfx/b_drop.png' align=abstop border='0'></a>
				</td></tr>
				<tr><td align=center>
				<img src=\"inc/gfx/videos.gif\" align=\"absbottom\"><a class=framelnk_htdtc href=\"".URLSITE."content/videos/".$_GET['folder']."/".$VideoName."\" target=\"_blank\">&nbsp;$showVideo</a>
				</td></tr>
				</table>
				</td>";$x++;
			}			
		}
		if ($x==0)
		{
			echo '<td class=infos>[ Le dossier <i>',$_GET['folder'],'</i> est vide ]</td>';
		}
		closedir($dh);clearstatcache();
	}
	echo "</tr><table></body></html>";
}
else
{

	$showVideoname = (str_replace(strrchr($_GET['Video'],'.'),'',$_GET['Video']));
	
	echo "<form method=\"POST\" name=\"HtdtcForm\"><br />
	<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
	<tr><td align=center class=blue_htdtc valign=top>
	".RENAMEFILEMSG.$showVideoname."  <img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">
	<input type=\"text\" value=\"".$showVideoname."\" class=input_uploadfile_htdtc size=\"30\" name=\"RenameFileName\" maxlength=\"15\">".NCHARMSG."<br /><br />
	<input type=\"submit\" class=\"formbouton_htdtc\" value=\"".SAVE."\" />
	<input type=\"button\" class=\"formbouton_htdtc\" value=\"".ABORT."\" onclick=\"javascript:history.go(-1);\" />		
	</form><script>document.HtdtcForm.RenameFileName.focus();</script>
	</td><td width=200>";
	
	if (isset($_POST['RenameFileName']) && !empty($_POST['RenameFileName']))
	{
		ReNameFile($_POST['RenameFileName'],VIDEODIR,$_GET['folder'],$_GET['Video'],'ShowVideos');		
	}
	
	echo "</td></tr></table>";
}

?>