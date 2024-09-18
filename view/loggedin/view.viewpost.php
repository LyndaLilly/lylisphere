<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>

<?php require_once APP_ROOT . '/view/partials/admin_sidebar.php'?>

<div class="container">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?> mt-5" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
    
    <div>
        <table class="table table-striped mt-5 w-50 mx-auto p-3">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th class="col" colspan="3" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($posts as $post): ?>
                <tr data-id="<?=$post->id?>">
                    <td><?=$post->id?></td>
                    <td><?=$post->title?></td>
                    <td><?=$post->category?></td>
                    <td><?php echo htmlspecialchars((new DateTime($post->date_created))->format('F j, Y')); ?></td>
                    <td><?=$post->author?> </td>
                    <td><a href="home"><button class="btn btn-sm btn-primary">View</button></a></td>
                    <td><a href="edit-post?ed_post=<?=$post->id?>"><button class="btn btn-sm btn-success">Edit</button></a></td>
                    <td><a href="create-post?del_post=<?=$post->id?>"><button class="btn btn-sm btn-danger">Delete</button></a></td>

                    <?php if ($post->publish == 1): ?>
                        <td><a href="?unpublish_post=<?=$post->id?>" class="btn btn-warning" onclick="return confirm('Are you sure you want to unpublish this post?')">Unpublish</a></td>
                    <?php else: ?>
                        <td><a href="?publish_post=<?=$post->id?>" class="btn btn-success" onclick="return confirm('Are you sure you want to publish this post?')">Publish</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
