<?php

require __DIR__ . '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['entrer'])) {
        // RECUPERATION DES INPUTS
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $message = htmlspecialchars($_POST['message']);

        // var_dump($_POST);

        // Vérification des champs vides
        if (!empty($nom) && !empty($email) && !empty($telephone) && !empty($message)) {

            $mail = new PHPMailer(true);

            try {
                // Paramètres du serveur
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Utilisez le serveur SMTP de votre fournisseur
                $mail->SMTPAuth = true;
                $mail->Username = 'mory.fabrice@gmail.com'; // Votre adresse email
                $mail->Password = 'hhhw ecaw dwxd xtsw'; // Votre mot de passe email
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Désactiver la vérification SSL pour les tests
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Destinataires
                $mail->setFrom($email, $nom);
                $mail->addAddress('mory.fabrice@gmail.com'); // L'adresse de réception

                // Contenu de l'email
                $mail->isHTML(true);
                $mail->Subject = 'Nouveau message de votre formulaire de contact';
                $mail->Body = "<strong><u>Nom:</u></strong> $nom<br>
                                <strong><u>Email:</u></strong> $email<br>
                                <strong><u>Téléphone:</u></strong> $telephone<br><br>
                                <strong><u>Message:</u></strong><br>$message";

                $mail->send();

                $retour =  true;
            } catch (Exception $e) {
                $retour =  "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
            }
        } else {
            $retour = "Veuillez remplir tous les champs.";
        }
    }

    header("Location: ../index.php?action=contact&retour=1");
}
