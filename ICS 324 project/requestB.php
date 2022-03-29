<?php

$First_Name = $_GET['First_Name'];
$Book_Title = $_GET['Book_Title'];
$Last_Name = $_GET['Last_Name'];

$to = 'library2@libraries.com , library3@libraries.com';
   $subject = 'Book request';
   $message = 'I want to request the book '.$Book_Title.' from your library please reply if its available';
   $headers = 'From: '.$First_Name.'_'.$Last_Name.'@library1.com'       . "\r\n" .
                'Reply-To: '.$First_Name.'_'.$Last_Name.'@library1.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

   mail($to, $subject, $message, $headers);

   header('Location: successRequest.php');

 ?>
