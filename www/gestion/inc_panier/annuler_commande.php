<?php

/*************************************************************************************************
**                             Annulation commande                                              **
*************************************************************************************************/

if($_GET['A'] =='bUnset')
{
	unset($_SESSION['panier']); 
	
	if (isset($_SESSION['TempNewCli']))
	{
		unset($_SESSION['TempNewCli']); 
	}
	
	if (isset($_SESSION['TempNewCliLivr']))
	{
		unset($_SESSION['TempNewCliLivr']); 
	}
	
	echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
}



?>