<?php require_once 'link.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="home">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>

                <li class="nav-item">
                    <?php if (!empty(Session::get('loggedin'))): ?>
                        <a class="nav-link" href="create-post">Create-post</a>
                        <?php else: ?>
        <a class="nav-link" href="auth-login">Create Post</a>
            <?php endif; ?>
                    </li>
             

                <?php if (!empty(Session::get('loggedin'))): ?>
                    <!-- Show Logout button when logged in -->
                    <li class="nav-item">
                        <form action="" method="post">
                            <input type="hidden" name="logout">
                            <button type="submit" class="list-group-item list-group-item-action">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <?php
                        // Fetch current user's data
                        $currentUser = toJson($pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));
                        // Determine if the user is an admin
                        $dashboardUrl = ($currentUser->access == 'admin') ? 'dashboard' : 'profile';
                        ?>
                        <a class="nav-link" href="<?= $dashboardUrl ?>">Dashboard</a>
                    </li>
                <?php else: ?>
                    <!-- Show Register and Login links when not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="auth-register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth-login">Login</a>
                    </li>

      
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
