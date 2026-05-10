<?php
$errormessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['felhasznalo'], $_POST['jelszo'])) {
    $sql = "SELECT id, csaladi_nev, uto_nev, bejelentkezes FROM felhasznalok WHERE bejelentkezes = :login AND jelszo = SHA1(:pass)";
    $sth = $conn->prepare($sql);
    $sth->execute([':login' => $_POST['felhasznalo'], ':pass' => $_POST['jelszo']]);
    $row = $sth->fetch();
    if ($row) {
        $_SESSION['userid'] = $row['id'];
        $_SESSION['csn'] = $row['csaladi_nev'];
        $_SESSION['un'] = $row['uto_nev'];
        $_SESSION['login'] = $row['bejelentkezes'];
    } else {
        $errormessage = 'Hibás felhasználónév vagy jelszó.';
    }
} else { header('Location: belepes'); exit; }
?>
