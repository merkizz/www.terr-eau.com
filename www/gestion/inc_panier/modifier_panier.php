
<?php

/*************************************************************************************************
**                                        maj panier                                            **
*************************************************************************************************/
if($_GET['A'] =='bUpdate')
{
	$_SESSION['nbprod']=count($_SESSION['panier']); 
	
	for($i=0;$i<$_SESSION['nbprod'];$i++)
	{ 
		if(isset($_POST['idprod'.$i]) && isset($_POST['qte'.$i]))
		{ 
			//echo $_POST['idprod'.$i]."-------".$_POST['qte'.$i];
			// on v�rifie qu'un produit et une 'nouvelle' quantit� ont �t� sp�cif�s... 
			// si oui, 
			
			if($_POST['qte'.$i] != 0)
			{ 
				// si la 'nouvelle' quantit� est diff�rente de z�ro.... 
				//$_SESSION['nbprod'] = count($_SESSION['panier']); 
				
				for($i=0;$i<$_SESSION['nbprod'];$i++)
				{ 
					// on fait une boucle qui passe en revue chaque �l�ment du panier... 
					if ($_SESSION['panier'][$i]['idprod'] == $_POST['idprod'.$i]) 
					{ 
						// lorsque l'on tombe sur le produit � modifier, 
						// on donne la valeur de la 'nouvelle' quantit� � la quantit� du produit dans le panier... 
						$_SESSION['panier'][$i] = array("idprod" => $_POST['idprod'.$i],"qte" => str_replace(",",".",$_POST['qte'.$i]),"pu" => $_POST['pu'.$i]); 
					} 
				} 
			}
			
			else
			{ 
				// si la 'nouvelle' quantit� est �gale � 0, ca revient au m�me que de supprimer... 
				//$_SESSION['nbprod'] = count($_SESSION['panier']); 
				for($i=1;$i<$_SESSION['nbprod'];$i++)
				{ 
					// on fait une boucle qui passe en revue tout le panier... 
					if($_SESSION['panier'][$i]['idprod'] == $_POST['idprod'.$i])
					{ 
						// d�s qu'on tombe sur la valeur � 'modifier'(ici en l'occurence il s'agit de supprmier ..) 
						array_splice($_SESSION['panier'],$i,1); 
					} 
				} 
			} 
		} 
	}
	//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
	echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
}

?>