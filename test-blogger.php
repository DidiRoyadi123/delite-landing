<?php

$api_key = 'AIzaSyDsxExRLrV3b5OAQVjgVUXkh6CpubdRypc';
$blog_id = '2102108696088625368';

// URL Endpoint untuk mengambil postingan blog menggunakan API Blogger
$url = "https://www.googleapis.com/blogger/v3/blogs/{$blog_id}/posts?key={$api_key}";

// Mengambil data dari API menggunakan cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Parsing dan menampilkan data postingan
$data = json_decode($response, true);

if (isset($data['items'])) {
    foreach ($data['items'] as $post) {
        $title = $post['title'];
        $content = $post['content'];

        echo "<h2>{$title}</h2>";
        echo "<p>{$content}</p>";
        echo "<hr>";
    }
} else {
    echo "Tidak ada postingan yang ditemukan.";
}
?>
