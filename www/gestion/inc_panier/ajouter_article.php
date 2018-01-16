
<?php

/*************************************************************************************************
**                                        ajout article                                         **
*************************************************************************************************/
if($_GET['A'] =='bAdd')
{
	if(isset($_POST['idprod']))
	{ 
		
		// si on a sp�cifi� un produit ainsi qu'une quantit� : 
		// on v�rifie si un panier existe d�ja... 
		
		if(isset($_SESSION['panier']) && is_array($_SESSION['panier']))
		{ 
			// si le panier existe d�ja... 
			$_SESSION['nbprod'] = count($_SESSION['panier']); 
			
			for($i=0;$i<$_SESSION['nbprod'];$i++)
			{ 
				// on fait une boucle qui va passer en revue chaque produit du panier 
				// pour voir si le produit que l'on veut rajouter existe d�ja 
				if($_SESSION['panier'][$i]['idprod'] == $_POST['idprod'])
				{ 
					// le produit existe... 
					$prodin = "true"; 
					// inscrit dans une variable que le produit existe... 
					$prodline = $i; 
					// et on pr�cise aussi quel est son emplacement dans le caddie 
				} 
			} 
			if(isset($prodin) && $prodin == "true")
			{ 
				// si le produit existe d�ja... 
				// ...la quantit� pr�c�dente est effac�e... 
				array_splice($_SESSION['panier'],$prodline,1); 
				// ...pour laisser place � celle qui le client vient de rajouter... str_replace(",",".",$_POST['qte'])
				array_push($_SESSION['panier'],array("idprod" => $_POST['idprod'],"qte" => str_replace(",",".",$_POST['qte']),"pu" => $_POST['pu'])); 
			}
			
			else
			{ 
				// sinon on rajoute le produit dans le panier tt simplement... 
				array_push($_SESSION['panier'],array("idprod" => $_POST['idprod'],"qte" => str_replace(",",".",$_POST['qte']),"pu" => $_POST['pu'])); 
			}     
			//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";   
		}
		
		else
		{ 
			// si le panier n'existe pas... 
			//session_register('panier'); 
			// on le cr�er...
			unset($_SESSION['panValid']); 
			$_SESSION['panValid']=0;
			$_SESSION['panier'] = array (); 
			// on rajoute le produit et la quantit�... 
			array_push($_SESSION['panier'],array("idprod" => $_POST['idprod'],"qte" => str_replace(",",".",$_POST['qte']),"pu" => $_POST['pu'])); 
			// le panier � �t� cr�e... 
			//$_SESSION['nbprod'] = count($panier); 
			//echo $_SESSION['nbprod'];
			//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";    
			//echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
		} 
	} 
}

?>