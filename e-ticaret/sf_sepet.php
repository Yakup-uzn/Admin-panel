<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
.listele-list {
    list-style: none;
    width: 100%;
}

.listele {
    margin: 0px 20px;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    align-items: center;
}

.listele img {
    width: 100px;
    height: 100px;
    margin-right: 20px;
}



.listele span {
    line-height: 50px;
    width: 100%;
    flex: 1;
}

.listele .delete-btn {
    background-color: black;
    color: white;
    border: none;
    font-size: 20px;
    margin-top: 25px;
    margin-bottom: 25px;
    padding: 0px 30px;
    border-radius: 10%;
}
.listele .delete-btn:hover {
    background-color: gray;
}    


    </style>

</head>
<body>
<?php
require 'vt_baglanti.php';
session_start();
$user_id=$_SESSION['user_id'];
$sql_musteri = "SELECT * FROM users WHERE id=$user_id";
$result_musteri = $conn->query($sql_musteri);
$row= $result_musteri->fetch_assoc();
$resim = $row["resim_yolu"];



?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="sf_kullanıcı.php">
      <img src="icons/logo1.png" alt="" width="60" height="50" id="logo">
    </a>
      <a class="navbar-brand" href="sf_kullanıcı.php">UZN MOBİLYA</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sf_kullanıcı.php">Mağaza</a>
        </li>
      </ul>
      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sf_sepet.php"><img src="icons/sepet.png" alt="" style="width: 30px; height: 30px;"  >Sepetim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sf_profil.php"><img src="<?php echo $resim; ?>" alt="" style="width: 40px; height: 40px; border-radius:100%;" ></a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>
<script>
    document.getElementById("girisButton").addEventListener("click", function() {
        window.location.href = "sf_üye.php";
    });

    document.getElementById("logo").addEventListener("click", function() {
        window.location.href = "sf_admin.php";
    });
</script>

        
<h1>Sepetim</h1>
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
                $user_id=$_SESSION['user_id'];
                $sql_musteri = "SELECT urun_ad FROM odeme WHERE user_id=$user_id";
                $result_musteri = $conn->query($sql_musteri);
                $row= $result_musteri->fetch_assoc();
                $urun_ad = $row["urun_ad"];

                $sql = "SELECT * FROM urunler WHERE urun_ad='$urun_ad'";
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
                        echo '<button class="delete-btn" data-id="' . $row['id'] . '">İptal et</button>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'Ürün bulunamadı.';
                }
                // Veritabanı bağlantısı kapatılır
                $conn->close();
            ?>









</body>
</html>