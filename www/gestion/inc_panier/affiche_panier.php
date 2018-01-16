<?php

if(isset($_SESSION['panier']))
{ 
	$_SESSION['nbprod'] = count($_SESSION['panier']); 

	if ($_SESSION['nbprod']!==0)
	{


		echo "<table width=90% class=brdtbl border=1 align=center cellspacing=0 cellpadding=2>
		<tr class=ligne><th colspan=6 align=left><small>&nbsp;<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bIdent\">";	       
				
		if(isset($_SESSION['idclient']))
		{
		echo $_SESSION['str_identifie'];
		}
		else
		{
		echo Identification;
		}
		
		echo "</a></b>&nbsp;|	       
		<img src=\"../gestion/inc/gfx/caddie.gif\" align=absmiddle border=0>&nbsp; ".ThVousAvez.$_SESSION['nbprod'].ThVousAvezArticle;if ($_SESSION['nbprod']>1){echo "s";} echo ThVousAvez2."</small>	</th></tr>
		<tr height=25>
		<th class=trprod_htdtc align=left width=250>&nbsp;".ThDesignation."</th>

		<th class=trprod_htdtc width=60>".ThUnitPrice."</th>
		<th class=trprod_htdtc width=60>".ThQuantity."</th>

		<th class=trprod_htdtc width=60>".ThTotal."</th>
		<th class=trprod_htdtc>&nbsp;</th></tr>";

		$TotalCmde=0;$TotalPoidsLigne=0;
		$TotalCmdePourRemise=0;
		$TotalPoidsBrutPourRemise=0;
		$TotalPoidsBrut=0;$TotalFraisDePort=0;
		$FraisDePort=5.90;

		$sqlTarifKGSuppl="SELECT frais_ttc  FROM tarifs_port WHERE id_tarif_port=24";

		$reqTarifKGSuppl= mysql_query($sqlTarifKGSuppl);
		$rowTarifKGSuppl = mysql_fetch_array($reqTarifKGSuppl);

		$TarifKGSuppl=$rowTarifKGSuppl['frais_ttc'];
		$_SESSION['FraisDePortByArticle']=$FraisDePort;


		for($i=0;$i<$_SESSION['nbprod'];$i++)
		{
			$sql="SELECT * FROM produits left join pays on (pays.idpays = produits.id_pays) WHERE id_produit='".$_SESSION['panier'][$i]['idprod']."'";
			//echo $_SESSION['panier'][$i]['idprod'];
			//exit();

			//exit($sql);
			$req= mysql_query($sql);
			$row = mysql_fetch_array($req);								
			echo "
			<form style=\"padding:0px;margin:0px\" method=\"POST\" name=\"formbUpdate\" action=\"".$_SERVER['PHP_SELF']."?A=bUpdate\">
			<input type=hidden name=\"idprod".$i."\" value=\"".$_SESSION['panier'][$i]['idprod']."\">
			<input type=hidden name=\"pu".$i."\" value=\"".$_SESSION['panier'][$i]['pu']."\">
			<input type=hidden name=\"option".$i."\" value=\"".$_SESSION['panier'][$i]['option']."\">
			<input type=hidden name=\"ref_produit".$i."\" value=\"".$_SESSION['panier'][$i]['ref_produit']."\">
			<input type=hidden name=\"nom_option".$i."\" value=\"".$_SESSION['panier'][$i]['nom_option']."\">
			<input type=hidden name=\"designation".$i."\" value=\"".$_SESSION['panier'][$i]['designation']."\">

			<input type=hidden name=ligne value=\"$i\">
			<tr>";

			$TotalLigne=round(($_SESSION['panier'][$i]['pu']*$_SESSION['panier'][$i]['qte']),2);

			$TotalPoidsBrutLigne=$_SESSION['panier'][$i]['qte']*$row["poids_port"];			
			$TotalPoidsBrut+=$TotalPoidsBrutLigne;
			$_SESSION['TotalPoidsBrut']=$TotalPoidsBrut;

			$TotalCmde+=$TotalLigne;

			if($row['prix_promo']=='0.00')
			{
				$TotalCmdePourRemise+=$TotalLigne;	
				$TotalPoidsBrutPourRemise+=$TotalPoidsBrutLigne;		
			}

			echo "	<td class=tdprod_htdtc valign=top width=55%>

			<table border=0 width=100% style=\"font-size: 10px;font-family: Arial;color: #333;\" width=100%>
			<tr><td width=100 align=center valign=top>";

			if (($row['image']!='') && is_file($row['image']))
			{
				$chemin= $row['image'];

				//exit($chemin);

				//$chemin=IMGDIR."gestprod/".$row["photo"];
				list($width, $height, $type, $attr) = getimagesize($chemin);
				$im_size=create_vignette($chemin);
				echo "				 				 
				<div id=\"photo\" style=\"position: relative\">
				<a id=\"thumb1\" href='".$chemin."' class=\"highslide\" onclick=\"return hs.expand(this)\">									
				<img align=absmiddle src=\"".$chemin."\"	width=\"".$im_size[0]."\" height=\"".$im_size[1]."\" />
				<div id=\"copyrightlogo\"><img src=\"../gfx/loupe_b.png\"></div>														
				</a>	
				</div>				 				 				 
				";
			}
			
			$option = unserialize($row['forme']);
			//print_r($option);

			echo "</td><td valign=top  style=\"color:#333\">
			<b>".$row['designation']."</b></br>"; 
			
			//if ($row['id_pays'] != 0) echo 'Pays : '.$row['nom_fr'].'</br>';
			if (is_array($option) != '') 
			{
				echo 'Référence : '.$option[$_SESSION['panier'][$i]['option']][1].'</br>'; 
				echo ' '.$option[$_SESSION['panier'][$i]['option']][2].'</br>'; 
			}
			
			echo '</br><u>Remarques pour ce produit</u><textarea name="dedicace'.$i.'" style="width:100%;font-family:tahoma;font-size:10px; overflow:visible"  onblur="document.all.formbUpdate.submit()">'.$_SESSION['panier'][$i]['dedicace'].'</textarea>';
			//if ($row['date_emis'] != '0000-00-00') echo 'Emis le : '.date_fr($row['date_emis'],1).'</br>';
			//if ($row['date_deb'] != '') echo 'Année : '.$row['date_deb'].'&nbsp;'.$row['date_fin'];										
			echo "<br />
			";
			
			if($row['prix_promo']!='0.00')
			{
				echo "
				<span style=\"font-family: tahoma,verdana,arial; font-size: 10px;text-decoration:line-through;\">".$row['prix_cond']." </span>&euro;&nbsp;<span style=\"font-family: tahoma,verdana,arial; font-size: 10px;color:#890101;\">".$row['prix_promo']." &euro;</span><br />";
			}

			?>
			
			<br />
			<!--<div>
			<a class=detail href="detail.php?id=<?php echo $row['id_produit']; ?>" 
			onclick="return hs.htmlExpand(this, { contentId: 'highslide-html-1', 
			objectType: 'ajax', preserveContent: true} )">
			Fiche technique <img src="../gfx/loupe_b.png" align=absmiddle border=0>
			</a>
			<div class="highslide-html-content" id="highslide-html-1" style="width: 700px">
			<div class="highslide-move" style="border: 0; height: 18px; padding: 2px; cursor: default">
			<a href="#" onclick="return hs.close(this)" class="control">Fermer</a>
			</div>
			<div class="highslide-body"></div>
			</div>-->
			
			<?php
			echo "
			</td>

			</tr></table>
			</td>

			<td align=right class=tdprod_htdtc>".number_format($_SESSION['panier'][$i]['pu'], 2, ',', ' ')." &euro;&nbsp;</td>	
			<td align=center class=tdprod_htdtc>

			<input name=\"qte".$i."\" type=text value=\"".$_SESSION['panier'][$i]['qte']."\"  style=\"width:35px;font-family:tahoma;font-size:10px;text-align:right\" onblur=\"document.all.formbUpdate.submit()\">
			";
			#<select style=\"font-family:arial;font-size:10px\" name=\"qte".$i."\" class=select_css onchange=\"document.all.formbUpdate.submit()\">";			
			#for($q=1;$q<=120;$q+=1){
			#
			#echo "<option value=\"".$q."\" ";if($q==($_SESSION['panier'][$i]['qte'])){echo " selected=selected ";}  echo">".$q."</option>";	
			#}						
			#												
			#echo "
			#</select>
			
			echo "
			</td>
			<td align=right class=tdprod_htdtc>".number_format($TotalLigne, 2, ',', ' ')." &euro;&nbsp;<br /></td>
			";	
			
			echo "<td class=tdprod_htdtc align=center><a class=panier2 href=\"".$_SERVER['PHP_SELF']."?A=bDel&idprod=".$_SESSION['panier'][$i]['idprod']."&option=".$_SESSION['panier'][$i]['option']."\"><img src=\"../gfx/bq/delete.gif\" border=0></a></td>";
			
			echo "</tr>";

		}//fin boucle ligne produit


		//if($row['prix_promo']=='0.00'){
		//$TotalCmdePourRemise+=$TotalLigne;	
		//$TotalPoidsBrutPourRemise+=$TotalPoidsBrutLigne;		
		//}		

		//Réactualise le poids en gramme dans la base pour la calculer en Kg
		$TotalPoidsBrut /= 1000;


		if($TotalPoidsBrut == '0') // Cas ou les articles sont a 0g
		{
			$FraisDePort = 0;	
		}				
		else if ($TotalPoidsBrut<='30.00')
		{
			$sqlFraisPort="SELECT frais_ttc  FROM tarifs_port WHERE poids>".$TotalPoidsBrut." LIMIT 0,1";
			//idem::$sqlFraisPort="SELECT frais_ttc  FROM tarifs_port WHERE ".$TotalPoidsBrut." <= poids LIMIT 0,1";
			$reqFraisPort= mysql_query($sqlFraisPort);
			$rowFraisPort = mysql_fetch_array($reqFraisPort);

			$FraisDePort=$rowFraisPort['frais_ttc'];
			$rowFraisPort['frais_ttc'];
			//exit($sqlFraisPort);
		}
		elseif($TotalPoidsBrut>'30.00')
		{


			$sqlFraisPort="SELECT frais_ttc FROM tarifs_port WHERE poids='30.00' LIMIT 0,1";
			$reqFraisPort= mysql_query($sqlFraisPort);
			$rowFraisPort = mysql_fetch_array($reqFraisPort);


			$KG_supplem=$TotalPoidsBrut-'30.00';			
			$FraisPortSuppl=$TarifKGSuppl*$KG_supplem;

			$FraisDePort=$rowFraisPort['frais_ttc']+round($FraisPortSuppl,2);

			//echo $FraisDePort; 

			$DétailFraisDePort=						
			"<br>30kg = ".$rowFraisPort['frais_ttc']." &euro;
			<br>".$KG_supplem." kg = KG suppl (".$TotalPoidsBrut."-30.00)
			<br>".round($FraisPortSuppl,2)." &euro; =Frais de port suppl (".$TarifKGSuppl." x ".$KG_supplem.")
			<br>".$FraisDePort." &euro; = Frais de port (".$rowFraisPort['frais_ttc']." + ".round($FraisPortSuppl,2).")";
			//echo $DétailFraisDePort;//exit();
		}

		//$TotalPoidsBrut

		//$TotalFraisDePort+=$FraisDePort;

		// SANS FRAIS DE PORT  $GrandTotal=$TotalCmde;
		$GrandTotal=$TotalCmde+$FraisDePort;


		$TotalCmdeFF=round(($GrandTotal*6.55957),2);									


		$_SESSION['montant']=$GrandTotal;

		$_SESSION['FraisDePort']=$FraisDePort;

		echo "
		<tr><td colspan=5>&nbsp;</td>
		<tr class=ligne height=5>
		<tr><td align=right colspan=3>
		Sous Total TTC : 
		</td>
		<td align=right>".number_format($TotalCmde, 2, ',', ' ')." &euro; </span></td><td></td></tr>							

		<tr><td align=right colspan=3>
		Frais de port : <!--(".number_format($TotalPoidsBrut, 2, ',', ' ')." kg)-->
		</td>
		<td align=right>".number_format($FraisDePort, 2, ',', ' ')." &euro; </span></td><td></td></tr>
						
		<tr class=ligne height=4>
		<tr><td align=right colspan=3 class=important>
		Total TTC  <img src=\"../gfx/bq/leftarrow.gif\"> 
		</td>
		<td class=important colspan=3 align=center>".number_format($GrandTotal, 2, ',', ' ')." &euro; <span class=importants>TTC<br>(".number_format($TotalCmdeFF, 2, ',', ' ')." FF)</span></td>

		<tr><td colspan=6>&nbsp;</td>
		<tr class=ligne height=1><td colspan=3></td>
		<tr height=30><td colspan=6 align=center class=ligne>	

		<a class=panier href=\"".URLCDV."\" target='_blank'>&gt;&gt; Conditions générales de vente</a>

		</td></tr>
		<tr height=30><td colspan=6 align=center class=ligne>	
		<a class=panier href=\"".$_SESSION['page_consultee']."\">&gt;&gt; ".ContinueShoppping."</a>
		|
		<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bIdent\">&gt;&gt; ".ValidOrder."</a>
		|
		<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bUnset\">&gt;&gt; ".CancelOrder."</a>

		</td></tr>
		</table>
		</form>

		";	
		
	}
	else
	{
		unset($_SESSION['panier']); 
		echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
	}		
}
else
{
	$_SESSION['montant']=0;
	echo "			
	<table align=center cellSpacing=\"0\" cellPadding=\"0\"  width=500 class=\"brdtbl\"><tr><td bgcolor=\"#EEEEEE\">
	<b><a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bIdent\">&nbsp;";
	
	if(isset($_SESSION['idclient']))
	{
		echo $_SESSION['str_identifie'];
	}
	else
	{
		echo Identification;
	}
	
	echo "
	</a></b>&nbsp;|&nbsp;<img src=\"../gestion/inc/gfx/caddie.gif\" align=absmiddle border=0>
	<b>".PanierVide."</b>";	
	
	if(isset($_SESSION['idclient']))
	{
		echo "
		|&nbsp;<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bDeconnexion\">".LogOut."</a> |";
	}
	
	echo "</td></tr></table>
	<table border=0  width=500 class=brdtbl bordercolor=\"#EEEEEE\" align=center cellspacing=3 cellpadding=3>

	<tr><td><blockquote><a class=panier href=\"".$_SESSION['page_consultee']."\">&gt;&gt; ".ContinueShoppping."</a></blockquote></td></tr>
	</table>
	";

}	

?>