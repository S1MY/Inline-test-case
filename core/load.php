<?php
include 'connect.php';

// Загрузка записей
$postsJson = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$posts = json_decode($postsJson, true);

foreach ($posts as $post) {
    $stmt = $pdo->prepare("INSERT INTO posts (id, title, body) VALUES (:id, :title, :body)");
    $stmt->execute(['id' => $post['id'], 'title' => $post['title'], 'body' => $post['body']]);
}

// Загрузка комментариев
$commentsJson = file_get_contents('https://jsonplaceholder.typicode.com/comments');
$comments = json_decode($commentsJson, true);

foreach ($comments as $comment) {
    $stmt = $pdo->prepare("INSERT INTO comments (id, post_id, name, email, body) VALUES (:id, :post_id, :name, :email, :body)");
    $stmt->execute(['id' => $comment['id'], 'post_id' => $comment['postId'], 'name' => $comment['name'], 'email' => $comment['email'], 'body' => $comment['body']]);
}

echo "Загружено " . count($posts) . " записей и " . count($comments) . " комментариев.\n";
?>