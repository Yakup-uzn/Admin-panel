<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UZN MOBİLYA</title>
    <link rel="stylesheet" href="cs_admin.css">
    
    <style>
        /* user List */
        .user-list {
            list-style: none;
            width: 100%;
        }

        .user {
            margin: 0px 20px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            align-items: center;
        }

        .user img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 100%;
            margin-top:10px;
        }

        .user span {
            line-height: 50px;
            width: 100%;
            flex: 1;

        }

        .user .delete-btn {
            background-color: black;
            color: white;
            border: none;
            font-size: 20px;
            padding: 0px 30px;
            border-radius: 10%;
        }
        .user .delete-btn:hover{
            background-color: gray;
        }
    </style>
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
                <a href="sf_index.php"><img src="icons/cıkıs.png" alt="">Çıkış yap</a>
            </li>
        </ul>
    </nav>
       
    <div class="container">
        <div class="header">
            <a href="#">Yakup uzunoglu</a>
            <img src="icons/admin.jpeg" alt="">
        </div>


        <h1>Müşteriler</h1>
         <div class="user">

            <ul class="user-list">
                <li class="user">
                    <span>ID</span>
                    <span>RESİM</span>
                    <span>AD</span>
                    <span>SOYAD</span>
                    <span>KULLANICI ADI</span>
                    <span>MAİL</span>
                    <span>ŞİFRE</span>
                   

                </Li>

            </ul>
            </div>
        <div class="user">
            <?php
                require 'vt_baglanti.php';
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                // Ürünleri listeleyen HTML oluşturulur
                if ($result->num_rows > 0) {
                    echo '<ul class="user-list">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="user">';
                        echo '<span>' . $row['id'] . '</span>';
                        echo '<span><img src="' . $row['resim_yolu'] . '" alt="' . $row['ad'] . '"></span>';
                        echo '<span>' . $row['ad'] . ' </span>';
                        echo '<span>' . $row['soyad'] . ' </span>';
                        echo '<span>' . $row['kullanici_ad'] . '</span>';
                        echo '<span>' . $row['mail'] . '</span>';
                        echo '<span>' . $row['sifre'] . '</span>';
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
                    button.closest('.user').remove();
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
