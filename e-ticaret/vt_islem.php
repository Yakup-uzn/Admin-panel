<?php

require 'vt_baglanti.php';






if(isset($_POST['giris'])) {
    session_start(); // Oturumu başlat

    $mail = $_POST['mail'];
    $sifre = $_POST['sifre'];

    // Kullanıcıyı sorgula
    $sql = "SELECT * FROM users WHERE mail = '$mail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Kullanıcı bulundu, şifreyi kontrol et
        $row = $result->fetch_assoc();
        if($sifre == $row['sifre']) {
            $_SESSION['user_id'] = $row['id'];
            // Şifre doğru, kullanıcı giriş yapabilir
            header("Location: sf_kullanıcı.php");
        } else {
            // Şifre yanlış
            echo "<script>alert('Hatalı şifre');</script>";
          
        }
    } else {
        // Kullanıcı bulunamadı
        echo "<script>alert('Kullanıcı bulunamadı');</script>";
    }

}






if(isset($_POST['kayit'])) {
    // Formdan gelen verileri alın
    $ad = $_POST['ad'];
    $soyad = $_POST['Soyad'];
    $kullanici_ad = $_POST['Kullanici_ad'];
    $mail = $_POST['mail'];
    $sifre = $_POST['sifre'];
    $sifre_tekrar = $_POST['şifre_tekrar'];

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

    $check_email_sql = "SELECT * FROM users WHERE mail = '$mail'";
    $check_email_result = $conn->query($check_email_sql);


    if ($check_email_result->num_rows > 0) {
        echo "Bu e-posta adresiyle zaten kayıtlı bir kullanıcı var!";
    } else {


            // Eğer şifreler uyuşmuyorsa hata mesajı göster
            if($sifre !== $sifre_tekrar) {
                echo "Şifreler uyuşmuyor!";
            } else {

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'kullanıcı_profil/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                // Veritabanına yeni kullanıcıyı ekle
                $sql = "INSERT INTO users (ad, soyad, kullanici_ad, mail, sifre,resim_yolu)
                VALUES ('$ad', '$soyad', '$kullanici_ad', '$mail', '$sifre','$fileDestination')";

                if ($conn->query($sql) === TRUE) {
                    echo "Üyelik başarıyla oluşturuldu!";
                } else {
                    echo "Hata: " . $sql . "<br>" . $conn->error;
                }
            }
    }
    
}

















if(isset($_POST['urun_ekle'])) {
    // Formdan gelen verileri alın
    $urun_ad = $_POST['urun_ad'];
    $urun_fiyat = $_POST['urun_fiyat'];
    $urun_stok = $_POST['urun_stok'];
    $urun_kategori = $_POST['urun_kategori'];
    $urun_aciklama = $_POST['urun_aciklama'];

    // Dosya yükleme işlemi
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

    if (in_array($fileActualExt, $allowed)) {
        
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                // Veritabanına kayıt
                $sql = "INSERT INTO urunler (urun_ad, fiyat, urun_stok, urun_kategori, aciklama, resim_yolu)
                VALUES ('$urun_ad', '$urun_fiyat', '$urun_stok', '$urun_kategori', '$urun_aciklama', '$fileDestination')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: sf_ürünler.php");
                    
                } else {
                    echo "Hata: " . $sql . "<br>" . $conn->error;
                }
            }
    
}










if(isset($_POST['odeme'])) {



    $ad_soyad = $_POST['name'];
    $kart_numarasi = $_POST['card_number'];
    $son_kullanma_tarihi = $_POST['expiry'];
    $cvv = $_POST['cvv'];
    $email = $_POST['email'];
    $adres = $_POST['address'];
    $fiyat = $_POST['fiyat'];
    $urun_ad = $_POST['urun_ad'];
    session_start();
    $user_id=$_SESSION['user_id'];


    $sql = "INSERT INTO odeme (ad_soyad, kart_numarasi, son_kullanma_tarihi, cvv, email, adres, fiyat,urun_ad,user_id) 
            VALUES ('$ad_soyad', '$kart_numarasi', '$son_kullanma_tarihi', '$cvv', '$email', '$adres', '$fiyat','$urun_ad','$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Ödeme bilgileri başarıyla kaydedildi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }


}





// Bağlantıyı kapat
$conn->close();


