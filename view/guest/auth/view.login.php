<?php require_once APP_ROOT . '/view/partials/header.php'?>

  </head>
  <body>
    <div class="container-fluid">

  <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <div><a name="" id="" class="btn btn-primary" href="home" role="button">Back To Home</a></div>

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
                <?php endif;?>


               

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                 

                

                  <input type="hidden" name="login">

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                  </div>

                  <div class="mx-4 mb-3 mb-lg-4">
                    <button type="button" class="btn btn-dark btn-md">don't have an account?<a href="auth-register">Register here</a></button>
                  </div>
                  <a href="forgot-password">reset password</a>



                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>

<?php require_once APP_ROOT . '/view/partials/footer.php'?>
