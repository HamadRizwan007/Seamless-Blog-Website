    <?php 


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email_from = $_POST['email'];
    if(isset($_POST['instructions']))
    {
        $temp = $_POST['instructions']; 
        $instructions = "Some instructions for you: $temp";

    }
    $email_subject = "New Article Submission";
    $email_body = "$fname"." $lname"." has requested to submit his article.\n 
    Email Address: $email_from.\n
    $instructions";

    $to = "cogavon863@dentaltz.com";
    $header = "From: $email_from \r\n";

    mail($to, $email_subject, $email_body, $header);
