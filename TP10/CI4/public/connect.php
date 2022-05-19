<?php
    $namalengkap = $_POST['namalengkap'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $posisi = $_POST['posisi'];
    $cerita = $_POST['cerita'];

    // Database
    $conn = new mysqli ('localhost','root','','connect');
    if($conn->connect_error){
        die('connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into contact(namalengkap, nomor, email, posisi, cerita)values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $namalengkap, $nomor, $email, $posisi, $cerita);
        $stmt->execute();
        echo "Terima Kasih Telah Menghubungi";
        $stmt->close();
        $conn->close();
    }

?>