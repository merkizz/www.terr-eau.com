<?php

/*************************************************************************************************
**                                        CLIENT                                                **
*************************************************************************************************/
/*************************************************************************************************
**                                        + infos client                                        **
*************************************************************************************************/

if($_GET['A'] =='bInfosCli')
{			
	if (isset($_SESSION['idclient']))
	{

		if (isset($_POST['dejacli']))
		{
			if (isset($_POST['conditions']))
			{
				$_SESSION['conditions']=$_POST['conditions'];
			}

			mysql_query("UPDATE clients SET
			steclt='".$_POST['steclt']."',
			civclt='".$_POST['civclt']."',
			nomclt='".$_POST['nomclt']."',
			prenomclt='".$_POST['prenomclt']."',
			adrmailclt='".$_POST['adrmailclt']."',
			pwdclt='".$_POST['pwdclt']."',
			adrclt='".$_POST['adrclt']."',
			cpclt='".$_POST['cpclt']."',
			villeclt='".$_POST['villeclt']."',
			idpaysclt='".$_POST['idpaysclt']."',
			telclt='".$_POST['telclt']."' 
			WHERE id_client='".$_SESSION['idclient']."'");	
			//echo "<script>alert('Vos modifications sont enregistrées !')</script>";	
			//break;

			if(isset($_SESSION['panier']) && $_SESSION['nbprod']!==0  && $_SESSION['panValid']!==1)
			{ 
				//if (isset($_POST['adrclt_adrlivr'])){$adrclt_adrlivr=$_POST['adrclt_adrlivr'];}else{$adrclt_adrlivr=0;}
				
				if (isset($_POST['adrclt_adrlivr']) &&  $_POST['adrclt_adrlivr']==1)
				{
					$sqlPays=mysql_query("SELECT nom_fr FROM pays WHERE idpays='".$_POST['idpayslivr']."'");
					$rowPays = mysql_fetch_array($sqlPays);	
					$_SESSION['adr_livr']=$_POST['civlivr']."\t".$_POST['nomlivr']."\t".$_POST['prenomlivr']."\n".$_POST['stelivr']."\n".$_POST['adrlivr']."\n".$_POST['cplivr']."\t".$_POST['villelivr']."\n".$rowPays['nom_fr'];	
					
					//temp_adr_livr
					$_SESSION['TempDejaCliLivr']=
					array(
					"civlivr" => $_POST['civlivr'],
					"nomlivr" => $_POST['nomlivr'],
					"prenomlivr" => $_POST['prenomlivr'],
					"stelivr" => $_POST['stelivr'],
					"adrlivr" => $_POST['adrlivr'],
					"cplivr" => $_POST['cplivr'],
					"villelivr" => $_POST['villelivr'],
					"idpayslivr" => $_POST['idpayslivr'],	
					);			
				}
				else
				{
					if (isset($_SESSION['adr_livr'])){unset($_SESSION['adr_livr']);}
					//$_SESSION['adr_livr']=0;
					if (isset($_SESSION['TempDejaCliLivr'])){unset($_SESSION['TempDejaCliLivr']);}
				}
				
				//echo "<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bPayMod\">";
				echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bPayMod';</script>";	
			}			
				
		}
			
		js_panier ();JS_CPop2_Htdtc();
		$clt = mysql_query("select * from clients WHERE id_client='".$_SESSION['idclient']."'");	
		$_SESSION['client']=mysql_fetch_array($clt);
		//$ncmdbyclt = mysql_query("select COUNT(id_cmd) from commandes WHERE id_client='".$_SESSION['idclient']."'");	
		$_SESSION['ncmdbyclt'] = mysql_num_rows(mysql_query("select id_cmd from commandes WHERE id_client='".$_SESSION['idclient']."'"));	
		$_SESSION['str_identifie']=$_SESSION['client']['civclt']." ".$_SESSION['client']['nomclt']." ".$_SESSION['client']['prenomclt'];
		//echo $_SESSION['client']['nomclt'];

		echo "<table align=center border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			<tr>
				<!--<td><img src=\"../gfx/evech_03.gif\" width=\"20\" height=\"21\"></td>
				<td width=\"312\" background=\"../gfx/evech_04.gif\"><img src=\"../gfx/evech_04.gif\" width=\"107\" height=\"21\"></td>
				<td><img src=\"../gfx/evech_05.gif\" width=\"26\" height=\"21\"></td>
			</tr>
			<tr>
				<td width=\"20\" background=\"../gfx/evech_07.gif\">&nbsp;</td>
				-->
				<td valign=middle>";  


		echo '<table cellSpacing="0" cellPadding="0" width="500" class="brdtbl"><tr><td bgcolor="#EEEEEE">&nbsp;
		<b>'.$_SESSION['str_identifie'].'</b>&nbsp;|&nbsp;<img src=\'../gestion/inc/gfx/caddie.gif\' align=absmiddle border=0>';
		
		if(isset($_SESSION['panier']) && $_SESSION['nbprod']!=0)
		{
			echo "<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bShow\">".$_SESSION['nbprod']." article(s) =&gt; ".$_SESSION['montant']." &euro;</a>";;
		}
				
		else
		{
			echo "<a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bShow\">".PanierVide."</a>";
		}

		echo '
		|&nbsp;<a class=panier href="'.$_SERVER['PHP_SELF'].'?A=bDeconnexion">'.LogOut.'</a> |</td></tr></table>

		<form method="post" name="formDejaCli" onmouseover="checkAdr(this)">
		<input type=hidden name="dejacli" value="1">
		<table cellSpacing="4" cellPadding="0" width="500" class="brdtbl">
		<tr><td colspan=2 bgcolor="#EEEEEE" valign="middle"><b>&#8226; '.MonCompte.'</td></tr>	
		<tr><td colspan=2 class=formalert valign="middle" id=errormsg>&nbsp;</td></tr>			  		  
		<tr vAlign=top>
			<td width="40%" align="right" valign="middle" id=tdcivclt>'.Civilite.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td width="60%" valign="bottom">
			<Select Name="civclt" class=pinput>
			<option value="-1">- '.Selection.' -</option>
			<option value="M."';if($_SESSION['client']['civclt']=='M.'){echo " selected=selected";}echo '>M.</option>
			<option value="Mme"';if($_SESSION['client']['civclt']=='Mme'){echo " selected=selected";}echo '>Mme</option>
			<option value="Mlle"';if($_SESSION['client']['civclt']=='Mlle'){echo " selected=selected";}echo '>Mlle</option>
			</select>	
			</td>
		</tr>
		<tr vAlign=top>
			<td align="right" width=40% valign="middle" id=tdnomclt>'.Nom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="nomclt" style="width: 200" value="'.$_SESSION['client']['nomclt'].'" class=pinput /></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdprenomclt>'.Prenom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="prenomclt" style="width: 200" value="'.$_SESSION['client']['prenomclt'].'" class=pinput /></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdadrmailclt>'.EmailCLT.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="adrmailclt" style="width: 200" value="'.$_SESSION['client']['adrmailclt'].'" class=pinput onblur="checkMail(formDejaCli)"  ';?> onMouseOver="AffBulle('<table class=infos width=250><tr><td>Veuillez entrer un e-mail valide.<br />Celui-ci servira à vous identifier sur notre site et à vous transmetre vos informations personnelles.</td></tr></table>')" onMouseOut="HideBulle()" <?php echo ' /></td>
		</tr>		  
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdpwdclt>'.PwdCLT.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="password" name="pwdclt" style="width: 200" maxlength="15" class=pinput value="'.$_SESSION['client']['pwdclt'].'" ';?>  onMouseOver="AffBulle('<table class=infos><tr><td>Mot de passe :</td></tr><tr><td>6 caractères minimum</td></tr></table>')" onMouseOut="HideBulle()" <?php echo ' /></td>
		</tr>

		<tr vAlign=top>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr><td colspan=2 bgcolor="#EEEEEE" valign="middle"><b>&#8226; '.BillAdress.'</td></tr>			  
			<tr vAlign=top>
				<td align="right" valign="middle">'.Ste.'<font color="#FF0000">&nbsp;</font>&nbsp;</td>
				<td valign="middle"><input type="text" name="steclt" style="width: 200" maxlength="50" value="'.$_SESSION['client']['steclt'].'" class=pinput /></td>
		</tr>
		<tr vAlign=top>
		<td align="right" valign="middle" id=tdadrclt>'.Adress.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"><textarea name="adrclt" rows=3 cols=30 class=pinput />'.$_SESSION['client']['adrclt'].'</textarea></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdcpclt>'.CP.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="cpclt" style="width: 200" maxlength="12" value="'.$_SESSION['client']['cpclt'].'" class=pinput /></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdvilleclt>'.Ville.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"><input type="text" name="villeclt" style="width: 200" maxlength="70" value="'.$_SESSION['client']['villeclt'].'" class=pinput /></td>
		</tr>
		<tr vAlign=top>
		<td align="right" valign="middle">'.Pays.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"><select name=idpaysclt class=pinput>';
		
			$pays = mysql_query("select idpays, nom_fr from pays");	
			while ($row = mysql_fetch_array($pays)) 
			{
				echo "<option value=\"".$row['idpays']."\"";if($row['idpays']==66){echo " selected=selected";}
				
				if($row['idpays']==$_SESSION['client']['idpaysclt'])
				{
					echo " selected=selected";
				}
				
				echo ">".$row['nom_fr']."</option>";
			}
			
		echo '</select></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdtelclt>'.tel.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="telclt" style="width: 200" value="'.$_SESSION['client']['telclt'].'" class=pinput /></td>
		</tr>

		<tr vAlign=top>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>';
		
		if(isset($_SESSION['panier']) && $_SESSION['nbprod']!==0  && $_SESSION['panValid']!==1)
		{ 
		
			echo '<tr vAlign=top>
				<td align="right" valign="middle">'.ThisAdress.' <font color="#FF0000">&nbsp; </font>&nbsp;</td>
				<td valign="middle">
					<input type="radio" name="adrclt_adrlivr" value="0" checked onclick="document.all.livraison.style.display=\'none\'" />'.IsAdress.'<br> 
					<input type="radio" name="adrclt_adrlivr" value="1"';if(isset($_SESSION['adr_livr']) && $_SESSION['adr_livr']!==0 ){echo ' checked ' ;} echo ' onclick="document.all.livraison.style.display=\'\'" />'.IsNotAdress.'
				</td>
			</tr>
			<tr vAlign=top>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr><td colspan=2>
			<table border=0 id=livraison style="display:\'none\'" cellSpacing="4" cellPadding="0" width="100%" class="txtnoir">

			<tr><td colspan=2 bgcolor="#EEEEEE"><b>&#8226; '.LivrAdress.'</td></tr>	
			<tr vAlign=top>
				<td width="40%" align="right" valign="middle" id=tdcivlivr>'.Civilite.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
				<td width="60%" valign="bottom">
				<Select Name="civlivr" class=pinput>
				<option value="-1">- '.Selection.' -</option>
				<option value="M."'; if(isset($_SESSION['TempDejaCliLivr']) && $_SESSION['TempDejaCliLivr']['civlivr']=="M."){echo " selected=selected";} echo '>M.</option>
				<option value="Mme"'; if(isset($_SESSION['TempDejaCliLivr']) && $_SESSION['TempDejaCliLivr']['civlivr']=="Mme"){echo " selected=selected";} echo '>Mme</option>
				<option value="Mlle"'; if(isset($_SESSION['TempDejaCliLivr']) && $_SESSION['TempDejaCliLivr']['civlivr']=="Mlle"){echo " selected=selected";} echo '>Mlle</option>
				</select>
				</td>
			</tr>		  
			<tr vAlign=top>
				<td align="right" width=40% valign="middle" id=tdnomlivr>'.Nom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
				<td valign="middle"><input type="text" name="nomlivr" style="width: 200" value="';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['nomlivr'];} echo '" class=pinput /> </td>
			</tr>
			<tr vAlign=top>
				<td align="right" valign="middle" id=tdprenomlivr>'.Prenom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
				<td valign="middle"> <input type="text" name="prenomlivr" style="width: 200" value="';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['prenomlivr'];} echo '" class=pinput /></td>
			</tr>	 
			<tr vAlign=top>
					<td align="right" valign="middle">'.Ste.'&nbsp;</td>
					<td valign="middle"><input type="text" name="stelivr" style="width: 200" maxlength="50" value="';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['stelivr'];} echo '" class=pinput /></td>
			</tr>
			<tr vAlign=top>
			<td align="right" valign="middle" id=tdadrlivr>'.Adress.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"><textarea name="adrlivr" rows=3 cols=30  class=pinput />';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['adrlivr'];} echo '</textarea></td>
			</tr>
			<tr vAlign=top>
				<td align="right" valign="middle" id=tdcplivr>'.CP.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
				<td valign="middle"> <input type="text" name="cplivr" style="width: 200" maxlength="12" value="';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['cplivr'];} echo '" class=pinput /></td>
			</tr>
			<tr vAlign=top>
				<td align="right" valign="middle" id=tdvillelivr>'.Ville.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
				<td valign="middle"><input type="text" name="villelivr" style="width: 200" maxlength="70" value="';if(isset($_SESSION['TempDejaCliLivr'])){echo $_SESSION['TempDejaCliLivr']['villelivr'];} echo '" class=pinput /></td>
			</tr>
			<tr vAlign=top>
				<td align="right" valign="middle">'.Pays.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>	
				<td valign="middle"><select name=idpayslivr class=pinput>';
				
						$payslivr = mysql_query("select idpays, nom_fr from pays");	
						while ($rowlivr = mysql_fetch_array($payslivr)) 
						{
							echo "<option value=\"".$rowlivr['idpays']."\"";
							if($rowlivr['idpays']==66){echo " selected=selected";}
							if(isset($_SESSION['TempDejaCliLivr']) && $_SESSION['TempDejaCliLivr']['idpayslivr']==$rowlivr['idpays']){echo " selected=selected";}
							echo ">".$rowlivr['nom_fr']."</option>";
						}
						
						echo '</select></td>
			</tr>
			</table>
			</td></tr>			
			<tr id=tr_conditions><td colspan=2>
			<input type="checkbox" name="conditions" value="1"'; if (isset($_SESSION['conditions'])){echo " checked=checked ";} echo ' >
			'.AcceptConditions.'<br /><br />
			</td></tr>	
			<tr><td colspan=2 align=center><a class=panier href="#" onclick="javascript:verifForm(formDejaCli)">&gt;&gt; '.ValidOrder.'</a></td></tr>
			';
		}
		
		else
		{
			echo '<tr><td colspan=2 align=center><a class=panier href="#" onclick="javascript:verifForm(formDejaCli)">&gt;&gt; '.SaveModify.'</a></td></tr>';
		}
		
		echo '<tr><td colspan=2 align=right><font color="#FF0000">*</font>&nbsp;'.Obligatoire.'</td></tr>
		<tr><td colspan=2 align=center><small>
		'.LaLoi.'
		</td></tr>
		</table>
		</form>';



		echo "</td>
		</tr>
		</table>
		";

	}
	
	else
	{	
		//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bShow\">";
		echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bShow';</script>";
	}
}
?>