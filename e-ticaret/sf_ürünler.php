<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UZN MOBİLYA</title>
    <link rel="stylesheet" href="cs_admin.css">
</head>

<body>
    <nav class="sidebar">
        <div class="text">
            <img src="" alt="">UZN MOBİLYA
        </div>
        <ul>
            <li>
                <a href="sf_admin.php"><img src="icons/dashboard.png" alt="">Dashboard</a>
            </li>
            <li>
                <a href="sf_siparisler.php"><img src="icons/sipariş.png" alt="">Siparişler</a>
            </li>
            <li>
                <a href="sf_ürünler.php"><img src="icons/ürün.png" alt="">Ürünler</a>
            </li>
            <li>
                <a href="sf_musteri.php"><img src="icons/user.png" alt="">Müşteriler</a>
            </li>
        </ul>
        <ul class="oturum">
            <li>
                <a href="#"><img src="icons/cıkıs.png" alt="">Çıkış yap</a>
            </li>
        </ul>
    </nav>
       
    <div class="container">
        <div class="header">
            <a href="#">Yakup uzunoglu</a>
            <img src="icons/admin.jpeg" alt="">
        </div>

        <div class="master">
            <form action="vt_islem.php" method="post" enctype="multipart/form-data">
                <h1>Ürün Ekle</h1>
                <div class="input-box">
                    <input type="text" name="urun_ad" placeholder="Ürün Adı" required>
                </div>
                <div class="input-box">
                    <input type="text" name="urun_fiyat" placeholder="Fiyat" required>
                </div>
                <div class="input-box">
                    <input type="text" name="urun_stok" placeholder="Stok Miktarı" required>
                </div>
                <div class="input-box">
                    <input type="text" name="urun_kategori" placeholder="Kategori" required>
                </div>

                <div class="input-box" style="height: 200px;">
                    <input type="text" name="urun_aciklama" placeholder="Açıklama" required>
                </div>

                <div class="input">
                    <input type="file" name="urun_resim" accept="image/*" required>
                </div>
                <button type="submit" name="urun_ekle" class="btn">Ekle</button>
            </form>
        </div>

        <h1>Ürün Listesi</h1>
        <ul class="listele-list">
                <li class="listele">
                    <span>ID</span>
                    <span>RESİM</span>
                    <span>ÜRÜN ADI</span>
                    <span>FİYAT</span>
                    <span>AÇIKLAMA</span>
                    <span>STOK</span>
                </Li>
            <?php
                require 'vt_baglanti.php';
                $sql = "SELECT * FROM urunler";
                $result = $conn->query($sql);

                // Ürünleri listeleyen HTML oluşturulur
                if ($result->num_rows > 0) {
                    echo '<ul class="listele-list">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="listele">';
                        echo '<span>' . $row['id'] . '</span>';
                        echo '<span><img src="' . $row['resim_yolu'] . '" alt="' . $row['urun_ad'] . '"></span>';
                        echo '<span>' . $row['urun_ad'] . '</span>';
                        echo '<span>' . $row['fiyat'] . '</span>';
                        echo '<span>' . $row['aciklama'] . '</span>';
                        echo '<span>' . $row['urun_stok'] . ' </span>';
                        echo '<span>' . $row['urun_kategori'] . ' </span>';
                        echo '<button class="delete-btn" data-id="' . $row['id'] . '">Sil</button>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'Ürün bulunamadı.';
                }
                // Veritabanı bağlantısı kapatılır
                $conn->close();
            ?>
        </div>
    </div>


<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', async () => {
        const id = button.getAttribute('data-id');
        if (confirm('Bu ürünü silmek istediğinize emin misiniz?')) {
            try {
                const response = await fetch('vt_delete.php?id=' + id, {
                    method: 'DELETE_urunler'
                });
                if (response.ok) {
                    button.closest('.listele').remove();
                    alert('Ürün başarıyla silindi. ID: ' + id);
                } else {
                    throw new Error('Ürün silinirken bir hata oluştu.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Bir hata oluştu. Lütfen tekrar deneyin.');
            }
        }
    });
});

</script>
</body>
</html>
