<?php defined('_JEXEC') or die('403');
$view = empty($_GET['view']) ? 'shop' : $_GET['view'];
$categories = get_cat();
$category = '<div><a href="index.php">Главная</a></div>';
foreach ($categories as $item)
{
    include("templates/category.php");
}

if ($view == 'shop' || $view == 'cat')
{
    if ($view == 'cat')
        $id = $_GET['id'];
    else
        $id = NULL;
    $products = get_products($id);
    $content = '';
    foreach($products as $item)
    {
        include("templates/products.php");
    }
    $inc = 'templates/index.php';
}

if ($view == 'product' && isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{
    $product = get_product($_GET['id']);
    $content = '';
    include("templates/one_product.php");
    $inc = 'templates/index.php';
}

if ($view == 'registration')
{
    $register = '';
    include ('templates/registration.php');
    $inc = 'templates/reg.php';
}
if ($view == 'login')
{
    $login = '';
    include ('templates/login.php');
    $inc = 'templates/log_in.php';
}
if ($view == 'logout')
{
    include ('includes/exit.php');
    $products = get_products(NULL);
    $content = '';
    foreach($products as $item)
    {
        include("templates/products.php");
    }
    $inc = 'templates/index.php';
}

if ($view == 'cart' && !isset($_GET['id']))
{
    $cart = '';
    $products_cart = get_product_from_cart(NULL);
    $i = 0;
    foreach($products_cart as $item_cart)
    {
        if ($item_cart['action'] == 1)
        {
            $i++;
            include("templates/cart.php");
        }
    }
    if ($i == 0)
        exit ("Ваша корзина пустая");
    $inc = 'includes/cart_show.php';
}

if ($view == 'cart' && isset($_GET['id']) && isset($_GET['cat_id']))
{
    include('includes/add_to_cart.php');
    $category = '<div><a href="index.php">Главная</a></div>';
    $inc = 'templates/index.php';
}
if ($view == 'remove' && isset($_GET['id']))
{
    include('includes/remove_from_basket.php');
    $category = '<div><a href="index.php">Главная</a></div>';
    $inc = 'templates/index.php';
}