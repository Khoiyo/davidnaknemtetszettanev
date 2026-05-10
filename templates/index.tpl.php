<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($ablakcim['cim']) ?></title>
    <link rel="stylesheet" href="styles/stilus.css">
    <link rel="stylesheet" href="styles/tablazat.css">
</head>
<body>
<header>
    <img src="/images/<?= htmlspecialchars($fejlec['kepforras']) ?>" alt="<?= htmlspecialchars($fejlec['kepalt']) ?>">
    <h1><?= htmlspecialchars($fejlec['cim']) ?></h1>
    <p><?= htmlspecialchars($fejlec['motto']) ?></p>
    <?php if (isset($_SESSION['login'])): ?>
        <p class="login-info">Bejelentkezett: <?= htmlspecialchars($_SESSION['csn'] . ' ' . $_SESSION['un'] . ' (' . $_SESSION['login'] . ')') ?></p>
    <?php endif; ?>
</header>
<div id="wrapper">
    <aside>
        <nav aria-label="Főmenü">
            <ul>
                <?php foreach ($oldalak as $url => $oldalAdat): ?>
                    <?php $menuIndex = isset($_SESSION['login']) ? 1 : 0; ?>
                    <?php if ($oldalAdat['szoveg'] !== '' && $oldalAdat['menun'][$menuIndex]): ?>
                        <li class="<?= ($keres['fajl'] === $oldalAdat['fajl']) ? 'active' : '' ?>">
                            <a href="<?= ($url === '/') ? '.' : htmlspecialchars($url) ?>"><?= htmlspecialchars($oldalAdat['szoveg']) ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <main id="content">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </main>
</div>
<footer>
    <p>&copy; <?= htmlspecialchars($lablec['copyright']) ?> <?= htmlspecialchars($lablec['ceg']) ?></p>
</footer>
<script src="scripts.js"></script>
</body>
</html>
