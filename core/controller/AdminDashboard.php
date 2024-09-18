<?php

$title = 'Dashboard' . '|' . SITE_TITLE;

// Handle logout
if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

// Ensure the user is logged in
if (!empty(Session::get('loggedin'))) {
    // Get the current logged-in user's data
    $currentUser = $pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC);
    
    // Fetch dashboard data
    // Fetch total posts
    $totalPosts = $pdo->select("SELECT COUNT(*) as count FROM posts")->fetch(PDO::FETCH_ASSOC)['count'];

    // Fetch published posts
    $publishedPosts = $pdo->select("SELECT COUNT(*) as count FROM posts WHERE publish = 1")->fetch(PDO::FETCH_ASSOC)['count'];

    // Fetch unpublished posts
    $unpublishedPosts = $pdo->select("SELECT COUNT(*) as count FROM posts WHERE publish = 0")->fetch(PDO::FETCH_ASSOC)['count'];

    // Fetch total users
    $totalUsers = $pdo->select("SELECT COUNT(*) as count FROM user_blog")->fetch(PDO::FETCH_ASSOC)['count'];

    // Convert current user data to JSON for potential frontend use
    $currentUserJson = toJson($currentUser);

    // Fetch recent posts (last 5)
    $recentPosts = $pdo->select("
        SELECT posts.title, posts.date_created, user_blog.username 
        FROM posts 
        JOIN user_blog ON posts.author = user_blog.id 
        ORDER BY posts.date_created DESC 
        LIMIT 5
    ")->fetchAll(PDO::FETCH_ASSOC);

    // Fetch recent comments (last 5)
    $recentComments = $pdo->select("
        SELECT comments.comment, comments.created_at, user_blog.username 
        FROM comments 
        JOIN user_blog ON comments.user_id = user_blog.id 
        ORDER BY comments.created_at DESC 
        LIMIT 5
    ")->fetchAll(PDO::FETCH_ASSOC);

     // Fetch post statistics (group by month and year)
     $postStats = $pdo->select("
     SELECT 
         MONTH(date_created) AS month, 
         YEAR(date_created) AS year, 
         COUNT(id) AS post_count 
     FROM posts 
     GROUP BY YEAR(date_created), MONTH(date_created) 
     ORDER BY YEAR(date_created), MONTH(date_created)
 ")->fetchAll(PDO::FETCH_ASSOC);


// Fetch comment statistics (group by month and year)
$commentStats = $pdo->select("
    SELECT 
        MONTH(created_at) AS month, 
        YEAR(created_at) AS year, 
        COUNT(id) AS comment_count 
    FROM comments 
    GROUP BY YEAR(created_at), MONTH(created_at) 
    ORDER BY YEAR(created_at), MONTH(created_at)
")->fetchAll(PDO::FETCH_ASSOC);



// Fetch user statistics (group by month and year)
$userStats = $pdo->select("
    SELECT 
        MONTH(created_at) AS month, 
        YEAR(created_at) AS year, 
        COUNT(id) AS user_count 
    FROM user_blog 
    GROUP BY YEAR(created_at), MONTH(created_at) 
    ORDER BY YEAR(created_at), MONTH(created_at)
")->fetchAll(PDO::FETCH_ASSOC);




    // Include the view for the dashboard and pass the fetched data
    require_once 'view/loggedin/view.dashboard.php';
}
