<?php
require_once "../gestion/inc/client.php";
define("Panier","Panier");
define("ZoneLivraison","Zone de livraison");
define("ParticipePort","PARTICIPATION AUX FRAIS DE PORT");
define("ParticipePort2","Pour la s�curit� des envois, tous les colis sont effectu�s en colissimo suivi pour la France m�tropolitaine et en recommand� pour l'�tranger");
define("Price","Prix");
define("Quantity","Quantit�");
define("TotalProd","Total Produits ");
define("Totaux","Totaux ");
define("NetAPayer","Net � payer ");
define("Couleur","Couleur ");
define("selectcoul","S�lectionnez");
define("Echantillon","Mon �chantillon");
define("Majoration","Majoration du P.U du R�sicolor de 50%");

define("PoidsGram","Poids en gramme");
define("PoidsColis","Poids du colis");
define("Grams","grammes");
define("FraisPort","Frais de port");
define("Comments","Commentaires / Remarques / Pr�cisions � apporter � votre commande : ");
define("SaveComments","Enregistrer vos remarques");

define("ThDesignation","Produit/Designation");
define("ThReference","Ref");
define("ThPUHT","PU HT");
define("ThQuantity","Qte");
define("ThTotalHT","Total HT");
define("ThTVA","TVA");
define("ThTTC","Total TTC");



define("ThTotal","Total");
define("TotalCmd","Total de votre commande");


define("ThVousAvez","Vous avez ");
define("ThVousAvezArticle"," article");
define("ThVousAvez2"," dans votre panier");



define("AddToCart","Ajouter au panier");

define("Recalculer","Recalculer");
define("Delete","Delete");

define("AlertRecalculer","<span class=important>Attention</span> : pensez � cliquer sur 'Recalculer' si vous modifiez cette quantit� dans votre panier");



define("Identification","S'identifier");
define("LogOut","Deconnexion");
define("PanierVide","Votre panier est vide");
define("MyOrders","Mes commande(s)");



define("CancelOrder","Annuler votre commande");
define("ContinueShoppping","Consulter le catalogue");
define("ModifOrder","Modifier votre commande");
define("ValidOrder","Valider votre commande");


define("Retour","Retour");

///////////////////////////////////////////IDENTICATION

define("DejaClient","D�j� client");
define("MailClient","Entrez votre adresse e-mail");
define("PasseClient","Votre mot de passe");
define("LogError","Votre e-mail ou votre mot de passe sont invalides.");
define("PassOubli","Mot de passe oubli� ?");
define("PassOubliMsg","Entrez votre adresse e-mail et validez<br><br>Vous recevrez imm�diatement votre mot de passe dans votre bo�te aux lettres �lectronique.");
define("MailError","Votre e-mail n'est pas reconnu.");
define("Newclient","Nouveau client");
define("NewclientMsg","Nous allons proc�der � la cr�ation de votre compte");
define("Validez","Continuer");
define("senregistrer","S'enregistrer");

define("cher","Cher(e)");
define("PassOubliMailMsg","Suite a votre demande, nous avons le plaisir de vous rappeler votre mot de passe :");
define("PassOubliMailMsg2","Vous pourrez ainsi poursuivre votre commande ou consulter votre compte sur notre site :");
define("PassOubliMailMsgTitle","Votre mot de passe");
define("PassOubliSiteMsgInfo","Vous allez recevoir dans quelques instants un email avec votre mot de passe.");
define("PassOubliMailMsgTitleSite","Consultez votre bo�te aux lettres �lectronique.");

///////////////////////////////////////////COMPTE

define("MonCompte","Mon compte");
define("Civilite","Civilit�");
define("Selection","S�lectionnez");
define("Nom","Nom");
define("Prenom","Prenom");
define("EmailCLT","Email");
define("PwdCLT","Mot de passe");


define("BillAdress","Adresse de facturation");
define("LivrAdress","Adresse de livraison de votre commande");
define("ThisAdress","Cette adresse");
define("IsAdress","est votre adresse de livraison");
define("IsNotAdress","n'est pas votre adresse de livraison");

