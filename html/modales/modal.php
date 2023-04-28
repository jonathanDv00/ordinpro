<div class="modal fade" id="cancelarCita" tabindex="-1" role="dialog" aria-labelledby="citaCancelar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="citaCancelar"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarAprX">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="">
        <input type="text" name="idcita" id="idcita" value="" style="display:none">
        <label><b>Correo:</b></label>
        <br>
        <input type="text" name="correo" id="correo" value="">
        <br>
        <br>
        <label><b>Motivo de cancelacion:</b></label>
        <br>
        <textarea name="motivo" id="motivo"></textarea>
        <br>
        <button type="submit" class="btn btn-primary" onclick="alertcita()">Cancelar cita</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCerrarApr" >Cerrar</button>  
      </form>
      </div>
      <div class="modal-footer">
      
            
      </div>
    </div>
  </div>
</div>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    








    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cfsanchez1107@gmail.com';                     // SMTP username
    $mail->Password   = 'cristianpollo';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cfsanchez1107@gmail.com', 'Mailer');
    $mail->addAddress("$_POST[correo]");     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('rentacar.txt');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Cancelar cita";
    $mail->Body    = "$_POST[motivo]";
    $mail->AltBody = 'kjshksdjadsa';

    $mail->send();
    echo 'Mensaje enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>