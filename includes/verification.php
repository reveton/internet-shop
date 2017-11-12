<?php
include_once ('db.php');
if (($_POST['login']) &&
    ($_POST['surname']) &&
    ($_POST['passwd']) &&
    ($_POST['email']) &&
    ($_POST['submit']) &&
    $_POST['submit'] == "OK")
{
    $user_info = get_user_info();
    $login = $_POST['login'];
    $name = $_POST['name'];
    $passwd = $_POST['passwd'];
    $time = time();
    $email = $_POST['email'];
    $pass2 = $_POST['pass2'];
    $surname = $_POST['surname'];
    $count = strlen($passwd);
    if ($count < 5)
        exit("Пароль должен быть больше 5 символов");
    if (!preg_match("/@/", $email))
        exit("Введен неправильный имейл");
    foreach ($user_info as $u)
    {
        if ($u['email'] == $email)
            exit('Такой имейл уже существует!');
        if ($u['login'] == $login)
            exit('Такой логин уже существует!');
    }
    if ($passwd != $pass2)
        echo "Пароли не совпадают";
    else
    {
        $passwd = hash('sha256', $passwd);
        insert_to_base_user($login, $passwd, $name, $time, $surname, $email);
    }
}
else
    echo "ERROR\n";