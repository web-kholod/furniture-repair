<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp@gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'epizodik';                     //SMTP username
	$mail->Password   = 'gftr1548SW14Hgk595EEre45';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	

	//От кого письмо
	$mail->setFrom('epizodik.com@gmail.com', 'Перетяжка и ремонт мебели'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('mobicoint@gmail.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Перетяжка и ремонт мебели';

	//Тело письма
	$body = '<h1>Название письма!</h1>';

	//if(trim(!empty($_POST['email']))){
		//$body.=$_POST['email'];
	//}	
	
	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка3';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
