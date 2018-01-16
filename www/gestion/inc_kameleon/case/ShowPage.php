<?php

ShowMenu ();
if (isset($_GET['TheFile']))
{
	echo '
	<table border=0 width=100% cellspacing=0 cellpadding=0>
	<tr><td colspan=2 height=5></td></tr>
	<tr><td width=50% class=pagename_htdtc align=right>';

	if (isset($_GET['PopFolder']))
	{
		$content='../content/pop/'.$_GET['PopFolder'].'/';
	}
	else
	{
		if (isset($_GET['lang']))
		{
			$content='../content/l'.$_GET['lang'].'/';
		}
		else
		{
			$content=CONTENTL1;
		}
	}
	
	$modif=date ("d-m-Y H:i:s", filemtime($content.$_GET['TheFile']));
	if (isset($_GET['lang']))
	{
		echo '<img src=\'inc/gfx/flags/'.$_GET['flag'].'\' align=absmiddle border=0>&nbsp;';
	}
	
	echo $_GET['PageName'].'&nbsp;</td><td>
	&nbsp;<img src=\'inc/gfx/b_edit.png\' border=0 align=absbottom>&nbsp;<img src=\'inc/gfx/leftarrow.gif\' width=11 height=8 border=0>&nbsp;<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=UpdatePage&TheFile='.$_GET['TheFile'].'&PageName='.$_GET['PageName'].''; if (isset($_GET['lang'])){echo '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'';} if (isset($_GET['PopFolder'])){echo '&PopFolder='.$_GET['PopFolder'].'';}echo '\'>'.MODIFYBUTTON.'</a>
	<a class=bouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowBackup&TheFile='.$_GET['TheFile'].'&PageName='.$_GET['PageName'].''; if (isset($_GET['lang'])){echo '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'';} echo '\'>'.SHOWBACKUPBUTTON.'</a>
	'.HISTORYGOBACK.'</td></tr>
	<tr><td colspan=2 height=5></td></tr>
	<tr><td colspan=2>
	<table border=0 class=infoss width='.BODYWIDTH.' align=center>
	<tr><td>Dernières modifications : ',$modif,'</td></tr></table>
	<table bgcolor=\''.BCKGRNDCLR.'\' border=0 class=CltWindowBorders_htdtc width='.BODYWIDTH.' align=center>
	<tr><td>';
	$content =  file_get_contents($content.$_GET['TheFile']);
	echo BEGINSTYLE.stripslashes($content).ENDSTYLE.'</td></tr></table></td></tr></table>';
}
			
?>