<?php
if (isset($_POST['reset-password'])) {
    // Check if both fields are present
    if (isset($_POST['password']) && isset($_POST['confirm']) && isset($_POST['token'])) {
        $password = sanitize($_POST['password']);
        $confirmPassword = sanitize($_POST['confirm']);
        $token = sanitize($_POST['token']);

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
            exit;
        }

        // Fetch the email based on the provided token
        $user = $pdo->select("SELECT email FROM user_blog WHERE reset_token=? AND token_expires_at > NOW()", [$token])->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $email = $user['email'];

            // Hash the new password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $users = $pdo->update("UPDATE user_blog SET password=?, reset_token=NULL, token_expires_at=NULL WHERE email=?", [$hashedPassword, $email]);

            // Redirect or show a success message
            
        } 
        redirect('auth-login', 'Password has been reset successfully. You can now log in.', 'success');
    }
}

require 'view/guest/auth/view.password_reset.php';
?>
