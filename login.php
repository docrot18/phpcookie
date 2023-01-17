<?php
session_start();
if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $age = $_POST['age'] ?? '';

    if (Auth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        $_SESSION['age'] = $age;
        header('Location: /index.php');
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>

<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($error)): ?>
<span style="color: red;">
    <?= $error ?>
</span>
<?php endif; ?>
<form action="/login.php" method="post">
    <label for="login">Логин: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <label for="age">Возраст: </label><input type="age" name="age" id="age">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>