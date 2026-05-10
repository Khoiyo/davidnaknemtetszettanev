<?php
$kepUzenet='';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep'])) {
    if (!isset($_SESSION['login'])) { $kepUzenet='Képfeltöltéshez be kell jelentkezni.'; }
    elseif ($_FILES['kep']['error'] !== UPLOAD_ERR_OK) { $kepUzenet='A feltöltés nem sikerült.'; }
    else {
        $allowed = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
        $mime = mime_content_type($_FILES['kep']['tmp_name']);
        if (!isset($allowed[$mime])) { $kepUzenet='Csak JPG, PNG, GIF vagy WEBP kép tölthető fel.'; }
        else {
            $filename = uniqid('kep_', true) . '.' . $allowed[$mime];
            $target = __DIR__ . '/../images/uploads/' . $filename;
            if (move_uploaded_file($_FILES['kep']['tmp_name'], $target)) {
                $stmt=$conn->prepare('INSERT INTO kepek(fajlnev, eredeti_nev, feltolto_id) VALUES(:f,:e,:uid)');
                $stmt->execute([':f'=>$filename, ':e'=>$_FILES['kep']['name'], ':uid'=>$_SESSION['userid'] ?? null]);
                $kepUzenet='Sikeres képfeltöltés.';
            }
        }
    }
}
$kepek = $conn->query('SELECT k.*, f.bejelentkezes FROM kepek k LEFT JOIN felhasznalok f ON f.id=k.feltolto_id ORDER BY k.letrehozva DESC')->fetchAll();
?>
