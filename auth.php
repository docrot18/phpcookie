<?php
include 'bd.php';
function Auth($login,$password)
{
$users = require __DIR__ . '/bd.php';
foreach ($users as $user){
    if ($user['login'] == $login && $user['password'] == $password)
        {
        return true;
        }
    };
return false;
}

function GetCookie(){
    $loginCookie = $_COOKIE['login'] ?? '';
    $passwordCookie = $_COOKIE['password'] ?? '';

    if (Auth($loginCookie,$passwordCookie)){
        return $loginCookie;
    }

    return null;
}


function LogOut(){
    setcookie('login', '', 0, '');
    setcookie('password', '', 0, '');
}