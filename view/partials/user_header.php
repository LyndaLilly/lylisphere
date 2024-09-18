<?php require_once 'link.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="create-post">Create Post</a>
                </li>

                <form action="" method="post">
            <input type="hidden" name="logout">
            <button type="submit" class="list-group-item list-group-item-action">Logout</button>
          </form>

                <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="users-post">View-Post</a>
          </li>
                
            </ul>
        </div>
    </div>
</nav>