<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<ul class="navigation">
    <?php echo $category; ?>
</ul>
<div class="header">
    <div class="header_main_block">
        <div class="img_block">
            <a href ="index.php"><img src="img/logo.png" alt="No Image"></a>
        </div>
        <div class="header_text_main">
            <h1>ft_minishop</h1>
        </div>
        <?php
        if(!isset($_SESSION['login']))
        {
            echo '<button><a href = "index.php?view=registration"><img src="img/reg.png"></a></button>';
            echo '<button><a href = "index.php?view=login"><img src="img/login.png"></a></button>';
        }
        else
        {
            echo '<button><a href = "index.php?view=logout"><img src="img/logout.png"></a></button>';
        }
        echo '<button><a href = "index.php?view=cart"><img src="img/cart.png"></a></button>';
        ?>

    </div>
</div>
</body>

<?php
if (!empty($products_cart))
{
    $show = 0;
    foreach ($products_cart as $c)
    {
        if ($c['uid'] == $_SESSION['uid'])
           $show = 1;
    }
    if ($show = 1)
        echo $cart;
}
else
    exit("Ваша корзина пустая");
?>