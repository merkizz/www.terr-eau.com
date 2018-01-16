<?php
require_once "../gestion/inc/client.php";
define("Panier","Panier");
define("ZoneLivraison","Zone de livraison");
define("ParticipePort","PARTICIPATION AUX FRAIS DE PORT");
define("ParticipePort2","Pour la sécurité des envois, tous les colis sont effectués en colissimo suivi pour la France métropolitaine et en recommandé pour l'étranger");
define("Price","Prix");
define("Quantity","Quantité");
define("TotalProd","Total Produits ");
define("Totaux","Totaux ");
define("NetAPayer","Net à payer ");
define("Couleur","Couleur ");
define("selectcoul","Sélectionnez");
define("Echantillon","Mon échantillon");
define("Majoration","Majoration du P.U du Résicolor de 50%");

define("PoidsGram","Poids en gramme");
define("PoidsColis","Poids du colis");
define("Grams","grammes");
define("FraisPort","Frais de port");
define("Comments","Commentaires / Remarques / Précisions à apporter à votre commande : ");
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

define("AlertRecalculer","<span class=important>Attention</span> : pensez à cliquer sur 'Recalculer' si vous modifiez cette quantité dans votre panier");



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

define("DejaClient","Déjà client");
define("MailClient","Entrez votre adresse e-mail");
define("PasseClient","Votre mot de passe");
define("LogError","Votre e-mail ou votre mot de passe sont invalides.");
define("PassOubli","Mot de passe oublié ?");
define("PassOubliMsg","Entrez votre adresse e-mail et validez<br><br>Vous recevrez immédiatement votre mot de passe dans votre boîte aux lettres électronique.");
define("MailError","Votre e-mail n'est pas reconnu.");
define("Newclient","Nouveau client");
define("NewclientMsg","Nous allons procéder à la création de votre compte");
define("Validez","Continuer");
define("senregistrer","S'enregistrer");

define("cher","Cher(e)");
define("PassOubliMailMsg","Suite a votre demande, nous avons le plaisir de vous rappeler votre mot de passe :");
define("PassOubliMailMsg2","Vous pourrez ainsi poursuivre votre commande ou consulter votre compte sur notre site :");
define("PassOubliMailMsgTitle","Votre mot de passe");
define("PassOubliSiteMsgInfo","Vous allez recevoir dans quelques instants un email avec votre mot de passe.");
define("PassOubliMailMsgTitleSite","Consultez votre boîte aux lettres électronique.");

///////////////////////////////////////////COMPTE

define("MonCompte","Mon compte");
define("Civilite","Civilité");
define("Selection","Sélectionnez");
define("Nom","Nom");
define("Prenom","Prenom");
define("EmailCLT","Email");
define("PwdCLT","Mot de passe");


define("BillAdress","Adresse de facturation");
define("LivrAdress","Adresse de livraison de votre commande");
define("ThisAdress","Cette adresse");
define("IsAdress","est votre adresse de livraison");
define("IsNotAdress","n'est pas votre adresse de livraison");

define("Ste","Société");
define("Adress","Adresse");
define("Ville","Ville");
define("CP","Code postal");
define("Pays","Pays");
define("tel","Téléphone");
define("mobile","Tel mobile");
define("Obligatoire","Mentions obligatoires");
define("LaLoi","<br>Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent
<br>(art. 34 de la loi \"Informatique et Libertés\"). Pour l'exercer, :: <a class=panier2 href=\"mailto:".MAIL_WEBMASTER."\">Ecrivez-nous</a> ::");
define("SaveModify","Enregistrez modifications");
define("AcceptConditions","Je d&eacute;clare avoir pris connaissance des conditions de vente et en accepte les termes en cochant cette case (pour conna&icirc;tre les conditions g&eacute;n&eacute;rales de vente, <a class=panier href=\"".URLCDV."\" target=\"_blank\">cliquez ici</a>)");




////////////////////////////////MOYENS DE PAIEMENT
define("MoyensPaiement","Moyens de paiement");
define("RecapTotal","Le montant total de votre commande s'élève à");
define("SelectPaiement","Sélectionnez ci-dessous votre moyen de paiement");
define("PayChq","Paiement par chèque");
define("PayCb","Paiement par carte bancaire");
define("ValidChq","
<b>En cliquant ci-dessous sur le lien \"Continuer\", votre commande sera validée et enregistrée ;</b><br />
Vous allez recevoir par e-mail une copie du bon de commande ;<br>
vous pourrez ainsi l'imprimer puis nous le renvoyer accompagnée de votre règlement à l'adresse ci-dessous.<br><br>
");
define("TransacCbFailedMsg","La transaction par carte bancaire a échouée<br>Désirez-vous régler par chèque ?");



//////////////////////////////// PAIEMENT OK
define("Merci","Merci de votre confiance !");
define("Cher","Cher(e)");
define("Merci2","votre commande a été enregistrée avec succès");
define("ClickPrint","Cliquez ici pour imprimer votre bon de commande");
define("MailConfirmSend","Vous avez reçu une copie de la commande ci-dessous par e-mail à l'adresse");
define("MsgModeReglementChq2","Vous pouvez ainsi l'imprimer et nous le renvoyer accompagné de votre règlement : <br />");
//////////////////////////////// MAIL
define("EmailAuto","Merci de ne pas repondre a ce message automatique.");
define("CommandeSurSite","Vous venez d'effectuer une commande sur notre site.");
define("NouveauCompteOk","Votre compte à bien été créé,
 conservez précieusement ces informations :");
define("DetailMsg","Voici le détail de votre commande d'un montant total de ");
define("MerciFinMsg","Merci de votre fidélité et à bientôt sur notre site");
define("AdvertFinMsg1","Vous recevez cet email suite à votre visite sur notre site");
define("AdvertFinMsg2","Si vous pensez qu'il s'agit d'une erreur, veuillez nous contacter");
define("MailObjetCmd","Votre commande");
define("MailObjetNewClt","Création de votre compte");
define("MailMsgAdr_factur","Adresse de facturation :");
define("MailMsgAdr_livr","Adresse de livraison :");
define("MailMsgAdr_facturBoth","Adresse de facturation et de livraison :");



define("Facture","Commande");
define("DateFacture","Date");
define("RefFacture","Référence");
define("DetailCMD","Détail de votre commande ");
define("ModeReglement","Mode de règlement ");
define("MsgModeReglement","Mode de règlement ");
define("MsgModeReglementChq","Vous avez choisi de régler par <b>chèque</b> : <br />");
define("MsgModeReglementCB","Par carte banquaire<br>La <b>transaction bancaire</b> sur le serveur de paiement s'est bien déroulée : <br />");

define("bkmsg","<br><b>Cliquez ci-dessous pour accédez au serveur de paiement sécurisé</b><br><br>Cartes de paiement acceptées :<br><br>");
?>