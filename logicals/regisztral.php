<?php
$uzenet=''; $ujra=true;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required = ['vezeteknev','utonev','felhasznalo','jelszo'];
    foreach ($required as $r) { if (empty(trim($_POST[$r] ?? ''))) { $uzenet='Minden mező kitöltése kötelező.'; break; } }
    if (!$uzenet) {
        $sth = $conn->prepare('SELECT id FROM felhasznalok WHERE bejelentkezes = :login');
        $sth->execute([':login'=>$_POST['felhasznalo']]);
        if ($sth->fetch()) { $uzenet='A felhasználói név már foglalt!'; }
        else {
            $stmt = $conn->prepare('INSERT INTO felhasznalok(csaladi_nev, uto_nev, bejelentkezes, jelszo) VALUES(:csn,:un,:login,SHA1(:pass))');
            $stmt->execute([':csn'=>$_POST['vezeteknev'], ':un'=>$_POST['utonev'], ':login'=>$_POST['felhasznalo'], ':pass'=>$_POST['jelszo']]);
            $uzenet='A regisztráció sikeres. Azonosítója: '.$conn->lastInsertId(); $ujra=false;
        }
    }
} else { header('Location: belepes'); exit; }
?>
