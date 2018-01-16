
<?php

/*************************************************************************************************
**                                        + commandes clients                                   **
*************************************************************************************************/

if($_GET['A'] =='bInfosCmdCli')
{
	if(isset($_SESSION['idclient']))
	{
		JSCenterPop();	
		$cmdbyclt = mysql_query("select id_cmd, commandes.id_etat_cmd, ref_cmd, date_cmd, montant, paiement, etat_cmd from commandes LEFT JOIN etat_cmd ON (commandes.id_etat_cmd=etat_cmd.id_etat_cmd) WHERE id_client='".$_SESSION['idclient']."' ORDER BY date_cmd DESC");	

		echo "<center>
		<table cellSpacing=0 cellPadding=0 width=600 class=brdtbl><tr><td bgcolor=\"#EEEEEE\">
		&nbsp;<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bIdent\">".$_SESSION['str_identifie']."</a>
		&nbsp;|&nbsp;<img src=\"../gestion/inc/gfx/caddie.gif\" align=absmiddle border=0>";
		
				if(isset($_SESSION['panier']) && $_SESSION['nbprod']!=0)
				{
					echo "<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bShow\">".$_SESSION['nbprod']."article(s) =&gt; ".$_SESSION['montant']." &euro;</a>";;
				}
				
				else
				{
					echo "<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bShow\">Votre panier est vide</a>";
				}
				
		echo "
		| <b>".MyOrders."</b> |&nbsp;<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bDeconnexion\">".LogOut."</a> |</td></tr></table><br>
		<table width=600 class=brdtbl border=0 align=center cellspacing=0 cellpadding=2>
		<tr height=25>
		<th class=trprod_htdtc>Référence</th>
		<th class=trprod_htdtc>Détail</th>
		<th class=trprod_htdtc>Date</th>
		<th class=trprod_htdtc>Montant</th>
		<th class=trprod_htdtc>Paiement</th>
		<th class=trprod_htdtc>Statut</th></tr>";
		
		while($rowcmdbyclt = mysql_fetch_array($cmdbyclt)) 
		{
			$date_cmd_fr=((substr($rowcmdbyclt["date_cmd"],8,2)).'-'.(substr($rowcmdbyclt["date_cmd"],5,2)).'-'.(substr($rowcmdbyclt["date_cmd"],0,4)).'&nbsp;&nbsp;'.(substr($rowcmdbyclt["date_cmd"],10,9)));	
			echo "<tr class=tdprod_htdtc onmouseover=\"this.className='trover';\" onmouseout=\"this.className='tr';\"  onclick=\"CenterPop('../gestion/cmdprint.php?idcmd=".$rowcmdbyclt['id_cmd']."','detail',650,600);\">";
			echo "
			<td class=tdprod_htdtc>&nbsp;".$rowcmdbyclt['ref_cmd']."</td>
			<td class=tdprod_htdtc align=center><a class=panier href=\"#\">Détail...</a></td>
			<td class=tdprod_htdtc align=center>".$date_cmd_fr."</td>
			<td class=tdprod_htdtc align=right>".$rowcmdbyclt['montant']." &euro;&nbsp;</td>
			<td class=tdprod_htdtc align=center>".$rowcmdbyclt['paiement']."</td>
			<td class=tdprod_htdtc align=center>".$rowcmdbyclt['etat_cmd']."</td></tr>";
		}
		
		echo "</table>";
	}
	
	else
	{
		//echo "<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
		echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
	}
}
?>