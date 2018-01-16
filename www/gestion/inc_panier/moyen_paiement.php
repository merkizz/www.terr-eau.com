<?php

if($_GET['A'] =='bPayMod')
{
/*************************************************************************************************
**                                        moyens de paiement                                    **
*************************************************************************************************/

	if ($_SESSION['montant']!=0)
	{

		echo "<table cellSpacing=0 cellPadding=0 width=600 class=brdtbl align=center><tr bgcolor=\"#EEEEEE\"><td>
		&nbsp;<b>Moyens de paiement</b></td>
		<!--<td align=right><a href=\"#\" class=panier onclick=\"javascript:history.go(-1);\">&lt;&lt; Retour</a>&nbsp;</td>-->
		</tr>
		</table><br />
		<table border=0 cellSpacing=4 cellPadding=0 width=600 class=brdtbl align=center>
		<tr><td bgcolor=\"#EEEEEE\" valign=middle align=center><b>Le montant total de votre commande s'élève à 
		<span class=important><big>".number_format($_SESSION['montant'], 2, ',', ' ')." &euro;</big>&nbsp;&nbsp;(".round(($_SESSION['montant']*6.55957),2)." FF)</span></td></tr>
		<tr><td valign=middle align=center>
		Sélectionnez ci-dessous votre moyen de paiement<br /><br />
		</td></tr>
		<tr id=trchqpaymod><td bgcolor=\"#EEEEEE\" valign=middle id=tdchqpaymodtitle><b><input type=\"radio\" name=\"bPayMod\" value=\"0\"  onclick=\"document.all.tdcbpaymodtitle.className='none';document.all.tdchqpaymodtitle.className='important';document.all.tdchqpaymod.style.display='';document.all.tdcbpaymod.style.display='none';\" /> Paiement par chèque</td></tr>
		<tr><td valign=middle align=center id=tdchqpaymod  style=\"display:";
		
		if (isset($_GET['CBproblem']))
		{
			echo "";
		}
		else
		{
			echo "none";
		}
		
		echo "\">";
		
		
		if (isset($_GET['CBproblem']))
		{
			echo "<script language=\"JavaScript\">
			document.all.tdchqpaymodtitle.className='important';
			document.all.bPayMod.checked=1;
			</script>
			<span class=important>La transaction par carte bancaire a échouée<br>Désirez-vous régler par chèque ?</span><br><br>";
		}
		
		echo "<b>En cliquant ci-dessous sur le lien \"Continuer\", votre commande sera validée et enregistrée ;</b><br />
		vous pourrez ainsi imprimer la facture et nous la renvoyer accompagnée de votre règlement à l'adresse ci-dessous.<br />
		<br>A l'ordre de : ".CLIENT."<br>
		Vous recevrez également une copie de votre commande par e-mail.<br />
		<br />
		<b>".INFOSITEHTML1."</b>
		<br /><br />

		<a class=panier2 href=\"".$_SERVER['PHP_SELF']."?A=bValidPayMod&PayMod=cheque\"><b><u>&gt;&gt;Continuer</u></b></a>
		<br /><br />
		</td></tr>
		<tr><td bgcolor=\"#EEEEEE\" valign=\"middle\" id=tdcbpaymodtitle><b><input type=\"radio\" name=\"bPayMod\" value=\"1\"  onclick=\"document.all.tdchqpaymodtitle.className='none';document.all.tdcbpaymodtitle.className='important';document.all.tdchqpaymod.style.display='none';document.all.tdcbpaymod.style.display=''\" /> Paiement en ligne par carte bancaire</td></tr>
		<tr><td valign=middle align=center id=tdcbpaymod style=\"display:none\">";
			
		if (isset($_GET['cbok']))
		{
			echo "<script language=\"JavaScript\">
			document.all.tdcbpaymodtitle.className='important';
			
			document.all.bPayMod[1].checked=1;
			document.all.tdchqpaymodtitle.className='none';
			document.all.tdchqpaymod.style.display='none';
			document.all.trchqpaymod.style.display='none';
			document.all.tdcbpaymod.style.display='';
			</script>
			";
		
			$id_cmd=$_GET['i'];$ref_cmd=$_GET['r']."-".$id_cmd;$idclient=$_GET['c'];
			include 'bk/call/call_request.php';
			
			echo "<br><br></td></tr>";
		}
		
		else
		{				
			if (isset($_GET['CBproblem']))
			{
				echo "<span class=important>".TransacCbFailedMsg."</span><br><br>";
			}

			echo "<br><br>
			<table cellspacing=2 cellpadding=2 class=autre><tr><td align=center>
			
			<img src=\"../gfx/bk/cm.gif\">
			<br />
			<img src=\"../gfx/bk/citelis.jpg\">
			</td>
			<td align=center style=\"font-family:verdana;font-size:11px\">
			<img src=\"../gfx/bk/clef.gif\" width=78 height=18><br>
			".Validcb."
			
			</td>
			</tr>
			<tr><td colspan=2 align=center>
			<br>
			<a class=panier2 href=\"".$_SERVER['PHP_SELF']."?A=bValidPayMod&PayMod=cb\"><b><u>&gt;&gt;".Validez."</u></b></a>
			<br><br>
			</td></tr>
			 </table><br><br>";
				
		}

		echo "</td></tr>
		<tr><td colspan=6 align=center>	
		<br><br>	
		<a class=panier href=\"conditions.php\">&gt;&gt; Conditions générales de vente</a>						
		</td></tr>
		<tr><td align=center>	

		<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bIdent\">&gt;&gt; Votre compte</a>					
		|
		<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bShow\">&gt;&gt; Modifier votre commande</a>
		|
		<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bUnset\">&gt;&gt; Annuler votre commande</a>
		</td></tr>
		</table><br />
		";
	}
	
	else
	{
		echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
	}


}

?>