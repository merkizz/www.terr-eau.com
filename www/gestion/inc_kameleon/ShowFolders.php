<?php

//FOLDERS
function ShowFolders($fdir,$logo,$typ){
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
	        echo "<tr><td>&nbsp;<img class=shadow_htdtc src=\'inc/gfx/".$logo.".gif\' align=absmiddle border=0>&nbsp;<a class=myfolders_htdtc href=\'".$_SERVER['PHP_SELF']."?htdtc=OnlyShow".$typ."&folder=".$Folder."\'>".$Folder."</a>&nbsp;<a title=\'Supprimer le dossier ".$Folder."\' href=\'".$_SERVER['PHP_SELF']."?htdtc=OnlyShow".$typ."&folder=$Folder&DelF&fdir=".$fdir."&logo=".$logo."\'><img class=shadow_htdtc src=inc/gfx/b_drop.png align=absbmiddle border=0></a></td></tr>";
		}
	 }
	}
}

?>