<?php
// reset_code_form.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-code'])) {
    $resetCode = sanitize($_POST['reset-code']);
    
    // Check if the reset code is valid and has not expired
    $user = $pdo->select("SELECT * FROM user_blog WHERE reset_token=? AND token_expires_at > NOW()", [$resetCode])->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Redirect to password reset page
        redirect('reset-password', 'valid code!!!','success');
        exit;
    } 

   
}

require 'view/guest/auth/view.passcode.php';
