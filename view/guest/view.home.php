<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LYLISPHERE Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
/* Base Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Loader */
#loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}
#loader img {
    width: 100px;
}

/* Navbar */
nav {
    background-color: #2c3e50;
    color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
nav a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
}
nav a:hover {
    text-decoration: underline;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(to right, #1abc9c, #16a085);
    color: white;
    text-align: center;
    padding: 50px 20px;
    position: relative;
}
.hero-section h1 {
    font-size: 3rem;
    margin: 0;
}
.hero-section p {
    font-size: 1.5rem;
    margin: 10px 0;
}
.slide-in {
    animation: slideIn 1s ease-out;
}
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Container */
.container {
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
}
.blog-section {
    flex: 3;
    margin-right: 20px;
}
.blog-section .content-grid {
    display: flex;
    flex-direction: column;
}
.cards {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
.cards img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.card-body {
    padding: 15px;
}
.card-body h4 {
    margin: 0;
    font-size: 1.2rem;
}
.card-body p {
    margin: 10px 0;
    text-align:justify;
}
.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 0.9rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}
.btn-outline-primary {
    background: transparent;
    border: 2px solid #3498db;
    color: #3498db;
}
.btn-outline-primary:hover {
    background: #3498db;
    color: white;
}
.btn-danger {
    background: #e74c3c;
    color: white;
}
.btn-danger:hover {
    background: #c0392b;
}

/* Sidebar */
aside {
    flex: 1;
    padding: 15px;
    background: #ecf0f1;
    border-radius: 8px;
}
.sidebar {
    margin-bottom: 20px;
}
.sidebar h4 {
    margin: 0;
    font-size: 1.2rem;
}
.sidebar ul {
    list-style: none;
    padding: 0;
}
.sidebar ul li {
    margin-bottom: 10px;
}
.sidebar ul li a {
    text-decoration: none;
    color: #3498db;
}
.sidebar ul li a:hover {
    text-decoration: underline;
}
.related-posts-section {
    margin-top: 20px;
}
.related-posts-title {
    font-size: 1.5rem;
    margin-bottom: 15px;
}
.related-posts {
    display: flex;
    flex-direction: column;
}
.related-post {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
    padding: 15px;
}
.related-post img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}
.related-post h5 {
    margin: 10px 0;
}
.related-post a {
    text-decoration: none;
    color: #3498db;
}
.related-post a:hover {
    text-decoration: underline;
}

/* Footer */
footer {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 20px;
  
}

.cont{
    display:flex;
    flex-direction:column;
}
footer a {
    color: #3498db;
    text-decoration: none;
}
footer a:hover {
    text-decoration: underline;
}

/* Slider */
.slider {
    position: relative;
    width: 100%;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.slider img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}
.slider .slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}
.slider .slide {
    min-width: 100%;
    box-sizing: border-box;
}
.slider-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}
.slider-nav button {
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    font-size: 2rem;
    cursor: pointer;
}
.slider-nav button:hover {
    background: rgba(0, 0, 0, 0.8);
}

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    .blog-section {
        margin-right: 0;
        margin-bottom: 20px;
    }
    aside {
        margin-top: 20px;
    }
    .hero-section h1 {
        font-size: 2.5rem;
    }
    .hero-section p {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .hero-section h1 {
        font-size: 1.8rem;
    }
    .hero-section p {
        font-size: 1rem;
    }
    .btn {
        padding: 8px 16px;
        font-size: 0.8rem;
    }
    .related-posts-title {
        font-size: 1.2rem;
    }
    .slider img {
        height: 200px;
    }
}


    #loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    #loader.hidden {
        opacity: 0;
        visibility: hidden;
    }

    #loader img {
        width: 80px;
        height: 80px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .slide-in {
        animation: slideIn 1s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .advertisement {
        background-color: #e0f2f1;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr;
            padding: 0 20px;
        }

        .related-posts {
            grid-template-columns: 1fr;
        }

        .hero-section h1 {
            font-size: 36px;
        }

        .hero-section p {
            font-size: 18px;
        }
    }

    @media (max-width: 576px) {
        .navbar-nav .nav-link {
            margin-right: 10px;
        }

        .cards img {
            height: 150px;
        }

        .card-body {
            padding: 15px;
        }

        .related-post img {
            height: 120px;
        }

        footer {
            padding: 20px 0;
        }
    }
