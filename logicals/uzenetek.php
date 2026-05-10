<?php
$uzenetek = $conn->query('SELECT * FROM uzenetek ORDER BY kuldes_ideje DESC')->fetchAll();
?>
