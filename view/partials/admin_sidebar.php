<?php
// Fetch user data from session
$currentUser = Session::get('userData');

// Function to check if user is admin
function isAdmin($user) {
    return isset($user->access) && $user->access === 'admin';
}
?>

<nav class="navbar navbar-dark bg-dark navbar-dark bg-dark">
  <div class="container-fluid">
    <?php if(isAdmin($currentUser)) : ?>
    <a class="navbar-brand" href="dashboard">Admin Panel</a>

    <?php else : ?>
      <a class="navbar-brand" href="profile">User Panel</a>
    <?php endif ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Welcome <?= htmlspecialchars($currentUser->username) ?></h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body bg-primary">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <?php if (isAdmin($currentUser)) : ?>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home">Home</a>
            </li>


            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="create-post">Create-post</a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="view-post">View-Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Profile</a>
            </li>


            <?php else: ?>
      

          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="create-post">Create-post</a>
            </li>


          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="users-post">View-Users-Post</a>
          </li>

        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

          <?php endif; ?>

          <form action="" method="post">
            <input type="hidden" name="logout">
            <button type="submit" class="list-group-item list-group-item-action">Logout</button>
          </form>

        </ul>

      

        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
