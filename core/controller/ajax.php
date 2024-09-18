<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize response
$response = ['success' => false];

// Handle comment submission via AJAX
if (isset($_POST['comment']) && isset($_POST['post_id'])) {
    // Validate and sanitize input
    $comment = sanitize($_POST['comment']);
    $postId = sanitize($_POST['post_id']);
    $userId = isset($_POST['user_id']) ? sanitize($_POST['user_id']) : null;

    // Check for empty comment
    if (!empty($comment)) {
        // Insert comment into database
        $pdo->insert("INSERT INTO comments(post_id, user_id, comment) VALUES(?, ?, ?)", [$postId, $userId, $comment]);
        if ($pdo->status) {
            // Fetch the latest comment data to return
            $commentData = $pdo->select("SELECT c.comment, u.username, c.created_at FROM comments c JOIN user_blog u ON c.user_id = u.id WHERE c.post_id = ? ORDER BY c.created_at DESC LIMIT 1", [$postId])->fetch(PDO::FETCH_ASSOC);
            if ($commentData) {
                $response = [
                    'success' => true,
                    'postId' => $postId,
                    'username' => $commentData['username'],
                    'comment' => $commentData['comment'],
                    'createdAt' => $commentData['created_at']
                ];
            } else {
                $response = ['success' => false, 'message' => 'Failed to retrieve comment data'];
            }
        } else {
            $response = ['success' => false, 'message' => 'Failed to insert comment'];
        }
    } else {
        $response = ['success' => false, 'message' => 'Comment cannot be empty'];
    }
}

// Handle like submission (toggle like/unlike) via AJAX
if (isset($_POST['like_post']) && isset($_POST['post_id'])) {
    // Validate and sanitize input
    $postId = sanitize($_POST['post_id']);
    $userId = isset($_POST['user_id']) ? sanitize($_POST['user_id']) : null;
    $userIp = $_SERVER['REMOTE_ADDR'];

    // Handle like/unlike logic
    if ($userId) {
        // Logged-in user
        $existingLike = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_id = ?", [$postId, $userId])->fetch(PDO::FETCH_ASSOC);
        if ($existingLike) {
            // Unlike
            $pdo->delete("DELETE FROM likes WHERE id = ?", [$existingLike['id']]);
        } else {
            // Like
            $pdo->insert("INSERT INTO likes(post_id, user_id) VALUES(?, ?)", [$postId, $userId]);
        }
    } else {
        // Anonymous user
        $existingLike = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_ip = ?", [$postId, $userIp])->fetch(PDO::FETCH_ASSOC);
        if ($existingLike) {
            // Unlike
            $pdo->delete("DELETE FROM likes WHERE id = ?", [$existingLike['id']]);
        } else {
            // Like
            $pdo->insert("INSERT INTO likes(post_id, user_ip) VALUES(?, ?)", [$postId, $userIp]);
        }
    }

    // Return updated like count
    $likeCount = $pdo->select("SELECT COUNT(*) as total_likes FROM likes WHERE post_id = ?", [$postId])->fetch(PDO::FETCH_ASSOC)['total_likes'];
    $response = [
        'success' => true,
        'likeCount' => $likeCount
    ];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
