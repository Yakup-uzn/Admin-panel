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

        
  <div class="row row-cols-1 row-cols-md-2 g-4 m-4 " >
    <?php
                require 'vt_baglanti.php';
                $sql = "SELECT * FROM urunler";
                $result = $conn->query($sql);
                $say=0;
                // Ürünleri listeleyen HTML oluşturulur
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if($say%4==0){
                           echo '</div> <div class="row row-cols-1 row-cols-md-4 g-4 m-4">';
                        }

                        echo '  <div class="col-sm-3 text-white">';
                        echo '<div class="card h-100 text-dark bg-light" >';
                            echo '<img class=card-img-top src="' . $row['resim_yolu'] . '" alt="' . $row['urun_ad'] . '" height=200px">';
                        echo '<div <div class="card-body text-center">';
                            echo '<h5 class="card-title">'. $row['urun_ad'] .'</h5>';
                            echo '<p class="card-text">' . $row['aciklama'] . '</p>';
                        echo '</div>';

                        echo '<ul class="list-group list-group-flush">';
                                echo ' <li class="list-group-item"><p class="card-text">Stok durumu    =   ' . $row['urun_stok'] . '</p></li>';
                                echo ' <li class="list-group-item"><p class="card-text">Kategori    =   ' . $row['urun_kategori'] . '</p></li>';
                        echo '</ul>';
                          
                            
                        echo ' <div class="card-body text-end ">';    
                            echo ' <a href="sf_satınalma.php?id=' . $row['id']  . '&urun_ad=' . urlencode($row['urun_ad']) .'" class="btn btn-dark ml-3">' . "Satın al" . '</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $say++;
                    }
                    
                } 
                $conn->close();
            ?>
    </div>
  










</body>
</html>