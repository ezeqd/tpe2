<?php
/**
 * Esta clase se encarga de configurar la librería PHPMailer para el uso de nuestra aplicación.
 * Esto tiene en cuenta nuestro caso de uso, en el cuál se envía un mail con un enlace único 
 * al usuario que solicito la recuperación de contraseña.
 */

require_once "./Helpers/PHPMailer/PHPMailer.php";
require_once "./Helpers/PHPMailer/SMTP.php";

class Mailer {
    private $mail; 
    
    public function __construct($receiver){
        $this->mail = new PHPMailer;
        // Server settings
        $this->mail->isSMTP()
            ->SMTPDebug = SMTP::DEBUG_SERVER
                       // SMTP::DEBUG_OFF = off (for production use)
            ->Host = 'smtp.gmail.com'
            ->SMTPAuth = true
            ->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
            ->Port = 587
            ->Username = '4dm1ntpeweb2@gmail.com'
            ->Password = 'securepass'
        // Recipients
            ->setFrom('4dm1ntpeweb2@gmail.com', 'Administrador tpeWeb2')
            ->addAddress($receiver);
        // Content
            ->Subject = 'Recuperar contraseña'
            ->Body = 
    }

    public function sendMail(){
        $this->mail->send();
        $error = null;
        if (!$this->$mail->send()) {
            $error = $this->mail->ErrorInfo;
        }
        return $error;
    }
}
?>