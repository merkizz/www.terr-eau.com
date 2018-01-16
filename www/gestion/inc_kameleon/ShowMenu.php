<?php
function ShowMenu(){
	echo '<html><head>';
	JS_htmlarea();JS_IPop_Htdtc();JS_Help_Htdtc();
	echo '<title>'.PAGETITLE.' - '.CLIENT.'</title>
	<META HTTP-EQUIV=\'PRAGMA\' CONTENT=\'NO-CACHE\'>
	<link rel=\'stylesheet\' type=\'text/css\' href=\'inc/gfx/htdtc.css\' />
	<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="inc/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="inc/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript" src="inc/xtra/menu/udm-custom.js"></script>
	<script type="text/javascript" src="inc/xtra/menu/udm-control.js"></script>
	<script type="text/javascript" src="inc/xtra/menu/udm-style.js"></script>
	<script type="text/javascript" src="inc/xtra/menu/udm-dom.js"></script>
	<script type="text/javascript" src="inc/xtra/menu/udm-x-youarehere.js"></script>
	</head>
	<body topmargin=0 leftmargin=0 style=\'border:medium none\'>
	<script language=\'JavaScript\'>InitBulle(\'#333333\',\'transparent\',\'transparent\',2);</script>
	<table border=0 rules=none frame=vsides width=100% align=center cellspacing=0 cellpadding=0>
	<tr><td valign=top class=corps_htdtc>
	<table width=100% border=0 cellspacing=0 cellpadding=0>
	<tr><td valign=center>
		<table border=0 align=left width=100% height=25 cellspacing=0 cellpadding=0>
		<tr>
		<td class=blue_htdtc align=center><nobr>'.SOFTTITLE.'&nbsp;&nbsp;&nbsp;&nbsp;<img src=\'inc/gfx/leftarrow.gif\' width=11 height=8 border=0>&nbsp;<b>'.CLIENT.'</b>&nbsp;<img src=\'inc/gfx/rightarrow.gif\' width=11 height=8 border=0></nobr></td>
		<td class=blue_htdtc align=center valign=center><nobr>';
		echo (LANG2=='YES')? '<a class=flagbouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?kameleon&lang=1&flag='.FLAGLANG1.'.gif\' title=\''.LANGMSG.NAMELANG1.'\'><img name=flaglang1 src=\'inc/gfx/flags/'.FLAGLANG1.'.gif\' align=absbottom border=0 onmouseover=flaglang1.src=\'inc/gfx/flags/'.FLAGLANG1.'over.gif\' onmouseout=flaglang1.src=\'inc/gfx/flags/'.FLAGLANG1.'.gif\'></a>&nbsp;<a class=flagbouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?kameleon&lang=2&flag='.FLAGLANG2.'.gif'.'\' title=\''.LANGMSG.NAMELANG2.'\'><img name=flaglang2 src=\'inc/gfx/flags/'.FLAGLANG2.'.gif\' align=absbottom border=0 onmouseover=flaglang2.src=\'inc/gfx/flags/'.FLAGLANG2.'over.gif\' onmouseout=flaglang2.src=\'inc/gfx/flags/'.FLAGLANG2.'.gif\'></a>':'';		
		echo (LANG3=='YES')? '&nbsp;<a class=flagbouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?kameleon&lang=3&flag='.FLAGLANG3.'.gif\' title=\''.LANGMSG.NAMELANG3.'\'><img name=flaglang3 src=\'inc/gfx/flags/'.FLAGLANG3.'.gif\' align=absbottom border=0 onmouseover=flaglang3.src=\'inc/gfx/flags/'.FLAGLANG3.'over.gif\' onmouseout=flaglang3.src=\'inc/gfx/flags/'.FLAGLANG3.'.gif\'></a>':'';		
		echo (LANG4=='YES')? '&nbsp;<a class=flagbouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?kameleon&lang=4&flag='.FLAGLANG4.'.gif\' title=\''.LANGMSG.NAMELANG4.'\'><img name=flaglang4 src=\'inc/gfx/flags/'.FLAGLANG4.'.gif\' align=absbottom border=0 onmouseover=flaglang4.src=\'inc/gfx/flags/'.FLAGLANG4.'over.gif\' onmouseout=flaglang4.src=\'inc/gfx/flags/'.FLAGLANG4.'.gif\'></a>':'';		
		echo (LANG5=='YES')? '&nbsp;<a class=flagbouton_htdtc href=\''.$_SERVER['PHP_SELF'].'?kameleon&lang=5&flag='.FLAGLANG5.'.gif\' title=\''.LANGMSG.NAMELANG5.'\'><img name=flaglang5 src=\'inc/gfx/flags/'.FLAGLANG5.'.gif\' align=absbottom border=0 onmouseover=flaglang5.src=\'inc/gfx/flags/'.FLAGLANG5.'over.gif\' onmouseout=flaglang5.src=\'inc/gfx/flags/'.FLAGLANG5.'.gif\'></a>':'';
				
		if (VIDEOMUSIC=='YES'){		
		echo "
		<a class=bouton_htdtc href=\"javascript:void(0)\" onmouseover=\"folders.src='inc/gfx/opentriangle_over.gif',AffBulle('<br /><br /><table class=insert_htdtc cellspacing=4 cellpadding=0 onclick=\'HideBulle()\'><tr><td align=right><img class=shadow_htdtc alt=Fermer onmouseover=close1.src=\'inc/gfx/close_over.gif\' onmouseout=close1.src=\'inc/gfx/close.gif\' name=close1 src=\'inc/gfx/close.gif\' align=abstop border=0 onclick=\'HideBulle()\'></td><tr><tr><td align=center><img class=shadow_htdtc src=\'inc/gfx/dossier.gif\' align=absmiddle border=0>&nbsp;<b>".DIRBUTTONTITLE."&nbsp;</b></td></tr>";ShowFolders(IMGDIR,'apphoto','Pics'); ShowFolders(PDFDIR,'pdf_x','Pdf'); ShowFolders(POPDIR,'page_x','Pop'); ShowFolders(SOUNDDIR,'music','Music'); ShowFolders(VIDEODIR,'videos','Videos');echo "<tr><td height=5></td></tr></table>')\" onmouseout=\"folders.src='inc/gfx/opentriangle.gif'\">".DIRBUTTON."<img name=folders src=\"inc/gfx/opentriangle.gif\" border=0/></a>		
		";}else{		
		echo "		
		<a class=bouton_htdtc href=\"javascript:void(0)\" onmouseover=\"folders.src='inc/gfx/opentriangle_over.gif',AffBulle('<br /><br /><table class=insert_htdtc cellspacing=4 cellpadding=0 onclick=\'HideBulle()\'><tr><td align=right><img class=shadow_htdtc alt=Fermer onmouseover=close1.src=\'inc/gfx/close_over.gif\' onmouseout=close1.src=\'inc/gfx/close.gif\' name=close1 src=\'inc/gfx/close.gif\' align=abstop border=0 onclick=\'HideBulle()\'></td><tr><tr><td align=center><img class=shadow_htdtc src=\'inc/gfx/dossier.gif\' align=absmiddle border=0>&nbsp;<b>".DIRBUTTONTITLE."&nbsp;</b></td></tr>";ShowFolders(IMGDIR,'apphoto','Pics'); ShowFolders(PDFDIR,'pdf_x','Pdf'); ShowFolders(POPDIR,'page_x','Pop');echo "<tr><td height=5></td></tr></table>')\" onmouseout=\"folders.src='inc/gfx/opentriangle.gif'\">".DIRBUTTON."<img name=folders src=\"inc/gfx/opentriangle.gif\" border=0/></a>
		";
		}
		echo "
		<a class=bouton_htdtc href=\"".URLSITE."\" target=\"_blank\" onmouseover=\"AffBulle('<br /><br /><span style=\'background-color:white;color:#0033FF\'><b>".URLSITE."</span>".MYSITEMSG."')\" onmouseout=\"HideBulle()\">".MYSITE."</a>		
		<a class=bouton_htdtc href=\"".$_SERVER['PHP_SELF']."?htdtc=Logout\" onmouseover=\"AffBulle('<br /><br />".QUITMSG."')\" onmouseout=\"HideBulle()\">Quitter</a>&nbsp;</nobr>
		</td></tr>
		</table>
	</td></tr>
	<tr><td valign=bottom align=left>";
if (MENUAUTO=='YES'){//Simple Automatic menu :
	$content=(isset($_GET['lang']))? '../content/l'.$_GET['lang'].'/':CONTENTL1;
	echo '<ul id=udm class=udm>';
	echo (isset($_GET['lang']))? '<li><a class=nohref><img src=\'inc/gfx/flags/'.$_GET['flag'].'\' align=middle border=0></a></li>':'';
	
	if ($dh = @opendir($content)) {
		
		$k=0;
		while (($file = readdir($dh))) {
			if (!in_array( $file, $GLOBALS['X'])){
			
			//$showpage = ucfirst(substr((str_replace(strrchr($file,'.'),'',$file)), 2));
		     //   echo '<li><a class=menu_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile='.$file.'&PageName='.$showpage.'';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>'.$showpage.'&nbsp;</a></li>';
		    $TBLFile[$k] = $file;
		 	$k++;	
		    	
		    	}
		}
		sort($TBLFile);
		$nb_menu = count($TBLFile);
		for($i = 0; $i < $nb_menu; $i++)
		{
			$file = $TBLFile[$i];
			$showpage = ucfirst(substr((str_replace(strrchr($file,'.'),'',$file)), 3));
		    echo '<li><a class=menu_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile='.$file.'&PageName='.$showpage.'';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>'.$showpage.'&nbsp;</a>';
			if(substr($file,2,1) == 0 && isset($TBLFile[$i+1]))
			{
				$debut = substr($file,0,2);
				$debut_suiv = substr($TBLFile[$i+1],0,2);
				if($debut == $debut_suiv)
				{
					echo '<ul style="width:150px">';
					while(isset($TBLFile[$i+1]) && $debut == substr($TBLFile[$i+1],0,2))
					{
						$file = $TBLFile[$i+1];						
						$showpage = ucfirst(substr((str_replace(strrchr($file,'.'),'',$file)), 3));
						echo '<li><a class="menu_htdtc" href=\''.$_SERVER['PHP_SELF'].'?htdtc=ShowPage&TheFile='.$file.'&PageName='.$showpage.'';echo (isset($_GET['lang']))? '&lang='.$_GET['lang'].'&flag='.$_GET['flag'].'':''; echo '\'>'.$showpage.'&nbsp;</a></li>';
						$i++;
					}
					echo '</ul>';
				}
			}
			echo '</li>';
		}		
	closedir($dh);clearstatcache();
	}
	
	//echo '<li><a class=menu_htdtc href=\''.$_SERVER['PHP_SELF'].'?htdtc=Tests\'>Tests</a></li>';
	echo '</ul>';
}else{
    Complex_Menu_Htdtc();
}
echo '
	</td></tr>
	</table>
</td></tr>	
<tr>
<td valign=top align=center class=txt1>

';
}

?>