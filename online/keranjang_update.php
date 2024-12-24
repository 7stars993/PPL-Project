<?php 
include 'koneksi.php';

$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$ukuran = $_POST['ukuran'];

session_start();

foreach ($_SESSION['keranjang'] as $key => $item) {
    // Check if both product ID and size match the submitted form data
    for ($i = 0; $i < count($produk); $i++) {
        if ($item['produk'] == $produk[$i] && $item['ukuran'] == $ukuran[$i]) {
            // Update the quantity
            $jumlah_lama = $item['jumlah'];
            $jumlah_baru = $jumlah[$i];
            $_SESSION['keranjang'][$key]['jumlah'] = $jumlah_baru;

            // Update the stock in the database
            $produk_id = $item['produk'];
            $query_stok = mysqli_query($koneksi, "SELECT produk_jumlah FROM produk WHERE produk_id = $produk_id");
            $data_stok = mysqli_fetch_assoc($query_stok);
            $stok_sekarang = $data_stok['produk_jumlah'];
            
            // Calculate stock change
            $perubahan_stok = $jumlah_lama - $jumlah_baru;
            $stok_terbaru = $stok_sekarang + $perubahan_stok;

            // Ensure stock does not become negative
            if ($stok_terbaru < 0) {
                $stok_terbaru = 0;
            }

            // Update product stock in the database
            mysqli_query($koneksi, "UPDATE produk SET produk_jumlah = $stok_terbaru WHERE produk_id = $produk_id");
        }
    }
}

header("location:keranjang.php");
?>