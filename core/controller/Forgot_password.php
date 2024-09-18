<?php
if (isset($_POST['reset-request'])) {
    $email = sanitize($_POST['email']);

    // Check if the email exists in the database
    $user = $pdo->select("SELECT * FROM user_blog WHERE email=?", [$email])->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Generate a shorter, alphanumeric token (e.g., 6 characters long)
        $token = substr(bin2hex(random_bytes(3)), 0, 6); // 6 characters long
        
        // Save the token and expiration time in the database
        $pdo->update('UPDATE user_blog SET reset_token=?, token_expires_at=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email=?', [$token, $email]);
        
        // Prepare email content
        $msg = '<p>Here is your password reset token:</p>';
        $msg .= '<p><strong>' . htmlspecialchars($token) . '</strong></p>';
        $msg .= '<p>Use this token on the password reset page to change your password.</p>';
        
        // Send the email
        try {
            $mail->setFrom('lilianlynda22@gmail.com', 'Lylisphere');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = $msg;
            $mail->send();
            echo 'Reset token sent to your email.';
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    }

    redirect('password-code', 'Code input successful!!!', 'success');
}
require 'view/guest/auth/view.forgot_password.php';
?>
