<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';


enviarEmail();

function enviarEmail(){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])){
        //mandar correo
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $archivo = $_FILES['adjunto'];/* guardo el archivo adjuntado */

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            /* $mail->SMTPDebug = 2; el debug */                                // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'maximopeoficiales@gmail.com';                 // SMTP username
            $mail->Password = 'comiendopalomas1';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('maximopeoficiales@gmail.com', 'Maximo Junior');/* quien lo va enviar */
            $mail->addAddress($email, $name);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reporte de tu Puerta';
            $mail->Body    = 'De: Maximo Junior Apaza Chirhuana <br/>Contactame: maximopeoficiales@gmail.com <br/><br/>' .'
            <h2>"Los mejores en Seguridad"</h2>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Arduino_Logo.svg/1200px-Arduino_Logo.svg.png" widht=80 height="80">
            <br/><br/>
            '.$comment;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->CharSet='UTF-8';/* para poder usar tildes ñ */
            $mail->send();
            echo '
            <script>
            alert("El Correo se envio correctamente");
            window.history.go(-1);
            </script>
            ';
            
        } catch (Exception $e) {
            echo '
            <script>
            alert("Hubo un error nose envio correctamente");
            window.history.go(-1);
            </script>
             ';

        }
        /* $mail->ErrorInfo para ver errores */

    }else{
        return;
    }
}
