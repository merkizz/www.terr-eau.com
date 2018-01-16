<?php

/*************************************************************************************************
**                                      validation de paiement                                  **
*************************************************************************************************/

if($_GET['A'] =='bValidPayMod')
{
	//Le client à sélectionné un moyen de paiement puis cliqué sur "continuer"
	//echo $_GET['PayMod'];
	//exit;
	$amount=$_SESSION['montant'];
	//$amount=number_format($amount, 2,'.','');
	$amount= str_replace(".", ",", $amount);

	if (isset($_SESSION['adr_livr'])){
		$adr_livr=$_SESSION['adr_livr'];$adrclt_adrlivr=1;
		$MailMsgAdr_factur=MailMsgAdr_factur;
		$MailMsgAdr_livr=MailMsgAdr_livr.$adr_livr;
	}else{
		$MailMsgAdr_factur=MailMsgAdr_facturBoth;
		$adr_livr="";$adrclt_adrlivr=0;
		$MailMsgAdr_livr="";
	}
	$aujourdhui = date("Y-m-d H:i:s");$ref1=date("Ymd");


	if (isset($_SESSION['client'])){
		
		
		$idclient=$_SESSION['client']['id_client'];
		
		
		$sqlPays=mysql_query("SELECT * FROM pays WHERE idpays=".$_SESSION['client']['idpaysclt']."");
		$rowPays = mysql_fetch_array($sqlPays);
		
		
		$adr_factur=$_SESSION['str_identifie']."\n".$_SESSION['client']['steclt']."\n".$_SESSION['client']['adrclt']."\n".$_SESSION['client']['cpclt']."\t".$_SESSION['client']['villeclt']."\n".$rowPays[$pays];
		
		$ref_cmd = $ref1."-".$_SESSION['client']['id_client'];
		$idclient=$_SESSION['client']['id_client'];
		
		
		$AdrMailNewCmd=$_SESSION['client']['adrmailclt'];
		$MailMsgAdr_factur.=$adr_factur;
		
		
		$nom=$_SESSION['client']['nomclt'];
		$prenom=$_SESSION['client']['prenomclt'];
		$ste=$_SESSION['client']['steclt'];
		$tel=$_SESSION['client']['telclt'];
		$adrmailclt=$_SESSION['client']['adrmailclt'];
		$fax="";
		$adresse=$_SESSION['client']['adrclt'];
		$cp=$_SESSION['client']['cpclt'];
		$ville=$_SESSION['client']['villeclt'];
		
		
		
	}else{
		
		
		$AdrMailNewCmd=$_SESSION['TempNewCli']['adrmailclt'];
		mysql_query("INSERT INTO clients (id_client, steclt, civclt, nomclt, prenomclt, adrmailclt, pwdclt, adrclt, cpclt, villeclt, idpaysclt, telclt) 
			VALUES ('', '".$_SESSION['TempNewCli']['steclt']."', '".$_SESSION['TempNewCli']['civclt']."', '".$_SESSION['TempNewCli']['nomclt']."',
			'".$_SESSION['TempNewCli']['prenomclt']."', '".$_SESSION['TempNewCli']['adrmailclt']."', '".$_SESSION['TempNewCli']['pwdclt']."',
			'".$_SESSION['TempNewCli']['adrclt']."', '".$_SESSION['TempNewCli']['cpclt']."', '".$_SESSION['TempNewCli']['villeclt']."',
			'".$_SESSION['TempNewCli']['idpaysclt']."', '".$_SESSION['TempNewCli']['telclt']."')");
		
		$_SESSION['idclient']=mysql_insert_id();
		$idclient=$_SESSION['idclient'];
		$_SESSION['str_identifie']=$_SESSION['TempNewCli']['civclt']." ".$_SESSION['TempNewCli']['nomclt']." ".$_SESSION['TempNewCli']['prenomclt'];
		$sqlPays=mysql_query("SELECT pays_fr FROM pays WHERE id_pays='".$_SESSION['TempNewCli']['idpaysclt']."'");
		
		
		$rowPays = mysql_fetch_array($sqlPays);
		$adr_factur=$_SESSION['str_identifie']."\n".$_SESSION['TempNewCli']['steclt']."\n".$_SESSION['TempNewCli']['adrclt']."\n".$_SESSION['TempNewCli']['cpclt']."\t".$_SESSION['TempNewCli']['villeclt']."\n".$rowPays[$pays];
		$MailMsgAdr_factur.=$adr_factur;
		$ref_cmd = $ref1."-".$_SESSION['idclient'];
		//envoil mail création compte
		$sqlPays=mysql_query("SELECT pays_fr FROM pays WHERE id_pays='".$_SESSION['NewCli']['idpaysclt']."'");
		$rowPays = mysql_fetch_array($sqlPays);
		//$destinataire=$_SESSION['TempNewCli']['adrmailclt'];
		
		
		$nom=$_SESSION['TempNewCli']['nomclt'];
		$prenom=$_SESSION['TempNewCli']['prenomclt'];
		$ste=$_SESSION['TempNewCli']['steclt'];
		$tel=$_SESSION['TempNewCli']['telclt'];
		$adrmailclt=$_SESSION['TempNewCli']['adrmailclt'];
		$fax="";
		$adresse=$_SESSION['TempNewCli']['adrclt'];
		$cp=$_SESSION['TempNewCli']['cpclt'];
		$ville=$_SESSION['TempNewCli']['villeclt'];
		
		$MsgNewAccountForCmd="
".INFOSITE_MAIL."		  
--------------------------------------------------------------------------
".EmailAuto."

".Cher." ".$_SESSION['str_identifie'].",

".NouveauCompteOk."
\r\n
".Civilite.".... : ".$_SESSION['TempNewCli']['civclt']."
".Nom."......... : ".$_SESSION['TempNewCli']['nomclt']."
".Prenom."...... : ".$_SESSION['TempNewCli']['prenomclt']."
".Ste."..... : ".$_SESSION['TempNewCli']['steclt']."
".EmailCLT."....... : ".$_SESSION['TempNewCli']['adrmailclt']."
".PwdCLT." : ".$_SESSION['TempNewCli']['pwdclt']."
".Adress."..... : ".$_SESSION['TempNewCli']['adrclt']."
".CP.". : ".$_SESSION['TempNewCli']['cpclt']."
".Ville."....... : ".$_SESSION['TempNewCli']['villeclt']."
".Pays."........ : ".$rowPays['nom_fr']."
".tel."... : ".$_SESSION['TempNewCli']['telclt']."
\r\n		
".MerciFinMsg." : ".URLSITE."
--------------------------------------------------------------------------
".AdvertFinMsg1." :  ".URLSITE.".
".AdvertFinMsg2." : " .MAIL_WEBMASTER. ".
--------------------------------------------------------------------------
\r\n
";

		mail($_SESSION['TempNewCli']['adrmailclt'],CLIENT." : Création de votre compte ",$MsgNewAccountForCmd,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
		mail(MAIL_WEBMASTER,CLIENT." : Nouvelle inscription ",$MsgNewAccountForCmd,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
		mail(MAIL_DEVELOPPEUR,CLIENT." : Nouvelle inscription ",$MsgNewAccountForCmd,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
		
		
	}
	
	$MsgDetailCmd="";	
	//enregistrement commande client existant ou nouveau
	
	$sql=
	"INSERT INTO commandes (id_cmd, date_cmd, ref_cmd, id_client, montant, fraisport, paiement, adrclt_adrlivr, adr_factur, adr_livr) 
			VALUES (NULL, '".$aujourdhui."', '".$ref_cmd."', '".$idclient."', '".$_SESSION['montant']."', '".$_SESSION['FraisDePort']."', '".$_GET['PayMod']."', '".$adrclt_adrlivr."', '".addslashes($adr_factur)."', '".addslashes($adr_livr)."')";
	
	
	
	
	mysql_query($sql);
	
	//printf("insertion : %d\n", mysql_affected_rows());
	
	//echo $sql;
	//exit;
	
	$id_cmd=mysql_insert_id();
	//$j=1;
	for($i=0;$i<$_SESSION['nbprod'];$i++){
		
		
		
		
		$insert_detail_cmd="INSERT INTO detail_cmd (id_detcmd,id_cmd,id_client,id_produit,prixu, qte)	 
			VALUES ('', '".$id_cmd."','".$idclient."','".$_SESSION['panier'][$i]['idprod']."','".$_SESSION['panier'][$i]['pu']."', '".$_SESSION['panier'][$i]['qte']."')";					
		
		//exit($insert_detail_cmd);
		mysql_query($insert_detail_cmd);
		
		//exit($insert_detail_cmd);
		
	}





	if ($_GET['PayMod']=="cb"){
		//include 'bk/call/call_request.php';
		echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bPayMod&cbok&i=".$id_cmd."&r=".$ref_cmd."&c=".$_SESSION['idclient']."\">";



	}elseif($_GET['PayMod']=="cheque"){

		echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bSave&PayMod=cheque&idc=".$id_cmd."\">";
	}





}


?>