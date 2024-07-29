<?php
session_start();
require 'vt_baglanti.php';

if(isset($_POST['guncelle'])) {
    // Formdan gelen verileri alın
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kullanici_ad = $_POST['kul_ad'];
    $mail = $_POST['mail'];
    $sifre = $_POST['sifre'];
    $user_id = $_SESSION['user_id'];

    $file = $_FILES['urun_resim'];

    $fileName = $_FILES['urun_resim']['name'];
    $fileTmpName = $_FILES['urun_resim']['tmp_name'];
    $fileSize = $_FILES['urun_resim']['size'];
    $fileError = $_FILES['urun_resim']['error'];
    $fileType = $_FILES['urun_resim']['type'];

    // Dosya uzantısını al
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // İzin verilen dosya türleri
    $allowed = array('jpg', 'jpeg', 'png');
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $fileDestination = 'kullanıcı_profil/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

  
        // Şifreler uyuyorsa güncelleme işlemi yap
        $sql = "UPDATE users SET ad='$ad', soyad='$soyad', kullanici_ad='$kullanici_ad', mail='$mail', sifre='$sifre' , resim_yolu='$fileDestination' WHERE id=$user_id";

        if ($conn->query($sql) === TRUE) {
            echo "Kullanıcı bilgileri başarıyla güncellendi!";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
}}

$conn->close();
?>
