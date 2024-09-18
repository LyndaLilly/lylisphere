<?php require_once APP_ROOT . '/view/partials/header.php' ?>
</head>

<body>
    <?php require_once APP_ROOT . '/view/partials/admin_sidebar.php'?>

         <div class="container mt-5" style="margin-top:200px">
            <div>
               <form action="" method="post" class="card p-3 col-md-6 offset-md-3" enctype="multipart/form-data">
               <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
                <?php endif; ?>
        
                <?php if(isset($post)) : ?>
                  <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text"
                      class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" value="<?php echo $post['title']?>">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                  </div>

              <div class="form-group mb-3">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" rows="8"><?php echo htmlspecialchars($post['body']); ?></textarea>
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

                  <input type="hidden" name="edit-post">

                  <button type="submit" class="btn btn-primary">Edit Post</button>
               </form>
  
<?php endif; ?>
            </div>
         </div>
    </div>

 
    <?php require_once APP_ROOT . '/view/partials/footer.php' ?>