<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LYLISPHERE Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f4f1; /* Very light green background */
    color: #333;
}

/* Header & Navbar */
.navbar {
    background-color: #004d40; /* Deep teal */
}

.navbar-brand {
    color: #ffffff !important;
    font-size: 24px;
    font-weight: bold;
}

.navbar-nav .nav-link {
    color: #ffffff !important;
    margin-right: 20px;
}

.navbar-nav .nav-link:hover {
    color: #a7ffeb !important; /* Light teal on hover */
}

/* Hero Section */
.hero-section {
    background-color: #00796b; /* Teal */
    padding: 80px 0;
    text-align: center;
    color: white;
}

.hero-section h1 {
    font-size: 48px;
    font-weight: bold;
}

.hero-section p {
    font-size: 20px;
    margin-top: 15px;
}

/* Blog Section */
.blog-section {
    padding: 50px 0;
    background-color: #ffffff; /* White for contrast */
}

.blog-title {
    text-align: center;
    margin-bottom: 40px;
    color: #004d40; /* Deep teal */
}

.divs {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Responsive grid */
    gap: 30px;
    padding: 0 50px;
}

.cards {
    background-color: #ffffff;
    border: 1px solid #004d40; /* Deep teal */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.cards:hover {
    transform: translateY(-5px); /* Hover effect */
}

.cards img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 20px;
}

.cards h4 {
    color: #004d40; /* Deep teal */
}

.cards p {
    font-size: 14px;
    text-align: justify;
    color: #333;
}

/* Sidebar: Categories & Latest Posts */
.sidebar {
    background-color: #a5d6a7; /* Light green */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.sidebar h4 {
    color: #004d40; /* Deep teal */
    font-weight: bold;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    color: #004d40; /* Deep teal */
    text-decoration: none;
}

.sidebar ul li a:hover {
    color: #00796b; /* Teal on hover */
}

/* Related Posts */
.related-posts-section {
    padding: 50px 0;
    background-color: #e0f2f1; /* Light green */
}

.related-posts-title {
    text-align: center;
    color: #004d40; /* Deep teal */
    margin-bottom: 30px;
}

.related-posts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
    gap: 20px;
}

.related-post {
    background-color: #ffffff;
    border: 1px solid #004d40; /* Deep teal */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s ease;
}

.related-post:hover {
    transform: translateY(-5px);
}

.related-post img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    margin-bottom: 10px;
}

.related-post h5 {
    color: #004d40; /* Deep teal */
    font-size: 16px;
}

/* Footer */
footer {
    background-color: #004d40; /* Deep teal */
    color: white;
    padding: 40px 0;
    text-align: center;
}

footer a {
    color: #a7ffeb; /* Light teal */
    margin: 0 10px;
}

footer a:hover {
    color: #ffffff; /* White on hover */
}

/* Loader Styles */
#loader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9); /* Slightly more opaque */
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

/* Keyframes for spinning effect */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .divs {
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
    <h1>Welcome to LYLISPHERE</h1>
    <p>Explore beautiful stories, tips, and guides on our blog</p>
</div>

<!-- Blog Section -->
<div class="container blog-section">
    <div class="row">
        <!-- Blog Posts Column -->
        <div class="col-md-8">
            <h2 class="blog-title">Latest Posts</h2>
            <div class="divs">
                <?php foreach ($posts as $post): ?>
                <div class="card cards">
                    <img src="<?=$post['img']?>" alt="Post Image" />
                    <div class="card-body">
                        <h4 class="card-title"><?=$post['title']?></h4>
                        <p class="card-text"><?=substr(html_entity_decode($post['body']),0,200) . '...'?></p>
                        <a href="blog-details?title=<?=str_replace(' ', '_',$post['title'])?>" class="btn btn-primary">Read more</a>

                        <!-- Like and Comment Section -->
                        <div class="like-comment-section mt-3">
                            <form method="POST">
                                <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                <?php if ($post['user_liked']): ?>
                                    <button type="submit" name="like_post" class="btn btn-outline-danger">Unlike</button>
                                <?php else: ?>
                                    <button type="submit" name="like_post" class="btn btn-outline-primary">Like</button>
                                <?php endif; ?>
                            </form>
                            <span class="ms-2"><?=$post['like_count']?> Likes</span>
                        </div>

                        <!-- Comments Section -->
                        <div class="mt-3">
                            <h5>Comments</h5>
                            <?php if (!empty($post['comments'])): ?>
                                <ul class="list-unstyled">
                                    <?php foreach ($post['comments'] as $comment): ?>
                                        <li>
                                            <strong><?=$comment['username']?>:</strong>
                                            <p><?=$comment['comment']?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No comments yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-md-4">
            <!-- Categories Section -->
            <div class="sidebar">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Tech</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Health</a></li>
                </ul>
            </div>

            <!-- Latest Posts Section -->
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
    </div>
</div>

<!-- Related Posts Section -->
<div class="related-posts-section">
    <h2 class="related-posts-title">Related Post</h2>
    <div class="container">
        <div class="related-post">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW56loU4cr3HNSp4tb2mOEJBgEKRwMeYUqJDsmkWsMvgGin1JY6LyZR4MyScVv1i3ASas&usqp=CAU" alt="Related Post Image" />
            <h5>Exploring Tech Innovations</h5>
            <a href="blog-details?title=Exploring_Tech_Innovations" class="btn btn-outline-primary">Read more</a>
        </div>
    </div>
</div>


<!-- Footer -->
<footer>
    <div class="container">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
