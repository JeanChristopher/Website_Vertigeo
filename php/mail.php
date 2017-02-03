<?php

	session_start();
	$return = array();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$request = $_POST;
		$name = $request['name'];
		$email = $request['email'];
		$message = $request['message'];
		$human = intval($request['human']);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From: Vertigéo <vertigeo@ensg.eu>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$to = 'loic.messal@ensg.eu';
		$subject = '[Vertigeo] Contact site internet';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

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
