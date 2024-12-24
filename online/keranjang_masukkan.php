<?php 
include 'koneksi.php';

session_start();

$id_produk = $_POST['id_produk'];
$ukuran_baju = $_POST['ukuran_baju'];
$redirect = $_POST['redirect'];

// Ambil stok produk dari database
$query_stok = "SELECT produk_jumlah FROM produk WHERE produk_id = '$id_produk'";
$result_stok = mysqli_query($koneksi, $query_stok);
$row_stok = mysqli_fetch_assoc($result_stok);
$stok_produk = $row_stok['produk_jumlah'];

// Fungsi untuk mengurangi stok produk di database
function minstok($koneksi, $id_produk, $jumlah) {
    $query_update_stok = "UPDATE produk SET produk_jumlah = produk_jumlah - $jumlah WHERE produk_id = '$id_produk'";
    mysqli_query($koneksi, $query_update_stok);
}

$sudah_ada = 0;

if(isset($_SESSION['keranjang'])){
    $jumlah_isi_keranjang = count($_SESSION['keranjang']);

    for($a = 0; $a < $jumlah_isi_keranjang; $a++){
        if($_SESSION['keranjang'][$a]['produk'] == $id_produk && $_SESSION['keranjang'][$a]['ukuran'] == $ukuran_baju) {
            $sudah_ada = 1;
            break;
        }
    }
}

// Jika produk belum ada di keranjang, kurangi stok dan tambahkan ke keranjang
if($sudah_ada == 0){
    minstok($koneksi, $id_produk, 1);

    if(isset($_SESSION['keranjang'])){
        $_SESSION['keranjang'][$jumlah_isi_keranjang] = array(
            'produk' => $id_produk,
            'ukuran' => $ukuran_baju,
            'jumlah' => 1
        );
    } else {
        $_SESSION['keranjang'][0] = array(
            'produk' => $id_produk,
            'ukuran' => $ukuran_baju,
            'jumlah' => 1
        );
    }
}

if($redirect == "index"){
    $r = "index.php";
}elseif($redirect == "detail"){
    $r = "produk_detail.php?id=".$id_produk;
}elseif($redirect == "keranjang"){
    $r = "keranjang.php";
}

header("location:".$r);
?>
