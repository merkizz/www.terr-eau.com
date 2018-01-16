<?php
require_once "../gestion/inc/client.php";
define("Panier"," Cesta ");
define("ZoneLivraison","Área de la entrega");
define("ParticipePort","PARTE EN LOS COSTOS DEL PUERTO");
define("ParticipePort2","Por securidad : envío por certificado+acusar recibo para todos los paquetes");
define("Price","Precio");
define("Quantity","Quantity");
define("TotalProd","Products Total ");
define("Totaux","Totales ");
define("NetAPayer","Total IVA incl");
define("Couleur","Color ");
define("selectcoul","Selecto");
define("Echantillon","Mi muestra");
define("Majoration","Aumento del P.U del Resicolor de 50% ");

define("PoidsGram","Peso en gramo");
define("PoidsColis","Peso total");
define("Grams","gramos");
define("FraisPort","Gastos de envio");
define("Comments","Comentarios, observaciones, sobre tu orden : ");
define("SaveComments","Excepto tus comentarios");

define("ThDesignation","Producto/Descripción");
define("ThReference","Ref");
define("ThPUHT","PU IVA excl");
define("ThQuantity","Cantidad");
define("ThTotalHT","Total IVA excl");
define("ThTVA","IVA");
define("ThTTC","Total IVA incl");

define("ThTotal","Total");
define("TotalCmd","Total de tu orden");


define("ThVousAvez","Tienes ");
define("ThVousAvezArticle"," artículo");
define("ThVousAvez2"," en tu carro de compras");

define("AddToCart","Añadir a la cesta ");


define("Recalculer","Update");
define("Delete","Delete");

define("AlertRecalculer","<span class=important>Attention</span> : think of clicking on 'Update' if you modify this quantity in your Shopping Cart");



define("Identification","Identificatión");
define("LogOut","Log Out");
define("PanierVide","Tu carro es vacío");
define("MyOrders","My order(s)");


define("CancelOrder","Cancelar esta orden");
define("ContinueShoppping","Continuar su compra");
define("ModifOrder","Modificar tu orden");
define("ValidOrder","Finalizar su pedido");


define("Retour","Volver");

///////////////////////////////////////////IDENTICATION

define("DejaClient","Si ya es cliente de ALTA");
define("MailClient","Su dirección de correo electrónico");
define("PasseClient","Tu contraseña es");
define("LogError","ATENCIÓN : esta contraseña no se corresponde con la dirección e-mail indicada.");
define("PassOubli","¿Ha olvidado su contraseña? ");
define("PassOubliMsg","Ha olvidado su contraseña. Vuelva a escribir su dirección de correo electrónico y acepte.<br> Recibirá inmediatamente su contraseña en su bandeja de entrada.");
define("MailError","Tu E-mail no se reconoce.");
define("Newclient","Si aún no es cliente");
define("NewclientMsg","Realizaremos la creación de tu cuenta ");
define("Validez","Continuar");
define("senregistrer","Regístrate");

define("cher","Estimado");
define("PassOubliMailMsg","Después de tu petición, estamos satisfechos enviarte tu contraseña  :");
define("PassOubliMailMsg2","Verte pronto en nuestro Web site :");
define("PassOubliMailMsgTitle","Tu contraseña");
define("PassOubliSiteMsgInfo","Te hemos enviado un E-mail con tu contraseña.");
define("PassOubliMailMsgTitleSite","Ver tu e-caja.");
///////////////////////////////////////////COMPTE

define("MonCompte","Mi cuenta");
define("Civilite","Título");
define("Selection","Selecto");
define("Nom","Nombre");
define("Prenom","Apellidos");
define("EmailCLT","Correo electrónico");
define("PwdCLT","Contraseña");


define("BillAdress","Direccion de facturacion");
define("LivrAdress","Adress de la entrega de tu orden");
define("ThisAdress","Esta direccion");
define("IsAdress","Esta es su direccion de facturacion");
define("IsNotAdress","Esta no es su direccion de facturacion");

define("Ste","Compañía (si procede)");
define("Adress","Direccion");
define("Ville","Ciudad");
define("CP","Codigo Postal");
define("Pays","Pais");
define("tel","Telefono fijo");
define("mobile","Telefono movil");
define("Obligatoire","Aviso legal");
define("LaLoi","<br>De conformidad con la ley de informatica y libertades del 6/1/1978 (art 27), dispone de un derecho de acceso y de rectificación de los datos que le conciernen :: <a class=panier2 href=\"mailto:".MAIL_WEBMASTER."\">E-mail Us</a> ::");
define("SaveModify","Excepto las modificaciones");
define("AcceptConditions","Declaro conocer las condiciones de venta y acepto los términos marcando esta casilla (para conocer las condiciones generales de vente,  <a class=panier href=".URLCDV_ES." target=\"_blank\">clic aqui</a>)");

////////////////////////////////MOYENS DE PAIEMENT
define("MoyensPaiement","Tipo de pago");
define("RecapTotal","Total de tu orden");
define("SelectPaiement","Seleccionar tu tipo de pago");
define("PayChq","Pago por el cheque");
define("PayCb","Pago por la tarjeta de crédito");
define("ValidChq","
Chascando en Continuar, tu orden será ahorrada  ;<br>
Así pues, podrás imprimir tu orden y enviarla con tu pago a los adress abajo.<br>
También, recibiste una copia de tu orden por E-mail.<br><br>
");
define("TransacCbFailedMsg","La transacción de la tarjeta de crédito falló<br>¿Deseas paga al lado del cheque?");




//////////////////////////////// PAIEMENT OK
define("Merci","Gracias por tu confianza !");
define("Cher","Estimado");
define("Merci2","tu orden se ha ahorrado en nuestra base de datos");
define("ClickPrint","Click here and print your order");
define("MailConfirmSend","Has recibido una copia de tu orden por correo enviada a");
define("MsgModeReglementChq2","Así pues, puedes imprimir tu orden y enviarla con tu pago a Alta.<br>");

//////////////////////////////// MAIL
define("EmailAuto","Esto es un E-mail automático. Ninguna respuesta necesitada ");
define("CommandeSurSite","Tienes orden en nuestro Web site");
define("NouveauCompteOk","Tu cuenta se registra, almacena este la información precioso  :");
define("DetailMsg","Here is the detail of your order - Total Amount : ");
define("MerciFinMsg","Gracias por tu fidelidad - verte pronto en nuestro Web site");
define("AdvertFinMsg1","Recibes este email que sigue tu visita en nuestro Web site ");
define("AdvertFinMsg2","Si piensas que está sobre un error, entrarnos en contacto con por favor ");
define("MailObjetCmd","Tu orden");
define("MailObjetNewClt","Tu cuenta");
define("MailMsgAdr_factur","Facturación Adress :");
define("MailMsgAdr_livr","Entrega Adress :");
define("MailMsgAdr_facturBoth","Facturación y entrega Adress :");

define("Facture","Orden");
define("DateFacture","Fecha");
define("RefFacture","Reference");
define("DetailCMD","Detalle de tu orden ");
define("ModeReglement","Modo del pago ");
define("MsgModeReglement","Modo del pago ");
define("MsgModeReglementChq","Eliges pagar por el <b>cheque</b> : <br />");
define("MsgModeReglementCB","Por la tarjeta de banco <br>La transacción de las actividades bancarias en el servidor del pago procedió bien : <br />");

define("bkmsg","<br><b>Tecleo abajo</b><br><br>Tarjetas de banco aceptadas :<br><br>");
?>