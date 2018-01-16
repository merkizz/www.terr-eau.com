<?php

			if (isset($_GET['lang']))
			{
				$content='../content/l'.$_GET['lang'].'/';$dirbackup = $content.'backup/';
				echo "<img src=\"inc/gfx/".$_GET['flag']."\" align=\"middle\" border=\"0\">";
			}
			
			else
			{
				$content=CONTENTL1;$dirbackup = CONTENTL1.'backup/';
			}
			
			copy($dirbackup.$_GET['TheFile'], $content.$_GET['TheFile']);
			
			echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?htdtc=ShowPage&TheFile=".$_GET['TheFile']."&PageName=".$_GET['PageName'].""; if (isset($_GET['lang'])){ echo "&lang=".$_GET['lang']."&flag=".$_GET['flag']."";}  echo "\">";
		
			
?>