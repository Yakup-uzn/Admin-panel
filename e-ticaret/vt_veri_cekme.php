<?php

require 'vt_baglanti.php';

$sql_musteri = "SELECT COUNT(*) AS sayisi FROM users";
$result_musteri = $conn->query($sql_musteri);
$row= $result_musteri->fetch_assoc();
$musteri_sayisi = $row["sayisi"];

$sql_musteri = "SELECT COUNT(*) AS sayisi FROM odeme";
$result_musteri = $conn->query($sql_musteri);
$row = $result_musteri->fetch_assoc();
$siparis_sayisi = $row["sayisi"];

$sql_musteri = "SELECT COUNT(*) AS sayisi FROM urunler";
$result_musteri = $conn->query($sql_musteri);
$row = $result_musteri->fetch_assoc();
$urun_sayisi = $row["sayisi"];