</style>

</head>
<body>

<!-- Loader -->
<div id="loader">
    <img src="public/img/home-img-2.png" alt="Loading...">
</div>

<!-- Navbar -->
<?php require APP_ROOT . '/view/partials/nav.php'?>

<!-- Hero Section -->
<div class="hero-section">
    <h1 class="slide-in">Welcome to LYLISPHERE</h1>
    <p class="slide-in">Explore beautiful stories, tips, and guides on our blog</p>
</div>

<!-- Container for Blog and Sidebar -->
<div class="container">
    <!-- Blog Section -->
    <div class="blog-section">
        <div class="content-grid">
            <?php foreach ($posts as $post): ?>
                <div class="cards">
                    <img src="<?=$post['img']?>" alt="Post Image" />
                    <div class="card-body">
                        <h4><?=htmlspecialchars($post['title'])?></h4>
                        <p><?= htmlspecialchars(substr($post['body'], 0, 200) . (strlen($post['body']) > 200 ? '...' : '')) ?></p>

                        <p>Author: <?=htmlspecialchars($post['username'])?></p>
                        <a href="blog-details?title=<?=str_replace(' ', ' ',$post['title'])?>" class="btn btn-primary mb-3">Read more</a>

                        <!-- Like Section -->
                        <form method="POST" action="">
                            <input type="hidden" name="post_id" value="<?=$post['id']?>">
                            <button type="submit" name="like_post" class="btn <?=($post['user_liked']) ? 'btn-danger' : 'btn-outline-primary'?>">
                                <?=($post['user_liked']) ? 'Unlike' : 'Like'?> 
                            </button>
                        </form>

                        <!-- Comments Section -->
                        <h5>Comments (<?=count($post['comments'])?>)</h5>
                        <span>Likes (<?=$post['like_count']?>)</span>
                        <?php if (!empty($post['comments'])): ?>
                            <ul>
                                <?php foreach ($post['comments'] as $comment): ?>
                                    <li>
                                        <strong><?=htmlspecialchars($comment['username'])?>:</strong>
                                        <p><?=htmlspecialchars($comment['comment'])?></p>
                                        <small><?= htmlspecialchars(date('F j, Y', strtotime($comment['created_at']))) ?></small>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No comments yet.</p>
                        <?php endif; ?>

                        <!-- Comment Form / Login Prompt -->
                        <?php if ($isLoggedIn): ?>
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Add a Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                <button type="submit" name="add_comment" class="btn btn-primary">Submit Comment</button>
                            </form>
                        <?php else: ?>
                            <p>Please <a href="login.php">login</a> to add a comment.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Sidebar Column -->
    <aside>
        <div class="sidebar">
            <div class="advertisement">
                <h4>Advertisement</h4>
                <p>Place your ad here!</p>
                <img src="https://via.placeholder.com/300x250" alt="Advertisement">
            </div>

            <div class="sidebar">
                <h4>Categories</h4>
                <ul>
                    <?php foreach($cat as $c):?>
                        <li><a href=""><?=$c?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="sidebar">
                <h4>Latest Posts</h4>
                <ul>
                    <li><a href="#">Post Title 1</a></li>
                    <li><a href="#">Post Title 2</a></li>
                    <li><a href="#">Post Title 3</a></li>
                    <li><a href="#">Post Title 4</a></li>
                </ul>
            </div>
        </div>

        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
        <div class="related-posts-section">
            <h2 class="related-posts-title">Related Posts</h2>
            <div class="related-posts">
                <div class="related-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
                    <h5>Exploring Tech Innovations</h5>
                    <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
                </div>
            </div>
        </div>
     
       
        
    </aside>
</div>

<!-- Footer -->
<footer>
    <div class="container cont">
        <p>&copy; 2024 LYLISPHERE Blog. All rights reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </p>
    </div>
</footer>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('hidden');
        }, 1000);
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
