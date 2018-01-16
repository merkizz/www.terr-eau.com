<?php

Css_Frame_Htdtc();

if (isset($_GET['DeleteFile']))
{
	unlink(PDFDIR.$_GET['folder'].'/'.$_GET['pdf']);
}

if (!isset($_GET['RenameFile']))
{
	echo "<table border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"2\"><tr>";
	if ($dh = @opendir(PDFDIR.$_GET['folder'].'/')) 
	{
		$x=0;
		$z=0;
		while (($PdfName = readdir($dh))) 
		{
			$TBLPdfName[$z] = $PdfName;
			$z++;
		}
		asort($TBLPdfName);

		foreach ($TBLPdfName as $key => $PdfName) 
		{ 
			//while (($PdfName = readdir($dh))) {
			if (!in_array($PdfName, $GLOBALS['X']))
			{
				$showpdf = (str_replace(strrchr($PdfName,'.'),'',$PdfName));
				$ext=strrchr($PdfName,'.');
				
				if ($ext==".xls")
				{
					$LogoDoc="xls";
				}
				elseif($ext==".doc" || $ext==".rtf")
				{
					$LogoDoc="doc";
				}
				elseif($ext==".pdf")
				{
					$LogoDoc="pdf_x";
				}
				elseif($ext==".ppt" || $ext==".pps")
				{
					$LogoDoc="ppt";
				}
				//pdf_x
				
				echo "
				<td>
				<table class='insert_htdtc' height=60 border=\"0\" rules=none align=\"center\" cellpadding=\"2\" cellspacing=\"0\">
				<tr><td align=center>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPdf&RenameFile&folder=".$_GET['folder']."&Pdf=$PdfName\"><img class=shadow_htdtc src='inc/gfx/rename.gif' border='0' onMouseOver=\"AffBulle('".RFILEMSG."')\" onMouseOut=\"HideBulle()\"></a>
				<a href=\"".$_SERVER['PHP_SELF']."?htdtc=ShowPdf&DeleteFile&folder=".$_GET['folder']."&pdf=$PdfName\" onclick=";?>"if(window.confirm('<?php echo CLIENT; ?>\n<?php echo WARNINGDELETEFILE; ?>\'<?php echo $showpdf; ?>\' ?\n<?php echo DELCONFIRM; ?>')) {return true;} else {return false;}"<?php echo "  onMouseOver=\"AffBulle('".DELFILEMSG."')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src='inc/gfx/b_drop.png' align=abstop border='0'></a>
				</td></tr>
				<tr><td align=center>
				<img src=\"inc/gfx/".$LogoDoc.".gif\" align=\"absbottom\"><a class=framelnk_htdtc href=\"".URLSITE."content/pdf/".$_GET['folder']."/".$PdfName."\" target=\"_blank\">&nbsp;$showpdf</a>
				</td></tr>
				</table>
				</td>";
				
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

	$showpdfname = (str_replace(strrchr($_GET['Pdf'],'.'),'',$_GET['Pdf']));
	echo "<form method=\"POST\" name=\"HtdtcForm\"><br />
	<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
	<tr><td align=center class=blue_htdtc valign=top>
	".RENAMEFILEMSG.$showpdfname."  <img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">
	<input type=\"text\" value=\"".$showpdfname."\" class=input_uploadfile_htdtc size=\"30\" name=\"RenameFileName\" maxlength=\"15\">".NCHARMSG."<br /><br />
	<input type=\"submit\" class=\"formbouton_htdtc\" value=\"".SAVE."\" />
	<input type=\"button\" class=\"formbouton_htdtc\" value=\"".ABORT."\" onclick=\"javascript:history.go(-1);\" />		
	</form>		<script>document.HtdtcForm.RenameFileName.focus();</script>
	</td><td width=200>";

	if (isset($_POST['RenameFileName']) && !empty($_POST['RenameFileName']))
	{
		ReNameFile($_POST['RenameFileName'],PDFDIR,$_GET['folder'],$_GET['Pdf'],'ShowPdf');		
	}
	
	echo "</td></tr></table>";
}


?>