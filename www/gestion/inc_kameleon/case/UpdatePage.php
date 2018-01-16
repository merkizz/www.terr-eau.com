<?php

ShowMenu ();

echo '<form method=\'POST\' name=\'HtdtcFormUpdate\' action=\''.$_SERVER['PHP_SELF'].'?htdtc=SaveUpdatePage\'>
<table border=0 width=100% cellspacing=0 cellpadding=0>
<tr><td colspan=2 height=5></td></tr>
<tr><td width=50% class=pagename_htdtc align=right>',$_GET['PageName'],'&nbsp;</td><td>';

if (isset($_GET['lang']))
{
	echo '<img src=\'inc/gfx/flags/',$_GET['flag'],'\' align=absmiddle border=0>&nbsp;';
}

echo '
<span class=infos_htdtc>&nbsp;',CHANGEPAGEMSG,'&nbsp;</span>
<input type=\'submit\' class=formbouton_htdtc value=\'',SAVE,'\' />
<input type=\'button\' class=formbouton_htdtc value=\'',ABORT,'\' onclick=\'javascript:history.go(-1);\' />
</td></tr>
<tr><td colspan=2 height=5></td></tr>
<tr><td colspan=2>
<table class=corps_htdtc border=0 width=100% align=center cellpadding=0 cellspacing=0>
<tr>
<td valign=top>
<table class=corps_htdtc width=100% border=0 align=center cellpadding=0 cellspacing=0>';

if (isset($_GET['pics']))
{
	echo '<tr><td align=left valign=top>';ShowFieldPics();echo '</td></tr>';
}

elseif(isset($_GET['pdf']))
{
	echo '<td align=left valign=top>';ShowFieldPdf();echo '</td></tr>';
}
elseif(isset($_GET['pop']))
{
	echo '<td align=left valign=top>';ShowFieldPop();echo '</td></tr>';
}
elseif(isset($_GET['Music']))
{
	echo '<td align=left valign=top>';ShowFieldMusic();echo '</td></tr>';
}
elseif(isset($_GET['videos']))
{
	echo '<td align=left valign=top>';ShowFieldVideos();echo '</td></tr>';
}

if (!isset($_GET['pics'])  && !isset($_GET['pdf']) && !isset($_GET['pop']) && !isset($_GET['Music']) && !isset($_GET['videos']))
{
	echo '<tr><td height=20 colspan=2 align=center valign=center class=shadow_htdtc>';Insert();echo '&nbsp;</td></tr>';
}

echo '<tr><td align=center valign=top>';

if (isset($_GET['PopFolder']))
{
	$content='../content/pop/'.$_GET['PopFolder'].'/';
	echo '<input type=\'hidden\' name=\'content\' value=\'',$content,'\'><input type=\'hidden\' name=\'PopFolder\' value=\'',$_GET['PopFolder'],'\'>';
}

else
{
	if (isset($_GET['lang']))
	{
		$content='../content/l'.$_GET['lang'].'/';
		echo '<input type=\'hidden\' name=\'lang\' value=\'',$_GET['lang'],'\'>
		<input type=\'hidden\' name=\'flag\' value=\'',$_GET['flag'],'\'>
		<input type=\'hidden\' name=\'content\' value=\'',$content,'\'>';
	}
	else
	{
		$content=CONTENTL1;
		echo '<input type=\'hidden\' name=\'content\' value=\'',CONTENTL1,'\'>';
	}
}

echo '
<input type=\'hidden\' name=\'TheFile\' value=\'',$_GET['TheFile'],'\'>
<input type=\'hidden\' name=\'lapage\' value=\'',$_GET['PageName'],'\'>
<table bgcolor=buttonface align=center width=',BODYWIDTH,' cellpadding=0 cellspacing=0><tr><td>';
$content =  file_get_contents($content.$_GET['TheFile']);
//$content = str_replace('border=0','border=2',$content);
$oFCKeditor = new FCKeditor('FCKeditor1');
$oFCKeditor->BasePath = 'inc/editor/';
$oFCKeditor->Height = '500' ;
$oFCKeditor->ToolbarSet = 'HTDTCToolbar' ;
//$oFCKeditor->ToolbarSet = 'Default' ;
#$oFCKeditor->Config['EnterMode'] = 'br';
$oFCKeditor->Config['EditorAreaStyles'] = 'body { background-color: '.BCKGRNDCLR.'; color: '.TXTCLR.';}';
$oFCKeditor->Value = stripslashes($content);
$oFCKeditor->Create();

echo '</td></tr></table>
<tr><td align=center><br><input type=\'submit\' class=formbouton_htdtc value=\'',SAVE,'\' />
<input type=\'button\' class=formbouton_htdtc value=\'',ABORT,'\' onclick=\'javascript:history.go(-1);\' />
<br /><br />
</td></tr></table></td></tr></table></form>';

?>