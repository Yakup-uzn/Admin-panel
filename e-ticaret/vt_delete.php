
<?php 
require 'vt_baglanti.php';


if ($_SERVER['REQUEST_METHOD'] === 'DELETE_urunler') {
    // Ürünün id'sini alın
    $id = $_GET['id'];

    // Veritabanından ürünü sil
    $sql = "DELETE FROM urunler WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: sf_ürünler.php");
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'DELETE_siparis') {
    // Ürünün id'sini alın
    $id = $_GET['id'];

    // Veritabanından ürünü sil
    $sql = "DELETE FROM odeme WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: sf_siparisler.php");
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Bağlantıyı kapat
$conn->close();

