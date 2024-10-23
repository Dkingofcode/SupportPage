<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // $transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
        // $transport->setUsername('doladepo128@gmail.com');
        // $transport->setPassword('iunbiyuwvthjofvy');

        // $mailer = new Swift_Mailer($transport);

        // $message = (new Swift_Message('Test Email'))
        //     ->setFrom(['technitedevs@gmail.com' => 'Exam Admin'])
        //     ->setTo([$to => $firstname])
        //     ->setBody($message);



        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'doladepo128@gmail.com'; // Your Gmail address
        $mail->Password = 'iunbiyuwvthjofvy'; // Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('Gleeworldp@gmail.com'); // Your Gmail address
        //$mail->addReplyTo($email, $name); 


        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "<h4>Name: $name</h4><h4>Email: $email</h4><p>Message:<br>$message</p>";
        //$mail->AltBody = "Name: $name\nEmail: $email\n\nMessage:\n$message"; // Plain text version
        $mail->Body = $message;
  
        // Send email
        $mail->send();
        //$mail->SMTPDebug = 2;
      echo "<script>alert('Email has been sent successfully!');</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <!-- Contact Form -->
    <div class="contact">
            <h2>Contact Us</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Enter your name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Type your first name here">
                </div>
                <div class="form-group">
                    <label for="email">Enter your email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Type your email address here">
                </div>
                <div class="form-group">
                    <label for="message">Drop a message</label>
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Write your message here"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send message now</button>
            </form>

            <div id="thankyouMessage"></div>
        </div>
    
        <footer >
            
            <div class='NewsLetter'>
               <h1>Subscribe to our newsletter</h1>

               <p>Subscribe to our newsletter and join a community of health-concious individuals on a journey towards better well-being.</p>
               
               <div class='subscribe'>
                   <input type='text' name='email' placeholder='Email'  />
                   <button>Submit</button>
                </div>
            </div>
             
            
            
        </body>
        </html>
            
            
            
            
