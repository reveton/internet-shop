<?php
session_start();
if (!$_SESSION['uid'])
    $_SESSION['uid'] = time();
$_SESSION['old_uid'] = $_SESSION['uid'];

function db_connect()
{
    $host = 'localhost';
    $user = 'root';
    $pswd = 'bastanova';
    $db = "shop";

    $connection = mysqli_connect($host, $user, $pswd);
    if(!$connection || !mysqli_select_db($connection, $db))
        return false;
    return $connection;
}

function db_result_to_array($result)
{
    $res_array = array();
    $i = 0;

    while ($row = mysqli_fetch_array($result))
    {
        $res_array[$i] = $row;
        $i++;
    }
    return $res_array;
}

function    get_products($id = NULL)
{
    $connection = db_connect();

    $query = "SELECT * FROM `products` ";
    if ($id)
        $query .= "WHERE `products`.`category`='".$id."'";
    $query .= ' ORDER BY id DESC';
    $result = mysqli_query($connection, $query);

    $result = db_result_to_array($result);

    return $result;
}

function    get_cat()
{
    $connection = db_connect();

    $query = "SELECT * FROM `categories` ORDER BY `id` DESC";

    $result = mysqli_query($connection, $query);

    $result = db_result_to_array($result);

    return $result;
}

function get_product($id)
{
    $connection = db_connect();
    $query = ("SELECT * FROM `products` WHERE `id`='$id' ");
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    return ($row);
}

function insert_to_base_user($login, $passwd, $name, $time, $surname, $email )
{
    $connection = db_connect();

    $query = ("INSERT INTO users (`login` ,`password`, `name`, `surname`, `email`,`date`) VALUES('$login','$passwd','$name','$surname','$email','$time')");
    $result = mysqli_query($connection, $query);
    if ($result)
        echo "Регистрация успешна";
    else
        echo "Не успешно";
}

function    get_user_info()
{
    $connection = db_connect();
    $query = "SELECT * FROM `users` ";
    $result = mysqli_query($connection, $query);
    $result = db_result_to_array($result);
    return $result;
}

function insert_to_base_product($pid,$uid, $date)
{
    $connection = db_connect();

    $query = ("INSERT INTO cart (`pid`, `uid`, `date`) VALUES('$pid','$uid','$date')");
    $result = mysqli_query($connection, $query);
    if ($result)
        echo "Товар добавлен в корзину";
    else
        echo "Недобавлен";
}

function get_product_from_cart($id = NULL)
{
    $connection = db_connect();
    $uid = $_SESSION['uid'];
    $query = "SELECT `cart`.*,`products`.* FROM `cart`,`products` WHERE `cart`.`uid` = '".$uid."' AND `products`.`id` = `cart`.`pid`";
    $result = mysqli_query($connection, $query);

    $result = db_result_to_array($result);

    return $result;
}

function remove_from_base_product()
{
    $connection = db_connect();
    print_r ($_SESSION['uid']);
    print_r ($_GET['id']);
    $result = mysqli_query($connection, "UPDATE `cart` SET `cart`.`action`='2' WHERE `cart`.`uid`= '".$_SESSION['uid']."' AND `cart`.`pid`='".$_GET['id']."'");
    if ($result)
        echo "Товар удален из корзины";
    else
        echo "Не удален";
}

function get_count()
{
    $connection = db_connect();
    $query = ("SELECT COUNT(*) AS `cartCount` FROM `cart` WHERE `action`='1'");
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    return ($row['cartCount']);
}

