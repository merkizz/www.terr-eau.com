<?php
if (isset($_POST['sendEmail'])) {
    if ($_SERVER['HTTP_REFERER'] != 'http://www.terr-eau.com/v2/devis.php') {
        exit("Opération non autorisée");
    }

    $name           = trim($_POST['name']);
    $email          = trim($_POST['email']);
    $phoneNumber    = trim($_POST['phoneNumber']);
    $street         = trim($_POST['street']);
    $city           = trim($_POST['city']);
    $zipCode        = trim($_POST['zipCode']);
    $message        = nl2br($_POST['message']);

    $headers  = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n" .
        'From: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $to         = "thomas.piseth.lay@gmail.com";
    $subject    = "Terr'Eau - Demande de devis";
    $body       =
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
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$name."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Email :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$email."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">T&eacute;l&eacute;phone :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$phoneNumber."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Adresse :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$street."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Ville :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$city."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Code postal :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$zipCode."</strong></font></td>
            </tr>
            <tr>
                <td width=\"150\" valign=\"top\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\">Message :</font></td>
                <td width=\"550\"><font face=\"Arial, Verdana, Helvetica\" style=\"color: #1f1f1f; font-size: 14px;\"><strong>".$message."</strong></font></td>
            </tr>
        </table>
    </body>
    </html>
    ";

    mail($to, $subject, $body, $headers);
?>
    <script>alert("Votre demande de devis a été envoyée à Terr'Eau");</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Demande de devis - Terre'Eau</title>
    <meta name="description" content="">
    <meta name="keywords" content="jardiniers paysagistes seine saint denis,entretien de jardins seine saint denis,création de jardin seine saint denis">

    <?php include 'widget/includes.php'; ?>
</head>
<body>
    <?php
    $current = 'devis';
    include 'widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <h1>Demande de devis</h1>
                    <p class="text">
                        Pour toute demande de devis, veuillez compléter le formulaire ci-dessous. Nous vous répondrons dans les meilleurs délais.
                    </p>

                    <section class="contact-section">
                        <form id="form-contact" name="form-contact" action="/v2/devis" method="post" onSubmit="return checkForm();">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input id="name" name="name" class="form-control" placeholder="Votre nom"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Votre email"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Votre numéro de téléphone"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input id="street" name="street" class="form-control" placeholder="Votre adresse"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input id="city" name="city" class="form-control" placeholder="Ville"/>
                                </div>
                                <div class="col-sm-3">
                                    <input id="zipCode" name="zipCode" class="form-control" placeholder="Code postal"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea id="message" name="message" class="form-control" rows="10" placeholder="Votre demande"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary center-block btn-submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="/v2/static/js/script.min.js" type="text/javascript"></script>
</body>
</html>