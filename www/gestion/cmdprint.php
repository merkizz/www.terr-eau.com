<?php
session_start();
require_once "inc/misc.php";
require_once 'inc/lang/panier_fr.php';
DB_Connexion ();


$aujourdhui = date("Y-m-d H:i:s");$ref1=date("Ymd");

$cmd = mysql_query("SELECT ref_cmd, montant, fraisport, paiement, date_cmd, adrclt_adrlivr, adr_factur, adr_livr, civclt, nomclt, prenomclt, adrmailclt, clients.id_client, telclt, portclt FROM commandes LEFT JOIN clients ON (commandes.id_client=clients.id_client) WHERE id_cmd='".$_GET['idc']."'
		");		
		$rowcmd = mysql_fetch_array($cmd);			
		$AdrMailNewCmd=$rowcmd['adrmailclt'];
		$datecmd_fr=((substr($rowcmd['date_cmd'],8,2)).'-'.(substr($rowcmd['date_cmd'],5,2)).'-'.(substr($rowcmd['date_cmd'],0,4)).'&nbsp;&nbsp;'.(substr($rowcmd['date_cmd'],10,9)));	
		
		$AdresseFacturation="";
		if ($rowcmd['adrclt_adrlivr']==0){$AdresseFacturation=MailMsgAdr_facturBoth."<br>";}else{$AdresseFacturation=BillAdress."<br>";}
		$AdresseFacturation.="<br /><b>".nl2br($rowcmd['adr_factur'])."";
			
		$AdresseLivraison="";			
		if ($rowcmd['adrclt_adrlivr']==1){
			
			$AdresseLivraison="
			<table class=brdtbl border=0 width=100% cellspacing=2 cellpadding=2 align=center>
			<tr>		
			<td valign=top>				
			".MailMsgAdr_livr."		
			<br /><br /><b>
			".nl2br($rowcmd['adr_livr'])."
			</b><br /></td></tr>
			</table>
			";
			}
		$total=0;

		$order_id=$rowcmd['ref_cmd'].$_GET['idc']."-".$rowcmd['id_client'];


		$det="
		SELECT *
	       	FROM detail_cmd	       		       		
	       	LEFT JOIN produit_detail ON (detail_cmd.id_produit=produit_detail.id_produit_detail)
	       	LEFT JOIN produits ON (produit_detail.id_produit=produits.id_produit) 	           	
	       	WHERE id_cmd=".$_GET['idc'];


		$detailcmd = mysql_query($det);	
		
     	
	       //echo $det;
	       	//exit;
	       		       		
	       	$Msgdetailcmd="";			
		while($rowdetailcmd = mysql_fetch_array($detailcmd)) {
			
			//if ($_GET['language']=='fr'){}else{$nomtypproduitl='nom_uk';}
			$nomtypproduitl='nomfr';
			/*
			$typ= mysql_query("SELECT ".$nomtypproduitl." AS nomtypproduitl FROM typproduit WHERE id_typproduit='".$rowdetailcmd['id_typproduit']."'");	       	
			$rowdetailtyp = mysql_fetch_array($typ);
			
			*/
			
			//$poidsbrut=$rowdetailcmd['poids_brut']*$rowdetailcmd['qte'];
			$totalLigne=$rowdetailcmd['prixu']*$rowdetailcmd['qte'];
			
			//$total=$total+($rowdetailcmd['prixu']*$rowdetailcmd['qte']);	
			$total+=$totalLigne;
			
			$Msgdetailcmd.="			
			<tr>			
			<td width=350>".$rowdetailcmd['nomfr'] ."<br>			
			".$rowdetailcmd["formatfr"]."														
			<br />	
			Poids : ".$rowdetailcmd["poids"]." g														
			<br />
			</td>
			<td align=right>".$rowdetailcmd['reference']."</td>		
			<td align=right>".$rowdetailcmd['prixu']."</td>
			<td align=right>".$rowdetailcmd['qte']."</td>
			<td align=right>".number_format(($totalLigne), 2, ',', ' ')." &euro;</td></tr>
			";
			//$poidsbruttotal+=$poidsbrut;
			}
		//$total+=$rowcmd['fraisport'];
		$grandtotal=$total+$rowcmd['fraisport'];
		
		
if ($_GET['PayMod']=='cheque'){
$reglt="	
<tr><td align=center class=txtnoir>
<b>Joindre votre règlement par chèque bancaire ou postal à l'ordre de ".CLIENT."</b>
</td></tr>
";
}else{$reglt='';}
		

$commande="	
<html>
<head>
<title>".$rowcmd['civclt']."&nbsp;".$rowcmd['nomclt']."&nbsp;".$rowcmd['prenomclt']."&nbsp;*&nbsp;".Facture." ".$rowcmd['ref_cmd']."</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
".CSS_MAIL."
</head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>		
<table border=0 width=650 cellspacing=0 cellpadding=0 align=left bgcolor=white>
<tr><td align=center class=txtnoir>
<b>
<br />".INFOSITEHTML2."<br /><hr color=black size=1>
</td></tr>
<tr><td valign=top>
	<table border=0 width=98% cellspacing=0 cellpadding=0 align=center>
	<tr><td width=50% valign=top class=txtnoir>
	<b>BON DE COMMANDE</b><br  />
	<br  />Date : <b>".$datecmd_fr."</b>
	<br  />".RefFacture." : <b>".$order_id."</b>
	</td>
	<td width=50% valign=top align=center class=txtnoir>
	
	<div id=htdtc_print>
	<br />
	<a href=\"javascript:window.print()\">[Imprimer cette commande]</a>
	
	</div>
	
	</td>
	</tr></table>
</td></tr>
<tr height=10><td></td></tr>



<tr><td valign=top>
	<table border=0 width=98% cellspacing=0 cellpadding=0 align=center>
	<tr>	
	<td width=45% valign=top>		
		<table class=brdtbl border=0 width=100% cellspacing=2 cellpadding=2 align=center>
		<tr><td valign=top>
		".$AdresseFacturation."
		<br /><br />
		Tel : ".$rowcmd['telclt']."
		<br />
		E-mail : ".$rowcmd['adrmailclt']."
		</td></tr>
		</table>			
	</td>
	<td width=5%></td>
	<td width=45% valign=top>
	".$AdresseLivraison."
	</td>		
	</tr>
	</table>	
</td></tr>
<tr height=30><td></td></tr>

<tr><td>
		<table width=98% class=brdtbl border=1 align=center cellspacing=2 cellpadding=2>
		<tr><td colspan=6>".DetailCMD." </td>
	       <tr class=ligne height=25><th align=left>&nbsp;".ThDesignation."</th><th>Ref.</th><th>".ThUnitPrice."</th><th>Qte</th><th>".ThTotal."</th></tr>
	       	".$Msgdetailcmd."
	      
		<tr class=ligne height=3><td colspan=4></td></tr>
		
		<tr><td colspan=4 align=right><b>Sous Total TTC :</b></td><td align=right>".number_format($total, 2, ',', ' ')." &euro;</td></tr>
		<!--
		<tr><td colspan=4 align=right><b>Frais de port :</b></td><td align=right>".number_format($rowcmd['fraisport'], 2, ',', ' ')." &euro;</td></tr>
		-->						
		<tr><td colspan=4 align=right><b>".TotalCmd." :</b></td><td align=right>".number_format($grandtotal, 2, ',', ' ')." &euro;</td></tr>
		
		<tr><td colspan=4 align=right><b>".ModeReglement." :</b></td><td align=right>".$_GET['PayMod']."</td></tr>
		
		</table>
		<br><br>
</td></tr>

".$reglt."


<tr><td align=center class=txtnoir>
<br /><br />
<hr color=black size=1>
S.A. ESPINET - S.A. au capital de 155.000 €uros.<br />
R.C. SARLAT 77 B 36 - Sirène 331 461 982 - APE 151C - TVA : FR 90 311 641 982<br />
N° Agrément CEE : Conserverie : F 24.432.02, Atelier découpe : F 24.053.07
</td></tr>
</table>
";	

echo $commande;
?>













</body></html>












