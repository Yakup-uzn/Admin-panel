<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Ödeme Bilgisi</h5>
        </div>
        <div class="card-body">

          <form method="POST" action="vt_islem.php">

          <?php 
                  require 'vt_baglanti.php';
                  $urun_id=$_GET['id'];
                  $urun_ad = $_GET['urun_ad'];
                  $sql ="select fiyat,urun_ad FROM urunler WHERE id=$urun_id";
                  $result=$conn->query($sql);
                  $row = $result->fetch_assoc();
                  $fiyat = $row['fiyat'];
                  $urun_ad=$row['urun_ad'];
          ?> 
          <div class="form-group">
              <label for="name">Ad Soyad</label>
              <input type="text" class="form-control" name="name" placeholder="Ad Soyad" required>
            </div>

            <div class="form-group">
              <label for="card-number">Kart Numarası</label>
              <input type="text" class="form-control" name="card_number" placeholder="Kart Numarası" required>
            </div>
            
            <div class="form-group">
              <label for="expiry">Son Kullanma Tarihi</label>
              <input type="text" class="form-control" name="expiry" placeholder="MM/YY" required>
            </div>
            
            <div class="form-group">
              <label for="cvv">CVV</label>
              <input type="text" class="form-control" name="cvv" placeholder="CVV" required>
            </div>
            
            <div class="form-group">
              <label for="email">E-posta</label>
              <input type="email" class="form-control" name="email" placeholder="E-posta" required>
            </div>
            
            <div class="form-group">
              <label for="address">Adres</label>
              <textarea class="form-control" name="address" rows="3" placeholder="Fatura Adresi" required></textarea>
            </div>

            <div class="form-group">
              <label for="urun_ad">Ürün adı</label>
              <input type="text" class="form-control" name="urun_ad" value="<?php echo $urun_ad; ?>" readonly>
            </div>  


            <div class="form-group">
              <label for="fiyat">Fiyat</label>
              <input type="text" class="form-control text-end" name="fiyat" value="<?php echo $fiyat; ?>" readonly>
            </div>

            <br>

            <div class="card-body text-end ">
            <button type="submit" class="btn btn-dark" name="odeme">Ödemeyi Tamamla</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




        
  

  










</body>
</html>