<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "sayhi@ourbigdayinsf.com";
     
    $email_subject = "RSVP";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
   // validation expected data exists
    if(!isset($_POST['your_name']) ||
        !isset($_POST['Are_you_coming']) ||
        !isset($_POST['people']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');            
    }
     
    $your_name = $_POST['your_name']; // required
    $Are_you_coming = $_POST['Are_you_coming']; // required
    $people = $_POST['people']; // required
 
     
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$your_name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($your_name)."\n";
    $email_message .= "Coming: ".clean_string($Are_you_coming)."\n";
    $email_message .= "How many?: ".clean_string($people)."\n";
 
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
Thanks and get ready to party!
 
<?php
die();
?>
