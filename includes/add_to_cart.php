<?php
include_once('db.php');
$category = $_GET['cat_id'];
$id = $_GET['id'];
if (isset($category) && isset($id))
{
    $date = time();;
    insert_to_base_product($id, $_SESSION['uid'], $date);
    header("location:index.php?view=product&id=$id");
}