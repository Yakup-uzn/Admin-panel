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
                <a href="sf_listeleler.php"><img src="icons/sipariş.png" alt="">Siparişler</a>
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
                <a href="sf_index.php"><img src="icons/cıkıs.png" alt="">Çıkış yap</a>
            </li>
        </ul>
    </nav>
       
    <div class="container">
        <div class="header">
            <a href="#">Yakup uzunoglu</a>
            <img src="icons/admin.jpeg" alt="">
        </div>



        <h1>Sipariş Listesi</h1>
        <div class="listele">

            <ul class="listele-list">
                <li class="listele">
                    <span>ID</span>
                    <span>ÜRÜN ADI</span>
                    <span>AD</span>
                    <span>ADRES</span>
                    <span>FİYAT</span>
                    <span>TARİH</span>

                </Li>

            </ul>
            </div>
        <div class="listele">
            <?php
                require 'vt_baglanti.php';
                $sql = "SELECT * FROM odeme";
                $result = $conn->query($sql);

                // Ürünleri listeleyen HTML oluşturulur
                if ($result->num_rows > 0) {
                    echo '<ul class="listele-list">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="listele">';
                        echo '<span>' . $row['id'] . '</span>';
                        echo '<span>' . $row['urun_ad'] . '</span>';
                        echo '<span>' . $row['ad_soyad'] . '</span>';
                        echo '<span>' . $row['adres'] . '</span>';
                        echo '<span>' . $row['fiyat'] . ' </span>';
                        echo '<span>' . $row['tarih'] . ' </span>';
                        echo '<button class="delete-btn" data-id="' . $row['id'] . '">Tamamlandı</button>';
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
                    method: 'DELETE_listele'
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
