<?php

Css_Frame_Htdtc();

if (isset($_GET['PopDelete']))
{
	unlink(POPDIR.$_GET['folder'].'/'.$_GET['pop']);
	unlink(POPDIR.$_GET['folder'].'/'.'backup/'.$_GET['pop']);
}

//si le fichier a été renommé précédemment, il n'est pas supprimé : A voir !
if (!isset($_GET['RenameFile']))
{
	echo "<table border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"2\"><tr>";
	
	if ($dh = @opendir(POPDIR.$_GET['folder'].'/')) 
	{
		$x=0;
		$z=0;
		while (($PopName = readdir($dh))) 
		{
			$TBLPopName[$z] = $PopName;
			$z++;
		}
		asort($TBLPopName);

		foreach ($TBLPopName as $key => $PopName) 
		{ 
			//  while (($PopName = readdir($dh))) {
			if (!in_array($PopName, $GLOBALS['X']))
			{
				$showpop = (str_replace(strrchr($PopName,'.'),'',$PopName));
				
				echo "<td>
				<table class='insert_htdtc' height=60 border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"0\">
				<tr><td align=center><nobr>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPage&TheFile=$PopName&PageName=$showpop&PopFolder=".$_GET['folder']."";if (isset($_GET['lang'])){echo "&lang=".$_GET['lang']."&flag=".$_GET['flag']."";} echo "\" target=\"_top\"><img class=shadow_htdtc src='inc/gfx/b_edit.png' border='0' onMouseOver=\"AffBulle('".SEEFILEMSG."')\" onMouseOut=\"HideBulle()\"></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPop&RenameFile&folder=".$_GET['folder']."&pop=$PopName&showpop=$showpop\"><img class=shadow_htdtc src='inc/gfx/rename.gif' border='0' onMouseOver=\"AffBulle('".RFILEMSG."')\" onMouseOut=\"HideBulle()\"></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPop&PopDelete&folder=".$_GET['folder']."&pop=$PopName\" onMouseOver=\"AffBulle('".DELFILEMSG."')\" onMouseOut=\"HideBulle()\" onclick=";?>"if(window.confirm('<?php echo CLIENT; ?>\n<?php echo WARNINGDELETEFILE; ?> \'<?php echo $showpop; ?>\' ?\n<?php echo DELCONFIRM; ?>')) {return true;} else {return false;}"<?php echo "><img class=shadow_htdtc src='inc/gfx/b_drop.png' align=abstop border='0'></a>
				</nobr></td></tr>
				<tr><td align=center>
				<img src=\"inc/gfx/page_x.gif\" align=\"absbottom\"><a class=framelnk_htdtc href=\"".URLSITE."content/pop/".$_GET['folder']."/".$PopName."\" target=\"_blank\">&nbsp;$showpop</a>
				</td></tr>
				</table>
				</td>
				";
				
				$x++;
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

	echo "<form method=\"POST\" name=\"HtdtcForm\"><br />
	<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
	<tr><td align=center class=blue_htdtc valign=top>
	".RENAMEFILEMSG.$_GET['showpop']."  <img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">
	<input type=\"text\" value=\"".$_GET['showpop']."\" class=input_uploadfile_htdtc size=\"30\" name=\"RenameFileName\" maxlength=\"15\">".NCHARMSG."<br /><br />
	<input type=\"submit\" class=\"formbouton_htdtc\" value=\"".SAVE."\" />
	<input type=\"button\" class=\"formbouton_htdtc\" value=\"".ABORT."\" onclick=\"javascript:history.go(-1);\" />		
	</form><script>document.HtdtcForm.RenameFileName.focus();</script>
	</td><td width=200>";
	
	if (isset($_POST['RenameFileName']) && !empty($_POST['RenameFileName']))
	{
		ReNameFile($_POST['RenameFileName'],POPDIR,$_GET['folder'],$_GET['pop'],'ShowPop');
	}
	
	echo "</td></tr></table>";
}

?>