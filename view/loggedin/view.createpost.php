<?php require_once APP_ROOT . '/view/partials/header.php' ?>
</head>

<body>
    <?php require_once APP_ROOT . '/view/partials/admin_sidebar.php'?>

         <div class="container">
            <div>
               <form action="" method="post" class="card p-3 col-md-6 offset-md-3" enctype="multipart/form-data">
               <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
                <?php endif; ?>
        
                  <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text"
                      class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                  </div>

                  <div class="form-group mb-3">
                    <!-- <label for=""></label> -->
                    <textarea class="form-control" id="editor" rows="3" name="body" placeholder="Enter text here"></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label class="custom-file">
                      <input type="file" name="upload" id="" placeholder="" class="custom-file-input" aria-describedby="fileHelpId">
                      <span class="custom-file-control"></span>
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">Help text</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select class="form-control" name="category" id="">
                      <?php foreach($file as $cat):?>
                      <option value="<?=$cat?>"><?=$cat?></option>
                      <?php endforeach; ?>
                      
                    </select>
                  </div>

                 

               
            <?php if ($isAdmin): ?>
                <div class="form-group mb-3">
                    <input type="checkbox" name="publish" style="width:fit-content; display:inline-block;">
                    <span>Publish this post</span>
                </div>
            <?php endif; ?>

                  <input type="hidden" name="create-post">

                  <button type="submit" class="btn btn-primary">Create Post</button>
               </form>
                
            </div>
         </div>
    </div>

 
    <?php require_once APP_ROOT . '/view/partials/footer.php' ?>