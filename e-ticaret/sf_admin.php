<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UZN MOBİLYA</title>
    <link rel="stylesheet" href="cs_admin.css">

</head>
<body>
    <nav class="sidebar">
        <div class="text">UZN MOBİLYA</div>
        <ul>
            <li> <a href="sf_admin.php"><img src="icons/dashboard.png" alt="">Dashboard</a></li>
            <li> <a href="sf_siparisler.php"><img src="icons/sipariş.png" alt="">Siparişler</a></li>
            <li> <a href="sf_ürünler.php"><img src="icons/ürün.png" alt="">Ürünler</a> </li>
            <li> <a href="sf_musteri.php"><img src="icons/user.png" alt="">Müşteriler</a></li>
        </ul>
        <ul class="oturum">
            <li> <a href="sf_index.php"><img src="icons/cıkıs.png" alt="">Çıkış yap</a></li>
        </ul>
    </nav>

        <div class="header">
            <a href="#">Yakup uzunoglu</a>
            <img src="icons/admin.jpeg" alt="">
        </div>




        <div class="analiz">
            <div class="rapor">
                <?php include 'vt_veri_cekme.php'; ?>
                <p><?php echo $musteri_sayisi; ?></p>
                <h2>Toplam müşteri sayısı</h2>
            </div>

            <div class="rapor">
                <p><?php echo $siparis_sayisi; ?></p>
                <h2>Yeni Siparişler</h2>
            </div>
            <div class="rapor">
                <p><?php echo $urun_sayisi; ?></p>
                <h2>Toplam ürün sayısı</h2>
            </div>
        </div>




</body>
</html>
