<?php
/*************************************************************************************************
**                                        suppression article                                  **
*************************************************************************************************/

if($_GET['A'] =='bDel')
{
	if(isset($_GET['idprod'])) 
	{ 
		
		$_SESSION['nbprod'] = count($_SESSION['panier']); 
		for($i=0;$i<$_SESSION['nbprod'];$i++)
		{ 
			// on fait une boucle qui parcours le panier... 
			if($_SESSION['panier'][$i]['idprod'] == $_GET['idprod'])
			{ 
				// une fois arrivé au produit voulu, on le supprime... 
				array_splice($_SESSION['panier'],$i,1); 
			} 
		}
		 
		
		//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
		echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
	} 
}


?>