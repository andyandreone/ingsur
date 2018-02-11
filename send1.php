<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@ingsur.com";
 
    $email_subject = "Consulta";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
          
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||

       // !isset($_POST['invitados']) ||

       // !isset($_POST['lugar']) ||

       // !isset($_POST['fecha']) ||
 
        !isset($_POST['comments'])) {
 
        died('Lo lamentamos, ocurrio un problema al enviar el formulario. Intente de nuevo mas tarde...');       
 
    }
 
     
 
    $name = $_POST['name']; // required
      
    $email = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // required

   // $invitados = $_POST['invitados']; // not required

   // $lugar = $_POST['lugar']; // not required

   // $fecha = $_POST['fecha']; // not required
 
    $comments = $_POST['comments']; // not required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'EL email ingresado no es valido.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'El nombre ingresado no es valido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
  
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";

  //  $email_message .= "Invitados: ".clean_string($invitados)."\n";

  //  $email_message .= "Lugar: ".clean_string($lugar)."\n";

   // $email_message .= "Fecha: ".clean_string($fecha)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Gracias por comunicarte con nosotros, pronto lo contactaremos!
 
 
 
<?php
 
}
 
?>
