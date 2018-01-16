<?php
Css_Frame_Htdtc();
if (isset($_GET['DeleteFile']))
{
	unlink(IMGDIR.$_GET['folder'].'/'.$_GET['Pic']);
}
if (!isset($_GET['RenameFile']))
{
	echo "<table border=0 rules=none align=center cellpadding=2 cellspacing=2><tr>";
	if ($dh = @opendir(IMGDIR.$_GET['folder'].'/')) 
	{
		$x=0;
		$z=0;
		while (($PicName = readdir($dh))) 
		{
			$TBLPicName[$z] = $PicName;
			$z++;
		}
		
		asort($TBLPicName);

		foreach ($TBLPicName as $key => $PicName) 
		{ 
			//while (($PicName = readdir($dh))) {
			if (!in_array($PicName, $GLOBALS['X']))
			{
				list($width, $height, $type, $attr) = getimagesize(IMGDIR.$_GET['folder'].'/'.$PicName);
				$im_size=create_vignette(IMGDIR.$_GET['folder'].'/'.$PicName);
				
				echo "<td valign=top>
				<table  class=vignette_htdtc bgcolor=\"#F5F5F5\" border=0 width=110 height=105 rules=none align=center cellpadding=1 cellspacing=1>
				<tr><td align=center><nobr>
				<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('".SEEPICMSG."')\" onMouseOut=\"HideBulle()\"><img  onClick=\"IPop_Htdtc('".URLSITE."content/pics/".$_GET['folder'].'/'.$PicName."','IPop_Htdtc',$width,$height)\" class=shadow_htdtc src='inc/gfx/b_search.png' align=abstop border='0'></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPics&RenameFile&folder=".$_GET['folder']."&Pic=$PicName\"><img class=shadow_htdtc src='inc/gfx/rename.gif' border='0' onMouseOver=\"AffBulle('".RFILEMSG."')\" onMouseOut=\"HideBulle()\"></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPics&DeleteFile&folder=".$_GET['folder']."&Pic=$PicName\" onclick=";?>"if(window.confirm('<?php echo CLIENT; ?>\n<?php echo WARNINGDELETEFILE; ?>\'<?php echo $PicName; ?>\' ?\n<?php echo DELCONFIRM; ?>')) {return true;} else {return false;}"<?php echo " onMouseOver=\"AffBulle('".DELFILEMSG."')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src='inc/gfx/b_drop.png' align=abstop border='0'></a>
				";
				
				if (!isset($_GET['justpic']))
				{ 
					echo "<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPics&folder=".$_GET['folder']."&justpic\"><img class=redshadow_htdtc src='inc/gfx/justpic1.gif' border='0' onMouseOver=\"AffBulle('".JUSTPICS."')\" onMouseOut=\"HideBulle()\"></a>
					";
				}
				
				else
				{
					echo "        
					<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPics&folder=".$_GET['folder']."\"><img class=shadow_htdtc src='inc/gfx/justpic1.gif' border='0' onMouseOver=\"AffBulle('".PICSHTDTC."')\" onMouseOut=\"HideBulle()\"></a>
					";
				} 
				
				echo "</td></tr>
				<tr><td align=center>";
				
				if (!isset($_GET['justpic']))
				{ 
					echo "
					<img onclick=\"IPop_Htdtc('".URLSITE."content/pics/".$_GET['folder'].'/'.$PicName."','IPop_Htdtc',$width,$height)\" title=\"$PicName\" alt=\"$PicName\" src='".IMGDIR.$_GET['folder'].'/'.$PicName."' align='absbottom' border='0' class='pics_htdtc' width=\"".$im_size[0]."\" height=\"".$im_size[1]."\">
					";
				}
				else
				{
					echo "        
					<img class='justpic_htdtc' src='".IMGDIR.$_GET['folder'].'/'.$PicName."' align='absbottom' border='0'  width=\"".$im_size[0]."\" height=\"".$im_size[1]."\">
					";
				} 
				echo "</td></tr>
				</table>
				</td>";
				$x++;
			}			
		}
		if ($x==0)
		{
			echo '<td class=infos>[ Le dossier &quot;',$_GET['folder'],'&quot; est vide ]</td>';
		}
		closedir($dh);clearstatcache();
	}
	
	echo "</tr><table></body></html>";
}

else
{
	$showpicname = (str_replace(strrchr($_GET['Pic'],'.'),'',$_GET['Pic']));
	
	echo "<form method=\"POST\" name=\"HtdtcForm\"><br />
	<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
	<tr>
	<td align=center class=blue_htdtc valign=top>
	<img title=\"".$_GET['Pic']."\" alt=\"".$_GET['Pic']."\" src='".IMGDIR.$_GET['folder'].'/'.$_GET['Pic']."' align='absbottom' border='0' class='picsr_htdtc' width=75 height=45>
	</td>
	<td align=center class=blue_htdtc valign=top>
	".RENAMEFILEMSG.$showpicname."  <img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">
	<input type=\"text\" value=\"".$showpicname."\" class=input_uploadfile_htdtc size=\"30\" name=\"RenameFileName\" maxlength=\"15\">".NCHARMSG."<br /><br />
	<input type=\"submit\" class=\"formbouton_htdtc\" value=\"".SAVE."\" />
	<input type=\"button\" class=\"formbouton_htdtc\" value=\"".ABORT."\" onclick=\"javascript:history.go(-1);\" />		
	</form><script>document.HtdtcForm.RenameFileName.focus();</script>
	</td><td width=200>";
	
	if (isset($_POST['RenameFileName']) && !empty($_POST['RenameFileName']))
	{	
		ReNameFile($_POST['RenameFileName'],IMGDIR,$_GET['folder'],$_GET['Pic'],'ShowPics');
	}
	
	echo "</td></tr></table>";
}
		
?>