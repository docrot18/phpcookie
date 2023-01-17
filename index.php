<?php
session_start();
require __DIR__ . '/auth.php';
$login = GetCookie();
?>
<html>
<head>
    <title>обучение созданию печенек</title>
</head>
<body>
<? if ($login == null): ?>
    <a href="/login.php">Авторизуйтесь</a>
<? else: ?>
    <div>Здравствуйте, <?= $_COOKIE['login']?>, Вам <?= $_SESSION['age'] ?> лет! </div>
    <a href="/logout.php">Выйти</a>
<? endif ?>
</body>
</html>