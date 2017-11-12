<?php
include_once ('db.php');
if (isset($_POST['login'])){
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
        exit ("Введите пожалуйста логин!");
    }
}
if (isset($_POST['passwd']))
{
    $password = $_POST['passwd'];
    if ($password == '')
    {
        unset($password);
        exit ("Введите пароль");
    }
}
$password = hash('sha256', $password);
$connection = db_connect();
$user = mysqli_query($connection,"SELECT uid FROM users WHERE login='$login' AND password='$password'");
$id_user = mysqli_fetch_array($user);
if (empty($id_user['uid']))
{
    exit ("Извините, введённый вами логин или пароль неверный.");
}
else
    {
        $_SESSION['password'] = $password;
        $_SESSION['login'] = $login;
        $_SESSION['uid'] = $id_user['uid'];
    }
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>";