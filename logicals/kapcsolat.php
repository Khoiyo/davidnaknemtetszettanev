<?php
$kapcsolatUzenet='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nev = trim($_POST['nev'] ?? ''); $email = trim($_POST['email'] ?? ''); $uzenet = trim($_POST['uzenet'] ?? '');
    if ($nev === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($uzenet) < 10) {
        $kapcsolatUzenet = 'Kérjük, ellenőrizze az űrlap adatait.';
    } else {
        $kuldo = isset($_SESSION['login']) ? ($_SESSION['csn'].' '.$_SESSION['un']) : 'Vendég';
        $stmt = $conn->prepare('INSERT INTO uzenetek(nev,email,uzenet,kuldo_nev) VALUES(:n,:e,:u,:k)');
        $stmt->execute([':n'=>$nev, ':e'=>$email, ':u'=>$uzenet, ':k'=>$kuldo]);
        @mail('tulajdonos@example.com', 'Kapcsolati üzenet', $uzenet, 'From: '.$email);
        $kapcsolatUzenet = 'Köszönjük, az üzenetet rögzítettük.';
    }
}
?>
