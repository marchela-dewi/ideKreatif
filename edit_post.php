<?php
// Memasukkan file konfigurasi database
include 'config.php';

// Memasukkan header halaman
include '.includes/header.php';

// Mengambil ID postingan yang akan diedit dari parameter URL
// ../edit_post.php?post_id=
$postIdToEdit = $_GET['post_id']; // Pastikan parameter 'post_id' ada di URL

// Query untuk mengambil data postingan berdasarkan ID
$query = "SELECT * FROM posts WHERE id_post = $postIdToEdit";
$result = $conn->query($query);

// Memeriksa apakah data postingan ditemukan
if ($result->num_rows > 0) {
    $post = $result->fetch_assoc(); // Mengambil data postingan ke dalam array
} else {
    // Menampilkan pesan jika postingan tidak ditemukan
    echo "Post not found.";
    exit(); // Menghentikan eksekusi jika tidak ada postingan
}
?>
