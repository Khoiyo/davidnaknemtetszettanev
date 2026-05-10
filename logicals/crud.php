<?php
$crudMsg='';
$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id=(int)($_POST['id'] ?? 0);
    if (($_POST['crud_action'] ?? '') === 'delete') {
        $stmt=$conn->prepare('DELETE FROM felhasznalok WHERE id=:id'); $stmt->execute([':id'=>$id]); $crudMsg='Törlés kész.';
    } elseif ($id>0) {
        $stmt=$conn->prepare('UPDATE felhasznalok SET csaladi_nev=:csn, uto_nev=:un, bejelentkezes=:login WHERE id=:id');
        $stmt->execute([':csn'=>$_POST['csaladi_nev'], ':un'=>$_POST['uto_nev'], ':login'=>$_POST['bejelentkezes'], ':id'=>$id]); $crudMsg='Módosítás kész.';
    } else {
        $stmt=$conn->prepare('INSERT INTO felhasznalok(csaladi_nev,uto_nev,bejelentkezes,jelszo) VALUES(:csn,:un,:login,SHA1(:pass))');
        $stmt->execute([':csn'=>$_POST['csaladi_nev'], ':un'=>$_POST['uto_nev'], ':login'=>$_POST['bejelentkezes'], ':pass'=>$_POST['jelszo'] ?: '12345']); $crudMsg='Új rekord létrehozva.';
    }
    $action='list';
}
$editRow = null;
if ($action==='edit' && $id>0) { $s=$conn->prepare('SELECT * FROM felhasznalok WHERE id=:id'); $s->execute([':id'=>$id]); $editRow=$s->fetch(); }
$rows = $conn->query('SELECT id, csaladi_nev, uto_nev, bejelentkezes FROM felhasznalok ORDER BY id')->fetchAll();
?>
