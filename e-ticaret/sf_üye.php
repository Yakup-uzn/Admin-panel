<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sayfası</title>
    <link rel="stylesheet" href="cs_login.css">
 
</head>
<body>
    <div class="container">
    <header class="header">
        <div class="logo">
            <img src="icons/logo1.png" alt="Logo">
        </div>
        <div class="title">
            <h1> UZN MOBİLYA</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="sf_index.php">Home</a></li>
                <li><a href="sf_index.php">Mağaza</a></li>
            </ul>
        </nav>
    </header>





        
        <div class="master">
            <form action="vt_islem.php" method="post">
                <h1>Üye girişi</h1>
                <div class="input-box">
                    <input type="text" name="mail" placeholder="E-posta" required>
                </div>
                <div class="input-box">
                    <input type="password" name="sifre" placeholder="Şifre" required>
                </div>
                <div class="hatırla-unut">
                    <label><input type="checkbox">Beni hatırla</label>
                    <a href="#">Parolanı mı unuttun?</a>
                </div>
                <button type="submit" name="giris"  class="btn">Giriş yap</button>
            </form>
        </div>




        <div class="master1">
            <form action="vt_islem.php" method="post" enctype="multipart/form-data">
                <h1>Hızlı üyelik</h1>
                <div class="input-box">
                    <input type="text" name="ad" placeholder="Ad" required>
                </div>
                <div class="input-box">
                    <input type="text" name="Soyad" placeholder="Soyad" required>
                </div>
                <div class="input-box">
                    <input type="text" name="Kullanici_ad" placeholder="Kullanıcı adı" required>
                </div>
                <div class="input-box">
                    <input type="text" name="mail" placeholder="E-mail" required>
                </div>
                <div class="input-box">
                    <input type="password" name="sifre" placeholder="Şifre" required>
                </div>
                <div class="input-box">
                    <input type="password"  name="şifre_tekrar" placeholder="Tekrar Şifre" required>
                </div>
                <div class="input">
                    <input type="file" name="urun_resim" accept="image/*" required>
                </div>
                <button type="submit" name="kayit" class="btn">Üye ol</button>
            </form>
        </div>
    </div>
</body>
</html>
