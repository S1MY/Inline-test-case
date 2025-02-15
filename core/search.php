<?php
include 'connect.php';

$query = $_POST['query'];

try {
    $stmt = $pdo->prepare("SELECT p.title, c.body FROM posts p JOIN comments c ON p.id = c.post_id WHERE c.body LIKE :query");
    $stmt->execute(['query' => '%' . $query . '%']);

    $results = $stmt->fetchAll();

    if ($results) {
        foreach ($results as $result) {
            echo "<div class='p-4 border-b border-gray-300'>";
            echo "<h2 class='text-xl font-semibold'>" . $result['title'] . "</h2>";
            echo "<p>" . $result['body'] . "</p>";
            echo "</div>";
        }
    } else {
        echo '<p>Комментариев не найдено.</p>';
    }
} catch (\Throwable $th) {
    echo '<p>Ошибка в выборке данных.' . $th . '</p>';
}

?>