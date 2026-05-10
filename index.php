<?php
session_start();
include('./includes/config.inc.php');
include('./includes/db.php');

$oldal = trim($_SERVER['QUERY_STRING'] ?? '', '/');
if ($oldal === '') { $oldal = '/'; }

if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
    $keres = $oldalak[$oldal];
} else {
    $keres = $hiba_oldal;
    header('HTTP/1.0 404 Not Found');
}

$logical = "./logicals/{$keres['fajl']}.php";
if (file_exists($logical)) { include($logical); }
include('./templates/index.tpl.php');
?>
