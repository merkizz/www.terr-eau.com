<?php
if (isset($_POST['sendEmail'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipCode'];
    $message = $_POST['message'];

    $headers = 'From: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $to      = 'thomas.piseth.lay@gmail.com';
    $subject = 'Demande de devis';
    $body = 'Nom : ' . $name . "\r\n" .
        'Email : ' . $email . "\r\n" .
        'Téléphone : ' . $phoneNumber . "\r\n" .
        'Adresse : ' . $street . ' ' . $zipCode . ' ' . $city . "\r\n\r\n" .
        'Message : ' . $message . "\r\n";

    mail($to, $subject, $body, $headers);
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
                        <form action="/v2/devis" method="post">
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