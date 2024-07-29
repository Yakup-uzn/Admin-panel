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

<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title text-center">Kullanıcı Bilgisi</h5>
        </div>
        <div class="card-body">

          <form method="POST" action="vt_update.php"enctype="multipart/form-data" >

          <?php
                    require 'vt_baglanti.php';
                    
                  $user_id=$_SESSION['user_id'];
                  $sql ="select * FROM users WHERE id=$user_id";
                  $result=$conn->query($sql);
                  $row = $result->fetch_assoc();
                  $ad=$row['ad'];

          ?> 
            <div class="form-group m-4"></div>
                  <label for="resim">Profil resmi</label>
                  <br>
                  <img src="<?php echo $row['resim_yolu']; ?>" alt="Profil Resmi" style="width:300px; height:250px;">
                  <input type="file" name="urun_resim" accept="image/*" required>
            </div>

            <div class="form-group m-4">
              <label for="ad">AD</label>
              <input type="text" class="form-control" name="ad" placeholder="<?php echo $row['ad']; ?>" required>
            </div>
            
            <div class="form-group m-4">
              <label for="soyad">Soyad</label>
              <input type="text" class="form-control" name="soyad" placeholder="<?php echo $row['soyad']; ?>" required>
            </div>

            <div class="form-group m-4">
              <label for="kul_ad">Kullanıcı adı</label>
              <input type="text" class="form-control" name="kul_ad" placeholder="<?php echo $row['kullanici_ad'];?>" required>
            </div>
            
            <div class="form-group m-4">
              <label for="mail">Mail</label>
              <input type="text" class="form-control" name="mail" placeholder="<?php echo $row['mail'];?>" required>
            </div>
            
            <div class="form-group m-4">
              <label for="sifre">Sifre</label>
              <input type="text" class="form-control" name="sifre" placeholder="<?php echo $row['sifre'];?>" required>
            </div>
            

            <br>

            <div class="card-body text-end ">
            <button type="submit" class="btn btn-dark" name="guncelle">Güncelle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




        
  

  










</body>
</html>