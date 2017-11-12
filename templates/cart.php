<?php

$cart .= '<table align="center" cellpadding="0" cellspacing="0" class = "product" border="0" id ="cart_desc">
    <tr>
        <td valign="top">
            <div class="description">
                <div><a href = "index.php?view=product&id='.$item_cart['pid'].'"><img src ="img/'.$item_cart['image'].'" </a></div>
                <div class="product_name"><a href = "#">'.$item_cart['name'].'</a></div>
                <div class="product-price">'.$item_cart['price'].' Грн</div>
            </div>
        </td>
    </tr>
</table>';
