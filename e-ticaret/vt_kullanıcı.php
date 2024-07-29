<?php
require 'vt_baglanti.php';
$user_id = $_GET['id'];
$sql_musteri = "SELECT * FROM users WHERE id=$user_id";
$result_musteri = $conn->query($sql_musteri);
$row= $result_musteri->fetch_assoc();
$resim = $row["resim_yolu"];

