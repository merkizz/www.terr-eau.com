<?php

/*************************************************************************************************
**                                        Identifications                                       **
*************************************************************************************************/


if($_GET['A'] =='bIdent')
{
	if (isset($_SESSION['idclient']))
	{
		//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bInfosCli\">"; 
		echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bInfosCli';</script>";   
	} 
	
	if (isset($_SESSION['TempNewCli']))
	{
		//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bNewCli\">";    
		echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bNewCli';</script>";   
	}

	echo "<table cellSpacing=0 cellPadding=0 width=500 class=brdtbl align=center><tr bgcolor=\"#EEEEEE\"><td>
	&nbsp;<b>".Identification."</b></td><td align=right><a href=\"#\" class=panier onclick=\"javascript:history.go(-1);\">&lt;&lt; ".Retour."</a>&nbsp;</td></tr></table><br />
	<table width=500 border=0  class=brdtbl bordercolor=\"#EEEEEE\" align=center cellspacing=3 cellpadding=3>
	<form method=\"POST\" action\"".$_SERVER['PHP_SELF']."?A=bIdent\" name=\"formDejaCli\">
	<tr><td colspan=3 bgcolor=\"#EEEEEE\"><b>&#8226; ".DejaClient."</b></td></tr>
	<tr><td align=right>".MailClient."&nbsp;</td><td><input name=adrmailclt type=text class=pinput /><td width=30></td></tr>
	<tr><td align=right>".PasseClient."&nbsp;</td><td><input type=password name=pwdclt type=text class=pinput /><td></td></tr>
	<tr><td colspan=2 align=right><a href=\"#\" class=panier onclick=\"formDejaCli.submit()\">&gt;&gt; ".Validez."</a></td><td></td></tr>
	</form>
	<tr height=30><td colspan=3>";
	
	if (!empty($_POST['adrmailclt'])&& !empty($_POST['pwdclt']))	
	{
		//echo $_POST['adrmailclt']."-".$_POST['pwdclt'];
		//DB_Connexion ();
		$client = mysql_query("select id_client from clients WHERE adrmailclt='".$_POST['adrmailclt']."' AND pwdclt='".$_POST['pwdclt']."'");
		$nclient = mysql_num_rows($client);
		
		if(mysql_num_rows($client)!=1)
		{
			echo '<div align=center><font color="#FF0000"><b>'.LogError.'</b></font></div>';		
		}
		
		else
		{
			$resclient=mysql_fetch_array($client);	
			$_SESSION['idclient'] = $resclient['id_client']; 
			//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".$_SERVER['PHP_SELF']."?A=bInfosCli\">";
			echo"<script>window.location='".$_SERVER['PHP_SELF']."?A=bInfosCli';</script>"; 
		}
		
	}

	echo "</td></tr>
	<tr><td colspan=3 bgcolor=\"#EEEEEE\">&nbsp;&nbsp;&nbsp;<b>".PassOubli."</b></td></tr>
	<tr><td colspan=3><small>".PassOubliMsg."
	</td></tr>
	<form method=\"POST\" action\"".$_SERVER['PHP_SELF']."?A=Ident\" name=\"formMailPwdCli\">
	<tr><td align=right>".MailClient."&nbsp;</td><td><input name=MailPwdCli type=text class=pinput /></td><td></td></tr>
	<tr><td colspan=2 align=right><a class=panier href=\"#\" onclick=\"formMailPwdCli.submit()\">&gt;&gt; ".Validez."</a></td><td></td></tr>
	</form>

	<tr height=50><td colspan=3>";
	
	if (!empty($_POST['MailPwdCli']))	
	{
		$client = mysql_query("select id_client, nomclt, prenomclt, adrmailclt, pwdclt from clients WHERE adrmailclt='".strtolower($_POST['MailPwdCli'])."'");
		$nclient = mysql_num_rows($client);
		
		if(mysql_num_rows($client)!=1)
		{
			echo "<div align=center><font color=\"#FF0000\"><b>".MailError."</b></font></div>";
		}
		
		else
		{
			$resclient=mysql_fetch_array($client);
			echo "<div align=center><b><small>
			".$resclient['nomclt']." ".$resclient['prenomclt'].",<br /> 
			Vous allez recevoir dans quelques instants un email avec votre mot de passe.<br /> 		
			</small></b><br /></div>";
					

			$MsgForgotPwd="
			 ".INFOSITE_MAIL." 
			--------------------------------------------------------------------------
			(Merci de ne pas repondre a ce message automatique.)

			 Cher(e) ".$resclient['prenomclt']." ".$resclient['nomclt'].",
			 Suite a votre demande, nous avons le plaisir de vous rappeler votre mot de passe :
			 ".$resclient['pwdclt']."
			 Vous pourrez ainsi poursuivre votre commande ou consulter votre compte
			 sur notre site : ".URLSITE.".
			 
			--------------------------------------------------------------------------
			\r\n
			Vous recevez cet email suite à votre visite sur notre site :  ".URLSITE.".
			Si vous pensez qu'il s'agit d'une erreur, veuillez nous contacter : " .MAIL_WEBMASTER. ".
			--------------------------------------------------------------------------
			\r\n
			";

			mail($resclient['adrmailclt'],CLIENT." : Votre mot de passe ",$MsgForgotPwd,"From: " .CLIENT. " <" .MAIL_WEBMASTER. ">\r\n");
			echo "<div align=center><font color=\"#FF0000\"><b>Consultez votre boîte aux lettres électronique.</b></font></div>";															
		}
	}

	echo "</td></tr>
	<tr><td colspan=3 bgcolor=\"#EEEEEE\"><b>&#8226; ".Newclient."</td></tr>
	<tr><td colspan=3 align=center>".NewclientMsg."&nbsp;</td></tr>  
	<tr><td colspan=2 align=right><a class=panier href=\"".$_SERVER['PHP_SELF']."?A=bNewCli\">&gt;&gt; ".Validez."</a></td><td></td></tr>
	<tr height=30><td colspan=3>&nbsp;</td></tr>
	</table>";
	
}

?>