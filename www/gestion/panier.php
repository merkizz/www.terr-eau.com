<?php 

/*
			CLIENT
           Boutique   :: Sébastien Tristant -> stristant@gmail.com

			<?php include "../gestion/panier.php"; ?>
			
			<form method="POST" action="panier.php?A=bAdd" name="addprod<?=$row["id_produit"]?>">
			<input type=hidden name=idprod value="<?=$row["id_produit"]?>">
			<input type=hidden name=pu value=\"".$row["prix"]."\">
			
			
			
			<input name=qte type=text value=1  />
			<img style="cursor:hand" src="../gfx/bouton_panier.gif" align=absbottom  onclick="addprod<?php echo $row["id_produit"];?>.submit();">
			</form>
*/			
if (isset($_GET['A']) && !empty($_GET['A']))
{
	if(isset($_SESSION['language']) && $_SESSION['language']=='fr'){$fichierlang='panier_fr';$pays='nom_fr';$desc='nomfr';}
	elseif(isset($_SESSION['language']) && $_SESSION['language']=='en'){$fichierlang='panier_en';$pays='nom_fr';$desc='nomen';}

	else{$fichierlang='panier_fr';$pays='nom_fr';$desc='nomfr';}   
	require_once 'inc/lang/'.$fichierlang.'.php';



	require_once "inc/misc.php";//(DB_Connexion ();)
		
		
	DB_Connexion ();css_panier ();JS_Help_Htdtc();JS_IPop_Htdtc();JS_CPop2_Htdtc();
	echo "<script language=\"JavaScript\">InitBulle(\"transparent\",\"transparent\",\"transparent\",2);</script>";


	// Includes du fonctionnement du panier
	require_once("inc_panier/affiche_panier.php");
	require_once("inc_panier/affiche_client.php");
	require_once("inc_panier/moyen_paiement.php");
	require_once("inc_panier/validation_paiement.php");
	require_once("inc_panier/sauvegarde_paiement.php");
	require_once("inc_panier/annuler_commande.php");
	require_once("inc_panier/supprimer_article.php");
	require_once("inc_panier/modifier_panier.php");
	require_once("inc_panier/ajouter_article.php");
	require_once("inc_panier/identification.php");
	require_once("inc_panier/ajouter_client.php");
	require_once("inc_panier/deconnection.php");
	require_once("inc_panier/information_client.php");
	require_once("inc_panier/information_commande_client.php");

	echo "</div>"; // Semble fermer celui de sauvegarde_paiement.php ligne ~200
}

else
{
	//echo "<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
	echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
}
?> 
