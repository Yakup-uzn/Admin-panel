<?php
            
            $servername = "localhost";
            $username = "yakup";
            $password = "1234";
            $dbname = "uygulama";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Bağlantıyı kontrol et
            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }
    
