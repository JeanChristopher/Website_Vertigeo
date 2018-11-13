<?php

	session_start();
	$return = array();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$request = $_POST;
		$name = htmlspecialchars($request['name']);
		$email = htmlspecialchars($request['email']);
		$message = htmlspecialchars($request['message']);
		$human = intval(htmlspecialchars($request['human']));

		$to = 'vertigeo@ensg.eu';
		$subject = '[Vertigeo] Contact site internet';




		$adresseMail = 'detection_passage_ligne@mail.fr'; // Déclaration de l'adresse de destination.
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $adresseMail)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}


		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========

		//=====Création du header de l'e-mail.
		$headers = "From: \"Vertigeo Website\"<no-reply-vertigeo@ensg.eu>".$passage_ligne;
		$headers.= "Reply-to: \"".ucwords(strtolower($name))."\" <".$email.">".$passage_ligne;
		$headers.= "MIME-Version: 1.0".$passage_ligne;
		$headers.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========

		//=====Création du message.
		$body = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$body.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
		$body.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$body.= $passage_ligne."Message de ".$name.$passage_ligne;
		$body.= $passage_ligne."Envoyé depuis le formulaire de contact du site de Vertigeo ".$passage_ligne;
		$body.= $passage_ligne."Adresse mail de l'auteur :".$email.$passage_ligne;
		$body.= $passage_ligne."Texte du message :".$passage_ligne;
		$body.= $passage_ligne."===========".$passage_ligne;
		$body.= $passage_ligne.$message.$passage_ligne;
		$body.= $passage_ligne."===========".$passage_ligne;
		$body.= $passage_ligne."Envoyé le ".date("d/m/Y - H:i").$passage_ligne;
		//==========
		$body.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$body.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
		$body.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$body.= $passage_ligne."Message de : ".$name."<br /><br />".$passage_ligne;
		$body.= $passage_ligne."Adresse mail de l'auteur : ".$email."<br />".$passage_ligne;
		$body.= $passage_ligne."<br />Texte du message :<br />".$passage_ligne;
		$body.= $passage_ligne."===========<br /><br />".$passage_ligne;
		$body.= $passage_ligne.nl2br($message).$passage_ligne;
		$body.= $passage_ligne."<br /><br />===========<br />".$passage_ligne;
		$body.= $passage_ligne."Envoyé le ".date("d/m/Y - H:i")."<br />".$passage_ligne;
		$body.= $passage_ligne."Depuis le formulaire de contact du site de Vertigeo <br />".$passage_ligne;
		//==========
		$body.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$body.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========




		$errName = null;
		$errEmail = null;
		$errMessage = null;
		$errHuman = null;

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Merci d\'indiquer votre nom';
		}


		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Merci d\'utiliser une adresse mail valide';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Merci d\'insérer un message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Protection anti-spam ';
		}



		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
			$mailSend = mail ($to, $subject, $body, $headers);
			if ($mailSend) {
				$mailSuccess=true;
				// '<div class="alert alert-success">Thank You! I will be in touch</div>'
			} else {
				$mailSuccess=false;
				// '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
			}
		}

		$return["errName"] = $errName;
		$return["errEmail"] = $errEmail;
		$return["errMessage"] = $errMessage;
		$return["errHuman"] = $errHuman;
		$return["mailSuccess"] = $mailSuccess;
		$return["tokenized"] = $_SESSION["token"];


	}
	// echo json_encode($_POST);
	echo json_encode($return);

?>
  <?php
// //Execution des calculs selon la requete envoyée
// if (isset($_POST["requete"]))
// {
// 	if ($_POST["requete"]=="calculMontant")
// 	{
//         $array = json_decode($_POST["compteur"],true); //true pour decoder un tableau associatif
// 		$montant=calculeMontant($array);
//
//         //Retour (encodage des donnees)
// 		echo json_encode($montant);
// 	}
// }


?>
