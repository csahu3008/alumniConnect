<?php
echo"<form method='post' >";
echo"<div><label>Name</label>";
echo"<input type='text' value='$_REQUEST[name]' name='name' readonly ></div>";
echo"<div><label>Email</label>";
echo"<input type='email' name='email' value='$_REQUEST[email]' readonly></div>";
echo"<div><label>Subject</label>";
echo"<input type='text' name='subject' ></div>";
echo"<div><label>Message</label>";
echo"<textarea cols='30' name='message' rows='10' > </textarea ></div>";
echo"<input type='submit' value='Send Email'>";
echo"</form>";

if(isset($_REQUEST['message']))
{   session_start();
    $_SESSION['user']='gec@gec.com';

    require '../sendgrid-php/sendgrid-php.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("$_SESSION[user]", "College");
    $email->setSubject("$_REQUEST[subject]");
    $email->addTo("$_REQUEST[email]", "Receiver");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
        "text/html", "<strong>$_REQUEST[message] </strong>"
    );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
       
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
        }

}

?>