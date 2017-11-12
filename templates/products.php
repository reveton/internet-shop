<?php defined('_JEXEC') or die('403');
$content .='
<li class="flex-item">
<div class="description">
                <a href = "index.php?view=product&id='.$item['id'].'"><img src ="img/'.$item['image'].'" </a>
                <div class="product_name"><a href = "index.php?view=product&id='.$item['id'].'">'.$item['name'].'</a></div>
                <div class="product-price">'.$item['price'].' Грн</div>
            </div>
</li>';