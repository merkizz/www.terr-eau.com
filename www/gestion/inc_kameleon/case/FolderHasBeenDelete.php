<?php

ShowMenu();
			echo '
	<br><br><span class=blue_htdtc><b>&nbsp;Le dossier&nbsp;<img class=shadow_htdtc src=\'inc/gfx/dossier.gif\' align=absbottom border=0>
	<img class=shadow_htdtc src=\'inc/gfx/'.$_GET['logo'].'.gif\' align=absbottom border=0> '.$_GET['folder'].' a été supprimé.
	<br>Il contenait '.$_GET['nfiles'].' fichiers.</b></span>
	';
			
?>