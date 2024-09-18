<?php require_once APP_ROOT . '/view/partials/header.php' ?>

<style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        .dashboard-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .dashboard-card h3 {
            color: #343a40;
        }
        .dashboard-card .card-header {
            background: #007bff;
            color: #ffffff;
            font-size: 1.5rem;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .dashboard-card .card-body {
            padding: 20px;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .stats div {
            flex: 1;
            margin-right: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
        .stats div:last-child {
            margin-right: 0;
        }
        .stats div h4 {
            margin-bottom: 10px;
            color: #343a40;
        }
        .stats div p {
            font-size: 1.2rem;
            color: #007bff;
        }
    </style>
<?php require_once APP_ROOT . '/view/partials/admin_sidebar.php' ?>


    <title>Admin Dashboard</title>
   
    

    <!-- Main content area -->
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Statistics -->
            <div class="col-md-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3>Dashboard Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="stats">
                            <div>
                                <h4>Total Posts</h4>
                                <p><?=$totalPosts?></p>
                            </div>
                            <div>
                                <h4>Published Posts</h4>
                                <p><?=$publishedPosts?></p>
                            </div>
                            <div>
                                <h4>Unpublished Posts</h4>
                                <p><?= $unpublishedPosts?></p>
                            </div>
                            <div>
                                <h4>Users</h4>
                                <p><?=$totalUsers?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
<div class="col-md-12 mt-4">
    <div class="dashboard-card">
        <div class="card-header">
            <h3>Recent Activity</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <!-- Display recent posts -->
                <?php if (!empty($recentPosts)): ?>
                    <?php foreach ($recentPosts as $post): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            User <?php echo htmlspecialchars($post['username']); ?> created a new post: 
                            "<?php echo htmlspecialchars($post['title']); ?>"
                            <span class="badge bg-primary rounded-pill"><?php echo timeAgo($post['date_created']); ?></span>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Display recent comments -->
                <?php if (!empty($recentComments)): ?>
                    <?php foreach ($recentComments as $comment): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            User <?php echo htmlspecialchars($comment['username']); ?> commented: 
                            "<?php echo htmlspecialchars($comment['comment']); ?>"
                            <span class="badge bg-primary rounded-pill"><?php echo timeAgo($comment['created_at']); ?></span>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>


<!-- Activity Statistics Section -->
<div class="col-md-12 mt-4">
    <div class="dashboard-card">
        <div class="card-header">
            <h3>Activity Statistics</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Posts Statistics Chart -->
                <div class="col-md-4">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h4>Posts Created</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="postsStatsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Comments Statistics Chart -->
                <div class="col-md-4">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h4>Comments Created</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="commentsStatsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Users Statistics Chart -->
                <div class="col-md-4">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h4>Users Registered</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="usersStatsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the charts
    const postStats = <?php echo json_encode($postStats); ?>;
    const commentStats = <?php echo json_encode($commentStats); ?>;
    const userStats = <?php echo json_encode($userStats); ?>;

    const labels = postStats.map(stat => `${stat.month}-${stat.year}`);

    // Posts chart configuration
    const postData = {
        labels: labels,
        datasets: [{
            label: 'Posts Created',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: postStats.map(stat => stat.post_count)
        }]
    };

    const postConfig = {
        type: 'bar',
        data: postData,
        options: {
            responsive: true,
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    // Comments chart configuration
    const commentData = {
        labels: labels,
        datasets: [{
            label: 'Comments Created',
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1,
            data: commentStats.map(stat => stat.comment_count)
        }]
    };

    const commentConfig = {
        type: 'bar',
        data: commentData,
        options: {
            responsive: true,
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    // Users chart configuration
    const userData = {
        labels: labels,
        datasets: [{
            label: 'Users Registered',
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1,
            data: userStats.map(stat => stat.user_count)
        }]
    };

    const userConfig = {
        type: 'bar',
        data: userData,
        options: {
            responsive: true,
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    // Render the charts
    const postsStatsChart = new Chart(
        document.getElementById('postsStatsChart'),
        postConfig
    );

    const commentsStatsChart = new Chart(
        document.getElementById('commentsStatsChart'),
        commentConfig
    );

    const usersStatsChart = new Chart(
        document.getElementById('usersStatsChart'),
        userConfig
    );
</script>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




 
    <?php require_once APP_ROOT . '/view/partials/footer.php' ?>