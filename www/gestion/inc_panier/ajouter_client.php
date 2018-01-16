<?php


/*************************************************************************************************
**                                        nouveau client                                        **
*************************************************************************************************/
if($_GET['A'] =='bNewCli')
{
	if (isset($_POST['newcli']))
	{
		if (isset($_POST['conditions']))
		{
			$_SESSION['conditions']=$_POST['conditions'];
		}
		
		if (isset($_POST['adrclt_adrlivr']))
		{
			$adrclt_adrlivr=$_POST['adrclt_adrlivr'];
		}
		
		else
		{
			$adrclt_adrlivr=0;
		}
		
		$verifmail = mysql_query("select COUNT(id_client) FROM clients WHERE adrmailclt='".strtolower($_POST['adrmailclt'])."'");
		//$nclient = mysql_num_rows($client);
		$result = mysql_result($verifmail, 0, 0);
		if($result==1)
		{
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Cet e-mail est déjà utilisé !');</script>";
			
			$_SESSION['TempNewCli']=      
			array(
			"civclt" => $_POST['civclt'],
			"nomclt" => $_POST['nomclt'],
			"prenomclt" => $_POST['prenomclt'],
			"steclt" => $_POST['steclt'],
			"adrmailclt" => $_POST['adrmailclt'],
			"pwdclt" => $_POST['pwdclt'],
			"adrclt" => $_POST['adrclt'],
			"cpclt" => $_POST['cpclt'],
			"villeclt" => $_POST['villeclt'],
			"idpaysclt" => $_POST['idpaysclt'],
			"telclt" => $_POST['telclt'],
			"adrclt_adrlivr" => $adrclt_adrlivr,
			);
			
			
		}
		
		else
		{			
			$_SESSION['NewCli']=
			array(
			"civclt" => $_POST['civclt'],
			"nomclt" => $_POST['nomclt'],
			"prenomclt" => $_POST['prenomclt'],
			"steclt" => $_POST['steclt'],
			"adrmailclt" => $_POST['adrmailclt'],
			"pwdclt" => $_POST['pwdclt'],
			"adrclt" => $_POST['adrclt'],
			"cpclt" => $_POST['cpclt'],
			"villeclt" => $_POST['villeclt'],
			"idpaysclt" => $_POST['idpaysclt'],
			"telclt" => $_POST['telclt'],
			"adrclt_adrlivr" => $adrclt_adrlivr,
			);
			
			if ($adrclt_adrlivr==1)
			{
				$_SESSION['NewCliLivr']=
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
			


			if(isset($_SESSION['panier']) && $_SESSION['nbprod']!==0  && $_SESSION['panValid']!==1)
			{ 
				$_SESSION['TempNewCli']=      
				array(
				"civclt" => $_POST['civclt'],
				"nomclt" => $_POST['nomclt'],
				"prenomclt" => $_POST['prenomclt'],
				"steclt" => $_POST['steclt'],
				"adrmailclt" => $_POST['adrmailclt'],
				"pwdclt" => $_POST['pwdclt'],
				"adrclt" => $_POST['adrclt'],
				"cpclt" => $_POST['cpclt'],
				"villeclt" => $_POST['villeclt'],
				"idpaysclt" => $_POST['idpaysclt'],
				"telclt" => $_POST['telclt'],
				"adrclt_adrlivr" => $adrclt_adrlivr,
				);
				
				if ($adrclt_adrlivr==1)
				{
					$sqlPays=mysql_query("SELECT nom_fr FROM pays WHERE idpays='".$_POST['idpayslivr']."'");
					$rowPays = mysql_fetch_array($sqlPays);
					$_SESSION['adr_livr']=$_POST['civlivr']."\t".$_POST['nomlivr']."\t".$_POST['prenomlivr']."\n".$_POST['stelivr']."\n".$_POST['adrlivr']."\n".$_POST['cplivr']."\t".$_POST['villelivr']."\n".$rowPays['nom_fr'];	
					$_SESSION['TempNewCliLivr']=
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
				
				//echo "<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bPayMod\">";
				echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bPayMod';</script>"; 	
				
			}
			
			else
			{
				//Enregistrement d'un nouveau client SANS panier

				mysql_query("INSERT INTO clients (id_client, steclt, civclt, nomclt, prenomclt, adrmailclt, pwdclt, adrclt, cpclt, villeclt, idpaysclt, telclt) 
				VALUES ('', '".$_SESSION['NewCli']['steclt']."', '".$_SESSION['NewCli']['civclt']."', '".$_SESSION['NewCli']['nomclt']."',
				'".$_SESSION['NewCli']['prenomclt']."', '".$_SESSION['NewCli']['adrmailclt']."', '".$_SESSION['NewCli']['pwdclt']."',
				'".$_SESSION['NewCli']['adrclt']."', '".$_SESSION['NewCli']['cpclt']."', '".$_SESSION['NewCli']['villeclt']."',
				'".$_SESSION['NewCli']['idpaysclt']."', '".$_SESSION['NewCli']['telclt']."')");
				unset($_SESSION['TempNewCli']); 
				$_SESSION['idclient']=mysql_insert_id();
				$_SESSION['str_identifie']=$_SESSION['NewCli']['civclt']." ".$_SESSION['NewCli']['nomclt']." ".$_SESSION['NewCli']['prenomclt'];


				$sqlPays=mysql_query("SELECT nom_fr FROM pays WHERE idpays='".$_SESSION['NewCli']['idpaysclt']."'");
				$rowPays = mysql_fetch_array($sqlPays);

				echo "<div align=center><b><small>
				<br /> 
				<font color=\"#FF0000\"><big>Vous allez recevoir dans quelques instants un email confirmant votre inscription.</font><br /> 		
				</small></b><br /></div>";
				echo "<meta http-equiv=\"refresh\" content=\"4;URL=".$_SERVER['PHP_SELF']."?A=bInfosCli\">";
				//envoie mail
				$destinataire=$_SESSION['NewCli']['adrmailclt'];
				$MsgNewAccount="
				".INFOSITE_MAIL."		  
				--------------------------------------------------------------------------
				Merci de ne pas repondre a ce message automatique.

				Cher(e) ".$_SESSION['NewCli']['prenomclt']." ".$_SESSION['NewCli']['nomclt'].",
				Votre compte à bien été créé,
				conservez précieusement ces informations :
				\r\n
				Civilité.....: ".$_SESSION['NewCli']['civclt']."
				Nom..........: ".$_SESSION['NewCli']['nomclt']."
				Prénom.......: ".$_SESSION['NewCli']['prenomclt']."
				Société......: ".$_SESSION['NewCli']['steclt']."
				Email........: ".$_SESSION['NewCli']['adrmailclt']."
				Mot de passe.: ".$_SESSION['NewCli']['pwdclt']."
				Adresse......: ".$_SESSION['NewCli']['adrclt']."
				Code postal..: ".$_SESSION['NewCli']['cpclt']."
				Ville........: ".$_SESSION['NewCli']['villeclt']."
				Pays.........: ".$rowPays['nom_fr']."
				Téléphone....: ".$_SESSION['NewCli']['telclt']."
				\r\n		
				Merci de votre fidélité et à bientôt sur notre site : ".URLSITE."
				--------------------------------------------------------------------------
				\r\n
				Vous recevez cet email suite à votre visite sur notre site :  ".URLSITE.".
				Si vous pensez qu'il s'agit d'une erreur, veuillez nous contacter : " .MAIL_WEBMASTER. ".
				--------------------------------------------------------------------------
				\r\n
				";
				mail($destinataire,CLIENT." : Création de votre compte ",$MsgNewAccount,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
				mail(MAIL_WEBMASTER,CLIENT." : Nouvelle inscription ",$MsgNewAccount,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
				mail(MAIL_DEVELOPPEUR,CLIENT." : Nouvelle inscription ",$MsgNewAccount,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
			}

		}	
	}
	
	//fin if formulaire newcli validé et posté



	js_panier ();

	echo '
	<form method="post" name="formNewCli" onmouseover="checkAdr(formNewCli)">
	<input type=hidden name=newcli value="1">

	<table align=center cellSpacing=0 cellPadding=0 width=500 class=brdtbl><tr bgcolor="#EEEEEE"><td>
	&nbsp;<b>'.Newclient.'</b></td><td align=right><a href="#" class=panier onclick="javascript:history.go(-1);">&lt;&lt; '.Retour.'</a>&nbsp;</td></tr></table><br />
	<table align=center border=0 cellSpacing="4" cellPadding="0" width="500" class="brdtbl">
	<tr><td colspan=2 bgcolor="#EEEEEE" valign="middle"><b>&#8226; '.MonCompte.'</td></tr>
	<tr><td colspan=2 class=formalert valign="middle" id=errormsg>&nbsp;</td></tr>			  
	<tr vAlign=top>
		<td width="40%" align="right" valign="middle" id=tdcivclt>'.Civilite.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td width="60%" valign="bottom">
		
		<Select Name="civclt" class=pinput>
		<option value="-1">- '.Selection.' -</option>
		<option value="M."'; if(isset($_SESSION['TempNewCli']) && $_SESSION['TempNewCli']['civclt']=="M."){echo " selected=selected";} echo '>M.</option>
		<option value="Mme"'; if(isset($_SESSION['TempNewCli']) && $_SESSION['TempNewCli']['civclt']=="Mme"){echo " selected=selected";} echo '>Mme</option>
		<option value="Mlle"'; if(isset($_SESSION['TempNewCli']) && $_SESSION['TempNewCli']['civclt']=="Mlle"){echo " selected=selected";} echo '>Mlle</option>
		</select>
		</td>
	</tr>
	<tr vAlign=top>
		<td align="right" width=40% valign="middle" id=tdnomclt>'.Nom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="text" name="nomclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['nomclt'];} echo '" class=pinput /></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdprenomclt>'.Prenom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="text" name="prenomclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['prenomclt'];} echo '" class=pinput /></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdadrmailclt>'.EmailCLT.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="text" name="adrmailclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['adrmailclt'];} echo '" class=pinput onblur="checkMail(formNewCli)" ';?> onMouseOver="AffBulle('<table class=infos width=250><tr><td>Veuillez entrer un e-mail valide.<br />Celui-ci servira à vous identifier sur notre site et à vous transmetre vos informations personnelles.</td></tr></table>')" onMouseOut="HideBulle()" <?php echo ' /></td>
	</tr>		  
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdpwdclt>'.PwdCLT	.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="password" name="pwdclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['pwdclt'];} echo '" maxlength="15" class=pinput ';?>  onMouseOver="AffBulle('<table class=infos width=150><tr><td>Mot de passe :</td></tr><tr><td>6 caractères minimum</td></tr></table>')" onMouseOut="HideBulle()" <?php echo ' /></td>
	</tr>

	<tr vAlign=top>
		<td align="right">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr><td colspan=2 bgcolor="#EEEEEE" valign="middle"><b>&#8226; '.BillAdress.'</td></tr>			  
		<tr vAlign=top>
			<td align="right" valign="middle">'.Ste.'<font color="#FF0000">&nbsp;</font>&nbsp;</td>
			<td valign="middle"><input type="text" name="steclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['steclt'];} echo '" maxlength="50" value="" class=pinput /></td>
	</tr>
	<tr vAlign=top>
	<td align="right" valign="middle" id=tdadrclt>'.Adress.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
	<td valign="middle"><textarea name="adrclt" rows=3 cols=30 class=pinput />';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['adrclt'];} echo '</textarea></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdcpclt>'.CP.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="text" name="cpclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['cpclt'];} echo '" maxlength="12" value="" class=pinput /></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdvilleclt>'.Ville.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"><input type="text" name="villeclt" style="width: 200" maxlength="70" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['villeclt'];} echo '" class=pinput /></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle">'.Pays.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"><select name=idpaysclt class=pinput>';
		
	if(isset($_SESSION['TempNewCli']))
	{
		echo '<option value="'.$_SESSION['TempNewCli']['idpaysclt'].'" selected=selected></option>';
	} 
	
	$pays = mysql_query("select idpays, nom_fr from pays");	
	while ($row = mysql_fetch_array($pays)) 
	{
		echo "<option value=\"".$row['idpays']."\"";
		if($row['idpays']==66){echo " selected=selected";}
		if(isset($_SESSION['TempNewCli']) && $_SESSION['TempNewCli']['idpaysclt']==$row['idpays']){echo " selected=selected";}
		echo ">".$row['nom_fr']."</option>";
	}			
	echo '</select></td>
	</tr>
	<tr vAlign=top>
		<td align="right" valign="middle" id=tdtelclt>'.tel.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"> <input type="text" name="telclt" style="width: 200" value="';if(isset($_SESSION['TempNewCli'])){echo $_SESSION['TempNewCli']['telclt'];} echo '" class=pinput /></td>
	</tr>

	<tr vAlign=top>
		<td align="right">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>';
	
	if(isset($_SESSION['panier']) && $_SESSION['nbprod']!==0  && $_SESSION['panValid']!==1)
	{
		echo '
		<tr vAlign=top>
			<td align="right" valign="middle">'.ThisAdress.' <font color="#FF0000">&nbsp; </font>&nbsp;</td>
			<td valign="middle">
				<input type="radio" name="adrclt_adrlivr" value="0" checked onclick="document.all.livraison.style.display=\'none\'" />'.IsAdress.'<br> 
				<input type="radio" name="adrclt_adrlivr" value="1" ';if(isset($_SESSION['TempNewCli']) && $_SESSION['TempNewCli']['adrclt_adrlivr']==1){echo ' checked ' ;} echo ' onclick="document.all.livraison.style.display=\'\'" />'.IsNotAdress.'</td>
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
			<Select Name="civlivr" class=pinput>';
			
		if(isset($_SESSION['TempNewCliLivr']))
		{
			echo '<option value="'.$_SESSION['TempNewCliLivr']['idpayslivr'].'" selected=selected></option>';
		} 
		
		echo '<option value="-1">- '.Selection.' -</option>
		<option value="M."'; if(isset($_SESSION['TempNewCliLivr']) && $_SESSION['TempNewCliLivr']['civlivr']=="M."){echo " selected=selected";} echo '>M.</option>
		<option value="Mme"'; if(isset($_SESSION['TempNewCliLivr']) && $_SESSION['TempNewCliLivr']['civlivr']=="Mme"){echo " selected=selected";} echo '>Mme</option>
		<option value="Mlle"'; if(isset($_SESSION['TempNewCliLivr']) && $_SESSION['TempNewCliLivr']['civlivr']=="Mlle"){echo " selected=selected";} echo '>Mlle</option>
		</select>
			</td>
		</tr>		  
		<tr vAlign=top>
			<td align="right" width=40% valign="middle" id=tdnomlivr>'.Nom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"><input type="text" name="nomlivr" style="width: 200" value="';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['nomlivr'];} echo '" class=pinput /> </td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdprenomlivr>'.Prenom.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="prenomlivr" style="width: 200" value="';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['prenomlivr'];} echo '" class=pinput /></td>
		</tr>	 
		<tr vAlign=top>
				<td align="right" valign="middle">'.Ste.'&nbsp;</td>
				<td valign="middle"><input type="text" name="stelivr" style="width: 200" maxlength="50" value="';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['stelivr'];} echo '" class=pinput /></td>
		</tr>
		<tr vAlign=top>
		<td align="right" valign="middle" id=tdadrlivr>'.Adress.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
		<td valign="middle"><textarea name="adrlivr" rows=3 cols=30  class=pinput />';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['adrlivr'];} echo '</textarea></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdcplivr>'.CP.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"> <input type="text" name="cplivr" style="width: 200" maxlength="12" value="';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['cplivr'];} echo '" class=pinput /></td>
		</tr>
		<tr vAlign=top>
			<td align="right" valign="middle" id=tdvillelivr>'.Ville.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>
			<td valign="middle"><input type="text" name="villelivr" style="width: 200" maxlength="70" value="';if(isset($_SESSION['TempNewCliLivr'])){echo $_SESSION['TempNewCliLivr']['villelivr'];} echo '" class=pinput /></td>
		</tr>
		<tr vAlign=top>
		<td align="right" valign="middle">'.Pays.'<font color="#FF0000">&nbsp;*</font>&nbsp;</td>	
		<td valign="middle"><select name=idpayslivr class=pinput>';
		$payslivr = mysql_query("select idpays, nom_fr from pays");	
		
		while ($rowlivr = mysql_fetch_array($payslivr)) 
		{
			echo "<option value=\"".$rowlivr['idpays']."\"";
			if($rowlivr['idpays']==66){echo " selected=selected";}
			if(isset($_SESSION['TempNewCliLivr']) && $_SESSION['TempNewCliLivr']['idpayslivr']==$row['idpays']){echo " selected=selected";}
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
		<tr><td colspan=2 align=center><a class=panier href="#" onclick="verifForm(formNewCli)">&gt;&gt; '.ValidOrder.'</a></td></tr>
		';
		
	}
	
	else
	{
		echo '
		<tr><td colspan=2 align=center><a class=panier href="#" onclick="verifForm(formNewCli)">&gt;&gt; '.senregistrer.'</a></td></tr>
		';
	}
	
	echo '<tr><td colspan=2 align=right><font color="#FF0000">*</font>&nbsp;'.Obligatoire.'</td></tr>
	<tr><td colspan=2 align=center><small>
	'.LaLoi.'
	</td></tr>
	</table>
	</form>
	';
}