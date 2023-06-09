<?php

if
($_SERVER['REQUEST_METHOD']==='POST') {
    //Get form data
    $name=trim($_POST['Full Name']);
    $name=trim($_POST['E-Mail Address']);
    $message=trim($_POST['Message']);

    //Validate form data
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email) || ! 
    filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }

    if (empty($message)) {
        $errors[] = 'Message is required';
    }

    //if no errors, send email
    if (empty($errors)) {
        $to = 'madeccco@gmail.com';
        $subject = 'New message from 
        your website contact form';
        $body = "Name:
        $name/n/nEmail:
        $email/n/nMessage:
        /n$message";

        $headers = [
            'From:'.$name.'<'.
        $email.'>',
            'Reply-To:'.$name.'<'.
        $email.'>',
            'X-Mailer:PHP/'.pnpversion(),
        ];

        if (mail($to, $subject, $body, 
        implode("/r/"n, $headers))) {
            echo 'Message sent successfully!';
        } else {
            echo 'Sorry there was an error 
            sending your message.
             Please try again later.';
        }
    } else {
        //Display error messages
        echo'<ul>';
        foreach($errors as $errors) {
            echo'<li>'.$error.'/li>';
        }
        echo'</ul>'
    }
}