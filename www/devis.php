<?php include 'widget/includes.php'; ?>

<?php
if (isset($_POST['sendEmail'])) {
    if ($_SERVER['HTTP_REFERER'] != $contextRoot.'/devis') {
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

    $to         = "jardinier@terr-eau.com";
    $subject    = "Sarl Terr'eau - Demande de devis";
    $body       =
    "
    <!DOCTYPE html>
    <html lang=\"fr-FR\">
    <head>
        <title>Sarl Terr'eau - Demande de devis</title>
    </head>
    <body bgcolor=\"#efefef\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">
        <table width=\"700\" bgcolor=\"#ffffff\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\" style=\"margin-top: 30px; padding: 20px\">
            <tr>
                <td colspan=\"2\">
                    <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                        <td width=\"110\">
                            <img src=\"".$staticRoot."/img/logo-200x200.jpg\" width=\"110\" height=\"110\" alt=\"Sarl Terr'eau\">
                        </td>
                        <td width=\"590\" valign=\"middle\" style=\"text-align: center;\">
                            <font face=\"Arial, Verdana, Helvetica\" style=\"color: #4a9c16; font-size: 26px;\"><strong>DEMANDE DE DEVIS</strong></font>
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
    <script>alert("Votre demande de devis a été envoyée à Sarl Terr'eau");</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Demande de devis gratuit | Sarl Terr\'eau';
    $pageDescription = 'Afin de vous accompagner dans vos projets, nous réalisons des devis gratuits personnalisés et précis. Nos jardiniers paysagistes sont à votre écoute pour vous conseiller et vous servir. Complétez le formulaire de demande et nous vous répondrons dans les meilleurs délais.';
    include 'widget/head.php';
    ?>
</head>
<body>
    <?php
    $current = 'devis';
    include 'widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <?php include 'widget/banner.php'; ?>

            <header class="section-header">
                <h1 class="title">Demande de devis</h1>
            </header>

            <p class="text">
                Pour toute demande de devis, merci de compléter le formulaire ci-dessous. Nous vous répondrons dans les meilleurs délais.
            </p>
            <section class="form-section">
                <form action="<?=$contextRoot?>/devis" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name">Nom *</label>
                            <input id="name" name="name" class="form-control" placeholder="Nom" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" pattern="^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9.-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="phoneNumber">Numéro de téléphone *</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Numéro de téléphone" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="street">Adresse</label>
                            <input id="street" name="street" class="form-control" placeholder="Adresse"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-7">
                            <label for="street">Ville *</label>
                            <input id="city" name="city" class="form-control" placeholder="Ville" required/>
                        </div>
                        <div class="col-sm-5">
                            <label for="street">Code postal</label>
                            <input id="zipCode" name="zipCode" class="form-control" placeholder="Code postal"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="message">Votre demande</label>
                            <textarea id="message" name="message" class="form-control" rows="10" placeholder="Veuillez saisir votre demande" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <span class="mention">* Champ obligatoire</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="hidden" name="sendEmail" value="" />
                            <button type="submit" class="btn btn-primary center-block btn-submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </section>

            <?php include 'widget/pave.php'; ?>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>