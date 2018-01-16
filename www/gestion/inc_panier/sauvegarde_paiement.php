<?php


/*************************************************************************************************
**                             validation commande - enregistrement                             **
*************************************************************************************************/
if($_GET['A'] =='bSave')
{

	/*
	$MailMsgAdr_livr="";$MailMsgAdr_factur="";
	JS_CPop_Htdtc();
	if (isset($_SESSION['adr_livr'])){
		$adr_livr=$_SESSION['adr_livr'];$adrclt_adrlivr=1;
		$MailMsgAdr_factur=MailMsgAdr_factur;
		$MailMsgAdr_livr=MailMsgAdr_livr.$adr_livr;
		}else{
		$MailMsgAdr_factur=MailMsgAdr_facturBoth;
		$adr_livr="";$adrclt_adrlivr=0;
		$MailMsgAdr_livr="";
		}
	*/

	//if($_SESSION['language']=='fr'){$fichierlang='panier_fr';$pays='nom_fr';$desc='nomfr';}      
	//elseif($_SESSION['language']=='en'){$fichierlang='panier_en';$pays='nom_fr';$desc='nomfr';}   

	$_SESSION['PayMod']=$_GET['PayMod'];
	
	$aujourdhui = date("Y-m-d H:i:s");$ref1=date("Ymd");

	$cmd = mysql_query("SELECT ref_cmd, montant, fraisport, paiement, date_cmd, adrclt_adrlivr, adr_factur, adr_livr, civclt, nomclt, prenomclt, adrmailclt, clients.id_client, telclt, portclt FROM commandes LEFT JOIN clients ON (commandes.id_client=clients.id_client) WHERE id_cmd='".$_GET['idc']."'");		
	$rowcmd = mysql_fetch_array($cmd);			
	$AdrMailNewCmd=$rowcmd['adrmailclt'];
	$datecmd_fr=((substr($rowcmd['date_cmd'],8,2)).'-'.(substr($rowcmd['date_cmd'],5,2)).'-'.(substr($rowcmd['date_cmd'],0,4)).'&nbsp;&nbsp;'.(substr($rowcmd['date_cmd'],10,9)));	
	
	$AdresseFacturation="";
	if ($rowcmd['adrclt_adrlivr']==0){$AdresseFacturation=MailMsgAdr_facturBoth."<br>";}else{$AdresseFacturation=BillAdress."<br>";}
	$AdresseFacturation.="<br /><b>".nl2br($rowcmd['adr_factur'])."";
		
	$AdresseLivraison="";			
	if ($rowcmd['adrclt_adrlivr']==1)
	{
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

	//$order_id=$rowcmd['ref_cmd'].$_GET['idc'];
	$order_id=$rowcmd['ref_cmd'].$_GET['idc']."-".$rowcmd['id_client'];

	$det="
	SELECT *
		FROM detail_cmd	       		       		
		LEFT JOIN produit_detail ON (detail_cmd.id_produit=produit_detail.id_produit_detail)
		LEFT JOIN produits ON (produit_detail.id_produit=produits.id_produit) 	           	
		WHERE id_cmd=".$_GET['idc'];


	$detailcmd = mysql_query($det);	
	
	//exit($det);
						
	$Msgdetailcmd="";		
	
	while($rowdetailcmd = mysql_fetch_array($detailcmd)) 
	{			
		//if ($_GET['language']=='fr'){}else{$nomtypproduitl='nom_uk';}
		$nomtypproduitl='nomfr';			
		
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
		<td align=right>".$rowdetailcmd['prixu']." &euro;</td>
		<td align=right>".$rowdetailcmd['qte']."</td>
		<td align=right>".number_format(($totalLigne), 2, ',', ' ')." &euro;</td></tr>
		";
		//$poidsbruttotal+=$poidsbrut;
	}
	
	//$total+=$rowcmd['fraisport'];
	$grandtotal=$total+$rowcmd['fraisport'];

	$commande="<html>
	<head>
	<title>".$rowcmd['civclt']."&nbsp;".$rowcmd['nomclt']."&nbsp;".$rowcmd['prenomclt']."&nbsp;*&nbsp;".Facture." ".$rowcmd['ref_cmd']."</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	".CSS_MAIL."
	</head>
	<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>		
	<table border=0 width=100% cellspacing=0 cellpadding=0 align=center bgcolor=white>
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
	
	<a href=\"../gestion/cmdprint.php?idc=".$_GET['idc']."&PayMod=".$_GET['PayMod']."\" target=\"_blank\">[Imprimer cette commande]</a>
	
	</div>
	</td>
	</tr></table>
	</td></tr>
	<tr height=10><td></td></tr>

	<tr>
		<td valign=top>
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
		</td>
	</tr>
	<tr height=30><td></td></tr>

	<tr><td>
			<table width=98% class=brdtbl border=1 align=center cellspacing=2 cellpadding=2>
			<tr><td colspan=6>".DetailCMD." </td>
			   <tr class=ligne height=25><th align=left>&nbsp;".ThDesignation."</th><th>Ref.</th><th>".ThUnitPrice."</th><th>Qte</th><th>".ThTotal."</th></tr>
				".$Msgdetailcmd."
			  
			<tr class=ligne height=3><td colspan=5></td></tr>
			
			<tr><td colspan=4 align=right><b>Total produits :</b></td><td align=right>".number_format($total, 2, ',', ' ')." &euro;</td></tr>";
			
			//echo "<tr><td colspan=4 align=right><b>Frais de port :</b></td><td align=right>".number_format($rowcmd['fraisport'], 2, ',', ' ')." &euro;</td></tr>";


			echo "<tr><td colspan=4 align=right><b>".TotalCmd." :</b></td><td align=right>".number_format($grandtotal, 2, ',', ' ')." &euro;</td></tr>
			
			<tr><td colspan=4 align=right><b>".ModeReglement." :</b></td><td align=right>".$_GET['PayMod']."</td></tr>
			
			</table>
			<br><br>
	</td></tr>
	
	<tr>
		<td align=center class=txtnoir>
		<br /><br />
		<hr color=black size=1>
		S.A. ESPINET - S.A. au capital de 155.000 €uros.<br />
		R.C. SARLAT 77 B 36 - Sirène 331 461 982 - APE 151C - TVA : FR 90 311 641 982<br />
		N° Agrément CEE : Conserverie : F 24.432.02, Atelier découpe : F 24.053.07
		</td>
	</tr>
	</table>";	

	if ($rowcmd['paiement']=='cbproblem')
	{
		//echo "PROBLEME PAIEMENT";
		echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bPayMod&CBproblem\">";	

	}
	else
	{
		//PAIEMENT OK
		echo "
		<center>
		<table cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" class=\"brdtbl\"><tr><td bgcolor=\"#EEEEEE\">
		&nbsp;".Merci."	
		</td></tr></table>
		<table border=0  width=100% class=brdtbl bordercolor=\"#EEEEEE\" align=center cellspacing=3 cellpadding=3>		
		<tr><td colspan=3 align=center><div align=justify>";
		
		if (isset($_SESSION['panier']))
		{
			echo "<b>".Cher." ".$_SESSION['str_identifie']."</b>,
			<br />".Merci2.",<br /><br /><b>".MsgModeReglement." :</b><br />";
						
			if ($_SESSION['PayMod']=='cheque')
			{	
				echo MsgModeReglementChq
				."<br />".MailConfirmSend." <b>".$rowcmd['adrmailclt']."</b><br /><br />"
				.MsgModeReglementChq2."<br><b>".INFOSITEHTML1."</b>";
				
				$message=$commande;
				
				mail(MAIL_DEVELOPPEUR,CLIENT." New cmd by cheq",$message,$headers);		
				mail($AdrMailNewCmd,CLIENT." : ".YourOrder." ",$message,$headers);
				mail(MAIL_WEBMASTER,CLIENT." : Intention de commande par chèque ",$message,$headers);
			}
			elseif ($_SESSION['PayMod']=='cb')
			{
			
				echo MsgModeReglementCB
				."<br />".MailConfirmSend." <b>".$rowcmd['adrmailclt']."</b><br /><br />";			
				$message=$commande;
				
				//Le mail a été envoyé avec call_autoresponse.php	
			
				/*										
				$AvantLaVirgule=substr($amount,0,(strlen($amount)-2));			          
				$ApresLaVirgule = substr($amount, -2);
				$newAmount=$AvantLaVirgule.",".$ApresLaVirgule;
					
						
				$ref_transac="<br><br>
				<hr color=black size=1><br>
				<table border=0  class=brdtbl  cellspacing=2 cellpadding=2 align=center>
				<tr><td align=center colspan=2>".SecureP."</td></tr>
				<tr><td colspan=2><b>".TransmRef." :</b></td></tr>
				<tr><td>".TransmDate."  </td><td><b>".$transmission_date." (UTC/GMT)</b></td></tr>
				<tr><td>".TransmWeb."  </td><td><b>".URLSITE."</b></td></tr>
				<tr><td>".MerchantId."  </td><td><b>".$merchant_id."</b></td></tr>
				<tr><td>".TransmId."  </td><td><b>".$transaction_id."</b></td></tr>
				<tr><td>".TransmAmount."  </td><td><b>".$newAmount." €</b></td></tr>
				<tr><td>".CardNumber."  </td><td><b>".$card_number."#### #### ##</b></td></tr>
				<tr><td>".AuthorisationId."  </td><td><b>".$authorisation_id."</b><br>
				<tr><td>Certificat de la transaction  </td><td><b>".$payment_certificate."</b></td></tr>
				<tr><td align=center colspan=2><small>Merci de conserver la référence de la transaction.</small></td></tr>
				</table>
				<br>
				</body></html>
				";
				$message=$commande.$ref_transac;

				*/
			}
		}
		
		else
		{
			echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
		}
		
		echo "</td></tr></table><br><br><br>";


		mysql_query("UPDATE commandes SET id_etat_cmd=1 WHERE id_cmd=".$_GET['idc']."");

		echo $message;

		$_SESSION['panValid']=1;
		$_SESSION['montant']=0;
		unset($_SESSION['panier']);
		unset($_SESSION['PayMod']);
		if (isset($_SESSION['adr_livr'])){unset($_SESSION['adr_livr']);} 
		if (isset($_SESSION['TempNewCli'])){unset($_SESSION['TempNewCli']);}
	}
}

?>