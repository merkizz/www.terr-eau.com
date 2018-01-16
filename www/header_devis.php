<?php
$destinataire="jardinier@terr-eau.com";



$sujet="Formulaire de Devis";   //si nécessaire (autre exemple "devis"...)


/*

Pour chaque champ supplémentaire,

Ajouter :

$NomDuChamp=htmlentities(stripslashes(trim($_POST['NomDuChamp'])));
has_no_newlines($NomDuChamp); (pas pour les textarea)
has_no_emailheaders($NomDuChamp); 

	 		 			
Champ obligatoires supplémentaires : MODIFIER le javascript)

*/


if (isset($_POST['public_mail'])){
require_once "/home/sites/lelog.net/website/mail_auth/mail_auth.php";

//4 javascript plaster
if (trim($_POST["plaster"]) != "incomm"){exit("Erreur : plaster");}

//5 champ vide	
if (trim($_POST['public_mail'])!=""){exit("Erreur : public_mail");}
 
// ici et pas ailleurs (1)
if ($_SERVER['HTTP_REFERER']!=$page_du_formulaire){exit("Erreur : REFERER");}

// 6 Impossible d'envoyer un second mail pendant 60"
//if (isset($_COOKIE["recomSent"]) && $_COOKIE["recomSent"] == "1"){
//exit("Erreur : cookie");
//}else{
//setcookie("recomSent", "1", time()+60);

//TRAITEMENT DES CHAMPS

//test d'un champ text  input
$nom=test_input(htmlentities(trim($_POST['nom'])));
$lemail=test_input(htmlentities(trim($_POST['lemail'])));
$telephone=test_input(htmlentities(trim($_POST['telephone'])));

$adresse=test_input(htmlentities(trim($_POST['adresse'])));
$ville=test_input(htmlentities(trim($_POST['ville'])));
$cp=test_input(htmlentities(trim($_POST['cp'])));

$message=nl2br(htmlentities($_POST['message']));
test_textarea($message);


// repérer le nom de l'hôte dans l'URL
preg_match('@^(?:http://)?([^/]+)@i',$page_du_formulaire, $matches);
$host = $matches[1];

// repérer les deux derniers segments du nom de l'hôte
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
//echo "Le nom de domaine est : ".$matches[0]."\n";


$lemessage=
"
<table border=0 cellspacing=3 cellpadding=0 align=left>
<tr> 
    <td colspan=2><b>:: ".$matches[0]." - ".$sujet." :: </b></td>
</tr>
<tr valign=top align=center> 
  <td colspan=2><hr></td>
</tr>
<tr> 
  <td>Nom :</td>
  <td><b>".$nom."</b></td>
</tr>
<tr> 
  <td>E-mail : </td>
  <td><b>".$lemail."</b></td>
</tr>
<tr> 
  <td>T&eacute;l&eacute;phone : </td>
  <td><b>".$telephone."</b></td>
</tr>

<tr> 
  <td>Adresse :</td>
  <td><b>".$adresse."</b></td>
</tr>
<tr> 
  <td>Ville :</td>
  <td><b>".$ville."</b></td>
</tr>
<tr> 
  <td>Code Postal :</td>
  <td><b>".$cp."</b></td>
</tr>
<tr> 
  <td valign=top>Message : </td>
  <td><b>".stripslashes($message)."</b></td>
</tr>  
</table>
";
//echo $message;//exit("Envoi du mail");
//mail("".$destinataire."","".$sujet."",$lemessage,$headers);


$Dest=$destinataire;
$Sujet=$matches[0]." - ".$sujet;
$Mail=$lemessage;
$From=$lemail;

incomm_mail_auth($Dest, $Sujet, $Mail, $From, $Cc="", $Bcc="", $Encode="text/html; charset=\"ISO-8859-1\"", $Tab_Attachements="");

?>
<script>alert("Votre message a été envoyé à <?php echo $matches[0];?>")</script>
<?php
//}//cookie
}//formulaire posté

?>


<script language="JavaScript" type="text/javascript">
<!--
function checkForm() {
var ErrorColor = "#FFCC66";
//(4)
document.formcontact.plaster.value = "incomm";

//8 Champs obligatoires			
  if (document.formcontact.nom.value == "") {
    alert("* Champs obligatoires.\n");    
    document.formcontact.nom.style.backgroundColor=ErrorColor;
    document.formcontact.nom.focus();
    return false;
  }

if (document.formcontact.lemail.value == "") {
    alert("* Champs obligatoires.\n");    
    document.formcontact.lemail.style.backgroundColor=ErrorColor;
    document.formcontact.lemail.focus();
    return false;
  }


var x = formcontact.lemail.value;
var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(x)) {
	
	alert('Adresse email invalide');
	formcontact.lemail.style.backgroundColor=ErrorColor;
	formcontact.lemail.focus();		
	return false;
	
	}
	
      
 if (document.formcontact.message.value == "") {
    alert("* Champs obligatoires.\n");    
    document.formcontact.message.style.backgroundColor=ErrorColor;
    document.formcontact.message.focus();
    return false;
  }     
  return true;     
     
}
-->
</script>