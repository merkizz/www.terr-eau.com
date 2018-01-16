<?php
require_once "../gestion/inc/client.php";
define("Panier"," Shopping Cart ");
define("ZoneLivraison","Delivery area");
define("ParticipePort","SHARE IN THE EXPENSES OF PORT");
define("ParticipePort2","For safety, the products are sent by \"Checked Colissimo\" in France and registered post + acknowlegment of receipt out of France");
define("Price","Price");
define("Quantity","Quantity");
define("TotalProd","Products Total ");
define("Totaux","Totals ");
define("NetAPayer","Total IAT ");
define("Couleur","Color ");
define("selectcoul","Select");
define("Echantillon","My sample");
define("Majoration","Increase of the unit price of 50% (Resicolor)");

define("PoidsGram","Weight in gram");
define("PoidsColis","Total Weight");
define("Grams","grams");
define("FraisPort","Port");
define("Comments","Comments, Remarks, about your order : ");
define("SaveComments","Save your comments");

define("ThDesignation","Product/Designation");
define("ThReference","Ref");
define("ThPUHT","UP NET");
define("ThQuantity","Qty");
define("ThTotalHT","Total net");
define("ThTVA","VAT");
define("ThTTC","Total IAT");

define("ThTotal","Total");
define("TotalCmd","Total of your order");


define("ThVousAvez","You have ");
define("ThVousAvezArticle"," article");
define("ThVousAvez2"," in your shopping cart");

define("AddToCart","Add to Shopping Cart");


define("Recalculer","Update");
define("Delete","Delete");

define("AlertRecalculer","<span class=important>Attention</span> : think of clicking on 'Update' if you modify this quantity in your Shopping Cart");



define("Identification","Sign In");
define("LogOut","Log Out");
define("PanierVide","Your cart is empty");
define("MyOrders","My order(s)");


define("CancelOrder","Cancel this order");
define("ContinueShoppping","Continue Shopping");
define("ModifOrder","Modify your order");
define("ValidOrder","Proceed to Checkout");


define("Retour","Back");

///////////////////////////////////////////IDENTICATION

define("DejaClient","Returning Customer");
define("MailClient","Enter your e-mail address");
define("PasseClient","Your password is");
define("LogError","Your e-mail or your password is invalid.");
define("PassOubli","Forgot your password ?");
define("PassOubliMsg","Enter your e-mail address, then click Continue<br><br>We'll email you your password.");
define("MailError","Your e-mail is not recognized.");
define("Newclient","New customer");
define("NewclientMsg","We will carry out the creation of your account ");
define("Validez","Continue");
define("senregistrer","Sign In");

define("cher","Dear");
define("PassOubliMailMsg","Following your request, we are pleased to send you your password  :");
define("PassOubliMailMsg2","See you soon on our website :");
define("PassOubliMailMsgTitle","Your password");
define("PassOubliSiteMsgInfo","We have sent you an e-mail with your password.");
define("PassOubliMailMsgTitleSite","See your e-mail box.");
///////////////////////////////////////////COMPTE

define("MonCompte","My account");
define("Civilite","Title");
define("Selection","Select");
define("Nom","Last Name");
define("Prenom","First Name");
define("EmailCLT","E-mail");
define("PwdCLT","Password");


define("BillAdress","My billing adress");
define("LivrAdress","Delivery adress of your order");
define("ThisAdress","This adress");
define("IsAdress","is also your delivery adress");
define("IsNotAdress","is NOT your delivery adress");

define("Ste","Company (if required)");
define("Adress","Adress");
define("Ville","Town/City");
define("CP","PostCode");
define("Pays","Country");
define("tel","Landline Telephone");
define("mobile","Mobile phone");
define("Obligatoire","Legal notice");
define("LaLoi","<br>Conforming to the French Internet law \"Informatique et Libertés\" (art 34) you have the right to access and modify all personal information<br> :: <a class=panier2 href=\"mailto:".MAIL_WEBMASTER."\">E-mail Us</a> ::");
define("SaveModify","Save the modifications");
define("AcceptConditions","I confirm that I have read the general conditions of sale and accept the terms thereof by checking this box (to view the general conditions of sale,  <a class=panier href=".URLCDV_EN." target=\"_blank\">click here</a>)");

////////////////////////////////MOYENS DE PAIEMENT
define("MoyensPaiement","Type of payment");
define("RecapTotal","Total of your order");
define("SelectPaiement","Select your type of payment");
define("PayChq","Payment by check");
define("PayCb","Payment by credit card");
define("ValidChq","
By clicking on \"Continue\", your order will be saved ;<br>
You will received a copy of this order by e-mail ;<br>
So, you will be able to print your order and send it with your payment to the adress below.
.<br><br>
");
define("TransacCbFailedMsg","Credit card transaction failed<br>Do you want pay by check ?");




//////////////////////////////// PAIEMENT OK
define("Merci","Thank you for your confidence !");
define("Cher","Dear");
define("Merci2","your order has been saved in our database");
define("ClickPrint","Click here and print your order");
define("MailConfirmSend","You have received a copy of your order by mail sent to");
define("MsgModeReglementChq2","So, you can print your order and send it with your payment to Alta.<br>");

//////////////////////////////// MAIL
define("EmailAuto","This is an automatic e-mail. No response needed");
define("CommandeSurSite","You have order on our website");
define("NouveauCompteOk","Your account is recorded,
 store these information preciously :");
define("DetailMsg","Here is the detail of your order - Total Amount : ");
define("MerciFinMsg","Thank you for your fidelity - See you soon on our web site");
define("AdvertFinMsg1","You receive this email following your visit on our web site");
define("AdvertFinMsg2","If you think that it is about an error, please contact us ");
define("MailObjetCmd","Your Order");
define("MailObjetNewClt","Your Account");
define("MailMsgAdr_factur","Billing Adress :");
define("MailMsgAdr_livr","Delivery Adress :");
define("MailMsgAdr_facturBoth","Billing and Delivery Adress :");


define("Facture","Order");
define("DateFacture","Date");
define("RefFacture","Reference");
define("DetailCMD","Detail of your order ");
define("ModeReglement","Mode of payment ");
define("MsgModeReglement","Mode of payment ");
define("MsgModeReglementChq","You choose to pay by <b>cheque</b> : <br />");
define("MsgModeReglementCB","By bank card<br>The <b>banking transaction</b> on the server of payment proceeded well : <br />");

define("bkmsg","<br><b>Click below</b><br><br>Accepted bank cards :<br><br>");
?>