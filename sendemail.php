<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("pjgawand@gmail.com", "Pratik Gawand");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>