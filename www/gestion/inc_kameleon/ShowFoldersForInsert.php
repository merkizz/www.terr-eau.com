<?php


/*
function ShowFoldersForInsert($fdir,$logo,$typ){
   $nmax=0;
	if ($dh = opendir($fdir)) {	
	 while (($Folder = readdir($dh))) {
		if (!in_array($Folder, $GLOBALS['X'])){
		if ($nmax==5){echo "<tr><td>&nbsp;<img class=shadow_htdtc src=\'inc/gfx/".$logo.".gif\' align=absmiddle border=0></td>"; $nmax=0;}		
	        echo "<td>&nbsp;<a class=bouton_htdtc href=\'".$_SERVER['PHP_SELF']."?htdtc=UpdatePage&TheFile=".$_GET['TheFile']."&PageName=".$_GET['PageName']."&".$typ."&folder=".$Folder.""; if (isset($_GET['lang'])){echo "&lang=".$_GET['lang']."&flag=".$_GET['flag']."";} if (isset($_GET['PopFolder'])){echo "&PopFolder=".$_GET['PopFolder']."";} echo "\'  onclick=\'window.document.all.HtdtcFormUpdate.submit();\'>".$Folder."</a></td>";
		$nmax++;
		}					 	
	 }
	}
}

LE onclick=\'window.document.all.HtdtcFormUpdate.submit();\' semble poser un problème
*/

function ShowFoldersForInsert($fdir,$logo,$typ){
   $nmax=0;
	if ($dh = opendir($fdir)) {	
	$z=0;
		 while (($Folder = readdir($dh))) {
		 	$TBLFolder[$z] = $Folder;
		 	$z++;
		}
		asort($TBLFolder);	
		
	foreach ($TBLFolder as $key => $Folder) {	
	 //while (($Folder = readdir($dh))) {
		if (!in_array($Folder, $GLOBALS['X'])){
		if ($nmax==5){echo "<tr><td>&nbsp;<img class=shadow_htdtc src=\'inc/gfx/".$logo.".gif\' align=absmiddle border=0></td>"; $nmax=0;}		
	        echo "<td>&nbsp;<a class=bouton_htdtc href=\'".$_SERVER['PHP_SELF']."?htdtc=UpdatePage&TheFile=".$_GET['TheFile']."&PageName=".$_GET['PageName']."&".$typ."&folder=".$Folder.""; if (isset($_GET['lang'])){echo "&lang=".$_GET['lang']."&flag=".$_GET['flag']."";} if (isset($_GET['PopFolder'])){echo "&PopFolder=".$_GET['PopFolder']."";} echo "\' >".$Folder."</a></td>";
		$nmax++;
		}					 	
	 }
	}
}
?>