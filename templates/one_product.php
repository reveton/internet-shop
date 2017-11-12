<?php

$product_from_cart = get_product_from_cart(NULL);
$ssilka = '<div class="button"><a href = "index.php?view=cart&cat_id='.$product['category'].'&id='.$product['id'].'">Добавить в корзину</div>';
foreach ($product_from_cart as $product_cart)
{
    if ($product_cart['action'] == 1 && $_SESSION['uid'] == $product_cart['uid'] && $_GET['id'] == $product_cart['pid'])
    {
        $ssilka = '<div class="button"><a href = "index.php?view=remove&id='.$product['id'].'">Удалить из корзины</div>';
    }
}
$content = '<table align="center" cellpadding="0" cellspacing="0" class = "product" border="0" >
<tr>
    <td valign="top">
        <div class="description_product">
            <div><img src ="img/'. $product['image'].'"</div>
            <div class="product_name">'.$product['name'].'</div>
            <div class="product-price">'.$product['price'].' Грн </div>
            </div>
            '.$ssilka.'
        </div>
    </td>
    <td valign="top">
        <div>'.$product['description'].'</div>
    </td>
</tr>
</table>';
