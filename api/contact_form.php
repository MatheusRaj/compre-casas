<?php
    $mail_to = "valdomiroaparecidolopes@gmail.com";

    $subject = "Mais um cliente do site. Assunto: " . $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    
    $content = "Nome do cliente: $name\n";
    $content .= "Email: $email\n\n";
    $content .= "Telefone: $phone\n";
    $content .= "Mensagem:\n$message\n";

    $headers = "From: " . $name . "<". $email .">\r\n";

    $success = mail($mail_to, $subject, $content, $headers);
    if ($success) {
        http_response_code(200);
        echo "Seu email foi enviado com sucesso. Logo nossos corretores entrarão em contato com você!";
    } else {
        http_response_code(500);
        echo "Oops... algo deu errado. Tente novamente mais tarde.";
    }