define("Ste","Soci�t�");
define("Adress","Adresse");
define("Ville","Ville");
define("CP","Code postal");
define("Pays","Pays");
define("tel","T�l�phone");
define("mobile","Tel mobile");
define("Obligatoire","Mentions obligatoires");
define("LaLoi","<br>Vous disposez d'un droit d'acc�s, de modification, de rectification et de suppression des donn�es qui vous concernent
<br>(art. 34 de la loi \"Informatique et Libert�s\"). Pour l'exercer, :: <a class=panier2 href=\"mailto:".MAIL_WEBMASTER."\">Ecrivez-nous</a> ::");
define("SaveModify","Enregistrez modifications");
define("AcceptConditions","Je d&eacute;clare avoir pris connaissance des conditions de vente et en accepte les termes en cochant cette case (pour conna&icirc;tre les conditions g&eacute;n&eacute;rales de vente, <a class=panier href=\"".URLCDV."\" target=\"_blank\">cliquez ici</a>)");




////////////////////////////////MOYENS DE PAIEMENT
define("MoyensPaiement","Moyens de paiement");
define("RecapTotal","Le montant total de votre commande s'�l�ve �");
define("SelectPaiement","S�lectionnez ci-dessous votre moyen de paiement");
define("PayChq","Paiement par ch�que");
define("PayCb","Paiement par carte bancaire");
define("ValidChq","
<b>En cliquant ci-dessous sur le lien \"Continuer\", votre commande sera valid�e et enregistr�e ;</b><br />
Vous allez recevoir par e-mail une copie du bon de commande ;<br>
vous pourrez ainsi l'imprimer puis nous le renvoyer accompagn�e de votre r�glement � l'adresse ci-dessous.<br><br>
");
define("TransacCbFailedMsg","La transaction par carte bancaire a �chou�e<br>D�sirez-vous r�gler par ch�que ?");



//////////////////////////////// PAIEMENT OK
define("Merci","Merci de votre confiance !");
define("Cher","Cher(e)");
define("Merci2","votre commande a �t� enregistr�e avec succ�s");
define("ClickPrint","Cliquez ici pour imprimer votre bon de commande");
define("MailConfirmSend","Vous avez re�u une copie de la commande ci-dessous par e-mail � l'adresse");
define("MsgModeReglementChq2","Vous pouvez ainsi l'imprimer et nous le renvoyer accompagn� de votre r�glement : <br />");
//////////////////////////////// MAIL
define("EmailAuto","Merci de ne pas repondre a ce message automatique.");
define("CommandeSurSite","Vous venez d'effectuer une commande sur notre site.");
define("NouveauCompteOk","Votre compte � bien �t� cr��,
 conservez pr�cieusement ces informations :");
define("DetailMsg","Voici le d�tail de votre commande d'un montant total de ");
define("MerciFinMsg","Merci de votre fid�lit� et � bient�t sur notre site");
define("AdvertFinMsg1","Vous recevez cet email suite � votre visite sur notre site");
define("AdvertFinMsg2","Si vous pensez qu'il s'agit d'une erreur, veuillez nous contacter");
define("MailObjetCmd","Votre commande");
define("MailObjetNewClt","Cr�ation de votre compte");
define("MailMsgAdr_factur","Adresse de facturation :");
define("MailMsgAdr_livr","Adresse de livraison :");
define("MailMsgAdr_facturBoth","Adresse de facturation et de livraison :");



define("Facture","Commande");
define("DateFacture","Date");
define("RefFacture","R�f�rence");
define("DetailCMD","D�tail de votre commande ");
define("ModeReglement","Mode de r�glement ");
define("MsgModeReglement","Mode de r�glement ");
define("MsgModeReglementChq","Vous avez choisi de r�gler par <b>ch�que</b> : <br />");
define("MsgModeReglementCB","Par carte banquaire<br>La <b>transaction bancaire</b> sur le serveur de paiement s'est bien d�roul�e : <br />");

define("bkmsg","<br><b>Cliquez ci-dessous pour acc�dez au serveur de paiement s�curis�</b><br><br>Cartes de paiement accept�es :<br><br>");
?>