<?php


if (isset($_POST['register'])) {

    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $confirm = sanitize($_POST['confirm']);



    $userData = [
        'username' => $username, 
        'email' => $email, 
        'password' => $password, 
        'confirm' => $confirm
    ];

    $msg = isEmpty($userData);

    if ($msg != 1) {
        redirect('auth-register', $msg);
    }

    if ($userData['password'] != $userData['confirm']) {

        redirect('auth-register', "Password does not match.");

    }

    //write an sql stmt, select every user in the system, den check if any of dem match the username password

    $res = $pdo->select("SELECT * FROM user_blog WHERE username=? or email=?", [$userData['username'], $userData['email']])->fetchAll(PDO::FETCH_BOTH);

    if (!empty($res)) {
        redirect('auth-register', "User already exists");
    }

    $hashedPass = password_hash($userData['password'], PASSWORD_DEFAULT);

    $pdo->insert('INSERT INTO user_blog(username,email,password) VALUES(?,?,?)', [$userData['username'], $userData['email'], $hashedPass]);

    if($pdo->status){
        $msg = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Document</title>
        </head><body>
        <p>Hi ' . htmlspecialchars($username) . ',</p>
        <p>Welcome to our platform! We are excited to have you on board.</p>
        <p>Thank you for registering with us. We hope you have a great experience.</p>
            
        </body>
        </html>';
    
        try{
    
        $mail->setFrom('lilianlynda22@gmail.com', 'Lylisphere');
        $mail->addAddress($userData['email']);;     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('lilianlynda22@gmail.com',);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'welcome';
        $mail->Body = $msg;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    redirect('auth-login', 'Registration successful!!!','success');
    
    exit;
    }
    }





require_once 'view/guest/auth/view.register.php';
