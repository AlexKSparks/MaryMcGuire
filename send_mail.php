<?php
$name = $_POST['name'];
$visitor_email = $_POST['email_address'];
$message = $_POST['comments'];

$email_from = 'alex.sparks90@yahoo.com';
$email_subject = "New Form Submission";
$email_body = "You have recieved an new message from $name\n. Here is the message: \n $message";

$to = "alex.sparks90@yahoo.com";
$headers = "From: $email_from \r\n";
$headers = "Reply-To: $visitor_email \r\n";
mail ($to,$email_subject,$email_body,$headers);

function IsInjected($str)
{
    $injections = array ('(\n+)',
                        '(\r+)',
                        '(\t+)',
                        '(%0A+)',
                        '(%0D+)',
                        '(%08+)',
                        '(%09+)');
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if (preg_match($inject, $str))
    {
        return true;
    }
    else
        {
         return false;   
        }
    }
if (IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

?>