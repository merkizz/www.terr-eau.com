<?php
if (isset($_POST['public_mail'])) {
    if ($_SERVER['HTTP_REFERER'] != 'http://www.terr-eau.com/devis.php') {
        exit("Opération non autorisée");
    }

    $nom        = trim($_POST['nom']);
    $email      = trim($_POST['lemail']);
    $telephone  = trim($_POST['telephone']);
    $adresse    = trim($_POST['adresse']);
    $ville      = trim($_POST['ville']);
    $codepostal = trim($_POST['cp']);
    $message    = nl2br($_POST['message']);

    $headers  = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
        'From: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $destinataire   = "jardinier@terr-eau.com";
    $sujet          = "Terr'Eau - Demande de devis";
    $body           =
    "
    <!DOCTYPE html>
    <html lang=\"fr-FR\">
    <head>
        <title>Terre'Eau - Demande de devis</title>
    </head>
    <body bgcolor=\"#efefef\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">
        <table width=\"700\" bgcolor=\"#ffffff\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\" style=\"margin-top: 30px; padding: 20px\">
            <tr>
                <td colspan=\"2\">
                    <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                        <td width=\"110\">
                            <img src=\"http://www.terr-eau.com/content/pics/logo.gif\" width=\"110\" height=\"83\" alt=\"Terr'Eau\">
                        </td>
                        <td width=\"590\" valign=\"middle\" style=\"text-align: center;\">
                            <font face=\"Arial, Verdana, Helvetica\" style=\"color: #017601; font-size: 26px;\"><strong>DEMANDE DE DEVIS</strong></font>
                        </td>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan=\"2\"><hr></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Nom :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$nom."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Email :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$email."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">T&eacute;l&eacute;phone :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$telephone."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Adresse :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$adresse."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Ville :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$ville."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Code postal :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$codepostal."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\" valign=\"top\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Message :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$message."</strong></font></td>
            </tr>
        </table>
    </body>
    </html>
    ";

    mail($destinataire, $sujet, $body, $headers);
?>
    <script>alert("Votre demande de devis a été envoyée à Terr'Eau");</script>
<?php
}
?>

<script language="JavaScript" type="text/javascript">
<!--
function checkForm() {
    var errorColor = "#FFCC66";

    if (document.formcontact.nom.value == "") {
        alert("Vous devez renseigner votre nom");
        document.formcontact.nom.style.backgroundColor = errorColor;
        document.formcontact.nom.focus();
        return false;
    }

    if (document.formcontact.lemail.value == "") {
        alert("Vous devez renseigner votre email");
        document.formcontact.lemail.style.backgroundColor = errorColor;
        document.formcontact.lemail.focus();
        return false;
    }

    var x = formcontact.lemail.value;
    var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(x)) {
        alert("L'adresse email renseignée est invalide");
        formcontact.lemail.style.backgroundColor = errorColor;
        formcontact.lemail.focus();
        return false;
    }

    if (document.formcontact.telephone.value == "") {
        alert("Vous devez renseigner votre numéro de téléphone");
        document.formcontact.telephone.style.backgroundColor = errorColor;
        document.formcontact.telephone.focus();
        return false;
    }

    if (document.formcontact.ville.value == "") {
        alert("Vous devez renseigner votre ville");
        document.formcontact.ville.style.backgroundColor = errorColor;
        document.formcontact.ville.focus();
        return false;
    }

    if (document.formcontact.message.value == "") {
        alert("Merci de saisir votre demande");
        document.formcontact.message.style.backgroundColor = errorColor;
        document.formcontact.message.focus();
        return false;
    }

    return true;
}
-->
</script>