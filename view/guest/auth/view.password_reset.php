<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .reset-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="reset-container">
    <h2>Reset Your Password</h2>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="token"> <!-- Token should be passed from the URL or form -->
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm New Password:</label>
            <input type="password" name="confirm" id="confirm-password">
        </div>
        <button type="submit" name="reset-password">Reset Password</button>
    </form>
</div>
</body>
</html>
